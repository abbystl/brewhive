<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM employees WHERE id = $id");
$employee = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $position = $_POST["position"];

    $stmt = $conn->prepare("UPDATE employees SET name=?, email=?, phone=?, position=? WHERE id=?");
    $stmt->bind_param("ssssi", $name, $email, $phone, $position, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
</head>
<body>
    <h2>Edit Employee</h2>
    <form method="post">
        Name: <input type="text" name="name" value="<?= $employee['name'] ?>" required><br>
        Email: <input type="email" name="email" value="<?= $employee['email'] ?>" required><br>
        Phone: <input type="text" name="phone" value="<?= $employee['phone'] ?>" required><br>
        Position: <input type="text" name="position" value="<?= $employee['position'] ?>" required><br>
        <button type="submit">Update</button>
    </form>
    <a href="index.php">Back</a>
</body>
</html>