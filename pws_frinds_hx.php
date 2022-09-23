<?php 
session_start(); 
$uname=$_SESSION['uname'];
include_once("pws_sql.php"); 
$iname=$_GET['friendname'];
  $query ="select hphoto,username from user where username='".$iname."'";
$result=mysqli_query($conn,$query);
if($result){
	
$row = mysqli_fetch_array($result);


echo $row["hphoto"];


}else{ echo "错误！！";}



?>