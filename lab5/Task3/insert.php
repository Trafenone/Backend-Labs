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
        <label>Position: <input type="text" name="position" id="position" required/></label>
        <label>Salary: <input type="number" name="salary" id="salary" required/></label>
        <button type="submit">Insert</button>
        <button onclick="location.href = 'index.php'">Go back</button>
    </form>

    <?php

    require_once "Database.php";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $position = $_POST["position"];
        $salary = $_POST["salary"];

        try {
            $db = new Database();
            $pdo = $db->getPdo();
            $sql = "INSERT INTO employees (name, position, salary) VALUES (:name, :position, :salary)";
            $statement = $pdo->prepare($sql);
            $statement->bindParam(":name",$name);
            $statement->bindParam(":position",$position);
            $statement->bindParam(":salary",$salary);
            $statement->execute();
            $id = $pdo->lastInsertId();
            echo "Record created successfully with ID: {$id}";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    ?>
</body>
</html>