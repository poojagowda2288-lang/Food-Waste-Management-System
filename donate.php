,<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'config.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$msg = "";

if (isset($_POST['submit'])) {

    $food = trim($_POST['food']);
    $qty = trim($_POST['qty']);
    $loc = trim($_POST['loc']);
    $contact = trim($_POST['contact']);

    $query = "INSERT INTO donations(food_name, quantity, location, contact, status)
              VALUES('$food','$qty','$loc','$contact','Pending')";

    if(mysqli_query($conn, $query)){
        $msg = "Food Donated Successfully!";
    } else {
        $msg = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Donate Food</title>

<style>
body {
    font-family: Arial;
    background: linear-gradient(to right, #74ebd5, #9face6);
    text-align: center;
}

h2 {
    color: #333;
}

form {
    background: white;
    padding: 25px;
    display: inline-block;
    border-radius: 15px;
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
}

input {
    padding: 10px;
    margin: 8px;
    width: 220px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

button {
    padding: 10px 20px;
    background: #28a745;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background: #218838;
}

a {
    text-decoration: none;
    color: red;
    font-weight: bold;
}
</style>

</head>
<body>

<h2>Donate Food</h2>

<?php if($msg != "") { ?>
<h3 style="color:green;"><?php echo $msg; ?></h3>
<?php } ?>

<a href="logout.php">Logout</a><br>
<a href="view.php">View Donations</a><br><br>

<form method="post">

Food Name:<br>
<input type="text" name="food" required><br>

Quantity:<br>
<input type="text" name="qty" required><br>

Location:<br>
<input type="text" name="loc" required><br>

Contact:<br>
<input type="text" name="contact" required><br><br>

<button name="submit">Donate</button>

</form>

</body>
</html>