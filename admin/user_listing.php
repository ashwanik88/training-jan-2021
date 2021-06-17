<?php require_once('includes/startup.php'); ?>
<?php require_once('library/user_listing_lib.php'); ?>
<?php require_once('common/header.php'); ?>
<?php require_once('common/sidebar.php'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<form action="" method="post">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">User Listing</h1>
	<div class="btn-toolbar mb-2 mb-md-0">
	  <div class="btn-group me-2">
		<input type="submit" name="btnDelete" value="Delete" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure want to delete this?');" />
		<a href="form_user.php" class="btn btn-sm btn-outline-secondary">Add New User</a>
	  </div>
	</div>
  </div>
  <?php displayAlert(); ?>
  <div class="table-responsive">
	<table class="table table-striped table-sm">
	  <thead>
		<tr>
		  <th width="10"><input type="checkbox" onclick="$('.chk').attr('checked', $(this).is(':checked'));" /></th>
		  <th><a href="user_listing.php?sort=user_id&order=<?php echo ($order == 'ASC')?'DESC':'ASC';?><?php echo $filter_url; ?>">ID</a></th>
		  <th>Photo</th>
		  <th><a href="user_listing.php?sort=username&order=<?php echo ($order == 'ASC')?'DESC':'ASC';?><?php echo $filter_url; ?>">Username</a></th>
		  <th><a href="user_listing.php?sort=fullname&order=<?php echo ($order == 'ASC')?'DESC':'ASC';?><?php echo $filter_url; ?>">Fullname</a></th>
		  <th><a href="user_listing.php?sort=status&order=<?php echo ($order == 'ASC')?'DESC':'ASC';?><?php echo $filter_url; ?>">Status</a></th>
		  <th>Action</th>
		</tr>
		<tr>
			<td></td>
			<td><input type="text" id="filter_user_id" value="<?php echo $filter_user_id; ?>" size="1" /></td>
			<td></td>
			<td><input type="text" id="filter_username" value="<?php echo $filter_username; ?>" /></td>
			<td><input type="text" id="filter_fullname" value="<?php echo $filter_fullname; ?>" /></td>
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
	  <?php foreach($data as $row){ ?>
		<tr>
		  <td><input type="checkbox" class="chk" name="user_ids[]" value="<?php echo $row['user_id']; ?>" /></td>
		  <td><?php echo $row['user_id']; ?></td>
		  <td><?php if(isset($row['photo']) && !empty($row['photo'])){ ?>
		  <img src="<?php echo HTTP_UPLOADS . $row['photo']; ?>" width="100" />
		  <?php }else{  echo 'no image';} ?></td>
		  <td><?php echo $row['username']; ?></td>
		  <td><?php echo $row['fullname']; ?></td>
		  <td><?php echo ($row['status'] == 1)?'Active':'Inactive'; ?></td>
		  <td>
		  
		  <a href="form_user.php?user_id=<?php echo $row['user_id']; ?>" class="btn btn-sm btn-primary">Edit</a>
		  
		  <a href="user_listing.php?action=delete&user_id=<?php echo $row['user_id']; ?>" onclick="return confirm('Are you sure want to delete this?');" class="btn btn-sm btn-danger">Delete</a></td>
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
		<a class="page-link" href="user_listing.php?page=<?php echo $i . $params; ?><?php echo $filter_url; ?>"><?php echo $i; ?></a>
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
	var url = 'user_listing.php?';

	var filter_user_id = $('#filter_user_id').val();
	if(filter_user_id != ''){
		url += '&filter_user_id=' + filter_user_id;
	}

	var filter_username = $('#filter_username').val();
	if(filter_username != ''){
		url += '&filter_username=' + filter_username;
	}

	var filter_fullname = $('#filter_fullname').val();
	if(filter_fullname != ''){
		url += '&filter_fullname=' + filter_fullname;
	}

	var filter_status = $('#filter_status').val();
	if(filter_status != ''){
		url += '&filter_status=' + filter_status;
	}

	window.location.href = url;
});
</script>
<?php require_once('common/footer.php'); ?>