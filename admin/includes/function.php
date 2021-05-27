<?php 

function redirect($url){
	header('Location: ' . $url);
	die;
}

function checkAdminAccess(){
	if(!isset($_SESSION['login']) || empty($_SESSION['login'])){
		redirect('index.php');
	}
}

function addAlert($type, $msg){
	$_SESSION['alert']['type'] = $type;
	$_SESSION['alert']['msg'] = $msg;
}

function displayAlert(){
	$html = '';
	if(isset($_SESSION['alert']) && !empty($_SESSION['alert'])){
		$type = $_SESSION['alert']['type'];
		$msg = $_SESSION['alert']['msg'];
		
		$html .= '<div class="alert alert-'. $type .' alert-dismissible fade show" role="alert">';
		$html .= $msg;
		$html .= '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
		$html .= '</div>';
		
		unset($_SESSION['alert']);
	}
	echo $html;
}