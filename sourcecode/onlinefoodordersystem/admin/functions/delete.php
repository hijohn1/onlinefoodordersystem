<?php  
  include ("connection.php");

  if(isset($_GET['delete']))
  {
     $foodid = $_GET['delete'];

	  $sql = "delete from menu where id=$foodid";
     mysqli_query($con, $sql);
   }

	header("Location: ../menu.php");
?>