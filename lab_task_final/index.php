<?php
$errors = [];
$success = false;

$fullName = $email = $username = $age = $gender = $course = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullName = trim($_POST["fullName"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";
    $confirmPassword = $_POST["confirmPassword"] ?? "";
    $age = trim($_POST["age"] ?? "");
    $gender = $_POST["gender"] ?? "";
    $course = $_POST["course"] ?? "";
    $terms = isset($_POST["terms"]);

    if (empty($fullName)) {
        $errors[] = "Full Name is required.";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $fullName)) {
        $errors[] = "Full Name must contain only letters and spaces.";
    }

    if (empty($email)) {
        $errors[] = "Email Address is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($username)) {
        $errors[] = "Username is required.";
    } elseif (strlen($username) < 5) {
        $errors[] = "Username must be at least 5 characters long.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }

    if (empty($confirmPassword)) {
        $errors[] = "Confirm Password is required.";
    } elseif ($password !== $confirmPassword) {
        $errors[] = "Password and Confirm Password must match.";
    }

    if (empty($age)) {
        $errors[] = "Age is required.";
    } elseif ($age < 18) {
        $errors[] = "Age must be 18 or above.";
    }

    if (empty($gender)) {
        $errors[] = "Gender must be selected.";
    }

    if (empty($course)) {
        $errors[] = "Course must be selected.";
    }

    if (!$terms) {
        $errors[] = "You must accept the Terms & Conditions.";
    }

    if (empty($errors)) {
        $success = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }
        .container {
            width: 450px;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin: 8px 0 15px;
        }
        input[type="radio"], input[type="checkbox"] {
            width: auto;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .error {
            background: #ffe0e0;
            padding: 10px;
            color: red;
            margin-bottom: 15px;
        }
        .success {
            background: #e0ffe0;
            padding: 10px;
            color: green;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Student Registration Form</h2>

    <?php if (!empty($errors)): ?>
        <div class="error">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="success">
            <h3>Registration Successful!</h3>
            <p><strong>Full Name:</strong> <?php echo htmlspecialchars($fullName); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
            <p><strong>Age:</strong> <?php echo htmlspecialchars($age); ?></p>
            <p><strong>Gender:</strong> <?php echo htmlspecialchars($gender); ?></p>
            <p><strong>Course:</strong> <?php echo htmlspecialchars($course); ?></p>
        </div>
    <?php endif; ?>

    <form method="POST" action="">
        <label>Full Name</label>
        <input type="text" name="fullName" value="<?php echo htmlspecialchars($fullName); ?>">

        <label>Email Address</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">

        <label>Username</label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>">

        <label>Password</label>
        <input type="password" name="password">

        <label>Confirm Password</label>
        <input type="password" name="confirmPassword">

        <label>Age</label>
        <input type="number" name="age" value="<?php echo htmlspecialchars($age); ?>">

        <label>Gender</label><br>
        <input type="radio" name="gender" value="Male" <?php if ($gender == "Male") echo "checked"; ?>> Male
        <input type="radio" name="gender" value="Female" <?php if ($gender == "Female") echo "checked"; ?>> Female

        <br><br>

        <label>Course Selection</label>
        <select name="course">
            <option value="">-- Select Course --</option>
            <option value="CSE" <?php if ($course == "CSE") echo "selected"; ?>>CSE</option>
            <option value="EEE" <?php if ($course == "EEE") echo "selected"; ?>>EEE</option>
            <option value="BBA" <?php if ($course == "BBA") echo "selected"; ?>>BBA</option>
            <option value="English" <?php if ($course == "English") echo "selected"; ?>>English</option>
        </select>

        <input type="checkbox" name="terms"> I accept Terms & Conditions

        <br><br>

        <button type="submit">Register</button>
    </form>
</div>

</body>
</html>