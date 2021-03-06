<?php require_once('includes/startup.php'); ?>
<?php require_once('library/form_user_lib.php'); ?>
<?php require_once('common/header.php'); ?>
<?php require_once('common/sidebar.php'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Form User</h1>
	<div class="btn-toolbar mb-2 mb-md-0">
	  <div class="btn-group me-2">
		<a href="user_listing.php" class="btn btn-sm btn-outline-secondary">Back</a>
	  </div>
	</div>
  </div>

<form method="POST" action="" id="frm" enctype="multipart/form-data">
<label id="username-error" class="error" for="username" style="display: none;">Username is required.</label>

	<?php displayAlert(); ?>

	  <div class="mb-3 row">
		<label for="username" class="col-sm-2 col-form-label">Username</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control required" id="username" name="username" value="<?php echo $username;?>" >
		  
		</div>
	  </div>
	  
	  <div class="mb-3 row">
		<label for="password" class="col-sm-2 col-form-label">Password</label>
		<div class="col-sm-10">
		  <input type="password" class="form-control <?php echo ($user_id == 0)?'required':'';?>" id="password" name="password" value="<?php echo $password;?>">
		</div>
	  </div>
	  
	  <div class="mb-3 row">
		<label for="cpassword" class="col-sm-2 col-form-label">Confirm Password</label>
		<div class="col-sm-10">
		  <input type="password" class="form-control" equalTo="#password" id="cpassword" name="cpassword" value="<?php echo $cpassword;?>">
		</div>
	  </div>
	  
	  <div class="mb-3 row">
		<label for="fullname" class="col-sm-2 col-form-label">Fullname</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control required" id="fullname" name="fullname" value="<?php echo $fullname;?>">
		</div>
	  </div>
	  
	  <div class="mb-3 row">
		<label for="photo" class="col-sm-2 col-form-label">Photo</label>
		<div class="col-sm-10">
		
		<?php if(isset($photo) && !empty($photo)){ ?>
		<img src="<?php echo HTTP_UPLOADS . $photo; ?>" width="100" />
		<?php }else{  echo 'no image';} ?>
		  
		  <input type="file" class="form-control required" id="photo" name="photo" accept="image/gif, image/jpeg, image/png">
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
		<label for="fullname" class="col-sm-2 col-form-label">User Group</label>
		<div class="col-sm-10">
		  <select class="form-control required" id="usergroup" name="usergroup">
			<option value="">Select User Group</option>
			<option value="1">Admin</option>
			<option value="2">Editor</option>
			<option value="3">Sales</option>
			<option value="4">User</option>
		  </select>
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
			  
			  <label id="fullname-error" class="error" for="fullname" style="display: none;"></label>
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