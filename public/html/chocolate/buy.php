<?php
$view = new View();
$view->items = array("History" => "/user/history/");
echo $view->render('navbar.php');
?>

<div class="container bg-white">
  <?php
extract($this->properties["chocolate"]);
$i = $ChocoID % 3;
echo "<h2 class='pt-3 pb-3'>Buy Chocolate</h2>";
?>
  <form action='/chocolate/buy/<?php echo $ChocoID ?>/' method="POST" class="row">
    <div class="col-xs-12 col-sm-3">
      <?php echo "<img src='/public/images/choco$i.jpg' class='card-img' alt='coklat$ChocoID'>"; ?>
    </div>
    <div class="col-xs-12 col-sm-9">
      <?php echo "
      <p class='mb-1'>Amount sold: $Name</p>
      <p class='mb-1'>Amount sold: $Sold</p>
      <p class='mb-1'>Price: Rp$Price,00</p>
      <p class='mb-1'>Amount Remaining: $Stock</p>
      <p class='mb-1'>Description</p>
      <p class='mb-1'>$Description</p>
      " ?>
      <div class="row">
        <div class="col-xs-4 pl-2 pr-2">
        <label for="name">Amount to Buy:</label>

        <p class="mb-1">Amount to Buy:</p>
          <div class="card horizontal">
            <p class="card-item" onclick="document.getElementById('amount').value--">-</p>
            <input type="text" class="card-item fill" name="amount" id="amount" value="1">
            <p class="card-item" onclick="document.getElementById('amount').value++">+</p>
          </div>
        </div>
        <div class="col-xs-8 pl-2 pr-2">
          <p class="mb-1">Total Price</p>
          <p class="mb-1" id="total_price">Rp 42000,00</p>
          <!-- TODO dihitung harganya -->
        </div>
      </div>
    </div>
    <div class="col-xs-10">
      <a class="btn float-right mt-5 mb-3 btn-secondary" href="/chocolate/view/<?php echo $ChocoID ?>/">Cancel</a>
    </div>
    <div class="col-xs-2">
      <input class="btn full-width mt-5 mb-3" value="Buy" type="submit">
    </div>
  </form>
</div>
