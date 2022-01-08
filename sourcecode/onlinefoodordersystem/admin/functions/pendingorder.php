<?php  
  include ("connection.php");

  $id=$_GET['id'];
	
  $query="update forder set status=1 where id=$id";
  mysqli_query($con,$query);

	header("Location: ../order.php");
?>