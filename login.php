<?php
session_start();

function checkTheUser($users, $username, $password){
    foreach($users as $user){
        if($user["username"] == $username && $user["password"] == $password){
            return true;
        } 
    }
    return false;
}

$data = json_decode(file_get_contents("phpfiles/users.json"), true);
$users = $data["users"];

if(isset($_SESSION["isLoggedIn"])){
    header("Location: index.php");
    exit();
}
else{
    if (isset($_POST["username"], $_POST["password"])) {
        $username = strtolower($_POST["username"]);
        $password = strtolower($_POST["password"]);
        
        if(empty($username) || empty($password)){
            header("Location: login.php?error=filltheboth");
            exit();
        } else{
            if(checkTheUser($users, $username, $password)){
                $_SESSION["isLoggedIn"] = true;
                foreach($users as $user){
                    if($user["email"]== $email){
                        $_SESSION["inLoggedUser"] = $user;
                    }
                }
                header("Location: index.php");
                exit();
            }else{
                header("Location: login.php?error=wrongUsernameorPassword");
                exit();
            }
        }
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheets/login.css">
    <title>Giris Yap</title>
</head>
<body>
<?php
echo '
<main>
  ';
?>
    <?php
        if(isset($_GET["error"])){
            $error = $_GET["error"];
            if($error == "filltheboth"){
                echo "<p class='error'>Ikisi de dolu olmali!!</p>";
            }
        }
    ?>
<?php   
  echo '  
    <form action="../login.php" method="POST">
    <input type="text" name="username" placeholder="Kullanici Adi">
    <input type="password" name="password" placeholder="Sifre">';

?>    
<?php
    if(isset($_GET["error"])){
        $error = $_GET["error"];
        if($error == "wrongUsernameorPassword"){
            echo "<p class='error'> Yanlis Kullanici adi veya Password!!</p>";
        }
    }
?>
<?php  
echo '
        <button>Giris yap</button>
    </form>
</main>
';
?>

</body>
</html>