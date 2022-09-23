<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员登录界面</title>
<link rel="stylesheet" href="pws.css">
</head>
<style type="text/css">
ul { font-size:18px;
    margin: 0px;
    padding: 0 0 0 0;
    width: 500px;
    list-style: none;
     }

ul li {
    display: inline;
       }

ul li a {
   
    padding: 11px 20px; 
    font-size: 18px;
    text-align: center;
    text-decoration: none;
    color: #FFF;    
    font-family: Tahoma;
    outline: none;
         } 
 
 .bdiv1{ width:1350px;
       position: absolute;
       left:50%;
       transform: translate(-50%, -80%);
    }
 
 
 .btn1{
    width: 60px;
    height: 30px;
    background:linear-gradient(315deg, #66F 0%, #6CF 74%);
    border: none;
    border-radius: 10px;
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
.btn1::before{
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
.btn1:hover::before{
    top: 0;
    height: 100%;
}
.btn1:active{
    top: 2px;
}

</style>



<body>

<div class="index-bg">
 <div class="bdiv1" style="top:80%;">
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
      <tr>
       <td width="280" align="center">
       <form action="pws_admin_usersl.php" method="post" target="adminframe" onsubmit="return chaxun();" name="chaxunform">
        <input type="text" name="app" placeholder="请输入查询内容" class="input" required="required"/>
        <input type="submit" value="查询" class="btn"/>
       </form>
       </td>  
       <td><a href="pws_login.php"><button  class="btn1">退出登录</button></a></td>
      </tr>
     </table>
   </div> 
    
      <div align="center">
        <ul>
        <li><a href="pws_admin_usersl.php" target="adminframe">用户信息</a><font color="#66FFFF">|</font></li>
        <li><a href="pws_admin_liuyan.php" target="adminframe">用户留言</a><font color="#66FFFF">|</font></li>
        <li><a href="pws_admin_gg.php" target="adminframe">公告设置</a></li>
       </ul>
       <hr/>
     </div>
     
     <div >
            <div>   
              <iframe name="adminframe" frameborder="0" scrolling="NO" src="pws_admin_usersl.php"
               marginwidth="0" marginheight="5" width="1300" height="400"></iframe>
            </div>

     </div>  
    
   
   
    <div align="center" class="login">Admin&nbsp;管理员</div>
    
   

  </div>
 </div>
</div>

  </body>




</html>