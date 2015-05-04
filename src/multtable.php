<?php
echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>multtable</title>
</head>
<body>';

echo '<p><h3>Patrick Levy - multtable.php</h3>';


$minmultiplicand = 0;
$maxmultiplicand = 0;
$minmultiplier = 0;
$maxmultiplier = 0;
$goodParameters = 1;
$product = 0;

//Check for min-multiplicand in URL via GET and assign to variable
if (isset($_GET["min-multiplicand"])) {
	$minmultiplicand = ($_GET["min-multiplicand"]);
}
else {
	echo "Missing parameter [min-multiplicand]<br>";
	$goodParameters = 0;
}

//Check for max-multiplicand in URL via GET and assign to variable
if (isset($_GET["max-multiplicand"])) {
	$maxmultiplicand = ($_GET["max-multiplicand"]);
}
else {
	echo "Missing parameter [max-multiplicand]<br>";
	$goodParameters = 0;
}

//Check for min-multiplier in URL via GET and assign to variable
if (isset($_GET["min-multiplier"])) {
	$minmultiplier = $_GET["min-multiplier"];
}
else {
	echo "Missing parameter [min-multiplier]<br>";
	$goodParameters = 0;
}

//Check for max-multiplier in URL via GET and assign to variable
if (isset($_GET["max-multiplier"])) {
	$maxmultiplier = $_GET["max-multiplier"];
}
else {
	echo "Missing parameter [max-multiplier]<br>";
	$goodParameters = 0;
}

//Check that min-multiplicand is less than max-multiplicand
if ($minmultiplicand <= $maxmultiplicand){

}
else {
	echo "Minimum [min-multiplicand] is larger than the maximum<br>" ;
	$goodParameters = 0;
}

//Check that min-multiplier is less than max-multiplier
if ($minmultiplier <= $maxmultiplier){
}
else {
	echo "Minimum [min-multiplier] is larger than the maximum<br>";
	$goodParameters = 0;
}

//Check that min-multiplicand is a an integer
if (!((intval($minmultiplicand)) == ($minmultiplicand))) {
	echo "min-multiplicand must be an integer<br>";
	$goodParameters = 0;
}

//Check that max-multiplicand is a an integer
if (!((intval($maxmultiplicand)) == ($maxmultiplicand))) {
	echo "max-multiplicand must be an integer<br>";
	$goodParameters = 0;
}

//Check that min-multiplier is a an integer
if (!((intval($minmultiplier)) == ($minmultiplier))) {
	echo "min-multiplier must be an integer<br>";
	$goodParameters = 0;
}

//Check that max-multiplier is a an integer
if (!((intval($maxmultiplier)) == ($maxmultiplier))) {
	echo "max-multiplier must be an integer<br>";
	$goodParameters = 0;
}

//Create Table
if ($goodParameters == 1){

echo '<p>
<table border="1">';

for ($i = ($minmultiplicand - 1); $i <= $maxmultiplicand; $i++) {
echo '<tr>';
	for ($j = ($minmultiplier - 1); $j <=$maxmultiplier; $j++) {
		if ($i == $minmultiplicand - 1 && $j == $minmultiplier - 1){
			echo '<td>';
		}
		else if ($i == $minmultiplicand - 1) {
			echo "<td>$j";
		}
		else if ($j == $minmultiplier - 1) {
			echo "<td>$i";
		}

		else {
			$product = $i * $j;
			echo "<td>$product";
		}
	}

}

echo '</table>';
echo '<p>';
}

echo '</p>';

echo '</body>
</html>';
?>