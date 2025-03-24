<?php
// declaring the variables here:
$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "6cs028_advanced_web";
// connect query:
$website_connect =  mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
// Connect to server/database
if (!$website_connect) {
  echo "Error";
  die;
} else {
  //echo "connected successfully! "; // connected successfully!
}

?>