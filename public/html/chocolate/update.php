<?php
$view = new View();
$view->items = array("History" => "/user/history/");
echo $view->render('navbar.php');
?>
<script src="/public/js/updateamount.js"></script>

<div class="container bg-white">
  <?php extract($this->properties["chocolate"]);?>

  <h2><?=$_SESSION["issuperuser"] ? 'Add Stock' : 'Buy Chocolate'?></h2>
  <form action='/chocolate/<?=$_SESSION["issuperuser"] ? 'restock' : 'buy'?>/<?=$ChocoID?>/' method="POST" class="row pb-2">
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
      <div class="row">
        <div class="col-xs-12 col-md-8 ml-2 mr-2">
          <label for="name mb-1">Amount to <?=$_SESSION["issuperuser"] ? 'Add' : 'Buy'?>:</label>
          <div class="row flex mb-1">
            <button type="button" class="btn btn-small btn-secondary" onclick="reduceAmount();<?=$_SESSION['issuperuser'] ? '' : 'updatePrice();'?>">
              <div class="pl-2 pr-2">-</div>
            </button>
            <input type="fill text" class="card-item fill" name="amount" id="amount" value="1" required <?=$_SESSION["issuperuser"] ? '' : 'onchange="updatePrice()"'?>>
            <button type="button" class="btn btn-small btn-secondary" onclick="increaseAmount();<?=$_SESSION['issuperuser'] ? '' : 'updatePrice();'?>">
              <div class="pl-2 pr-2">+</div>
            </button>
          </div>
        </div>
        <?=$_SESSION["issuperuser"] ? '' : '
        <div class="col-xs-12 col-md-4 ml-2 mr-2">
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
