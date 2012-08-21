<?php include '\functions\xml_helper.php';
include '\functions\admin_helper.php';
validateAdmin();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
<?php
if (isset($_GET) && ($_GET != NULL)){
	
	if($_GET['action']='cretepage'){
		?>
		<form action="pages.php" method="post">
			<table>
				<tr>
					<td>Page Title:<td/><td><input type="text" name="pg_title" /></td>
				</tr>
				<tr>
					<td>Page Contents:<td/><td><textarea name="pg_contents" rows="30" cols="75"></textarea></td>
				</tr>
				<tr>
					<td>Options:<td/><td></td>
				</tr>
				<div>
					<tr>
						<td></td><td><input type="checkbox" name="menu_tab" value="true" /> Add to Menu</td>
					</tr> 
				</div>
				<tr>
					<td><input type="submit" value="Save Page" /></td><td></td>
				</tr>
			</table>
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
