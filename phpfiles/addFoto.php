<?php
session_start();

if(!isset($_SESSION["isLoggedIn"])){
    header("Location: login.php");
    exit();
}

$method = $_SERVER["REQUEST_METHOD"];

require_once "functions.php";

$fotos = loadJson("addedFotos.json");

$highestId = 0;

if($method == "POST" && !empty($_FILES["img"]) && !empty($_FILES["imgFlip"]) && !empty($_POST["albumName"]) && !empty($_POST["name"])){
    $imgName = $_POST["name"];
    $albumName = $_POST["albumName"];

    $img = $_FILES["img"];
    $filename = $img["name"];
    $tempname = $img["tmp_name"];

    $imgFlip = $_FILES["imgFlip"];
    $flipfilename = $imgFlip["name"];
    $fliptempname = $imgFlip["tmp_name"];

    $info = pathinfo($filename);

    foreach($fotos as $foto){
        if($foto["id"] > $highestId){
            $highestId = $foto["id"];
        }
    }

    $highestId += 1;

    //Filändelse
    $ext = strtolower($info["extension"]);

      // så vi kan slå samman dom nedan.
    //   $time = (string) time(); // Klockslaget i millisekunder
      // Skapa ett unikt filnamn
      $uniqueFilename = sha1("$imgName");
      // Samma filnamn som den som laddades upp
      move_uploaded_file($tempname, "../upload/$uniqueFilename.$ext");
      move_uploaded_file($fliptempname, "../upload/$uniqueFilename"."Flip.$ext");

      
        $newFoto = [
            "id"=> $highestId,
            "ownerID" => $_SESSION["inLoggedUser"]["id"],
            "album"=>$albumName,
            "imgUrl"=>"upload/$uniqueFilename.$ext",
            "name"=> $imgName,
            "imgFlipUrl"=> "upload/$uniqueFilename"."Flip.$ext",
            "nameFlip" => $imgName."Flip",
            "favorite" => false,
            "comments"=> [],
        ];

      array_push($fotos, $newFoto);
      $saved = saveJson("addedFotos.json", $fotos);

        if($saved){
          header("Location: ../albumContent.php?album=$albumName");
          exit();
        }else{
          header("Location: ../addPic.php?error=true");
          exit();
        }
      
} else{
    header("Location: ../addPic.php?error=eksik");
    exit();
}

?>
