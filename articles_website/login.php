<?php
session_start();    
	require_once("website_connect.php");
     include("functions.php");
     //require("access_level.php");
	 //include("add_cookies.php");
	 // This is to check if the details entered using the post format:
	 if($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_POST['submit1'])){
		 // SOMETHING WAS posted:
		 $user_name = $_POST['user_name'];
		 $password = $_POST['password'];
		 // Checking if they are not both empty:
		 if(!empty($user_name) && !empty($password) && !is_numeric($user_name)){
			 //Read from the database;
			 // Insert into the database using the query:
			 $query = "select * from users where user_name= '$user_name' limit 1";
			 // Need the result To save the generated query:
			 $result = mysqli_query($website_connect, $query);
			 if($result){
				 if($result && mysqli_num_rows($result) > 0){
					 $user_data = mysqli_fetch_assoc($result);
					 if($user_data['password'] === $password){
						 $_SESSION['user_id'] = $user_data['user_id'];
						 // Direct users to main page:
						 header("Location: index.php");
						 die; // This is to stop the code from continuing:
					 }
				 }
			 }
			 
			 echo("Wrong Username or Password! ");
		 }
		 else{
			 echo("Please Enter valid Information");
		 }
	 }
?>
