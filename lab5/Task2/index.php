<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 5px;
        }

        #remove-block {
            margin: 5px 0;
        }
    </style>
</head>
<body>
<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=lab5", "homeuser", "homeuser");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM tov";
    $result = $pdo->query($sql);

//    foreach ($result as $row) {
//        echo "<p>" . $row["id"] . "|" . $row["name"] . "\t|" . $row["price"] . "\t|" . $row["count"] . "\t|" . $row["comment"] . "</p>";
//    }

    echo "<table>";
    echo "<tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Count</th>
        <th>Comment</th>
    </tr>";
    foreach ($result as $row) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['price']}</td>
            <td>{$row['count']}</td>
            <td>{$row['comment']}</td>
        </tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<br>

<button onclick="location.href = 'insert.php'">Add record</button>

<form action="delete.php" method="POST" id="remove-block">
    <button type="submit">Remove record</button>
    <input type="text" name="id" id="id">
</form>

</body>
</html>