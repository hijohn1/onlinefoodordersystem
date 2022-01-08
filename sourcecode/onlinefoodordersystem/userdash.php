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
            <p align=left style="font-size: 80px;">Your dashboard </p><br><br>
            <a href="userorderhistory.php" style="text-decoration: none; font-size: 25px; color: #4D403D;">Orders history</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="personalinfo.php" style="text-decoration: none; font-size: 25px; color: #4D403D;">Personal info.</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="changepassword.php" style="text-decoration: none; font-size: 25px; color: #4D403D;">Change password</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="deleteaccount.php" style="text-decoration: none; font-size: 25px; color: #4D403D;">Delete your account</a>
          </div>
        </div>

   </body>
</html>

