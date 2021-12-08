<?php
     $method = $_SERVER["REQUEST_METHOD"];
     require_once "functions.php";

     $data = loadJson("users.json");
     $users = $data["users"];

     if($method == "GET"){
        sendJson($users);
        exit();
     }
?>