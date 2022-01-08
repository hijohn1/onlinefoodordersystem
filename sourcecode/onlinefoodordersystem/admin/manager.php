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

</body>
</html>