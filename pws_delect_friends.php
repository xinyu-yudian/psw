<?php  
include_once('pws_sql.php');
session_start();
$uname=$_SESSION['uname'];
$fname=$_GET['friendsname'];
$sql_delect1="delete from ".$uname."_friends where username='".$fname."'";

$result1=mysqli_query($conn,$sql_delect1);

 ?>
   <script type="text/javascript">
      window.history.go(-1); 
   </script>
 <?php

?>