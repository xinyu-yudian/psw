<?php 
header("Content-type:text/html;charset=utf-8");    //设置编码

include_once("pws_sql.php");
session_start();

if(isset($_POST['yzm'])&&$_POST['yzm']!=''){
    $checks=$_POST['yzm'];	
	if($checks==$_SESSION['check_checks']){
	
 if($_POST['uname']=='admin'&&$_POST['upwd']=='123456')	 {
	     header('location:pws_admin.php');   //admin
	 }else{
		 
if( isset($_POST['uname'])&&$_POST['uname']!=null && isset($_POST['upwd'])&&$_POST['upwd']!=null){
   $uname = $conn->query("select username from user where username ='".$_POST['uname']."'");
   $row = mysqli_fetch_assoc($uname); //函数从结果集中取得一行作为关联数组。
   if ($row > 0) { 
      $check_query = $conn->query("select id from user where username='".$_POST['uname']."' and password='".$_POST['upwd']."' limit 1");  
      if($result = mysqli_fetch_assoc($check_query)){   
	     header('location:pws_session.php?uname='.$_POST['uname'].'&upwd='.$_POST['upwd'].''); 
	   }else{
		   ?>
             <script type="text/javascript"> alert('账号与密码不匹配！'); window.history.go(-1);  </script>
           <?php
		   }
  } else {
   ?>
    <script type="text/javascript"> alert('该用户不存在，请先注册！'); window.history.go(-1);  </script>
   <?php
   }
}else{
	 ?>
       <script type="text/javascript"> alert('用户名和密码不能为空！'); window.history.go(-1);  </script>
     <?php
	}
	
	 } //admin

	 }else{
		echo "<script type='text/javascript'> alert('验证码输入不正确！'); window.history.go(-1); </script>"; 
		}
 }else{
	 echo "<script type='text/javascript'> alert('验证码不能为空！'); window.history.go(-1); </script>";
	 }


?>