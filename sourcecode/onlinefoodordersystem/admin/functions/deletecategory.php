<?php  
  include ("connection.php");

  if(isset($_GET['delete']))
  {
     $id = $_GET['delete'];

	   $sql = "delete from category where id=$id";
     mysqli_query($con, $sql);

     $sql = "delete from menu where category=$id";
     mysqli_query($con, $sql);
   }

	header("Location: ../menu.php");
?>