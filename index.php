<?php
include 'db.php';
$result = $conn->query("SELECT * FROM employees");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Management</title>
</head>
<body>
    <h2>Employee List</h2>
    <a href="add.php">Add New Employee</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Position</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><a href="view.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['phone'] ?></td>
                <td><?= $row['position'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> | 
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>