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
		
		addAlert('success', 'Successfully logged in!');
		redirect('dashboard.php');
	}else{
		addAlert('danger', 'Incorrect username/password!');
	}
}