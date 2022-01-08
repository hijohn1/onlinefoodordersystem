<?php 
   session_start();

   include ("functions/connection.php");
   include ("functions/functions.php");
   checking($con);
?> 

<html>

<head>
	<title>Management</title>
   <link href="pages style/mainpage.css" rel="stylesheet">
</head>

<body>
     <div id="box1">
       <section id="text">Welcome administrator<a href="menu.php" id="menubutton">Menu</a><a href="order.php" id="orderbutton">Order</a><a href="user.php" id="userbutton">Users</a><a href="logout.php" id="logoutbutton">Sign out</a></section>
     </div>

     <div style="margin:0 auto; height: 4%;"></div>
     <div style="margin:0 auto; width:1300px; min-width:1320px;">
     <div id="box2"><h1 align="center" >Menu management</h1></div> 

   <div id="buttons">
      <div id="addanitem">
           <a href="addacategory.php" id="addanitem"><h4>Add a new category</h4></a>      
      </div>
   </div>

   <div style="margin: 0 auto;">
   <table class="table">
     <thead> 
        <tr>
          <th width="80px">Category name</th>
          <th width="80px">Image</th>
          <th width="100px">Action</th>
        </tr>
     </thead>
       <?php
         $query="select * from category order by id asc";
         $result= mysqli_query($con,$query);

         while($row = mysqli_fetch_array($result))
         {
            ?>
                <tr>
                   <td align="center"><?php echo $row['name'] ?></td>
                   <td align="center"><?php echo "<img src='../{$row['image']}' width='150px'' height='150px'/>" ?></td>
                   <td align="center" id="detailbox"><abbr title="Detail of the category"><a href="detail.php?detail=<?php echo $row['id'] ?>" id="detail"><img src="../images/detail.jpg" width="40px" height="40px"/></a></abbr>
                   <abbr title="Update the category"><a href="functions/update.php?update=<?php echo $row['id'] ?>" id="update"><img src="../images/update.jpg" width="40px" height="40px"/></a></abbr>
                   <abbr title="Delete the category"><a href="functions/deletecategory.php?delete=<?php echo $row['id'] ?>" id="delete"><img src="../images/delete.jpg" width="40px" height="40px"/></a></abbr></td>
                </tr>
            <?php
         }
       ?> 
    </table>
    </div> 
    <br><br>
</div>
</body>
</html>
