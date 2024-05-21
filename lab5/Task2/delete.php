<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=lab5", "homeuser", "homeuser");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM tov WHERE id=:id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        $result = $statement->execute();
        echo $result ? "Record with ID: {$id} was successfully deleted" : "Something went wrong...";
        echo "<br><button onclick='location.href = `index.html`'>Go back</button>";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}