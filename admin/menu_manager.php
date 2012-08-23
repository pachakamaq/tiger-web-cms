<?php include 'C:\wamp\www\tigercms\functions\xml_helper.php' ?><!--Location here-->

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Menu Manager</title>
		<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.23.custom.css" rel="stylesheet"><!--Location here-->
		<script type="text/javascript" src="jscripts/jquery-1.8.0.min.js"></script><!--Location here-->
		<script type="text/javascript" src="jscripts/jquery-ui-1.8.23.custom.min.js"></script><!--Location here-->
		<script>
	$(function() {
		$( "#sortable" ).sortable();
		$( "#sortable" ).disableSelection();
	});
	
	</script>
		<style>
			#sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
			#sortable li { margin: 0 3px 3px 0; padding: 0.4em;font-size: 1.4em; height: 18px; }
			#sortable li span { position: absolute; margin-left: -0.3em;}
			#sort { list-style-type: none; margin: 0; padding: 0; width: 100%; }
			#sort li { margin: 0 3px 3px 3px; padding: 0.4em; font-size: 1.4em; height: 18px; text-align:center; }
			#sort li span { position: absolute; margin-left: -1.3em; }
		</style>
	</head>
	<body>
	<?php 
	if(isset($_POST) && ($_POST != NULL))
	{	
		
		$arr = $_POST["m"];
		$d_check = $_POST["c"];
		$str = array();
		$_POST = NULL;
		$i = 1;
		$k = 1;
		while($i <= count($arr))
			{
				if(!array_key_exists($i-1,$d_check))
				{
					$str["tab".$k] = $arr[$i-1];
					$k++;
				}
				
				$i++;
			}
		xmlWrite($str,'C:\wamp\www\tigercms\pages\data\Menus');//Location here
		header('Location:menu_manager.php');

	
	}
	else
	{?>
	<div class="MenuTabs">
		
		<form name="Headers" method="post" action="menu_manager.php">
		<table align="center" border="0">
			<tr>
				<td>Order</td>
				<td align="center">Menu Name</td>
				<td align="center">Delete</td>
			</tr>
			<tr>
			<td><ul id="sort" style="list-style-type:none;">
			<?php 
			$m_list = readXml('C:\wamp\www\tigercms\pages\data\Menus');//Location here
			$i = 1;
			while($i <= count($m_list))
			{
				echo '<li>'.$i.'</li>';
				$i++;
			}
			?></ul></td>
			<td>	
			<ul id="sortable">
	<?php
		
		
		$i = 1;
		while($i <= count($m_list))
		{
			echo "<li class=\"ui-state-default\">&nbsp;&nbsp<input type=\"hidden\" name=\"m[]\" value=\"". $m_list["tab".$i]."\" />".$m_list['tab'.$i]."</li>";
			$i++;
		}
	?>		
			</ul>
			</td>
			<td><ul id="sort" style="list-style-type:none;">
	<?php 
		$i = 1;
		while($i <= count($m_list))
		{
			echo "<li><input type=\"checkbox\" name=\"c[".($i-1)."]\" value=\"on\" /></li>";
			$i++;
		}
	
	?>				
			</ul></td>
			</tr>
			<tr><td colspan="3" align="center"><input type="submit" value="Save Changes"/></td></tr>
			</table>
		</form>
	</div>		
	<?php
	}
	?>
	</body>
</html>


