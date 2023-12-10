<?php

require 'config.php';

if (isset($_POST["submit"])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $hobbies = $_POST['hobbies'];
    $projectOnWork = $_POST['projectOnWork'];

    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username ='$username' OR email ='$email' ");

    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script> alert('Username or email has already been taken'); </script>";
    } else {
        if ($password == $confirmPassword) {
            // Use prepared statement to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO tb_user (fname, lname, username, email, number, password, hobbies, projectOnWork) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $fname, $lname, $username, $email, $number, $password, $hobbies, $projectOnWork);

            // Execute the prepared statement
            $stmt->execute();

            echo "<script> alert('Registration successful'); </script>";
        } else {
            echo "<script> alert('Password doesn't match'); </script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="mt-4 grow flex items-center justify-around">
    <div class="mb-64 max-w-md mx-auto">
        <h1 class="text-4xl text-center mb-4">Register</h1>
        <form class="max-w-md mx-auto" method="post" action="">
    <div class="flex">
        <div class="input-field flex-grow">
            <label for="fname">First Name: </label>
            <input
                type="text"
                name="fname"
                placeholder="First Name"
                class="input-field"
            />
        </div>
        <div class="input-field flex-grow">
            <label for="lname">Last Name: </label>
            <input
                type="text"
                name="lname"
                placeholder="Last Name"
                class="input-field"
            />
        </div>

        <div class="input-field flex-grow">
            <label for="Username">Username: </label>
            <input
                type="text"
                name="username"
                placeholder="User Name"
                class="input-field"
            />
        </div>
    </div>

    <div class="input-field">
        <label for="email">Your Email: </label>
        <input
            type="email"
            name="email"
            placeholder="Your Email"
            class="input-field"
        />
    </div>

    <div class="input-field">
        <label for="number">Phone Number: </label>
        <input
            type="tel"
            name="number"
            placeholder="Phone Number"
            class="input-field"
        />
    </div>

    <div class="input-field">
        <label for="password">Password: </label>
        <input
            type="password"
            name="password"
            placeholder="Password"
            class="input-field"
        />
    </div>

    <div class="input-field">
        <label for="confirmPassword">Confirm Password: </label>
        <input
            type="password"
            name="confirmPassword"
            placeholder="Confirm Password"
            class="input-field"
        />
    </div>

    <div class="input-field">
        <label for="hobbies">Hobbies: </label>
        <input
            type="text"
            name="hobbies"
            placeholder="Hobbies"
            class="input-field"
        />
    </div>

    <div class="input-field">
        <label for="projectOnWork">Project On Work: </label>
        <input
            type="text"
            name="projectOnWork"
            placeholder="Project On Work"
            class="input-field"
        />
    </div>

    <button
        type="submit"
        class="primary"
        name="submit"
    >
        Register
    </button>
</form>
        <?php if (isset($message)): ?>
            <div class="alert"><?= $message; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
