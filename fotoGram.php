<?php
session_start();

if(!isset($_SESSION["isLoggedIn"])){
    header("Location: login.php");
    exit();
}

    require_once "phpfiles/functions.php";

    require_once "phpfiles/headerFotoGram.php";

        echo '<div class="albumBox">
                <a href="albumContent.php?album=defaultAlbum">
                    Ilk senemiz
                </a></div>
        ';

        $albums = loadJson("phpfiles/albums.json");
        
        foreach($albums as $album){ 
        echo "<div class="."albumBox".">
            <a id='deleteAlbumButton' href='phpfiles/deleteAlbum.php?album=".$album["albumName"]."'>X</a>
            <a href="."albumContent.php?album=".$album["albumName"].">".
            $album["albumName"]
            ."</a></div>";
        };

        echo '<div class="albumBox">
                <div id="NewAlbum" style="height: 100%;width: 100%;display: flex;justify-content: center;align-items: center;background-color: white;opacity: 60%;border: 1px solid white;border-radius: 20px;">
                <a href="newAlbum.php"><i class="fa fa-plus" style="font-size:70px; color: black;"></i></a>
                </div></div>
        ';
                    
    require_once "phpfiles/footerFotoGram.php";


?>
