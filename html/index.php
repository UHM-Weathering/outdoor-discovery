<?php

require_once(rtrim(dirname(__DIR__ . "../"), "/") . "/includes/globals.php");

if (!isset($_GET["page"])) {
	require_once(rtrim(dirname(__DIR__ . "../"), "/") . "/pages/home.php");
} else if ($_GET["page"] == "login") {
	require_once(rtrim(dirname(__DIR__ . "../"), "/") . "/pages/login.php");
} else if ($_GET["page"] == "signup") {
    require_once(rtrim(dirname(__DIR__ . "../"), "/") . "/pages/signup.php");
} else {
	require_once(rtrim(dirname(__DIR__ . "../"), "/") . "/pages/404.php");
}
?>

<!doctype html>
<html>

<head>
  <title><?php echo (isset($page_title) ? $page_title . " - " : "") . "UHM Weathering"; ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
</head>

<body>

<?php
echo $html;

echo "<h2>Debug</h2>\n";

unset($session); // will call __destruct() and allow for UPDATE query to be shown
$array_messages = $message->get();

if (is_array($array_messages) && !empty($array_messages)) {
	echo "<ul>\n";

	foreach ($array_messages as $value) {
		echo "<li>" . $value . "</li>\n";
	}

	echo "</ul>\n";
}
?>
</body>

</html>
