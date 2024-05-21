<?php

$pdo = new PDO("mysql:hostname=localhost;dbname=lab6", "root", "root");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT * FROM users";
    $statement = $pdo->query($sql);
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($users);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    $response = [];
    $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":email", $data["email"]);
    $statement->bindParam(":password", $data["password"]);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $response = array("success" => true, "user" => $result);
    } else {
        $response = array("success" => false);
    }

    echo json_encode($response);
}

if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    $data = json_decode(file_get_contents("php://input"), true);
    $response = [];
    $sql = "UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":name", $data["name"]);
    $statement->bindParam(":email", $data["email"]);
    $statement->bindParam(":password", $data["password"]);
    $statement->bindParam(":id", $data["id"]);

    if ($statement->execute()) {
        $response = array("success" => true);
    } else {
        $response = array("success" => false);
    }

    echo json_encode($response);
}

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $data = json_decode(file_get_contents('php://input'), true);
    $sql = "DELETE FROM users WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":id", $data["id"]);

    $response = [];

    if($statement->execute()) {
        $response = array("success" => true);
    } else {
        $response = array("success" => false);
    }

    echo json_encode($response);
}

$pdo = null;