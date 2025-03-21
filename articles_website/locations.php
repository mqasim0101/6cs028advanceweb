<?php
//session_start();
     require("website_connect.php");
     //include("webapi.php");
?>
<!Doctype html>
<html lang="en">
    <head>
        <!-- Manual style -->
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title id="title2">Display Products: </title>
    </head>
    <body>
        <h1>View articles locations List Here: </h1>
        <p>Here you can view all the Articles here available: </p>
        <!--- table bootstrap here: -->
        <div id="">
            <table class = "table" id="table1">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Article Name</th>
                        <th scope="col">Location</th>
                        <th scope="col">Article Author</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            // select query:
            $sql_display = "Select * from `articles_location`";
            $result = mysqli_query($website_connect, $sql_display);
            while($row = mysqli_fetch_assoc($result)){
                $id=  $row['id'];
                $article_name= $row['article_name'];
                $location= $row['location'];
                $article_author= $row['article_author'];
                $date= $row['date'];
                echo '<tr>
                <th scope="row">'.$id.'</th>
                <td>'.$article_name.'</td>
                <td>'.$location.'</td>
                <td>'.$article_author.'</td>
                <td>'.$date.'</td>
                </tr>';
            }
            ?>
        </div>
                </tbody>
            </table>
            <br><br><br><br>
            <!-- Display message here: -->
            <button id="" class= "btn btn-outline-light"><a href="manage_articles.php">Looking for Adding/Modify/Deleting Articles! Click here:</a></button>
            <br><br>
            <button><a href="home.php">Back to Main</a</button>
    </body>
</html>