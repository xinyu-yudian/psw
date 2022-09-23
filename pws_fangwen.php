<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>访问</title>
<style type="text/css">

</style>
</head>


<body>
<?php

include_once("pws_sql.php");

$rtime=$conn->query("select rtime from user where username ='".$_GET['uname']."'");
$const=$conn->query("select const from user where username ='".$_GET['uname']."'");
$phone=$conn->query("select phone from user where username ='".$_GET['uname']."'");
$email=$conn->query("select email from user where username ='".$_GET['uname']."'");
$social=$conn->query("select social from user where username ='".$_GET['uname']."'");
$identity=$conn->query("select identity from user where username ='".$_GET['uname']."'");
$hphoto=$conn->query("select hphoto from user where username ='".$_GET['uname']."'");

$rconst = mysqli_fetch_array($const);
$rrtime = mysqli_fetch_array($rtime);
$rphone = mysqli_fetch_array($phone);
$remail = mysqli_fetch_array($email);
$rsocial = mysqli_fetch_array($social);
$ridentity = mysqli_fetch_array($identity);

 if($hphoto){
        $arr = array();
       while($row = mysqli_fetch_array($hphoto)) {
       	$rhphoto[]=$row;
       }
    }
 ?>
<div align="center">
  <table>
    <tr>
      <td >
      <?php 
		foreach($rhphoto as $key => $value){
		 if($value[0]!=null){
			 echo ' <img src="pws_frinds_hx.php?friendname='.$_GET['uname'].'" width="80" height="80"/>';
		}else{	   
	   ?>
         <img src="logo.png" width="80" height="80"/>
       <?php } } ?>
       </td>
        <td>星座：<?php echo $rconst[0]; ?></td>
     
    </tr>
    <tr>
       <td><?php echo $_GET['uname']; ?></td>
      <td>注册时间：<?php echo $rrtime[0]; ?></td>
    </tr>
        <tr>
        <td height="40" width="200">电话号码:<?php echo $rphone[0];?></td> 
        
        <td height="40" >邮箱: <?php echo $remail[0];;?></td>
        </tr>
        
        <tr>
        <td height="40">社交帐户:<?php echo $rsocial[0];?></td>
        
        <td height="40" colspan="2">身份:<?php echo $ridentity[0];?></td></tr>
       
  </table>

</div>






</html>