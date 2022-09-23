<?php
  include_once('pws_sql.php');
  session_start();
  $uname=$_SESSION['uname'];
  $pf=0;
 if(isset($_POST['tjfriends'])){
	if($_POST['tjfriends']!=$uname){
        $slesql="select username from user where username='".$_POST['tjfriends']."'";
        $resle=mysqli_query($conn,$slesql);  
  
       if($resle){
          $arr1 = array();
          while($row1 = mysqli_fetch_array($resle)) {
          $arr1[]=$row1;
           }
	     if($arr1==null){
			  ?>
	        <script type="text/javascript"> alert('您要添加的好友不存在！'); window.history.go(-1); </script>
	        <?php
          
         }else{
			$selfrs="select username from ".$uname."_friends";
			$resfrs=mysqli_query($conn,$selfrs);
			if($resfrs){
				  $arr2 = array();
                  while($row2 = mysqli_fetch_array($resfrs)) {
                   $arr2[]=$row2;
                  }
			   for($i=0;$i<count($arr2);$i++){
				     if($arr2[$i]==$_POST['tjfriends']){
						 $pf=1;   
					 }
				  }
			   }else{ 
			     ?>
	             <script type="text/javascript"> alert('好友添加失败3！'); window.history.go(-1); </script>
	             <?php  
			   }
			if($pf==0){
				$insqlt="insert into ".$_POST['tjfriends']."_friends values(null,'".$uname."')";
				 $rest=mysqli_query($conn,$insqlt);
			 $insql="insert into ".$uname."_friends values(null,'".$_POST['tjfriends']."')";
			    $res=mysqli_query($conn,$insql);
	          if($res){
               ?>
	           <script type="text/javascript"> alert('好友添加成功！'); window.history.go(-1); </script>
	          <?php   
               }
			}else{
				 ?>
	               <script type="text/javascript"> alert('该用户已经是你的好友了！'); window.history.go(-1); </script>
	              <?php
				}
	    }
		 
	   }else{
		   ?>
	        <script type="text/javascript"> alert('好友添加失败1！'); window.history.go(-1); </script>
	        <?php 
		   }
     }else{
		 ?>
	     <script type="text/javascript"> alert('您输入的是自己的用户名！'); window.history.go(-1); </script>
	     <?php
		  }
 
 }else{
	?>
	<script type="text/javascript"> alert('好友添加失败2！'); window.history.go(-1); </script>
	<?php    
   }
?>