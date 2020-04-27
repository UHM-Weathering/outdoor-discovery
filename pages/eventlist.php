<?php

$page_title = "Event Listing";
$html = <<<END
<style type=text/css>
  .ui container {
    margin-top: 20px;
    margin-left: 20px;
  }
</style>
<div class="ui divided items container">
END;

if ($user->is_admin_user()) {
  $html .= <<<END
    <div class="item">
      <div class="extra">
        <a href="index.php?page=addevent" class="ui right floated green button">Add Event</a>
      </div>
    </div>
END;
}

$query = "SELECT `id`, `created`, `event_name`, `description` FROM `events`;";
$result = $database->query($query);
// $html .= "<div>Number of rows: " . $database->num_rows($result) . "</div>\n";




while($array_row = $database->fetch_array($result)) {
	// $html .= "<div>Row: " . $array_row["id"] . ", " . $array_row["created"] . ", " . $array_row["event_name"] . ", " . $array_row["description"] . "</div>\n";
  $html .= '
    <div class="item">
      <div class="image">
        <img src="../html/images/surf.svg">
      </div>
      <div class="content">
        <a href="index.php?page=event" class="header">' . $array_row["event_name"] . '</a>
        <div class="meta">
          <span class="time">' . $array_row["event_start"] . " - " . $array_row["event_end"] . '</span>
        </div>
        <div class="description">
          <p>' . $array_row["description"] . '</p>
        </div>
        <div class="extra">';

  if ($user->is_admin_user()) {
    $html .= '
          <a href="index.php?page=editevent" class="ui right floated button">
            Edit Event
            <i class="right edit outline icon"></i>
          </a>';
  }

  $html .= '
        </div>
      </div>
    </div>';
}

$html .= '
  </div>
  ';

// <div class="item">
//   <div class="image">
//     <img src="https://images.freeimages.com/images/large-previews/5c1/beer-1326297.jpg">
//   </div>
//   <div class="content">
//     <a href="index.php?page=event" class="header">My Neighbor Totoro</a>
//     <div class="meta">
//       <span class="cinema">IFC Cinema</span>
//     </div>
//     <div class="description">
//       <p>Cute dogs come in a variety of shapes and sizes. Some cute dogs are cute for their adorable faces, others for their tiny stature, and even others for their massive size.</p>
//       <p>Many people also have their own barometers for what makes a cute dog.</p>
//     </div>
//     <div class="extra">
//       <div class="ui right floated primary button">
//         Buy tickets
//         <i class="right chevron icon"></i>
//       </div>
// END;
// if ($user->is_admin_user()) {
//   $html .= <<<END
//         <a href="index.php?page=editevent" class="ui right floated button">
//           Edit Event
//           <i class="right edit outline icon"></i>
//         </a>
// END;
// }
// $html .= <<<END
//       <div class="ui label">Limited</div>
//     </div>
//   </div>
// </div>
// <div class="item">
//   <div class="image">
//     <img src="https://images.freeimages.com/images/large-previews/5c1/beer-1326297.jpg">
//   </div>
//   <div class="content">
//     <a href="index.php?page=event" class="header">Watchmen</a>
//     <div class="meta">
//       <span class="cinema">IFC</span>
//     </div>
//     <div class="description">
//       <p>Cute dogs come in a variety of shapes and sizes. Some cute dogs are cute for their adorable faces, others for their tiny stature, and even others for their massive size.</p>
//       <p>Many people also have their own barometers for what makes a cute dog.</p>
//     </div>
//     <div class="extra">
//       <div class="ui right floated primary button">
//         Buy tickets
//         <i class="right chevron icon"></i>
//       </div>
// END;
// if ($user->is_admin_user()) {
//   $html .= <<<END
//         <a href="index.php?page=editevent" class="ui right floated button">
//           Edit Event
//           <i class="right edit outline icon"></i>
//         </a>
// END;
// }
// $html .= <<<END
//       </div>
//     </div>
//   </div>
// </div>
// END;

?>