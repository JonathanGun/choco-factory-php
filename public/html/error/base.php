<?php
echo (new View(
    $error,
    array(
        "content" => "<h1>$message</h1><p>$error</p>",
    )
))->render();
header("HTTP/1.0 $error");
die();
