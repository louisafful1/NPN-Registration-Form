<?php

$conn = null; // Initialize $conn variable

if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == '::1') {
    $conn = mysqli_connect("localhost", "root", "", "dbName");
} else {
    $password = "password"; // 
    $conn = mysqli_connect("example.com", "user", $password, "dbName");
}

if (!$conn) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Rest of your code that uses the $conn variable

mysqli_close($conn);
