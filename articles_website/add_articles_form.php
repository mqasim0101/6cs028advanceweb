<?php
session_start();
     include("website_connect.php");
     include("navigation_bar.php");
     include("access_level.php");
?>
<!Doctype html>
<html lang="en">
    <head>
        <!-- Add website style file here: -->
        <link rel="stylesheet" href="style.css">
        <!-- All meta tags link here: -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add articles Form: </title>
    </head>
    <body>
        <h1>Add Your articles Here: </h1>
        <br><br>
        <p>In here You will be able to add your articles onto the website: </p>
        <!-- Main Code starts from here: -->
        <button class="btn btn-seconadry m1-2"><a href = "logout.php">Logout</a></button>
		<br><br>
		 <!--Hello <?php //echo $user_data['user_name'];?> -->
        <div id= "box" class="container my-5">
            <form name="form1" action="add_articles.php" method="post">
                <!-- All form fields start from here: -->
                <label>Article Name: </label>
                <input type="text" name="article_name" autocomplete = "off" required>
                <br><br>
                <label>Article Overview: </label>
                <input type="text" name="article_overview" autocomplete = "off" required>
                <br><br>
                <label for="article_description">Article Description: </label>
                <textarea id="article_description" name="article_description" rows="5" columns="10" required></textarea>
                <br><br>
                <label>Article Author: </label>
                <input type="text" name="article_author" autocomplete = "off" required>
                <br><br>
                <!-- Buttons here below: -->
                <button type="submit" class="btn btn-primary" name="submit4">Submit</button>
                <button type="reset"  class="btn btn-secondary m1-2" name="reset4">Clear</button> 
                <br><br><br><br>
                <!-- Option to go back to browse: -->
                <button><a href="display_articles.php">Changed Your Mind! Click here to go back to Main movies Page: </a></button>
            </form>
        </div>
    </body>
</html>