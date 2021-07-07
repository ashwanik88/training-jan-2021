<?php require_once('includes/startup.php'); ?>
<?php require_once('library/product_listing_lib.php'); ?>
<?php require_once('common/header.php'); ?>
<?php require_once('common/sidebar.php'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<form action="" method="post">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Product Listing</h1>
	<div class="btn-toolbar mb-2 mb-md-0">
	  <div class="btn-group me-2">
		<input type="submit" name="btnDelete" value="Delete" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure want to delete this?');" />
		<a href="form_product.php" class="btn btn-sm btn-outline-secondary">Add New Product</a>
	  </div>
	</div>
  </div>
  <?php displayAlert(); ?>
  <div class="table-responsive">
	<table class="table table-striped table-sm">
	  <thead>
		<tr>
		  <th width="10"><input type="checkbox" onclick="$('.chk').attr('checked', $(this).is(':checked'));" /></th>
		  <th><a href="product_listing.php?sort=product_id&order=<?php echo ($order == 'ASC')?'DESC':'ASC';?><?php echo $filter_url; ?>">ID</a></th>
		  <th>Photo</th>
		  <th><a href="product_listing.php?sort=product_code&order=<?php echo ($order == 'ASC')?'DESC':'ASC';?><?php echo $filter_url; ?>">Product Code</a></th>
		  <th><a href="product_listing.php?sort=product_name&order=<?php echo ($order == 'ASC')?'DESC':'ASC';?><?php echo $filter_url; ?>">Product Name</a></th>
		  <th><a href="product_listing.php?sort=status&order=<?php echo ($order == 'ASC')?'DESC':'ASC';?><?php echo $filter_url; ?>">Status</a></th>
		  <th>Action</th>
		</tr>
		<tr>
			<td></td>
			<td><input type="text" id="filter_product_id" value="<?php echo $filter_product_id; ?>" size="1" /></td>
			<td></td>
			<td><input type="text" id="filter_product_code" value="<?php echo $filter_product_code; ?>" /></td>
			<td><input type="text" id="filter_product_name" value="<?php echo $filter_product_name; ?>" /></td>
			<td><select id="filter_status">
				<option value="">All</option>
				<option value="1" <?php echo ($filter_status == 1)?'selected':''; ?>>Active</option>
				<option value="0" <?php echo ($filter_status == 0)?'selected':''; ?>>Inactive</option>
			</select></td>
			<td>
				<input type="button" value="Filter" class="btn btn-warning btnFilter" />
			</td>
		</tr>
	  </thead>
	  <tbody>
	  <?php if(sizeof($data)){ foreach($data as $row){ ?>
		<tr>
		  <td><input type="checkbox" class="chk" name="product_ids[]" value="<?php echo $row['product_id']; ?>" /></td>
		  <td><?php echo $row['product_id']; ?></td>
		  <td><?php if(isset($row['photo']) && !empty($row['photo'])){ ?>
		  <img src="<?php echo HTTP_UPLOADS . $row['photo']; ?>" width="100" />
		  <?php }else{  echo 'no image';} ?></td>
		  <td><?php echo $row['product_code']; ?></td>
		  <td><?php echo $row['product_name']; ?></td>
		  <td><?php echo ($row['status'] == 1)?'Active':'Inactive'; ?></td>
		  <td>
		  
		  <a href="form_product.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-sm btn-primary">Edit</a>
		  
		  <a href="product_listing.php?action=delete&product_id=<?php echo $row['product_id']; ?>" onclick="return confirm('Are you sure want to delete this?');" class="btn btn-sm btn-danger">Delete</a></td>
		</tr>
	  <?php } ?>
	  <?php }else{ ?>
		<tr>
			<td colspan="8" class="text-center text-danger">No record found!</td>
		</tr>
	  <?php } ?>
	  </tbody>
	</table>
  </div>
  
<nav>
  <ul class="pagination">
	<?php $n = ceil($total_record / $page_size); ?>
	<?php for($i = 1; $i <= $n; $i++){ ?>
	<li class="page-item">
		<a class="page-link" href="product_listing.php?page=<?php echo $i . $params; ?><?php echo $filter_url; ?>"><?php echo $i; ?></a>
	</li>
	<?php 
	} ?>
  </ul>
</nav>
  
 </form>
</main>
<?php require_once('common/footer_upper.php'); ?>
<?php require_once('common/footer_script.php'); ?>
<script type="text/javascript">
$('.btnFilter').click(function(){
	var url = 'product_listing.php?';

	var filter_product_id = $('#filter_product_id').val();
	if(filter_product_id != ''){
		url += '&filter_product_id=' + filter_product_id;
	}

	var filter_product_code = $('#filter_product_code').val();
	if(filter_product_code != ''){
		url += '&filter_product_code=' + filter_product_code;
	}

	var filter_product_name = $('#filter_product_name').val();
	if(filter_product_name != ''){
		url += '&filter_product_name=' + filter_product_name;
	}

	var filter_status = $('#filter_status').val();
	if(filter_status != ''){
		url += '&filter_status=' + filter_status;
	}

	window.location.href = url;
});
</script>
<?php require_once('common/footer.php'); ?>