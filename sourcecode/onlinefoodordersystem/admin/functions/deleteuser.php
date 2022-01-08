<?php  
  include ("connection.php");

  if(isset($_GET['delete']))
  {
     $id = $_GET['delete'];

	  $sql = "delete from user where id=$id";
     mysqli_query($con, $sql);
   }

	header("Location: ../user.php");
?>