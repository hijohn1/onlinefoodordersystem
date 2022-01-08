<?php
   session_start();
   include("admin/functions/connection.php");

   $c=$_GET['detail'];
   $itemid=$_GET['itemid'];

   header("Location: menu.php?detail=$c#$itemid");  
?>
