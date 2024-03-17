<?php
session_start();

$form_data = $_SESSION["form_data"] ?? array();
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
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            gap: 10px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin-right: 6px;
            width: auto;
        }

        .radio-group,
        .checkbox-group {
            margin-bottom: 16px;
        }

        .radio-group label,
        .checkbox-group label {
            display: inline-block;
            margin-bottom: 8px;
        }

        .radio-group input,
        .checkbox-group input {
            display: inline-block;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .menu_languages {
            background-color: black;
            border-radius: 15px;
            padding: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="menu_languages">
    <a href="index.php?lang=ua"><img src="icons/ua.png" alt="ua.png"/></a>
    <a href="index.php?lang=pl"><img src="icons/pl.png" alt="pl.png"/></a>
    <a href="index.php?lang=en"><img src="icons/en.png" alt="en.png"/></a>
    <a href="index.php?lang=de"><img src="icons/de.png" alt="de.png"/></a>
    <a href="index.php?lang=fr"><img src="icons/fr.png" alt="fr.png"/></a>
</div>

<?php
if($_SERVER["REQUEST_METHOD"] == "GET") {
    $cookie_name = "lang";
    $cookie_value = $_GET["lang"];

    setcookie($cookie_name, $cookie_value, time() + (15778800), "/");

    echo "<div> Вибрана мова: " . $_COOKIE[$cookie_name] . "</div>";
}
?>

<form action="user.php" method="POST" enctype="multipart/form-data">
    <label for="login">Логін:</label>
    <input type="text" id="login" name="login"
           value="<?php echo isset($form_data['login']) ? htmlspecialchars($form_data['login']) : ''; ?>" required>

    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required
            value="<?php echo isset($form_data['password']) ? htmlspecialchars($form_data['password']) : ''; ?>">

    <label for="confirm_password">Пароль (ще раз):</label>
    <input type="password" id="confirm_password" name="confirm_password" required
           value="<?php echo isset($form_data['password']) ? htmlspecialchars($form_data['password']) : ''; ?>">

    <div class="radio-group">
        <label>Стать:</label>
        <input type="radio" id="male" name="gender"
               value="Чоловік" <?php echo (isset($form_data['gender']) && $form_data['gender'] === 'Чоловік') ? 'checked' : ''; ?>
               required>
        <label for="male">Чоловіча</label>
        <input type="radio" id="female" name="gender"
               value="Жінка" <?php echo (isset($form_data['gender']) && $form_data['gender'] === 'Жінка') ? 'checked' : ''; ?>
               required>
        <label for="female">Жіноча</label>
    </div>

    <label for="city">Місто:</label>
    <select id="city" name="city" required>
        <?php
        $cities = array("Київ", "Львів", "Одеса", "Житомир");
        foreach ($cities as $city) {
            echo "<option value=\"$city\" " . (isset($form_data['city']) && $form_data['city'] === $city ? 'selected' : '') . ">$city</option>";
        }
        ?>
    </select>

    <div class="checkbox-group">
        <label>Улюблені ігри:</label>
        <input type="checkbox" id="game1" name="games[]"
               value="WOW" <?php echo (isset($form_data['games']) && in_array('WOW', $form_data['games'])) ? 'checked' : ''; ?>>
        <label for="game1">WOW</label>
        <input type="checkbox" id="game2" name="games[]"
               value="WOT" <?php echo (isset($form_data['games']) && in_array('WOT', $form_data['games'])) ? 'checked' : ''; ?>>
        <label for="game2">WOT</label>
        <input type="checkbox" id="game3" name="games[]"
               value="DOTA 2" <?php echo (isset($form_data['games']) && in_array('DOTA 2', $form_data['games'])) ? 'checked' : ''; ?>>
        <label for="game3">DOTA 2</label>
    </div>

    <label for="about">Про себе:</label>
    <textarea id="about" name="about" rows="4" cols="50"
              required><?php echo isset($form_data['about']) ? htmlspecialchars($form_data['about']) : ''; ?></textarea>

    <label for="photo">Фотографія:</label>
    <input type="file" id="photo" name="photo" accept="image/*" required>

    <input type="submit" value="Зареєструватися">
</form>
</body>
</html>