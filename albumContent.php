<?php
session_start();

if(!isset($_SESSION["isLoggedIn"])){
    header("Location: login.php");
    exit();
}

if($_GET["album"]){
    $album = $_GET["album"];
    
        if($_GET["album"] !== "defaultAlbum"){
            require_once "phpfiles/headerFotoGram.php";
    
            getAlbumsPicture($album);
    
            require_once "phpfiles/footerFotoGram.php";

            
        } else{
            require_once "phpfiles/defaultAlbum.php";
        }

}

?>

