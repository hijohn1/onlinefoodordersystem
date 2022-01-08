<?php 
   session_start();

   include("functions/connection.php");
   include("functions/functions.php");
   checking($con);

   $message="";  
   $star="";
   $starimage="";
   $starprice="";
   $allset=$imageset=0;
   $r=$_GET['detail'];

   if(isset($_POST['submit']))
   {
      $foodname=$_POST['foodname'];
      $foodimage=basename($_FILES["foodimage"]["name"]);
      $description=$_POST['description'];
      $foodprice=$_POST['foodprice'];
      $imageFileType = strtolower(pathinfo($foodimage,PATHINFO_EXTENSION));


      if( !empty($foodimage) &&($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") ) 
      {
             $starimage="Image file should be jpg, png or jpeg";
      } 
      else
         $imageset=1;

      if(!is_numeric($foodprice))
            $starprice="<br>Please input numbers only";

      if(empty($foodname) || empty($foodimage) || empty($description) || empty($foodprice))
      {
          $star=$starimage=$starprice="Required!";
      }

      if(!empty($foodname) && !empty($foodimage) && !empty($description) && !empty($foodprice) && is_numeric($foodprice) && $imageset==1)
         $allset=1;
    
      if($allset == 1)  
      {
         $imagelocation = "../images/fm/" . $_FILES["foodimage"]["name"];
         move_uploaded_file($_FILES["foodimage"]["tmp_name"], $imagelocation);
         $imagelocation = "images/fm/" . $_FILES["foodimage"]["name"];
         
         $query = "insert into menu(foodname,foodimage,description,price,category) values('$foodname','$imagelocation','$description','$foodprice','$r')";
         mysqli_query($con, $query);
         header("Location: detail.php?detail=$r");
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
   <div id="box2"><h1 align="center">Adding a new item</h1></div> 

   <div id="menugobutton">
       <a href="detail.php?detail=<?php echo $r; ?>" id="menugobutton"><h4>Go back</h4></a>
   </div>

   <br><br><br><br><br><br><br><br>
   <form method="post" enctype="multipart/form-data">
      <div id="upload">
          <h4>Food name: <input type="text" name="foodname" id="foodn"> <span class="star">* <?php echo $star; ?></span></h4>
          <h4>Food image: <span class="star">* <?php echo $starimage; ?></span></h4><input type="file" name="foodimage" id="image">
          <h4>Description: <span class="star">* <?php echo $star; ?></span></h4>   
          <textarea name="description" cols="40" rows="4" ></textarea><br>
          <h4>Price: $ <input type="price" name="foodprice" id="price"><span class="star"> * <?php echo $starprice; ?></span></h4>
          <input type="submit" value="Submit" name="submit" id="Submit">
          <br><br>
      </div>
   </form> 
  </div>
   <br><br>

</body>
</html>