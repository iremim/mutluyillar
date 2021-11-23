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

    foreach($albums as $album){
        if($album["albumName"] == $album){
            foreach($addedFotos as $picture){
                if($album["albumName"] == $picture["album"]){
                    $picturesOfChosenAlbum[] = $picture;
                }
            }
        }
    }

    if($picturesOfChosenAlbum){
        return $picturesOfChosenAlbum;
    }else{
        return false;
    }

}
?>
