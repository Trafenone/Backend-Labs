<?php

session_start();
$current_user = $_SESSION["user"] ?? null;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            box-sizing: border-box;
            height: 100vh;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #form {
            width: 250px;
            padding: 20px;
            background-color: #f2f2f2;
        }

        label {
            display: flex;
            justify-content: space-between;
        }

        #buttons {
            display: flex;
            flex-direction: column;
        }

        #buttons button, a {
            border: none;
            background: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }

        #buttons button:focus {
            outline: none;
        }
    </style>
</head>
<body>

<?php
if ($current_user === null) { ?>
    <form id="form" method="post" action="">
        <div>
            <label>Login: <input type="text" id="login" name="login" required/></label>
        </div>
        <div>
            <label>Password: <input type="password" id="password" name="password" required/></label>
        </div>
        <button type="submit">Sign in</button>
        <a href="register.php">Sign up</a>
    </form>
    <?php
} else { ?>
    <div>
        <h2>Hello <?php
            echo $current_user["username"];
            ?></h2>
        <div id="buttons">
            <a href="edit.php">Edit profile</a>
            <a href="delete.php">Delete account</a>
            <a href="logout.php">Sign out</a>
        </div>
    </div>
    <?php
} ?>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];

    $pdo = new PDO("mysql:host=localhost;dbname=lab5", "root", "root");

    $sql = "SELECT * FROM users WHERE email = :login AND password = :password";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":login", $login);
    $statement->bindParam(":password", $password);
    $statement->execute();

    $current_user = $statement->fetch();

    if ($current_user) {
        $_SESSION["user"] = $current_user;
        header("Location: index.html");
    } else {
        echo "User is not found";
    }
}
?>
</body>
</html>