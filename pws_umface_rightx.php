<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>仓库表单</title>
<style type="text/css">
.input{ margin: 8px 0;
        background-color: #ffffff;
        border-radius: 5px;
        border: 1px solid #DDD;
        padding: 2px 4px;
        min-height: 2px; 
		width:100px;
		height:23px;
        box-shadow: 1px 1px 2px 2px rgba(0,0,0,.2);} 
		
		
.btn{
    width: 70px;
    height: 35px;
    background:linear-gradient(315deg, #66F 0%, #69F 74%);
    border: none;
    border-radius: 10px;
    font-family: 'Lato', sans-serif;
    font-weight: 500;
    font-size: 14px;
    color: #fff;
    box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5),
    7px 7px 20px 0px rgba(0, 0, 0, .1),
    4px 4px 5px 0px rgba(0, 0, 0, .1);
    outline: none;
    position: relative;
    z-index: 0;
}
.btn::before{
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
.btn:hover::before{
    top: 0;
    height: 100%;
}
.btn:active{
    top: 2px;
}

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

li a:hover {
    color: #FF0;
            }

.adiv_bg {
    margin: 10px 0;
    background-color:#FFF;
    border-radius: 20px;
    border: 1px solid #DDD;
	background: rgba(255,255,255,0.2);
    padding: 3px 20px;
    min-height: 275px;

	width:670px;
}	

.btn2{
    width: 70px;
    height: 35px;
    background:linear-gradient(315deg, #66F 0%, #69F);
    border: none;
    border-radius: 10px;
    font-family: 'Lato', sans-serif;
    font-weight: 500;
    font-size: 16px;
    color: #fff;
    outline: none;
    position: relative;
    z-index: 0;
}
.btn2::before{
    position:absolute;
    content: '';
    left: 0;
    bottom:0;
    width: 100%;
    height: 0;
    transition: all 0.3s ease;
    border-radius: 10px;
    background: linear-gradient(315deg, #36F 0%, #39F 74%);
    z-index: -1;
}
.btn2:hover{
    top: 0;
    height: 100%;
    background-color: #6CF;
}
.btn2:active{
    top: 2px;
}

.tuw{ color:#FFF}


hr.style{
border-top: 1px solid  #FFF;
}


</style>

</head>

<body>
<div align="center">
     <table>
      <tr>
       <td width="280" align="center">
       <form action="pws_select_allc.php" method="post" target="selframe" onsubmit="return chaxun();" name="chaxunform">
        <input type="text" name="app" placeholder="请输入查询内容" class="input"/>
        <input type="submit" value="查询" class="btn"/>
       </form>
       </td>  
       <td width="500" align="right"><a onclick="top.location.href='pws_addApp.php'"><input type="button" value="添加APP" class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
      </tr>
     </table>
   </div> 
    <div  align="center">
	 <div align="center">
        <ul>
        <li><a href="pws_select_allc.php" target="selframe">全部</a><font color="#66FFFF">|</font></li>
        <li><a href="pws_select_games.php" target="selframe">游戏</a></li>
        <li><a href="pws_select_bcs.php" target="selframe">编程</a></li>
        <li><a href="pws_select_qitas.php" target="selframe">其他</a></li>
       </ul>
       <hr/>
     </div>
     <div align="center">
       <table>
         <tr class="tuw">
           <td width="170" align="center">图标</td>
           <td width="170" align="center">名称</td>
           <td width="270" align="center">操作</td>
         </tr>
         <tr>
            <td colspan="3" align="center">
            <div>   
              <iframe name="selframe" frameborder="0" scrolling="NO" src="pws_select_allc.php"
               marginwidth="0" marginheight="5" width="500" height="250"></iframe>
            </div>
           </td> 
           
         </tr>
       </table>
       
        <div>  
        </div>
     </div>
    </div>
    

</body>
<script>
  function chaxun(){
	var x=document.forms["chaxunform"]["app"].value;
    var regu = /^[A-Za-z_\u4E00-\u9FA5]{1,10}$/; 
    if (regu.test(x)) {
  		return true;
    } else {
 		alert("请确认输入的软件名是否正确！");
		return false;
    }
  }
</script>

</html>