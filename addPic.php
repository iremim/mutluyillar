<?php
session_start();

if(!isset($_SESSION["isLoggedIn"])){
    header("Location: login.php");
    exit();
}
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
        <h1 style="font-family:'Kaushan Script', cursive; font-weight:bold; font-size:25px; width: 34vh;text-align: center;"><a href="logout.php" style="text-decoration: none;color: white;">FotoGram</a></h1>
        <a href="fotoGram.php"><i class="material-icons" style="font-size:24px;color: white;">collections</i></a>
    </div>
    <main>
        <div id="title">
            <h1 style="font-family: 'Cuprum', sans-serif;">Albume Ekle</h1>
        </div>
        <form id="upload-img" action="/phpfiles/addFoto.php" method="POST" enctype="multipart/form-data">
            <?php
                if(isset($_GET["error"])){
                    echo '<p style="color:red;">Foto eklenemedi</p>';
                }
            ?>
            <input type="file" name="img">
            <input type="file" name="imgFlip">
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="albumName" placeholder="Album Adi">
            <button>Ekle</button>
            <?php
                if(isset($_GET["ok"])){
                    echo '<p style="color:green;">Foto eklendi</p>';
                }
            ?>
        </form>
    </main>
</body>
</html>