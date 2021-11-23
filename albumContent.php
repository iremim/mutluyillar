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
            require_once "phpfiles/headerAlbumContent.php";

            $albums = loadJson("phpfiles/albums.json");
            $addedFotos = loadJson("phpfiles/addedFotos.json");

            $chosenAlbumsPics = getAlbumsPicture($album, $albums,$addedFotos);

            if(!isset($chosenAlbumsPics)){
                echo '<p style="color:red;">Album bos, <a href="addPic.php">Burdan </a>foto ekleyebilirsin</p>';
            }else{

                foreach(getAlbumsPicture($album, $albums,$addedFotos) as $pic){
                    echo "
                    <div class='mainBox' id=".$pic["id"]."><div class="."imgBox".">".
                    "<i class='w3-jumbo w3-spin fa fa-refresh changeButton'>
                    </i><img class='img' src='".$pic["imgUrl"]."'>
                    <img class='imgFlip hide' src='".$pic["imgFlipUrl"]."'>
                    </div><p class='underText'>".$pic["name"]."</p></div>
                    ";
                }
            }

            require_once "phpfiles/footerAlbumContent.php";

        } else{
            require_once "phpfiles/defaultAlbum.php";
        }

}
?>

