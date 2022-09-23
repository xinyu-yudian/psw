<?php 
include_once('pws_sql.php');

if(isset($_POST['da1'])){
    $h1="select hui1 from usermm where username='".$_GET['uname']."'";
    $resh1=mysqli_query($conn,$h1);
	if($resh1){
        while($row1=mysqli_fetch_row($resh1)){
			    $hui1=$row1[0];
		}
	}
	if($hui1==$_POST['da1']){
	    $sqlpwd="select password from user where username='".$_GET['uname']."'";
		  $spwd=mysqli_query($conn,$sqlpwd);
	      if($spwd){
            while($row1=mysqli_fetch_row($spwd)){
			   $pwd=$row1[0];
		   }
		  header('location:pws_wangmm.php?pwd='.$pwd.'&uname='.$_GET['uname']);
	   }
	 }
 }
 
if(isset($_POST['da2'])){
    $h2="select hui2 from usermm where username='".$_GET['uname']."'";
    $resh2=mysqli_query($conn,$h2);
	if($resh2){
        while($row2=mysqli_fetch_row($resh2)){
			    $hui2=$row2[0];
		}
	}
	if($hui2==$_POST['da2']){
	    $sqlpwd="select password from user where username='".$_GET['uname']."'";
		  $spwd=mysqli_query($conn,$sqlpwd);
	      if($spwd){
            while($row2=mysqli_fetch_row($spwd)){
			   $pwd=$row2[0];
		   }
		 header('location:pws_wangmm.php?pwd='.$pwd.'&uname='.$_GET['uname']);
	   }
	 }
 }
 
 



?>