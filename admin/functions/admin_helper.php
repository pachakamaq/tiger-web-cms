<?php

function validateAdmin(){
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