
<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>
<body>

<div class="container">

    <form action="" method="POST">

        <div class="row">

            
            <div class="col">

                <h3 class="title">payment</h3>

                <div class="inputBox">
                    <span>cards accepted :</span>
                    <img src="card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" placeholder="mr. john deo" name='name'>
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="number" placeholder="1111-2222-3333-4444" name='number'>
                </div>
                <div class="inputBox">
                    <span>exp month :</span>
                    <input type="number" placeholder="month number" name='month'>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number" placeholder="2022" name='year'>
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="number" placeholder="123" name='cvv'>
                    </div>
                </div>

            </div>
    
        </div>

        <input type="submit" value="proceed to checkout" class="submit-btn" name="order">

    </form>

    <div>

        <h2 style="margin-left:50px">Order Summery</h2>
        <label  style="margin-left:50px">Unit price  $<?php  echo$_SESSION['price'];?></label><br>
        <label  style="margin-left:50px">Quantity <?php  echo$_SESSION['qty'];?></label><br>
        <label  style="margin-left:50px">Total $<?php  echo$_SESSION['price']*$_SESSION['qty'];?></label>

        <?php 

    if(isset($_POST['order'])){
        $name=$_POST['name'];
        $number=$_POST['number'];
        $month=$_POST['month'];
        $year=$_POST['year'];
        $cvv=$_POST['cvv'];

        if(!empty($name)&&!empty($number)&&!empty($month)&&!empty($year)&&!empty($cvv))
        {
            $num_length = strlen((string)$number);
            if($num_length!=12){
                echo"<br><br><p style='color:red;margin-left:50px'>Not a valid card!</p>";
            }
            else{
                $current_year = date("Y");
                if ($year < $current_year || $year > ($current_year + 10)) {
                    echo "<br><br><p style='color:red;margin-left:50px'>Invalid card expiration year!</p>";
                }
                else{
                    if ($month < 1 || $month > 12) {
                        echo "<br><br><p style='color:red;margin-left:50px'>Invalid card expiration month!</p>";
                    }
                    else{
                        $num_length = strlen((string)$cvv);
                        if($num_length!=3)
                        {
                            echo "<br><br><p style='color:red;margin-left:50px'>Invalid card CVV</p>";
                        }
                        else{
                                header('location:../index.php');
                        }
                    }
                }
            }
            
        }
        else{
           
           echo"<br><br><p style='color:red;margin-left:50px'>Please fill the all fields.</p>";
        }
       
    }

?>

    </div>

    

</div>    
    
</body>
</html>


