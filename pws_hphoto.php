<?php 
session_start(); 
$uname=$_SESSION['uname'];
include_once("pws_sql.php"); 
  $query ="select hphoto from user where username='".$uname."'";
$result=mysqli_query($conn,$query);
if($result){
	
$row = mysqli_fetch_array($result);


echo $row["hphoto"];


}else{ echo "错误！！";}



?>