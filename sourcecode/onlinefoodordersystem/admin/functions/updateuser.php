<?php  
  session_start();

  include ("connection.php");
  include("functions.php");
  checking2($con);


  if(isset($_GET['update']))
  {

    $userid = $_GET['update'];

    if(isset($_POST['submit']))
    {
      $username=$_POST['un'];
      $userpassword=$_POST['up'];
      $email=$_POST['em'];
      $phone=$_POST['ph'];

      if(!empty($username))
      {
        $query="update user set username='$username' where id=$userid";
        mysqli_query($con,$query);
      }

       if(!empty($userpassword))
      {
         $query="update user set userpassword='$userpassword' where id=$userid";
         mysqli_query($con,$query);
      }
      
      if(!empty($email))
      {
         $query="update user set email='$email' where id=$userid";
         mysqli_query($con,$query);
      }

      if(!empty($phone))
      {
         $query="update user set phone='$phone' where id=$userid";
         mysqli_query($con,$query);
      }
 
      header("Location: ../user.php");
   }
  }
?>

<html>

<head>
    <title>Update users</title>
    <link href="../pages style/mainpage.css" rel="stylesheet">
</head>

<body>

   <div id="box1">
       <section id="text">Welcome administrator<a href="../menu.php" id="menubutton">Menu</a><a href="../order.php" id="orderbutton">Order</a><a href="../user.php" id="userbutton">Users</a><a href="../logout.php" id="logoutbutton">Sign out</a><section>
   </div>

    <div style="margin:0 auto; height: 4%;"></div>
    <div style="margin:0 auto; width:1300px; min-width:1320px;">
   <div id="box2"><h1 align="center">Updating user`s account</h1></div> 

   <div id="menugobutton">
       <a href="../user.php" id="menugobutton"><h4>Go back</h4></a>
   </div>

   <table class="table">
     <thead> 
        <tr>
          <th width="10%">Username</th>
          <th width="10%">Password</th>
          <th width="10%">Email</th>
          <th width="10%">Phone</th>
        </tr>
     </thead>
       <?php
         $query="select * from user where id='$userid'";
         $result= mysqli_query($con,$query);
         $row = mysqli_fetch_array($result)
      ?>
         <tr>
            <td align="center"><?php echo $row['username'] ?></td>
             <td align="center"><?php echo $row['userpassword'] ?></td>
             <td align="center"><?php echo $row['email'] ?></td>
             <td align="center"><?php echo $row['phone'] ?></td>  
        </tr>
    </table> 
    <br><br>

   <form method="post" enctype="multipart/form-data">
      <div id="upload">
        <h4>Username: <input type="text" name="un" id="un"></h4>
        <h4>Password: <input type="text" name="up" id="up"></h4>
        <h4>Email: <input type="text" name="em" id="em"></span></h4>
        <h4>Phone: <input type="text" name="ph" id="ph"></h4>
        <input type="submit" value="Submit" name="submit" id="Submit">
        <br><br>
      </div>
   </form>
</div>

 </body>
</html>


