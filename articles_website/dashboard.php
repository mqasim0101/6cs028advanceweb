<?php
session_start();
     require_once("website_connect.php"); // this file inclusion will make access to database phpmyadmin for details:
     include("navigation_bar.php"); // this file included will make access to website navigation bar for user when in action:
     include("access_level.php"); // for the login function to work:
     include("bootstrap.php");
?>
<!Doctype html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Dashboard</title>
    </head>
    <body>
        <!-- All the main code here: -->
        <h1>Dashboard</h1>
        <br><br>
        <div id="" class="container">
            <!-- All the form methods are below here: -->
            <form id="" class="" method="post" action="">
                <!-- All the records here: -->
                <p>All the records here:</p>
            </form>
        </div>
        <button><a href="home.php">Back to the Main Page:</a></button>
    </body>
</html>