<?php
if (!$user->is_logged_in()) {
  	$server_protocol = (isset($_SERVER["SERVER_PROTOCOL"]) ? $_SERVER["SERVER_PROTOCOL"] : "HTTP/1.0");
	$location = "https://" . $_SERVER['HTTP_HOST'] . (isset($_SERVER["REQUEST_URI"]) ? strtok($_SERVER["REQUEST_URI"], '?')  : "") . "?page=login";
	header($server_protocol . " 302 Moved Temporarily");
	header("Location: " . $location);
	die();
}
if (!$user->is_admin_user()) {
  	$server_protocol = (isset($_SERVER["SERVER_PROTOCOL"]) ? $_SERVER["SERVER_PROTOCOL"] : "HTTP/1.0");
	$location = "https://" . $_SERVER['HTTP_HOST'] . (isset($_SERVER["REQUEST_URI"]) ? strtok($_SERVER["REQUEST_URI"], '?')  : "") . "?page=profile";
	header($server_protocol . " 302 Moved Temporarily");
	header("Location: " . $location);
	die();
}
if (isset($_POST["action"]) && $_POST["action"] == "process") {
  $event->create_event($_POST["event-name"], $_POST["start-month"] . $_POST["start-day"] . 2020, $_POST["end-month"] . $_POST["end-day"] . 2020, $_POST["event-location"], $_POST["max-participants"], $_POST["event-description"]);
}



$page_title = "Create Event";
$html = <<<END

<div class="ui container" style="padding-top: 10px">
    <form method="post" action="" class="ui form">
    <input type="hidden" name="action" value="process">
      <h2 class="ui dividing header">Event Information</h2>
      <div class="fields">
            <div class="six wide field">
                <label>Name</label>
                <input type="text" name="event-name" placeholder="Event Name" maxLength="64">
            </div>
            <div class="six wide field">
                <label>Event Location</label>
                <input type="text" name="event-location" placeholder="Event Location" maxLength="64">
            </div>
            <div class="six wide field">
                <label>Max Participants</label>
                <input type="text" name="max-participants" placeholder="Max Number of Participants" maxLength="10">
            </div>
      </div>
      <div class="wide field">
      <label>Event Start</label>
        <div class="two fields">
          <div class="field">
            <select class="ui fluid search dropdown" name="start-month">
              <option value="01">January</option>
              <option value="02">February</option>
              <option value="03">March</option>
              <option value="04">April</option>
              <option value="05">May</option>
              <option value="06">June</option>
              <option value="07">July</option>
              <option value="08">August</option>
              <option value="09">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
            </select>
          </div>
          <div class="field">
            <select class="ui fluid search dropdown" name="start-day">
              <option value="01">1</option>
              <option value="02">2</option>
              <option value="03">3</option>
              <option value="04">4</option>
              <option value="05">5</option>
              <option value="06">6</option>
              <option value="07">7</option>
              <option value="08">8</option>
              <option value="09">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
            </select>
          </div>
        </div>
      </div>
      <div class="wide field">
        <label>Event End</label>
        <div class="two fields">
          <div class="field">
            <select class="ui fluid search dropdown" name="end-month">
              <option value="01">January</option>
              <option value="02">February</option>
              <option value="03">March</option>
              <option value="04">April</option>
              <option value="05">May</option>
              <option value="06">June</option>
              <option value="07">July</option>
              <option value="08">August</option>
              <option value="09">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
            </select>
          </div>
          <div class="field">
            <select class="ui fluid search dropdown" name="end-day">
              <option value="01">1</option>
              <option value="02">2</option>
              <option value="03">3</option>
              <option value="04">4</option>
              <option value="05">5</option>
              <option value="06">6</option>
              <option value="07">7</option>
              <option value="08">8</option>
              <option value="09">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="19">19</option>
              <option value="20">20</option>
              <option value="21">21</option>
              <option value="22">22</option>
              <option value="23">23</option>
              <option value="24">24</option>
              <option value="25">25</option>
              <option value="26">26</option>
              <option value="27">27</option>
              <option value="28">28</option>
              <option value="29">29</option>
              <option value="30">30</option>
              <option value="31">31</option>
            </select>
          </div>
        </div>
      </div>
      <div class="field">
        <label>Event Details/Description</label>
        <textarea placeholder="Event Description....." name="event-description"></textarea>
      </div>
      <input type="submit" value="Create Event" class="ui button" type="submit"></input>
    </form>
</div>

END;


?>
