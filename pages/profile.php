<?php

$page_title = "Profile";

if (!$user->is_logged_in()) {
  	$server_protocol = (isset($_SERVER["SERVER_PROTOCOL"]) ? $_SERVER["SERVER_PROTOCOL"] : "HTTP/1.0");
	$location = "https://" . $_SERVER['HTTP_HOST'] . (isset($_SERVER["REQUEST_URI"]) ? strtok($_SERVER["REQUEST_URI"], '?')  : "") . "?page=login";
	header($server_protocol . " 302 Moved Temporarily");
	header("Location: " . $location);
	die();
}

$html = <<<END
<style type=text/css>
  .ui container {
    margin-top: 20px;
    margin-left: 20px;
  }
</style>
<div class="ui container">
  <div class="ui grid">
    <div class="five wide column">
      <div class="ui fluid card">
        <div class="image">
          <img src="../html/images/surf.svg">
        </div>
        <div class="content">
          <a class="header">Dewey Havtoo</a>
          <div class="meta">
            <span class="date">Joined in 2013</span>
          </div>
        </div>
        <div class="extra content">
          <a>
            <i class="tree icon"></i>
            3 Events
          </a>
        </div>
      </div>
    </div>
    <div class="eleven wide column">
      <div class="ui segment">
        <h3>Account Info</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lectus quam id leo in vitae turpis massa sed elementum. Fringilla urna porttitor rhoncus dolor purus non. Suscipit tellus mauris a diam maecenas. Quam adipiscing vitae proin sagittis nisl rhoncus. Tempor nec feugiat nisl pretium fusce id velit. Tortor consequat id porta nibh venenatis cras sed felis. Egestas congue quisque egestas diam in. Non enim praesent elementum facilisis leo vel fringilla. Nunc faucibus a pellentesque sit amet porttitor eget. Etiam tempor orci eu lobortis elementum nibh tellus molestie. Eget nulla facilisi etiam dignissim diam quis. Vel pretium lectus quam id leo. Sed faucibus turpis in eu mi bibendum neque egestas congue. Consequat semper viverra nam libero justo laoreet sit. Quisque egestas diam in arcu cursus euismod quis viverra. Sodales ut etiam sit amet nisl purus in mollis nunc. Neque laoreet suspendisse interdum consectetur libero id faucibus nisl tincidunt. Ultrices vitae auctor eu augue ut lectus arcu bibendum. Nunc id cursus metus aliquam eleifend mi. Augue neque gravida in fermentum. Viverra suspendisse potenti nullam ac tortor vitae purus faucibus. Sapien eget mi proin sed. Mi ipsum faucibus vitae aliquet nec ullamcorper sit. Sed cras ornare arcu dui vivamus. Congue eu consequat ac felis donec.</p>
      </div>
      <div class="ui segment" style="margin-bottom: 40px">
        <h3>Registered Events</h3>
        <div class="ui relaxed list">

END;


$query = "SELECT `id`, `created`, `event_name`, `description` FROM `events`;";
$result = $database->query($query);

while($array_row = $database->fetch_array($result)) {
	// $html .= "<div>Row: " . $array_row["id"] . ", " . $array_row["created"] . ", " . $array_row["event_name"] . ", " . $array_row["description"] . "</div>\n";
  $html .= '
          <div class="item">
            <div class="ui grid">
              <div class="ten wide column">
                <div class="content">
                  <a href="index.php?page=event" class="header">' . $array_row["event_name"] . '</a>
                  ' . $array_row["description"] . '
                </div>
              </div>
              <div class="six wide column">
                <button class="ui right floated small button">Unregister</button>
              </div>
            </div>
          </div>';
}

$html .= <<<END
        </div>
      </div>
    </div>
  </div>
</div>
END;

?>
