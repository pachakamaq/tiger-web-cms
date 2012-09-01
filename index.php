<?php 
if (!(file_exists("site_config.xml"))) {
    header('Location: admin/');
}
else{
	include 'site_variables.php';
	include 'functions.php';
	
	$page_data = array();
	$locatn='';
	
	$locatn = $global_site['folder'].'pages/data/menu_tabs';
	$page_data['menu_tabs'] = getMenuTabs($locatn);
	
	
	
	$locatn = $global_site['folder'].'pages/data/panel';
	$page_data['panel'] = getPanelData($locatn);
	
	
	if (isset($_GET['page']) && ($_GET['page'] != NULL))
	{
		$locatn = $global_site['folder'].'pages/data/pg_'.$_GET['page'];
		
	}
	else{
		$locatn = $global_site['folder'].'pages/data/pg_Home';
	}
	$temp_data = getPageData($locatn);
	
	$page_data['title']=$temp_data['pg_title'];
	$page_data['contents']=$temp_data['pg_contents'];
	
	include $global_site['folder'].'themes/'.$global_site['theme'].'/template.php';
	
	
}

?>