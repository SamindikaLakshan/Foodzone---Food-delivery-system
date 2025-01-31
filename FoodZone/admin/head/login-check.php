<?php 
if(!isset($_SESSION['login-admin'])) 
    {
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access Admin Panel.</div>";
        header('location:'.SITEURL.'admin/login.php');
    }

?>