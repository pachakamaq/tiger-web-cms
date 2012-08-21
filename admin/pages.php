<?php include 'C:\wamp\www\tigercms\functions\helper.php' ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
<?php
if (isset($_GET) && ($_GET != NULL)){
	
	if($_GET['action']='cretePage'){
		?>
		<form action="pages.php" method="post">
			Page Title: <input type="text" name="pg_title" /><br />
			Page Contents: <textarea name="pg_contents" rows="30" cols="75"></textarea><br />
			Options:
			<div>
				<input type="checkbox" name="menu_tab" value="true" /> Add to Menu 
			</div>
			<input type="submit" value="Save Page" />
		</form>		
		
		
		<?php
	}
	
	
}

elseif (isset($_POST) && ($_POST != NULL)){
	
}
else{
	/*
	 * function list pages
	 */
}

?>
</body>
</html>
