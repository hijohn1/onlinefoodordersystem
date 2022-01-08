<?php 
   session_start();

   include("functions/connection.php");
   include("functions/functions.php");
   checking($con);

   $id=$_GET['id'];
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

   <div style="margin:0 auto; height: 4%;"></div>
    <div style="margin:0 auto; width:1300px; min-width:1320px;">
   <div style="width: 1200px; min-width: 1200px; margin-top: 50px; margin-right:100px; float: right;"><h1 align="center">Orders detail</h1></div> 
      <div id="menugobutton">
     <a href="order.php" id="menugobutton"><h4>Go back</h4></a>
    </div>

   <p style="margin-left: 20px; font-size: 30px; margin-left:150px">User:
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
    </p>
    <?php
      $pickupquery="select * from forder where id=$id";
      $pickupresult= mysqli_query($con,$pickupquery);  
      $pickuprow= mysqli_fetch_assoc($pickupresult);

      if($pickuprow['deliveryorpickup']==1)
         echo "<p style=\"margin-left:20px;font-size:30px; color:red; margin-left:150px\">Picked up by the client.</p>";
      else if($pickuprow['deliveryorpickup']==0)
      {
          echo "<div style=\"height:40px \"><span style=\"margin-left:150px; font-size:30px; color:red;\">Delivered by us.<br></span></div>
                <div style=\"height:40px\"><span style=\"margin-left:150px; font-size:30px;\">Delivery Address: ".$pickuprow['deliveryaddress']."<br></span></div>
                <div style=\"height:40px\"><span style=\"margin-left:150px;font-size:30px;\">Phone: ".$pickuprow['deliveryphone']."<span><br></div>";
      }
    ?>    

   <table class="table1" style="width: 1000px; min-width: 1000px; margin-left: 150px;">
     <thead> 
        <tr>
          <th width="80px">Item</th>
          <th width="130px">Image</th>
          <th width="130px">Quantity</th>
          <th width="150px">Price</th>
        </tr>
     </thead>
       <?php
         $query="select * from dorder where orderid=$id";
         $result= mysqli_query($con,$query);

         while($row = mysqli_fetch_array($result))
         {
            ?>
                <tr>
                   <td align="center" height="100px"><?php echo $row['itemname'] ?></td>
                   <td align="center"><?php echo "<img src='../{$row['itemimage']}' width='130px'' height='130px'/>" ?></td>
                   <td align="center"><?php echo $row['qty'] ?></td>
                   <td align="center">$ <?php echo $row['price'] ?></td>
                  </td>
                </tr>
            <?php
         }
       ?> 
    </table> 
  </div>

</body>
</html>