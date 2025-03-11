<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM employees WHERE id = $id");
$employee = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Details</title>
</head>
<body>
    <h2>Employee Details</h2>
    <p><strong>Name:</strong> <?= $employee['name'] ?></p>
    <p><strong>Email:</strong> <?= $employee['email'] ?></p>
    <p><strong>Phone:</strong> <?= $employee['phone'] ?></p>
    <p><strong>Position:</strong> <?= $employee['position'] ?></p>
    <a href="index.php">Back</a>
</body>
</html>