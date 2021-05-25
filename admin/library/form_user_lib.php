<?php checkAdminAccess();

$error = '';
$username = '';
$password = '';
$cpassword = '';
$fullname = '';
$status = '';

if($_POST){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$fullname = $_POST['fullname'];
	$status = (isset($_POST['status']))?$_POST['status']:0;
	
	if(isset($username) && !empty($username) && isset($password) && !empty($password) && isset($cpassword) && !empty($cpassword) && isset($fullname) && !empty($fullname) && isset($status)){	
		if($password == $cpassword){
			
			$sql = "SELECT * FROM users WHERE username='". $username ."'";
			$rs = mysqli_query($con, $sql);
			if(!mysqli_num_rows($rs)){
				
				$sql = "INSERT INTO users(username, password, fullname, status) values ('". $username ."', '". $password ."', '". $fullname ."', '". $status ."')";
				$rs = mysqli_query($con, $sql);
				redirect('user_listing.php');
				
			}else{
				$error = 'Username already exists!';
			}
		}else{
			$error = 'Confirm password not match!';
		}	
	}else{
		$error = 'Incomplete form data!';
	}
}