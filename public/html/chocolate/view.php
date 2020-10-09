<?php
$view = new View();
$view->items = array("History" => "/user/history/");
echo $view->render('navbar.inc');
?>

<div class="container bg-white">
  <?php
$id = $this->choco_id;
$i = $id % 3;
extract($this->properties["chocolate"]);
echo "<h2 class='pb-2 pt-2'>$Name</h2>";
?>
  <div class="row">
    <div class="col-xs-12 col-sm-3">
      <?php echo "<img src='/public/images/choco$i.jpg' class='card-img' alt='coklat$id'>"; ?>
    </div>
    <div class="col-xs-12 col-sm-9">
      <?php echo "
      <p class='mb-1'>Amount sold: $Sold</p>
      <p class='mb-1'>Price: Rp$Price,00</p>
      <p class='mb-1'>Amount Remaining: $Stock</p>
      <p class='mb-1'>Description</p>
      <p class='mb-1'>$Description</p>
      "
?>
    </div>
    <div class="col-xs-10">
      <a class="btn float-right mt-5 mb-3 btn-secondary" href="/">Back</a>
    </div>
    <div class="col-xs-2">
      <?php
echo $_SESSION['id'] == 1 ? //TODO check super user
"<a class='btn full-width mt-5 mb-3' href='/chocolate/restock/$id'>Add Stock</a>"
:
"<a class='btn full-width mt-5 mb-3' href='/chocolate/buy/$id'>Buy Now</a>"; ?>
    </div>
  </div>
</div>
