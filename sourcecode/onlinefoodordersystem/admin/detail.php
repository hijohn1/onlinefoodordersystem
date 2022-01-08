<?php 
   session_start();

   include ("functions/connection.php");
   include ("functions/functions.php");
   checking($con);

   $category=$_GET['detail'];
   $query="select * from category where id=$category";
   $result=mysqli_query($con,$query);
   $r = mysqli_fetch_array($result);
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
   <div id="box2"><h1 align="center">Category: <?php echo $r['name']; ?></h1></div> 

   <div id="selection">
     <div id="addanitem">
        <a href="addanitem.php?detail=<?php echo $r['id']; ?>" id="addanitem"><h4>Add an item</h4></a>
     </div>
     <br><br><br><br><br>
     <div id="addanitem">
        <a href="menu.php" id="addanitem"><h4>Go back</h4></a>
     </div>
   </div>

   <table class="table">
     <thead> 
        <tr>
          <th width="80px">Foodname</th>
          <th width="80px">Image</th>
          <th width="80px">Description</th>
          <th width="80px">Price</th>
          <th width="100px">Action</th>
        </tr>
     </thead>
       <?php
         $query="select * from menu where category=$category order by id asc";
         $result= mysqli_query($con,$query);

         while($row = mysqli_fetch_array($result))
         {
            ?>
                <tr>
                   <td align="center"><?php echo $row['foodname'] ?></td>
                   <td align="center"><?php echo "<img src='../{$row['foodimage']}' width='150px'' height='150px'/>" ?></td>
                   <td align="left"><?php echo $row['description'] ?></td>
                   <td align="center">$<?php echo $row['price'] ?></td>
                   <td align="center" id="updatebox"><abbr title="Update the item"><a href="functions/updatemenu.php?update=<?php echo $row['id'] ?> & detail=<?php echo $r['id'] ?>" id="update"><img src="../images/update.jpg" width="40px" height="40px"/></abbr></a>
                   <abbr title="Delete the item"><a href="functions/deleteitem.php?delete=<?php echo $row['id'] ?> & detail=<?php echo $r['id'] ?>" id="delete"><img src="../images/delete.jpg" width="40px" height="40px"/></a></abbr></td>
                </tr>
            <?php
         }
       ?> 
    </table> 
 </div>
    <br><br>

</body>
</html>

