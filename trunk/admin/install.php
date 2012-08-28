<?php include 'C:\wamp\www\tigercms\admin\functions\xml_helper.php' ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="Zorro CMS login setup" />
<title>Site Setup</title>
<link rel="stylesheet" type="text/css" href="css/common.css" />
<link rel="stylesheet" type="text/css" href="css/admin_login.css" />
</head>
<body>
<div id="container">
<div id="setup_box">
<div id="setup-inner">
	<?php
	if (isset($_POST) && ($_POST != NULL)){
		if($_POST["pass"] != $_POST["cpass"]){
			?>
	<div id="warning">Password not verified</div>
	<form action="install.php" method="post">
		<table cellspacing="0" cellpadding="0" border="0">
			<tbody>
			<tr><th>Site Name:</th><td><input class="setup-inp" type="text" name="site_name" /></td></tr>
			<tr><th>Site URL:</th><td><input class="setup-inp" type="text" name="url" /></td></tr>
			<tr><th>Base Folder:</th><td><input class="setup-inp" type="text" name="folder" /></td></tr>
			<tr><th>E-mail:</th><td><input class="setup-inp" type="text" name="email" /></td></tr>
			<tr><th>Username:</th><td><input class="setup-inp" type="text" name="uname" /></td></tr>
			<tr><th>Password:</th><td><input class="setup-inp" type="password" name="pass" /></td></tr>
			<tr><th>Confirm Password:</th><td><input class="setup-inp" type="password" name="cpass" /></td></tr>
			<tr><th></th><td><input type="submit" class="submit-setup" value="Submit" /></td></tr>
			</tbody>
		</table>
	</form>
	<?php 			
		}
		else{
			$locatn = 'C:\wamp\www\tigercms\admin\data\admin_config';
			$_POST['pass'] = md5($_POST['pass']);
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
		<table cellspacing="0" cellpadding="0" border="0">
		<tr><th>Site Name:</th><td><input class="setup-inp" type="text" name="site_name" /></td></tr>
		<tr><th>Site URL:</th><td><input class="setup-inp" type="text" name="url" /></td></tr>
		<tr><th>Base Folder:</th><td><input class="setup-inp" type="text" name="folder" /></td></tr>
		<tr><th>E-mail:</th><td><input class="setup-inp" type="text" name="email" /></td></tr>
		<tr><th>Username:</th><td><input class="setup-inp" type="text" name="uname" /></td></tr>
		<tr><th>Password:</th><td><input class="setup-inp" type="password" name="pass" /></td></tr>
		<tr><th>Confirm Password:</th><td><input class="setup-inp" type="password" name="cpass" /></td></tr>
		<tr><th></th><td><input type="submit" class="submit-setup" value="Submit" /></td></tr>
		</table>
	</form>
	<?php 
	}
	?>
	</div>
	</div>
	</div>
</body>

</html>
