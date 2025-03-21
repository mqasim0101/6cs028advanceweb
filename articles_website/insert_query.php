<?php
//session_start();
     include("website_connect.php");
     include("navigation_bar.php");
	 include("index.php"); // to check user's login status:
	 // check the form's method type:
     if(($_SERVER['REQUEST_METHOD'] == "POST") || isset($_POST['$submit11'])){
        //echo "Welcome HERE!"; // echo method here:
        $user_contacted = $_POST['user_contacted'];
        $query_or_question = $_POST['query_or_question'];
        $query_type = $_POST['query_type'];

        if(!empty($user_contacted) && !empty($query_or_question) &&(!empty($query_type))){
            $sql_add = "insert into `support` (user_contacted, query_or_question, query_type) values ('$user_contacted', '$query_or_question', '$query_type')";
            mysqli_query($website_connect, $sql_add);

            if(!mysqli_query($website_connect, $sql_add)){
                echo "Error!" .mysqli_error($website_connect);
                die; // to stop the code from working:
            }
            else{
                echo "Query Added Successfully!";
            }
        }
     }
?>