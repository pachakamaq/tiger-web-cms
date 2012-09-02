<?php 
include 'admin_variables.php';
include $global_admin['folder'].'functions/xml_helper.php';
include $global_admin['folder'].'functions/admin_helper.php';
validateAdmin();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/admin_home.css" />

<script type="text/javascript" src="jscripts/jquery-1.8.0.min.js"></script>
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
<script type="text/javascript">

$(document).ready(function() {
	var is_get = '<?php if (isset($_GET) && ($_GET != NULL)){ echo "get_true";}else{echo "get_false";}?>' ;
	if(is_get == 'get_false'){
		//	$('#tabs_left_child').find('a:first-child').removeClass('tab');
			$('#tabs_left_child').find('a:first-child').addClass('active_tab');
		}
	else{
	//	$('#tabs_left_child').find('a:last-child').removeClass('tab');
		$('#tabs_left_child').find('a:last-child').addClass('active_tab');
		}
	 });
	

</script>
</head>
<body>
<div id="menu_tabs_container_child">
	<div id = "tabs_left_child">
    			
				<a class="tab" href="pages.php" onclick='activate_me()'>View Pages</a>
				<img src = "images/divider.jpg" />
				<a class="tab" href="pages.php?action=createpage" onclick='activate_me()'>Create Page</a>
				 
	</div>
    <div style="height:38px"></div>
</div>


<div id="content-outer">
	<div id="content">
    	
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
				<div id="content-table-inner">
	
                    <table border="0" width="100%" cellpadding="0" cellspacing="0">
                    <tr valign="top">
                    <td>
<?php
if (isset($_GET) && ($_GET != NULL)){	
if($_GET['action'] == 'createpage'){

	?>
				<form action="pages.php" method="post">
                <div>
					<table  border="0" cellpadding="0" cellspacing="0"  id="id-form">
						<tr>
							<th valign="top">Page Title:</th>							
                            <td><input type="text" name="pg_title" class="inp-form"/></td>
						</tr>
						<tr>
							<th valign="top">Page Contents:</th>
                            <td><textarea id="pg_contents" name="pg_contents" rows="30" cols="50"></textarea></td>
						</tr>
						<tr>
							<th valign="top">Options:</th>
                            <td><input type="checkbox" name="menu_tab" value="true" />&nbsp;&nbsp;<b>Add to Menu</b></td>
						</tr>
						<tr>
                        	<th></th>
							<td><button type="submit" value="Save" class="button-all">Save</button> </td>
						</tr>
					</table>
                    
				</form>
<?php
	}

elseif($_GET['action'] == 'editpage'){
	$filename = $_GET['pg_name'];
	$locatn = $global_site['folder'].'pages/data/pg_'.$filename;
	$pg_data = readXml($locatn);
	$checked = checkInMenu(str_replace("_", " ", $_GET['pg_name']));
?>
    <form action="pages.php" method="post">
    	<div>
        	<input type="text" name="old_pg_title" style="display: none;" value= "<?php echo $pg_data['pg_title'];?>" />
            <table  border="0" cellpadding="0" cellspacing="0"  id="id-form">
               	<tr>
					<th valign="top">Page Title:</th>							
                    <td><input type="text" name="pg_title" value="<?php echo $pg_data['pg_title']; ?>" class="inp-form"/></td>
				</tr>
                <tr>
                    <th valign="top">Page Contents:</th>
                    <td><textarea id="pg_contents" name="pg_contents" rows="30" cols="50"><?php echo $pg_data['pg_contents']; ?></textarea></td>
                </tr>
                <tr>
                    <th valign="top">Options:</th>
                    <td><input type="checkbox" name="menu_tab" value="true" <?php echo $checked; ?> /> &nbsp;&nbsp; Add to Menu</td>
                </tr>
                <tr>
                	<th></th>
                    <td><button type="submit" value="Save Page" class="button-all">Save Page</button> </td>
                </tr>
            </table>
            </div>
        </form>
        
        
					<?php
	}
	elseif($_GET['action'] == 'delpage'){
		$filename = $_GET['pg_name'];
		$locatn = $global_site['folder'].'pages/data/pg_'.$filename;
		delXml($locatn);
		delFromMenu(str_replace("_", " ", $_GET['pg_name']));
		?>
		<div>Page successfully Deleted!</div>
		<?php
		
	}
		
		
}

elseif (isset($_POST) && ($_POST != NULL)){
	
	$filename = str_replace(" ", "_", $_POST['pg_title']);
	$locatn = $global_site['folder'].'pages/data/pg_'.$filename;
	if(isset($_POST['old_pg_title'])){
		if($_POST['old_pg_title'] != $_POST['pg_title']){
			$filename_old = str_replace(" ", "_", $_POST['old_pg_title']);
			$locatn_old = $global_site['folder'].'pages/data/pg_'.$filename_old;
			delXml($locatn_old);
			delFromMenu($_POST['old_pg_title']);
		}
		unset($_POST['old_pg_title']); // remove confirm password entry
	}
	if(!(isset($_POST['menu_tab']))){
		$_POST['menu_tab']='false';
	}
	if($_POST['menu_tab'] == 'true'){
		addToMenu($_POST['pg_title']);
	}
	elseif($_POST['menu_tab'] == 'false'){
		delFromMenu($_POST['pg_title']);
	}
	
	
	xmlWrite($_POST,$locatn);
	?>
	
	<div>
		Page Successfully Created!!!
	<!-- 	<a href="../pages/page.php?page=pg_name">Visit page</a>  -->
	</div>
	
	<?php
}
else{
	$locatn = $global_site['folder'].'pages/data';
	$page_list = getPageList($locatn);
	?>
	
    <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">

		<tr>
			<th class="table-header-repeat line-left" style="width:50%;">Page Title</th>
            <th class="table-header-repeat line-left" style="width:25%;">Edit</th>
            <th class="table-header-repeat line-left" style="width:25%;">Delete</th>
		</tr>
        
<?php 
	$i = 0;
	foreach ($page_list as $value){
		if($i % 2 == 0)	echo '<tr>';
		else echo '<tr class="alternate-row">';
?>
			
			<td><?php echo $value;?></td>
            <td><a href="pages.php?action=editpage&pg_name=<?php echo str_replace(" ", "_", $value); ?>">edit</a></td>
            <td><a href="pages.php?action=delpage&pg_name=<?php echo str_replace(" ", "_", $value); ?>">delete</a></td>
			</tr>
			
<?php
	$i++; 
}
?>
	</table>


<?php
	/*
	 * function list pages
	 */
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
