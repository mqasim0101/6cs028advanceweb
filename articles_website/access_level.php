<?php
//session so that the php can remember if user is logged in or not
session_start();
     include("sanitise.php");
     include("website_connect.php"); // to connect to the database:
	//include("functions.php"); // to provide function access:
	//include("index.php");
	// This is to check if the user is logged in or not: if not then direct them to the login page
	if(!isset($_SESSION['user_id'])){
		header("Location: login_form.php");
	}else{
		echo ""; // this show worked:
	}


?>