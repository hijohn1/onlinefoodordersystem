<html>
<body>
	<link href="pages style/header.css"  rel="stylesheet" />
			<div id="selectionmenu">
				<ul>
					<div style="height: 10px;"></div>
					<li id="home"><a  class="text" href="users.php">Home</a></li>
					<li id="aboutus"><a  class="text" href="about.php">About us</a></li>
					<li id="contactus"><a  class="text" href="contact.php">Contact us</a></li>

				    <?php
					   if(isset($_SESSION['username']))
					   {
					?>
					     <li id="hi">Hi,</li>
					     <li id="userid"><a href="userdash.php" style="text-decoration: none; color: red"><?php echo $_SESSION['username'];?></a></li>
					     <li id="cart"><a class="text" href="cart.php">Cart (<?php 
					     	   $username=$_SESSION['username'];
					     	   $id=$_SESSION['id'];
					     	   $query = "select * from forder where userid=$id and status=0 " ;
                               $result = mysqli_query($con, $query);
                               $resulta=mysqli_fetch_array($result);
                               $n=0;

                               if($resulta)
                               {

                               	   $forderid=$resulta['id']; 
                                   $query = "select * from dorder where orderid=$forderid";
                                   $r = mysqli_query($con, $query);
                                   $n = mysqli_num_rows($r);
                               }
                               
                               echo $n; 
					     	?>)</a>
					     </li>
					     <li id="logout"><a class="text" href="logout.php">Sign out</a>
					<?php	
					   }
					   else
					   {	
					?>
					   <li id="login"><a  class="text" href="login.php">Sign in</a></li>
					   <li id="signin"><a  class="text" href="signup.php">Sign up</a></li>
					<?php
					   }
					?>
				</ul>
			</div>
</body>
</html>
