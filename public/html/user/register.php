<script src="/public/js/login.js"></script>

<div class="container bg-white pt-3 pb-1">
  <h1 class="jumbotron">A-Chong-co Choco Factory</h1>
  <div class="row mb-4">
    <p class="col-xs-12" id="errorUsername"></p>
    <p class="col-xs-12" id="errorEmail"></p>
    <p class="col-xs-12" id="errorUnique"></p>
  </div>
  <form onsubmit="return validateForm();" href="/user/register/" method="POST">
    <div class="form-group row">
      <div class="col-xs-12 form-label">Username</div>
      <div class="col-xs-12">
        <input type="text" class="form-input" name="username" placeholder="A-Chong" onchange="validateUsername(this);" id="username">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-xs-12 form-label">Email</div>
      <div class="col-xs-12">
        <input type="text" class="form-input" name="email" placeholder="chongky@chocofactory.com" id="email" onchange="validateEmail(this);">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-xs-12 form-label">Password</div>
      <div class="col-xs-12">
        <input type="password" class="form-input" name="password" placeholder="ch0ngkyl1ciou5">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-xs-12 form-label">Confirm Password</div>
      <div class="col-xs-12">
        <input type="password" class="form-input" placeholder="ch0ngkyl1ciou5">
      </div>
    </div>
    <div class="form-group row mt-6">
      <div class="col-xs-12 mt-6">
        <button type="submit" class="btn">Register</button>
      </div>
    </div>
    <div class="form-group">
      <button type="button" class="text-center btn btn-small btn-secondary" onclick="location.href='/user/login/'">Login on existing account</button>
    </div>
  </form>
</div>
