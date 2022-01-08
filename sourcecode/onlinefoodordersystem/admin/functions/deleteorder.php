<?php  
  include ("connection.php");

  $id=$_GET['id'];
	
  $query="delete from forder where id=$id";
  mysqli_query($con,$query);

  $query="delete from dorder where orderid=$id";
  mysqli_query($con,$query);

	header("Location: ../order.php");
?>