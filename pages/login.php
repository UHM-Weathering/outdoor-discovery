<?php

$page_title = "Login";

if($user -> is_logged_in()) {
  	$server_protocol = (isset($_SERVER["SERVER_PROTOCOL"]) ? $_SERVER["SERVER_PROTOCOL"] : "HTTP/1.0");
	$location = "https://" . $_SERVER['HTTP_HOST'] . (isset($_SERVER["REQUEST_URI"]) ? strtok($_SERVER["REQUEST_URI"], '?')  : "") . "?page=my_account";
	header($server_protocol . " 302 Moved Temporarily");
	header("Location: " . $location);
	die();
}

if(isset($_POST["action"]) && $_POST["action"] == "process") {
  if($user -> process_login($_POST["email"], $_POST["password"])) {
    //redirect 302, Location
  	$server_protocol = (isset($_SERVER["SERVER_PROTOCOL"]) ? $_SERVER["SERVER_PROTOCOL"] : "HTTP/1.0");
	$location = "https://" . $_SERVER['HTTP_HOST'] . (isset($_SERVER["REQUEST_URI"]) ? strtok($_SERVER["REQUEST_URI"], '?')  : "") . "?page=my_account";
	header($server_protocol . " 302 Moved Temporarily");
	header("Location: " . $location);
	die();
  }
}


$html = <<<END
<style type=text/css>
  .column {
    max-width: 450px;
  }
</style>
<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui blue header">
      <div class="content">Login</div>
    </h2>
    <form class="ui large form" action="" method="post">
      <div class="ui segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input id="email_input" type="text" name="email" placeholder="Email">
          </div>
        </div>
        <input type="hidden" name="action" value="process">
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input id="password_input" type="password" name="password" placeholder="Password">
          </div>
        </div>
        <button class="ui fluid large blue submit button button" type="submit">Submit</button>
      </div>

    </form>
  </div>
</div>

END;
?>

