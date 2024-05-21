<?php

session_start();
$username = $_SESSION["username"];

echo "<h1>Profile page</h1>";

echo "<p style='color: #007bff'>Hello $username</p>";