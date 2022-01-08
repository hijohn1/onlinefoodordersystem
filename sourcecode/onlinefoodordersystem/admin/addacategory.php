<?php 
   session_start();

   include("functions/connection.php");
   include("functions/functions.php");
   checking($con);
 
   $star="";
   $starimage="";
   $imageset=$allset=0;

   if(isset($_POST['submit']))
   {
      $categoryname=$_POST['categoryname'];
      $categoryimage=basename($_FILES["categoryimage"]["name"]);
      $imageFileType = strtolower(pathinfo($categoryimage,PATHINFO_EXTENSION));

      if(!empty($categoryimage) &&($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") ) 
      {
             $starimage="Image file should be jpg, png or jpeg";
      } 
      else if(!empty($categoryimage) &&($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg") ) 
         $imageset=1;

      if(empty($categoryname) || empty($categoryimage))
      {
          $star=$starimage="Required!";
      }

      if(!empty($categoryname) && !empty($categoryimage) && $imageset==1)
         $allset=1;
    
      if($allset == 1)  
      {
         $imagelocation = "../images/fc/" . $_FILES["categoryimage"]["name"];
         move_uploaded_file($_FILES["categoryimage"]["tmp_name"], $imagelocation);
         $imagelocation = "images/fc/" . $_FILES["categoryimage"]["name"];
         
         $query = "insert into category(name,image) values('$categoryname','$imagelocation')";
         mysqli_query($con, $query);
         header("Location: menu.php");
      }
   }
?> 

<html>

<head>
	<title>Category updating</title>
   <link href="pages style/mainpage.css" rel="stylesheet">
</head>

<body>

   <div id="box1">
       <section id="text">Welcome administrator<a href="menu.php" id="menubutton">Menu</a><a href="order.php" id="orderbutton">Order</a><a href="user.php" id="userbutton">Users</a><a href="logout.php" id="logoutbutton">Sign out</a></section>
   </div>

   <div style="margin:0 auto; height: 4%;"></div>
   <div style="margin:0 auto; width:1300px; min-width:1320px;">
   <div id="box2"><h1 align="center">Adding a new category</h1></div> 

   <div id="menugobutton">
       <a href="menu.php" id="menugobutton"><h4>Go back</h4></a>
   </div>
   <br><br><br><br><br><br><br><br>

   <form method="post" enctype="multipart/form-data">
      <div id="upload">
          <h4>Category name: <input type="text" name="categoryname" id="cn"> <span class="star">* <?php echo $star; ?></span></h4>
          <h4>Category image: <span class="star">* <?php echo $starimage; ?></span></h4><input type="file" name="categoryimage" id="image">
          <br><br>
          <input type="submit" value="Submit" name="submit" id="Submit">
          <br><br>
      </div>
   </form>
</div>
   <br><br>

</body>
</html>