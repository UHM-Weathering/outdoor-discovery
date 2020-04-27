<?php

class event {
	
	public function create_event($name, $start_date, $end_date, $location, $max_participants, $description) {
		global $current_time;
		global $message;
		global $database;

		$error = null;
		$query = "INSERT INTO `events` (`created`, `created_by`, `modified`, `modified_by`, `event_name`, `event_start`, `event_end`, `event_location`, `max_participants`, `description`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
				$array_variables = array(
					$current_time,
					2,
					$current_time,
					2,
					$name,
					$start_date,
					$end_date,
					$location,
					$max_participants,
					$description
				);
		$result = $database->query($query, $array_variables);
	}
	
}
