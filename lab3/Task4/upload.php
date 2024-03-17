<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $image = $_FILES["image"];

        $dir = "images/";

        $fileName = $dir . $image["name"];

        move_uploaded_file($image["tmp_name"], $fileName);
    }
} else {
    echo "<p><strong>Фотографія:</strong> Файл не було завантажено</p>";
}
?>