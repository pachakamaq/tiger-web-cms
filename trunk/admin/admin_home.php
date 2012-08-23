<?php include 'C:\wamp\www\tigercms\admin\functions\admin_helper.php';
include 'C:\wamp\www\tigercms\admin\functions\xml_helper.php';
validateAdmin();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
	<?php
	if (isset($_POST) && ($_POST != NULL))
	{
	if($_POST["pass"] != $_POST["cpass"]){
			?>
	<div id="warning">Password not verified</div>
	<form action="admin_home.php" method="post">
		<div>
			<table>
				<tr>
					<td>Admin Settings:</td>
				</tr>
				<tr>
					<td>Website Name:</td>
					<td>Website URL: <br />
					</td>
				</tr>
				<tr>
					<td><input type='text' name='website_name'
						value='<?php echo $config_data['site']?>' />
					</td>
					<td><input type='text' name='website_url'
						value='<?php echo $config_data['url']?>' />
					</td>
				</tr>
				
				<tr>
					<td>User Settings:</td>
				</tr>
				<tr>
					<td>UserName:</td>
					<td>Email Address:
					</td>
				</tr>
				<tr>
					<td><input type='text' disabled="disabled" name='username'
						value='<?php echo $config_data['uname']?>' />
					</td>
					<td><input type='text' name='email_address'
						value='<?php echo $config_data['email']?>' />
					</td>
				</tr>
				
				<tr>
					<td>New Password:</td>
					<td>Confirm Password:</td>
				</tr>
				<tr>
					<td><input type='text' name='pass' />
					</td>
					<td><input type='text' name='cpass'/>
					</td>
				</tr>
				
				<tr>
				<td>
				<input type = "submit" name = "save" value = "Save"/>
				<input type = "submit" name = "reset" value = "Reset"/>
				</td>
				</tr>
				
			</table>
		</div>
	</form>
	<?php 			
		}
		else{
			$locatn = 'C:\wamp\www\tigercms\admin\data\admin_config';
			$_POST['pass'] = md5($_POST['pass']);
			print_r($_POST);
			
			//unset($_POST['cpass']); // remove confirm password entry
			xmlWrite($_POST,$locatn);
			
			?>
			<div>Changes done Successfully!!!<br />
			<a href="admin_home.php">Go to Admin Home page</a>
			</div>	
			<?php 
		}
		
	}
	elseif(isset($_GET) && ($_GET != NULL))
	{
		//do something
	}
	else
	{
		$locatn = 'C:\wamp\www\tigercms\admin\data\admin_config';
		$config_data = readXml($locatn);
		?>
	<form action="admin_home.php" method="post">
		<div>
			<table>
				<tr>
					<td>Admin Settings:</td>
				</tr>
				<tr>
					<td>Website Name:</td>
					<td>Website URL: <br />
					</td>
				</tr>
				<tr>
					<td><input type='text' name='website_name'
						value='<?php echo $config_data['site']?>' />
					</td>
					<td><input type='text' name='website_url'
						value='<?php echo $config_data['url']?>' />
					</td>
				</tr>
				
				<tr>
					<td>User Settings:</td>
				</tr>
				<tr>
					<td>UserName:</td>
					<td>Email Address:
					</td>
				</tr>
				<tr>
					<td><input type='text' disabled="disabled" name='username'
						value='<?php echo $config_data['uname']?>' />
					</td>
					<td><input type='text' name='email_address'
						value='<?php echo $config_data['email']?>' />
					</td>
				</tr>
				
				<tr>
					<td>New Password:</td>
					<td>Confirm Password:</td>
				</tr>
				<tr>
					<td><input type='text' name='pass' />
					</td>
					<td><input type='text' name='cpass'/>
					</td>
				</tr>
				
				<tr>
				<td>
				<input type = "submit" value = "Save"/>
				<input type = "submit" value = "Reset"/>
				</td>
				</tr>
				
			</table>
		</div>
	</form>
	<?php 
	}
	?>
</body>
</html>
