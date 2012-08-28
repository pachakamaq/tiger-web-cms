<?php

$xml = simplexml_load_file('site_config.xml');
$json = json_encode($xml);
$array = json_decode($json,TRUE);

$global_site_name['site_name'] = $array['site_name'];
$global_site_url['url'] = $array['url'];
$global_site_foldr['folder'] = $array['folder'];



?>