<?php checkAdminAccess();
// var_dump(unlink(DIR_UPLOADS . '1623913788_45812.jpeg'));
// die;

$category_id = 0;
$error = '';
$category_name = '';
$parent_id = '';
if($_GET){
	if(isset($_GET['category_id']) && !empty($_GET['category_id'])){
		$category_id = $_GET['category_id'];
		
		$sql = "SELECT * FROM categories WHERE category_id='". (int)$category_id ."'";
		$rs = mysqli_query($con, $sql);
		
		$rec = mysqli_fetch_assoc($rs);
		
		$category_name = $rec['category_name'];
		$parent_id = $rec['parent_id'];
		
	}
	
}

if($_POST){
	$category_name = $_POST['category_name'];
	$parent_id = (isset($_POST['parent_id']))?$_POST['parent_id']:0;
	
	if(isset($category_name) && !empty($category_name) && isset($parent_id)){	
		
				
				
				if($category_id){
					$sql = "UPDATE categories SET category_name='". $category_name ."', parent_id='". $parent_id ."' WHERE category_id='". (int)$category_id ."'";
					addAlert('success', 'Category account has been updated!');
					
				}else{
					$sql = "INSERT INTO categories(category_name, parent_id) values ('". $category_name ."', '". $parent_id ."')";
					addAlert('success', 'New category account has been created!');
				}
				
				
				
				$rs = mysqli_query($con, $sql);
				
				
				redirect('category_listing.php');
				
	}else{
		addAlert('warning', 'Incomplete form data!');
	}
}


function getCategories($parent_id = 0, $sep = ''){
	global $con;
	$sql = "SELECT * FROM categories WHERE parent_id='". (int)$parent_id ."'";
	$rs = mysqli_query($con, $sql);
	$html = '';
	if(mysqli_num_rows($rs)){
		while($rec = mysqli_fetch_assoc($rs)){
			$html .= '<option value="'. $rec['category_id'] .'">'. $sep . $rec['category_name'] .'</option>';
			$html .= getCategories($rec['category_id'], $sep.'__');
		}
	}
	return $html;
}