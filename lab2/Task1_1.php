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
        margin-bottom: 8px;
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

<form method="post" action="">
    <label for="text">Текст:</label>
    <textarea name="text" id="text" rows="4" cols="50">Це є приклад тексту для тестування. Введіть свій текст та використовуйте форму для заміни символів.</textarea><br>

    <label for="find">Знайти:</label>
    <input type="text" name="find" id="find" value="текст"><br>

    <label for="replace">Замінити:</label>
    <input type="text" name="replace" id="replace" value="рядок"><br>

    <input type="submit" value="Виконати">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = isset($_POST['text']) ? $_POST['text'] : '';
    $find = isset($_POST['find']) ? $_POST['find'] : '';
    $replace = isset($_POST['replace']) ? $_POST['replace'] : '';

    $result = str_replace($find, $replace, $text);

    echo '<label for="result">Результат:</label>';
    echo '<p>' . $result . '</p>';
}
?>

</body>
</html>
