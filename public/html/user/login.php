<script src="/public/js/login.js"></script>

<div class="container bg-white pt-3 pb-1">
  <h1 class="jumbotron">A-Chong-co Choco Factory</h1>
  <form onsubmit="return validateForm();" href="/user/login/" method="POST">
    <div class="form-group row">
      <div class="col-xs-12 form-label">Username</div>
      <div class="col-xs-12">
        <input type="text" class="form-input" name="username" placeholder="A-Chong" onchange="validateUsername(this);" id="username">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-xs-12 form-label">Password</div>
      <div class="col-xs-12">
        <input type="password" class="form-input" name="password" placeholder="ch0ngkyl1ciou5">
      </div>
    </div>
    <div class="form-group row mt-6">
      <p class="col-xs-12" id="errorUsername"></p>
    </div>
    <div class="form-group row mt-6">
      <div class="col-xs-12">
        <button type="submit" class="btn">Login</button>
      </div>
    </div>
    <div class="form-group">
      <button type="button" class="text-center btn btn-small btn-secondary" onclick="location.href='/user/register/'">Register new account</button>
    </div>
  </form>
</div>
