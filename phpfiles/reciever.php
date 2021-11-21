<?php

if(isset($_POST) && isset($_FILES)){
    $img = $_FILES["img"];
    $imgFlip = $_FILES["imgFlip"];
    echo "<pre>";
        var_dump($img);
    echo "</pre>";    
}

?>