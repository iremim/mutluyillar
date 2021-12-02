<?php
session_start();

if(!isset($_SESSION["isLoggedIn"])){
    header("Location: login.php");
    exit();
}

require_once "phpfiles/functions.php";

$data = loadJson("phpfiles/users.json");
$users = $data["users"];

$userId = $_SESSION["inLoggedUser"]["id"];

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "phpfiles/links.php" ?>
    <link rel="stylesheet" href="stylesheets/settings.css">
    <title>Ayarlar</title>
</head>
<body>
    <div id="titleBox">
        <a href="index.php"><i class="fa fa-home" style="font-size:24px;color: white;"></i></a>
        <h1 style="font-family:'Kaushan Script', cursive; font-size:25px; width: 34vh;text-align: center;"><a style="text-decoration: none;color: white;">Ayarlar</a></h1>
        <a href="logout.php"><i class="fa fa-sign-out" style="font-size:24px; color: white;"></i></a>
    </div>
    <main>
        <?php
            foreach($users as $user){
                if($user["id"] == $userId){
                    echo "
                        <div id='userInfo' class='user'>
                            <div id='avatarSide' class='uBox'>
                                <img id='usersAvatar' src='".$user["avatar"]."'>
                                <div id='changeAvatar'><i class='fa fa-wrench'></i> Profil fotonu değiştir</div>
                            </div>
                            <div id='textSide' class='uBox'>    
                                    <p id='usernamep'>".$user["username"]." 
                                        <i class='fas fa-user-edit' 
                                        style='font-size:25px;position: relative;top: -20px;left: -4px;'>
                                        </i>
                                    </p>
                                    <p id='description'>".$user["description"]."
                                        <i class='fa fa-edit' style='position: absolute;
                                        right: -14px;bottom: -5px;font-size: 44px;'>
                                        </i>
                                   </p>
                            </div>    
                        </div>
                    ";
                }
            }
            echo "
                <div id='updateBoxes' class='updateBoxes'>
   
                </div>
            ";
        ?>

    </main>
    <script src="scripts/settings.js"></script>
    <?php 
        $inLoggedUserID = $_SESSION["inLoggedUser"]["id"];
        require_once "phpfiles/footer.php"; 
    ?>
</body>
</html>