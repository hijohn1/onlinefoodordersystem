<?php
   session_start();
   include("admin/functions/connection.php");
?>

<html>
   <head>
      <title>thankyou</title>
      <link href="pages style/cart.css"  rel="stylesheet" />
   </head>

   <body>
        <?php include("header.php"); ?>
        <div style="height: 15%;"></div>
        <div id=cart>
         <br>
          <div id=insidecart>
            <?php
                echo "<p align=\"left\" id=thankyou>Thanks for your purchase. </p><br>";
                echo "<p align=\"left\" id=orderagain>Another <a href=\"users.php\" id=orderagainlink>order</a> ? </p><br>";
            ?>
          </div>
        </div>

   </body>
</html>

