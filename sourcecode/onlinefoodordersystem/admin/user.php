<?php 
   session_start();

   include("functions/connection.php");
   include("functions/functions.php");
   checking($con);
?> 

<html>

<head>
	<title>User</title>
   <link href="pages style/mainpage.css" rel="stylesheet">
</head>

<body>

   <div id="box1">
       <section id="text">Welcome administrator<a href="menu.php" id="menubutton">Menu</a><a href="order.php" id="orderbutton">Order</a><a href="user.php" id="userbutton">Users</a><a href="logout.php" id="logoutbutton">Sign out</a><section>
   </div>

   <div style="margin:0 auto; height: 4%;"></div>
   <div style="margin:0 auto; width:1300px; min-width:1320px;">
   <div id="box2"><h1 align="center">Accounts management</h1></div> 

   <div id="addanitem">
       <a href="addauser.php" id="addanitem"><h4>Add a user</h4></a>
   </div>
   <table class="table">
     <thead> 
        <tr>
          <th width="10%">Username</th>
          <th width="10%">Passowrd</th>
          <th width="10%">Email</th>
          <th width="10%">Phone</th>
          <th width="10%">Action</th>
        </tr>
     </thead>
       <?php
         $query="select * from user order by id asc";
         $result= mysqli_query($con,$query);

         while($row = mysqli_fetch_array($result))
         {
            ?>
                <tr>
                   <td align="center"><?php echo $row['username'] ?></td>
                   <td align="center"><?php echo $row['userpassword'] ?></td>
                   <td align="center"><?php echo $row['email'] ?></td>
                   <td align="center"><?php echo $row['phone'] ?></td>
                   <td align="center" id="deletebox">
                   <abbr title="Update the user account"><a href="functions/updateuser.php?update=<?php echo $row['id'] ?>" id="delete"><img src="../images/update.jpg" width="40px" height="40px"/></a></abbr>
                   <abbr title="Delete the user account"><a href="functions/deleteuser.php?delete=<?php echo $row['id'] ?>" id="delete"><img src="../images/delete.jpg" width="40px" height="40px"/></a></abbr></td>
                </tr>
            <?php
         }
       ?> 
    </table> 
</div>

</body>
</html>
