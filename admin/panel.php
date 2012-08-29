<?php include 'C:\wamp\www\tigercms\admin\functions\xml_helper.php';
include 'C:\wamp\www\tigercms\admin\functions\admin_helper.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">

	tinyMCE.init({
		// General options
		mode : "exact",
		elements : "pg_contents",
		theme : "advanced",
		skin : "o2k7",
		plugins : "lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>

</head>
<body>

<?php if ((isset($_GET) && ($_GET != NULL))||file_exists('C:/wamp/www/tigercms/pages/data/panel.xml')){

		$locatn = "C:/wamp/www/tigercms/pages/data/panel";
		$pg_data = readXml($locatn);
		//print_r($pg_data);
		$checked = $pg_data['panelRadio'];
		 
		
		?>
		<form action="panel.php" method="post">
		<table>

 <tr>
 <td>Position:</td>
 <td> <input type="radio" name="panelRadio" value="leftPanel"<?php if($checked=="leftPanel"){?> checked="checked"<?php }?>  />Left Panel 
 <input type="radio" name="panelRadio" value="rightPanel" <?php if($checked=="rightPanel"){?> checked="checked"<?php }?>/>Right Panel </td>
 </tr>
 
 <tr>
 <td>Content:</td> <td> <textarea id="pg_contents" name="pg_contents" rows="30" cols="50"> <?php echo $pg_data['pg_contents']; ?></textarea></td>
  
 
 </tr>
 <tr><td> <input type="button" name="selectPanel" value="Select Panel"></input></td></tr>
</table>
		
		</form>
<?php }//end of outer if
 else if((isset($_POST) && ($_POST != NULL))||(file_exists('C:/wamp/www/tigercms/pages/data/panel.xml'))){ 	
$location="C:/wamp/www/tigercms/pages/data/panel";
xmlWrite($_POST, $location);
$pg_data=readXml($location);
$chk=$pg_data['panelRadio'];
?>
<form action="panel.php" method="post">
		<table>

 <tr>
 <td>Position:</td>
 <td> <input type="radio" name="panelRadio" value="leftPanel" <?php if($chk=="leftPanel"){?> checked="checked"<?php }?>/>Left Panel 
 <input type="radio" name="panelRadio" value="rightPanel" <?php if($chk=="rightPanel"){?> checked="checked"<?php }?>/>Right Panel </td>
 </tr>
 
 <tr>
 <td>Content:</td> <td> <textarea id="pg_contents" name="pg_contents" rows="30" cols="50"> <?php echo $pg_data['pg_contents']; ?></textarea></td>
  
 
 </tr>
 <tr><td> <input type="button" name="selectPanel" value="Select Panel"></input></td></tr>
</table>
		
		</form>

<?php  }
else{	
 ?>	
<form action="panel.php" method="post">
<table>

 <tr>
 <td>Position:</td>
 <td> <input type="radio" name="panelRadio" value="leftPanel" />Left Panel 
 <input type="radio" name="panelRadio" value="rightPanel" />Right Panel </td>
 </tr>
 
 <tr>
 <td>Content:</td> <td> <textarea id="pg_contents" name="pg_contents" rows="30" cols="50"> </textarea></td>
  
 
 </tr>
 <tr><td> <input type="submit" name="selectPanel" value="Select Panel"></input></td></tr>
</table>
</form>
<?php 
}

?>

</body>
</html>