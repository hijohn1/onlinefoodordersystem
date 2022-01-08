<?php
   session_start();
   include("header.php"); 
   include("admin/functions/connection.php");

   $message="";

   if($_SERVER['REQUEST_METHOD'] == "POST")
   {
     $username = $_POST['un'];
     $password = $_POST['pw'];
     
     if(!empty($username) && !empty($password))
     {
         $query = "select * from user where username = '$username' limit 1";
         $result = mysqli_query($con, $query);

         if($result)
         {
            if($result && mysqli_num_rows($result) > 0)
            {

               $ud = mysqli_fetch_assoc($result);
               
               if($ud['userpassword'] === $password)
               {
                  $_SESSION['username'] = $ud['username'];
                  $_SESSION['id'] = $ud['id'];
                  header("Location: users.php");
                  die;
               }
            }
         }

         $message="Wrong username or password!";
         
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
           <div style="font-size: 25px;margin: 10px;color: black;">Sign in Now</div>
           <table border="0" align="center" cellpadding="5" cellspacing="7">
              <tr>
                <td>Username</td> <td><input type="text" name="un" id="text" required="required"></td>
              </tr>
              <tr></tr><tr></tr>
              <tr>
                <td>Userpassword</td> <td><input type="password" name="pw" id="text" required="required"></td>
              </tr>
              <tr></tr><tr></tr>             
              <tr>
                <td><input type="submit" value="Sign in" id="button" style="color:red; border-color: yellow; width: 90px; font-size: 20px;"></td>
              </tr>
             </table>
             <br>
             <?php echo "<p style=\"color:red; font-size:20px;\">".$message; ?>  
         </form>
      </div>

   </body>
</html>
