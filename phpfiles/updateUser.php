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

if(isset($_FILES["img"])){

    $img = $_FILES["img"];
    $filename = $img["name"];
    $tempname = $img["tmp_name"];

    $info = pathinfo($filename);
    //Filändelse
    $ext = strtolower($info["extension"]);

      // så vi kan slå samman dom nedan.
    //   $time = (string) time(); // Klockslaget i millisekunder
      // Skapa ett unikt filnamn
      $uniqueFilename = sha1("$filename");
      // Samma filnamn som den som laddades upp
      move_uploaded_file($tempname, "../profilFotos/$uniqueFilename.$ext");

    foreach($users as $index => $user){
        if($user["id"] == $inLoggedUserID){
            $avatarToDelete = "../".$user["avatar"];
            unlink($avatarToDelete);

            $user["avatar"] = "profilFotos/$uniqueFilename.$ext";
            $users[$index] = $user;
        }
    }

    $data["users"] = $users;
    saveJson("users.json",$data);
    header("Location: ../settings.php?id=$inLoggedUserID");
    exit();
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


if(isset($_POST["description"])){
    
    foreach($users as $index => $user){
        if($user["id"] == $inLoggedUserID){
            $user["description"] = $_POST["description"];
            $users[$index] = $user;
        }
    }
    $data["users"] = $users;
    saveJson("users.json",$data);
    header("Location: ../settings.php?id=$inLoggedUserID");
    exit();
}


?>