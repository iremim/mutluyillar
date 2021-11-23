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
