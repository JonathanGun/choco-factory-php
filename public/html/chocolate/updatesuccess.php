<?php
$view = new View();
echo $view->render('navbar.php');

extract($this->properties["chocolate"]);
echo "<script>var choco_id = $ChocoID;</script>";
?>
<script src="/public/js/ajaxstock.js"></script>

<div class="container bg-white">
  <h2><?=$_SESSION["issuperuser"] ? 'Add Stock' : 'Buy Chocolate'?> Success! (<?=$this->amount?> pcs)</h2>
  <div class="row">
    <div class="col-xs-12 col-sm-3">
      <?="<img src='/public/uploads/$ImageName' class='card-img' alt='coklat$ChocoID'>";?>
    </div>
    <div class="col-xs-12 col-sm-9">
      <?="
      <p class='mb-1'>Chocolate Name: $Name</p>
      <p class='mb-1'>Amount sold: " . number_format($Sold, 0, ',', '.') . "</p>
      <p class='mb-1 inline'>Price: Rp<p id='price' class='inline'>" . number_format($Price, 0, ',', '.') . "</p>,00</p>
      <p class='mb-1 inline'>Amount Remaining: <p id='stock' class='inline'>$Stock</p></p>
      <p class='mb-1'>Description</p>
      <p class='mb-1'>" . (isset($Description) ? $Description : '-') . "</p>
      "?>
    </div>
    <div class="col-xs-12 row two-button">
      <div class="col-xs-12 col-md-9 ">
        <a class="btn float-right btn-secondary" href="/">Return to dashboard</a>
      </div>
      <div class="col-xs-12 col-md-3">
        <a class="btn full-width" href="/chocolate/<?=$_SESSION["issuperuser"] ? 'restock' : 'buy'?>/<?=$ChocoID?>/"><?=$_SESSION["issuperuser"] ? 'Add More' : 'Buy Again'?></a>
      </div>
    </div>
  </div>
</div>
