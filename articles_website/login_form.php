<?php
//error_reporting(0);
session_start();
      require("website_connect.php");
	  include("navigation_bar.php");
?>
<!Doctype html>
<html>
     <head>
		  <!-- Bootstrap style -->
		  <link rel="stylesheet" href="style.css">
		  <title>Login </title>
	 </head>
	 <body>
		  <br><br>
		  <h1>Login</h1>
		  <br><br><br><br><br>
		  <div id="box">
		      <!-- Login Form below with a post method: -->
			  <form action="login.php" method="post">
				  <!--  user name field: -->
				  <label for="user_name">User Name</label>
				  <input type="text" name="user_name" required>
				  <br><br>
				  <!-- password field: -->
				  <label for="password">Password</label>
		          <input type="password" name="password" required>
		          <br><br><br>
				  <label for="checkbox">Remember Username</label>
				  <input type="checkbox" name="checbox1" autocomplete="off">
				  <br><br><br>
				  <!-- Submit button here: -->
				  <button type="submit" class="btn btn-primary" name="submit1">Submit</button>
				  <!-- Reset button here: -->
				  <button type="reset" class="btn btn-secondary ml-2" name="reset1">Reset</button>
				  <br><br><br><br><br><br>
				  <!-- Let's add a sing up link here: -->
				  <button class="btn btn-success"><a href="signup_form.php">New to Website SingUp here: </button></a>
				  <br><br>
				  <button class="btn btn-danger"><a href="home.php">Head back to Main Page</a></button>
			  </form>
		  </div>
	      <br><br><br>
	 </body>
</html>