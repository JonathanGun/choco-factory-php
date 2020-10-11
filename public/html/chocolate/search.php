<?php
$view = new View();
$view->queryString = $this->queryString;
echo $view->render('navbar.php');
?>

<div class="container pb-3">
    <div class="row mb-4">
      <p class="col-xs-6">Hello, <?=$_SESSION["username"] ? $_SESSION["username"] : "Anonymous"?></p>
      <a type="button" class="col-xs-6 text-right" href="/">Return to dashboard</a>
    </div>
  <div class="row">
    <div class="col-xs-12">
      <p><?=count($this->chocolates)?> results found</p>
    </div>
  <?php
foreach ($this->chocolates as $chocolate) {
    extract($chocolate);
    echo "<div class='col-xs-12'>
        <a class='card horizontal mb-0' href='/chocolate/view/$ChocoID/'>
          <img src='/public/uploads/$ImageName' class='card-img' alt='coklat$ChocoID'>
          <div class='card-body'>
            <p class='card-title'>$Name</p>
            <p class='card-text'>Amount sold: $Sold</p>
            <p class='card-text'>Price: Rp$Price,00</p>
            <p class='card-text'>Amount Remaining: $Stock</p>
            <p class='card-text'>Description</p>
            <p class='card-text'>" . ($Description ?? '-') . "</p>
          </div>
        </a>
      </div>";
}
?>
  </div>
  <div class="row mt-5">
    <a type="button" class="col-xs-12 btn float-right" href="/">Return to dashboard</a>
  </div>
  <div class="row">
     <!-- TODO PAGINATION -->
  </div>
</div>
