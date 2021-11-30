<?php
session_start();

if(!isset($_SESSION["isLoggedIn"])){
    header("Location: login.php");
    exit();
}

$inloggedUser = $_SESSION["inLoggedUser"];
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e057c972d7.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="stylesheets/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Birlikte Nice Senelere</title>
</head>
<body>
    <div id="titleBox" class="titleBox">
        <a href="fotoGram.php"><i class="material-icons" style="font-size:24px;color: white;">collections</i></a>
        <h1 style="font-family:'Kaushan Script', cursive; font-size:25px; width: 34vh;text-align: center;"><a href="index.php" style="text-decoration: none;color: white;">HediyApp</a></h1>
        <a href="logout.php"><i class="fa fa-sign-out" style="font-size:24px; color: white;"></i></a>
    </div>
    
    <?php
        if($inloggedUser["id"] == 1){
            echo '
                <div id="playGround" class="playArea">
                    <div id="firstDiv">
                        <h2>Mutlu Yıllar Sevgilim <i id="heart" class="far fa-heart" style="font-size:34px;color:white; margin-left: 6.8px;"></i></h2>
                    </div>
                    <div id="secondDiv" style="padding: 10px; height: 160px; position: relative; text-align: justify;">
                        <p>Bugün sevgili karımın doğum günü, bu yüzden onu mutlu etmek için bu küçük uygulamayi yaptım.
                            Umarım seninle geçireceğimiz daha çok doğum günleri olur canım. 
                            Ne dün ne yarın, insan hayatındaki en önemli an şu anıdır.  
                            Onun  için her zaman her anımda olmanı istiyorum. <i class="fas fa-kiss-wink-heart" style="font-size:20px; color:white;"></i></p>
                        
                            <p>Simdi seninle birlikte bi oyun oynayacagiz. 
                                Bu oyunu eger 75% basari oraniyla bitirebilirsen 
                                istedigin herhangi bi seyi kayitsiz sartsiz yerine 
                                getirecegim! Ne dilersen ...<i class="fas fa-kiss-wink-heart" style="font-size:20px; color:white;"></i></p>
                                <p>Oyun toplamda 10 sorudan olusmakta ve her soru da sadece tek bir cevap 10 poan degerinde!</p>
                                
                                <p style="text-align: center;"><span style="font-size:20px;">&#8595;</span> Baslamak icin <span style="font-size:20px;">&#8595;</span></p>
                                <div style="position: relative;">
                                    <button id="start" style="/*! left: 0px; *//*! right: 10px; */position: absolute;right: calc(45% - 1%);"><i id="gamepad" style="font-size:24px" class="fas fa-gamepad"></i></button>
                                </div>
                        </div>
                </div>
            ';
          
        }else{
            echo '
                <div id="otherUsersDiv">
                    <h2>HediyApp´e Hosgeldin '.$inloggedUser["username"].'!</h2>
                    <p>Hemen ilk albumunu olustur!</p>
                    <a href="fotoGram.php" style="text-decoration: none; color: honeydew; display: flex;flex-direction: column; align-items:center;justify-content: center;">
                    <i class="fas fa-file-image" style="color:honeydew; font-size:36px"></i><p style="font-weight: bold;margin: 0;margin-top: 7px;">Albumler</p></a>
                </div>
            ';
        }
    ?>
<script src="scripts/pictures.js"></script>
<script src="scripts/questions.js"></script>
<script src="scripts/store.js"></script>
<script src="scripts/script.js"></script>
</body>
</html>

