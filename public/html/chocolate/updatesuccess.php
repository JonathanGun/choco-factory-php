<?php
$view = new View();
$view->items = array("History" => "/user/history/");
echo $view->render('navbar.php');
?>

<div class="container bg-white">
  <?php extract($this->properties["chocolate"]);?>

  <h2><?=$_SESSION["issuperuser"] ? 'Add Stock' : 'Buy Chocolate'?> Success! (<?=$this->amount?> pcs)</h2>
  <div class="row">
    <div class="col-xs-12 col-sm-3">
      <?="<img src='/public/uploads/$ImageName' class='card-img' alt='coklat$ChocoID'>";?>
    </div>
    <!-- TODO ajax remaining stock -->
    <div class="col-xs-12 col-sm-9">
      <?="
      <p class='mb-1'>Chocolate Name: $Name</p>
      <p class='mb-1'>Amount sold: $Sold</p>
      <p class='mb-1 inline'>Price: Rp<p id='price' class='inline'>$Price</p>,00</p>
      <p class='mb-1 inline'>Amount Remaining: <p id='stock' class='inline'>$Stock</p></p>
      <p class='mb-1'>Description</p>
      <p class='mb-1'>" . ($Description ?? '-') . "</p>
      "?>
    </div>
    <div class="col-xs-12 col-md-9">
      <a class="btn float-right mt-5 mb-3 btn-secondary" href="/">Return to dashboard</a>
    </div>
    <div class="col-xs-12 col-md-3">
      <a class="btn float-right mt-5 mb-3 full-width" href="/chocolate/<?=$_SESSION["issuperuser"] ? 'restock' : 'buy'?>/<?=$ChocoID?>/"><?=$_SESSION["issuperuser"] ? 'Add More' : 'Buy Again'?></a>
    </div>
  </div>
</div>
