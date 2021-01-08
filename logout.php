<?php //logout page

	session_start();
	session_destroy();
 
// Redirect to login page
	header("location: login.php");
	exit;
	
?>