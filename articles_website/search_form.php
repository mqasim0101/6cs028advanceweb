<?php
     require("website_connect.php"); // to connect to database:
?>


<!Doctype html>
<html>
     <head>
     	 <!-- Manual style -->
		 <link rel="stylesheet" href="style.css">
		 <!-- All meta tags link here: -->
	      <meta charset="UTF-8">
	      <meta http-equiv="X-UA-Compatible" content="IE=edge">
	      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	     <title>Website Search Form</title>
	 </head>
	 <body>
		<div class="card head">
		<h4>Search Bar Here:</h4>
	    </div>
	     <!-- Search bar here: -->
	     <p>Here is a Search bar! Use this to search for values (movies, genres, date, director, actors) from the website</p>
	     <div class="search-box">
		      <form method="post" action="search.php">
			      <label>Search:</label>
			      <input type="text" name="search" placeholder="search here:">
			      <button type="submit" name="submit_search" class="btn btn-success">Search</button>
		      </form>
	     </div>
	 </body>
</html>