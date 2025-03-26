<?php
session_start();
include("website_connect.php");
include("navigation_bar.php");
include("webapi.php");
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
	<button><a href="search_form.php">Click here to Access Search Bar</a></button>
	<button><a href="advance_search_form.php">Click here to Access Advanced Search Bar</a></button>
	<p><i>In here you can find out different types of articles</i></p>
	<button><a href="">Click here to Access Weather App</a></button>
	<br>
	<div class="card" style="width: 18rem;">
		<div class="card-body">
			<h5 class="card-title">Card title</h5>
			<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			<a href="#" class="btn btn-primary">Go somewhere</a>
		</div>
	</div>
</body>

</html>