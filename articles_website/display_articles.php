<?php
session_start();
include("website_connect.php");
include("navigation_bar.php");
// Sample articles data array (typically this would come from a database)
/*$articles = [
    [
        'id' => 1, 
        'title' => 'Introduction to Web Development', 
        'author' => 'Sarah Johnson', 
        'date' => '2024-03-15', 
        'category' => 'Technology',
        'status' => 'Published'
    ],
    [
        'id' => 2, 
        'title' => 'Machine Learning Basics', 
        'author' => 'Alex Rodriguez', 
        'date' => '2024-03-20', 
        'category' => 'Computer Science',
        'status' => 'Draft'
    ],
    [
        'id' => 3, 
        'title' => 'Sustainable Urban Planning', 
        'author' => 'Emma Williams', 
        'date' => '2024-03-22', 
        'category' => 'Urban Design',
        'status' => 'Published'
    ]
];*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Articles Table</title>

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
    <h1>View & Manage the articles Here: </h1>
    <p>Here you can view all the articles available: </p>
    <!--- table bootstrap here: -->
    <div class="container my-5">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <table class="table">
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
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id =  $row['id'];
                        $article_name = $row['article_name'];
                        $article_overview = $row['article_overview'];
                        $article_description = $row['article_description'];
                        $article_author = $row['article_author'];
                        $date = $row['date'];
                        echo '<tr>
                <th scope="row">' . $id . '</th>
                <td>' . $article_name . '</td>
                <td>' . $article_overview . '</td>
                <td>' . $article_description . '</td>
                <td>' . $article_author . '</td>
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
    <br><br>
    <button class="btn btn-outline-secondary"><a href="home.php">Back to the Main Page:</a></button>
</body>

</html>