<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task2</title>
</head>
<body>
<?php

session_start();

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $pdo = new PDO("mysql:hostname=localhost;dbname=lab6", "root", "root");
    if(isset($_POST["itemId"])) {
        $sql = "DELETE FROM menu WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id", $_POST["itemId"]);
    } else {
        $sql = "INSERT INTO menu (title, link) VALUES (:title, :link)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":title", $_POST["title"]);
        $statement->bindParam(":link", $_POST["link"]);
    }

    if($statement->execute()) {
        session_destroy();
        header("Location: index.php");
    }
}

function getMenuItems() {
    $pdo = new PDO("mysql:hostname=localhost;dbname=lab6", "root", "root");
    $sql = "SELECT * FROM menu";
    $statement = $pdo->query($sql);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function outputMenu() {
    $menuItems = getMenuItems();
    echo "<ul>";
    foreach ($menuItems as $item) {
        echo "<li><a href='" . $item['link'] . "'>" . $item['title'] . " (ID: " . $item['id'] . " )" . "</a></li>";
    }
    echo "</ul>";
}

if (!isset($_SESSION['cached_menu'])) {
    ob_start();
    outputMenu();
    $_SESSION['cached_menu'] = ob_get_contents();
    ob_end_clean();
    echo $_SESSION['cached_menu'];
} else {
    echo $_SESSION['cached_menu'];
}

?>

<form method="POST">
    <input type="text" name="title" placeholder="Title" required>
    <input type="text" name="link" placeholder="Link" required>
    <input type="submit" name="AddItem" value="Add New Item">
</form>

<form method="POST">
    <input type="text" name="itemId" placeholder="ID menu that need to be deleted" required>
    <input type="submit" name="deleteItem" value="Delete Item">
</form>

</body>
</html>