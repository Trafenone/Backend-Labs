<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 20px;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 0 auto;
    }

    label {
        display: block;
        margin: 10px 0;
    }

    textarea, input[type="text"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 12px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
<body>

<?php
$result1 = "";
$result2 = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $length = $_POST['length'] ?? '';
    $user_password = $_POST['password'] ?? '';

    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=[]{}|;:,.<>?';
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = mt_rand(0, strlen($characters) - 1);
        $password .= $characters[$randomIndex];
    }

    function isStrongPassword($password)
    {
        if (strlen($password) < 8) {
            return false;
        }

        if (!preg_match('/[A-Z]/', $password)) {
            return false;
        }

        if (!preg_match('/[a-z]/', $password)) {
            return false;
        }

        if (!preg_match('/[0-9]/', $password)) {
            return false;
        }

        if (!preg_match('/[!@#$%^&*()_+[\]{}|;:,.<>?]/', $password)) {
            return false;
        }

        return true;
    }

    if (isStrongPassword($user_password)) {
        $result2 = "Пароль міцний!";
    } else {
        $result2 = "Пароль не відповідає вимогам міцності.";
    }

    $result1 = $password;
}


?>

<form method="post" action="">
    <label for="length">Кількість символів:</label>
    <input type="number" name="length" id="length">

    <label for="password">Ваш пароль:</label>
    <input type="text" name="password" id="password">

    <input type="submit" value="Виконати">

    <p><?php echo $result1 ?></p>
    <p><?php echo $result2 ?></p>
</form>

</body>
</html>
