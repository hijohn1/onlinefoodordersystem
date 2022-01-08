<?php 
   session_start();

   include("functions/connection.php");
   include("functions/functions.php");
   checking($con);

   $id=$_GET['orderid']
?> 

<html>

<head>
	<title>Management</title>
   <link href="pages style/mainpage.css" rel="stylesheet">
</head>

<body>

   <div id="box1">
       <section id="text">Welcome administrator<a href="menu.php" id="menubutton">Menu</a><a href="order.php" id="orderbutton">Order</a><a href="user.php" id="userbutton">Users</a><a href="logout.php" id="logoutbutton">Sign out</a><section>
   </div>

    <div style="margin:0 auto; height: 8%;"></div>
    <div style="margin:0 auto; width:1300px; min-width:1320px;">
   
   <div style="width: 1000px;margin-top: 30px; margin-left: 190px; font-size: 30px; text-align: center;">User:
    <?php 
      $userquery="select * from forder where id=$id";
      $userresult= mysqli_query($con,$userquery);
      $user = mysqli_fetch_array($userresult);
      echo $user['username'];
    ?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    Amount:
    <?php 
      $amountquery="select * from dorder where orderid=$id";
      $amountresult= mysqli_query($con,$amountquery);  
      $qtyamount=0;    
      $total=0;

      while($amount = mysqli_fetch_array($amountresult))
      {
        $qtyamount=$amount['qty'] * $amount['price'];
        $total += $qtyamount;
      }

      echo "$".$total;
    ?>    
   </div><br>
  
   <div id="paymentbox" >
    <div style="height:3px"></div>
    <p align="center">Payment info.</p>

     <?php
         $query="select * from forder where id=$id";
         $result= mysqli_query($con,$query);

         $row = mysqli_fetch_array($result);
     ?>
         <p align="left" style="margin-left:30px">Name : <?php echo $row['cardname'] ?></p>
         <p align="left" style="margin-left:30px">Card No.: <?php echo $row['bankinfo'] ?></p>
         <p align="left" style="margin-left:30px">Address: <?php echo $row['address'] ?></p>
         <p align="left" style="margin-left:30px">Phone: <?php echo $row['phone'] ?></p>
         <p align="left" style="margin-left:30px">Email: <?php echo $row['email'] ?></p>

     <div id="paymentgobutton">
       <a href="order.php" id="paymentgobutton">Go back</a>
     </div>
   </div>
</div>
   <br><br>

</body>
</html>