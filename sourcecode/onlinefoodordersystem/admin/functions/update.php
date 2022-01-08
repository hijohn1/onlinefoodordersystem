<?php  
  session_start();

  include ("connection.php");
  include("functions.php");
  checking2($con);

  $categoryid = $_GET['update'];
  $starimage="";

  if(isset($_POST['submit']))
   {
      $categoryname=$_POST['categoryname'];
      $categoryimage=basename($_FILES["categoryimage"]["name"]);
      $imageFileType = strtolower(pathinfo($categoryimage,PATHINFO_EXTENSION));

      if(!empty($categoryname))
      {
        $query="update category set name='$categoryname' where id=$categoryid";
        mysqli_query($con,$query);
      }

      if(!empty($categoryimage) &&($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")) 
      {
             $starimage="Image file should be jpg, png or jpeg";
      } 
      elseif(!empty($categoryimage) &&($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType =="jpeg"))
      {
         $imagelocation = "../../images/fc/" . $_FILES["categoryimage"]["name"];
         move_uploaded_file($_FILES["categoryimage"]["tmp_name"], $imagelocation);
         $imagelocation = "images/fc/" . $_FILES["categoryimage"]["name"];

         $query="update category set image='$imagelocation' where id=$categoryid";
         mysqli_query($con,$query);
         $starimage="";
         header("Location: ../menu.php");
      }
   }
?>

<html>

<head>
    <title>Update menu</title>
    <link href="../pages style/mainpage.css" rel="stylesheet">
</head>

<body>

   <div id="box1">
       <section id="text">Welcome administrator<a href="../menu.php" id="menubutton">Menu</a><a href="../order.php" id="orderbutton">Order</a><a href="../user.php" id="userbutton">Users</a><a href="../logout.php" id="logoutbutton">Sign out</a></section>
   </div>

    <div style="margin:0 auto; height: 4%;"></div>
    <div style="margin:0 auto; width:1300px; min-width:1320px;">
   <div id="box2"><h1 align="center">Updating the category</h1></div> 

   <div id="menugobutton">
       <a href="../menu.php" id="menugobutton"><h4>Go back</h4></a>
   </div>

   <table class="table">
     <thead> 
        <tr>
          <th width="10%">Foodname</th>
          <th width="10%">Image</th>
        </tr>
     </thead>
       <?php
         $query="select * from category where id='$categoryid'";
         $result= mysqli_query($con,$query);
         $row = mysqli_fetch_array($result)
      ?>
         <tr>
            <td align="center"><?php echo $row['name'] ?></td>
             <td align="center"><?php echo "<img src='../../{$row['image']}' width='150px'' height='150px'/>" ?></td>  
        </tr>
    </table> 

   <form method="post" enctype="multipart/form-data">
      <div id="upload">
          <h4>Category name: <input type="text" name="categoryname" id="cn"></h4>
          <h4>Category image: <span class="star"><?php echo $starimage; ?></span></h4>
          <input type="file" name="categoryimage" id="image">
          <br><br>
          <input type="submit" value="Submit" name="submit" id="Submit">
          <br><br>
      </div>
   </form>
</div> 

 </body>
</html>


