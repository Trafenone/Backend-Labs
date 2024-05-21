<?php

header("Cache-Control: no-cache, must-revalidate");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    $_SESSION["username"] = $_POST["username"];
    header("Location: profile.php");
    exit();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
</head>
<body>
<form method="POST"">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username"><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" value="Sign up">
</form>
</body>
</html>