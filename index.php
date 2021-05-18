<?php 
// phpinfo();
/*
echo '<pre>';	// string value
print_r($_POST);	// for display array values
die; // exit
*/
$a = '';
$b = '';
$c = '';

if($_POST){
	$a = $_POST['first'];
	$b = $_POST['second'];
	$c = $a + $b;
}
?>
<!doctype html>
<html>
<head>
<title>Add Two Numbers</title>
</head>
<body>
<form action="calc.php" method="POST">
<table border="1" cellpadding="10" cellspacing="0">
	<tr><td>First Number</td><td><input type="text" id="txtA" name="first" value="<?php echo $a; ?>" /></td></tr>
	<tr><td>Second Number</td><td><input type="text" id="txtB"  name="second" value="<?php echo $b; ?>" /></td></tr>
	<tr><td>Result</td><td><input type="text" id="txtR" value="<?php echo $c; ?>" /></td></tr>
	<tr><td></td><td><input type="submit" value="Add Numbers" /></td></tr>
</table>

<pre>
T

E





S

T
</pre>
</form>
</body>
</html>