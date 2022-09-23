<?php 
session_start();
unset($_SESSION['uname']);
unset($_SESSION['upwd']); 
session_destroy(); 
header("location:pws_login.php");
?>