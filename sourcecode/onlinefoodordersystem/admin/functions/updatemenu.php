<?php  
  session_start();

  include ("connection.php");
  include("functions.php");
  checking2($con);

  $category=$_GET['detail'];

  if(isset($_GET['update']))
  {
    $foodid = $_GET['update'];

    $starimage="";
    $starprice="";

   if(isset($_POST['submit']))
   {
      $foodname=$_POST['foodname'];
      $foodimage=basename($_FILES["foodimage"]["name"]);
      $description=$_POST['description'];
      $foodprice=$_POST['foodprice'];
      $imageFileType = strtolower(pathinfo($foodimage,PATHINFO_EXTENSION));

      if(!empty($foodname))
      {
        $query="update menu set foodname='$foodname' where id=$foodid";
        mysqli_query($con,$query);
      }

      if(!empty($foodimage) &&($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") ) 
      {
             $starimage=" * Image file should be jpg, png or jpeg";
      } 
      elseif(!empty($foodimage) &&($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType !="jpeg"))
      {
         $imagelocation = "../../images/fm/" . $_FILES["foodimage"]["name"];
         move_uploaded_file($_FILES["foodimage"]["tmp_name"], $imagelocation);
         $imagelocation = "images/fm/" . $_FILES["foodimage"]["name"];

         $query="update menu set foodimage='$imagelocation' where id=$foodid";
         mysqli_query($con,$query);
      }

      if(!empty($description))
      {
         $query="update menu set description='$description' where id=$foodid";
         mysqli_query($con,$query);
      }

      if(!is_numeric($foodprice) && $foodprice!=null)
      {
            $starprice=" * Please input numbers only";
      }
      elseif(is_numeric($foodprice) && !empty($foodprice))
      {
        $query="update menu set price='$foodprice' where id=$foodid";
        mysqli_query($con,$query);
      }

      if($starprice==null && $starimage==null)
        header("Location: ../detail.php?detail=$category");
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
       <section id="text">Welcome administrator<a href="../menu.php" id="menubutton">Menu</a><a href="../order.php" id="orderbutton">Order</a><a href="../user.php" id="userbutton">Users</a><a href="../logout.php" id="logoutbutton">Sign out</a><section>
   </div>

   <div style="margin:0 auto; height: 4%;"></div>
   <div style="margin:0 auto; width:1300px; min-width:1320px;">
   <div id="box2"><h1 align="center">Updating the item</h1></div> 

   <div id="menugobutton">
       <a href="../detail.php?detail=<?php echo $category?>" id="menugobutton"><h4>Go back</h4></a>
   </div>

   <table class="table">
     <thead> 
        <tr>
          <th width="10%">Foodname</th>
          <th width="10%">Image</th>
          <th width="10%">Description</th>
          <th width="10%">Price</th>
        </tr>
     </thead>
       <?php
         $query="select * from menu where id='$foodid'";
         $result= mysqli_query($con,$query);
         $row = mysqli_fetch_array($result)
      ?>
         <tr>
            <td align="center"><?php echo $row['foodname'] ?></td>
             <td align="center"><?php echo "<img src='../../{$row['foodimage']}' width='150px'' height='150px'/>" ?></td>
             <td align="left"><?php echo $row['description'] ?></td>
             <td align="center">$<?php echo $row['price'] ?></td>  
        </tr>
    </table> 
    <br><br>

   <form method="post" enctype="multipart/form-data">
      <div id="upload">
          <h4>Food name: <input type="text" name="foodname" id="foodn"></h4>
          <h4>Food image: <span class="star"><?php echo $starimage; ?></span></h4>
          <input type="file" name="foodimage" id="image">
          <h4>Description: </h4>   
          <textarea name="description" cols="40" rows="4" ></textarea><br>
          <h4>Price: $ <input type="price" name="foodprice" id="price"><br><span class="star"><?php echo $starprice; ?></span></h4>
          <input type="submit" value="Submit" name="submit" id="Submit">
          <br><br>
      </div>
   </form>
 </div>
 <br><br>
 </body>
</html>


