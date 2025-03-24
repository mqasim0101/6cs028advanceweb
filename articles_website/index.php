<?php
session_start();
     include("website_connect.php"); // connects to the database:
     include("functions.php"); //  connects to the functions page:
     include("bootstrap.php");
	 // restrictions here:
	 $user_data = check_login($website_connect);

?>
<!Doctype html>
<html>
     <head>
		 <!-- All meta tags link here: -->
	     <meta charset="UTF-8">
		 <meta http-equiv="X-UA-Compatible" content="IE=edge">
		 <meta name="viewport" content="width=device-width, initial-scale=1.0">
		 <title>My Movies Index</title>
		 <link rel="stylesheet" type="text/css" href="website_styling.css">
	 </head> 
	 <body>
	     <!--  Logout button here: -->
		 <button type="submit" class="btn btn-primary"><a href = "logout.php">Logout</a></button>
		 <br><br>
		 <h1>Welcome to My Movies Website </h1>
		 Hello <?php echo $user_data['user_name'];?>
		 <br><br><br>
		 <button><a href="account_info.php">Account Info</a></button>
		 <?php header("Location: home.php");?>
	 </body>
</html>