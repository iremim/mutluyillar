<?php
session_start();

if(!isset($_SESSION["isLoggedIn"])){
    header("Location: login.php");
    exit();
}

require_once "functions.php";

$albums = loadJson("albums.json");
$addedFotos = loadJson("addedFotos.json");

$fotosToDelete = [];


if(isset($_GET["album"])){
    $albumName = $_GET["album"];

    foreach($albums as $index => $album){
        if($album["albumName"] == $albumName){
            array_splice($albums, $index, 1);
            $albums = $albums;
            
            foreach($addedFotos as $index => $foto){
                if($foto["album"] == $album["albumName"]){
                    
                    array_splice($addedFotos, $index, 1);
                    $addedFotos = $addedFotos;

                    $fotoToDelete = "../".$foto["imgUrl"];
                    $fotoFlipToDelete = "../".$foto["imgFlipUrl"];
                    unlink($fotoToDelete);
                    unlink($fotoFlipToDelete);
                }
            }
        }
    }

    saveJson("addedFotos.json", $addedFotos);
    saveJson("albums.json", $albums);

    header("Location: ../fotoGram.php");
    exit();
}
?>