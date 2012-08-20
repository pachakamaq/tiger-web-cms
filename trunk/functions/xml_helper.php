<?php

function writeXml($elements,$location){
	$doc = new DOMDocument();
	$doc->formatOutput = true;
	 
	$r = $doc->createElement( "data" );
	$doc->appendChild($r);
	foreach( $elements as $element )
	{
			$elem = $doc->createElement($element['tagName']);
			$elem->appendChild($doc->createTextNode($element['textNode']));
			/*
			foreach( $element['attr'] as $key => $value ){
				$elem->setAttribute($key, $value);
			}
			*/
			$r->appendChild($elem);
	}
	 
	$doc->save($location.".xml");
	//chmod("write.txt", 0755);
}

$data_array =array(array(
					'tagName' => 'username',
					'textNode' => 'u1'
						),
					array(
					'tagName' => 'pass',
					'textNode' => 'p1'
						)
		);

writeXml($data_array,'data/xml_tst12345');

function readXml($location){
	$xml = simplexml_load_file($location.".xml");
	
	echo $xml->getName() . "<br />";
	
	foreach($xml->children() as $child)
	{
		echo $child->getName() . ": " . $child . "<br />";
	}
}


?>