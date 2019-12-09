<?php 
header('Content-type: text/html; charset=utf-8');
require_once('SxGeo.php');
$sxGeo = new \IgI\SypexGeo\SxGeo(__DIR__ . '/data/SxGeoCity.dat');
$the_get_city = $sxGeo->getCityFull($_SERVER["REMOTE_ADDR"]);

if(is_array($the_get_city)){
  if(preg_match('/область/is',$the_get_city['region']['name_ru'])){
    $the_get_city_name = $the_get_city['city']['name_ru'];
  }
  else {
    $the_get_city_name = $the_get_city['region']['name_ru'];
  }
}
print_r($the_get_city_name);
//print_r($sxGeo->getCity($_SERVER["REMOTE_ADDR"]));

?>