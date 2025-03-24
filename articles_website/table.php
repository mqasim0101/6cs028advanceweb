<?php
session_start(); 
     include("website_connect.php");
     include("navigation_bar.php");
// Sample articles data array (typically this would come from a database)
$articles = [
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
];
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
    <div class="container mt-5">
        <!-- Responsive Table Options -->
        
        <!-- Option 1: Bootstrap's Responsive Table Class -->
        <h3>Basic Responsive Articles Table</h3>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th>Category</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $article): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($article['id']); ?></td>
                            <td><?php echo htmlspecialchars($article['title']); ?></td>
                            <td><?php echo htmlspecialchars($article['author']); ?></td>
                            <td><?php echo htmlspecialchars($article['date']); ?></td>
                            <td><?php echo htmlspecialchars($article['category']); ?></td>
                            <td>
                                <span class="badge <?php 
                                    echo $article['status'] === 'Published' 
                                        ? 'bg-success' 
                                        : 'bg-warning text-dark'; 
                                ?>">
                                    <?php echo htmlspecialchars($article['status']); ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Option 2: Responsive Stack Table -->
        <h3>Responsive Stack Articles Table</h3>
        <table class="table table-responsive-stack">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article): ?>
                    <tr>
                        <td data-label="ID"><?php echo htmlspecialchars($article['id']); ?></td>
                        <td data-label="Title"><?php echo htmlspecialchars($article['title']); ?></td>
                        <td data-label="Author"><?php echo htmlspecialchars($article['author']); ?></td>
                        <td data-label="Date"><?php echo htmlspecialchars($article['date']); ?></td>
                        <td data-label="Category"><?php echo htmlspecialchars($article['category']); ?></td>
                        <td data-label="Status">
                            <span class="badge <?php 
                                echo $article['status'] === 'Published' 
                                    ? 'bg-success' 
                                    : 'bg-warning text-dark'; 
                            ?>">
                                <?php echo htmlspecialchars($article['status']); ?>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap 5 JS (Optional, but recommended) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>