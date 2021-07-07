<?php checkAdminAccess();
$document_title = 'Manage Products';
/*
$_REQUEST
$request->get[]
*/

if($_POST){
	if(isset($_POST['product_ids']) && !empty($_POST['product_ids'])){
		$product_ids = $_POST['product_ids'];
		if(sizeof($product_ids) > 0){
			foreach($product_ids as $product_id){
				deleteProduct($product_id);
			}
			addAlert('success', 'Product ids: '. implode(', ', $product_ids) .' has been deleted!');
			redirect('product_listing.php');
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
			if(isset($_GET['product_id']) && !empty($_GET['product_id'])){
				$product_id = $_GET['product_id'];
				deleteProduct($product_id);
				addAlert('success', 'Product id: '. $product_id .' has been deleted!');
				redirect('product_listing.php');
			}else{
				addAlert('danger', 'Product id is missing!');
			}
		}else{
			addAlert('danger', 'Action not defined');
		}
	}
	
}

$sort = 'product_id';
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
$filter_product_id = '';
if(isset($_GET['filter_product_id']) && !empty($_GET['filter_product_id'])){
	$filter_product_id = $_GET['filter_product_id'];
	$filter .= " AND product_id='". (int)$filter_product_id ."'";
	$filter_url .= '&filter_product_id=' . $filter_product_id;
}
$filter_product_code = '';
if(isset($_GET['filter_product_code']) && !empty($_GET['filter_product_code'])){
	$filter_product_code = $_GET['filter_product_code'];
	$filter .= " AND product_code='". $filter_product_code ."'";
	$filter_url .= '&filter_product_code=' . $filter_product_code;
}
$filter_product_name = '';
if(isset($_GET['filter_product_name']) && !empty($_GET['filter_product_name'])){
	$filter_product_name = $_GET['filter_product_name'];
	$filter .= " AND product_name LIKE '%". $filter_product_name ."%'";
	$filter_url .= '&filter_product_name=' . $filter_product_name;
}
$filter_status = '';
if(isset($_GET['filter_status'])){
	$filter_status = $_GET['filter_status'];
	$filter .= " AND status='". (int)$filter_status ."'";
	$filter_url .= '&filter_status=' . $filter_status;
}

$sql_total = "SELECT COUNT(*) as total FROM products" . $filter;
$rs_total = mysqli_query($con, $sql_total);
$rec_total = mysqli_fetch_assoc($rs_total);

$page_size = 10;
$total_record = $rec_total['total'];

$start_index = 0;
if(isset($_GET['page']) && !empty($_GET['page'])){
	$page = $_GET['page'];
	$start_index = ($page - 1) * $page_size;
}

$sql = "SELECT * FROM products ". $filter ." ORDER BY ". $sort ." " . $order . " LIMIT ". $start_index .", " . $page_size;
$rs = mysqli_query($con, $sql);

$data = array();
if(mysqli_num_rows($rs)){
	while($rec = mysqli_fetch_assoc($rs)){
		$data[] = $rec;
	}
}

function deleteProduct($product_id){
	global $con;
	$sql = "DELETE FROM products WHERE product_id='". $product_id ."'";
	mysqli_query($con, $sql);
}

/* task 
1) Manage customers 
2) Manage Products
3) Manage Brands
4) Manage Orders
5) Manage Categories
*/