<?php  
  include ("connection.php");

  $category=$_GET['detail'];

  if(isset($_GET['delete']))
  {
     $foodid = $_GET['delete'];

	  $sql = "delete from menu where id=$foodid";
     mysqli_query($con, $sql);
   }

	header("Location: ../detail.php?detail=$category");
?>