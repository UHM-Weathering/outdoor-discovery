<?php

class user {
	public function is_logged_in() {
		global $session;

		if ($session->isset("users_id")) {
			return true;
		} else {
			return false;
		}
	}
	public function is_admin_user() {
		global $database;
		global $session;

		if ($session->isset("users_id")) {
			$query = "SELECT `permissions` FROM `users` WHERE `id`=?;";
			$array_variables = array(
				$session->get("users_id")
			);
			$result = $database->query($query, $array_variables);

			if ($result !== false && $database->num_rows($result) === 1) {
				$array_row = $database->fetch_array($result);

				if ($array_row !== false && is_array($array_row) && !empty($array_row["permissions"])) {
					$array_permissions = explode(",", $array_row["permissions"]);

					if (in_array("admin", $array_permissions)) {
						return true;
					}
				}
			}
		}

		return false;
	}
	private function test_password_complexity($password) {
		if (strlen($password) < 8 ||
			!preg_match("/[0-9]+/", $password) ||
			!preg_match("/[a-z]+/", $password) ||
			!preg_match("/[A-Z]+/", $password)) {
			return false;
		} else {
			return true;
		}
	}
	private function create_salt() {
		$fp = fopen("/dev/urandom", "rb");
		stream_set_read_buffer($fp, 16);

		if ($fp !== false) {
			$salt = fread($fp, 32);
			fclose($fp);

			if ($salt !== false || strlen($salt) == 32) {
				return bin2hex($salt);
			}
		}

		return false;
	}
	private function hash_password($salt, $password) {
		$binary_salt = hex2bin($salt);

		for ($i = 0; $i < 10000; $i++) {
			if ($i === 0) {
				$binary_password_hash = hash("sha256", $binary_salt . $password, true);
			} else {
				$binary_password_hash = hash("sha256", $binary_salt . $binary_password_hash, true);
			}
		}

		return bin2hex($binary_password_hash);
	}
	public function create_user($email, $password, $confirm_password) {
		global $current_time;
		global $message;
		global $database;

		$error = null;

		if (empty($email)) {
			$error = "empty email";
		} else if (empty($password)) {
			$error = "empty password";
		} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error = "invalid email";
		} else if (!preg_match("/^.*@hawaii.edu$/", $email)) {
			$error = "please use your @hawaii.edu email";
		} else if (!$this->test_password_complexity($password)) {
			$error = "password must be 8 or more characters long and contain at least 1 uppercase letter, 1 lowercase letter and 1 digit";
		} else if ($password != $confirm_password) {
			$error = "password do not match";
		} else {
			$query = "SELECT `id` FROM `users` WHERE `email`=?;";
			$array_variables = array(
				$email
			);
			$result = $database->query($query, $array_variables);

			if ($result !== false && $database->num_rows($result) === 0) {
				$password_salt = $this->create_salt();
				$query = "INSERT INTO `users` (`created`, `email`, `email_history`, `password_salt`, `password_hash`) VALUES (?, ?, ?, ?, ?);";
				$array_variables = array(
					$current_time,
					$email,
					serialize(array($current_time => $email)),
					$password_salt,
					$this->hash_password($password_salt, $password)
				);
				$result = $database->query($query, $array_variables);

				if ($result !== false) {
					return $this->process_login($email, $password);
				} else {
					$error = "please try again later"; // database query failed
				}
			} else {
				$error = "email already in use"; // database query could have failed, but unlikely
			}
		}

		$message->add("Creating account failed - " . $error);
		return false;
	}
	public function process_login($email, $password) {
		global $current_time;
		global $ip_address;
		global $user_agent_hash;
		global $message;
		global $database;
		global $session;

		$error = null;

		if ($session->isset("users_id")) {
			$error = "already logged in";
		} else if (empty($email)) {
			$error = "empty email";
		} else if (empty($password)) {
			$error = "empty password";
		} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error = "invalid email";
		} else if (!$this->test_password_complexity($password)) {
			$error = "password must be 8 or more characters long and contain at least 1 uppercase letter, 1 lowercase letter and 1 digit";
		} else {
			$query = "SELECT `id`, `password_salt`, `password_hash` FROM `users` WHERE `email`=?;";
			$array_variables = array(
				$email
			);
			$result = $database->query($query, $array_variables);

			if ($result !== false && $database->num_rows($result) === 1) {
				$array_row = $database->fetch_array($result);

				if ($this->hash_password($array_row["password_salt"], $password) == $array_row["password_hash"]) {
					$query = "INSERT INTO `login_logs` (`created`, `ip_address`, `user_agent_hash`, `users_id`) VALUES (?, ?, ?, ?);";
					$array_variables = array(
						$current_time,
						$ip_address,
						$user_agent_hash,
						$array_row["id"]
					);
					$result = $database->query($query, $array_variables);

					$session->set("users_id", $array_row["id"]);
					return true;
				} else {
					$error = "incorrect password";
				}
			} else {
				$error = "no account linked to email"; // database query could have failed, but unlikely
			}
		}

		$message->add("Processing login failed - " . $error);
		return false;
	}
	public function process_logout() {
		global $session;

		$session->remove("users_id");
		return true;
	}
}
