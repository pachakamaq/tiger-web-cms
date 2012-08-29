<?php include 'C:\wamp\www\tigercms\admin\functions\xml_helper.php' ?>
<?php include 'C:\wamp\www\tigercms\admin\functions\admin_helper.php' ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>User Page</title>
<link rel="stylesheet" type="text/css" href="css/common.css" />
<link rel="stylesheet" type="text/css" href="css/admin_login.css" />
</head>
<body>
<div id="container">
<div id="setup_box_login">
<div id="setup-inner">

<?php
if (isset($_POST) && ($_POST != NULL))
{ 
	$locatn = 'C:\wamp\www\tigercms\admin\data\admin_config';
	$config_data = readXml($locatn);	
	if((($config_data['uname']) == ($_POST['uname'])) && (($config_data['pass']) == md5($_POST['pass'])))
	{
		session_start();
		$_SESSION['admin']="true";
		header("Location: admin_panel.php");
		?>
		<div>Successful Login!!!</div>
		<?php
	}	
	else
	{
		?>
		<div id="warning">Invalid Login Details</div>
		<form action = "login.php" method = "post">
		<table cellspacing="0" cellpadding="0" border="0">
		<tr><th>Username:</th><td><input class="setup-inp" type="text" name="uname" /></td></tr>
		<tr><th>Password:</th><td><input class="setup-inp" type="password" name="pass" /></td></tr>
		<tr><th></th><td><input type="submit" class="submit-setup" value="Login" /></td></tr>
		</table>
		<div id="forgotpass"><a id= href="login.php?retrieve=true">Retrieve User Details and Reset Password?</a></div>
		</form>
		<?php
	}
}
elseif (isset($_GET) && ($_GET != NULL))
{
	$locatn = 'C:\wamp\www\tigercms\admin\data\admin_config';
	$config_data = readXml($locatn);
	$new_pass = generateRandomString();
	$config_data['pass']=md5($new_pass);
	xmlWrite($config_data,$locatn);
	$to = $config_data['email'];
	$subject = "Website Login Details";
	$txt = "Login Details for your website: ".$config_data['url'].". Username: ".$config_data['uname'].". Password: ".$new_pass;
	$headers = "From: ".$config_data['url'];
	mail($to,$subject,$txt,$headers);
	?>
		<div>Password Send Succesfully to the registered email.</div>
		<a href="login.php">Back To Login Page</a>
		<?php 
}
else{
	?>
		<form action = "login.php" method = "post">
		<table cellspacing="0" cellpadding="0" border="0">
		<tr><th>Username:</th><td><input class="setup-inp" type="text" name="uname" /></td></tr>
		<tr><th>Password:</th><td><input class="setup-inp" type="password" name="pass" /></td></tr>
		<tr><th></th><td><input type="submit" class="submit-setup" value="Login" /></td></tr>
		
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
