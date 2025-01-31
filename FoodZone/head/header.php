<?php include('config/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="Best Non Veg Food ordering website in India.">
     <meta name="keywords" content="Foodiilicious, Food Ordering">
     <meta name="author" content="Shavy">
     <link rel="icon" href="images/logo.png"  type = "image/x-icon">
    <title>Foodiilicious ~ Best Food Ordering Website</title>
    <style>
        .logBtn{
            background-color: black;
            color: white;
            padding: 10px;
            border-radius: 5px;
            
            
        }
        .logBtn:hover{
            background-color: white;
            border:solid 1px black;
        }
        #profile{
            width: 40px;
            height: 40px;
            margin-bottom:-13px;
            padding: 0px;
        }

        
    </style>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="<?php echo SITEURL; ?>" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>contact.php">Contact</a>
                    </li>
                    <li>
                        <?php 
                            if(isset($_SESSION['email'])){
                                    echo' <a class="logBtn" href="user_login/login.php" >Logout</a>';
                                    // echo"<form action=''  method='POST'>
                                    //     <input type='submit' value='Logout' name='logout'>
                                    // </form>";
                                    
                            }
                            else{
                                echo' <a class="logBtn" href="user_login/login.php" >Login</a>';
                                
                            }
                        ?>
                    </li>

                    <li style="margin: 0px 0px 0px 100px">
                        <?php 
                            if(isset($_SESSION['email'])){
                                    echo' <a href="profile.php" ><img src="images/user.png" id="profile" ></a>';
                            }
                        ?>
                    </li>

                    <li style="margin: 0px -100px 0px 0px">
                        <?php 
                            if(isset($_SESSION['email'])){
                                    echo $_SESSION['user_name'];
                            }
                        ?>
                    </li>

                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>



