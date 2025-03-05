<?php
session_start();
     require_once("website_connect.php");
	 // check if the user is already logged in:
	 if(isset($_POST['update']) || $_SERVER['REQUEST_METHOD'] == "POST"){
		 echo"Welcome!";
		 $id = $_POST['id'];
        $article_name = $_POST['article_name'];
        $article_overview = $_POST['article_overview'];
        $article_description = $_POST['article_description'];
        $article_author = $_POST['article_author'];
		 if(!empty($article_name) && !empty($article_overview) && !empty($article_description) && !empty($article_author)){
			//Try the update query here:
			$sql_update = "update `articles` set article_name='$article_name', article_overview='$article_overview', article_description='$article_description', article_author='$article_author' where id=$id";
			// check the query using if statement:
			$result = mysqli_query($website_connect, $sql_update);
			   if($result){
				echo"Record updated successfully! ";
				header("Location: display_articles.php");
				die; // stop the code:
			}else{
				echo"Error: could not be able to execute $sql_update. " .mysqli_error($website_connect);
				//Redirect the user to login:
				header("director: login.php");
				die;
		}
		 }
		 }
?>
