<?php
session_start();

require 'config.php';


if (isset($_POST["submit"])) {
    $usernameoremail= $_POST['usernameoremail'];
    $password = $_POST['password'];
    $result=mysqli_query($conn,"SELECT * FROM tb_user WHERE username = '$usernameoremail' OR email = '$usernameoremail'" );
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0 ){
        if($password==$row["password"]){
            $_SESSION["login"]=true;
            $_SESSION["id"]=$row["id"];
            header("Location: index.php");
        }else{
            echo 
        "<script> alert('Password Incorrect'); </script>";
        }

    }else{
        echo 
        "<script> alert('User not registered'); </script>";
    }

   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <h1 class="text-4xl text-center mb-4">Login</h1>
            <form class="max-w-md mx-auto" method="post" action="">
                <input
                    type="text"
                    name="usernameoremail"
                    placeholder="Username or email"
                    class="input-field"
                />
                <input
                    type="password"
                    name="password"
                    placeholder="password"
                    class="input-field"
                />
                <button
                    type="submit"
                    class="login-button"
                >
                    Login
                </button>
                <div class="text-center py-2 text-gray-500">
                    Don't have an account yet? <a class="register-link" href="signup.php">Register now</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
