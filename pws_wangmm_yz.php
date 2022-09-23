<?php 
 include_once('pws_sql.php');
 $a=1;
 
 if(isset($_POST['username'])){
	 $chaname="select username from user where username='".$_POST['username']."'";
     $resname=mysqli_query($conn,$chaname);
	 if($resname){
	    $arr = array();
          while($row = mysqli_fetch_array($resname)) {
       	      $arr[]=$row; 
		   }
		  foreach($arr as $key => $value){ $uname=$value[0]; }
		  if($uname!=$_POST['username']){
			  ?>
		      <script> alert('用户不存在！'); window.history.go(-1);</script> 
		      <?php
			  $a=0;
		   } 
	  }else{
		 ?>
		  <script> alert('用户不存在！'); window.history.go(-1);</script> 
		 <?php
		 echo "错误！";
		  $a=0;
	   }
	  
	  $chamm="select username from usermm";
	  $resmm=mysqli_query($conn,$chamm);
	  if(!$resmm){
		 ?>
		   <script> alert('该用户未开启密码安全功能！'); window.history.go(-1);</script>
		 <?php
		  $a=0;
	  }
	  	  
    }
 
     if($a==1){header('location:pws_wangmm.php?uname='.$uname);}
	 

?>
