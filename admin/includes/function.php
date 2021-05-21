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