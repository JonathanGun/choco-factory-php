<?php
$view = new View();
$view->items = array("History" => "/user/history/");
echo $view->render('navbar.php');
?>
<div class="container">
  <h2 class="mb-5">Add New Chocolate</h2>
  <form action="/chocolate/add/" enctype="multipart/form-data" method="POST">
    <div class="form-group row">
      <div class="col-sm-2 form-label">Name</div>
      <div class="col-sm-10">
        <input type="text" class="form-input" name="name" placeholder="Wangkylicious" required>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-2 form-label">Price</div>
      <div class="col-sm-10">
        <input type="number" class="form-input" placeholder="8000" name="price" min="0" step="1" required>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-2 form-label">Desciption</div>
      <div class="col-sm-10">
        <textarea type="text" class="form-input" placeholder="Describe your chocolate!" name="description" required></textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-2 form-label">Image</div>
      <div class="col-sm-10">
        <input type="file" class="form-input" name="image" accept="image/jpeg" required>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-2 form-label">Amount</div>
      <div class="col-sm-10">
        <input type="number" class="form-input" name="stock" placeholder="25" min="1" step="1" required>
      </div>
    </div>
    <input type="submit" class="btn float-right mt-5" value="Add Chocolate">
  </form>
</div>
