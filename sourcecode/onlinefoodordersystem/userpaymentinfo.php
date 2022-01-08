<?php
   session_start();
   include("admin/functions/connection.php");

   $orderid=$_GET['orderid']
?>

<html>
   <head>
      <title>Your dashboard</title>
      <link href="pages style/dashboard.css"  rel="stylesheet" />
   </head>

   <body>
      <?php include("header.php"); ?>
      <br><br><br><br><br>
      <div id=box0>
       <br>
         <div id=box1>
           <p align=left style="font-size: 80px;">Payment info. </p><br><br>
           <a href="userorderhistory.php" style="text-decoration: none; font-size: 25px; color: #4D403D;">Go back</a>
         </div>
      </div>

    <br><br>
    <?php 
      $user=$_SESSION['username'];
      $query="select * from forder where id=$orderid";
      $result= mysqli_query($con,$query);
      $row=mysqli_fetch_array($result);

    ?>

    <div id="paymentbox" >
     <?php
         $query="select * from forder where id=$orderid";
         $result= mysqli_query($con,$query);
         $row = mysqli_fetch_array($result);
     ?>
         <br>
         <p align="left" style="margin-left:30px">Name : <?php echo $row['cardname'] ?></p><br>
         <p align="left" style="margin-left:30px">Card No.: <?php echo $row['bankinfo'] ?></p><br>
         <p align="left" style="margin-left:30px">Address: <?php echo $row['address'] ?></p><br>
         <p align="left" style="margin-left:30px">Phone: <?php echo $row['phone'] ?></p><br>
         <p align="left" style="margin-left:30px">Email: <?php echo $row['email'] ?></p><br>
   </div>
   <br><br>

   </body>
</html>

