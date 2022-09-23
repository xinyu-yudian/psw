<?php
include_once("pws_sql.php");
session_start(); 
$uname=$_SESSION['uname'];

$action = isset($_POST['action'])? $_POST['action'] : '';


$appname=$_POST['appname'];
$addrest=$_POST['addrest'];
$type=$_POST['type'];
$remark=$_POST['remark'];

 $ansql= $select="select name from
          ((select name from ".$uname."_gtable)
            union all
	       (select name from ".$uname."_btable)
	        union all
	       (select name from ".$uname."_qtable))as a where a.name='".$_POST['appname']."'";	
		   
 $chong=mysqli_query($conn,$ansql);
  if($chong){
        $arry = array();
       while($row = mysqli_fetch_array($chong)) {
       	$arry[]=$row;
       }
  }
     if($arry!=null){
	  ?>
	    <script type="text/javascript"> alert('有同名app已存在！'); window.history.go(-1);  </script>
	  <?php
 
  }else{
if($type=='game'){
   if($action=='add'){
    $image = mysqli_escape_string($conn, file_get_contents($_FILES['applogo']['tmp_name']));  //文件被上传后在服务端储存的临时文件名
    $sqlstr = "INSERT INTO ".$uname."_gtable VALUES(null,'".$appname."','".$image."','".$addrest."','".$remark."')";
    $playsql= mysqli_query($conn,$sqlstr);
	 if ($playsql){
	    ?>
	     <script type="text/javascript"> alert('软件添加成功！'); window.history.go(-2);  </script> 
	    <?php  
	   }else{
	     ?>
	     <script type="text/javascript"> alert('软件添加失败1！'); window.history.go(-1);  </script>
	    <?php   
		   }
	 	exit();
      }
	}
	
if($type=='progra'){
   if($action=='add'){
    $image = mysqli_escape_string($conn, file_get_contents($_FILES['applogo']['tmp_name']));  //文件被上传后在服务端储存的临时文件名
    $sqlstr = "insert into `".$uname."_btable` values(null,'".$appname."','".$image."','".$addrest."','".$remark."')";
    $playsql= mysqli_query($conn,$sqlstr);
	   if ($playsql){
	     ?>
	      <script type="text/javascript"> alert('软件添加成功！'); window.history.go(-2);  </script>
	     <?php
	   }else{
	     ?>
	     <script type="text/javascript"> alert('软件添加失败2！'); window.history.go(-1);  </script>
	    <?php 
		   }
	 	exit();
      }
	}
	
if($type=='other'){
  if($action=='add'){
    $image = mysqli_escape_string($conn, file_get_contents($_FILES['applogo']['tmp_name']));  //文件被上传后在服务端储存的临时文件名
    $sqlstr = "insert into `".$uname."_qtable` values(null,'".$appname."','".$image."','".$addrest."','".$remark."')";
    $playsql= mysqli_query($conn,$sqlstr);
	  if ($playsql){
	    ?>
	     <script type="text/javascript"> alert('软件添加成功！'); window.history.go(-2);  </script>
	    <?php
	   }else{
	     ?>
	     <script type="text/javascript"> alert('软件添加失败3！'); window.history.go(-1);  </script>
	    <?php 
		   }
	 	exit();
      }
	}


	
  }


?>