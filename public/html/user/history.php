<?php
$view = new View();
$view->items = array();
echo $view->render('navbar.php');
?>
<div class="container bg-white pb-3">
    <h2 class='full-width mb-2'>Transaction History</h2>
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
      <tr>
        <th>Choco Name</th>
        <th>Amount</th>
        <th>Total Price</th>
        <th>Date</th>
        <th>Time</th>
        <th>Address</th>
      </tr>
      <?php
foreach ($this->transactions as $transaction) {
    extract($transaction);
    $datetime = new DateTime($Date);
    $date = $datetime->format('Y-m-d');
    $time = $datetime->format('H:i:s');
    echo "<tr>
      <td><a href='/chocolate/view/$ChocoID/'>$Name</a></td>
      <td>$Amount</td>
      <td>" . ($Price * $Amount) . "</td>
      <td>$date</td>
      <td>$time</td>
      <td>$Address</td>
    </tr>";
    // TODO pagination
}

?>
    </table>
</div>
