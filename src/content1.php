<?php
session_start();

//***********************************************************
//Check for request to logout out the user and redirect
//***********************************************************
if ($_GET) {
	foreach($_GET as $key => $value){
		if ($key == 'action' && $value == 'logout'){
				session_destroy();
				$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
				$filePath = implode('/',$filePath);
				$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
				header("Location: {$redirect}/login.php", true);
			}
		}
	}
//**********************************************************
//Check for login cases
//**********************************************************
if ($_POST){
	
	//Check for empty input
	foreach($_POST as $Key => $value) {
		$username = $value;
		if (empty($value)){
			echo "A username must be entered.  Click ";
			echo "<a href=\"login.php\">here</a>";
			echo " to return to the login screen.";
			$_SESSION['validLogin'] = false;
			session_destroy();
		}
	}
	
	//There is no current user logged in
	if (empty($_SESSION['username'])) {
		foreach($_POST as $key => $value){
			if ($key == 'username' && !empty($value)) {
				$username = $value;
				$correctLogin = true;
				$_SESSION = array();
				$_SESSION['username'] = $username;
				$_SESSION['visits'] = 0;
				$_SESSION['validLogin'] = true;	
			}
		}
	}
	//A user is logged in but it is not the current user
	else if (!empty($_SESSION['username']) ) {
		foreach($_POST as $key => $value) {
			if ($_SESSION['username'] != $value){
				session_destroy();
				session_start();
				$_SESSION['username'] = $value;
				$_SESSION['visits'] = 0;
				$_SESSION['validLogin'] = true;
			}
		}
	}
}

//**********************************************************************
//Display content to properly logged in user
//**********************************************************************
if(session_status() == PHP_SESSION_ACTIVE && !empty($_SESSION['validLogin'])) {
	
	if ($_SESSION['validLogin'] == true) {
	echo "Hello $_SESSION[username], you have visited this page $_SESSION[visits] times before. Click ";
	echo "<a href=\"content1.php?action=logout\">here</a>";
	echo " to logout.<br><br>";
	$_SESSION['visits']++;
	echo "Click ";
	echo "<a href=\"content2.php\">here</a>";
	echo " to access the page content2.php";
	}
}
//***********************************************************************
//Redirect users who are not logged in properly to the login page
//***********************************************************************
else if(session_status() == PHP_SESSION_ACTIVE) {
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