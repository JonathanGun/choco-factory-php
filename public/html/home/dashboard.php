<?php
include TEMPLATE_PATH . 'navbar.php';
?>

<div class="container pb-3">
  <div class="row mb-4">
    <p class="col-xs-6">Hello, <?=$_SESSION["username"] ? $_SESSION["username"] : "Anonymous"?></p>
    <a href="/chocolate/search/" class="col-xs-6 text-right">View all chocolates</a>
  </div>
  <div class="row">
    <?php
foreach ($this->chocolates as $chocolate) {
    extract($chocolate);
    echo "<div class='col-xs-6 col-sm-4 col-lg-3'>
      <a class='card' href='/chocolate/view/$ChocoID/'>
        <img src='/public/uploads/$ImageName' class='card-img' alt='coklat$ChocoID'>
        <div class='card-body'>
          <p class='card-title'>$Name</p>
          <p class='card-text'>Amount sold: $Sold</p>
          <p class='card-text'>Price: $Price</p>
        </div>
      </a>
    </div>";
}
?>
      <div class="col-xs-12">
        <a type="button" class="btn float-right" href="/chocolate/search/">Browse More Choco</a>
      </div>
    </div>
</div>
