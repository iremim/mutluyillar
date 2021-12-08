<?php

function loadJson($filename){
    $json = file_get_contents($filename);
    return json_decode($json, true);
};

function saveJson($filename, $data){
    $json = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents($filename, $json);
    return true;
};

// Skickar ut JSON till användaren
function sendJson($data, $statuscode = 200){
    header("Content-Type: application/json");
    http_response_code($statuscode);
    $json = json_encode($data);
    echo $json;
    die();
}

function getAlbumsPicture($album, $albums, $addedFotos){

    $picturesOfChosenAlbum = [];

    foreach($albums as $alb){
        if($alb["albumName"] == $album){
            foreach($addedFotos as $picture){
                if($album == $picture["album"]){
                    $picturesOfChosenAlbum[] = $picture;
                }
            }
        }
    }
    return $picturesOfChosenAlbum;
}
?>
