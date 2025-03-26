<?php
//session_start();
error_reporting(0);
include("website_connect.php");
include("navigation_bar.php");
include("access_level.php");
// 
//$id = $_POST['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST" || (isset($_POST['delete']))) {
    $id = $_POST['id'];
    if (!empty($id)) {
        $sql_delete = "delete from `articles` where id = $id";
        $result = mysqli_query($website_connect, $sql_delete);
        // Save the query:
        // Check if query worked:
        if ($result){
            echo "Record deleted successfully! ";
            header("Location: manage_articles.php");
        } else {
            echo "Error Adding records" . mysqli_error($website_connect); // Error adding the require:
            die; // to stop the code from continuing:
        }
    }
    mysqli_close($website_connect);
}
?>
<!Doctype html>
<html lang="en">

<head>
    <!-- Bootstrap style -->
    <!-- All meta tags link here: -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Delete article Form: </title>
    <link rel="stylesheet" type="text/css" href="style.css">
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
    <h1>Delete Your article Here: </h1>
    <br><br>
    <p>In here You will be able to delete your article onto the website: </p>
    <!-- Main Code starts from here: -->
    <button class="btn btn-seconadry m1-2"><a href="logout.php">Logout</a></button>
    <br><br>
    <!--Hello <?php //echo $user_data['user_name'];
                ?> -->
    <div id="box">
        <form name="form2" method="post">
            <!-- All form fields start from here: -->
            <label for="id">Article ID: </label>
            <input type="number" name="id" required autocomplete="off">
            <br><br>
            <!-- Buttons here below: -->
            <button type="submit" class="btn btn-primary" name="delete">Delete</button>
            <button type="reset" class="btn btn-secondary m1-2" name="reset5">Reset</button>
            <br><br><br><br>
            <!-- Option to go back to browse: -->
            <button><a href="display_articles.php">Click here to View Articles: </a></button>
        </form>
    </div>
</body>

</html>