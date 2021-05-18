<?php 

// $host = 'localhost';
// $user = 'root';
// $pass = '';
// $db = 'training_jan2021';
// $port = '3306';

// $con = mysqli_connect($host, $user, $pass, $db, $port);

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
if(mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
}

// $sql = "SELECT * FROM `users`";

// $rs = mysqli_query($con, $sql);

// echo '<pre>';
// if(mysqli_num_rows($rs)){
	// while($rec = mysqli_fetch_assoc($rs)){	// array as output with keys and values
		// print_r($rec);
		// echo '<hr>';
	// }
// }

// if(mysqli_num_rows($rs)){
	// while($rec = mysqli_fetch_row($rs)){ // array as output with keys and values with index
		// print_r($rec);
		// echo '<hr>';
	// }
// }

// if(mysqli_num_rows($rs)){
	// while($rec = mysqli_fetch_array($rs)){	// keys & index
		// print_r($rec);
		// echo '<hr>';
	// }
// }

// if(mysqli_num_rows($rs)){
	// while($rec = mysqli_fetch_object($rs)){
		// print_r($rec);
		// // echo $rec['username'];
		// echo $rec->username;
		// echo '<hr>';
	// }
// }


?>
