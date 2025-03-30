<?php
/*
include("website_connect.php");
//include("navigation_bar.php");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$host = "localhost";  // Change if your database is on another server
$db_name = "6cs028_advanced_web";  // Your actual database name
$username = "root";  // Your database username
$password = "";  // Your database password

try {
    $website_connect = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $website_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)
    // Simple query to get articles with most views in the last week
    $query = "select a.id, a.title, SUM(v.view_count) as total_views 
              from articles a
              JOIN article_views v ON a.id = v.article_id
              WHERE v.view_date >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
              GROUP BY a.id, a.title
              ORDER BY total_views DESC
              LIMIT 5";

    $stmt = $websie_connect->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Output JSON
    echo json_encode($result);
} catch (PDOException $e) {
    // Return error message
    echo json_encode(array("error" => "Database error: " . $e->getMessage()));
}*/
?>