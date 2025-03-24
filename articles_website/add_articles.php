<?php
session_start(); // This is to get the user's ID checked:
     require_once("website_connect.php"); // to connect to the database:
     include("functions.php"); //  to link this with the functions file for movie random ID function:
     if($_SERVER['REQUEST_METHOD'] == "POST" || isset($_POST['submit4'])){  // Check the data submitted method in the form using session:
        // let's declare some variables here:
        $article_name = $_POST['article_name'];
        $article_overview = $_POST['article_overview'];
        $article_description = trim($_POST['article_description']);
        $article_author = $_POST['article_author'];
        // Checks to see if the variables are not empty or number:
        if(!empty($article_name) && !empty($article_overview) && !empty($article_description) && !empty($article_author) && !is_numeric($article_name) && !is_numeric($article_overview)){
            // create a random movie_id number:
            //$movie_id = random_num_1(10);
            // Try the insert query here:
            $sql_add = "insert into `articles` (article_name, article_overview, article_description, article_author) values ('$article_name', '$article_overview', '$article_description', '$article_author')";
            // Check if query worked:
            mysqli_query($website_connect, $sql_add); // Save the query:article
            if(mysqli_query( $website_connect, $sql_add)){
                echo "Records added successfully! ";
                header("Location: manage_articles.php");
                die;// to stop the code from continuing:
            }else{
                echo "Error Adding records" .mysqli_error($website_connect); // Error adding the require:
                die; // to stop the code from continuing:
            }
        }
        }else{
            echo "Error: " .mysqli_error($website_connect); // print error message displayed here first:
            die; // stop the code;
        }
?>
