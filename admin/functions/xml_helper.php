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

function generateRandomString() {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomString = '';
	for ($i = 0; $i < 10; $i++) {
		$randomString .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $randomString;
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
