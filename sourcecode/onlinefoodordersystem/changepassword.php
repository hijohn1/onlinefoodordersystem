<?php
   session_start();
   include("admin/functions/connection.php");

   $alertoriginalpassword="";
   $alertconfirmpassword="";
   $pwchanged="";
   $currentuser=$_SESSION['username'];
   $currentuserid=$_SESSION['id'];

   if(isset($_POST['submit']))
   {
     $oldpassword = $_POST['opw'];
     $newpassword = $_POST['npw'];
     $confirmpassword = $_POST['cpw'];

     if(!empty($oldpassword) && !empty($newpassword) && !empty($confirmpassword))
     {
        $query="select * from user where id=$currentuserid";
        $result=mysqli_query($con,$query);
        $r=mysqli_fetch_assoc($result);

        if(strcasecmp($r['userpassword'], $oldpassword)==0)
        {
            if(strcasecmp($newpassword, $confirmpassword)==0)
            {
                $query="update user set userpassword='$newpassword' where id='$currentuserid'";
                mysqli_query($con,$query);
                $pwchanged="password changed successfully.";
            }
            else
               $alertconfirmpassword="Passwords do not match.";

        }
        else
            $alertoriginalpassword="Wrong password.";
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
           <p align=left style="font-size: 80px;">Change password </p><br><br>
           <a href="userdash.php" style="text-decoration: none; font-size: 25px; color: #4D403D;">Go back</a>
         </div>
      </div>

    <br><br>


    <div id="password" >
       <br>
       <form method="post">
         <p align="left" style="margin-left:30px">Old passowrd : <input type="text" name="opw" required="required"><span style="color:red; margin-left: 10px; font-size: 20px;"><?php echo $alertoriginalpassword; ?></span></p><br>
         <p align="left" style="margin-left:30px">New password: <input type="text" name="npw" required="required"></p><br>
         <p align="left" style="margin-left:30px">Confirm new password: <input type="text" name="cpw" required="required"><span style="color:red; margin-left: 10px; font-size: 20px;"><?php echo $alertconfirmpassword; ?></span></p><br>
         <input type="submit" name="submit" value="Update" style="border-radius: 100px; width: 80px; font-size:18px; border-color: yellow; background-color: yellow; color: red; margin-left: 30px">
       </form>
       <br>
       <?php echo "<span style=\"color:red; font-size:20px; margin-left: 30px;\">".$pwchanged."</span>"?>
    </div>
   <br><br><br><br><br><br><br><br>

   </body>
</html>

