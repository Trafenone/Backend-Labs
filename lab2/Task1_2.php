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
$result = "some text";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = isset($_POST['text']) ? $_POST['text'] : '';

    $cities = explode(" ", $text);

    sort($cities, SORT_STRING);
    $result = implode(" ", $cities);
}
?>

<form method="post" action="">
    <label for="text">Текст:</label>
    <textarea name="text" id="text" rows="4" cols="50">Київ Харків Львів Одеса Дніпро Запоріжжя Івано-Франківськ Луцьк Тернопіль Рівне Чернівці Житомир Херсон Черкаси Ужгород</textarea><br>

    <input type="submit" value="Виконати">

    <p><?php echo $result ?></p>
</form>

</body>
</html>
