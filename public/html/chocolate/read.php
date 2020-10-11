<?php
$view = new View();
echo $view->render('navbar.php');

extract($this->properties["chocolate"]);
echo "<script>var choco_id = $ChocoID;</script>";
?>
<script src="/public/js/ajaxstock.js"></script>

<div class="container bg-white">
  <h2><?=$Name?></h2>
  <div class="row">
    <div class="col-xs-12 col-sm-5 col-md-4">
      <?="<img src='/public/uploads/$ImageName' class='card-img' alt='coklat$ChocoID'>";?>
    </div>
    <div class="col-xs-12 col-sm-7 col-md-8">
      <?="
      <p class='mb-1'>Amount sold: $Sold</p>
      <p class='mb-1 inline'>Price: Rp<p id='price' class='inline'>$Price</p>,00</p>
      <p class='mb-1 inline'>Amount Remaining: <p id='stock' class='inline'>$Stock</p></p>
      <p class='mb-1'>Description</p>
      <p class='mb-1'>" . ($Description ?? '-') . "</p>
      "
?>
    </div>
    <div class="two-button row col-xs-12">
      <div class="col-xs-12 col-sm-9">
        <a class="btn float-right btn-secondary" href="/">Return to dashboard</a>
      </div>
      <div class="col-xs-12 col-sm-3">
        <?php
echo $_SESSION['issuperuser'] ?
"<a class='btn full-width' href='/chocolate/restock/$ChocoID'>Add Stock</a>"
:
"<a class='btn full-width' href='/chocolate/buy/$ChocoID'>Buy Now</a>"; ?>
      </div>
    </div>
  </div>
</div>
