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
		  <th><a href="user_listing.php?sort=user_id&order=<?php echo ($order == 'ASC')?'DESC':'ASC';?>">ID</a></th>
		  <th><a href="user_listing.php?sort=username&order=<?php echo ($order == 'ASC')?'DESC':'ASC';?>">Username</a></th>
		  <th><a href="user_listing.php?sort=fullname&order=<?php echo ($order == 'ASC')?'DESC':'ASC';?>">Fullname</a></th>
		  <th><a href="user_listing.php?sort=status&order=<?php echo ($order == 'ASC')?'DESC':'ASC';?>">Status</a></th>
		  <th>Action</th>
		</tr>
	  </thead>
	  <tbody>
	  <?php foreach($data as $row){ ?>
		<tr>
		  <td><input type="checkbox" class="chk" name="user_ids[]" value="<?php echo $row['user_id']; ?>" /></td>
		  <td><?php echo $row['user_id']; ?></td>
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
		<a class="page-link" href="user_listing.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
	</li>
	<?php 
	} ?>
  </ul>
</nav>
  
 </form>
</main>
<?php require_once('common/footer_upper.php'); ?>
<?php require_once('common/footer_script.php'); ?>
<?php require_once('common/footer.php'); ?>