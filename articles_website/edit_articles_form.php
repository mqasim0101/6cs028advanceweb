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
    <!-- Bootstrap style -->
    <link rel="stylesheet" href="style.css">
    <!-- All meta tags link here: -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit & Update articles Form: </title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <h1>Edit & Update Your articles Here: </h1>
    <br><br>
    <p>In here You will be able to add your articles onto the website: </p>
    <!-- Main Code starts from here: -->
    <button class="btn btn-seconadry m1-2"><a href="logout.php">Logout</a></button>
    <br><br>
    <!--Hello <?php //echo $user_data['user_name'];
                ?> -->
    <div id="box">
        <form name="form3" action="edit_articles.php" method="post">
            <!-- All form fields start from here: -->
            <label>Article ID to update: </label>
            <input type="text" name="id" autocomplete="off" required>
            <br><br>
            <label>Article Name to update: </label>
            <input type="text" name="article_name" autocomplete="off" required minlength="3" maxlength="15" span class="error">
            <br><br>
            <label>Article Overview to update: </label>
            <input type="text" name="article_overview" autocomplete="off" required minlength="3" maxlength="15" span class="error">
            <br><br>
            <label>Article Description to update: </label>
            <textarea id="article_description" name="article_description" rows="5" columns="10" required minlength="3" maxlength="15" span class="error"></textarea>
            <br><br>
            <label>Article Author to update: </label>
            <input type="text" name="article_author" autocomplete="off" required minlength="3" maxlength="15" span class="error">
            <br><br>
            <!-- Buttons here below: -->
            <button type="submit" class="btn btn-primary" name="update">Update</button>
            <button type="reset" class="btn btn-secondary m1-2" name="reset6">Reset</button>
            <br><br><br><br>
            <!-- Option to go back to browse: -->
            <button><a href="display_articles.php">Changed Your Mind! Click here to go back to Main movies Page: </a></button>
        </form>
    </div>
</body>

</html>