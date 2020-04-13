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
$html .= <<<END
  <div class="item">
    <div class="image">
      <img src="https://images.freeimages.com/images/large-previews/5c1/beer-1326297.jpg">
    </div>
    <div class="content">
      <a class="header">12 Years a Slave</a>
      <div class="meta">
        <span class="cinema">Union Square 14</span>
      </div>
      <div class="description">
        <p>Cute dogs come in a variety of shapes and sizes. Some cute dogs are cute for their adorable faces, others for their tiny stature, and even others for their massive size.</p>
        <p>Many people also have their own barometers for what makes a cute dog.</p>
      </div>
      <div class="extra">
        <div class="ui right floated primary button">
          Buy tickets
          <i class="right chevron icon"></i>
        </div>
END;
if ($user->is_admin_user()) {
  $html .= <<<END
        <a href="index.php?page=editevent" class="ui right floated button">
          Edit Event
          <i class="right edit outline icon"></i>
        </a>
END;
}
$html .= <<<END
        <div class="ui label">Limited</div>
        <div class="ui label">IMAX</div>
        <div class="ui label"><i class="globe icon"></i> Additional Languages</div>
      </div>
    </div>
  </div>
<div class="item">
  <div class="image">
    <img src="https://images.freeimages.com/images/large-previews/5c1/beer-1326297.jpg">
  </div>
  <div class="content">
    <a class="header">My Neighbor Totoro</a>
    <div class="meta">
      <span class="cinema">IFC Cinema</span>
    </div>
    <div class="description">
      <p>Cute dogs come in a variety of shapes and sizes. Some cute dogs are cute for their adorable faces, others for their tiny stature, and even others for their massive size.</p>
      <p>Many people also have their own barometers for what makes a cute dog.</p>
    </div>
    <div class="extra">
      <div class="ui right floated primary button">
        Buy tickets
        <i class="right chevron icon"></i>
      </div>
END;
if ($user->is_admin_user()) {
  $html .= <<<END
        <a href="index.php?page=editevent" class="ui right floated button">
          Edit Event
          <i class="right edit outline icon"></i>
        </a>
END;
}
$html .= <<<END
      <div class="ui label">Limited</div>
    </div>
  </div>
</div>
<div class="item">
  <div class="image">
    <img src="https://images.freeimages.com/images/large-previews/5c1/beer-1326297.jpg">
  </div>
  <div class="content">
    <a class="header">Watchmen</a>
    <div class="meta">
      <span class="cinema">IFC</span>
    </div>
    <div class="description">
      <p>Cute dogs come in a variety of shapes and sizes. Some cute dogs are cute for their adorable faces, others for their tiny stature, and even others for their massive size.</p>
      <p>Many people also have their own barometers for what makes a cute dog.</p>
    </div>
    <div class="extra">
      <div class="ui right floated primary button">
        Buy tickets
        <i class="right chevron icon"></i>
      </div>
END;
if ($user->is_admin_user()) {
  $html .= <<<END
        <a href="index.php?page=editevent" class="ui right floated button">
          Edit Event
          <i class="right edit outline icon"></i>
        </a>
END;
}
$html .= <<<END
    </div>
  </div>
</div>

END;
?>