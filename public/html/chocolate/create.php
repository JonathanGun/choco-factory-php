<?php
$view = new View();
echo $view->render('navbar.php');
?>
<div class="container bg-white">
  <h2>Add New Chocolate</h2>
  <form action="/chocolate/add/" enctype="multipart/form-data" method="POST">
    <div class="form-group row">
      <div class="col-xs-12 col-sm-2 form-label">Name</div>
      <div class="col-xs-12 col-sm-10">
        <input type="text" class="form-input" name="name" placeholder="Wangkylicious" required>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-xs-12 col-sm-2 form-labell">Price</div>
      <div class="col-xs-12 col-sm-10">
        <input type="number" class="form-input" placeholder="8000" name="price" min="0" step="1" required>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-xs-12 col-sm-2 form-label">Desciption</div>
      <div class="col-xs-12 col-sm-10">
        <textarea type="text" class="form-input" placeholder="Describe your chocolate!" name="description" required></textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-xs-12 col-sm-2 form-label">Image (only accepts jpg, max 1MB)</div>
      <div class="col-xs-12 col-sm-10">
        <input type="file" class="form-input" name="image" accept="image/jpeg" required>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-xs-12 col-sm-2 form-label">Amount</div>
      <div class="col-xs-12 col-sm-10">
        <input type="number" class="form-input" name="stock" placeholder="25" min="1" step="1" required>
      </div>
    </div>
    <div class="row two-button">
      <div class="col-xs-12 col-sm-9">
        <button class="btn float-right btn-secondary" onclick="location.href='/'">Return to dashboard</button>
      </div>
      <div class="col-xs-12 col-sm-3">
        <button type="submit" class="btn full-width">Add Choco</button>
      </div>
    </div>
  </form>
</div>
