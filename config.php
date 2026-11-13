<?php
error_reporting(0);

$host = "sql100.infinityfree.com";
$user = "if0_41593092";
$password = "Hungerneed46655";
$database = "if0_41593092_food_db";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");
?>