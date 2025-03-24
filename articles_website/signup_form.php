<?php
//error_reporting(0);
session_start();
	  include("navigation_bar.php");
	  include("website_connect.php");
?>
<!Doctype html>
<html>
     <head>
	     <!-- Add website style file here: -->
		 <link rel="stylesheet" href="style.css">
		 <title>Sign Up</title>
	 </head>
	 <body>
	     <!-- Main page title: -->
		 <b><h1>Sign Up</h1></b>
		 <!-- divider class here: -->
		 <div>
		     <br><br><br><br><br><br>
		     <form class="my-5" action="signup.php" method="POST" enctype="multipart/form-data">
			     <!-- All the labels start from here: -->
				 <label for="user_name">User Name</label>
				 <input type="text" name="user_name" autocomplete="off" required>
				 <br><br>
				 <label for= "password">Password</label>
				 <input type="password" name="password" autocomplete="off" required>
				 <br><br>
				 <!-- Submit button here: -->
				 <button type="submit" class="btn btn-primary">Submit</button>
				 <!-- Reset button here: -->
				 <button type="reset" class="btn btn-secondary ml-2">Reset</button>
			 </form>
		 </div>
		 <br><br><br><br><br>
		 <!-- Already Account\Login Option available: -->
		 <button class="btn btn-secondary m1-2"><b><a href="login_form.php">Already have an Account Login Here</a></b></button>
	 </body>
</html>