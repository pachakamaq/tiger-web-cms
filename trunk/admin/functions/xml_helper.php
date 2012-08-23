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
			$page_list[$key] = substr($page_list[$key], 3, -4);  // bcd
			$page_list[$key] = str_replace("_", " ", $page_list[$key]);
		} 
	}
	return $page_list;
}

function delXml($location){
	unlink($location.'.xml');
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
