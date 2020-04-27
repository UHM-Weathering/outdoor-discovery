<?php

$page_title = "Home";
$html = <<<END
<style type=text/css>
  .ui container {
    margin-top: 20px;
    margin-left: 20px;
  }
</style>
<div class="container" style="padding: 14rem 0; background: url('../html/images/surf.svg') no-repeat right 0, linear-gradient(180deg, rgba(253,250,207,0.3617822128851541) 0%, rgba(253,250,207,0) 100%); background-size: 37rem auto; background-color: white; background-position: 80% 60%; font-size: 1.3em;">
  <div style="margin: 0 auto; max-width: 90rem;">
    <div style="padding-right: 50rem; text-align: left">
      <h1 style="font-size: 3rem; line-height: 1.5;">Explore the island of Oahu</h1>
      <div style="font-size: 1.2em;">
        <p style="margin-bottom: 50px; margin-top: 25px;">
          The outdoor classes offered by UH Manoa’s Student Recreation Services are a great and inexpensive way for students to explore the island of Oahu.
        </p>
        <a href="index.php?page=signup" class="ui large primary button" style="background-color: #4c92ea">
          Sign up today!
          <i class="arrow right icon"></i>
        </a>
      </div>
    </div>
  </div>
</div>
<div>
</div>

END;

//$user->create_user("test@example.com", "passwordA1");
//$user->process_login("test@example.com", "passwordA1");

/* sample database queries
// sample insert
$query = "INSERT INTO `testing` (`created`, `data`) VALUES (?, ?);";
$array_variables = array(
	$current_time,
	"foo"
);
$result = $database->query($query, $array_variables);
$insert_id = $database->insert_id();
$html .= "<div>Inserted ID: " . $insert_id . "</div>\n";

// sample select
$query = "SELECT `id`, `created`, `data` FROM `testing`;";
$result = $database->query($query);
$html .= "<div>Number of rows: " . $database->num_rows($result) . "</div>\n";

while($array_row = $database->fetch_array($result)) {
	$html .= "<div>Row: " . $array_row["id"] . ", " . $array_row["created"] . ", " . $array_row["data"] . "</div>\n";
}

// sample update
$query = "UPDATE `testing` SET `data`=? WHERE `id`=?;";
$array_variables = array(
	"bar",
	$insert_id
);
$result = $database->query($query, $array_variables);
$html .= "<div>Affected rows: " . $database->affected_rows() . "</div>\n";
*/
?>