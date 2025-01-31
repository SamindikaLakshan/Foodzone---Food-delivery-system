<?php include('../config/config.php'); ?>
<?php include('../head/header.php'); ?>


<link href="profile.css" rel="stylesheet" >

<div class="container mt-5" style="display: flex; justify-content: center;">

    <div class="card p-3">

        <div style="display: flex; align-items: center;">

            <div class="image">
                <img src="../images/user.png" class="rounded" width="120">
            </div>

            <div style="margin-left: 30px; width: 100%;">

                <h2 style="margin-bottom: 0; margin-top: 10;"><?php echo $_SESSION['user_name']?></h2>
                <span><?php echo $_SESSION['email']?></span>


            </div>

        </div>

    </div>

</div>


<div class="tb">
<h2>Order Summery</h2>
<table>
    <tr>
        <th>Food</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Address</th>
        <th>Date</th>
        <th>Status</th>
        <th>Order</th>
    </tr>

    <?php oderData($conn);?>


</table>

</div>



<?php 
        function oderData($con){
        $u_id=$_SESSION['user_id'];
        $sql = "SELECT * FROM tbl_order WHERE user_id='$u_id'";
        $res = mysqli_query($con, $sql);
         while ($row = $res->fetch_assoc()) {
             echo"<tr>";
             echo"<td>$row[food]</td>";
             echo"<td>$row[price]</td>";
             echo"<td>$row[qty]</td>";
             echo"<td>$row[total]</td>";
             echo"<td>$row[customer_address]</td>";
             echo"<td>$row[order_date]</td>";
             echo"<td>$row[status]</td>";
             echo"<td><form method='POST'><input type='submit' name='cancel' value='Cancel'> <input type='hidden' name='o_id' value='$row[id]' ></form></td>";
             echo"</tr>";
            
         }
        }
         
    ?>

    <?php

        if(isset($_POST['cancel']))
        {
        
        //echo $_POST['o_id'];
        $O_id=$_POST['o_id'];
        $sql = "UPDATE tbl_order SET status='Canceled' WHERE id=$O_id ";
        $res = mysqli_query($conn, $sql);
        header('location:'.SITEURL.'user_login/profile.php');

        }

    ?>