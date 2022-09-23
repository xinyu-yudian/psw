<?php
include_once("pws_sql.php");
session_start(); 
$uname=$_SESSION['uname'];

$sql1 = "DELETE FROM user WHERE username='".$uname."'";
$sql2 = "DROP TABLE ".$uname."_gtable";
$sql3 = "DROP TABLE ".$uname."_btable";
$sql4 = "DROP TABLE ".$uname."_qtable";
$sql5 = "DROP TABLE ".$uname."_mm";
$sql6 = "DROP TABLE ".$uname."_friends";

$playsql1= mysqli_query($conn,$sql1);
$playsql2= mysqli_query($conn,$sql2);
$playsql3=mysqli_query($conn,$sql3);
$playsql4= mysqli_query($conn,$sql4);
$playsql5= mysqli_query($conn,$sql5);
$playsql6= mysqli_query($conn,$sql6);

?>
<script type="text/javascript"> alert('注销成功,请返回登陆界面！'); top.location.href="pws_login.php";</script>
 <?php  

?>