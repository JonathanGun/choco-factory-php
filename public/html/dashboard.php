<?php
$view = new View();
$view->items = array("History" => "/user/history/", "Add New Chocolate" => "/chocolate/add/");
echo $view->render('navbar.inc');
?>

<div class="container">
  <div class="row mb-4">
    <p class="col-xs-6">Hello, <?=isset($this->username) ? $this->username : "Anonymous"?></p>
    <a href="/chocolate/view/" class="col-xs-6 text-right">View all chocolates</a>
  </div>
  <div class="row">
  <?php
for ($x = 0; $x < 10; $x++) {
    $i = $x % 3;
    echo "<div class='col-xs-6 col-sm-4 col-lg-3'>
      <div class='card'>
        <img src='/public/images/choco$i.jpg' class='card-img' alt='coklat$x'>
        <div class='card-body'>
          <p class='card-title'>Coklat $x</p>
          <p class='card-text'>Enak</p>
          <p class='card-text'>Sehat</p>
          <p class='card-text'>Bergizi</p>
        </div>
      </div>
    </div>";
}
?>
    </div>
</div>
