<?php checkAdminAccess();

/*
$_REQUEST
$request->get[]
*/

if($_POST){
	if(isset($_POST['category_ids']) && !empty($_POST['category_ids'])){
		$category_ids = $_POST['category_ids'];
		if(sizeof($category_ids) > 0){
			foreach($category_ids as $category_id){
				deleteCategory($category_id);
			}
			addAlert('success', 'Category ids: '. implode(', ', $category_ids) .' has been deleted!');
			redirect('category_listing.php');
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
			if(isset($_GET['category_id']) && !empty($_GET['category_id'])){
				$category_id = $_GET['category_id'];
				deleteCategory($category_id);
				addAlert('success', 'Category id: '. $category_id .' has been deleted!');
				redirect('category_listing.php');
			}else{
				addAlert('danger', 'Category id is missing!');
			}
		}else{
			addAlert('danger', 'Action not defined');
		}
	}
	
}

$sort = 'category_id';
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
$filter_url = '';
$filter = ' WHERE 1=1 ';
$filter_category_id = '';
if(isset($_GET['filter_category_id']) && !empty($_GET['filter_category_id'])){
	$filter_category_id = $_GET['filter_category_id'];
	$filter .= " AND category_id='". (int)$filter_category_id ."'";
	$filter_url .= '&filter_category_id=' . $filter_category_id;
}
$filter_category_name = '';
if(isset($_GET['filter_category_name']) && !empty($_GET['filter_category_name'])){
	$filter_category_name = $_GET['filter_category_name'];
	$filter .= " AND category_name LIKE '%". $filter_category_name ."%'";
	$filter_url .= '&filter_category_name=' . $filter_category_name;
}
$filter_parent_id = '';
if(isset($_GET['filter_parent_id'])){
	$filter_parent_id = $_GET['filter_parent_id'];
	$filter .= " AND parent_id='". (int)$filter_parent_id ."'";
	$filter_url .= '&filter_parent_id=' . $filter_parent_id;
}

$sql_total = "SELECT COUNT(*) as total FROM categories" . $filter;
$rs_total = mysqli_query($con, $sql_total);
$rec_total = mysqli_fetch_assoc($rs_total);

$page_size = 10;
$total_record = $rec_total['total'];

$start_index = 0;
if(isset($_GET['page']) && !empty($_GET['page'])){
	$page = $_GET['page'];
	$start_index = ($page - 1) * $page_size;
}

$sql = "SELECT * FROM categories ". $filter ." ORDER BY ". $sort ." " . $order . " LIMIT ". $start_index .", " . $page_size;
$rs = mysqli_query($con, $sql);

$data = array();
if(mysqli_num_rows($rs)){
	while($rec = mysqli_fetch_assoc($rs)){
		$data[] = $rec;
	}
}

function deleteCategory($category_id){
	global $con;
	$sql = "DELETE FROM categories WHERE category_id='". $category_id ."'";
	mysqli_query($con, $sql);
}
