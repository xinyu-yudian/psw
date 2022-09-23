<?php
include_once('pws_sql.php');
session_start();
$uname=$_SESSION['uname'];
if(isset($_POST['message'])){
	$se_sql="insert into message values(null,'".$uname."','".$_POST['message']."')";
	$res=mysqli_query($conn,$se_sql);
	
	if($res){
	
		?> 
	    <script> alert("留言提交成功！"); window.history.go(-1);</script>
	  <?php  
		
	 }else{
		?> 
	    <script> alert("留言提交失败！"); window.history.go(-1);</script>
	  <?php
		
		}
	
	}else{
		?> 
	    <script> alert("留言提交失败！"); window.history.go(-1);</script>
	  <?php

		}

?>