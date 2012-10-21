<?php 
include 'admin_variables.php';
include $global_admin['folder'].'functions/xml_helper.php';
include $global_admin['folder'].'functions/admin_helper.php';
validateAdmin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/admin_panel.css" />


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

<script type="text/javascript">
function resizeParentIframe(frame_ht){
	$("#iframe_container").height(frame_ht+'px');
}
		$(document).ready(function()
		{
			$(".tab").click(function() {
				$(".tab").removeClass("active_tab");
				$(this).addClass("active_tab");
				switch ($(this).attr("id")) {
                case "pages":
                	$("#admin_iframe").attr('src','pages.php');
                    break;
                case "theme":
                	$("#admin_iframe").attr('src','theme_manager.php');
                    break;
                case "menu_manager":
                	$("#admin_iframe").attr('src','menu_manager.php');
                    break;             
                default:
                	$("#admin_iframe").attr('src','admin_home.php');
            }
			});			
		});	
	</script>
</head>
<body>

	<?php
	if(isset($_GET) && ($_GET != NULL))
	{
		if($_GET['logout'] == 'true')
		{
			session_unset();
			validateAdmin();
			
		}
	}
	else
	{
		$locatn = $global_admin['folder'].'data/admin_config';
		$config_data = readXml($locatn);
		?>
		<div id ="top_container"> Welcome <?php echo $config_data['uname'];?></div>
		
		<div id ="menu_tabs_container">
			<div id = "tabs_left">
				<span class="tab active_tab" id="admin_panel">Home</span>
				 <img src = "images/divider.jpg" />
				 <span class="tab" id="pages">Pages</span>
				 <img src = "images/divider.jpg" />
				 <span class="tab" id="theme">Themes</span> 
				 <img src = "images/divider.jpg" />
				 <span class="tab" id="menu_manager">Menu Manager</span>
				 <img src = "images/divider.jpg"/>
			 </div>
			 <div id = "tabs_right">
				 <img src = "images/divider.jpg"/>
				 <span class="tab_logout"><a href="admin_panel.php?logout=true"><img id="logout_img" src = "images/logout.png" height="25px"/>Logout</a></span>
			</div>
			<div style="height:38px"></div>
		</div>
		<div id="iframe_container"><iframe id="admin_iframe" src="admin_home.php" scrolling="no"></iframe></div>
	<?php 
	}
	?>

</body>

</html>
 