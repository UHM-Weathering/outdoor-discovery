<?php

$page_title = "Sign Up";
$html = <<<END


<div class="ui text container">
  <h2 class="ui blue centered header">
    <div class="content">Sign Up</div>
  </h2>
  <div class="ui segment">
    <form class="ui form">
      <div class="field">
        <label>Name</label>
          <div class="two fields">
            <div class="field">
              <input type="text" name="first-name" placeholder="First Name">
            </div>
            <div class="field">
              <input type="text" name="last-name" placeholder="Last Name">
            </div>
          </div>
      </div>
      <div class="field">
        <label>Email</label>
        <input type="text" name="email" placeholder="Email">
      </div>
      <div class="field">
        <label>Password</label>
        <input type="text" name="email" placeholder="Password">
      </div>
      <div class="field">
        <label>Confirm Password</label>
        <input type="text" name="email" placeholder="Confirm Password">
      </div>
      <button class="ui primary button" style="margin: 0 auto; display: block; width: 25%">
        Register
      </button>
    </form>
  </div>
</div>



END;
?>