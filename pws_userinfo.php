<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的信息</title>
<style type="text/css">
.yhm{ font-size:28px; color:#FF0}

body{color:#FFF; 
     display: flex;
     justify-content: center;
     align-items: center;
}

.file {
    position: relative;
    display: inline-block;
    background: #D0EEFF;
    border: 1px solid #99D3F5;
    border-radius: 4px;
    padding: 2px 2px;
    overflow: hidden;
    color: #1E88C7;
    text-decoration: none;
    text-indent: 0;
    line-height: 20px;
	width:70px;
}
.file input {
    position: absolute;
    font-size: 100px;
    right: 0;
    top: 0;
    opacity: 0;
}
.file:hover {
    background: #AADFFD;
    border-color: #78C3F3;
    color: #004974;
    text-decoration: none;
}

.zbtn{
    width: 70px;
    height: 30px;
    background:linear-gradient(315deg, #F00 0%, #C09 74%);
    border: none;
    border-radius: 5px;
    font-family: 'Lato', sans-serif;
    font-weight: 500;
    font-size: 12px;
    color: #fff;
    box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5),
    7px 7px 20px 0px rgba(0, 0, 0, .1),
    4px 4px 5px 0px rgba(0, 0, 0, .1);
    outline: none;
    position: relative;
    z-index: 0;
}


.zbtn::before{
    position:absolute;
    content: '';
    left: 0;
    bottom:0;
    width: 100%;
    height: 0;
    transition: all 0.3s ease;
    border-radius: 10px;
    background: linear-gradient(315deg, #4dccc6 0%, #96e4df 74%);
    z-index: -1;
}
.zbtn:hover::before{
    top: 0;
    height: 100%;
}
.zbtn:active{
    top: 2px;
}

.input{ margin: 8px 0;
        background-color: #ffffff;
        border-radius: 5px;
        border: 1px solid #DDD;
        padding: 2px 4px;
        min-height: 2px; width:90px;
        box-shadow: 1px 1px 2px 2px rgba(0,0,0,.2);
		vertical-align: middle;
		width:100;} 
		
input:focus, select:focus{
	border:1px solid #CCC;
	outline:none;
}


.mmbtn{
    width: 70px;
    height: 30px;
    background:linear-gradient(315deg, #F90 0%, #FC9 74%);
    border: none;
    border-radius: 5px;
    font-family: 'Lato', sans-serif;
    font-weight: 500;
    font-size: 12px;
    color: #fff;
    box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5),
    7px 7px 20px 0px rgba(0, 0, 0, .1),
    4px 4px 5px 0px rgba(0, 0, 0, .1);
    outline: none;
    position: relative;
    z-index: 0;
}
.mmbtn::before{
    position:absolute;
    content: '';
    left: 0;
    bottom:0;
    width: 100%;
    height: 0;
    transition: all 0.3s ease;
    border-radius: 10px;
    background: linear-gradient(315deg, #4dccc6 0%, #96e4df 74%);
    z-index: -1;
}
.mmbtn:hover::before{
    top: 0;
    height: 100%;
}
.mmbtn:active{
    top: 2px;
}



</style>
</head>


<body>
<?php
session_start();
$uname=$_SESSION['uname'];
include_once("pws_sql.php");
$rtime=$conn->query("select rtime from user where username ='".$uname."'");
$const=$conn->query("select const from user where username ='".$uname."'");
$phone=$conn->query("select phone from user where username ='".$uname."'");
$email=$conn->query("select email from user where username ='".$uname."'");
$social=$conn->query("select social from user where username ='".$uname."'");
$identity=$conn->query("select identity from user where username ='".$uname."'");
$hphoto=$conn->query("select hphoto from user where username ='".$uname."'");

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
      <td rowspan="3" colspan="2" width="110" align="center">
      <?php 
		foreach($rhphoto as $key => $value){
		 if($value[0]!=null){
			 echo ' <img src="pws_hphoto.php" width="100" height="100"/>';
		}else{	   
	   ?>
         <img src="logo.png" width="100" height="100"/>
       <?php } } ?>
       </td>
      <td width="150" class="yhm"><?php echo $uname; ?></td>
      <td width="200">密码：******</td>
    </tr>
    <tr>
      <td>星座：<?php echo $rconst[0]; ?></td>
      <td>注册时间：<?php echo $rrtime[0]; ?></td>
    </tr>
    <tr><td colspan="2"><hr/></td></tr>
    <tr>
      <td align="center" rowspan="5" width="150" colspan="2"  style="vertical-align:top">
      <form action="pws_userinfo_alter.php" method="post" enctype="multipart/form-data" onsubmit="return hphoto();" name="hphotoform">
		<input type="hidden" name="action" value="add"/>
		<input type="file" name="hp" class="file" required/>
		<input type="submit" value="修改" name="send"/>
	  </form>

      </td>
      <td>
        <tr>
        <td height="40" width="200">电话号码:
         <form action="pws_userinfo_alter.php" method="post" onsubmit="return dh();" name="dhform">
            <input type="text" name="phone" value="<?php echo $rphone[0];?>" placeholder="<?php echo $rphone[0];?>" class="input"/>
            <input type="submit" value="修改" />
         </form>
		</td><   
        
        <td height="40" >邮箱:
         <form action="pws_userinfo_alter.php" method="post" onsubmit="return email();" name="emailform">
            <input type="text" name="email" value="<?php echo $remail[0];?>" placeholder="<?php $remail[0];;?>" class="input"/>
            <input type="submit" value="修改" />
         </form>
         </td>
        </tr>
        
        <tr>
        <td height="40">社交帐户:
        <form action="pws_userinfo_alter.php" method="post" onsubmit="return shej();" name="shejform">
            <input type="text" name="social" value="<?php echo $rsocial[0];?>" placeholder="<?php $rsocial[0];?>" class="input"/>
            <input type="submit" value="修改" />
         </form>
         </td>
        
        <td height="40" colspan="2">身份:
          <form action="pws_userinfo_alter.php" method="post" onsubmit="return iden();" name="idenform">
            <input type="text" name="identity" value="<?php echo $ridentity[0];?>" placeholder="<?php $ridentity[0];?>" class="input"/>
            <input type="submit" value="修改" />
         </form></td>
        </tr>
        
        <tr  height="40" >
          <td></td>
          <td></td>
        </tr>
      
       </td>
    </tr>
    <tr>
    <td align="center">
     <a onclick="top.location.href='pws_mima.php'"><button class="mmbtn" id="btnmm">密码设置</button></a>
      <div id="xs" style="color:#6FF">密码安全入口</div>
    </td>
    <td align="right" colspan="3"> 
     <form action="pws_writoff.php" method="post"> 
        <input type="submit" value="注销账号" class="zbtn" id="zx"/>
     </form>
    </td></tr>
  
  
  </table>

</div>
<script type="text/javascript">

window.onload=function()
{
  var zx=document.getElementById("zx");
  zx.onclick=function()
  {
     if(confirm("确定要注销此账号吗?"))
     {
       return true;
     }else{
	   return false;
	 }
  }
}
</script>


</body>

<script>
  function  hphoto(){
	var y=document.forms["hphotoform"]["hp"].value;
    var reg = /\.(png|jpg|gif|jpeg|webp)$/;
	 if (reg.test(y)) {
  		return true;
    } else {
 		alert("头像图片格式限定为：png,jpg,jpeg,webp");
		return false;
    }
  }
  
  
  
   function  dh(){
	var y=document.forms["dhform"]["phone"].value;
    var reg = /^[1][0,1,2,3,4,5,6,7,8,9][0-9]{9}$/;
	 if (reg.test(y)) {
  		return true;
    } else {
 		alert("请确认电话号码是否为由‘1’开头的‘11’位数字组成！");
		return false;
    }
  }
  
  
  
  function  email(){
	var y=document.forms["emailform"]["email"].value;
    var reg = /^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/;
	 if (reg.test(y)) {
  		return true;
    } else {
 		alert("出错！请确认邮箱格式是否正确！");
		return false;
    }
  }
  
  
  function  iden(){
	var y=document.forms["idenform"]["identity"].value;
    var reg = /^[\u4e00-\u9fa5]{0,20}$/;
	 if (reg.test(y)) {
  		return true;
    } else {
 		alert("身份限定输入‘0-20’位汉字！");
		return false;
    }
  }
  
</script>






</html>