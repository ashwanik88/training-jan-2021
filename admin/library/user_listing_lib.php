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

$params = '';
if(isset($_GET['sort']) && !empty($_GET['sort'])){
	$sort = $_GET['sort'];
	$params .= '&sort=' . $sort;
}

if(isset($_GET['order']) && !empty($_GET['order'])){
	$order = $_GET['order'];
	$params .= '&order=' . $order;
}

$filter = ' WHERE 1=1 ';
$filter_user_id = '';
if(isset($_GET['filter_user_id']) && !empty($_GET['filter_user_id'])){
	$filter_user_id = $_GET['filter_user_id'];
	$filter .= " AND user_id='". (int)$filter_user_id ."'";
}
$filter_username = '';
if(isset($_GET['filter_username']) && !empty($_GET['filter_username'])){
	$filter_username = $_GET['filter_username'];
	$filter .= " AND username='". $filter_username ."'";
}
$filter_fullname = '';
if(isset($_GET['filter_fullname']) && !empty($_GET['filter_fullname'])){
	$filter_fullname = $_GET['filter_fullname'];
	$filter .= " AND fullname LIKE '%". $filter_fullname ."%'";
}
$filter_status = '';
if(isset($_GET['filter_status'])){
	$filter_status = $_GET['filter_status'];
	$filter .= " AND status='". (int)$filter_status ."'";
}

$sql_total = "SELECT COUNT(*) as total FROM users" . $filter;
$rs_total = mysqli_query($con, $sql_total);
$rec_total = mysqli_fetch_assoc($rs_total);

$page_size = 10;
$total_record = $rec_total['total'];

$start_index = 0;
if(isset($_GET['page']) && !empty($_GET['page'])){
	$page = $_GET['page'];
	$start_index = ($page - 1) * $page_size;
}

$sql = "SELECT * FROM users ". $filter ." ORDER BY ". $sort ." " . $order . " LIMIT ". $start_index .", " . $page_size;
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