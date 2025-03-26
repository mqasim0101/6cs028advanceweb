<?php
include("website_connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Navbar</title>
</head>

<body>
  <!--
  <ul class="navbar">
    <li><a href="home.php">Home</a></li>
    <li><a href="display_articles.php">View articles</a></li>
    <li><a href="manage_articles.php">Manage articles</a></li>
    <li><a href="add_articles_form.php">Add articles</a></li>
    <li><a href="edit_articles_form.php">Modify articles</a></li>
    <li><a href="delete_articles_form.php">Remove articles</a></li>
    <li><a href="contact_us.php">Contact Us</a></li>
    <li><a href="login_form.php">Login</a></li>
    <li><a href="signup_form.php">Register</a></li>
    <li><a href="dashboard.php">Dashboard</a></li>
  </ul> -->
  <div class="row rows-cols-1 row-cols-md-2 g-4">
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #6a1b9a;">
      <div class="container-fluid">
        <a class="navbar-brand" href="home.php">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="display_articles.php">Read</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact_us.php">Support</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Articles Management
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="manage_articles.php">Articles Control Panel</a></li>
                <li><a class="dropdown-item" href="add_articles_form.php">Create</a></li>
                <li><a class="dropdown-item" href="edit_articles_form.php">Update</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="delete_articles_form.php">Delete</a></li>
              </ul>
            </li>
            <!-- Account Sign in and Signup info below: -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Dashboard
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="dashboard.php">Users Info</a></li>
                <li><a class="dropdown-item" href="login_form.php">Login</a></li>
                <li><a class="dropdown-item" href="signup_form.php">Sign Up</a></li>
              </ul>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <br>
  <div><!-- Search bar Below -->
          <form class="d-flex" role="search" method="post" action="search.php">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit" name="submit_search">Search</button>
          </form>
        </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>