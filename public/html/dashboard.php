<?php
$view = new View();
$view->items = array("History" => "/user/history/", "Add New Chocolate" => "/chocolate/add/");
echo $view->render('navbar.inc');
?>

<div class="container">
  <div class="row mb-4">
    <p class="col-xs-6">Hello, <?=$_SESSION["username"] ? $_SESSION["username"] : "Anonymous"?></p>
    <a href="/chocolate/search/" class="col-xs-6 text-right">View all chocolates</a>
  </div>
  <div class="row">
    <?php
foreach ($this->chocolates as $chocolate) {
    extract($chocolate);
    $i = $ChocoID % 3;
    echo "<div class='col-xs-6 col-sm-4 col-lg-3'>
      <a class='card' href='/chocolate/view/$i/'>
        <img src='/public/images/choco$i.jpg' class='card-img' alt='coklat$ChocoID'>
        <div class='card-body'>
          <p class='card-title'>$Name</p>
          <p class='card-text'>Amount sold: $Sold</p>
          <p class='card-text'>Price: $Price</p>
        </div>
      </a>
    </div>";
}
?>
    </div>
</div>
