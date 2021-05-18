<?php 

// include('connection.php');
//include_once('connection.php');

// require('connection.php');
require_once('startup.php');

$sql = "SELECT * FROM `users` WHERE username='admin' AND password='". md5('admin') ."'";
$rs = mysqli_query($con, $sql);
if(mysqli_num_rows($rs)){
	$rec = mysqli_fetch_assoc($rs);
	echo $rec['username'];
}else{
	echo 'Incorrect username/password!';
}
?>