
<?php include('head/header.php'); ?>


<link href="user_login/profile.css" rel="stylesheet" >

<body>
    
<div class="container mt-5" style="display: flex; justify-content: left;">

    <div class="card p-3">

        <div style="display: flex; align-items: center;">

            <div class="image">
                <img src="images/user.png" class="rounded" width="120">
                <h3 style="margin-bottom: 0; margin-top: 10;"><?php echo $_SESSION['user_name']?></h3>
                <span ><?php echo $_SESSION['email']?></span>
            </div>

            <div style="margin-left: 70px; width: 100%;">

                
            <h2>Order Summery</h2>
    

    <?php oderData($conn);?>


</table>


            </div>

        </div>

    </div>

</div>

</body>




<?php 
        function oderData($con){
        $u_id=$_SESSION['user_id'];
        $sql = "SELECT * FROM tbl_order WHERE user_id='$u_id'";
        $res = mysqli_query($con, $sql);
        $count=mysqli_num_rows($res);
         if($count>=1){
            echo"<table style='margin-top:50px'>
            <tr>
            <th>Food</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Address</th>
            <th>Date</th>
            <th>Status</th>
            <th>Order</th>
        </tr>";
            while ($row = $res->fetch_assoc()) {
                echo"<tr>";
                echo"<td>$row[food]</td>";
                echo"<td>$row[price]</td>";
                echo"<td>$row[qty]</td>";
                echo"<td>$row[total]</td>";
                echo"<td>$row[customer_address]</td>";
                echo"<td>$row[order_date]</td>";
                echo"<td>$row[status]</td>";
                if($row['status']=="Ordered") {
                    echo"<td><form method='POST'><input type='submit' name='cancel' value='Cancel'> <input type='hidden' name='o_id' value='$row[id]' ></form></td>";
                }
                else{
                    echo"<td><button class='d_btn'>Cancel</button> </td>";
                }
                echo"</tr>";
               
            }
         }
         else{
            echo "No orders available.";
         }
        }
         
    ?>

    <?php
    if(isset($_POST['cancel']))
        {
        
        //echo $_POST['o_id'];
        $O_id=$_POST['o_id'];
        $sql = "UPDATE tbl_order SET status='Cancelled' WHERE id=$O_id";
        $res = mysqli_query($conn, $sql);

        }
    ?>
    <?phpheader('location:'.SITEURL.'profile.php');?>