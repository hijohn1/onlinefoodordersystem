<html>

<head>
	<title>Signup</title>
</head>

<?php 
    session_start();
	include("functions/connection.php");
	include("functions/functions.php");

	$message="";

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password))
		{
			$query = "select * from manager where username= '$username'";
			$result = mysqli_query($con, $query);
			if($result && mysqli_num_rows($result) > 0)
			{
				$message="<span style=\"color:red; font-size:20px;\">User exits!!</span>";
			}
			else
			{
			    $query = "insert into manager (username,password) values ('$username','$password')";
			    mysqli_query($con, $query);
			    header("Location: mlogin.php");
			    die;
			}
		}
	}
?>

<body>

    <link href="pages style/signup.css" rel="stylesheet">
    <div style="width: 100%; height: 25%;"></div>
	<div id="box">
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: black;">Sign up</div>
			<input type="text" name="username" id="text" placeholder="Admin name" required="required" ><br><br>
			<input type="password" name="password" id="text" placeholder="Admin password" required="required"><br><br>
			<input type="submit" value="Sign up" id="button" ><br><br><br>
			<a href="mlogin.php" id="accounttext">Go back to sign in page</a><br><br>
			<?php echo $message ?>
		</form>
	</div>

</body>
</html>