<?
session_start();
     include("website_connect.php");
     // Checking the session ID:
     if($result->num_rows == 1){
        // user's ceredientials are vaild:
        $_SESSION['user_name'] = $user_name;
        setcookie('user_name', $user_name, time() + 3600);
        header("Location: welcome.php");
     }else{
        setcookie('user_name', $user_name, time() - 3600);
        header("Location: login_form.php");
     }
?>