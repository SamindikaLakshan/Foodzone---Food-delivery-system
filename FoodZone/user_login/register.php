<?php include('../config/config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles_reg.css">
</head>
<body>
    <?php
    //echo "Loading register"
    ?>
    <div class="fullDiv">
        <div>
            <h1 class="header">Register</h1>
        </div>
        <div>
            <form action="" method="POST">
                <div class="form-section" id="name_email_address">
                    <label class="form-label">Full Name</label>
                    <input class="form-control" type="text" name="name">
                    <label class="form-label">E-mail Address</label>
                    <input class="form-control" type="text" name="email">
                    <label class="form-label">Password</label>
                    <input class="form-control" type="password" name="password">
                    <label class="form-label">Address</label>
                    <input class="form-control" type="text" name="address">
                </div>
                <div class="form-section" id="postal_num_dob">
                    <label class="form-label text-start">Mobile Number</label>
                    <input class="form-control" type="text" name="tele">
                </div>
                <div id="buttons">
                    <button class="btn btn-primary" type="submit" name = "sub">Register</button>
                    <button class="btn btn-success" type="reset">Clear</button>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <?php
        if(isset($_POST['sub'])){
            $Name = $_POST['name'];
            $Email = $_POST['email'];
            $Password = $_POST['password'];
            $Address = $_POST['address'];
            $Tele = $_POST['tele'];

            $isMobileNumber = '/^\d{10}$/';

            if (empty($Name) || empty($Email) || empty($Password) || empty($Address) || empty($Tele)) {
                echo "<script>alert('All fields are required.');</script>";
            }
            elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>alert('Enter Valid Email Address.');</script>";
            }
            elseif(!is_numeric($Tele)){
                echo "<script>alert('Enter only numbers to telephone number');</script>";
            }
            elseif(!preg_match($isMobileNumber,$Tele)){
                echo "<script>alert('Telephone number should be 10 degits!.');</script>";
            }
            elseif(strlen($Password)<8){
                echo "<script>alert('Enter more than 8 characters for password!.');</script>";
            }
            elseif(!preg_match('/^[A-Za-z0-9!@#$%^&*()\-_=+{};:,<.>]+$/',$Password)){
                echo "<script>alert('Password must be letters, numbera and symbols!.');</script>";
                
            }
            else{
                $sql = "INSERT INTO tbL_user(full_name,email,pwd,address,telephone) VALUES ('$Name','$Email',md5('$Password'),'$Address','$Tele');";
                $result = mysqli_query($conn, $sql);
                if($result){
                    echo "<script>window.location.href = 'login.php';</script>";

                }else{
                    echo "<script>alert('Data Insert Unsuccessful ! ');</script>";
                }
            }
        }
    ?>
</body>
</html>