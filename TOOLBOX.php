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
/*
 * slack
 *
 * Parse a JSON file and returns an associative array
 *
 * @param (string) the path of the json file. 
 * @param (string) then name of the channel. The prefix "#" before the channel name is automatically set if needed.
 * @return (bool) true if success
 */
function slack($message, $channel){
	$message = urlencode($message); 

	if( stripos($channel, "#") === false ){
		$channel .= "#".$channel;
	}

	$data = 'payload=' . json_encode(
		[
			'channel'  => $channel,
			'text'     => $message
		]
	);

	$url = 'https://hooks.slack.com/services/X_REPLACE_WITH_YOUR_URL_X';

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	
	$result = curl_exec($ch);
	
	if ($result !== false) {
		return true;
	}

	curl_close($ch);
}
/*
 * out
 *
 * beautiful way to echo a string or print an array
 *
 * @param (array or string) the content an array or a string
 * @param (string) The title of outputed datas
 * @return (string) echo or print_r the content
 */
function out($content, $title){

	echo "<center><h2>";
		echo str_repeat("_", 10);
			echo $title;
		echo str_repeat("_", 10);
	echo "  </h2></center>";

	echo "<pre>";
		echo "\n";
		if( is_array($content) ){
			print_r($content);
		}
		else{
			echo $content ;
		}
		echo "\n";
	echo "</pre>";
	echo "<hr>";
}
?>
