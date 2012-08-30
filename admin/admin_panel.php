<?php
include 'C:\wamp\www\tigercms\admin\functions\admin_helper.php';
include 'C:\wamp\www\tigercms\admin\functions\xml_helper.php';
validateAdmin();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/admin_panel.css" />
<style type="text/css">

</style>
<script type="text/javascript"
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript">
		
		$(document).ready(function()
		{
			$(".tab").click(function() {
				switch ($(this).attr("id")) {
                case "pages":
                	$("#left_iframe").attr('src','pages.php');
                    break;
                case "theme":
                	$("#left_iframe").attr('src','theme.php');
                    break;
                case "menu_manager":
                	$("#left_iframe").attr('src','menu_manager.php');
                    break;             
                default:
                	$("#left_iframe").attr('src','admin_home.php');
            }
			});			
		});	
	</script>
</head>
<body>

	<?php
	if (isset($_POST) && ($_POST != NULL))
	{
		//  Do Something
	}
	elseif(isset($_GET) && ($_GET != NULL))
	{
		if($_GET['logout'] == 'true')
		{
			session_unset();
			validateAdmin();
			?>

	<a href="login.php">Back To Login Page</a>
	<?php
		}
	}
	else
	{
		$locatn = 'C:\wamp\www\tigercms\admin\data\admin_config';
		$config_data = readXml($locatn);
		?>
	<form action="admin_panel.php" method="post">
		<div id = "centre_container">
		<div id = "top_container">
			Welcome
			<?php echo $config_data['uname']?>
			
		</div>
		<div>
		
		 <span class="tab" id="admin_panel">Home</span>
		 <span class="tab" id="pages">Pages</span>
		 <span class="tab " id="theme">Themes</span> 
		 <span class="tab" id="menu_manager">Menu Manager</span>
		 <a id = "logout" href="admin_panel.php?logout=true">Logout</a>
					<iframe id="left_iframe" src="admin_home.php" frameborder="0"
				marginheight="0" marginwidth="0" width="100%" height="100%"
				scrolling="auto"> </iframe>
				</div>
		</div>
	</form>
	<?php 
	}
	?>

</body>

</html>
