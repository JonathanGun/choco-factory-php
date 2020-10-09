<?php
$view = new View();
$view->items = array("History" => "/user/history/");
echo $view->render('navbar.inc');
?>

<div class="container">
  <?php
$x = $this->choco_id;
$i = $x % 3;
echo "<div class='col-xs-12'>
        <div class='card horizontal'>
          <img src='/public/images/choco$i.jpg' class='card-img' alt='coklat$x'>
          <div class='card-body'>
            <p class='card-title'>Coklat $x</p>
            <p class='card-text'>Enak</p>
            <p class='card-text'>Sehat</p>
            <p class='card-text'>Bergizi</p>
          </div>
        </div>
      </div>";
?>
</div>
