<?php

require_once "Database.php";

$employee = null;

$id = $_GET["id"];

try {
    $db = new Database();
    $pdo = $db->getPdo();
    $sql = "SELECT * FROM employees WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":id", $id);
    $statement->execute();
    $employee = $statement->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $position = $_POST["position"];
    $salary = $_POST["salary"];

    try {
        $db = new Database();
        $pdo = $db->getPdo();
        $sql = "UPDATE employees SET name = :name, position = :position, salary = :salary WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":position", $position);
        $stmt->bindParam(":salary", $salary);
        $stmt->bindParam(":id", $employee["id"]);
        $stmt->execute();
        header("Location: index.html");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
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
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="<?php
    echo $employee['name']; ?>"><br>
    <label for="position">Position:</label><br>
    <input type="text" id="position" name="position" value="<?php
    echo $employee['position']; ?>"><br>
    <label for="salary">Salary:</label><br>
    <input type="text" id="salary" name="salary" value="<?php
    echo $employee['salary']; ?>"><br><br>
    <button type="submit">Update</button>
    <button type="button" onclick="location.href = 'index.html'">Go back</button>
</form>
</body>
</html>