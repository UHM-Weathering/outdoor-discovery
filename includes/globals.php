<?php

if (!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on") {
	$server_protocol = (isset($_SERVER["SERVER_PROTOCOL"]) ? $_SERVER["SERVER_PROTOCOL"] : "HTTP/1.0");
	$location = "https://" . $_SERVER['HTTP_HOST'] . (isset($_SERVER["REQUEST_URI"]) ? $_SERVER["REQUEST_URI"] : "");
	header($server_protocol . " 301 Moved Permanently");
	header("Location: ". $location);
	die();
}

$current_time = time();
$ip_address = (isset($_SERVER["REMOTE_ADDR"]) ? $_SERVER["REMOTE_ADDR"] : "");
$user_agent = (isset($_SERVER["HTTP_USER_AGENT"]) ? $_SERVER["HTTP_USER_AGENT"] : "");
$user_agent_hash = hash("sha256", $user_agent);

require_once("database.php");
require_once("message.php");
require_once("session.php");
require_once("user.php");
require_once("event.php");

$message = new message;
$database = new database;
$session = new session;
$user = new user;
$event = new event;
