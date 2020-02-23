<?php

$title = "Login";
$html = "";
$html .= '<form action="post">' . "\n";
$html .= '	<input type="hidden" name="action" value="process" />' . "\n";
$html .= '	<label for="email_input">Email: </label><input id="email_input" type="text" name="email" /><br />' . "\n";
$html .= '	<label for="password_input">Password: </label><input id="password_input" type="password" name="password" /><br />' . "\n";
$html .= '	<input type="submit" value="Login" />' . "\n";
$html .= '</form>' . "\n";
