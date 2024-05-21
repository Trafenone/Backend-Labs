<?php

$pdo = new PDO("mysql:hostname=localhost;dbname=lab6", "root", "root");

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $sql = "SELECT * FROM notes";
    $statement = $pdo->query($sql);
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $sql = "INSERT INTO notes (title, content) VALUES (:title, :content)";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":title", $data["title"]);
    $statement->bindParam(":content", $data["content"]);
    if ($statement->execute()) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, "error" => $statement->errorInfo()));
    }
}

if ($_SERVER["REQUEST_METHOD"] === "PUT") {
    $data = json_decode(file_get_contents("php://input"), true);
    $sql = "UPDATE notes SET title = :title, content = :content WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":title", $data["title"]);
    $statement->bindParam(":content", $data["content"]);
    $statement->bindParam(":id", $data["id"]);
    if ($statement->execute()) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, error => $statement->errorInfo()));
    }
}

if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
    $sql = "DELETE FROM notes WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":id", $_GET["id"]);
    if ($statement->execute()) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, error => $statement->errorInfo()));
    }
}
$pdo->q
$pdo = null;