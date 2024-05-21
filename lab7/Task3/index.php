<?php

$pdo = new PDO("mysql:hostname=localhost;dbname=lab6", "root", "root");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $content = $_POST["content"];

    ob_start();
    echo $content;
    $buffered_content = ob_get_contents();
    ob_end_clean();

    $statement = $pdo->prepare("INSERT INTO posts (username, content) VALUES (:username, :content)");
    $statement->bindParam(":username", $username);
    $statement->bindParam(":content", $content);

    if ($statement->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $statement->errorCode() . "<br>";
    }
}

$sql = "SELECT * FROM posts";
$statement = $pdo->query($sql);
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($data > 0) {
    echo "<h1>Posts:</h1>";
    foreach ($data as $post) {
        echo "Username: " . $post["username"] . "<br>";
        echo "Post Content: " . $post["content"] . "<br><hr>";
    }
} else {
    echo "0 results";
}

$pdo = null;
?>

<form method="post">
    <input type="text" name="username" placeholder="Username"><br>
    <textarea name="content" placeholder="Post Content"></textarea><br>
    <input type="submit" name="submit" value="Submit">
</form>