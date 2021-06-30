<?php

if($_COOKIE){
	if(isset($_COOKIE['username']) && !empty($_COOKIE['username']) && isset($_COOKIE['password']) && !empty($_COOKIE['password'])){
		$username = $_COOKIE['username'];
		$password = $_COOKIE['password'];
		authUser($con, $username, $password);
	}
	
}

$error = '';
if($_POST){
	if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
		$username = post($_POST['username']);
		
		$password = md5($_POST['password']);
		authUser($con, $username, $password);
	}
}

function authUser($con, $username, $password){
$sql = "SELECT * FROM users WHERE username='". escape($username) ."' AND password='". $password ."'";


$rs = mysqli_query($con, $sql);

if(mysqli_num_rows($rs)){
	
	$rec = mysqli_fetch_assoc($rs);
	
	if(isset($_POST['remember']) && !empty($_POST['remember'])){
		setcookie('username', $username, time() + 60 * 60 * 24 * 30);
		setcookie('password', $password, time() + 60 * 60 * 24 * 30);
	}
	
	$_SESSION['login'] = $rec;
	
	addAlert('success', 'Successfully logged in!');
	redirect('dashboard.php');
}else{
	addAlert('danger', 'Incorrect username/password!');
}	
}