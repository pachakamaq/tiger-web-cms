<?php

function xmlWrite($data_array,$location){
    $xml = new SimpleXMLElement('<data/>');
    foreach($data_array as $key => $value){
        if(is_array($value)){
            xmlWrite($value, $xml->addChild($key));
        }else{
            $xml->addChild($key, $value);
        }
    }
    
    
    $fp = fopen($location.'.xml', 'w');
	fwrite($fp, $xml->asXML());
	fclose($fp);
	chmod($location.'.xml',170);
	
}

function readXml($location){
//	if (file_exists('test.xml')) {
		$xml = simplexml_load_file($location.'.xml');
	
	//	print_r($xml);
//	} else {
//		exit('Failed to open test.xml.');
//	}
	$json = json_encode($xml);
	$array = json_decode($json,TRUE);
	return $array;
}

function getPageList($dir){
	$page_list = scandir($dir, 1);
	$find_prefix = "pg_";
	$find_suffix = ".xml";
	foreach ($page_list as $key => $value) {
		$pos_pre = strpos($value, $find_prefix);
		$pos_suf = strpos($value, $find_suffix);
		
		if(($pos_pre === false)||($pos_suf === false)){
			unset($page_list[$key]);
		}
		else{
			$page_list[$key] = substr($page_list[$key], 3, -4);
			$page_list[$key] = str_replace("_", " ", $page_list[$key]);
		} 
	}
	return $page_list;
}

function delXml($location){
	unlink($location.'.xml');
}

function addToMenu($pg_title){
	$location = 'C:/wamp/www/tigercms/pages/data/menu_tabs';
	$menu_tabs = readXml($location);
	$key = 'tab'.(sizeof($menu_tabs)+1);
	$menu_tabs[$key]=$pg_title;
	xmlWrite($menu_tabs,$location);
}

function delFromMenu($pg_title){
	$location = 'C:/wamp/www/tigercms/pages/data/menu_tabs';
	$menu_tabs = readXml($location);
	$menu_tabs_new = array();
	$count = 1;
	$key = array_search($pg_title, $menu_tabs);
	if($key){
		unset($menu_tabs[$key]);
	}
	foreach ($menu_tabs as $value) {
		$menu_tabs_new['tab'.$count]=$value;
		$count++;
	}
	xmlWrite($menu_tabs_new,$location);
}

function checkInMenu($pg_title){
	$location = 'C:/wamp/www/tigercms/pages/data/menu_tabs';
	$menu_tabs = readXml($location);
	$key = array_search($pg_title, $menu_tabs);
	if($key){
		return "checked='checked'";
	}
	else{
		return ' ';
	}
}


function uploadFile($path, $fname)
{
    if ($_FILES[$fname]["error"] > 0)
	{
		return(false);
	}
	else
	{
		if (file_exists($path.$_FILES[$fname]["name"]))
		{
			return(false);
		}
		else
		{
			move_uploaded_file($_FILES[$fname]["tmp_name"],$path.$_FILES[$fname]["name"]);
			return(true);
		}
	}
	return(false);
}

/*
 * 
 * Test current function
 * 
 *
$arra= array(
		'name' => 'poonam',
		'uname' => 'cjnvmx,n',
		'pass' => 'sgcbv,mzcxsrgs',
		'message' => 'ds,mcnv,znbfs'
		);
$loc = 'pankaj';

xmlWrite($arra,$loc);
print_r(readXml($loc));

 * 
 * 
 */


?>
