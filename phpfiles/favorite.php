<?php
session_start();

if(!isset($_SESSION["isLoggedIn"])){
    header("Location: login.php");
    exit();
}

require_once "functions.php";

$addedFotos = loadJson("addedFotos.json");
$albumName = $_GET["album"];

if(isset($_GET["add"])){
    $fotoId = $_GET["add"];

    foreach($addedFotos as $index => $pic){
        if($pic["id"] == $fotoId){
            $pic["favorite"] = true;
            $addedFotos[$index] = $pic;
        }
    }
    $addedFotos = $addedFotos;
}

if(isset($_GET["rem"])){
    $fotoId = $_GET["rem"];

    foreach($addedFotos as $index => $pic){
        if($pic["id"] == $fotoId){
            $pic["favorite"] = false;
            $addedFotos[$index] = $pic;
        }
    }
    $addedFotos = $addedFotos;
}

saveJson("addedFotos.json",$addedFotos);

header("Location: ../albumContent.php?album=$albumName");
exit();

?>