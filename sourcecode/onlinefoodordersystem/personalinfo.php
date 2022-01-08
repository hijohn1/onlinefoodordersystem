<?php
   session_start();
   include("admin/functions/connection.php");

   $alertemail="";
   $alertphone="";
   $alertuser="";
   $currentuser=$_SESSION['username'];
   $currentuserid=$_SESSION['id'];

   if(isset($_POST['submit']))
   {
     $username = $_POST['name'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];

      if(!empty($email))
      {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                $alertemail="Invalid email format.";
        else
        {
         $query="update user set email='$email' where id=$currentuserid";
         mysqli_query($con,$query);
        }
      }

      if(!empty($phone))
      {
        if (!is_numeric($phone))
                $alertphone=" Invalid phone format.<br>";
        else
        {
         $query="update user set phone='$phone' where id=$currentuserid";
         mysqli_query($con,$query);
        }
      }

      if(!empty($username))
      {
        $query="select * from user where id=$currentuserid and username=$username";
        $result=mysqli_query($con,$query);

        if($result && $r=mysqli_fetch_assoc($result))
            $alertuser="User exists";
        else
        {
           $query="update user set username='$username' where id=$currentuserid";
           mysqli_query($con,$query);
           $query="update forder set username='$username' where userid=$currentuserid";
           mysqli_query($con,$query);
           $_SESSION['username']=$username;
        }
      }
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
           <p align=left style="font-size: 80px;">Personal info. </p><br><br>
           <a href="userdash.php" style="text-decoration: none; font-size: 25px; color: #4D403D;">Go back</a>
         </div>
      </div>

      <div style="height: 5%;"></div>

      <div style="margin:0 auto; width:1150px; height: 310px; min-width:1150px; min-height: 310px;">
     <div id="personalinfo" >
    <?php 
      $user=$_SESSION['username'];
      $query="select * from user where id=$currentuserid";
      $result= mysqli_query($con,$query);
      $row=mysqli_fetch_assoc($result);
   ?>
         <br>
         <p align="left" style="margin-left:30px">Name : <?php echo $row['username'] ?></p><br>
         <p align="left" style="margin-left:30px">Email: <?php echo $row['email'] ?></p><br>
         <p align="left" style="margin-left:30px">Phone: <?php echo $row['phone'] ?></p><br>
     </div>

    <div id="personalinfo1" >
       <br>
       <form method="post">
         <p align="left" style="margin-left:30px">Name : <input type="text" name="name"><span style="color:red; margin-left: 10px; font-size: 20px;"><?php echo $alertuser; ?></span></p><br>
         <p align="left" style="margin-left:30px">Email: <input type="text" name="email"><span style="color:red; margin-left: 10px; font-size: 20px;"><?php echo $alertemail; ?></span></p><br>
         <p align="left" style="margin-left:30px">Phone: <input type="text" name="phone"><span style="color:red; margin-left: 10px; font-size: 20px;"><?php echo $alertphone; ?></span></p><br>
         <input type="submit" name="submit" value="Update" style="border-radius: 100px; width: 80px; font-size:18px; border-color: yellow; background-color: yellow; color: red; margin-left: 30px">
       </form>
    </div> 
    </div>
   <br><br><br><br>

   </body>
</html>

