<nav class="navbar">
  <a class="navbar-brand" href="/">A-Chong-co</a>
  <?=
$_SESSION["loggedin"] ? (
    $_SESSION['issuperuser'] ?
    "<a class='navbar-item' href='/chocolate/add/'>Add New Choco</a>"
    :
    "<a class='navbar-item' href='/user/history/'>History</a>")
: '';?>
  <div class="navbar-search fill">
  <input class="navbar-item fill mr-2 ml-2 pt-2 pb-2" placeholder="chocolate_name" min="0" id="choco_search" value='<?=$this->queryString?>'>
    <button type="button" class="btn btn-secondary btn-small navbar-item navbar-submit" onclick="submit();">Search</button>
  </div>
  <?=$_SESSION["loggedin"] ?
'<a class="navbar-item text-right" href="/user/logout/">Logout</a>'
:
'<a class="navbar-item text-right" href="/user/login/">Login</a>
<p class="navbar-item text-center"> | </p>
<a class="navbar-item text-left" href="/user/register/">Register</a>'
?>
</nav>
<script>
  document.getElementById('choco_search').onkeyup = function(e){
    if(e.key==='Enter') submit();
  }
  function submit(){
    var queryString = encodeURI(document.getElementById('choco_search').value);
    if(queryString){
      location.href = '/chocolate/search/' + queryString + '/';
    } else {
      location.href = '/chocolate/search/';
    }
  }
</script>