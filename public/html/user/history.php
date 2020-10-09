<?php
$view = new View();
$view->items = array();
echo $view->render('navbar.inc');
?>
<div class="container">
  <div class="row">
  <?php
for ($x = 0; $x < 5; $x++) {
    $i = $x % 3;
    echo "<div class='col-xs-12'>
      <div class='card horizontal'>
        <div class='card-body'>
          <p class='card-title'>Coklat $x</p>
          <p class='card-text'>5 pcs</p>
          <p class='card-text'>30 Februari</p>
        </div>
      </div>
    </div>";
}
?>
  </div>
</div>
