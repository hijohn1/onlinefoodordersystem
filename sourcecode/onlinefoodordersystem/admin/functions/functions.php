<?php

function checking($con)
{
	if(isset($_SESSION['username']))
	{
		$un = $_SESSION['username'];
		$query = "select * from manager where username= '$un' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			return;
		}
	}

	header("Location: ../admin/mlogin.php");
	die;
}

function checking2($con)
{
	if(isset($_SESSION['username']))
	{
		$un = $_SESSION['username'];
		$query = "select * from manager where username= '$un' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			return;
		}
	}

	header("Location: ../mlogin.php");
	die;
}

?>