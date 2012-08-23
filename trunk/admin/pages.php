<?php include 'C:\wamp\www\tigercms\admin\functions\xml_helper.php';
include 'C:\wamp\www\tigercms\admin\functions\admin_helper.php';
validateAdmin();

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
<?php
if (isset($_GET) && ($_GET != NULL)){	
if($_GET['action'] == 'createpage'){

	?>
				<form action="pages.php" method="post">
					<table>
						<tr>
							<td>Page Title:<td/><td><input type="text" name="pg_title" /></td>
						</tr>
						<tr>
							<td>Page Contents:<td/><td><textarea id="pg_contents" name="pg_contents" rows="30" cols="50"></textarea></td>
						</tr>
						<tr>
							<td>Options:<td/><td><input type="checkbox" name="menu_tab" value="true" /> Add to Menu</td>
						</tr>
						<tr>
							<td><input type="submit" value="Save Page" /></td><td></td>
						</tr>
					</table>
				</form>
				<?php
		}
	
	elseif($_GET['action'] == 'editpage'){
		$filename = $_GET['pg_name'];
		$locatn = "C:/wamp/www/tigercms/pages/data/pg_".$filename;
		$pg_data = readXml($locatn);
		?>
					<form action="pages.php" method="post">
					<input type="text" name="old_pg_title" style="display: none;" value= "<?php echo $pg_data['pg_title'];?>" />
						<table>
							<tr>
								<td>Page Title:<td/><td><input type="text" name="pg_title" value="<?php echo $pg_data['pg_title']; ?>" /></td>
							</tr>
							<tr>
								<td>Page Contents:<td/><td><textarea id="pg_contents" name="pg_contents" rows="30" cols="50"><?php echo $pg_data['pg_contents']; ?></textarea></td>
							</tr>
							<tr>
								<td>Options:<td/><td><input type="checkbox" name="menu_tab" value="true" /> Add to Menu</td>
							</tr>
							<tr>
								<td><input type="submit" value="Save Page" /></td><td></td>
							</tr>
						</table>
					</form>
					<?php
	}
		
		
}

elseif (isset($_POST) && ($_POST != NULL)){
	
	$filename = str_replace(" ", "_", $_POST['pg_title']);
	$locatn = "C:/wamp/www/tigercms/pages/data/pg_".$filename;
	if(isset($_POST['old_pg_title'])){
		if($_POST['old_pg_title'] != $_POST['pg_title']){
			$filename_old = str_replace(" ", "_", $_POST['old_pg_title']);
			$locatn_old = "C:/wamp/www/tigercms/pages/data/pg_".$filename_old;
			unlink($locatn_old.'.xml');
		}
		unset($_POST['old_pg_title']); // remove confirm password entry
	}
	xmlWrite($_POST,$locatn);
	?>
	
	<div>
		Page Successfully Created!!!<br />
	<!-- 	<a href="../pages/page.php?page=pg_name">Visit page</a>  -->
	</div>
	
	<?php
}
else{
	
	echo "list of pages";
	$locatn = "C:/wamp/www/tigercms/pages/data";
	getPageList($locatn);
	/*
	 * function list pages
	 */
}

?>
</body>
</html>
