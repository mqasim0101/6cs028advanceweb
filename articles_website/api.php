<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "6cs028_advanced_web";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $result = $conn->query("select * from articles order by id desc limit 10");
        $articles = [];
        while ($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }
        echo json_encode($articles);
        break;

    case 'POST':
        $input = json_decode(file_get_contents('php://input'), true);
        $title = $input['title'];
        $content = $input['content'];
        $conn->query("insert into `articles` (title, content) values ('$title', '$content')");
        echo json_encode(["message" => "Article added successfully"]);
        break;

    default:
        echo json_encode(["message" => "Invalid request method"]);
        break;
}

$conn->close();
?>