<?php
   session_start();
   include("admin/functions/connection.php");
?>

<html>
   <head>
      <title>cart</title>
      <link href="pages style/cart.css"  rel="stylesheet" />
   </head>

   <body>
        <?php include("header.php"); ?>
        <div style="height: 15%;"></div> 
        <div id=cart>
         <br>
          <div id=insidecart>
              <p align="left" id=cartf>Your Cart</p>
                <?php
                    $username=$_SESSION['username'];
                    $query = "select * from forder where username=$username and status=0 " ;
                    $result = mysqli_query($con, $query); 
                    $r = mysqli_fetch_array($result);
                    $forderid=0; 

                    if($r)
                        $forderid=$r['id']; 

                    $query = "select * from dorder where orderid=$forderid" ;
                    $result = mysqli_query($con, $query); 
                    $dr = mysqli_fetch_array($result);

                    if($r && $dr)
                    {
                        echo "<br><p id=oops>Thanks for your choice!!</p>";

                        $forderid=$r['id'];
                        $query = "select * from dorder where orderid=$forderid" ;
                        $result = mysqli_query($con, $query); 
                        $r = mysqli_fetch_array($result);
                    }
                    else
                    {
                        echo "<br><p id=oops>Oops!! Nothing here. <a href=\"users.php\" id=ordernow>Order now?</a></p>";
                    }
              ?>
          </div>
        </div>
        <br><br>
        <div style="margin: 0 auto; width:1300px;">
      <?php
         
         if($forderid)
         {
         $query="select * from dorder where orderid=$forderid order by id asc";
         $result= mysqli_query($con,$query);
         $eachitemamount=0;
         $amount=0;

       if($row = mysqli_fetch_array($result))
       {
         echo "<div id=carttable>
               <table>
                <thead> 
                   <tr><br><br>
                   <th width=\"20%\">Image</th>
                   <th width=\"10%\">Name</th>
                   <th width=\"10%\">Quality</th>
                   <th width=\"10%\">Price</th>
                  <th width=\"10%\">Action</th>
                  </tr>
                </thead>";
         $query="select * from dorder where orderid=$forderid order by id asc";
         $result= mysqli_query($con,$query);

         while($row = mysqli_fetch_array($result))
         {
            ?>
                <tr>
                   <td align="center"><br><?php echo "<img src='{$row['itemimage']}' width='50%'' height='50%'/>" ?></td>
                   <td align="center"><br><?php echo $row['itemname'] ?></td>
                   <td align="center"><br><?php echo $row['qty'] ?></td>
                   <td align="center"><br><?php echo $row['price'] ?></td>
                   <td align="center" id="deletebox"><br><a href="admin/functions/deletecartitem.php?itemid=<?php echo $row['itemid']?> & categoryid=<?php echo $row['orderid']?> &dorderid=<?php echo $row['id']?>" id="delete"><img src="images/delete.jpg" width="30px" height="30px"></a></td>
                </tr>
            <?php
                $eachitemamount=$row['qty']*$row['price'];
                $amount +=$eachitemamount;
         }
        echo "<tr><td><br><br></td></tr></table></div>";
        echo "<div id=carttable1><p id=amount>Total amount: </p><p id=money>$".$amount. "</p><div id=checkout><p id=checkoutfont><a href=\"cartfillinfo.php?amount=".$amount." & forderid=".$forderid."\" id=checkoutlink>Checkout</a></p></div></div>";      
       }
   }
       ?> 
   </div>
   </body>
</html>

