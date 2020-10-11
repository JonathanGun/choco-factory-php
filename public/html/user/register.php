<script src="/public/js/login.js"></script>

<div class="container">
  <h1 class="jumbotron">A-Chong Choco Factory</h1>
  <form onsubmit="return validateForm();" href="/user/register/" method="POST">
    <div class="form-group row">
      <div class="col-sm-12 form-label">Username</div>
      <div class="col-sm-12">
        <input type="text" class="form-input" name="username" placeholder="A-Chong" onchange="validateUsername(this);" id="username">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-12 form-label">Email</div>
      <div class="col-sm-12">
        <input type="text" class="form-input" name="email" placeholder="chongky@chocofactory.com" id="email" onchange="validateEmail(this);">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-12 form-label">Password</div>
      <div class="col-sm-12">
        <input type="password" class="form-input" name="password" placeholder="ch0ngkyl1ciou5">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-12 form-label">Confirm Password</div>
      <div class="col-sm-12">
        <input type="password" class="form-input" placeholder="ch0ngkyl1ciou5">
      </div>
    </div>
    <div class="form-group row mt-6">
      <p class="col-sm-12" id="errorUsername"></p>
      <p class="col-sm-12" id="errorEmail"></p>
    </div>
    <div class="form-group row mt-6">
      <div class="col-sm-12">
        <button type="submit" class="btn">Register</button>
      </div>
    </div>
  </form>
  <a class="text-center btn btn-small btn-secondary mt-5" href="/user/login/">Login on existing account</a>
</div>
