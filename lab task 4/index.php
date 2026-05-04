<?php include "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management</title>
</head>
<body>
    <h2>Add Student</h2>

    <form action="insert.php" method="POST">
        <input type="text" name="name" placeholder="Student Name" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="text" name="registration_no" placeholder="Registration Number" required><br><br>
        <input type="text" name="department" placeholder="Department" required><br><br>
        <button type="submit">Add Student</button>
    </form>

    <h2>Student Records</h2>

    <table border="1" cellpadding="10">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Registration No</th>
            <th>Department</th>
            <th>Action</th>
        </tr>

        <?php
        $result = mysqli_query($conn, "SELECT * FROM students");

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['registration_no']}</td>
                <td>{$row['department']}</td>
                <td>
                    <a href='edit.php?id={$row['id']}'>Edit</a> |
                    <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>