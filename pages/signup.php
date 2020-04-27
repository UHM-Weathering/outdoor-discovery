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

<style>
.valid {
  color: green;
}

.valid:before {
position: relative
left: -35px;
content: "✔";
}

.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>

<div class="ui text container">
  <h2 class="ui blue centered header">
    <div class="content">Sign Up</div>
  </h2>
  <div class="ui segment" style="margin-bottom: 30px">
    <form class="ui large form" action="" method="post">
      <input type="hidden" name="action" value="process">
      <div class="field">
        <label>Email</label>
        <input type="text" name="email" placeholder="Email">
      </div>
      <div class="field">
        <label for="psw">Password</label>
        <input id="psw" type="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
      </div>
      <div class="ui tiny message" id="message" style="display: none">
        <div class="header">
          Password must contain:
        </div>
        <ul class="ui list">
          <li id="length" class="invalid">At least 8 characters</li>
          <li id="capital" class="invalid">At least 1 uppercase letter</li>
          <li id="lowercase" class="invalid">At least 1 lowercase letter</li>
          <li id="number" class="invalid">At least 1 digit</li>
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

<script>
let myInput = document.getElementById("psw");
let length = document.getElementById("length");
let capital = document.getElementById("capital");
let lowercase = document.getElementById("lowercase");
let number = document.getElementById("number");
  
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

myInput.onkeyup = function() {
  let lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    lowercase.classList.remove("invalid");
    lowercase.classList.add("valid");
  } else {
    lowercase.classList.remove("valid");
    lowercase.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>

END;
?>
