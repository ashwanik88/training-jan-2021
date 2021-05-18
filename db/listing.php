<?php 

// include('connection.php');
//include_once('connection.php');

// require('connection.php');
require_once('startup.php');

$sql = "SELECT * FROM `users`";
$rs = mysqli_query($con, $sql);

?>
<!doctype html>
<html>
<head>
	<title>PHP database connection</title>
</head>
<body>
<table border="1" cellpadding="10" cellspacing="0">
<tr>
	<th>User Id</th>
	<th>Username</th>
	<th>Fullname</th>
	<th>Status</th>
</tr>
<?php 
 if(mysqli_num_rows($rs)){
	 while($rec = mysqli_fetch_assoc($rs)){	// array as output with keys and values
		 ?>
<tr>
	<td><?php echo $rec['user_id']; ?></td>
	<td><?php echo $rec['username']; ?></td>
	<td><?php echo $rec['fullname']; ?></td>
	<td><?php echo $rec['status']; ?></td>
</tr>	
	 
		 <?php
	 }
 }
?>

</table>
</body>
</html>
