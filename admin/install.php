
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="Zorro CMS login setup" />
<title>Site Setup</title>

<link rel="stylesheet" type="text/css" href="css/common.css" />
<link rel="stylesheet" type="text/css" href="css/admin_login.css" />

<script type="text/javascript" src="jscripts/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="jscripts/error-success.js"></script>
<script type="text/javascript" src="jscripts/validate.js"></script>

</head>
<body>
	<div id="container">
		<div id="header">
			<div id="h_name">
				<!-- Enter Site Header Here -->
				Site Setup
			</div>
			<div id="message"
				style="padding: 15px 10px 15px 10px; display: none;"></div>
		</div>

		<div id="setup_box">
			<div id="setup-inner">
				<?php
				if (isset($_POST) && ($_POST != NULL)){
					if(($_POST["pass"] != $_POST["cpass"])){
						?>

				<script type="text/javascript">
		error ="Error: Password and Confirm Password fields do not match.";
		showErrorSuccess();
		
	</script>

				<form action="install.php" method="post">
					<table cellspacing="0" cellpadding="2" border="0">
						<tbody>
							<tr>
								<th>Site Name:</th>
								<td><input class="setup-inp" type="text" name="site_name"
									onblur="validate_site_name()" /></td>
							</tr>
							<tr>
								<th>Site URL:</th>
								<td><input class="setup-inp" type="text" name="url" onblur="validate_url()"/></td>
									<td><img src="images/question.png" width="30" title= "e.g. http://tigercms.com/"/></td>
							</tr>
							<tr>
								<th>Base Folder:</th>
								<td><input class="setup-inp" type="text" name="folder" onblur="validate_folder()" /></td>
								<td><img src="images/question.png" width="30" title= "e.g. /var/www/tigercms/"/></td>
								</tr>
							<tr>
								<th>E-mail:</th>
								<td><input class="setup-inp" type="text" name="email"
									onblur="validate_email()" /></td>
							</tr>
							<tr>
								<th>Username:</th>
								<td><input class="setup-inp" type="text" name="uname" 
								onblur = "validate_uname()"/></td>
							</tr>
							<tr>
								<th>Password:</th>
								<td><input class="setup-inp" type="password" name="pass"
								onblur = "validate_pass()" /></td>
							</tr>
							<tr>
								<th>Confirm Password:</th>
								<td><input class="setup-inp" type="password" name="cpass" /></td>
							</tr>
							<tr>
								<th></th>
								<td><button type="button" class="submit-setup" onclick = "validateAll()">Submit</button>
								</td>
							</tr>
						</tbody>
					</table>
				</form>
				<?php 			
					}
					else{

						$locatn = $_POST['folder'].'admin/data/admin_config';
						//$locatn = 'C:\wamp\www\tigercms\admin\data\admin_config';
						$_POST['pass'] = md5($_POST['pass']);
						unset($_POST['cpass']); // remove confirm password entry
						include $_POST['folder'].'admin/functions/xml_helper.php';
						xmlWrite($_POST,$locatn);
						$locatn = $_POST['folder'].'site_config';
						//$locatn = 'C:\wamp\www\tigercms\site_config';
						$site_data['site_name'] = $_POST['site_name'];
						$site_data['url'] = $_POST['url'];
						$site_data['folder'] = $_POST['folder'];
						xmlWrite($site_data,$locatn);
						?>
				<script type="text/javascript">
				success ="Site Successfully Created !";
				showErrorSuccess();
			</script>
				<div id="redirectlogin">
					<a style="color: black;" href="login.php">Go to Login page</a>
				</div>


				<?php 
					}

				}
				else{
					?>

				<form action="install.php" method="post">
					<table cellspacing="0" cellpadding="2" border="0">
						<tr>
							<th>Site Name:</th>
							<td><input class="setup-inp" type="text" name="site_name"
								onblur="validate_site_name()" /></td>
						</tr>
						<tr>
							<th>Site URL:</th>
							<td><input class="setup-inp" type="text" name="url" onblur="validate_url()"/></td>
									<td><img src="images/question.png" width="30" title= "e.g. http://tigercms.com/"/></td>
						</tr>
						<tr>
							<th>Base Folder:</th>
							<td><input class="setup-inp" type="text" name="folder" onblur="validate_folder()" /></td><td>
							<img src="images/question.png" width="30" title= "e.g. /var/www/tigercms/"/></td>
						</tr>
						<tr>
							<th>E-mail:</th>
							<td><input class="setup-inp" type="text" name="email"
								onblur="validate_email()" /></td>
						</tr>
						<tr>
							<th>Username:</th>
							<td><input class="setup-inp" type="text" name="uname"
							onblur = "validate_uname()" /></td>
						</tr>
						<tr>
							<th>Password:</th>
							<td><input class="setup-inp" type="password" name="pass"
							 onblur = "validate_pass()"  /></td>
						</tr>
						<tr>
							<th>Confirm Password:</th>
							<td><input class="setup-inp" type="password" name="cpass" /></td>
						</tr>
						<tr>
							<th></th>
							<td><button type="button" class="submit-setup" onclick = "validateAll()">Submit</button></td>
						</tr>
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
