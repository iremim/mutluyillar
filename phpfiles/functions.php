<?php

function loadJson($filename){
    $json = file_get_contents($filename);
    return json_decode($json, true);
};

function saveJson($filename, $data){
    $json = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents($filename, $json);
};

function getAlbumsPicture($album){
    $albums = loadJson("albums.json");
    
    foreach($albums as $album){
        if($album["albumName"] == $album){
            return $album;
        }
    }
}
?>
