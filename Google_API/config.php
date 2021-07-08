<?php
	session_start();
	require_once "API/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("863294976608-q8257p5848efe951j2fg5pcdjdk504o3.apps.googleusercontent.com");
	$gClient->setClientSecret("sVGtCm7lHfVSoPV96mug30D3");
	$gClient->setApplicationName("EmailToMultippl");
	$gClient->setRedirectUri("http://localhost/PORTFOLIO/Google_API/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");	
	$con = new mysqli('localhost','root','','email');
	
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}	

?>