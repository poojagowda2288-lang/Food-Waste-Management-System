<?php
include 'config.php';

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Registered Successfully');</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Register</h2>

<form method="POST">
<input type="text" name="name" placeholder="Name" required><br><br>
<input type="email" name="email" placeholder="Email" required><br><br>
<input type="password" name="password" placeholder="Password" required><br><br>

<button name="register">Register</button>
</form>

<br>
<a href="login.php">Already have account? Login</a>

</body>
</html>