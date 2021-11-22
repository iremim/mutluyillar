<?php

$method = $_SERVER["REQUEST_METHOD"];

function loadJson($filename){
    $json = file_get_contents($filename);
    return json_decode($json, true);
};

function saveJson($filename, $data){
    $json = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents($filename, $json);
};

$fotos = loadJson("addedFotos.json");

$highestId = 0;

if($method == "POST" && isset($_FILES["img"]) && isset($_FILES["imgFlip"]) && isset($_POST["name"])){
    $imgName = $_POST["name"];

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
            "imgUrl"=>"upload/$uniqueFilename.$ext",
            "name"=> $imgName,
            "imgFlipUrl"=> "https://hediyapp.herokuapp.com/upload/$uniqueFilename"."Flip.$ext",
            "nameFlip" => $imgName."Flip",
        ];

      array_push($fotos, $newFoto);
      saveJson("addedFotos.json", $fotos);

      echo "<img src=".$newFoto["imgUrl"].">";
    //   header("Locations: albums.php");
      exit();
}

?>
