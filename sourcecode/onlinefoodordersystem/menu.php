<?php
   session_start();
   include("admin/functions/connection.php");

   $c=$_GET['detail'];

  if(isset($_SESSION['username']))
  {
     $username = $_SESSION['username'];
     $id=$_SESSION['id'];
     $query = "select * from forder where userid=$id and status=0;";
     $result = mysqli_query($con, $query); 
     $r = mysqli_fetch_array($result);  
     $validorderid = 0;

    if($r==null)
    {
        $query = "insert into forder(userid,username,status) values('$id','$username',0)";
        mysqli_query($con, $query);
    }
    else
    {
        $query = "select * from forder where username=$username";
        $result = mysqli_query($con, $query);

        while($r = mysqli_fetch_array($result))
        {
           if($r['status'] == 1)
               continue;
           else if($r['status'] == 0)
               $validorderid = $r['id']; 
        }
    } 
  }
?>

<html>
    <head>
    	<title>Food order system</title>
    	<link href="pages style/front.css"  rel="stylesheet" />
	</head>

	<body>
		<div id="backgroundimage">
		   <?php include("header.php"); ?>
           <div style="height: 30%; min-height: 30%;"></div>
		   <div id="welcometitle">
		   	  <div id="content">
                <div style="height: 20%; min-height: 20%; "></div>
		      <h1 id="title">
                            <?php 
                                $query = "select * from category where id=$c";
                                $category = mysqli_query($con, $query);
                                $categoryname=mysqli_fetch_assoc($category);
                                echo $categoryname['name']; 
                            ?>
                      </h1>
                  <div style="height: 15%; min-height: 15%; "></div>
		          <div id="order">
		          	<a href="users.php" id="order">Go Back</a>
		          </div>
		      </div>
		   </div>
		</div>

      <br id="menu">
       <table class="table" width="100%" align="center" >
        <?php
         $query="select * from menu where category=$c order by id asc";
         $result= mysqli_query($con,$query);
         $i=1;
         $itemid=0;
         $itemname="";
         $itemimage="";
         $qty=0;
         $price=0;

         while($row = mysqli_fetch_array($result))
         {
            if($i==1)
            {
                ++$i;
         ?>
               <tr>     
                 <td align="center">
                  <div>
                   <?php
                       echo '<div class="menu" id="'.$row['id'].'">';
                   ?>
                       <form method="post">
                   <?php
                         echo "<div><br><img src='{$row['foodimage']}' width='150px'' height='150px'/></div><br><br>";
                         echo "<h3 align='center' id=usersmenu>".$row['foodname']."</h3><br>";
                         echo "<h3 align='left' id=description>".$row['description']."</h3><br>";
                         echo "<h3 align='center' id=usersmenu>$".$row['price']."</h3><br>";
                    ?>
                      <input type="number" name="quantity" id="quantity" min="1" value="0"><br><br>
                      <input type="submit" name="<?php echo $row['id'];?>" value="Add cart" id="cart">
                      <br><br>
                      </form>
                   <?php
                       if(!isset($_SESSION['username']) && isset($_POST[$row['id']]))
                       {
                           echo("<script>location.href ='login.php';</script>");
                       }
                       else if(isset($_SESSION['username']) && isset($_POST[$row['id']]))
                       {

                            $itemid=$row['id'];
                            $itemname=$row['foodname'];
                            $itemimage=$row['foodimage'];
                            $price=$row['price'];
                            $qty=$_POST['quantity'];
                            $query = "insert into dorder(orderid, itemid,  itemimage, itemname, qty, price) values('$validorderid', '$itemid', '$itemimage', '$itemname', '$qty','$price')";             
                            mysqli_query($con, $query);   
                            echo("<script>location.href ='menurefresh.php?detail=$c & itemid=$itemid';</script>");
                       }
                   ?>
                  </div>
                 </td>
         <?php
            }
            else if($i>1 && $i<4)
            {
               ++$i;
         ?>
                  <td align="center">
                  <div>
                    <?php
                       echo '<div class="menu" id="'.$row['id'].'">';
                   ?>
                       <form method="post">
                   <?php
                         echo "<div><br><img src='{$row['foodimage']}' width='150px'' height='150px'/></div><br><br>";
                         echo "<h3 align='center' id=usersmenu>".$row['foodname']."</h3><br>";
                         echo "<h3 align='left' id=description>".$row['description']."</h3><br>";
                         echo "<h3 align='center' id=usersmenu>$".$row['price']."</h3><br>";
                    ?>
                      <input type="number" name="quantity" id="quantity" min="1" value="0"><br><br>
                      <input type="submit" name="<?php echo $row['id'];?>" value="Add cart" id="cart">
                      <br><br>
                      </form>
                   <?php
                       if(!isset($_SESSION['username']) && isset($_POST[$row['id']]))
                       {
                            echo("<script>location.href ='login.php';</script>");
                       }
                       else if(isset($_SESSION['username']) && isset($_POST[$row['id']]))
                       {

                            $itemid=$row['id'];
                            $itemname=$row['foodname'];
                            $itemimage=$row['foodimage'];
                            $price=$row['price'];
                            $qty=$_POST['quantity'];
                            $query = "insert into dorder(orderid, itemid,  itemimage, itemname, qty, price) values('$validorderid', '$itemid', '$itemimage', '$itemname', '$qty','$price')";             
                            mysqli_query($con, $query);   
                            echo("<script>location.href ='menurefresh.php?detail=$c & itemid=$itemid';</script>");
                       }
                   ?>
                  </div>
                  </td>
         <?php
            }
            else if($i==4)
            {
               $i=1;
         ?> 
                  <td align="center">
                  <div>
                  <?php
                       echo '<div class="menu" id="'.$row['id'].'">';
                   ?>
                       <form method="post">
                   <?php
                         echo "<div><br><img src='{$row['foodimage']}' width='150px'' height='150px'/></div><br><br>";
                         echo "<h3 align='center' id=usersmenu>".$row['foodname']."</h3><br>";
                         echo "<h3 align='left' id=description>".$row['description']."</h3><br>";
                         echo "<h3 align='center' id=usersmenu>$".$row['price']."</h3><br>";
                    ?>
                      <input type="number" name="quantity" id="quantity" min="1" value="0"><br><br>
                      <input type="submit" name="<?php echo $row['id'];?>" value="Add cart" id="cart">
                      <br><br>
                      </form>
                   <?php
                       if(!isset($_SESSION['username']) && isset($_POST[$row['id']]))
                       {
                            echo("<script>location.href ='login.php';</script>");
                       }
                       else if(isset($_SESSION['username']) && isset($_POST[$row['id']]))
                       {

                            $itemid=$row['id'];
                            $itemname=$row['foodname'];
                            $itemimage=$row['foodimage'];
                            $price=$row['price'];
                            $qty=$_POST['quantity'];
                            $query = "insert into dorder(orderid, itemid,  itemimage, itemname, qty, price) values('$validorderid', '$itemid', '$itemimage', '$itemname', '$qty','$price')";             
                            mysqli_query($con, $query);   
                            echo("<script>location.href ='menurefresh.php?detail=$c & itemid=$itemid';</script>");
                       }
                   ?>
                  </div>
                  </td>
               </tr>
         <?php
            }
         }
         ?>
      </table>
	</body>
</html>
