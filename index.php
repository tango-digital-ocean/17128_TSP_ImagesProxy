<?php
if (isset($_GET["img"])) {

	$url = $_GET["img"];
	$file = basename($url);
	
	// check whitelist
	
	$parse = parse_url($url);
	$host = "";
	if (isset($parse['host'])) {
		$host = $parse['host'];
	}
	
	switch ($host) {
		case "horizonlives3.s3.eu-west-1.amazonaws.com":
		case "horizonlives3.s3-eu-west-1.amazonaws.com":
		case "duijuz32qudrm.cloudfront.net":
			header("Content-Disposition: attachment; filename=\"". $file ."\";" );
			echo file_get_contents($url);
			break;
		default:
			header('HTTP/1.1 403 Forbidden');
	};
} else {
	header("HTTP/1.0 404 Not Found");
}
?>