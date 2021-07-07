<?php require_once('includes/startup.php'); ?>
<?php require_once('library/form_product_lib.php'); ?>
<?php require_once('common/header.php'); ?>
<?php require_once('common/sidebar.php'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Form Product</h1>
	<div class="btn-toolbar mb-2 mb-md-0">
	  <div class="btn-group me-2">
		<a href="product_listing.php" class="btn btn-sm btn-outline-secondary">Back</a>
	  </div>
	</div>
  </div>

<form method="POST" action="" id="frm" enctype="multipart/form-data">
<label id="product_code-error" class="error" for="product_code" style="display: none;">Product Code is required.</label>

	<?php displayAlert(); ?>

	  <div class="mb-3 row">
		<label for="product_code" class="col-sm-2 col-form-label">Product Code</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control required" id="product_code" name="product_code" value="<?php echo $product_code;?>" >
		  
		</div>
	  </div>
	  
	  <div class="mb-3 row">
		<label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control required" id="product_name" name="product_name" value="<?php echo $product_name;?>">
		</div>
	  </div>
	  
	  <div class="mb-3 row">
		<label for="photo" class="col-sm-2 col-form-label">Photo</label>
		<div class="col-sm-10">
		
		<?php if(isset($photo) && !empty($photo)){ ?>
		<img src="<?php echo HTTP_UPLOADS . $photo; ?>" width="100" />
		<?php }else{  echo 'no image';} ?>
		  
		  <input type="file" class="form-control" id="photo" name="photo" accept="image/gif, image/jpeg, image/png">
		</div>
	  </div>
	  
	  
	  <div class="mb-3 row">
		<label for="product_name" class="col-sm-2 col-form-label">Assign Category</label>
		<div class="col-sm-10" style="overflow-x: auto;height: 300px;">
		  
<table class="table table-striped table-sm">
	  <thead>
		<tr>
		  <th width="10"><input type="checkbox" onclick="$('.chk').attr('checked', $(this).is(':checked'));" /></th>
		  <th><a href="category_listing.php?sort=category_name&order=<?php echo ($order == 'ASC')?'DESC':'ASC';?><?php echo $filter_url; ?>">Category Name</a></th>
		  
		</tr>
	  </thead>
	  <tbody>
		
		<?php echo getCategories(0, '', $category_ids); ?>
	  
	  </tbody>
	</table>
		  
		  
		</div>
	  </div>
	  
	  <div class="mb-3 row">
		<label for="status" class="col-sm-2 col-form-label">Status</label>
		<div class="col-sm-10">
		  <div class="form-check form-switch">
			  <input class="form-check-input" type="checkbox" id="status" name="status" <?php echo ($status)?'checked':''; ?> value="1">
			  <label class="form-check-label" for="status"></label>
			</div>
		</div>
	  </div>
	  
	  <div class="mb-3 row">
		<div class="col-sm-10 offset-sm-2">
			<button type="submit" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-check" viewBox="0 0 16 16">
  <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"></path>
  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"></path>
</svg>
                Save
              </button>
			  
			  <label id="product_name-error" class="error" for="product_name" style="display: none;"></label>
		</div>
	  </div>
	  
	  
</form>

</main>
<?php require_once('common/footer_upper.php'); ?>
<?php require_once('common/footer_script.php'); ?>
<script type="text/javascript" src="js/validate/jquery.validate.min.js"></script>
<script type="text/javascript">
$('#frm').validate({
	
});
</script>
<?php require_once('common/footer.php'); ?>