<?php
    include("website_connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search Data</title>
    <link rel="stylesheet" type="text/css" href="website_styling.css">
</head>

<body>
    <h3>Use the Search bar to search your favourite movies</h3>
    <br><br>
    <div class="container my-5">
        <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Article ID</th>
                        <th scope="col">Article Name</th>
                        <th scope="col">Article Author</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <?php
			  if(isset($_GET['article_name_search']) && isset($_GET['article_author_search'])){
				$article_name_search = $_GET['article_name_search'];
				$article_author_search = $_GET['article_author_search'];

				// create the query:
				$query = "select * from `advancesearchbar` where article_name_search like '%$article_name_search%' and  article_author_search like '%$article_author_search%'";
				$result = mysqli_query($website_connect, $query);

				if(mysqli_num_rows($result) > 0){
					foreach($result as $row){
                        echo '<tbody>
                        <tr>
                        <td> '.$row['id'].'</td>
                        <td> '.$row['article_name_search'].'</td>
                        <td> '.$row['article_author_search'].'</td>
                        </tr>
                        </tbody>';
					}
				}else{
					echo "No record found!";
				}
			  }
			?>
            </div>
        </table>
    </div>
    <button class="btn btn-primary"><a href="home.php">Back To Main Page:</a></button>
</body>
</html>