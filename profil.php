<?php
session_start();

if(!isset($_SESSION["isLoggedIn"])){
    header("Location: login.php");
    exit();
}

require_once "phpfiles/functions.php";

$user = $_GET["user"];

$users = loadJson("phpfiles/users.json");


?>