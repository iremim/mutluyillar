<?php
session_start();

if(!isset($_SESSION["isLoggedIn"])){
    header("Location: login.php");
    exit();
}

require_once "functions.php";
$addedFotos = loadJson("addedFotos.json");

if(isset($_GET["id"])){
    $fotoID = $_GET["id"];
    $album = $_GET["album"];
    foreach($addedFotos as $index => $foto){
        if($foto["id"] == $fotoID){
            array_splice($addedFotos, $index,1);
            $addedFotos = $addedFotos;

            $fotoimgUrl = "../".$foto["imgUrl"];
            $fotoFlipimgUrl = "../".$foto["imgFlipUrl"];

            unlink($fotoimgUrl);
            unlink($fotoFlipimgUrl);
        }
    }

    saveJson("addedFotos.json",$addedFotos);
    
    header("Location: ../albumContent.php?album=$album");
    exit();
}

?>