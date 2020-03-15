<?php

class message {
	private $array_messages = array();

	public function add($message) {
		if (!empty($message)) {
			$this->array_messages[] = $message;
		}
	}
	public function get() {
		return $this->array_messages;
	}
}
