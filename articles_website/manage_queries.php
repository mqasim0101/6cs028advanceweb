<?php
session_start();
     require("website_connect.php");
     include("index.php");
     include("navigation_bar.php");
     include("bootstrap.php");
?>
<Doctype html>
<html>
    <head>
        <!-- Manual style -->
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Manage queries: </title>
    </head>
    <body>
        <h1>View Your support Here: </h1>
        <p>Here you can view all the support available: </p>
        <!--- table bootstrap here: -->
        <div class="container my-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User Contacted Name</th>
                        <th scope="col">Query Or Question About</th>
                        <th scope="col">Query Date</th>
                        <th scope="col">Type</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            // select query:
            $sql_display = "Select * from `support`";
            $result = mysqli_query($website_connect, $sql_display);
            while($row = mysqli_fetch_assoc($result)){
                $id=  $row['id'];
                $user_contacted= $row['user_contacted'];
                $query_or_question= $row['query_or_question'];
                $date= $row['date'];
                $type= $row['type'];
                echo '<tr>
                <th scope="row">'.$id.'</th>
                <td>'.$user_contacted.'</td>
                <td>'.$query_or_question.'</td>
                <td>'.$date.'</td>
                <td>'.$type.'</td>
                <td>
                   <a href="edit_queries_form.php" class="btn btn-info">Update queries</a>
                   <a href="delete_queries_form.php" class="btn btn-danger">Delete queries</a>
                   <a href="add_queries_form.php" class="btn btn-success">Add queries</a>
                </td>
                </tr>';
            }
            ?>
        </div>
                </tbody>
            </table>
            <br><br><br><br><br>
            <button><a href="edit_queries_form.php" class="btn btn-info">Click here to Update Your Review</a></button>
            <button><a href="delete_queries_form.php" class="btn btn-danger">Click here to Delete Your Review</a></button>
            <button><a href="add_queries_form.php" class="btn btn-success">Click here to Add another Review</a></button>
    </body>
</html>