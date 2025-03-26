<?php
error_reporting(0);
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
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- for Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script> <!-- Link to your external JavaScript file -->

    <style>
        /* Responsive table styles */
        @media (max-width: 768px) {
            .table-responsive-stack tr {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                margin-bottom: 1rem;
                border: 1px solid #ddd;
            }

            .table-responsive-stack td {
                display: block;
                text-align: right;
            }

            .table-responsive-stack td:before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
            }
        }
    </style>


</head>

<body>
    <h1>Add Your articles Here: </h1>
    <br><br>
    <p>In here You will be able to add your articles onto the website: </p>
    <!-- Main Code starts from here: -->
    <button class="btn btn-seconadry m1-2"><a href="logout.php">Logout</a></button>
    <br><br>
    <!--Hello <?php //echo $user_data['user_name'];
                ?> -->
    <div id="box" class="container my-5">
        <form name="myForm" action="add_articles.php" method="post">
            <!-- All form fields start from here: -->
            <label>Article Name: </label>
            <input type="text" name="article_name" autocomplete="off" required minlength="3" maxlength="15" span class="error">
            <br><br>
            <label>Article Overview: </label>
            <input type="text" name="article_overview" autocomplete="off" required minlength="3" maxlength="15" span class="error">
            <br><br>
            <label for="article_description">Article Description: </label>
            <br>
            <textarea id="article_description" name="article_description" rows="5" columns="20" required minlength="3" maxlength="15" span class="error"></textarea>
            <br><br>
            <label>Article Author: </label>
            <input type="text" name="article_author" autocomplete="off" required minlength="3" maxlength="15" span class="error">
            <br><br>
            <!-- Buttons here below: -->
            <button type="submit" class="btn btn-primary" name="submit4">Submit</button>
            <button type="reset" class="btn btn-secondary m1-2" name="reset4">Clear</button>
            <br><br><br><br>
            <!-- Option to go back to browse: -->
            <button><a href="display_articles.php">Changed Your Mind! Click here to go back to Main Page: </a></button>
        </form>
        <div id="response"></div>
    </div>
</body>

</html>