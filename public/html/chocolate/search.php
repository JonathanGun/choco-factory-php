<?php
$view = new View();
$view->queryString = $this->queryString;
echo $view->render('navbar.php');

$numRows = count($this->chocolates);
$pages = ceil($numRows / CHOCOLATES_PER_PAGE);
$js_array = json_encode($this->chocolates);
echo "<script>var chocolates = $js_array;var chocolate_per_page = " . CHOCOLATES_PER_PAGE . ";var pages=$pages;var num_rows=$numRows;</script>";

include_once VIEW_PATH . 'PaginationView.class.php';
?>
<script src="/public/js/pagination.js"></script>

<div class="container pb-3">
    <div class="row mb-4">
      <p class="col-xs-6">Hello, <?=$_SESSION["username"] ? $_SESSION["username"] : "Anonymous"?></p>
      <a type="button" class="col-xs-6 text-right" href="/">Return to dashboard</a>
    </div>
  <div class="row">
    <div class="col-xs-12">
      <p><?=$numRows?> results found</p>
    </div>
  <?php
for ($i = 1; $i <= min(CHOCOLATES_PER_PAGE, $numRows); $i++) {
    $chocolate = $this->chocolates[$i - 1];
    extract($chocolate);
    echo "<div class='col-xs-12' id='choco$i'>
        <a class='card horizontal mb-0' href='/chocolate/view/$ChocoID/' id='chocolink$i'>
          <img src='/public/uploads/$ImageName' class='card-img' alt='coklat$ChocoID' id='chocoimg$i'>
          <div class='card-body'>
            <p class='card-title' id='choconame$i'>$Name</p>
            <p class='card-text inline'>Amount sold: <p class='inline' id='chocosold$i'>" . number_format($Sold, 0, ',', '.') . "</p></p>
            <p class='card-text inline'>Price: Rp <p class='inline' id='chocoprice$i'>" . number_format($Price, 0, ',', '.') . ",00</p></p>
            <p class='card-text inline'>Amount Remaining: <p class='inline' id='chocostock$i'>$Stock</p></p>
            <p class='card-text'>Description</p>
            <p class='card-text' id='chocodesc$i'>" . ($Description ?? '-') . "</p>
          </div>
        </a>
      </div>";
}
?>
  </div>
  <?=(new PaginationView($pages, 'updateSearch'))->render();?>
  <div class="row">
    <a type="button" class="col-xs-12 btn float-right" href="/">Return to dashboard</a>
  </div>
</div>
