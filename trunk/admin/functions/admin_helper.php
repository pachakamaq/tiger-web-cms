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

?>