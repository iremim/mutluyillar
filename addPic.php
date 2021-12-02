<?php
session_start();

if(!isset($_SESSION["isLoggedIn"])){
    header("Location: login.php");
    exit();
}

$user = $_SESSION["inLoggedUser"];

require_once "phpfiles/functions.php";
$albums = loadJson("phpfiles/albums.json");

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e057c972d7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="stylesheets/addPic.css">
    <title>Foto Ekle</title>
</head>
<body>    
    <div id="titleBox" class="titleBox">
        <a href="index.php"><i class="fa fa-home" style="font-size:24px;color: white;"></i></a>
        <h1 style="font-family:'Kaushan Script', cursive; font-weight:bold; font-size:25px; width: 34vh;text-align: center;"><a style="text-decoration: none;color: white;">FotoGram</a></h1>
        <a href="fotoGram.php"><i class="material-icons" style="font-size:24px;color: white;">collections</i></a>
    </div>
    <main>
        <form id="upload-img" action="/phpfiles/addFoto.php" method="POST" enctype="multipart/form-data">
            <div id="title">
                <h1 style="font-family:'Kaushan Script', cursive;">Foto Ekle</h1>
            </div>
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "eksik"){
                        echo '<p style="color:red; margin:0;">Bisey unuttun!!</p>';
                    }else{
                        echo '<p style="color:red; margin:0;">Foto eklenemedi!</p>';
                    } 
                }
            ?>
            <p>
            <label>Ön: </label>
            <input type="file" name="img">
            </p>
            <p>
            <label>Arka: </label>
            <input type="file" name="imgFlip">
            </p>
            <input id="inputLast" type="text" name="name" placeholder="Konu / Tarih">
            <select id="albumSelect" name="albumName">    
                <?php
                    if(isset($_GET["comingFrom"])){
                        $adressToSend = $_GET["comingFrom"];
                        echo "<option value=".$adressToSend.">".$adressToSend."</option>";
                    }else{
                        foreach($albums as $album){
                            if($user["id"] == 0){
                                echo "<option value=".$album["albumName"].">".$album["albumName"]."</option>";
                            }
                            if($album["ownerId"] == $user["id"]){
                                echo "<option value=".$album["albumName"].">".$album["albumName"]."</option>";
                            }
                        }
                    }
                ?>
            </select>
            <button>Ekle</button>
        </form>
    </main>
</body>
</html>