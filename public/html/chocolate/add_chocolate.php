<?php
$view = new View();
$view->items = array("History" => "/user/history/");
echo $view->render('navbar.inc');
?>
<div class="container">
  <h2 class="mb-5">Add New Chocolate</h2>
  <form>
    <div class="form-group row">
      <div class="col-sm-2 form-label">Name</div>
      <div class="col-sm-10">
        <input type="text" class="form-input" placeholder="Wangkylicious">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-2 form-label">Price</div>
      <div class="col-sm-10">
        <input class="form-input" placeholder="6.9" min="0">
      </div>
    </div>
  </form>
</div>
