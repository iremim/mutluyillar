<?php
// session_start();

// if(!isset($_SESSION["isLoggedIn"])){
//     header("Location: login.php");
//     exit();
// }

// $inLoggedUserId = $_SESSION["inLoggedUser"]["id"];

// require_once "functions.php";

// $fotos = loadJson("addedFotos.json");


// if(isset($_GET["picId"])){
//     $picId = $_GET["picId"];

//     if(isset($_GET["newComment"])){
//         $comment = $_GET["newComment"];
   
//         $time = (string) time();
    
//         $highestCommentID = sha1("$time$comment");
    
//         $newComment = [
//             "ownerId" => $inLoggedUserId,
//             "commentId" => $highestCommentID,
//             "comment" => $comment
//         ];
    
//         foreach($fotos as $index => $foto){
//             if($foto["id"] == $picId){

//                 array_push($foto["comments"], $newComment);
//                 $fotos[$index] = $foto;
//             }
//         }
    
//         saveJson("addedFotos.json", $fotos);
    
//         $comingFrom = $_GET["comingFrom"];

//         header("Location: ../profil.php?id=$comingFrom&comment=$comment");
//         exit();
//     }

//     if(isset($_GET["delete"])){
//         $commentId = $_GET["delete"];

//         foreach($fotos as $ind => $foto){
//             if($foto["id"] == $picId){
            
//                 $comments = $foto["comments"];

//                 foreach($comments as $index => $comment){
//                     if($comment["commentId"] == $commentId){   

//                         if($comment["ownerId"] == $inLoggedUserId || $foto["ownerID"] == $inLoggedUserId){
//                             array_splice($comments, $index, 1);
//                             $foto["comments"] = $comments;   
//                         }
//                     }
//                 }
//                 $fotos[$ind] = $foto;
//             }
//         }
        
//         saveJson("addedFotos.json",$fotos);

//         $comingFrom = $_GET["comingFrom"];
//         header("Location: ../profil.php?id=$comingFrom&deleted=true");
//         exit();
//     }
   
// }

?>