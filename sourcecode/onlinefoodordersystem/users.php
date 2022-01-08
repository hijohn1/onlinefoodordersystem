<?php
   session_start();
   include("admin/functions/connection.php");
?>


<html>
    <head>
    	<title>Food order system</title>
    	<link href="pages style/front.css"  rel="stylesheet" />
	</head>

	<body>
		<div id="backgroundimage">
        <?php include("header.php"); ?>
        <div style="height: 30%; min-height: 30%;"></div>
		   <div id="welcometitle">
		   	  <div id="content">
                <div style="height: 20%; min-height: 20%; "></div>
		          <h1 id="title">Welcome to Oliver`s gourmet</h1>
                <div style="height: 15%; min-height: 15%; "></div>
		          <div id="order">
		          	<a href="#menu" id="order">Order Now</a>
		          </div>
		      </div>
		   </div>
		</div>

      <span id="menu"></span>

      <table class="table" width="100%" align="center" >
        <?php
         $query="select * from category order by id asc";
         $result= mysqli_query($con,$query);
         $i=1;

         while($row = mysqli_fetch_array($result))
         {
            if($i==1)
            {
                ++$i;
         ?>
               <tr>     
                  <td align="center">
                    <a href="menu.php?detail=<?php echo $row['id'] ?>" id="usersmenu">
                    <div id="m">
                       <?php 
                         echo "<div><br><br><img src='{$row['image']}' width='50%'' height='50%'/></div><br><br>";
                        ?>
                     
                        <?php
                         echo "<h3 align='center' id=usersmenu>".$row['name']."</h3><br>";
                       ?>
                     
                    </div>
                    </a>
                  </td>
         <?php
            }
            else if($i>1 && $i<4)
            {
               ++$i;
         ?>
                  <td align="center"> 
                    <a href="menu.php?detail=<?php echo $row['id'] ?>" id="usersmenu">
                    <div id="m">
                       <?php 
                         echo "<div><br><br><img src='{$row['image']}' width='50%'' height='50%'/></div><br><br>";
                        ?>
                     
                        <?php
                         echo "<h3 align='center' id=usersmenu>".$row['name']."</h3><br>";
                       ?>
                     
                    </div>
                    </a>
                  </td>
         <?php
            }
            else if($i==4)
            {
               $i=1;
         ?> 
                   <td align="center">
                    <a href="menu.php?detail=<?php echo $row['id'] ?>" id="usersmenu">
                    <div id="m">
                       <?php 
                         echo "<div><br><br><img src='{$row['image']}' width='50%'' height='50%'/></div><br><br>";
                        ?>
                     
                        <?php
                         echo "<h3 align='center' id=usersmenu>".$row['name']."</h3><br>";
                       ?>
                     
                    </div>
                    </a>
                   </td>
               </tr>
         <?php
            }
         }
         ?>
      </table>
      
	</body>
</html>