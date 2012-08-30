<?php 
if (!(file_exists("data/admin_config.xml"))) {
    header('Location: install.php');
}
else{
	header('Location: login.php');
}

?>