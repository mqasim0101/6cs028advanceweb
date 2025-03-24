<?php
session_start();
     require_once("website_connect.php");
     include("functions.php");
     //require("access_level.php");
	 $_SESSION;
	 // This is to check if the details entered using the post format:
	 if($_SERVER['REQUEST_METHOD'] == 'POST'){
		 // Post all the relevant variables:
		 $user_name = $_POST['user_name'];
		 $password = $_POST['password'];
		 // Checking if they are not both empty:
		 if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){
			 //Save to database;
			 $user_id = random_num(5);
			 // Insert into the database using the query:
			 $query = "insert into users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";
			 // To save the generated query:
			mysqli_query($website_connect,$query);
			 
			 // Direct users to login page:
			 header("Location: login_form.php");
			 die; // This is to stop the code from continuing:
		 }
		 else{
			 echo("Please Enter valid Information");
		 }
	 }
	 
?>
