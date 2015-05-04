<?php
echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>loopback</title>
</head>
<body>';

echo '<p><h3>Patrick Levy - loopback.php</h3>';
echo '</p>';

class data {
	function __construct($type){
		$this->Type = $type;
	}
	public $Type;
	public $parameters = array();

}

//******************************************
//GET data
//******************************************
$getData = new data('GET');

if ($_GET){
	foreach($_GET as $key => $value){
		$getData->parameters[$key] = $value;
	}
}
else {
	$getData->parameters = null;
}

echo "GET Data:<br>";

$getJSON = json_encode($getData);

echo "$getJSON<br><br>";


//********************************************
//POST data
//********************************************
$postData = new data('POST');

if ($_POST){
	foreach($_POST as $key => $value){
		$postData->parameters[$key] = $value;
	}
}
else {
	$postData->parameters = null;
}

echo "POST Data:<br>";

$postJSON = json_encode($postData);

echo "$postJSON<br><br>";

echo '</body>
</html>';
?>