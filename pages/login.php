<?php

$page_title = "Login";

if ($user->is_logged_in()) {
  	$server_protocol = (isset($_SERVER["SERVER_PROTOCOL"]) ? $_SERVER["SERVER_PROTOCOL"] : "HTTP/1.0");
	$location = "https://" . $_SERVER['HTTP_HOST'] . (isset($_SERVER["REQUEST_URI"]) ? strtok($_SERVER["REQUEST_URI"], '?')  : "") . "?page=profile";
	header($server_protocol . " 302 Moved Temporarily");
	header("Location: " . $location);
	die();
}
if (isset($_POST["action"]) && $_POST["action"] == "process") {
	if ($user->process_login($_POST["email"], $_POST["password"])) {
		$server_protocol = (isset($_SERVER["SERVER_PROTOCOL"]) ? $_SERVER["SERVER_PROTOCOL"] : "HTTP/1.0");
		$location = "https://" . $_SERVER['HTTP_HOST'] . (isset($_SERVER["REQUEST_URI"]) ? strtok($_SERVER["REQUEST_URI"], '?')  : "") . "?page=profile";
		header($server_protocol . " 302 Moved Temporarily");
		header("Location: " . $location);
		die();
	}
}

$html = <<<END
<div class="ui middle aligned center aligned grid">
  <div class="column" style="max-width: 450px;">
    <h2 class="ui blue header">
      <div class="content">Login</div>
    </h2>
    <form class="ui large form" action="" method="post">
      <input type="hidden" name="action" value="process">
      <div class="ui segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input id="email_input" type="text" name="email" placeholder="Email">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input id="password_input" type="password" name="password" placeholder="Password">
          </div>
        </div>
        <button class="ui fluid large blue submit button button" type="submit">Submit</button>
        <div class="ui horizontal divider">OR</div>
        <a href="index.php?page=signup" class="ui fluid large button">Create Account</a>
      </div>
    </form>
  </div>
</div>
END;
