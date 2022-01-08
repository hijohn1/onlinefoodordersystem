<?php 
   session_start();

   include("functions/connection.php");
   include("functions/functions.php");
   checking($con);

   $star="";
   $allset=$imageset=0;

   if(isset($_POST['submit']))
   {
      $username=$_POST['un'];
      $userpassword=$_POST['up'];
      $email=$_POST['em'];
      $phone=$_POST['ph'];

      if(empty($username) || empty($userpassword) || empty($email) || empty($phone))
      {
          $star="Required!";
      }

      if(!empty($username) && !empty($userpassword) && !empty($email) && !empty($phone))
      {
         
         $query = "insert into user(username,userpassword,email,phone) values('$username','$userpassword','$email','$phone')";
         mysqli_query($con, $query);
         header("Location: user.php");
      }
   }
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
   <div id="addanewuser"><h1 align="center">Adding a new user</h1></div> 

   <div id="menugobutton">
       <a href="user.php" id="menugobutton"><h4>Go back</h4></a>
   </div>
   <br><br>

   <form method="post" enctype="multipart/form-data">
      <div id="upload" style="margin-top:120px">
          <h4>Username: <input type="text" name="un" id="un"> <span class="star">* <?php echo $star; ?></span></h4>
          <h4>Password: <input type="text" name="up" id="up"> <span class="star">* <?php echo $star; ?></span></h4>
          <h4>Email: <input type="text" name="em" id="em"> <span class="star">* <?php echo $star; ?></span></h4>
          <h4>Phone: <input type="text" name="ph" id="ph"> <span class="star">* <?php echo $star; ?></span></h4>
          <input type="submit" value="Submit" name="submit" id="Submit">
          <br><br>
      </div>
   </form>
</div>
   <br><br>

</body>
</html>
