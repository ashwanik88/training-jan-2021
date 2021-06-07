<?php checkAdminAccess();

if($_POST){
	if(isset($_POST['user_ids']) && !empty($_POST['user_ids'])){
		$user_ids = $_POST['user_ids'];
		if(sizeof($user_ids) > 0){
			foreach($user_ids as $user_id){
				deleteUser($user_id);
			}
			addAlert('success', 'User ids: '. implode(', ', $user_ids) .' has been deleted!');
			redirect('user_listing.php');
		}else{
			addAlert('warning', 'No record selected');
		}
	}else{
		addAlert('warning', 'No record selected');
	}
}

if($_GET){
	if(isset($_GET['action']) && !empty($_GET['action'])){
		$action = $_GET['action'];
		
		if($action == 'delete'){
			if(isset($_GET['user_id']) && !empty($_GET['user_id'])){
				
				$user_id = $_GET['user_id'];
				
				deleteUser($user_id);
				
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

$sort = 'user_id';
$order = 'DESC';

if(isset($_GET['sort']) && !empty($_GET['sort'])){
	$sort = $_GET['sort'];
}

if(isset($_GET['order']) && !empty($_GET['order'])){
	$order = $_GET['order'];
}

$sql = "SELECT * FROM users ORDER BY ". $sort ." " . $order;
$rs = mysqli_query($con, $sql);

$data = array();
if(mysqli_num_rows($rs)){
	while($rec = mysqli_fetch_assoc($rs)){
		$data[] = $rec;
	}
}

function deleteUser($user_id){
	global $con;
	$sql = "DELETE FROM users WHERE user_id='". $user_id ."'";
	mysqli_query($con, $sql);
}