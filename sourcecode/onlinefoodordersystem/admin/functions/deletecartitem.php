<?php  
  include("../functions/connection.php");


  if(isset($_GET['itemid']) && isset($_GET['categoryid']))
  {
     $dorderid=$_GET['dorderid'];
     $itemid=$_GET['itemid'];
     $categoryid=$_GET['categoryid'];
     
     $sql = "delete from dorder where id=$dorderid and orderid=$categoryid and itemid=$itemid";
     mysqli_query($con, $sql);
   }

	header("Location: ../../cart.php");
?>