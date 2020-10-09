<nav class="navbar container">
  <a class="navbar-brand" href="/">A-Chong-co</a>
  <?php
foreach ($this->items as $item => $link) {
    echo "<a class='navbar-item' href=$link>$item</a>";
}
?>
  <form action='/chocolate/search/' method="POST" class="fill">
    <input class="navbar-item fill mr-2 ml-2 pt-2 pb-2" placeholder="Leslie" min="0" name="choco_search">
    <button type="submit" class="btn btn-secondary btn-small navbar-item">Search</button>
  </form>
  <?=isset($_SESSION["username"]) ?
'<a class="navbar-item text-right" href="/user/login/"> Logout </a>'
:
'<a class="navbar-item text-right" href="/user/login/"> Login </a>
<p class="navbar-item text-center"> | </p>
<a class="navbar-item text-left" href="/user/register/"> Register </a>'
?>
</nav>