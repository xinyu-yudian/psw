<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>密码</title>
<link rel="stylesheet" href="pws.css">
</head>
<style type="text/css">

.bdiv2{
	    width:1500pd;
		height:800pd;
	   position: absolute;
       left:50%;
       top:80%;
       transform: translate(-50%, -80%);
    }

.inputm{ margin: 8px 0;
        background-color: #ffffff;
        border-radius: 5px;
        border: 1px solid #DDD;
        padding: 2px 4px;
        min-height: 2px; 
		width:150px;
        box-shadow: 1px 1px 2px 2px rgba(0,0,0,.2);
		vertical-align: middle;} 

inputm[type=text]:focus, select:focus{
	border:1px solid #CCC;
	outline:none;
}



	.logo_box2 {
		position: absolute;
		background-color: #fff;
		width: 100px;
		height: 100px;
		border-radius: 100px;
		border: solid 5px #A68364;
		background-size:100px;
	}
	
	
			
</style>



<body>
<?php
include_once('pws_sql.php');
session_start();
$uname=$_SESSION['uname'];
$sql_hphoto="select hphoto from user where username='".$uname."'";
$res=mysqli_query($conn,$sql_hphoto);
   if($res){
        $arr = array();
       while($row = mysqli_fetch_array($res)) {
       	$arr[]=$row;
       }
    }
	
	
						   
$seltable="select username from usermm where username='".$_SESSION['uname']."' ";	
$resle=	mysqli_query($conn,$seltable);

if($resle){ 
    while($arrs=mysqli_fetch_row($resle)){
       $chana=$arrs[0];	
     }	
	if(empty($chana)) {
       $inna="insert into `usermm` values(null,'".$_SESSION['uname']."',null,null,null,null)";
       $rinna=mysqli_query($conn,$inna);  
	  }
 }	

?>

<div class="index-bg">
      
 <div class="bdiv2">
         <div>
           <table>
             <tr><td width="850" align="center">
            <?php 
			foreach($arr as $key => $value){
				   if($value[0]==null){
					     echo "<img src='logo.png' class='logo_box2'/>";
					   }else{ echo '<img src="pws_hphoto.php"  class="logo_box2"/>';}  }?>
             </td></tr>
             </table>
         </div>
  <div class="adiv_bg">
    <div align="center">
       
       <table>
       <tr><td height="40"></td></tr>
         <tr><td class="title" align="center">个人软件仓库</td></tr>
         <tr><td class="ftitle" valign="top" align="center">Perdinal Software Repository</td></tr>
         <tr><td height="20"></td></tr>
       </table>
    </div>
    <div align="center">
    <table>
     <tr><td align="left" colspan="2">
     <button class="btn" onclick="fanhui()">返回</button>
      <script>
        function fanhui(){
		  window.history.go(-1);
		  }
   
      </script>
     </td></tr>
     <tr>
      <td style="border-right:#cccccc solid 1px;">
     
       <table>
         <tr><td colspan="2" align="center" width="500"><h3>自定义密码验证</h3></td></tr>
         <tr><td align="center">
          <form action="pws_mima_yz.php" method="post" onsubmit="return wen1();" name="wen1form">
         <table align="center">
         <tr><td>我的提问(1)：<input type="text" name="wen1" class="inputm" required="required"/></td></tr>
         <tr><td>我的回答(1)：<input type="text" name="hui1" class="inputm" required="required"/></td></tr>
         <tr><td align="center" colspan="2"><input type="submit" value="提交" /></td></tr>
          </table>
           </form>
        </td></tr>
         <tr><td style="border-bottom:#cccccc solid 1px;"></td></tr>
          <tr><td align="center">
           <form action="pws_mima_yz.php" method="post" onsubmit="return wen2();" name="wen2form">
         <table align="center">
          <tr><td align="right">我的提问(2)：</td><td align="left"><input type="text" name="wen2" class="inputm" required="required"/></td></tr>
          <tr><td align="right">我的回答(2)：</td><td align="left"><input type="text" name="hui2" class="inputm" required="required"/></td></tr> 
          <tr><td align="center" colspan="2"><input type="submit" value="提交" /></td></tr>
         </table>
             </form>
        </td></tr>
       </table>
    
      </td>
      <td width="500" align="center">
        <form action="pws_mima_yz.php" method="post" onsubmit="return validateForm();" name="mmform">
         <table>
         <tr><td colspan="2" align="center"><h3>修改密码</h3></td></tr>
          <tr><td align="right">旧密码：</td><td align="left">
            <input type="password" name="oldermm" required="required" class="inputm"/>
          </td></tr>
          <tr><td align="right">新密码：</td><td align="left">
            <input type="password" name="newmm" required="required" class="inputm"/> 
          </td></tr>
          <tr><td align="right">确认密码：</td><td align="left">
            <input type="password" name="rnewmm" required="required" class="inputm"/>
           </td></tr>
          <tr><td align="center" colspan="2" height="50">
             <input type="submit" value="提交" />&nbsp;&nbsp;&nbsp;
            <input type="reset" value="重置" />
          </td></tr>
         </table>
         </form>
      </td>
      </tr>
      </table>
    </div><br/><br/>
    <div align="center"> <?php  if($resle){echo "密码安全已开启！";}else{ echo "密码安全开启失败，请联系管理员检查！";}?></div> <br />
    <div align="center" class="login">Password Settings&nbsp;密码设置</div>
  </div>
 </div>
</div> 


</body>


<script>
   function wen1(){
	    var x=document.forms["wen1form"]["wen1"].value;
        var regu = /^[A-Za-z_\u4E00-\u9FA5]{1,50}$/; 
        if (regu.test(x)) {
  		  return true;
        } else {
 		  alert("提问限于字母与汉字（100位）");
		  return false;
        }
	   
	   
	    var x=document.forms["wen1form"]["hui1"].value;
        var regu = /^[A-Za-z_\u4E00-\u9FA5]{1,50}$/; 
        if (regu.test(x)) {
  		  return true;
        } else {
 		  alert("回答限于字母与汉字（100位）");
		  return false;
        }
	   
	  }


 function wen2(){
	    var x=document.forms["wen2form"]["wen2"].value;
        var regu = /^[A-Za-z_\u4E00-\u9FA5]{1,50}$/; 
        if (regu.test(x)) {
  		  return true;
        } else {
 		  alert("提问限于字母与汉字（100位）");
		  return false;
        }
	   
	   
	    var x=document.forms["wen2form"]["hui2"].value;
        var regu = /^[A-Za-z_\u4E00-\u9FA5]{1,50}$/; 
        if (regu.test(x)) {
  		  return true;
        } else {
 		  alert("回答限于字母与汉字（100位）");
		  return false;
        }
	   
	  }







   function validateForm(){
	var x=document.forms["mmform"]["oldermm"].value;
    var regu = /^[A-Za-z0-9]{1,10}$/; 
    if (regu.test(x)) {
  		return true;
    } else {
 		alert("旧密码错误！密码只能是1-10位‘字母(大小写不限)’,‘数字’组成！");
		return false;
    }
	
	
	var y=document.forms["mmform"]["newmm"].value;
	var yregu=/^[A-Za-z0-9]{1,10}$/;
	 if (yregu.test(y)) {
  		return true;
    } else {
 		alert("新密码错误！密码只能是1-10位‘字母(大小写不限)’,‘数字’组成！");
		return false;
    }
	
	
}
  
</script>

</html>