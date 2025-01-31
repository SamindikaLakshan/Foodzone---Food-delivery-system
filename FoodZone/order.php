<?php include('head/header.php'); ?>


    <?php 
        if(isset($_GET['food_id']))
        {
            $food_id = $_GET['food_id'];
            $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //CHeck whether the data is available or not
            if($count==1)
            {
                //WE Have DAta
                //GEt the Data from Database
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
        
            }
            else
            {
                //header('location:'.SITEURL);
            }
        }
        
    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend style="color: aliceblue">Selected Food</legend>

                    <div class="food-menu-img">
                        <?php 
                        
                            //CHeck whether the image is available or not
                            if($image_name=="")
                            {
                                //Image not Availabe
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                                //Image is Available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }
                        
                        ?>
                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3 style="color:#f0f8ff"><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price" style="color:#f0f8ff">$<?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label" style="color:#f0f8ff">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>

                        <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                        
                    </div>

                </fieldset>
                
            </form>

            <?php 

                //CHeck whether submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    echo"login";

                   
                    $u_id=$_SESSION['user_id'];

                    $sql = "SELECT * FROM tbl_user WHERE user_id=$u_id";
                    $res = mysqli_query($conn, $sql);
                    
                    while ($row = $res->fetch_assoc()) {
                        $customer_name=$row["full_name"];
                        $customer_contact=$row["telephone"];
                        $customer_email=$row["email"];
                        $customer_address=$row["address"];
                    }


                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $_SESSION['price']=$price;
                    $_SESSION['qty']=$qty;

                    $total = $price * $qty; // total = price x qty 

                    $order_date = date("Y-m-d h:i:sa"); //Order DAte

                    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

                    $sql2 = "INSERT INTO tbl_order SET 
                        food = '$food',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address',
                        user_id=$u_id
                        
                    ";
                    $res2 = mysqli_query($conn, $sql2);
                    if($res2==true)
                    {
                        $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
                        header('location:'.SITEURL."payment/");
                    }
                    else
                    {
                        $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
                        header('location:'.SITEURL);
                    }

                }
                else{
                    //header('location:'.SITEURL."user_login/login.php");
                    //echo"login";
                }
            
            ?>

        </div>
    </section>

    <?php include('head/footer.php'); ?>