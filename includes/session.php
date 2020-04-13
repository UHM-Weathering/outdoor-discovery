<?php

class session {
	private $closed = false;
	private $session_uuid;
	private $array_session_data = array();

	public function __construct() {
		if (!isset($_COOKIE["session"])) {
			return $this->create_session();
		} else {
			return $this->start_session();
		}
	}
	public function __destruct() {
		$this->close();
	}
	public function close() {
		global $database;
		global $message;

		if (!$this->closed) {
$message->add("Session debug - " . print_r($this->array_session_data, true));
			$this->closed = true;
			$query = "UPDATE `sessions` SET `data`=? WHERE `uuid`=?;";
			$array_variables = array(
				serialize($this->array_session_data),
				$this->session_uuid
			);
			$result = $database->query($query, $array_variables);
		}
	}
	private function create_uuid() {
		global $database;

		$fp = fopen("/dev/urandom", "rb");
		stream_set_read_buffer($fp, 16);

		if ($fp !== false) {
			$uuid = fread($fp, 16);
			fclose($fp);

			if ($uuid !== false || strlen($uuid) == 16) {
				$uuid[6] = chr(ord($uuid[6]) & 0x0f | 0x40); // set version to 0100
				$uuid[8] = chr(ord($uuid[8]) & 0x3f | 0x80); // set bits 6-7 to 10

				$query = "SELECT `id` FROM `sessions` WHERE `uuid`=?;";
				$array_variables = array(
					bin2hex($uuid)
				);
				$result = $database->query($query, $array_variables);

				if ($result !== false && $database->num_rows($result) === 0) {
					return bin2hex($uuid);
				}
			}
		}

		return false;
	}
	private function create_session() {
		global $current_time;
		global $ip_address;
		global $user_agent;
		global $user_agent_hash;
		global $database;

		if (($uuid = $this->create_uuid()) === false) {
			// creating uuid failed, should never happen
			// logic could be added to handle these cases, such as looping, but a future page load will do the same thing
			//     it is possible that reading from /dev/urandom failed
			//     it is possible that uuid already exists, but that is very very rare
		} else {
			$query = "SELECT `hash` FROM `user_agents` WHERE `hash`=?;";
			$array_variables = array(
				$user_agent_hash
			);
			$result = $database->query($query, $array_variables);

			if ($result !== false && $database->num_rows($result) === 0) {
				$query = "INSERT INTO `user_agents` (`hash`, `user_agent`) VALUES (?, ?);";
				$array_variables = array(
					$user_agent_hash,
					$user_agent
				);
				$result = $database->query($query, $array_variables);
			}

			$expires = ($current_time + 3600); // expires in one hour
			$query = "INSERT INTO `sessions` (`uuid`, `created`, `expires`, `last_active`, `user_agent_hash`, `ip_address`) VALUES (?, ?, ?, ?, ?, ?);";
			$array_variables = array(
				$uuid,
				$current_time,
				$expires,
				$current_time,
				$user_agent_hash,
				$ip_address
			);
			$result = $database->query($query, $array_variables);

			if ($result === false) {
				// inserting session into database failed, should never happen
				// can be safely ignored, a future page load will attempt to create the session again
			} else {
				$this->session_uuid = $uuid;
				$this->array_session_data = array();
				setcookie("session", $uuid, $expires, "", "", true, true); // secure and http only flags set
				return true;
			}
		}

		return false;
	}
	private function start_session() {
		global $current_time;
		global $ip_address;
		global $user_agent_hash;
		global $database;

		if (isset($_COOKIE["session"]) && !empty($_COOKIE["session"]) && preg_match("/^[0-9a-z]+$/", $_COOKIE["session"])) { // matches strings containing only 0-9 and a-z
			$query = "SELECT `id`, `user_agent_hash`, `ip_address`, `data` FROM `sessions` WHERE `uuid`=?;";
			$array_variables = array(
				$_COOKIE["session"]
			);
			$result = $database->query($query, $array_variables);

			if ($result !== false && $database->num_rows($result) === 1) {
				$array_row = $database->fetch_array($result);

				if ($array_row !== false && is_array($array_row) && $array_row["user_agent_hash"] == $user_agent_hash && $array_row["ip_address"] == $ip_address) {
					if (empty($array_row["data"]) || (($this->array_session_data = unserialize($array_row["data"])) !== false && is_array($this->array_session_data))) {
						$expires = ($current_time + 3600); // expires in one hour
						$query = "UPDATE `sessions` SET `expires`=?, `last_active`=?  WHERE `id`=?;";
						$array_variables = array(
							$expires,
							$current_time,
							$array_row["id"]
						);
						$result = $database->query($query, $array_variables);

						//if ($result !== false && $database->affected_rows() === 1) { // if page is reloaded quickly or redirected, expires and last_active will be the same as the current values in the database, thus affected_rows = 0
						if ($result !== false) {
							$this->session_uuid = $_COOKIE["session"];
							setcookie("session", $_COOKIE["session"], $expires, "", "", true, true); // secure and http only flags set
							return true;
						}
					}
				}
			}
		}

		return $this->create_session();
	}
	public function isset($key) {
		if (array_key_exists($key, $this->array_session_data)) {
			return true;
		} else {
			return false;
		}
	}
	public function get($key) {
		if (array_key_exists($key, $this->array_session_data)) {
			return $this->array_session_data[$key];
		} else {
			return false;
		}
	}
	public function set($key, $value) {
		global $message;
$message->add("Session debug - " . $key . " " . $value);

		if (!empty($key)) {
			$this->array_session_data[$key] = $value;
$message->add("Session debug - " . print_r($this->array_session_data, true));
			return true;
		} else {
			return false;
		}
	}
	public function remove($key) {
		if (isset($this->array_session_data[$key])) {
			unset($this->array_session_data[$key]);
			return true;
		} else {
			return false;
		}
	}
}
