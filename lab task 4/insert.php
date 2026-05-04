<?php
include "db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$registration_no = $_POST['registration_no'];
$department = $_POST['department'];

$sql = "INSERT INTO students (name, email, registration_no, department)
        VALUES ('$name', '$email', '$registration_no', '$department')";

if (mysqli_query($conn, $sql)) {
    echo "Student added successfully! <br>";
    echo "<a href='index.php'>Back</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>