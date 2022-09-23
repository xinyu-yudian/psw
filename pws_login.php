<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登陆界面</title>
<link rel="stylesheet" href="pws.css">

</head>
<style type="text/css">


 .ya{
   
    padding: 11px 20px; 
    font-size: 18px;
    text-align: center;
    color: #FFF;    
    font-family: Tahoma;
    outline: none;
         }

 .ya:hover {
    color: #FF0;
            }
			
 ul{ line-height:0;
     margin: 0px;
     padding: 0 0 0 0;
     list-style: none;}
	 
  .yzk{ vertical-align: middle;}	


 
</style>



<body>

<div class="index-bg">
 <div class="bdiv" style="top:70%;">
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
      
      <form action="pws_login_v.php" method="post">
       <p><span class="wz">用户名：</span><input type="text" name="uname" placeholder="username" value="" class="input"/></p>
       <p><span class="wz">密&nbsp;&nbsp;&nbsp;码：</span><input type="password" name="upwd" placeholder="password" value="" class="input"/></p>
       <ul>
       <li><span class="wz">验证码：<input type="text" name="yzm" class="input" placeholder="Enter Code"/></span></li>
       <li>
         <span>
         <table><tr>
          <td align="center" style="top:20%;"> <a href="pws_code.php" target="yzframe"><input type="button" value="换一个" class="yzk"/></a></td>
          <td>
          <iframe name="yzframe" frameborder="0" scrolling="NO" src="pws_code.php"
            marginwidth="0" marginheight="5" width="90" height="30">
          </iframe>
          </td></tr></table>
         </span>
       </li>
       </ul>
       <p><input type="submit" value="登录" class="btn"/> &nbsp;&nbsp;&nbsp;&nbsp;
          <a href="pws_register.php"><input type="button" value="注册" class="btn"/></a>
       </p>    
       <p><a href="pws_wangmm.php" class="ya">忘记密码</a></p>
      </form>
    </div>
    <div align="center" class="login">LOGIN&nbsp;登录</div>
   </div>
  </div>
</div>



<?php 


?>


</body>



</html>