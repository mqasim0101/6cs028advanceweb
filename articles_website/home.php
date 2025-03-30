<?php
session_start();
include("website_connect.php");
include("navigation_bar.php");
//include("webapi.php");
include("search_form.php");
include("advance_search_form.php");
?>
<!Doctype html!>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Home</title>
</head>

<body>
	<!-- Main code Displayed here: -->
	<h1>Welcome to Article Website </h1>
	<p>In here you'll find different sort of articles </p>
	<button><a href="display_articles.php">View Articles</a></button>
	<p><i>In here you can find out different types of articles</i></p>
	<br>
</body>

</html>