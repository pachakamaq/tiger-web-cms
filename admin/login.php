<?php include 'admin_variables.php'?>
<?php include $global_admin['folder'].'functions\xml_helper.php' ?>
<?php include $global_admin['folder'].'functions\admin_helper.php' ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="css/common.css" />
<link rel="stylesheet" type="text/css" href="css/admin_login.css" />

<script type="text/javascript" src="jscripts/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="jscripts/error-success.js"></script>

</head>
<body>
<div id="container">
	<div id="header" > 
   	  <div id="message" class="error_message" style="padding: 15px 10px 15px 10px;z-index:2; position:relative; top:198px; left:50px; width:70%; display:none;"> dgdgdg </div>
        <img src="images/lock.png" alt="Login Lock Logo" width="120" style="position:relative;top: 85px;left: -68px; z-index:1;" />	
        
   	  <div id="h_name" style="position:relative;top: 15px;padding-left: 90px;">
				<!-- Enter Site Header Here -->
				Admin Login
		</div>
        
  </div>
</div>

<div id="setup_box_login">
<div id="setup-inner" style="/* [disabled]padding:0 0 17px; */">

<?php
if (isset($_POST) && ($_POST != NULL))
{ 
	
	
	$locatn = $global_admin['folder'].'data\admin_config';
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
        <script type="text/javascript">
		error ="Error: Invalid login details.";
		showErrorSuccess();
		</script>
		
		<form action = "login.php" method = "post">
		<table cellspacing="0" cellpadding="0" border="0">
		<tr><th>Username:</th><td><input class="setup-inp" type="text" name="uname" /></td></tr>
		<tr><th>Password:</th><td><input class="setup-inp" type="password" name="pass" /></td></tr>
		<tr><th></th><td><input type="submit" class="submit-setup" value="Login" /></td></tr>
		</table>
		<div id="forgotpass"><a href="login.php?retrieve=true">Retrieve User Details and Reset Password?</a></div>
		</form>
		<?php
	}
}
elseif (isset($_GET) && ($_GET != NULL))
{
	$locatn = $global_admin['folder'].'data\admin_config';
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
		<script type="text/javascript">
			success ="Details sent successfully to registered email!.";
			showErrorSuccess();
		</script>
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
