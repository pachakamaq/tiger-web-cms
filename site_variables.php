<?php

$xml = simplexml_load_file('site_config.xml');
$json = json_encode($xml);
$array = json_decode($json,TRUE);

$global_site['site_name'] = $array['site_name'];
$global_site['url'] = $array['url'];
$global_site['folder'] = $array['folder'];




?>