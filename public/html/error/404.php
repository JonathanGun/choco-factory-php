<?php
$view = new View();
$view->content = "<h1>Nothing to do here</h1><p>404 Not Found</p>";
echo $view->render('master.php');
header("HTTP/1.0 404 Not Found");
die();
