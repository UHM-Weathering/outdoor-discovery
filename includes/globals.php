<?php

$current_time = time();
$ip_address = (isset($_SERVER["REMOTE_ADDR"]) ? $_SERVER["REMOTE_ADDR"] : "");
$user_agent = (isset($_SERVER["HTTP_USER_AGENT"]) ? $_SERVER["HTTP_USER_AGENT"] : "");
$user_agent_hash = hash("sha256", $user_agent);

require_once("database.php");
require_once("session.php");
require_once("user.php");

$database = new database;
$session = new session;
$user = new user;
