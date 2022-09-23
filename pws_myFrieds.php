<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的好友</title>
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

</style>
</head>

<body>
<div>
<table>
    <tr>
    <td align="left">
       <form action="pws_friends_lb.php" method="post" target="friends_selframe" onsubmit="return chaxun();" name="chaxunform">
        <input type="text" name="friends" placeholder="查找我的好友" class="input" required="required"/>
        <input type="submit" value="查询" class="btn"/>
       </form>
    </td>
    <td align="right" width="500">
       <form action="pws_insert_user.php" method="post" target="friends_selframe" onsubmit="return tianjia();" name="tianjiaform">
        <input type="text" name="tjfriends" placeholder="添加好友" class="input" required="required"/>
        <input type="submit" value="添加" class="btn"/>
       </form>
    </td>
    </tr>
    <hr/>
    <tr>
      <td align="center" colspan="2">
         <div>   
              <iframe name="friends_selframe" frameborder="0" scrolling="NO" src="pws_friends_lb.php"
               marginwidth="0" marginheight="5" width="500" height="250"></iframe>
            </div>
      </td>
    </tr>
</table>
</div>



</body>


<script>
  function chaxun(){
	var x=document.forms["chaxunform"]["friends"].value;
    var regu = /^[A-Za-z_\u4E00-\u9FA5]{1,10}$/; 
    if (regu.test(x)) {
  		return true;
    } else {
 		alert("请确认输入的软件名是否正确！");
		return false;
    }
  }
  
   function tianjia(){
	var x=document.forms["tianjiaform"]["tjfriends"].value;
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