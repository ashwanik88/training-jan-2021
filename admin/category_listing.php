<?php require_once('includes/startup.php'); ?>
<?php require_once('library/category_listing_lib.php'); ?>
<?php require_once('common/header.php'); ?>
<?php require_once('common/sidebar.php'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<form action="" method="post">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Category Listing</h1>
	<div class="btn-toolbar mb-2 mb-md-0">
	  <div class="btn-group me-2">
		<input type="submit" name="btnDelete" value="Delete" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure want to delete this?');" />
		<a href="form_category.php" class="btn btn-sm btn-outline-secondary">Add New Category</a>
	  </div>
	</div>
  </div>
  <?php displayAlert(); ?>
  <div class="table-responsive">
	<table class="table table-striped table-sm">
	  <thead>
		<tr>
		  <th width="10"><input type="checkbox" onclick="$('.chk').attr('checked', $(this).is(':checked'));" /></th>
		  <th><a href="category_listing.php?sort=category_id&order=<?php echo ($order == 'ASC')?'DESC':'ASC';?><?php echo $filter_url; ?>">ID</a></th>
		  <th><a href="category_listing.php?sort=category_name&order=<?php echo ($order == 'ASC')?'DESC':'ASC';?><?php echo $filter_url; ?>">Category Name</a></th>
		  <th><a href="category_listing.php?sort=parent_id&order=<?php echo ($order == 'ASC')?'DESC':'ASC';?><?php echo $filter_url; ?>">Parent</a></th>
		  <th>Action</th>
		</tr>
		<tr>
			<td></td>
			<td><input type="text" id="filter_category_id" value="<?php echo $filter_category_id; ?>" size="1" /></td>
			<td><input type="text" id="filter_category_name" value="<?php echo $filter_category_name; ?>" /></td>
			<td></td>
			<td>
				<input type="button" value="Filter" class="btn btn-warning btnFilter" />
			</td>
		</tr>
	  </thead>
	  <tbody>
		
		<?php echo getCategories(0, ''); ?>
	  
	  </tbody>
	</table>
  </div>
  
<nav>
  <ul class="pagination">
	<?php $n = ceil($total_record / $page_size); ?>
	<?php for($i = 1; $i <= $n; $i++){ ?>
	<li class="page-item">
		<a class="page-link" href="category_listing.php?page=<?php echo $i . $params; ?><?php echo $filter_url; ?>"><?php echo $i; ?></a>
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
	var url = 'category_listing.php?';

	var filter_category_id = $('#filter_category_id').val();
	if(filter_category_id != ''){
		url += '&filter_category_id=' + filter_category_id;
	}

	var filter_category_name = $('#filter_category_name').val();
	if(filter_category_name != ''){
		url += '&filter_category_name=' + filter_category_name;
	}

	var filter_parent_id = $('#filter_parent_id').val();
	if(filter_parent_id != ''){
		url += '&filter_parent_id=' + filter_parent_id;
	}

	window.location.href = url;
});
</script>
<?php require_once('common/footer.php'); ?>