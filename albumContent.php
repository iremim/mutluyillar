<?php
session_start();

if(!isset($_SESSION["isLoggedIn"])){
    header("Location: login.php");
    exit();
}
require_once "phpfiles/functions.php";

if($_GET["album"]){
    $album = $_GET["album"];
    
        if($_GET["album"] !== "defaultAlbum"){
            require_once "phpfiles/headerFotoGram.php";

            $albums = loadJson("phpfiles/albums.json");
            $chosenAlbumsPics = getAlbumsPicture($album, $albums,$addedFotos);

            if($chosenAlbumsPics){
                echo '<p style="color:red;">Album bos, <a href="addPic.php">Burdan </a>foto ekleyebilirsin</p>';
            }else{
                foreach($chosenAlbumsPics as $pic){
                    echo "<img src=".$pic["imgUrl"].">";
                }
            }

            require_once "phpfiles/footerFotoGram.php";

            
        } else{
            require_once "phpfiles/defaultAlbum.php";
        }

}
?>

