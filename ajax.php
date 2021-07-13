<?php require_once('includes/startup.php'); ?>
<?php require_once('library/ajax_lib.php'); ?>
<?php require_once('common/header.php'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<main>

<div class="container marketing mt-4">

<div class="row row-cols-1 row-cols-sm-4 g-4">
<div class="content"></div>
		<textarea id="txtMsg" class="form-control" placeholder="Enter Message"></textarea>
		<input type="button" value="Send" class="btn btn-success btnSend" />
</div>  

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->

<script type="text/javascript">
$(document).ready(function(){

$('.btnSend').click(function(){
	$.ajax({
	url: 'ajax_response.php',
	type: 'post',	// get | post
	dataType: 'JSON', // HTML | JSON | XML
	data: {
		msg: $('#txtMsg').val()
	},
	success: function(json){
		console.log(json);
		$('.content').append('<p>' + json.msg + '</p>');
	}
});
});

});
</script>
<?php require_once('common/footer.php');?>