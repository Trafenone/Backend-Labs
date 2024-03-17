<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label>Login: <input type="text" name="login" required/></label>
        <label>Password: <input type="password" name="password" required/></label>
        <button type="submit">Submit</button>
    </form>
    <a href="delete.php">Delete</a>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $login = $_POST["login"];
            $password = $_POST["password"];

            if(!file_exists($login)) {
                mkdir($login);

                mkdir($login . "/video");
                mkdir($login . "/music");
                mkdir($login . "/photo");

                $testFile = fopen($login ."/video/testFile.txt", "w");
                fclose($testFile);

            } else {
                echo "Папка вже існує";
            }
        }
    ?>
</body>
</html>