<?php 
include_once('pws_sql.php');
session_start();
$uname=$_SESSION['uname'];


if(isset($_POST['wen1'])&&isset($_POST['hui1'])){
	$sql_mm1="update `usermm` set wen1='".$_POST['wen1']."',hui1='".$_POST['hui1']."' where username='".$uname."'";
	$res=mysqli_query($conn,$sql_mm1);
    if($res){
      ?> 
	    <script> alert("密码安全1---设置成功！"); window.history.go(-1);</script>
	  <?php
    }else{ echo "数据添加失败！";}
}


if(isset($_POST['wen2'])&&isset($_POST['hui2'])){
	$sql_mm2="update `usermm` set wen2='".$_POST['wen2']."',hui2='".$_POST['hui2']."' where username='".$uname."'";
	$res=mysqli_query($conn,$sql_mm2);
    if($res){
         ?> 
	    <script> alert("密码安全2---设置成功！"); window.history.go(-1);</script>
	  <?php
    }else{ echo "数据添加失败！";}

}

if(isset($_POST['oldermm'])&&isset($_POST['newmm'])&&isset($_POST['rnewmm'])){
	 $sql_omm="select password from user where username='".$uname."'";
	 $romm=mysqli_query($conn,$sql_omm);
	 if($romm){
        $odmm= array();
       while($row = mysqli_fetch_array($romm)) {
       	$odmm[]=$row;
       }
    }
	
	 foreach($odmm as $key => $value){
	 if($value[0]!=$_POST['oldermm']){
		 echo $value[0];
		 ?>
		   <script>alert("旧密码填写错误，请重新填写！"); window.history.go(-1);</script> 
		 <?php  
	  } }
	 
	 if($_POST['newmm']!=$_POST['rnewmm']){
		 ?>
		    <script>alert("新密码与确认新密码不一致，请重新填写！"); window.history.go(-1);</script>
		 <?php 
	  }
	  
	  $upmm="update `user` set password='".$_POST['newmm']."' where username='".$uname."'";
	  $newmm=mysqli_query($conn,$upmm);
	  if($newmm){
	  ?>
		<script>alert("密码修改成功！"); window.history.go(-1);</script>
	  <?php 
	  }else{
	  ?>
		<script>alert("密码修改失败，请重试！"); window.history.go(-1);</script>
	  <?php   
	  }
 }

?>



