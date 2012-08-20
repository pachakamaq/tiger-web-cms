<?php include 'C:\wamp\www\tigercms\functions\xml_helper.php' ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>

	<?php
	if (isset($_POST) && ($_POST != NULL)){
		if($_POST["pass"] != $_POST["cpass"]){
			?>
	<div id="warning">Password not verified</div>
	<form action="install.php" method="post">
		Site Name: <input type="text" name="site" /><br />
		Site URL: <input type="text" name="url" /><br />
		Base Folder: <input type="text" name="folder" /><br />
		E-mail: <input type="text" name="email" /><br />
		Username: <input type="text" name="uname" /><br />
		Password: <input type="password" name="pass" /><br />
		Confirm Password: <input type="password" name="cpass" /><br />
		<input type="submit" value="Submit" />
	</form>
	<?php 			
		}
		else{
			$locatn = 'C:\wamp\www\tigercms\admin\data\admin_config';
			$_POST['pass']= $_POST['pass'];
			unset($_POST['cpass']); // remove confirm password entry
			xmlWrite($_POST,$locatn);
			?>
			<div>Account Successfully created!!!<br />
			<a href="login.php">Go to Login page</a>
			</div>
			
			
			<?php 
		}
		
	}
	else{
		?>
	<form action="install.php" method="post">
		Site Name: <input type="text" name="site" /><br />
		Site URL: <input type="text" name="url" /><br />
		Base Folder: <input type="text" name="folder" /><br />
		E-mail: <input type="text" name="email" /><br />
		Username: <input type="text" name="uname" /><br />
		Password: <input type="password" name="pass" /><br />
		Confirm Password: <input type="password" name="cpass" /><br />
		<input type="submit" value="Submit" />
	</form>
	<?php 
	}
	?>
</body>

</html>
