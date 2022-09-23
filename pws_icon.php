<?php 
session_start(); 
$uname=$_SESSION['uname'];
include_once("pws_sql.php"); 
$iname=$_GET['name'];
  $query ="select icon,name from
                ((select icon,name from ".$uname."_gtable)
                  union all
	             (select icon,name from ".$uname."_btable)
	              union all
	             (select icon,name from ".$uname."_qtable)) as a where a.name='".$iname."'";
$result=mysqli_query($conn,$query);
if($result){
	
$row = mysqli_fetch_array($result);


echo $row["icon"];


}else{ echo "错误！！";}



?>