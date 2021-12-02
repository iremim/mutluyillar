<?php
session_start();

if(!isset($_SESSION["isLoggedIn"])){
    header("Location: login.php");
    exit();
}

$inLoggedUserID = $_SESSION["inLoggedUser"]["id"];

require_once "functions.php";
$data = loadJson("users.json");
$users = $data["users"];

if(isset($_FILES["newImg"])){

}

if(isset($_POST["newName"]) && isset($_POST["newPassword"])){
    
    foreach($users as $index => $user){
        if($user["id"] == $inLoggedUserID){
            $user["username"] = $_POST["newName"];
            $user["password"] = $_POST["newPassword"];
            $users[$index] = $user;
            
        }
    }
    $data["users"] = $users;
    saveJson("users.json",$data);
    header("Location: ../settings.php?id=$inLoggedUserID");
    exit();
}

?>