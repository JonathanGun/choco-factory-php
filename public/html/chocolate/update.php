<?php
$view = new View();
echo $view->render('navbar.php');

extract($this->properties["chocolate"]);
echo "<script>var choco_id = $ChocoID;</script>";
?>
<script src="/public/js/updateamount.js"></script>
<script src="/public/js/ajaxstock.js"></script>

<div class="container bg-white">
  <h2><?=$_SESSION["issuperuser"] ? 'Add Stock' : 'Buy Chocolate'?></h2>
  <form action='/chocolate/<?=$_SESSION["issuperuser"] ? 'restock' : 'buy'?>/<?=$ChocoID?>/' method="POST" class="row pb-2">
    <div class="col-xs-12 col-sm-5 col-md-4">
      <?="<img src='/public/uploads/$ImageName' class='card-img' alt='coklat$ChocoID'>";?>
    </div>
    <div class="col-xs-12 col-sm-7 col-md-8">
      <?="
      <p class='mb-1'>Chocolate Name: $Name</p>
      <p class='mb-1'>Amount sold: " . number_format($Sold, 0, ',', '.') . "</p>
      <p class='mb-1 inline'>Price: Rp <p id='price' class='inline'>" . number_format($Price, 0, ',', '.') . "</p>,00</p>
      <p class='mb-1 inline'>Amount Remaining: <p id='stock' class='inline'>$Stock</p></p>
      <p class='mb-1'>Description</p>
      <p class='mb-1'>" . (isset($Description) ? $Description : '-') . "</p>
      "?>
      <div class="row">
        <div class="col-xs-12 row">
          <label for="name" class="col-xs-12">Amount to <?=$_SESSION["issuperuser"] ? 'Add' : 'Buy'?>:</label>
          <div class="row col-xs-12 col-md-8">
            <button type="button" class="btn btn-small btn-secondary col-xs-2" onclick="reduceAmount();<?=$_SESSION['issuperuser'] ? '' : 'updatePrice();'?>">-</button>
            <input type="text" class="col-xs-8 text-center" name="amount" id="amount" value="1" required <?=$_SESSION["issuperuser"] ? '' : 'onchange="updatePrice()"'?>>
            <button type="button" class="btn btn-small btn-secondary col-xs-2" onclick="increaseAmount(<?=$_SESSION['issuperuser'] ? 'Infinity' : ''?>);<?=$_SESSION['issuperuser'] ? '' : 'updatePrice();'?>">+</button>
          </div>
        </div>
        <?=$_SESSION["issuperuser"] ? '' : '
        <div class="col-xs-12 col-sm-4 ml-2 mr-2">
          <p class="mb-1">Total Price</p>
          <p class="mb-1 large-text inline">Rp <p class="inline large-text" id="total_price">' . number_format($Price, 2, ',', '.') . '</p></p>
        </div>'?>
      </div>
    </div>
    <?=$_SESSION["issuperuser"] ? '' : '
    <div class="form-group col-xs-12">
      <div class="form-label">Address:</div>
      <textarea type="text" class="form-input" placeholder="Full address, example: P.O. Box 670, 6556 Euismod Ave" name="address" required></textarea>
    </div>'?>
    <div class="col-xs-12 row two-button">
      <div class="col-xs-12 col-sm-9">
        <button class="btn float-right btn-secondary" onclick="location.href='/chocolate/view/<?=$ChocoID?>/';return false;">Cancel</button>
      </div>
      <div class="col-xs-12 col-sm-3">
        <button class="btn full-width" type="submit"><?=$_SESSION["issuperuser"] ? 'Add' : 'Buy'?></button>
      </div>
    </div>
  </form>
</div>
