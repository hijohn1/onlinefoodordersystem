<?php
   session_start();
   include("admin/functions/connection.php");
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
           <p align=left style="font-size: 80px;">Orders history </p><br><br>
           <a href="userdash.php" style="text-decoration: none; font-size: 25px; color: #4D403D;">Go back</a>
         </div>
      </div>

    <br><br>
    <?php 
      $user=$_SESSION['username'];
      $query="select * from forder where username=$user order by date desc ";
      $result= mysqli_query($con,$query);

      if($result)
      {
         echo "<table class=\"table1\">
               <thead> 
               <tr>
               <th width=\"300px\" style=\"font-size:25px;\">Date</th>
               <th width=\"150px\" style=\"font-size:25px;\">Action</th>
               </tr>
               </thead>";

         $query="select * from forder where username=$user and status=1 order by date desc ";
         $result= mysqli_query($con,$query);

         while($row = mysqli_fetch_array($result))
         {
            ?>
                <tr >
                   <td align="center" width="300px" height="80px" style="font-size:30px;"><?php echo $row['date'] ?></td>
                  <td align="center" width="300px" height="80px">
                    <abbr title="Detail of the order"><a href="userorder.php?orderid=<?php echo $row['id']; ?> & date=<?php echo $row['date'] ?>"><img src="images/detail.jpg" width="40px" height="40px"/></a></abbr>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <abbr title="Payment information"><a href="userpaymentinfo.php?orderid=<?php echo $row['id']?>"><img src="images/bank.JPG" width="40px" height="40px"/></a></abbr>
                  </td>
                </tr>
            <?php
         }
     echo "</table><br><br>";
    }
   ?> 

   </body>
</html>

