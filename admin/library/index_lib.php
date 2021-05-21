<?php

$error = '';
if($_POST){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = "SELECT * FROM users WHERE username='". $username ."' AND password='". md5($password) ."'";
	
	$rs = mysqli_query($con, $sql);
	
	if(mysqli_num_rows($rs)){
		
		$rec = mysqli_fetch_assoc($rs);
		
		$_SESSION['login'] = $rec;
		redirect('dashboard.php');
	}else{
		$error = 'Incorrect username/password!';
	}
}