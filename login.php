<?php
session_start();
include 'config.php';

if (isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);

    $res = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $row = mysqli_fetch_assoc($res);

    if ($row && $row['password'] == $pass) {

        $_SESSION['user'] = $email;

        header("Location: donate.php");
        exit();

    } else {
        echo "Invalid Details!";
    }
}
?>

<h2>Login</h2>

<form method="post">
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button name="login">Login</button>
</form>