<?php
$view = new View();
$view->queryString = $this->queryString;
echo $view->render('navbar.php');

$pages = ceil($this->numRows / CHOCOLATES_PER_PAGE);
$js_array = json_encode($this->chocolates);
echo "<script>var chocolates = $js_array;var chocolate_per_page = " . CHOCOLATES_PER_PAGE . ";var current_page = 1;var pages=$pages;</script>";
?>
<script src="/public/js/pagination.js"></script>

<div class="container pb-3">
    <div class="row mb-4">
      <p class="col-xs-6">Hello, <?=$_SESSION["username"] ? $_SESSION["username"] : "Anonymous"?></p>
      <a type="button" class="col-xs-6 text-right" href="/">Return to dashboard</a>
    </div>
  <div class="row">
    <div class="col-xs-12">
      <p><?=$this->numRows?> results found</p>
    </div>
  <?php
for ($i = 1; $i <= min(CHOCOLATES_PER_PAGE, count($this->chocolates)); $i++) {
    $chocolate = $this->chocolates[$i - 1];
    extract($chocolate);
    echo "<div class='col-xs-12' id='choco$i'>
        <a class='card horizontal mb-0' href='/chocolate/view/$ChocoID/' id='chocolink$i'>
          <img src='/public/uploads/$ImageName' class='card-img' alt='coklat$ChocoID' id='chocoimg$i'>
          <div class='card-body'>
            <p class='card-title' id='choconame$i'>$Name</p>
            <p class='card-text inline'>Amount sold: <p class='inline' id='chocosold$i'>$Sold</p></p>
            <p class='card-text inline'>Price: Rp<p class='inline' id='chocoprice$i'>$Price,00</p></p>
            <p class='card-text inline'>Amount Remaining: <p class='inline' id='chocostock$i'>$Stock</p></p>
            <p class='card-text'>Description</p>
            <p class='card-text' id='chocodesc$i'>" . ($Description ?? '-') . "</p>
          </div>
        </a>
      </div>";
}
?>
  </div>
  <div class="flex mt-5 mb-2" id="pagination">
  <a class='btn btn-secondary text-center' onclick='updateSearch("-")'>Prev</a>
     <?php
for ($i = 1; $i <= $pages; $i++) {
    echo "<a class='btn btn-secondary text-center " . ($i == $this->page ? 'bold' : '') . "' onclick='updateSearch($i);'>$i</a>";
}?>
  <a class='btn btn-secondary text-center' onclick='updateSearch("+")'>Next</a>
  </div>
  <div class="row">
    <a type="button" class="col-xs-12 btn float-right" href="/">Return to dashboard</a>
  </div>
</div>
