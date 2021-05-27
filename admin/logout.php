<?php require_once('includes/startup.php'); 

unset($_SESSION['login']);

addAlert('success', 'Successfully logged out!');

redirect('index.php');

