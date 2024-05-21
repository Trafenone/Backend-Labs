<?php

session_start();

$user = $_SESSION["user"];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit user</title>
</head>
<body>
<form action="" method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php
    echo $user['username'] ?? ''; ?>" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php
    echo $user['email'] ?? ''; ?>" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" value="<?php
    echo $user['first_name'] ?? ''; ?>"><br><br>

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" value="<?php
    echo $user['last_name'] ?? ''; ?>"><br><br>

    <label for="date_of_birth">Date of Birth:</label>
    <input type="date" id="date_of_birth" name="date_of_birth" value="<?php
    echo $user['date_of_birth'] ?? ''; ?>"><br><br>

    <label for="gender">Gender:</label>
    <select id="gender" name="gender" required>
        <option value="Male" <?php
        echo (isset($user['gender']) && $user['gender'] == 'Male') ? 'selected' : ''; ?>>Male
        </option>
        <option value="Female" <?php
        echo (isset($user['gender']) && $user['gender'] == 'Female') ? 'selected' : ''; ?>>Female
        </option>
    </select><br><br>

    <label for="country">Country:</label>
    <input type="text" id="country" name="country" value="<?php
    echo $user['country'] ?? ''; ?>"><br><br>

    <label for="city">City:</label>
    <input type="text" id="city" name="city" value="<?php
    echo $user['city'] ?? ''; ?>"><br><br>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" value="<?php
    echo $user['address'] ?? ''; ?>"><br><br>

    <label for="postal_code">Postal Code:</label>
    <input type="text" id="postal_code" name="postal_code" value="<?php
    echo $user['postal_code'] ?? ''; ?>"><br><br>

    <label for="phone_number">Phone Number:</label>
    <input type="tel" id="phone_number" name="phone_number" value="<?php
    echo $user['phone_number'] ?? ''; ?>"><br><br>

    <div>
        <input type="submit" value="Submit">
        <a href="index.php">Back</a>
    </div>
</form>

<?php

require_once "Config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $first_name = $_POST["first_name"] ?? "";
    $last_name = $_POST["last_name"] ?? "";
    $date_of_birth = $_POST["date_of_birth"] ?? "";
    $gender = $_POST["gender"];
    $country = $_POST["country"] ?? "";
    $city = $_POST["city"] ?? "";
    $address = $_POST["address"] ?? "";
    $postal_code = $_POST["postal_code"] ?? "";
    $phone_number = $_POST["phone_number"] ?? "";

    $pdo = new PDO(Config::$dns, Config::$username, Config::$password);

    $sql = "UPDATE users SET 
                 username = :username,
                 email = :email,
                 password = :password,
                 first_name = :first_name,
                 last_name = :last_name,
                 date_of_birth = :date_of_birth,
                 gender = :gender,
                 country = :country,
                 city = :city,
                 address = :address,
                 postal_code = :postal_code,
                 phone_number = :phone_number
             WHERE id = :id
             ";

    $statement = $pdo->prepare($sql);
    $statement->bindParam(":username", $username);
    $statement->bindParam(":email", $email);
    $statement->bindParam(":password", $password);
    $statement->bindParam(":first_name", $first_name);
    $statement->bindParam(":last_name", $last_name);
    $statement->bindParam(":date_of_birth", $date_of_birth);
    $statement->bindParam(":gender", $gender);
    $statement->bindParam(":country", $country);
    $statement->bindParam(":city", $city);
    $statement->bindParam(":address", $address);
    $statement->bindParam(":postal_code", $postal_code);
    $statement->bindParam(":phone_number", $phone_number);
    $statement->bindParam(":id", $user["id"]);
    $statement->execute();

    $sql = "SELECT * FROM users WHERE id = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":id", $user["id"]);
    $statement->execute();

    $current_user = $statement->fetch();

    $_SESSION["user"] = $current_user;

    header("Location: index.html");
}
?>
</body>
</html>