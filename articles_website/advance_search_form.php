<?php
     include("website_connect.php");
     include("locations.php");
?>
<!DOCTYPE hmtl>
<html>
	<head>
		<title>Advance Search Form</title>
		<!-- Manual style -->
		 <link rel="stylesheet" href="style.css">
	</head>
	<body>
		<!-- Advanced Searchbar here: -->
	    <div class="search-box">
	    	<h4>Advane Search Bar Here: </h4>
	    	<p></p>
		     <form method="get" action="advance_search.php">
			      <div class="row">
				         <div class="col-md-4">
					     <label>article Name</label>
					     <input type="text" name="article_name_search" class="form-control">
				         </div>
				  <br>
				         <div class="col-md-4">
					         <label>article overview</label>
					         <input type="text" name="article_overview_search" class="form-control">
				         </div>
				  <br>
				         <div class="col-md-4">
					         <label>Click to Filter</label><br>
					         <button type="submit" class="btn btn-primary">Search</button>
				         </div>
				         <br><br><br>
			       </div>
		     </form>
	    </div>
	    <br><br>
	    <button id="" class="btn btn-outline-warning"><a href="navigation_bar.php">Back to Navigation Bar</a></button>
	    <button id="" class="btn btn-outline-danger"><a href="home.php">Home</a></button>
	</body>
</html>
