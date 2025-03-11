<?php
$host = "localhost";
$user = "root"; // Default user in phpMyAdmin
$pass = ""; // Default password (leave empty if not set)
$dbname = "brewhive_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>