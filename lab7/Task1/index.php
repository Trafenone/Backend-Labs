<?php

session_start();

if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]) {
    header("Location: profile.php");
}

ob_start();

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if($username === "admin" && $password === "admin") {
        $_SESSION["loggedIn"] = true;

        echo "Login successfully";

        $_SESSION["messages"] = ob_get_clean();

        header("Location: profile.php");
    } else {
        echo "Wrong credentials!";
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<form method="POST">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username"><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" value="Увійти">
</form>
</body>
</html>