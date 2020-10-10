<nav class="navbar container">
  <a class="navbar-brand" href="/">A-Chong-co</a>
  <?=
$_SESSION["loggedin"] ? (
    $_SESSION['issuperuser'] ?
    "<a class='navbar-item' href='/chocolate/add/'>Add New Chocolate</a>"
    :
    "<a class='navbar-item' href='/user/history/'>History</a>")
: '';?>
  <form action='/chocolate/search/' method="POST" class="fill">
    <input class="navbar-item fill mr-2 ml-2 pt-2 pb-2" placeholder="Leslie" min="0" name="choco_search">
    <button type="submit" class="btn btn-secondary btn-small navbar-item">Search</button>
  </form>
  <?=$_SESSION["loggedin"] ?
'<a class="navbar-item text-right" href="/user/logout/"> Logout </a>'
:
'<a class="navbar-item text-right" href="/user/login/"> Login </a>
<p class="navbar-item text-center"> | </p>
<a class="navbar-item text-left" href="/user/register/"> Register </a>'
?>
</nav>