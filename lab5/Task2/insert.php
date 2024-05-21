<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert new record</title>
    <style>
        form {
            width: 400px;
        }

        label {
            display: block;
            margin: 10px 0 0 0;
        }

        input, textarea {
            width: 100%;
        }

        button {
            width: 100%;
            margin: 5px 0;
        }
    </style>
</head>
<body>
<form action="" method="POST">
    <label>Name: <input type="text" name="name" id="name" required/></label>
    <label>Price: <input type="number" name="price" id="price" required/></label>
    <label>Count: <input type="number" name="count" id="count" required/></label>
    <label>Comment: <textarea name="comment" id="comment"></textarea></label>
    <button type="submit">Insert</button>
    <button onclick="location.href = 'index.php'">Go back</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $count = $_POST["count"];
    $comment = $_POST["comment"] ?? "";

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=lab5", "homeuser", "homeuser");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $result = $pdo->prepare("INSERT INTO `tov` (`name`, `price`, `count`, `comment`) VALUES (?, ?, ?, ?)");
        if($result) {
            $result->execute(array($name, $price, $count, $comment));
            $id = $pdo->lastInsertId();
            echo "Record created successfully with ID: {$id}";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
</body>
</html>