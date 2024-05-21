<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index page</title>
    <style>
        table {
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
<?php
require_once "Database.php";

try {
    $db = new Database();
    $pdo = $db->getPdo();
    $sql = "SELECT * FROM employees";
    $result = $pdo->query($sql);

    echo "<table>";
    echo "<tr>
        <th>Id</th>
        <th>Name</th>
        <th>Position</th>
        <th>Salary</th>
        <th>Actions</th>
    </tr>";
    foreach ($result as $row) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['position']}</td>
            <td>{$row['salary']}</td>
            <td>
                <form action='edit.php' method='GET'>
                    <input type='hidden' name='id' value='{$row['id']}'/>
                    <button type='submit'>Edit</button>
                </form>
                <form action='delete.php' method='POST'>
                    <input type='hidden' name='id' value='{$row['id']}'/>
                    <button type='submit'>Delete</button>
                </form>
            </td>
        </tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<br>

<button onclick="location.href = 'insert.php'">Add record</button>
<button onclick="location.href = 'statistics.php'" type="button">Get Statistics</button>

</body>
</html>