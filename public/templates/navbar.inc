<nav class="navbar container">
  <a class="navbar-brand" href="/">A-Chong-co</a>
  <?php
foreach ($this->items as $item => $link) {
    echo "<a class='navbar-item' href=$link>$item</a>";
}
?>
  <input class="navbar-item fill mr-2 ml-2" placeholder="23" min="0" id="choco-id">
  <a class="btn btn-secondary btn-small navbar-item ml-2 mr-6" href="/chocolate/search/">Search</button>
  <?=isset($_SESSION["username"]) ?
'<a class="navbar-item text-right" href="/user/login/"> Logout </a>'
:
'<a class="navbar-item text-right" href="/user/login/"> Login </a>
<p class="navbar-item text-center"> | </p>
<a class="navbar-item text-left" href="/user/register/"> Register </a>'
?>
</nav>
<script>
function getChocoId(){
  var chocoId = document.getElementById('choco-id').value;
}
</script>