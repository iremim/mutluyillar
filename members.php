<?php
session_start();

if(!isset($_SESSION["isLoggedIn"])){
    header("Location: login.php");
    exit();
}

require_once "phpfiles/functions.php";

$inloggedUser = $_SESSION["inLoggedUser"];

$data = loadJson("phpfiles/users.json");
$users = $data["users"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e057c972d7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">

    <link rel="stylesheet" href="stylesheets/members.css">
    <title>Uyeler</title>
</head>
<body>
    <div id="titleBox">
        <a href="index.php"><i class="fa fa-home" style="font-size:20px;color: white;"></i></a>
        <h1 style="font-family:'Kaushan Script', cursive; font-size:25px; width: 34vh;text-align: center;"><a href="members.php" style="text-decoration: none;color: white;">Uyeler</a></h1>
        <a href="logout.php"><i class="fa fa-sign-out" style="font-size:24px; color: white;"></i></a>
    </div>
    <div id="usersBox">
    <?php
        $allUsersExceptInLogged = [];

        foreach($users as $user){
            if($user["id"] == $inloggedUser["id"]){
                echo "
                    <a href='profil.php?id=".$user["id"]."' class='user aktif'>
                        <img src='".$user["avatar"]."'>
                        <p>".$user["username"]."</p>
                    </a>
                ";
            }else{
                echo "
                    <a href='profil.php?id=".$user["id"]."' class='user'>
                        <img src='".$user["avatar"]."'>
                        <p>".$user["username"]."</p>
                    </a>    
                ";
            }
        }
    ?>
    </div>
    <?php 
        $inLoggedUserID = $_SESSION["inLoggedUser"]["id"];
        require_once "phpfiles/footer.php"; 
    ?>
  
</body>
</html>