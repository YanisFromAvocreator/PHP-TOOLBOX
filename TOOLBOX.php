<?php
/*
 * jsonOPEN
 *
 * Parse a JSON file and returns an associative array
 *
 * @param (string) the path of the json file. The ".json" at the end of the path is automatically set
 * @return (array) Associative array
 */
function jsonOPEN($path){
	if( stripos($path, '.json') === false){
		$path .= '.json';
	}
	return json_decode(file_get_contents($path), true);
}
?>
