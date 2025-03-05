<?php
session_start();     
	 include("website_connect.php");
	 // check to make sure if the user is already logged then log the user out! :
	 if(isset($_SESSION['user_id']) || $_POST['logout']){
		 session_destroy();
		 unset($_SESSION['user_id']);
		 // User is logged in
		 $user_name = $_SESSION['user_name'];
		 setcookie('user_name', $user_name, time() - 3600 / 24 / 365);
		 header("Location: login.php");
		 die;
	 }
	 header("Location: login.php"); // Redirect the user back to login page:
	 die; // This is to stop the code from continuing:
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title></title>
	</head>
	<body>
		<button><a href="logout.php">Logout</a></button>
	</body>
</html>