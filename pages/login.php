<?php

$title = "Login";

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
    <form class="ui large form" action="post">
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

