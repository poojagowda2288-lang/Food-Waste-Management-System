<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "food_db");

if (isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);

    $res = mysqli_query($conn, "SELECT * FROM ngo_users WHERE email='$email'");
    $row = mysqli_fetch_assoc($res);

    if ($row && $row['password'] == $pass) {

        $_SESSION['ngo'] = $email;
        header("Location: ngo_dashboard.php");
        exit();

    } else {
        echo "Invalid NGO Login!";
    }
}
?>

<h2>NGO Login</h2>

<form method="post">
Email: <input type="email" name="email" required><br><br>
Password: <input type="password" name="password" required><br><br>
<button name="login">Login</button>
</form>