<?php 
include_once("pws_sql.php");
session_start();
$uname=$_SESSION['uname'];
$action = isset($_POST['action'])? $_POST['action'] : '';

if(isset($_POST['phone'])){
	$sql="update user set phone='".$_POST['phone']."' where username='".$uname."'";
	$result=mysqli_query($conn,$sql);
	echo "<script type='text/javascript'> window.history.go(-1); </script>";
  }else
 if(isset($_POST['email'])){
	$sql="update user set email='".$_POST['email']."' where username='".$uname."'";
	$result=mysqli_query($conn,$sql);
	echo "<script type='text/javascript'> window.history.go(-1); </script>";
  }else
  
 if(isset($_POST['social'])){
	$sql="update user set social='".$_POST['social']."' where username='".$uname."'";
	$result=mysqli_query($conn,$sql);
    echo "<script type='text/javascript'> window.history.go(-1); </script>";
  }else
  
  if(isset($_POST['identity'])){
	$sql="update user set identity='".$_POST['identity']."' where username='".$uname."'";
	$result=mysqli_query($conn,$sql);
	echo "<script type='text/javascript'> window.history.go(-1); </script>";
  }else
     if($action=='add'){
                  $image = mysqli_escape_string($conn, file_get_contents($_FILES['hp']['tmp_name']));
	              $sql="update user set hphoto='".$image."' where username='".$uname."'";
	              $result=mysqli_query($conn,$sql);
	              echo "<script type='text/javascript'> window.history.go(-1); </script>";               
  }else{ echo "错误！提交了空表单！！";} 

?>