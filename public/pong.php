<?php

require_once "../Input.php";

function pageController() {
    $data = [];
    $data["counter"] = 0;

    if (Input::has("counter")) {
        $data["counter"] = Input::get("counter");
    }else{
        $data["counter"] = 0;
    }

    if (Input::has("count")) {
        if (Input::get("result") === "HIT") {
            $data["count"] = Input::get("count") + 1;
        }else if (Input::get("result") === "MISS") {
            $data["count"] = Input::get("count") - 1;
        }
    } 
    
    return $data;
}

extract(pageController());

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h1><?= $counter ?></h1>
        <! Only difference is that the pong pages href points to ping.php !>
        <a class="btn btn-default" href="http://codeup.dev/ping.php?counter=<?= $counter + 1 ?>&result=hit">HIT</a>
        <a class="btn btn-default" href="http://codeup.dev/ping.php?counter=<?= $counter = 0 ?>&result=miss">MISS</a>
        
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css"
        rel="stylesheet">
    </body>
</html>
