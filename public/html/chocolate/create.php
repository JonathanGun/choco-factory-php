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
      <div class="col-xs-12 col-sm-2 form-label">Ingredients</div>
      <div class="col-xs-12 col-sm-10">
        <div class="row mb-2 mt-4">
          <div class="col-xs-12 col-sm-8">
            <p>Ingredient Name</p>
          </div>
          <div class="col-xs-12 col-sm-4">
          <p>Amount (pcs)</p>
          </div>
        </div>
        <div id="ingredients"></div>
        <div class="row two-button" id="ingredient-button" style="display: none">
        <div class="col-xs-12 col-sm-6">
          <button type="button" class="btn btn-secondary" onclick="reduceIngredient()">-</button>
        </div>
        <div class="col-xs-12 col-sm-6">
          <button type="button" class="btn btn-primary" onclick="addIngredient()">+</button>
        </div>
        <input type="hidden" id="n" name="n" value="0" required>
      </div>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-xs-12 col-sm-2 form-label">Base Price</div>
      <div class="col-xs-12 col-sm-10">
        <input type="number" class="form-input" placeholder="10000" name="baseprice" min="0" step="1" required>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-xs-12 col-sm-2 form-label">Sell Price</div>
      <div class="col-xs-12 col-sm-10">
        <input type="number" class="form-input" placeholder="20000" name="price" min="0" step="1" required>
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

<script src="/public/js/ajaxingredient.js"></script>
