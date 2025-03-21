<?php
session_start();
     include("website_connect.php");
     include("navigation_bar.php");
	 include("webapi.php");
?>
<!Doctype html!>
<html lang="en">
<head>
	<link rel="stylesheet" href="style.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
</head>
<body>
	<!-- Main code Displayed here: -->
	<h1>Welcome to Article Website </h1>
	<p>Welcome to the paragraph</p>
	<button class="btn btn-outline-warning"><a href="display_articles.php">View Articles</a></button>
	<br><br>
	<button class="btn btn-outline-primary"><a href="search_form.php">Click here to Access Search Bar</a></button>
	<br><br>
	<button class="btn btn-outline-success"><a href="advance_search_form.php">Click here to Access Advanced Search Bar</a></button>
	<br><br>
	<br>
	<p><i>In here you can find out different types of articles</i></p>
	<button><a href="">Click here to Access Weather App</a></button>
</body>
</html>