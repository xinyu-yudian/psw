<?php  
include_once('pws_sql.php');
session_start();
$uname=$_SESSION['uname'];
$appname=$_GET['appname'];
$sql_delect1="delete from ".$uname."_gtable where name='".$appname."'";
$sql_delect2="delete from ".$uname."_btable where name='".$appname."'";
$sql_delect3="delete from ".$uname."_qtable where name='".$appname."'";

$result1=mysqli_query($conn,$sql_delect1);
$result2=mysqli_query($conn,$sql_delect2);
$result3=mysqli_query($conn,$sql_delect3);

 ?>
   <script type="text/javascript">
      window.history.go(-1); 
   </script>
 <?php

?>