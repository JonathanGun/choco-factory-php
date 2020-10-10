<script src="/public/js/login.js"></script>

<div class="container">
  <h1 class="jumbotron">A-Chong Choco Factory</h1>
  <form onsubmit="return validateForm();" href="/user/login/" method="POST">
    <div class="form-group row">
      <div class="col-sm-12 form-label">Username</div>
      <div class="col-sm-12">
        <input type="text" class="form-input" name="username" placeholder="A-Chong" onchange="validateUsername(this);" id="username">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-12 form-label">Password</div>
      <div class="col-sm-12">
        <input type="password" class="form-input" name="password" placeholder="ch0ngkyl1ciou5">
      </div>
    </div>
    <div class="form-group row mt-6">
      <p class="col-sm-12" id="errorUsername"></p>
    </div>
    <div class="form-group row mt-6">
      <div class="col-sm-12">
        <button type="submit" class="btn">Login</button>
      </div>
    </div>
  </form>
  <a class="text-center btn btn-small mt-5" href="/user/register/">Register new account</a>
</div>
