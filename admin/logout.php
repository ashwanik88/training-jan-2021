<?php require_once('includes/startup.php');
 
setcookie('username', $username, time() - 60 * 60 * 24 * 30);
setcookie('password', $password, time() - 60 * 60 * 24 * 30);
		
unset($_SESSION['login']);

addAlert('success', 'Successfully logged out!');

redirect('index.php');

