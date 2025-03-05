<?php
     require("website_connect.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search Bar</title>
    <link rel="stylesheet" type="text/css" href="website_styling.css">
</head>
<body>
	<h1>Search Bar</h1>
	<div class="container my-5">
        <table class="table">
                <thead>
                    <tr>
                        <th scope="col">article ID</th>
                        <th scope="col">article Name</th>
                        <th scope="col">article Date</th>
                    </tr>
                </thead>
            <?php
            // checking the form method type:
            if(isset($_POST['submit_search'])){
                $search = mysqli_real_escape_string($website_connect, $_POST['search']);
                //$query = "select * from `articles` where id like '%$search%' or article_name like '%$search%'";
                $sql = "select * from `searchbar` where article_name like '%$search%'";
                $result = mysqli_query($website_connect, $sql);
                $result_check = mysqli_num_rows($result);
                // check if executed:
                if($result_check > 0){
                    //echo "Data Found! ";
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                        echo '<tbody>
                        <tr>
                        <td> '.$row['id'].'</td>
                        <td> '.$row['article_name'].'</td>
                        <td> '.$row['date'].'</td>
                        </tr>
                        </tbody>';
                    }
                }else{
                    echo "<h2 class=text-danger>Data Not Found! </h2>";
                    header("Location: home.php");
                }
            }
        }    
            ?>
            </div>
        </table>
    </div>
</body>
</html>