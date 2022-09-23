<?php
 $time=30*60;
 session_set_cookie_params($time);
 session_start();
 $username=$_GET['uname'];
 $password=$_GET['upwd'];
 $_SESSION['uname']=$username;
 $_SESSION['upwd']=$password;
 
    header('location:pws_umface.php');
?>