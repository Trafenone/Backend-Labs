<?php
$commentsFile = "comments.txt";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $comment = $_POST["comment"];

    $stream = fopen($commentsFile, "a");
    fwrite($stream, "$name: $comment\n");
    fclose($stream);
}

$allComments = [];
if (file_exists($commentsFile)) {
    $allComments = file($commentsFile, FILE_IGNORE_NEW_LINES);
}
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
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }
    </style>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div>
        <label for="name">Ім'я</label>
        <input type="text" name="name" id="name"/>
    </div>
    <div>
        <label for="comment">Коментар</label>
        <input type="text" name="comment" id="comment"/>
    </div>
    <button type="submit">Додати</button>
</form>

<h2>Поточні коментарі</h2>

<?php if (!empty($allComments)): ?>
    <table border="1">
        <tr>
            <th>Ім’я</th>
            <th>Коментар</th>
        </tr>
        <?php foreach ($allComments as $comment): ?>
            <?php list($name, $text) = explode(':', $comment); ?>
            <tr>
                <td><?php echo trim($name); ?></td>
                <td><?php echo $text; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Поки немає коментарів.</p>
<?php endif; ?>

</body>
</html>
