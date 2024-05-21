<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'),true);
    $response = [];

    if(strlen($data["password"]) < 8) {
        $response = array("success" => false, "error" => "The password is short.");
    } else {
        try {
            $connection = mysqli_connect("localhost", "root", "root", "lab6");

            if(!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $statement = $connection->prepare("SELECT * FROM users WHERE email = ?");
            $statement->bind_param("s", $data["email"]);
            $statement->execute();
            $result = $statement->get_result();

            if($result->num_rows > 0) {
                $response = array("success" => false, "error" => "Email already exists.");
            } else {
                $statement = $connection->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
                $statement->bind_param("sss", $data["name"], $data["email"], $data["password"]);

                if($statement->execute()) {
                    $response = array("success" => true, "message" => "User registered successfully.");
                } else {
                    $response = array("success" => false, "error" => $connection->error);
                }
            }

            $statement->close();

        } catch (mysqli_sql_exception $e) {
            $response = array("success" => false, "error" => $e->getMessage());
        }
    }

    header("Content-Type: application/json");
    echo json_encode($response);
}