<?php 
   session_start();

   include("functions/connection.php");
   include("functions/functions.php");
   checking($con);
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
   <div style="width: 1300px; min-width: 1300px;   margin-top: 50px; margin-right:50px; float: right;"><h1 align="center">Orders management</h1></div> 

   <table class="table1" style="width: 1300px; min-width: 1300px;">
     <thead> 
        <tr>
          <th width="80px">User</th>
          <th width="120px">Email</th>
          <th width="130px">Phone</th>
          <th width="150px">Date</th>
          <th width="80px">Status</th>
          <th width="150px">Action</th>
        </tr>
     </thead>
       <?php
         $query="select * from forder where status=1 or status =-1 order by date desc ";
         $result= mysqli_query($con,$query);

         while($row = mysqli_fetch_array($result))
         {
            ?>
                <tr>
                   <td align="center" height="100px"><?php  $orderid=$row['id']; $username=$row['username']; echo $row['username'] ?></td>
                   <td align="center">
                     <?php
                        echo $row['accountemail'];
                     ?>    
                   </td>
                   <td align="center"><?php /*echo $r['phone']*/ echo $row['accountphone'];?></td>
                   <td align="center"><?php echo $row['date'] ?></td>
                   <td align="center">
                     <?php
                         if($row['status']==1)
                           echo "Pending";
                         else if($row['status']==-1)
                           echo "Confirmed";
                     ?>                         
                  </td>
                  <td align="center" id="deletebox">
                    <abbr title="Detail of the order"><a href="detailorder.php?id=<?php echo $row['id'] ?>"><img src="../images/detail.jpg" width="40px" height="40px"/></a></abbr>
                    <abbr title="Confirming the order"><a href="functions/checkorder.php?id=<?php echo $row['id'] ?>"><img src="../images/check.JPG" width="40px" height="40px"/></a></abbr>
                    <abbr title="Pending the order"><a href="functions/pendingorder.php?id=<?php echo $row['id'] ?>"><img src="../images/cross.JPG" width="40px" height="40px"/></a></abbr>
                    <abbr title="Payment information"><a href="paymentinfo.php?orderid=<?php echo $orderid;?>"><img src="../images/bank.JPG" width="40px" height="40px"/></a></abbr>
                    <abbr title="Delete the order"><a href="functions/deleteorder.php?id=<?php echo $row['id'] ?>"><img src="../images/delete.jpg" width="40px" height="40px"/></a></abbr>
                  </td>
                </tr>
            <?php
         }
       ?> 
    </table> 
  </div>

</body>
</html>
