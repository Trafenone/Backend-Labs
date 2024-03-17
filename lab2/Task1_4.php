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
$result = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_string = $_POST['first_string'] ?? '';
    $second_string = $_POST['second_string'] ?? '';

    $first_date = DateTime::createFromFormat("d-m-Y", $first_string);
    $second_date = DateTime::createFromFormat("d-m-Y", $second_string);

    $interval = $first_date->diff($second_date);
    $result = $interval->format('%R%a днів');
}
?>

<form method="post" action="">
    <label for="first_string">Перший рядок:</label>
    <input type="text" name="first_string" id="first_string" value="10-02-2015">

    <label for="second_string">Другий рядок:</label>
    <input type="text" name="second_string" id="second_string" value="15-03-2015">

    <input type="submit" value="Виконати">

    <p><?php echo $result ?></p>
</form>

</body>
</html>
