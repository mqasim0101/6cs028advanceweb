<?php
session_start();
      include("website_connect.php");
	include("navigation_bar.php");
	include("bootstrap.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="style.css">
	<title>Contact Us</title>
</head>
<body>
	<h1>Contact Us</h1>
	<br><br>
	<p>Below here you'll be able to contact us:</p>
	<button class="btn btn-outline-info"><a href="insert_query_form.php">Click here to send a query</a></button>
</body>
</html>