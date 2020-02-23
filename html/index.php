<?php

require_once(rtrim(dirname(__DIR__ . "../"), "/") . "/includes/globals.php");

if (!isset($_GET["page"])) {
	require_once(rtrim(dirname(__DIR__ . "../"), "/") . "/pages/home.php");
} else if ($_GET["page"] == "login") {
	require_once(rtrim(dirname(__DIR__ . "../"), "/") . "/pages/login.php");
} else {
	require_once(rtrim(dirname(__DIR__ . "../"), "/") . "/pages/404.php");
}

echo "<html>\n";
echo "<head>\n";
echo "	<title>" . (isset($page_title) ? $page_title . " - " : "") . "UHM Weathering</title>\n";
echo "</head>\n";

echo "<body>\n";
echo "	<div>\n";
echo "	Header\n";
echo "	</div>\n";
echo $html;
echo "	<div>\n";
echo "	Footer\n";
echo "	</div>\n";
echo "</body>\n";
echo "</html>\n";
