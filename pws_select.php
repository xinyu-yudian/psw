<?php
include_once("pws_sql.php");
session_start();
$uname=$_SESSION['uname'];
if(isset($_GET['app'])){
$select="select icon,name,dink from name='".$_GET['app']."'";

}






 ?>