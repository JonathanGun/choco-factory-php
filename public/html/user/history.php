<?php
$view = new View();
$view->items = array();
echo $view->render('navbar.inc');
?>
<div class="container">
  <div class="row">
    <h2 class='col-xs-12 mb-2 mt-2'>Transaction History</h2>
    <table>
      <tr>
        <th>Chocolate Name</th>
        <th>Amount</th>
        <th>Total Price</th>
        <th>Date</th>
        <th>Time</th>
        <th>Address</th>
      </tr>
      <?php
foreach ($this->transactions as $transaction) {
    extract($transaction);
    echo "<tr>
      <td>$Name</td>
      <td>$Amount</td>
      <td>" . ($Price * $Amount) . "</td>
      <td>$Date</td>
      <td>$Date</td>
      <td>$Address</td>
    </tr>";
    //TODO CSS nya rapihin, Date sm time dipisah
}
?>
    </table>
  </div>
</div>
