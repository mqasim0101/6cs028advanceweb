<?php
//error_reporting(0);
session_start();
require("website_connect.php");
include("navigation_bar.php");
?>
<!Doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap style -->
	<link rel="stylesheet" href="style.css">
	<title>Login </title>
	<!-- Bootstrap 5 CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Optional Custom CSS for additional responsiveness -->
	<style>
		/* Custom responsive table styles */
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
	<br><br>
	<h1>Login</h1>
	<br><br>
	<div class="card" style="width: 25rem;">
		<!-- Login Form below with a post method: -->
		<form action="login.php" method="post">
			<!--  user name field: -->
			<label for="user_name"  class="form-label">User Name</label>
			<input type="text" class="form-control" name="user_name" required minlength="3" maxlength="15" span class="error">
			<div id="usernameHelp" class="form-text">We'll never share your username with anyone else.</div>
			<br>
			<!-- password field: -->
			<label for="password"  class="form-label">Password</label>
			<input type="password"  class="form-control" name="password" required minlength="3" maxlength="15" span class="error">
			<br>
			<label for="checkbox">Remember Username</label>
			<input type="checkbox"  class="form-label" name="checbox1" autocomplete="off">
			<br><br><br>
			<!-- Submit button here: -->
			<button type="submit" class="btn btn-primary" name="submit1">Submit</button>
			<!-- Reset button here: -->
			<button type="reset" class="btn btn-secondary ml-2" name="reset1">Reset</button>
		</form>
	</div>
	<br><br>
	<!-- Let's add a sing up link here: -->
	<button class="btn btn-success"><a href="signup_form.php">New to Website SingUp here: </button></a>
	<br><br>
	<button class="btn btn-danger"><a href="home.php">Head back to Main Page</a></button>
	<br><br><br>
</body>

</html>