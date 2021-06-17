<?php checkAdminAccess();
// var_dump(unlink(DIR_UPLOADS . '1623913788_45812.jpeg'));
// die;

$user_id = 0;
$error = '';
$username = '';
$password = '';
$cpassword = '';
$fullname = '';
$status = '';
$photo = '';

if($_GET){
	if(isset($_GET['user_id']) && !empty($_GET['user_id'])){
		$user_id = $_GET['user_id'];
		
		$sql = "SELECT * FROM users WHERE user_id='". (int)$user_id ."'";
		$rs = mysqli_query($con, $sql);
		
		$rec = mysqli_fetch_assoc($rs);
		
		$username = $rec['username'];
		$fullname = $rec['fullname'];
		$status = $rec['status'];
		
	}
	
}

if($_POST){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$fullname = $_POST['fullname'];
	$status = (isset($_POST['status']))?$_POST['status']:0;
	
	if(isset($username) && !empty($username) && isset($fullname) && !empty($fullname) && isset($status)){	
		if($password == $cpassword){

			if(!userExist($username, $user_id)){
				
				if(isset($_FILES['photo']) && !empty($_FILES['photo'])){
					$ext = pathinfo($_FILES['photo']['name']);
					$new_filename = time(). '_' . rand(9999, 99999) .'.'. $ext['extension'];
					$dest = DIR_UPLOADS.$new_filename;
					$src = $_FILES['photo']['tmp_name'];
					$resp = move_uploaded_file($src, $dest);	// copy() and for delete file use unlink(filepath);
					
					if($resp){
						$photo = $new_filename;
					}else{
						addAlert('danger', 'File not uploaded!');
					}
				}
				
				if($user_id){
					$sql = "UPDATE users SET username='". $username ."', fullname='". $fullname ."', photo='". $photo ."', status='". $status ."' WHERE user_id='". (int)$user_id ."'";
					addAlert('success', 'User account has been updated!');
					
					if(!empty($password)){
						$sql2 = "UPDATE users SET password='". md5($password) ."' WHERE user_id='". (int)$user_id ."'";
						mysqli_query($con, $sql2);
					}
				}else{
					$sql = "INSERT INTO users(username, password, fullname, photo, status) values ('". $username ."', '". md5($password) ."', '". $fullname ."', '". $photo ."', '". $status ."')";
					addAlert('success', 'New user account has been created!');
				}
				
				
				
				$rs = mysqli_query($con, $sql);
				
				
				redirect('user_listing.php');
				
			}else{
				addAlert('danger', 'Username already exists!');
			}
		}else{
			
			addAlert('danger', 'Confirm password not match!');
				
		}	
	}else{
		addAlert('warning', 'Incomplete form data!');
	}
}

function userExist($username, $user_id){
	global $con;
	$sql = "SELECT * FROM users WHERE username='". $username ."' AND user_id!='". (int)$user_id ."'";
	$rs = mysqli_query($con, $sql);
	if(mysqli_num_rows($rs)){
		return true;
	}
	return false;
}