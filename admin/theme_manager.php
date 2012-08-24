<?php include 'C:\wamp\www\tigercms\admin\functions\xml_helper.php' ?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Theme Manager</title>
		<script type="text/javascript">
<!--
		function chngimg()
		{
			var thm = document.getElementById("themes");
			var img = document.getElementById("snap");
			img.src = "http://localhost/tigercms/themes/" + thm.value + "/snapshot.png";
		}	
-->	
		</script>
		
	</head>
	
	<body>
	
	
	
	
	
	<?php 

	if(isset($_POST) && ($_POST != NULL))
	{
		$data=readXml('C:\wamp\www\tigercms\admin\data\admin_config');
		$data['theme']=$_POST['thm'];
		xmlWrite($data,'C:\wamp\www\tigercms\admin\data\admin_config');
		$_POST = null;
		header('Location:theme_manager.php?theme=changed');

	}
	elseif(isset($_FILES)&&($_FILES != Null))
	{
		$allowedExts = "zip";
		$extension = end(explode(".", $_FILES["theme"]["name"]));
		print_r($extension.'---');print_r($_FILES["theme"]);
		if ($extension==$allowedExts)
		{
			if ($_FILES["theme"]["error"] > 0)
			{
				header('Location:theme_manager.php?theme=Err');
			}
			else
			{
				if (file_exists("C:\wamp\www\\tigercms\\themes\\" . $_FILES["theme"]["name"]))
				{
					header('Location:theme_manager.php?theme=Exists');
				}
				else
				{
					move_uploaded_file($_FILES["theme"]["tmp_name"],	"C:\wamp\www\\tigercms\\themes\\" . $_FILES["theme"]["name"]);
					$fl = "C:\wamp\www\\tigercms\\themes\\";
					$dirnam = explode(".", $_FILES["theme"]["name"]);
					$zip = new ZipArchive;
					$res = $zip->open($fl . $_FILES["theme"]["name"]);
					if ($res === TRUE) {
						mkdir($fl.$dirnam[0],0755);
						$zip->extractTo($fl.$dirnam[0].'\\');
						$zip->close();
						header('Location:theme_manager.php?theme=Uploaded');
					} 
					else 
					{
						header('Location:theme_manager.php?theme=Err');
					}				
					
				}
			}
		}
		else
		{
			header('Location:theme_manager.php?theme=Err');
		}
		
	}
	else 
	{
		$msg = "";
		if(isset($_GET) && ($_GET != Null))
		{
			if($_GET["theme"] == "Changed") $msg = "Your Theme was changed Successfully.";
			elseif($_GET["theme"]== "Uploaded") $msg = "Your File was succesfully uploaded. To select your theme check the menu below.";
			elseif($_GET["theme"]== "Err") $msg = "Sorry there was an error uploading your file.";
			elseif($_GET["theme"]== "Exists") $msg = "Theme already exists";
		}
		$dir = 'C:\wamp\www\tigercms\themes';
		$themelist = scandir($dir);
		$theme_list = array();
		foreach ($themelist as $key => $value) {
			if(stristr($value,'.',false)==false){
				array_push($theme_list,$themelist[$key]);
			}
		}
		$data=readXml('C:\wamp\www\tigercms\admin\data\admin_config');
		echo '<p align="center">'.$msg.'</p>';
		echo '<p align="center">Your current theme is - '.$data['theme'].'</p>';
		?>
		
		<form name="themefrm" method="post" action="theme_manager.php">
		
			<table align="center" border="1">
				
				<tr>
					<td>
					
						<select name="thm" id="themes"  size="1" onchange="chngimg()">
							<?php 
							$i = 0;
							
							
							while($i < count($theme_list))
							{
								if($theme_list[$i]==$data['theme'])
								{
									echo '<option value="'.$theme_list[$i].'" selected="selected">'.$theme_list[$i].'</option>';
								}
								else
								{
									echo '<option value="'.$theme_list[$i].'">'.$theme_list[$i].'</option>';
								}
								$i++;
							}
							
							?>
								
						</select>
						
					    <input type="submit" value="Select" />
					</td>
				</tr>
				
				<tr>
					<td>
					<?php
						$source='http://localhost/tigercms/themes/'.$data['theme'].'/snapshot.png';
						
						echo '<img src="'.$source.'" id="snap" height="50%"/>';
						
					?>				
					</td>
				</tr>
			</table>
	</form>
	<br/>
	<br/>
	<form name="fileupload" action="theme_manager.php" method="post" enctype="multipart/form-data">
		<table align="center" border="1">
		<tr><td align="center"><p>To upload your own theme, please select the file to be uploaded<br />
		           ***Note: Only Zip Archives can be uploaded. Make sure your theme files are bundled as a zip file</p></td></tr>
		<tr> <td align="center">
		<input type="file" name="theme" accept=".zip"/>
		<input type="submit" value="Upload"/>
		</td></tr>
		<tr><td><p id="msg"></p></td></tr>	
	</form>
	<?php 
		}
	?>	
	</body>
</html>