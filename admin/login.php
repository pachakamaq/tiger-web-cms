<?php include 'C:\wamp\www\tigercms\admin\functions\xml_helper.php' ?>
<?php include 'C:\wamp\www\tigercms\admin\functions\admin_helper.php' ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
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
		Username: <input type = 'text' name = 'uname'/>
		<br />
		Password: <input type = 'password' name = 'pass'/>
		<br />
		Submit: <input type = 'submit' value = 'login'/>
		<a href="login.php?retrieve=true">Retrieve User Details and Reset Password</a>
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
		Username: <input type = 'text' name = 'uname'/>
		<br />
		Password: <input type = 'password' name = 'pass'/>
		<br />
		Submit: <input type = 'submit' value = 'login'/>
		</form>
		<?php 
}
	?>
</body>
</html>
