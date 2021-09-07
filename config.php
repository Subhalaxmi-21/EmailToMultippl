<?php
	session_start();
	require_once "API/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("");
	$gClient->setClientSecret("");
	$gClient->setApplicationName("");
	$gClient->setRedirectUri("");
	$gClient->addScope("");	
	$con = new mysqli('localhost','root','<pwd>','email');
	
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}	

?>