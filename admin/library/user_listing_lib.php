<?php checkAdminAccess();


if($_GET){
	if(isset($_GET['action']) && !empty($_GET['action'])){
		$action = $_GET['action'];
		
		if($action == 'delete'){
			if(isset($_GET['user_id']) && !empty($_GET['user_id'])){
				
				$user_id = $_GET['user_id'];
				$sql = "DELETE FROM users WHERE user_id='". $user_id ."'";
				mysqli_query($con, $sql);
				addAlert('success', 'User id: '. $user_id .' has been deleted!');
				
				redirect('user_listing.php');
				
			}else{
				addAlert('danger', 'User id is missing!');
			}
			
		}else{
			addAlert('danger', 'Action not defined');
		}
	}
	
}


$sql = "SELECT * FROM users";
$rs = mysqli_query($con, $sql);

$data = array();
if(mysqli_num_rows($rs)){
	while($rec = mysqli_fetch_assoc($rs)){
		$data[] = $rec;
	}
}