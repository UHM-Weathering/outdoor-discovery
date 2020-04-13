<?php

$page_title = "Sign Out Successful";

if (!$user->is_logged_in()) {
  	$server_protocol = (isset($_SERVER["SERVER_PROTOCOL"]) ? $_SERVER["SERVER_PROTOCOL"] : "HTTP/1.0");
	$location = "https://" . $_SERVER['HTTP_HOST'] . (isset($_SERVER["REQUEST_URI"]) ? strtok($_SERVER["REQUEST_URI"], '?')  : "") . "?page=login";
	header($server_protocol . " 302 Moved Temporarily");
	header("Location: " . $location);
	die();
} else {
	$user->process_logout();
}

$html = <<<END
<div class="ui text container">
	<h2 class="ui blue centered header">Sign Out Successful</div></h2>
	</p> You have been signed out of your account.
</div>
END;
