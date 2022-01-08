<?php
   session_start();
   include("header.php"); 
   include("admin/functions/connection.php");
   
   $alertemail="";
   $alertphone="";

   if(isset($_POST['submit']))
   {
     $username = $_POST['un'];
     $password = $_POST['pw'];
     $email = $_POST['em'];
     $phone = $_POST['ph'];
     
     if(!empty($username) && !empty($password) && !empty($email) && !empty($phone))
     {
         $query = "select * from user where username = '$username' limit 1";
         $result = mysqli_query($con, $query);

         if($result && mysqli_num_rows($result) > 0)
         {
            $message="User exists !";
         }
         else
         {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                $alertemail=" Invalid email.";

            if (!is_numeric($phone))
                $alertphone=" Invalid phone.";

            if (is_numeric($phone) && filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $query = "insert into user (username,userpassword,email,phone) values ('$username','$password','$email','$phone')";
                mysqli_query($con, $query);
                header("Location: login.php");
            }
         }
      }
   }

?>

<html>
    <head>
      <title>Food order system</title>
      <link href="pages style/logsign.css"  rel="stylesheet" />
   </head>

   <body>

      <br><br><br><br><br><br><br><br><br><br>
      <div id="box">
         <form method="post">
           <span style="font-size: 30px;margin-left: 110px;color: black;">New User</span><br><br>
             <p style="margin-left: 10px; font-size: 20px;">Username: <input type="text" name="un" id="name" required="required" placeholder="Required!!" /></p><br>
             <p style="margin-left: 10px; font-size: 20px;">Userpassword: <input type="text" name="pw" id="name" required="required" placeholder="Required!!"/></p><br>
             <p style="margin-left: 10px; font-size: 20px;">Email: <input type="text" name="em" id="name" required="required" placeholder="Required!!"/>
             <span style="color:red; margin-left: 10px; font-size: 16px;"><?php echo $alertemail; ?></span></p><br>
             <p style="margin-left: 10px; font-size: 20px;">Phone: <input type="text" name="ph" id="name" required="required" placeholder="Required!!"/><span style="color:red; margin-left: 10px; font-size: 16px;"><?php echo $alertphone; ?></span></p><br>
             <input type="submit" name="submit" value="Sign up" id="confirm" style="color:RED; margin-left: 10px; font-size: 20px; width: 90px; background-color: yellow; border-color: yellow;"><br><br>  
         </form>
      </div>

   </body>
</html>
