<?php

$method = $_SERVER["REQUEST_METHOD"];

if($method == "POST" && isset($_FILES["img"])){
    $img = $_FILES["img"];
    $imgFlip = $_FILES["imgFlip"];

    $filename = $img["name"];
    $tempname = $img["tmp_name"];

    $info = pathinfo($filename);

    //Filändelse
    $ext = strtolower($info["extension"]);
    
    echo "<pre>";
        var_dump($info);
    echo "</pre>";    
}

?>