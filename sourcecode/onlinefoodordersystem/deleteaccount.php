<?php
   session_start();
   include("admin/functions/connection.php");

   $currentuser=$_SESSION['username'];
   $currentuserid=$_SESSION['id'];

   if(isset($_POST['yes']))
   {
      $query="select * from forder where userid=$currentuserid and status=0";
      $result=mysqli_query($con,$query);
      $r=mysqli_fetch_assoc($result);
      $detailorderid=$r['id'];
      $query="delete from dorder where orderid=$detailorderid";
      mysqli_query($con,$query);

      $query="delete from forder where userid=$currentuserid and status=0";
      mysqli_query($con,$query);

      $query="delete from user where id=$currentuserid";
      mysqli_query($con,$query);
      header("Location:logout.php");
  }

   if(isset($_POST['no']))
   {
      header("Location:userdash.php");
   }

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
           <p align=left style="font-size: 80px;">Delete your account </p><br><br>
           <a href="userdash.php" style="text-decoration: none; font-size: 25px; color: #4D403D;">Go back</a>
         </div>
      </div>

    <br><br>


    <div id="deleteyouraccount" >
       <br>
       <form method="post">
         <p align="left" style="margin-left:30px">Are you sure you want to delete your account?</p>
         <br><br>
         <input type="submit" name="yes" value="Yes" style="border-radius: 100px; width: 80px; font-size:18px; border-color: yellow; background-color: yellow; color: red; margin-left: 220px">         
         <input type="submit" name="no" value="No" style="border-radius: 100px; width: 80px; font-size:18px; border-color: yellow; background-color: yellow; color: red; margin-left: 80px">
       </form>
    </div>
   <br><br><br><br><br><br><br><br>

   </body>
</html>

