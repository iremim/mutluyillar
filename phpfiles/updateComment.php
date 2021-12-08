<?php

    $method = $_SERVER["REQUEST_METHOD"];
    require_once "functions.php";

    $fotos = loadjson("addedFotos.json");

    if($method == "POST"){

        $data = file_get_contents("php://input");
        $requestData = json_decode($data, true);

        $picId = $requestData["picId"];
        $newComm = $requestData["newComment"];
        $commentOwnerId = $requestData["commentOwnerId"];

        $time = (string) time();
    
        $highestCommentID = sha1("$time$newComm");
    
        $newComment = [
            "ownerId" => $commentOwnerId,
            "commentId" => $highestCommentID,
            "comment" => $newComm
        ];
    
        foreach($fotos as $index => $foto){
            if($foto["id"] == $picId){

                array_push($foto["comments"], $newComment);
                $fotos[$index] = $foto;
            }
        }
    
        saveJson("addedFotos.json", $fotos);
        sendJson($newComment);
    }

    if($method == "DELETE"){

        $data = file_get_contents("php://input");
        $requestData = json_decode($data, true);

            $picId = $requestData["picId"];
            $commentId = $requestData["commentId"];
            $commentOwnerId = $requestData["commentOwnerId"];
    
            foreach($fotos as $ind => $foto){
                if($foto["id"] == $picId){
                
                    $comments = $foto["comments"];
    
                    foreach($comments as $index => $comment){
                        if($comment["commentId"] == $commentId){   
    
                            // if($comment["ownerId"] == $inLoggedUserId || $foto["ownerID"] == $inLoggedUserId){
                            if($comment["ownerId"] == $commentOwnerId){
                                array_splice($comments, $index, 1);
                                $foto["comments"] = $comments;   
                            }
                        }
                    }
                    $fotos[$ind] = $foto;
                }
            }
            
            saveJson("addedFotos.json",$fotos);
            sendJson($commentId);
    }
?>