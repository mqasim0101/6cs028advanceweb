 <?php
     include("website_connect.php"); // This is to connect it to the database:   
	 // Login Creation code using check_login function: 
	 function check_login($website_connect){
		 if(isset($_SESSION['user_id'])){
			 $id = $_SESSION['user_id'];
			 $query = "select * from users where user_id = '$id' limit 1";
			 
			 $result = mysqli_query($website_connect, $query);
			 if($result && mysqli_num_rows($result) > 0){
				 $user_data = mysqli_fetch_assoc($result);
				 return $user_data;
			 }
		 }
		 // Redirect to login:
		 header("Location: login_form.php");
		 // die to stop the code from con:
		 die;
		 
	 }
	 // User_id random function for the user_id generation within the database:
	 function random_num($length){
		 $text = "";
		 // if the length is less than 5
		 if($length < 5){
			 $length = 5;
		 }
		 // Random number to have different length user_id:
		 $len = rand(4,$length);
		 // for loop is to check the statement status:
		 for($i =0; $i< $len; $i++){
			 # code...();
			 // Add to the text every time the if statement is true:
			 $text .= rand(0,5);
		 }
		 // Return the value of text after use;
		 return $text;
	 }
?>

