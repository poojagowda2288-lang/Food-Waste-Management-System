<?php
include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>View Donations</title>
</head>
<body>

<h2>All Donations</h2>

<table border="1">
<tr>
<th>Food</th>
<th>Quantity</th>
<th>Location</th>
<th>Status</th>
</tr>

<?php
$sql = "SELECT * FROM donations";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)){
echo "<tr>
<td>".$row['food_name']."</td>
<td>".$row['quantity']."</td>
<td>".$row['location']."</td>
<td>".$row['status']."</td>
</tr>";
}
?>

</table>

</body>
</html>