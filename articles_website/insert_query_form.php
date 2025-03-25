<?php
//session_start();
include("website_connect.php");
include("navigation_bar.php");
include("access_level.php");
?>
<DOCTYPE html!>
	<html lang="en">

	<head>
		<!-- Add website style file here: -->
		<link rel="stylesheet" href="style.css">
		<!-- All meta tags link here: -->
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Contact Us: </title>
		<!-- Bootstrap 5 CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

		<style>
			/* Responsive table styles */
			@media (max-width: 768px) {
				.table-responsive-stack tr {
					display: -webkit-box;
					display: -ms-flexbox;
					display: flex;
					-webkit-box-orient: vertical;
					-webkit-box-direction: normal;
					-ms-flex-direction: column;
					flex-direction: column;
					margin-bottom: 1rem;
					border: 1px solid #ddd;
				}

				.table-responsive-stack td {
					display: block;
					text-align: right;
				}

				.table-responsive-stack td:before {
					content: attr(data-label);
					float: left;
					font-weight: bold;
				}
			}
		</style>

	</head>

	<body>
		<h1>Contact Us: </h1>
		<!-- Instruction statement below: -->
		<p><i>In here you will be able to contact me using the form below:</i></p>
		<div class="container my-5">
			<form id="form2" method="post" action="insert_query.php">
				<!-- Let's add additional methods here: -->
				<label for="user_contacted">Your Full User Name</label>
				<input type="text" name="user_contacted" placeholder="Enter your full name" autocomplete="off" required>
				<br><br>
				<label for="query_or_question">What is Your Query About</label>
				<br>
				<input type="text" name="query_or_question" placeholder="issue, concerns" autocomplete="off" required>
				<br><br>
				<label for="query_type">Query Type<label>
				<input type="text" name="query_type" placeholder="urgent" autocomplete="off" required>
				<!-- Submit button here: -->
				<button type="submit" name="submit11" class="btn btn-outline-success">Submit</button>
				<!-- Reset button here: -->
				<button type="reset" class="btn btn-outline-danger">Reset</button>
			</form>
		</div>
		<br><br><br><br>
		<!-- Option to go back to main menu: -->
		<button class="btn btn-outline-warning"><a href="home.php">Back to Home! </a></button>
	</body>

	</html>