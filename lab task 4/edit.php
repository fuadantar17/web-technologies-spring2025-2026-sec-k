<?php
include "db.php";

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];

    $sql = "UPDATE students 
            SET name='$name', email='$email', department='$department' 
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Student updated successfully! <br>";
        echo "<a href='index.php'>Back</a>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h2>Edit Student</h2>

    <form method="POST">
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
        <input type="text" value="<?php echo $row['registration_no']; ?>" disabled><br><br>
        <input type="text" name="department" value="<?php echo $row['department']; ?>" required><br><br>
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>