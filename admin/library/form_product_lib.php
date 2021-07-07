<?php checkAdminAccess();
$document_title = 'Add Product';
showActive('sdfsdf');
$product_id = 0;
$error = '';
$product_code = '';
$product_name = '';
$status = '';
$photo = '';

if($_GET){
	if(isset($_GET['product_id']) && !empty($_GET['product_id'])){
		$product_id = $_GET['product_id'];
		
		$sql = "SELECT * FROM products WHERE product_id='". (int)$product_id ."'";
		$rs = mysqli_query($con, $sql);
		
		$rec = mysqli_fetch_assoc($rs);
		
		$product_code = $rec['product_code'];
		$product_name = $rec['product_name'];
		$photo = $rec['photo'];
		$status = $rec['status'];
		
		$category_ids = getCategoryByProductId($product_id);

	}
	
}

if($_POST){

	$product_code = $_POST['product_code'];
	$product_name = $_POST['product_name'];
	$category_ids = $_POST['category_ids'];
	$status = (isset($_POST['status']))?$_POST['status']:0;
	
	if(isset($product_code) && !empty($product_code) && isset($product_name) && !empty($product_name) && isset($status)){	
		

			if(!productExist($product_code, $product_id)){
				
				if(isset($_FILES['photo']) && !empty($_FILES['photo'])){
					$ext = pathinfo($_FILES['photo']['name']);
					$new_filename = time(). '_' . rand(9999, 99999) .'.'. $ext['extension'];
					$dest = DIR_UPLOADS.$new_filename;
					$src = $_FILES['photo']['tmp_name'];
					$resp = move_uploaded_file($src, $dest);	// copy() and for delete file use unlink(filepath);
					
					if($resp){
						$photo_old = $photo;
						$photo = $new_filename;
						if(file_exists(DIR_UPLOADS. $photo_old) && !is_dir(DIR_UPLOADS. $photo_old)){
							unlink(DIR_UPLOADS. $photo_old);
						}
					}else{
						addAlert('danger', 'File not uploaded!');
					}
				}
				
				if($product_id){
					$sql = "UPDATE products SET product_code='". $product_code ."', product_name='". $product_name ."', photo='". $photo ."', status='". $status ."' WHERE product_id='". (int)$product_id ."'";
					$rs = mysqli_query($con, $sql);
					addAlert('success', 'Product account has been updated!');
					
				}else{
					$sql = "INSERT INTO products(product_code, product_name, photo, status) values ('". $product_code ."', '". $product_name ."', '". $photo ."', '". $status ."')";
					addAlert('success', 'New product account has been created!');
					$rs = mysqli_query($con, $sql);
					$product_id = mysqli_insert_id($con);
				}
				
				mysqli_query($con, "DELETE FROM category_products WHERE product_id='". (int)$product_id ."'");
				foreach($category_ids as $category_id){
					$sql = "INSERT INTO category_products SET category_id='". (int)$category_id ."', product_id='". (int)$product_id ."'";
					mysqli_query($con, $sql);
				}
				
				redirect('product_listing.php');
				
			}else{
				addAlert('danger', 'Product Code already exists!');
			}
		
	}else{
		addAlert('warning', 'Incomplete form data!');
	}
}

function productExist($product_code, $product_id){
	global $con;
	$sql = "SELECT * FROM products WHERE product_code='". $product_code ."' AND product_id!='". (int)$product_id ."'";
	$rs = mysqli_query($con, $sql);
	if(mysqli_num_rows($rs)){
		return true;
	}
	return false;
}

function getCategoryByProductId($product_id){
	global $con;
	$sql = "SELECT * FROM category_products WHERE product_id='". (int)$product_id ."'";
	$rs = mysqli_query($con, $sql);
	$data = array();
	if(mysqli_num_rows($rs)){
		while($rec = mysqli_fetch_assoc($rs)){
			$data[] = $rec['category_id'];
		}
	}
	return $data;
}


function getCategories($parent_id = 0, $sep = '', $category_ids){
	global $con;
	$sql = "SELECT * FROM categories WHERE parent_id='". (int)$parent_id ."' ORDER BY category_name ASC";
	$rs = mysqli_query($con, $sql);
	$html = '';
	if(mysqli_num_rows($rs)){
		while($row = mysqli_fetch_assoc($rs)){
			$html .= '<tr>';
			$html .= '<td><input type="checkbox" id="chk_'. $row['category_id'] .'" class="chk" name="category_ids[]" value="'. $row['category_id'] .'" ';
			$html .= (in_array($row['category_id'], $category_ids) !== false)?'checked':'';
			$html .= ' /></td>';
			$html .= '<td><label for="chk_'. $row['category_id'] .'">'. getParent($parent_id, $sep = ' >> ').$row['category_name'] . '</label></td>';
			$html .= '</tr>';
			$html .= getCategories($row['category_id'], $sep.'__', $category_ids);
		}
	}
	return $html;
}

function getParent($category_id, $sep = ''){
	global $con;
	$sql = "SELECT * FROM categories WHERE category_id='". (int)$category_id ."'";
	$rs = mysqli_query($con, $sql);
	$html = '';
	if(mysqli_num_rows($rs)){
		while($rec = mysqli_fetch_assoc($rs)){
			$html .= getParent($rec['parent_id'], $sep);
			$html .= $rec['category_name'] . $sep;
		}
	}
	return $html;
}