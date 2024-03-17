<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    $_SESSION['form_data'] = $_POST;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обробка форми</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .main {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        img {
            width: 300px;
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<div class="main">
    <h2>Ваші дані:</h2>
    <?php

    function checkPassword($password, $confirm_password) : bool {
        return $password == $confirm_password;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<p><strong>Логін:</strong> " . $_POST["login"] . "</p>";
        echo "<p><strong>Пароль: </strong>" . (checkPassword($_POST["password"], $_POST["confirm_password"]) ? $_POST["password"] : "Пароль не співпадає") . "</p>";
        echo "<p><strong>Стать:</strong> " . ($_POST["gender"] ?? "") . "</p>";
        echo "<p><strong>Місто:</strong> " . $_POST["city"] . "</p>";

        if (isset($_POST["games"]) && is_array($_POST["games"]) && count($_POST["games"]) > 0) {
            echo "<p><strong>Улюблені ігри:</strong> " . implode(", ", array_map(null, $_POST["games"])) . "</p>";
        } else {
            echo "<p><strong>Улюблені ігри:</strong> Немає вибраних ігор</p>";
        }

        echo "<p><strong>Про себе:</strong><br>" . nl2br($_POST["about"]) . "</p>";

        if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
            $target_dir = "images/";
            $target_file = $target_dir . $_FILES["photo"]["name"];
            $image_temp = $_FILES["photo"]["tmp_name"];

            if(is_uploaded_file($image_temp)) {
                if (move_uploaded_file($image_temp, $target_file)) {
                    echo "<p><strong>Фотографія:</strong> <img src='" . $target_file . "' alt='uploaded photo'></p>";
                } else {
                    echo "<p><strong>Фотографія:</strong> Помилка при завантаженні файлу</p>";
                }
            }
        } else {
            echo "<p><strong>Фотографія:</strong> Файл не було завантажено</p>";
        }
    } else {
        echo "<p>Помилка: Дані не були відправлені</p>";
    }
    ?>
    <a href="index.php">Повернутися на головну сторінку.</a>
</div>

</body>
</html>
