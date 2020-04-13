<?php

$page_title = "Event";

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
          <img src="../images/surf.svg">
        </div>
        <div class="content">
          <a href="https://manoa.hawaii.edu/studentrec/outdoored/classes.html" class="header" target="_blank">
            Beginning Surfing
          </a>
        </div>
      </div>
    </div>
    <div class="eleven wide column">
      <div class="ui segment">
        <h3>Event Info</h3>
        <p>
          <strong>
            Learn the water sport of Hawai'i!! This class is for beginners and transportation and equipment are provided. Participants must be pass a basic swimming test before signing up. Please click 
              <a href="https://manoa.hawaii.edu/studentrec/outdoored/NEW_SWIM_TEST_POLICY.pdf" target="_blank">here</a>
            for the flyer.
          </strong>
        </p>
        <h3>One Day Classes</h3>
        <p>$30 UHM Student & WRC Members</p>
        <p>$35 Faculty, Staff, & Guest (must be a guest of UH participant)</p>
        <p>**The maximum amount of spots per surfing class is 6.** Classes are held at Diamond Head.</p>
      </div>
      <table class="ui striped structured celled table">
        <thead>
          <tr>
            <th rowspan="2">Date & Time</th>
            <th rowspan="2">Openings</th>
            <th colspan="2">Registration</th>
            <th colspan="2">Payment</th>
          </tr>
          <tr>
            <th>Deadline</th>
            <th>Status</th>
            <th>Deadline</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td data-label="Date & Time">Apr 19 Sun (7:30am-10:30am)</td>
            <td data-label="Openings">4</td>
            <td>Apr 19 Sun @ 7:30am</td>
            <td class="center aligned">
              <i class="large green checkmark icon"></i>
            </td>
            <td>Apr 19 Sun @ 7:30am</td>
            <td class="center aligned">
              <i class="large red attention icon"></i>
            </td>
          </tr>
          <tr>
            <td data-label="Date & Time">May 1 Fri (3:00pm-6:00pm)</td>
            <td data-label="Openings">6</td>
            <td>May 1 Fri @ 3:00pm</td>
            <td class="center aligned">
            </td>
            <td>May 1 Fri @ 3:00pm</td>
            <td class="center aligned">
            </td>
          </tr>
        </tbody>
      </table>



<!--
        <div class="ui large relaxed list">
          <div class="item">
            <div class="ui grid">
              <div class="ten wide column">
                <div class="content">
                  <div class="header">Apr 19 Sun (7:30am-10:30am)</div>
                  Openings: 3
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="ui grid">
              <div class="ten wide column">
                <div class="content">
                  <div class="header">May 1 Fri (3:00pm-6:00pm)</div>
                  Openings: 1
                </div>
              </div>
            </div>
          </div>
        </div>
-->
    </div>
  </div>
</div>
END;

?>
