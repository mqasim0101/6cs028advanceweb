<?php
include("website_connect.php");
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
					<label>Article Name</label>
					<input type="text" name="article_name" class="form-control">
				</div>
				<br>
				<div class="col-md-4">
					<label>Article Author</label>
					<input type="text" name="article_author" class="form-control">
				</div>
				<br>
				<div class="col-md-4">
					<label>Date</label>
					<input type="date" name="date" class="form-control">
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
</body>

</html>