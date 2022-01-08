<html>

<head>
	<title>Admin login page</title>
</head>

<?php 
    session_start();
	include("functions/connection.php");
	include("functions/functions.php");

	$message="";


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$username = $_POST['un'];
		$password = $_POST['pw'];

		if(!empty($username) && !empty($password))
		{

			$query = "select * from manager where username = '$username' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$ud = mysqli_fetch_assoc($result);
					
					if($ud['password'] === $password)
					{
						$_SESSION['username'] = $ud['username'];
						header("Location: manager.php");
						die;
					}
				}
			}

			$message="<span style=\"color:red; font-size:20px\">Wrong username or password!<span>";
			
		}
	}

?>

<body>

	<link href= "pages style/login.css" rel="stylesheet">

	<div style="width: 100%; height: 25%;"></div>
	<div id="box">
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: black;">Sign in</div>
			<input type="text" name="un" id="text" placeholder="Admin name" required="required"><br><br>
			<input type="password" name="pw" id="text" placeholder="Admin password" required="required"><br><br>
			<input type="submit" value="Sign in" id="button" style="color:black"><br><br><br>
			<a href="signup.php" id="accounttext">New admin account</a><br><br>
			<?php echo $message ?>
		</form>
	</div>


</body>
</html>