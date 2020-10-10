<?php
$view = new View();
$view->content = "<h1>What are you doing ste-, Baka yaro onii-chan >.<!</h1><p>405 Method Not Allowed</p>";
echo $view->render('master.php');
header("HTTP/1.0 405 Method Not Allowed");
die();
