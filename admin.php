<?php
session_start();
include 'config.php';

// (Optional: you can later restrict admin login)


// Delete record
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM donations WHERE id=$id");
    header("Location: admin.php");
}
?>

<h2 align="center">Admin Panel - Manage Donations</h2>

<table border="1" align="center" cellpadding="10">
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

    <td><?php echo $row['status']; ?></td>

    <td>
        <a href="admin.php?id=<?php echo $row['id']; ?>" 
        onclick="return confirm('Delete this record?')">
        Delete
        </a>
    </td>
</tr>
<?php } ?>

</table>