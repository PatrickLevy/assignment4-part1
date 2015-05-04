<?php
session_start();

//*******************************************************************************
//Display content to users with a valid login
//*******************************************************************************
if(session_status() == PHP_SESSION_ACTIVE && !empty($_SESSION['validLogin'])) {
	echo "Here is some content that can only be viewed by a user who is logged in.<br><br>";
	echo "Click ";
	echo "<a href=\"content1.php\">here</a>";
	echo " to go back to content1.php";
}
//*******************************************************************************
//Redirect users without proper login
//*******************************************************************************
else{
	$_SESSION = array();
	session_destroy();
	$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
	$filePath = implode('/',$filePath);
	$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
	header("Location: {$redirect}/login.php", true);
	die();
}




echo '</body>
</html>';
?>