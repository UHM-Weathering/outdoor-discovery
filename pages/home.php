<?php

$page_title = "Home";
$html = "";
$html .= '<h1>UHM Weathering</h1>' . "\n";
$html .= '<a href="index.php?page=login">Login Page</a>' . "\n";

// sample insert
$query = "INSERT INTO `testing` (`created`, `data`) VALUES (?, ?);";
$array_variables = array(
	$current_time,
	"foo"
);
$result = $database->query($query, $array_variables);
$insert_id = $database->insert_id();
$html .= "<div>Inserted ID: " . $insert_id . "</div>\n";

// sample select
$query = "SELECT `id`, `created`, `data` FROM `testing`;";
$result = $database->query($query);
$html .= "<div>Number of rows: " . $database->num_rows($result) . "</div>\n";

while($array_row = $database->fetch_array($result)) {
	$html .= "<div>Row: " . $array_row["id"] . ", " . $array_row["created"] . ", " . $array_row["data"] . "</div>\n";
}

// sample update
$query = "UPDATE `testing` SET `data`=? WHERE `id`=?;";
$array_variables = array(
	"bar",
	$insert_id
);
$result = $database->query($query, $array_variables);
$html .= "<div>Affected rows: " . $database->affected_rows() . "</div>\n";
