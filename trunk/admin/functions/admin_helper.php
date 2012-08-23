<?php

function validateAdmin(){
	session_start();
	if (isset($_SESSION) && ($_SESSION != NULL)){
		if($_SESSION['admin'] == 'true'){
			return true;
		}
	}
	else{
		header("Location: login.php");
	}
	
}

function getPageList($dir){
	$page_list = scandir($dir, 1);
	print_r($page_list);
	//check play.php
}

?>