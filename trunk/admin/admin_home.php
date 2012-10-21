<?php 
include 'admin_variables.php';
include $global_admin['folder'].'functions/xml_helper.php';
include $global_admin['folder'].'functions/admin_helper.php';
validateAdmin();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" type="text/css" href="css/common.css" />
    <link rel="stylesheet" type="text/css" href="css/admin_home.css" />
    
    <script type="text/javascript" src="jscripts/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="jscripts/error-success.js"></script>
	<script type="text/javascript" src="jscripts/validate.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			parent.resizeParentIframe($(document).height());
		   $('.button-all').click(function() {
				if($(this).attr('id') == 'reset'){
					$('#message').hide();
					location.reload();
					}
				else if($(this).attr('id') == 'submit'){
					validateAdminDetails();
					}
			   });
		 });
	</script>
</head>

<body>
<div id="content-outer">
	<div id="content">
    	<div id="page-heading"><h1>My Account</h1></div>
        <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
            <tr>
                <th rowspan="3" class="sized"><img src="images/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
                <th class="topleft"></th>
                <td id="tbl-border-top">&nbsp;</td>
                <th class="topright"></th>
                <th rowspan="3" class="sized"><img src="images/side_shadowright.jpg" width="20" height="300" alt="" /></th>
            </tr>
			<tr>
				<td id="tbl-border-left"></td>
				<td>
				<div id="message" style="padding: 15px 10px 15px 10px;display:none;"></div>
				<div id="content-table-inner">
	
                    <table border="0" width="100%" cellpadding="0" cellspacing="0">
                    <tr valign="top">
                    <td>

<?php
if (isset($_POST) && ($_POST != NULL))
{
	if((isset($_POST["pass"])) && ($_POST["pass"] != $_POST["cpass"])){
?>
    
	<script type="text/javascript">
		error ="Error: Password and Confirm Password fields do not match.";
		showErrorSuccess();
	</script>
	
    <form action="admin_home.php" method="post" id="id-form">
		<div>
			<table  border="0" cellpadding="0" cellspacing="0"  id="id-form">
				<tr>
					<th valign="top">Website Name:</th>
                    <td><input type='text' name='site_name' value='<?php echo $config_data['site_name']?>' class="inp-form" onblur="validate_site_name()" />
					</td>
                    <td></td>
                </tr>
                <tr>  
					<th valign="top">Website URL: </th>
                    <td>
                    	<input type='text' name='url' value='<?php echo $config_data['url']?>' class="inp-form" onblur="validate_url()"/>
					</td>
                    <td></td>
				</tr>
				<tr>
					<th valign="top">UserName:</th>
					<td><input type='text' disabled="disabled" name='uname'
						value='<?php echo $config_data['uname']?>'  class="inp-form"/>
					</td>
                    <td></td>
				</tr>
				<tr>
					<th valign="top">Email Address:</th>
					<td><input type='text' name='email' value='<?php echo $config_data['email']?>' class="inp-form" onblur="validate_email()"/>
					</td>
                    <td></td>
				</tr>
				<tr>
					<th valign="top">New Password:</th>
                    <td><input type='password' name='pass' class="inp-form"/>
					</td>
					<td></td>
				</tr>
				<tr>
					<th valign="top">Confirm Password:</th>
					<td><input type='password' name='cpass' class="inp-form"/>
					</td>
                    <td></td>
				</tr>
				<tr>
                	<th></th> 
					<td>
                    	<div style="padding-top:15px;">                    	
                    	<span id="submit" class="button-all">Save </span> 
                    	<span id="reset" class="button-all" >Reset</span>
                        </div>
					</td>
				</tr>
			</table>
		</div>
	</form>
    
	<?php 			
		}
		else{
			$locatn = $global_admin['folder'].'data/admin_config';
			$data_config = readXml($locatn);
			if(isset($_POST['pass'])){
				$data_config['pass'] = md5($_POST['pass']);
			}
			$data_config['site_name'] = $_POST['site_name'];
			$data_config['url'] = $_POST['url'];
			$data_config['email'] = $_POST['email'];
			xmlWrite($data_config,$locatn);
			$locatn = $global_site['folder'].'site_config';
			$data_config = readXml($locatn);
			$data_config['site_name'] = $_POST['site_name'];
			$data_config['url'] = $_POST['url'];
			xmlWrite($data_config,$locatn);
	?>
	<script type="text/javascript">
		success ="Details Successfully Updated!.";
		showErrorSuccess();
	</script>
    <div id="redirecthome"> 
        <a href="admin_home.php">Go to Admin Home page</a>
	</div>
	
	<?php 
		}

	}
	else
	{
		$locatn = $global_admin['folder'].'data/admin_config';
		$config_data = readXml($locatn);
	?>
    
	 <form action="admin_home.php" method="post" id="id-form">
		<div>
			<table  border="0" cellpadding="0" cellspacing="0"  id="id-form">
				<tr>
					<th valign="top">Website Name:</th>
                    <td><input type='text' name='site_name' value='<?php echo $config_data['site_name']?>'class="inp-form" onblur="validate_site_name()"/>
					</td>
                    <td></td>
                </tr>
                <tr>  
					<th valign="top">Website URL: </th>
                    <td><input type='text' name='url' value='<?php echo $config_data['url']?>'  class="inp-form" onblur="validate_url()"/>
					</td>
                    <td></td>
				</tr>
				<tr>
					<th valign="top">UserName:</th>
					<td><input type='text' disabled="disabled" name='uname'
						value='<?php echo $config_data['uname']?>'  class="inp-form"/>
					</td>
                    <td></td>
				</tr>
				<tr>
					<th valign="top">Email Address:</th>
					<td><input type='text' name='email' value='<?php echo $config_data['email']?>' class="inp-form" onblur="validate_email()"/>
					</td>
                    <td></td>
				</tr>
				<tr>
					<th valign="top">New Password:</th>
                    <td><input type='password' name='pass' class="inp-form"/>
					</td>
					<td></td>
				</tr>
				<tr>
					<th valign="top">Confirm Password:</th>
					<td><input type='password' name='cpass' class="inp-form"/>
					</td>
                    <td></td>
				</tr>
				<tr>
                	<th></th> 
					<td>
                    <div style="padding-top:15px;"> 
                    	<span id="submit" class="button-all">Save </span> 
                    	<span id="reset" class="button-all" >Reset</span>
                        </div>
					</td>
				</tr>
			</table>
		</div>
	</form>
	
<?php 
}
?>

                    </td>
                    </tr>
            		<tr>
                		<td><img src="images/blank.gif" width="695" height="1" alt="blank" /></td>
                		<td></td>
           			</tr>
        			</table>
 
					<div class="clear"></div>
				</div>
				</td>
				<td id="tbl-border-right"></td>
			</tr>
            <tr>
                <th class="sized bottomleft"></th>
                <td id="tbl-border-bottom">&nbsp;</td>
                <th class="sized bottomright"></th>
            </tr>
    	</table>
	</div>
</div>

</body>
</html>
