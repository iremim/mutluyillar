<?php
session_start();

if(!isset($_SESSION["isLoggedIn"])){
    header("Location: login.php");
    exit();
}

require_once "phpfiles/functions.php";

if(isset($_GET["id"])){
    $userId = $_GET["id"];

    $data = loadJson("phpfiles/users.json");
    $users = $data["users"];

    $addedFotos = loadJson("phpfiles/addedFotos.json");
    
    $usersFavoriter = [];
    
    foreach($addedFotos as $index => $foto){
        if($foto["ownerID"] == $userId){
            if($foto["favorite"] == true){
                array_push($usersFavoriter, $foto);
            }
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">

    <link rel="stylesheet" href="stylesheets/profil.css">
    <title>Profil</title>
</head>
<body>
    <div id="titleBox">
        <a href="index.php"><i class="fa fa-home" style="font-size:24px;color: white;"></i></a>
        <h1 style="font-family:'Kaushan Script', cursive; font-size:25px; width: 34vh;text-align: center;"><a style="text-decoration: none;color: white;">Profil</a></h1>
        <a href="logout.php"><i class="fa fa-sign-out" style="font-size:24px; color: white;"></i></a>
    </div>
    <main>
        <?php
            foreach($users as $user){
                if($user["id"] == $userId){
                    echo "
                        <div id='".$user["id"]."' class='user aktif'>
                            <img id='usersAvatar' src='".$user["avatar"]."'>
                            <div id='profilText'>
                                <p>".$user["username"]."</p>
                                <p>".$user["description"]."</p>
                            </div>
                        </div>
                        <p class='favText'>Favoriler</p>
                    ";
                }
            }
        ?>
    <div id="containerFav" style="display: flex; justify-content: center;">
        <div class="userFavorites">
            <?php 

                if(isset($_GET["comment"])){
                    echo "<div class='addedComment'>Yorumun '".$_GET["comment"]."' eklendi!</div>";
                }
                if(isset($_GET["deleted"])){
                    echo "<div class='addedComment'>Yorumun kaldirildi!</div>";
                }
              
                foreach($usersFavoriter as $pic){
                    $picID = $pic["id"];
                    echo "
                        <div class='mainBox' id=".$pic["id"].">
                            <div class="."imgBox".">
                                <i class='w3-jumbo w3-spin fa fa-refresh changeButton'></i>
                                <img class='img' src='".$pic["imgUrl"]."'>
                                <img class='imgFlip hide' src='".$pic["imgFlipUrl"]."'>
                            </div>
                            <p class='underText'>".$pic["name"]."</p>
                        </div>
                        <div class='commentField hide'>";

                        $fotoComments = $pic["comments"];
                        foreach($fotoComments as $comment){

                            foreach($users as $user){
                                if($user["id"] == $comment["ownerId"]){

                                    echo "
                                        <div class='comments'>
                                            <img src='".$user["avatar"]."'>
                                            <div id='".$comment["commentId"]."' class='commentText'> ".$comment["comment"]." </div>";
    
                                            if($comment["ownerId"] == $_SESSION["inLoggedUser"]["id"] || $pic["ownerID"] == $_SESSION["inLoggedUser"]["id"]){
                                                echo "
                                                    <a href='phpfiles/comments.php?picId=".$picID."&delete=".$comment["commentId"]."&comingFrom=".$pic["ownerID"]."' class='deleteComment'>X</a>
                                                ";
                                            }
                                            
                                    echo "
                                        </div>
                                    ";
                                }
                            }
                        }
                        
                    echo "<div class='newComment hide'>
                                <input type='text' name='newComment' placeholder='Yeni yorum..'>
                                <button>Ekle</button>
                            </div>
                            <div class='addComment'>Yorum ekle</div>
                        </div>
                    ";
                }
            ?>
        </div>
    </div>
    </main>

    <?php 
        $inLoggedUserID = $_SESSION["inLoggedUser"]["id"];
        require_once "phpfiles/footer.php"; 
    ?>
    <style>
        @media only screen and (max-height: 400px) {
        footer>a{
	    color: black;
        }
    }
    </style>
    <script src="scripts/profil.js"></script>
</body>
</html>