<?php
$view = new View();
$view->content = "<h1>Yare yare daze.. What did you do, proof me I'm wrong.</h1><p>401 Unauthorized</p>";
echo $view->render('master.php');
header("HTTP/1.0 401 Unauthorized");
die();
