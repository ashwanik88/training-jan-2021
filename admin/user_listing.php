<?php require_once('includes/startup.php'); ?>
<?php require_once('library/user_listing_lib.php'); ?>
<?php require_once('common/header.php'); ?>
<?php require_once('common/sidebar.php'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">User Listing</h1>
	<div class="btn-toolbar mb-2 mb-md-0">
	  <div class="btn-group me-2">
		<button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
		<button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
	  </div>
	  <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
		<span data-feather="calendar"></span>
		This week
	  </button>
	</div>
  </div>
  <div class="table-responsive">
	<table class="table table-striped table-sm">
	  <thead>
		<tr>
		  <th>ID</th>
		  <th>Username</th>
		  <th>Fullname</th>
		  <th>Status</th>
		  <th>Action</th>
		</tr>
	  </thead>
	  <tbody>
	  <?php foreach($data as $row){ ?>
		<tr>
		  <td><?php echo $row['user_id']; ?></td>
		  <td><?php echo $row['username']; ?></td>
		  <td><?php echo $row['fullname']; ?></td>
		  <td><?php echo $row['status']; ?></td>
		  <td>Edit | Delete</td>
		</tr>
	  <?php } ?>
	  </tbody>
	</table>
  </div>
</main>
<?php require_once('common/footer.php'); ?>