<?php

$page_title = "Sign Up";

if ($user->is_logged_in()) {
  	$server_protocol = (isset($_SERVER["SERVER_PROTOCOL"]) ? $_SERVER["SERVER_PROTOCOL"] : "HTTP/1.0");
	$location = "https://" . $_SERVER['HTTP_HOST'] . (isset($_SERVER["REQUEST_URI"]) ? strtok($_SERVER["REQUEST_URI"], '?')  : "") . "?page=profile";
	header($server_protocol . " 302 Moved Temporarily");
	header("Location: " . $location);
	die();
}
if (isset($_POST["action"]) && $_POST["action"] == "process") {
	if ($user->create_user($_POST["email"], $_POST["password"], $_POST["password2"])) {
		$server_protocol = (isset($_SERVER["SERVER_PROTOCOL"]) ? $_SERVER["SERVER_PROTOCOL"] : "HTTP/1.0");
		$location = "https://" . $_SERVER['HTTP_HOST'] . (isset($_SERVER["REQUEST_URI"]) ? strtok($_SERVER["REQUEST_URI"], '?')  : "") . "?page=profile";
		header($server_protocol . " 302 Moved Temporarily");
		header("Location: " . $location);
		die();
	}
}

$html = <<<END


<div class="ui text container">
  <h2 class="ui blue centered header">
    <div class="content">Sign Up</div>
  </h2>
  <div class="ui segment">
    <form class="ui large form" action="" method="post">
      <input type="hidden" name="action" value="process">
      <div class="field">
        <label>Email</label>
        <input type="text" name="email" placeholder="Email">
      </div>
      <div class="field">
        <label>Password</label>
        <input type="password" name="password" placeholder="Password">
      </div>
      <div class="ui tiny message">
        <div class="header">
          Password must contain:
        </div>
        <ul class="ui list">
          <li>At least 8 characters</li>
          <li>At least 1 uppercase letter</li>
          <li>At least 1 lowercase letter</li>
          <li>At least 1 digit</li>
        </ul>
      </div>
      <div class="field">
        <label>Confirm Password</label>
        <input type="password" name="password2" placeholder="Confirm Password">
      </div>
      <button class="ui primary button" style="margin: 0 auto; display: block; width: 25%">
        Register
      </button>
    </form>
  </div>
</div>



END;
?>