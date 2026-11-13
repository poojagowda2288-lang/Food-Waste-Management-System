<?php
session_start();
include 'config.php';

// Protect page (login required)
if (!isset($_SESSION['ngo'])) {
    header("Location: ngo_login.php");
    exit();
}


// Accept donation
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "UPDATE donations SET status='Accepted' WHERE id=$id");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>NGO Dashboard</title>

<style>
body {
    font-family: Arial;
    background-color: #f5f5f5;
    text-align: center;
}

h2 {
    margin-top: 20px;
}

table {
    border-collapse: collapse;
    width: 90%;
    margin: auto;
    background: white;
}

th, td {
    padding: 12px;
    text-align: center;
}

th {
    background-color: #333;
    color: white;
}

.pending {
    color: orange;
    font-weight: bold;
}

.accepted {
    color: green;
    font-weight: bold;
}

.btn {
    background: green;
    color: white;
    padding: 6px 12px;
    text-decoration: none;
    border-radius: 5px;
}

.logout {
    display: inline-block;
    margin: 10px;
    padding: 8px 15px;
    background: red;
    color: white;
    text-decoration: none;
}
</style>

</head>
<body>

<h2>NGO Dashboard</h2>

<a href="ngo_logout.php" class="logout">Logout</a>

<br><br>

<table border="1">
<tr>
    <th>ID</th>
    <th>Food</th>
    <th>Quantity</th>
    <th>Location</th>
    <th>Contact</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php
$res = mysqli_query($conn, "SELECT * FROM donations");

while ($row = mysqli_fetch_assoc($res)) {
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['food_name']; ?></td>
    <td><?php echo $row['quantity']; ?></td>
    <td><?php echo $row['location']; ?></td>
    <td><?php echo $row['contact']; ?></td>

    <td>
        <?php if($row['status'] == "Pending") { ?>
            <span class="pending">Pending</span>
        <?php } else { ?>
            <span class="accepted">Accepted</span>
        <?php } ?>
    </td>

    <td>
        <?php if($row['status'] == "Pending") { ?>
            <a href="ngo_dashboard.php?id=<?php echo $row['id']; ?>" class="btn">
                Accept
            </a>
        <?php } else { ?>
            Done
        <?php } ?>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>