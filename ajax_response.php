<?php require_once('includes/startup.php');
$arr = array('success' => false, 'msg' => $_POST['msg']);

echo json_encode($arr);

?>
