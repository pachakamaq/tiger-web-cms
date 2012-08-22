<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<script type = "text/javascript">
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
                case "theme":
                	$("#left_iframe").attr('src','menu_manager.php');
                    break;
                default:
                	$("#left_iframe").attr('src','admin_panel.php');
            }
			});			
		});
	/*	
	function call_new_iframe()
	{
		console.log($(this).id);
		alert("Button clicked"); 
		var src_files = ['admin_panel.php','pages.php','theme.php','menu_manager.php'];
		if(document.getElementById('admin_panel'))
		{
			document.getElementById('admin_panel').src = src_files[0];
		}
		else
			if(document.getElementById('pages'))
			{
				alert("Pages Clicked");
				document.getElementById('pages').src = src_files[1];
			}
			else
				if(document.getElementById('theme'))
				{
					document.getElementById('theme').src = src_files[2];
				}
				else
				{
					document.getElementById('menu_manager').src = src_files[3];
				}
	}
	*/	
	</script>
	</head>
		<body>
			<div>Welcome to Admin Main Page</div>
			<span class="tab" id = "admin_panel">Home</span>
			<span class="tab" id = "pages" >Pages</span>
			<span class="tab "id = "theme" >Themes</span>
			<span class="tab" id = "menu_manager">Menu Manager</span>
			<br />
			<div>
				<iframe id = "left_iframe" src = "" width="300" height="300">
				<p>Left part</p>
				</iframe>
			</div>		
			</body>
		
</html>