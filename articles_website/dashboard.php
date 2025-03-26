<?php
error_reporting(0);
//session_start();
include_once("website_connect.php"); // this file inclusion will make access to database phpmyadmin for details:
include("navigation_bar.php"); // this file included will make access to website navigation bar for user when in action:
include("access_level.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional Custom CSS for additional responsiveness -->
    <style>
        /* Custom responsive table styles */
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
    <!-- All the main code here: -->
    <h1>Dashboard</h1>
    <br><br>
    <!--- table bootstrap here: -->
    <div class="container my-5">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">user ID</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Registered Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // select query:
                    $sql_display = "Select * from `users`";
                    $result = mysqli_query($website_connect, $sql_display);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id =  $row['id'];
                        $user_id = $row['user_id'];
                        $user_name = $row['user_name'];
                        $date = $row['date'];
                        echo '<tr>
                <th scope="row">' . $id . '</th>
                <td>' . $user_id . '</td>
                <td>' . $user_name . '</td>
                <td>' . $date . '</td>
                </tr>';
                    }
                    ?>
        </div>
    </div>
    </tbody>
    </table>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>

    <!-- Bootstrap 5 JS (Optional, but recommended) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <button class="btn btn-outline-secondary"><a href="home.php">Back to the Main Page:</a></button>
</body>

</html>