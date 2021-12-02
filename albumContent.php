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
            echo' <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <link rel="preconnect" href="https://fonts.googleapis.com">
                        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                        <link rel="preconnect" href="https://fonts.googleapis.com">
                        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                        <link href="https://fonts.googleapis.com/css2?family=Cuprum&display=swap" rel="stylesheet"> 
                        <link rel="stylesheet" href="stylesheets/albumContent.css">
                        <title>FotoGram</title>
                    </head>
                    <body>
                        <div id="titleBox">
                            <a href="index.php"><i class="fa fa-home" style="font-size:24px;color: white;"></i></a>
                            <h1 style="font-family:'; echo "'Kaushan Script'"; echo', cursive; font-weight:bold; font-size:25px; width: 34vh;text-align: center;"><a href="logout.php" style="text-decoration: none;color: white;">'; echo $album; echo'</a></h1>
                            <a href="fotoGram.php"><i class="material-icons" style="font-size:24px;color: white;">collections</i></a>
                        </div> 
                        <main>';

            $albums = loadJson("phpfiles/albums.json");
            $addedFotos = loadJson("phpfiles/addedFotos.json");

            $chosenAlbumsPics = getAlbumsPicture($album, $albums,$addedFotos);

            if(empty($chosenAlbumsPics)){
                echo '<p style="color:white; text-align:center;">Album "'.$album.'" suan bos, asagidan foto ekleyebilirsin!</p>';
                echo '<div id="fotoPlace">';
            }else{
                echo '<div id="fotoPlace">';

                foreach(getAlbumsPicture($album, $albums,$addedFotos) as $pic){
                    echo "
                        <div class='mainBox' id=".$pic["id"].">
                            <div class="."imgBox"."><a class='deletePicButton' href='phpfiles/deletePic.php?id=".$pic["id"]."&album=".$album."'>X</a>
                                <i class='w3-jumbo w3-spin fa fa-refresh changeButton'></i>";

                                if($pic["favorite"]== false){
                                    echo "<a href='phpfiles/favorite.php?add=".$pic["id"]."&album=".$album."' class='addFavorite'><span class='material-icons'>favorite_border</span></a>";
                                }else{
                                    echo "<a href='phpfiles/favorite.php?rem=".$pic["id"]."&album=".$album."' class='removeFavorite'><span class='material-icons'>favorite</span></a>";
                                }

                               echo "<img class='img' src='".$pic["imgUrl"]."'>
                                <img class='imgFlip hide' src='".$pic["imgFlipUrl"]."'>
                            </div>
                            <p class='underText'>".$pic["name"]."</p>
                        </div>
                    ";
                }
            }
            echo '<div class="mainBox">
                    <div id="NewPic">
                        <a href="addPic.php?comingFrom='.$album.'"><i class="fa fa-plus" style="font-size:70px; color: black;"></i></a>
                    </div>
                </div>';

            require_once "phpfiles/footerAlbumContent.php";
        
        } else{
            require_once "phpfiles/defaultAlbum.php";
        }

        $inLoggedUserID = $_SESSION["inLoggedUser"]["id"];
        require_once "phpfiles/footer.php";
}
?>

