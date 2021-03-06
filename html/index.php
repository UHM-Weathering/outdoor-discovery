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
} elseif ($_GET["page"] == "event") {
	require_once(rtrim(dirname(__DIR__ . "../"), "/") . "/pages/event.php");
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

<div class="ui container">
	<div class="ui medium top fixed pointing menu">
		<?php
			if("OUTDOOR DISCOVERY" === $page_title) {
				echo '<a href="index.php" class="active item">
				OUTDOOR DISCOVERY
				</a>';
			} else {
				echo '<a href="index.php" class="item">
				OUTDOOR DISCOVERY
				</a>';
			}
		?>
		<?php
			if("Event Listing" === $page_title) {
				echo '<a href="index.php?page=eventlist" class="active item">
				Events
				</a>';
			} else {
				echo '<a href="index.php?page=eventlist" class="item">
				Events
				</a>';
			}
		?>
		<?php
			if ($user->is_logged_in()) {
				if("Profile" === $page_title) {
					echo '<a href="index.php?page=profile" class="active item">
					Profile
					</a>';
				} else {
					echo '<a href="index.php?page=profile" class="item">
					Profile
					</a>';
				}
			}
		?>
		<?php
			if ($user->is_admin_user()) {
				if("Add Event" === $page_title) {
					echo '<a href="index.php?page=addevent" class="active item">
					Add Event
					</a>';
				} else {
					echo '<a href="index.php?page=addevent" class="item">
					Add Event
					</a>';
				}
			}
		?>
		<div class="right menu">
			<div class="item">
				<?php
					if ($user->is_logged_in()) {
						echo '<a href="index.php?page=sign_out" class="ui primary basic button">
						Sign out
						</a>';
					} else {
						echo '<a href="index.php?page=login" class="ui primary basic button">
						Sign in
						</a>';
					}
				?>    
			</div>
		</div>
	</div>
	<div style="height: 40px;"></div>
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
  
  

<div class="footer" style="position: sticky; left: 0; bottom: 0; width: 100%; background-color: #f5f5f5; text-align: center">
  <div class="ui center aligned container" style="padding-top: 10px; padding-bottom: 10px">
    <div class="ui grid">
      <div class="eight wide column">
        <h4 class="ui header">Navigation</h4>
        <div class="ui link list">
          <a class="item" href="index.php">Home</a>
          <a class="item" href="index.php?page=eventlist">Events</a>
          <a class="item" href="index.php?page=profile">Profile</a>
        </div>
      </div>
      <div class="eight wide column">
        <h4 class="ui header">Learn More</h4>
        <div class="ui link list">
          <a class="item" href="https://github.com/UHM-Weathering/outdoor-discovery">GitHub</a>
          <a class="item" href="https://github.com/UHM-Weathering/outdoor-discovery/wiki">Wiki</a>
        </div>
      </div>
    </div>
    <div class="ui section divider"></div>
    <p>Created for ICS 427</p>
  </div>

</div>
</body>

</html>
