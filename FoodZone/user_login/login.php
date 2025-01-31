<?php include('../config/config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles_login.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="image_column">
                <img src="login2.jpg" alt="image" class="loginImg">
            </div>
            <div class="form_column">
                <form action="" method="POST" class="form">                    
                        <h1>Customer Login</h1>
                        <div class="input-group">                        
                            <input class="input_fields" type="text" placeholder="Enter Email" name="email">
                        </div>
                        <div class="input-group">
                            <input class="input_fields" type="password" placeholder="Enter Password" name="password">
                        </div>
                        <div class="for_btn">
                            <button class="btn_submit" type="submit" name = "sub">Login</button>
                            <button class="btn_clear" type="reset">Clear</button>
                        </div>
                        <div class="validate_reg">
                        <?php
    if(isset($_POST['sub']))
    {
        if(!empty($_POST['email']) && $_POST['password']){

            $username = mysqli_real_escape_string($conn, $_POST['email']);
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);
        $sql = "SELECT * FROM tbl_user WHERE email='$username' AND pwd='$password'";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if($count==1)
        {
            $sql = "SELECT user_id,full_name FROM tbl_user WHERE email='$username' AND pwd='$password'";
            $res = mysqli_query($conn, $sql);
            while ($row = $res->fetch_assoc()) {
                $_SESSION['user_id']=$row["user_id"];
                $_SESSION['user_name']=$row['full_name'];
            }
            
            $_SESSION['login-user'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['email'] = $username; 
            header('location:'.SITEURL);
        }
        else
        {
            // $_SESSION['login-user'] = "<div class='error text-center'>Username or Password did not match.</div>";
            // header('location:'.SITEURL.'user_login/login.php');
            $sql = "SELECT user_id FROM tbl_user WHERE email='$username'";
            $res = mysqli_query($conn, $sql);

                echo"<p style='color:red;'>Invalid password or username.</p>";

            
        }

        }
        else{
            echo"<p style='color:red;'>Please fill the all field.</p>";
        }


    }?>
                                    
                                    <p class="reg-link">Don't have an account? <a href="register.php">Register</a></p>
                        </div>  
                        <div>
                            
                        </div>
                        
                </form>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="styles_login.js"></script> <!-- Include JS file -->
</body>
</html>


    



