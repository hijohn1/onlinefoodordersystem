<?php
   session_start();
   include("admin/functions/connection.php");

   $orderid=$_GET['orderid'];
   $date=$_GET['date'];
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
           <p align=left style="font-size: 80px;">Detail of your order </p><br><br>
           <a href="userorderhistory.php" style="text-decoration: none; font-size: 25px; color: #4D403D;">Go back</a>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <span style="font-size:25px; color: #4D403D;">Order date: <?php echo $date; ?> </span>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <span style="font-size:25px; color: #4D403D;">Amount: $<?php
                             $amountquery="select * from dorder where orderid=$orderid";
                             $amountresult= mysqli_query($con,$amountquery);  
                             $qtyamount=0;    
                             $total=0;

                             while($amount = mysqli_fetch_array($amountresult))
                             {
                                   $qtyamount=$amount['qty'] * $amount['price'];
                                   $total += $qtyamount;
                             }

                             echo $total; 

                             $pickupquery="select * from forder where id=$orderid";
                             $pickupresult= mysqli_query($con,$pickupquery);  
                             $pickuprow= mysqli_fetch_assoc($pickupresult);

                             if($pickuprow['deliveryorpickup']==1)
                                echo "<br><br><p style=\"margin-left:350px; font-size:40px;\">Pick up by yourself.</p><br>";
                             else if($pickuprow['deliveryorpickup']==0)
                             {
                                echo "<br><br><p style=\"margin-left:350px; font-size:40px;\">Delivered by us.</p>";
                                echo "<br>Delivery Address: ".$pickuprow['deliveryaddress']."<br>";
                                echo "<br>Phone: ".$pickuprow['deliveryphone']."<br><br>";
                             }


                         ?> 
            </span>
         </div>
      </div>

    <br><br>
    <table class="detailtable">
    <thead> 
        <tr>
          <th width="80px" style="font-size:20px;">Image<br><br></th>
          <th width="130px" style="font-size:20px;">Item<br><br></th>
          <th width="130px" style="font-size:20px;">Quantity<br><br></th>
          <th width="150px" style="font-size:20px;">Price<br><br></th>
        </tr>
     </thead>    
    <?php 
      $query="select * from dorder where orderid=$orderid order by id desc ";
      $result= mysqli_query($con,$query);
      
      while($row = mysqli_fetch_array($result))
      {
    ?>
        <tr >
           <td align="center"><?php echo "<img src='{$row['itemimage']}' width='130px'' height='130px'/>" ?><br><br></td>
           <td align="center" width="300px" height="80px" style="font-size:20px;"><?php echo $row['itemname'] ?><br><br></td>
           <td align="center" width="300px" height="80px" style="font-size:20px;"><?php echo $row['qty'] ?><br><br></td>
           <td align="center" width="300px" height="80px" style="font-size:20px;">$<?php echo $row['price'] ?><br><br></td>
            <?php
         }
            ?>
        </table>
        <br><br><br><br>

   </body>
</html>

