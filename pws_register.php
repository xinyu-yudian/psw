<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册界面</title>
<link rel="stylesheet" href="pws.css">
</head>
<style type="text/css">
</style>



<body>
<div class="index-bg">

 <div class="bdiv">
  <div class="logo_box"></div>
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
      <form action="pws_register_v.php" method="post" onsubmit="return validateForm();" name="myForm">
       <p><span class="wz"> 用 &nbsp;户&nbsp;名：</span><input type="text" name="uname" placeholder="username" value="" class="input"/></p>
       <p><span class="wz"> 密 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 码：</span><input type="password" name="upwd" placeholder="password" value="" class="input"/></p>
        <p><span class="wz">确认密码：</span><input type="password" name="rupwd" placeholder="Rpassword" value="" class="input"/></p>
       <p><a href="pws_login.php"><input type="button" value="返回" class="btn"/> </a>&nbsp;&nbsp;
          <input type="submit" value="提交" class="btn"/> &nbsp;&nbsp;
          <input type="reset" value="重置" class="btn"/></p>
      </form>
    </div>
   
   
    <div align="center" class="login">REGISTER&nbsp;注册</div>
   </div>
  </div>
</div>


</body>
<script>
   function validateForm(){
	var x=document.forms["myForm"]["uname"].value;
    var regu = /^[A-Za-z_\u4E00-\u9FA5]{1,10}$/; 
    if (regu.test(x)) {
  		return true;
    } else {
 		alert("用户名只能是1-10位‘字母(大小写不限)’，‘汉字’组成！");
		return false;
    }
	
	
	var y=document.forms["myForm"]["password"].value;
	var yregu=/^[A-Za-z0-9]{1,10}$/;
	 if (yregu.test(y)) {
  		return true;
    } else {
 		alert("密码只能是1-10位‘字母(大小写不限)’,‘数字’组成！");
		return false;
    }
	
	
}
  
</script>


</html>