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
        <h1 style="font-family:'Kaushan Script', cursive; font-size:25px; width: 34vh;text-align: center;"><a href="members.php" style="text-decoration: none;color: white;">Profil</a></h1>
        <a href="logout.php"><i class="fa fa-sign-out" style="font-size:24px; color: white;"></i></a>
    </div>
    <main>
        <?php
            foreach($users as $user){
                if($user["id"] == $userId){
                    echo "
                        <div class='user aktif'>
                            <img id='usersAvatar' src='".$user["avatar"]."'>
                            <p>".$user["username"]."</p>
                        </div>
                    ";
                }
            }
        ?>

        <div class="userFavorites">
            <p>Favoriler</p>
            <?php 
                foreach($usersFavoriter as $pic){
                    echo "
                        <div class='mainBox' id=".$pic["id"].">
                            <div class="."imgBox".">
                                <i class='w3-jumbo w3-spin fa fa-refresh changeButton'></i>
                                <img class='img' src='".$pic["imgUrl"]."'>
                                <img class='imgFlip hide' src='".$pic["imgFlipUrl"]."'>
                            </div>
                            <p class='underText'>".$pic["name"]."</p>
                        </div>
                    ";
                }
            ?>
        </div>
    </main>

    <?php 
        $inLoggedUserID = $_SESSION["inLoggedUser"]["id"];
        require_once "phpfiles/footer.php"; 
    ?>
    <script src="scripts/profil.js"></script>
</body>
</html>