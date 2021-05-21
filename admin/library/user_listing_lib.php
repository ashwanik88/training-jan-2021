<?php checkAdminAccess();

$sql = "SELECT * FROM users";
$rs = mysqli_query($con, $sql);

$data = array();
if(mysqli_num_rows($rs)){
	while($rec = mysqli_fetch_assoc($rs)){
		$data[] = $rec;
	}
}