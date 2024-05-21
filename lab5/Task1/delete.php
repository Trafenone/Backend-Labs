<?php

require_once "Config.php";

session_start();
$current_user = $_SESSION["user"];
var_dump($current_user);
if($current_user !== null) {
    $pdo = new PDO(Config::$dns, Config::$username, Config::$password);
    $sql = "DELETE FROM users WHERE id = '{$current_user["id"]}'";
    $pdo->query($sql);
    unset($_SESSION["user"]);
}
header("Location: index.html");
session_destroy();