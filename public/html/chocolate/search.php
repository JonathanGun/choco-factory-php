<?php
$view = new View();
$view->items = array("History" => "/user/history/");
echo $view->render('navbar.php');
?>

<div class="container">
  <?php
foreach ($this->chocolates as $chocolate) {
    extract($chocolate);
    echo "<div class='col-xs-12'>
        <a class='card horizontal' href='/chocolate/view/$ChocoID/'>
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
