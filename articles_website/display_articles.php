<?php
     include("website_connect.php"); // to connect it to the database:
     include("navigation_bar.php"); // to connect to navigation bar:
     include("webapi.php");
//     include("locations.php");
//     include("advance_search_form.php"); 
//     include("search_form.php");
?>
<!Doctype html>
<html lang="en" id="">
    <head id="">
        <!-- Manual style -->
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title id="title2">Display Products: </title>
    </head>
    <body id="">
        <h1>View Your Products Here: </h1>
        <p>Here you can view all the Articles here available: </p>
        <!--- table bootstrap here: -->
        <div id="">
            <table class = "table" id="table1">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Articles Name</th>
                        <th scope="col">Articles Overview</th>
                        <th scope="col">Articles Description</th>
                        <th scope="col">Articles Author</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            // select query:
            $sql_display = "Select * from `articles`";
            $result = mysqli_query($website_connect, $sql_display);
            while($row = mysqli_fetch_assoc($result)){
                $id=  $row['id'];
                $article_name= $row['article_name'];
                $article_overview= $row['article_overview'];
                $article_description= $row['article_description'];
                $article_author= $row['article_author'];
                $date= $row['date'];
                echo '<tr>
                <th scope="row">'.$id.'</th>
                <td>'.$article_name.'</td>
                <td>'.$article_overview.'</td>
                <td>'.$article_description.'</td>
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
    </body>
</html>