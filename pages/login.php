<?php

$title = "Login";

$html = <<<END
<div class="ui container">
  <form class="ui form" action="post">
    <div class="field">
      <label for="email_input">Email</label>
      <input id="email_input" type="text" name="email" placeholder="Email">
    </div>
    <input type="hidden" name="action" value="process">
    <div class="field">
      <label for="password_input">Password: </label>
      <input id="password_input" type="password" name="password" placeholder="Password">

    </div>
    <button class="ui button" type="submit">Submit</button>
  </form>
</div>
END;
?>

