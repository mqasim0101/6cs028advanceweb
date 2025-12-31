<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->include('templates/navbar') ?>
    <title><?= esc($title ?? 'Authentication') ?> - News Website</title>
    
    <!-- Bootstrap CSS or your preferred CSS framework -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
        }
        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .auth-card {
            max-width: 450px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <?= $this->renderSection('content') ?>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>