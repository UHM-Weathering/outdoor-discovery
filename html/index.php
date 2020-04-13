<?php

require_once(rtrim(dirname(__DIR__ . "../"), "/") . "/includes/globals.php");

if (!isset($_GET["page"])) {
	require_once(rtrim(dirname(__DIR__ . "../"), "/") . "/pages/home.php");
} else if ($_GET["page"] == "login") {
	require_once(rtrim(dirname(__DIR__ . "../"), "/") . "/pages/login.php");
} else if ($_GET["page"] == "addevent") {
	require_once(rtrim(dirname(__DIR__ . "../"), "/") . "/pages/addevent.php");
} else if ($_GET["page"] == "signup") {
	require_once(rtrim(dirname(__DIR__ . "../"), "/") . "/pages/signup.php");
} else if ($_GET["page"] == "sign_out") {
	require_once(rtrim(dirname(__DIR__ . "../"), "/") . "/pages/sign_out.php");
} else if ($_GET["page"] == "eventlist") {
	require_once(rtrim(dirname(__DIR__ . "../"), "/") . "/pages/eventlist.php");
} else if ($_GET["page"] == "editevent") {
	require_once(rtrim(dirname(__DIR__ . "../"), "/") . "/pages/editevent.php");
} elseif ($_GET["page"] == "profile") {
    require_once(rtrim(dirname(__DIR__ . "../"), "/") . "/pages/profile.php");
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

<div>
  <div style="position: relative;">
    <h1 style="text-align: center; margin-top: 1em; margin-bottom: 1em;">OUTDOOR DISCOVERY</h1>
	<?php
		if ($user->is_logged_in()) {
			echo '<a href="index.php?page=sign_out" class="ui primary basic button" style="position: absolute; top: 50%; right: 50px; transform: translateY(-50%);">
			Sign out
		  	</a>';
		} else {
			echo '<a href="index.php?page=login" class="ui primary basic button" style="position: absolute; top: 50%; right: 50px; transform: translateY(-50%);">
			Login
		  	</a>';
		}
	?> 

  </div>
</div>

<?php
$session->close(); // allow for UPDATE sessions query to be shown, otherwise it happens in __destruct after page is sent to user
$array_messages = $message->get();

if (is_array($array_messages) && !empty($array_messages)) {
	echo "<h2>Messages</h2>\n";
	echo "<ul>\n";

	foreach ($array_messages as $value) {
		echo "<li>" . $value . "</li>\n";
	}

	echo "</ul>\n";
}

echo $html;
?>
</body>

</html>
