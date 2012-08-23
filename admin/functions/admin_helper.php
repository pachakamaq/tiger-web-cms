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

function generateRandomString() {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomString = '';
	for ($i = 0; $i < 10; $i++) {
		$randomString .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $randomString;
}

?>