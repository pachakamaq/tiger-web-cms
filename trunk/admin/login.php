<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
<?php
if (isset($_POST) && ($_POST != NULL))
{ 
	if(($_POST['username'] == "admin") && ($_POST['password'] == "admin"))
	{
		echo "successful login";
	}
	else 
	{
		echo "Incorrect Username/Password";
	}
}
	else
	{
	?>
		<form action = "login.php" method = "post">
		Username: <input type = 'text' name = 'username'/>
		<br />
		Password: <input type = 'password' name = 'password'/>
		<br />
		Submit: <input type = 'submit' value = 'login'/>
		</form>
		<?php 
	}
	?>
</body>
</html>
