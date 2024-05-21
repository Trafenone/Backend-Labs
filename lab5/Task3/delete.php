<?php
require_once "Database.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    try {
        $db = new Database();
        $pdo = $db->getPdo();

        $sql = "DELETE FROM employees WHERE id=:id";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        $result = $statement->execute();
        echo $result ? "Record with ID: {$id} was successfully deleted" : "Something went wrong...";
        echo "<br><button onclick='location.href = `index.html`'>Go back</button>";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}