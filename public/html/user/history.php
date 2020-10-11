<?php
$view = new View();
echo $view->render('navbar.php');

$numRows = count($this->transactions);
$pages = ceil($numRows / TRANSACTIONS_PER_PAGE);
$js_array = json_encode($this->transactions);
echo "<script>var transactions = $js_array;var transaction_per_page = " . TRANSACTIONS_PER_PAGE . ";var pages=$pages;var num_rows=$numRows;</script>";

include_once VIEW_PATH . 'PaginationView.class.php';
?>
<script src="/public/js/pagination.js"></script>

<div class="container bg-white pb-3">
  <h2 class='full-width'>Transaction History</h2>
  <p class="mb-2"><?=$numRows?> results found</p>
  <?php
if (!($this->transactions)) {
    echo '<div class="row">';
    echo "<p class='col-xs-12 mb-4'>No transaction history</p>";
    echo '<a class="col-xs-12 float-right btn" href="/">Buy your first chocolate</a>';
    echo '</div>';
    die();
}
?>
  <table>
    <thead>
      <tr>
        <th>Choco Name</th>
        <th>Amount</th>
        <th>Total Price</th>
        <th>Date</th>
        <th>Time</th>
        <th>Address</th>
      </tr>
    </thead>
    <tbody>
      <?php
for ($i = 1; $i <= min(TRANSACTIONS_PER_PAGE, $numRows); $i++) {
    $transaction = $this->transactions[$i - 1];
    extract($transaction);
    $datetime = new DateTime($Date);
    $date = $datetime->format('Y-m-d');
    $time = $datetime->format('H:i:s');
    echo "<tr id='transaction$i'>
      <td data-column='Choco Name'><a href='/chocolate/view/$ChocoID/' id='transaction_name$i'>$Name</a></td>
      <td data-column='Amount' id='transaction_amount$i'>$Amount</td>
      <td data-column='Total Price' id='transaction_price$i'>" . ($Price * $Amount) . "</td>
      <td data-column='Date' id='transaction_date$i'>$date</td>
      <td data-column='Time' id='transaction_time$i'>$time</td>
      <td data-column='Address' id='transaction_address$i'>$Address</td>
    </tr>";
}
?>
    </tbody>
  </table>
  <?=(new PaginationView($pages, 'updateTransaction'))->render();?>
  <div class="row">
    <a type="button" class="col-xs-12 btn float-right" href="/">Return to dashboard</a>
  </div>
</div>
