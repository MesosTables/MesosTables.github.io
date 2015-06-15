<?php

	$city= ($_GET['city']);
	$city = str_replace(" ", "",$city);
	$contents = file_get_contents("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");
	preg_match('/3 Day Weather Forecast Summary:<\/b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">(.*?)<\/span>/s', $contents, $matches);
	/*$string = $matches[1];
	$string = str_replace("\n", "", $string);
	$string = str_replace("\r", "", $string);
	$string = str_replace(PHP_EOL, '', $string);
	$string = preg_replace( "/\r|\n/", "", $string );*/
	print_r($matches[1]);
	
?>