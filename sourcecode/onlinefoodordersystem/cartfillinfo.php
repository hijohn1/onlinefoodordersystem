<?php
   session_start();
   include("admin/functions/connection.php");

   $amount=$_GET['amount'];
   $forderid=$_GET['forderid'];
   $currentuserid=$_SESSION['id'];
?>

<html>
   <head>
      <title>cart</title>
      <link href="pages style/cart.css"  rel="stylesheet" />
   </head>

   <body>
        <?php include("header.php"); ?>
        <div style="height: 15%;"></div>  
        <div id=cart>
         <br>
          <div id=insidecart>
                <?php
                    $username=$_SESSION['username'];
                    $query = "select * from forder where username=$username and status=0 " ;
                    $result = mysqli_query($con, $query); 
                    $r = mysqli_fetch_array($result);
                    $forderid=$r['id'];

                    $query = "select * from dorder where orderid=$forderid" ;
                    $result = mysqli_query($con, $query); 
                    $r = mysqli_fetch_array($result);
                      

                    if($r)
                    {
                        echo "<p align=\"left\" id=cartf1>Please fill in your credit/debit card info.And tell us how to deliver your order.</p><br>";
                        echo "<p id=cartamount>Total amount: $".$amount."</p>";
                    }
                    else
                    {
                        header("Location:users.php");
                    }
              ?>
          </div>
        </div>
         <div style="height: 5%;"></div>   

            <?php 

              $star="";
              $emailalert="";
              $phonealert="";
              $cardalert="";
              $deliveryphonealrt="";
              $deliveryaddressalrt="";

              if(isset($_POST['submit']))
              {
                 $name=$_POST['name'];
                 $phone=$_POST['phone'];
                 $address=$_POST['address'];
                 $email=$_POST['email'];
                 $card=$_POST['card'];
                 $pick=$_POST['pick'];
                 $pickway=0;
                 $pickdeliveryset=0;
            
                 if($pick=="pickyourself")
                 {
                    $pickway=1;
                    $pickdeliveryset=1;
                 }
                 else if($pick=="delivery")
                 {
                    $deliveryphone=$_POST['deliveryphone'];
                    $deliveryaddress=$_POST['deliveryaddress'];

                    if(empty($deliveryphone) || empty($deliveryaddress))
                    {
                        $star="Phone and address are required for delivery.";
                    }
                    else
                    {
                        if (!is_numeric($deliveryphone))
                            $deliveryphonealrt = "<span id=phone>Invalid phone format!</span><br>";
                        else
                        {
                            $deliveryphonealrt="";
                            $pickdeliveryset=1;
                        }
                    }
                 }

                 if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                    $emailalert = "<span id=email>Invalid email format!</span><br>";
                 else
                    $emailalert="";

                 if (!is_numeric($phone))
                    $phonealert = "<span id=phone>Invalid phone format!</span><br>";
                 else
                    $phonealert="";

                 if (!is_numeric($card))
                     $cardalert = "<span id=card>Invalid card format!</span><br>";
                   else
                    $cardalert="";

                if (filter_var($email, FILTER_VALIDATE_EMAIL) && is_numeric($card) && is_numeric($card)&&$pickdeliveryset==1)
                {
                    $accountemail="";
                    $accountphone="";
                    $query = "select * from user where id='$currentuserid' " ;
                    $result = mysqli_query($con, $query); 
                    $r=mysqli_fetch_assoc($result);
                    $accountemail=$r['email'];
                    $accountphone=$r['phone'];

                    date_default_timezone_set('America/New_York');
                    $date = date('Y-m-d H:i:s');
                    $query = "update forder set cardname='$name', phone='$phone', address='$address', email='$email', bankinfo='$card', date='$date', accountemail='$accountemail', accountphone='$accountphone', deliveryorpickup='$pickway', deliveryaddress='$deliveryaddress', deliveryphone='$deliveryphone',status=1 where id='$forderid';";
                    mysqli_query($con, $query); 
                    header("Location:thank.php");
                }  
             }

       ?>
         <div style="width: 1340px; margin:0 auto">  
        <form method="post">
          <div id=payinfo >
            <br> 
            <p style="font-size: 25px; margin-left: 20px;">Card info.</p><br>
            <div id=payinfo1>
                <p >Name: <input type="text" name="name" required="required"/></p><br>
                <p >Phone: <input type="text" name="phone" required="required"/></p><?php echo $phonealert; ?><br>
                <p >Address: <input type="text" name="address" required="required"/></p><br>
                <p >Email: <input type="text" name="email" required="required"/></p><?php echo $emailalert; ?><br>
                <p >Credit/debit card No.: <input type="text" name="card" required="required"/></p><?php echo $cardalert; ?><br>
            </div>
           </div> 

           <div id=deliveryinfo > 
            <br>
            <p style="font-size: 25px; margin-left: 20px;">Pickup info.</p><br>
            <div id=deliveryinfo1>
                <p><input type="radio" name="pick" value="pickyourself" required="required"/> Pick up yourself.</p><br><br>
                <p><input type="radio" name="pick" value="delivery"/> Delivered by us.</p><br>
                <p >Phone: <input type="text" name="deliveryphone" id="name"/></p><?php echo $deliveryphonealrt; ?><br>
                <p >Address: <input type="text" name="deliveryaddress" id="name"/></p><?php echo $deliveryaddressalrt ?><br>
                <p style="font-size: 20px; color: red;"><?php echo $star;?></p>
            </div>
         </div>
         <br><br>
         <input type="submit" name="submit" value="Confirm" id="confirm" style="margin-left: 630px;margin-top: 30px;"><br><br>
        </form>
       </div>
            
          
          <br><br><br><br>

   </body>
</html>

