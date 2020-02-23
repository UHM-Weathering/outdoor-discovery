<?php

class database {
	private $mysqli;

	public function __construct() {
		$this->mysqli = new mysqli();
		$this->mysqli->init();
		$this->mysqli->real_connect("DATABASE_HOSTNAME", "DATABASE_USER", "PASSWORD", "DATABASE_NAME", "DATABASE_PORT");

		if ($this->conn_errors()) {
			return false;
		}

		return true;
	}
	public function __destruct() {
		if (!$this->conn_errors()) {
			$this->mysqli->close();
		}

		return true;
	}
	public function conn_errors() {
		if (isset($this->mysqli->connect_error) && $this->mysqli->connect_error !== null) {
			return true;
		} else {
			return false;
		}
	}
	public function real_escape_string($string) {
		if (!$this->conn_errors()) {
			return $this->mysqli->real_escape_string($string);
		}

		return false;
	}
	public function insert_id() {
		if (!$this->conn_errors()) {
			return $this->mysqli->insert_id;
		}

		return false;
	}
	public function affected_rows() {
		if (!$this->conn_errors()) {
			return $this->mysqli->affected_rows;
		}

		return false;
	}
	public function query($query, $array_variables = null) {
		if (!$this->conn_errors()) {
			$error = null;
			$escaped_query = null;

			if (!is_string($query)) {
				$error = "illegal_query";
			} else if (empty($query)) {
				$error = "empty_query";
			} else if (!empty($array_variables) && !is_array($array_variables)) {
				$error = "illegal_array_variables";
			} else {
				$question_mark_count = substr_count($query, "?");
				$array_variables_count = (is_array($array_variables) ? count($array_variables) : 0);

				if ($question_mark_count != $array_variables_count) {
					$error = "incorrect_variables_count";
				} else {
					$escaped_query = $query;

					if ($question_mark_count > 0) {
						foreach ($array_variables as $data) {
							$escaped_query = preg_replace("/[?]/", ($data === null ? "NULL" : "'" . $this->real_escape_string($data) . "'"), $escaped_query, 1);
						}
					}

					$result = $this->mysqli->query($escaped_query);

					if ($result !== false) {
						return $result;
					}
				}
			}
		}

		return false;
	}
	public function num_rows($result) {
		if (!$this->conn_errors() && $result !== false && !empty($result)) {
			return $result->num_rows;
		}

		return false;
	}
	public function fetch_array($result) {
		if (!$this->conn_errors() && $result !== false && !empty($result)) {
			return $result->fetch_array();
		}

		return false;
	}
}
