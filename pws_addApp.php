<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加APP</title>
<link rel="stylesheet" href="pws.css">
</head>
<style type="text/css">
.input2{ margin: 8px 0;
        background-color: #ffffff;
        border-radius: 5px;
        border: 1px solid #DDD;
        padding: 2px 4px;
        min-height: 2px; width:90px;
        box-shadow: 1px 1px 2px 2px rgba(0,0,0,.2);
		width:150px;} 
		
.input3{ margin: 8px 0;
        background-color: #ffffff;
        border-radius: 5px;
        border: 1px solid #DDD;
        padding: 2px 4px;
        min-height: 2px; width:90px;
        box-shadow: 1px 1px 2px 2px rgba(0,0,0,.2);
		width:180px;} 

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
	width:180px;
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

.bdiv2{ position: absolute;
       left:50%;
       top:70%;
       transform: translate(-50%, -80%);
    }
	
	.logo_box2 {
		position: absolute;
		background-color: #fff;
		width: 100px;
		height: 100px;
		left:35%;
		border-radius: 100px;
		border: solid 5px #A68364;
		background-size:100px;
	}		
</style>



<body>
<div class="index-bg">

 <div class="bdiv2">
    <!--<div> <img src="pws_hphoto.php" class="logo_box"/></div>  -->
     <div style="line-height:1">
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
   foreach($arr as $key => $value){
		 if($value[0]==null){
				 echo "<img src='logo.png' class='logo_box2'/>";
		 }else{ echo '<img src="pws_hphoto.php"  class="logo_box2"/>';}  }?>
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
      <form action="pws_addApp_v.php" method="post" enctype="multipart/form-data"  name="myForm" onsubmit="return fn1();">
       <p><span class="wz">软件名：</span><input type="text" name="appname" placeholder="appname" value="" class="input" maxlength="50" required/></p>
       <p><span class="wz">添加图标：</span><input type="file" name="applogo" placeholder="上传图标" class="file" required/></p>
       <p><span class="wz">下载地址：</span><input type="text" name="addrest" placeholder="app下载地址" class="input3" maxlength="50" required/></p>
       <p>
         <span class="wz">app类别：</span>
          <select name="type">
            <option value="game">游戏</option>
            <option value="progra">编程</option>
            <option value="other">其他</option>
          </select>
       </p>
       <p>
         <textarea rows="3" cols="30" placeholder="添加备注" name="remark" required></textarea>
       </p>
       
       <p><a href="pws_umface.php"><input type="button" value="返回" class="btn"/> </a>&nbsp;&nbsp;
          <input type="hidden" name="action" value="add">
          <input type="submit" value="提交" class="btn"/> &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="reset" value="重置" class="btn"/>
       </p> 
      </form>
    </div>
    <div align="center" class="login">Add The Software&nbsp;添加软件</div>
   </div>
  </div>
</div>
</body>
<script>

    //设置开关
    var appname1=0;
    var applogo1=0;
    var addrest1=0;
    var remark1=0;
 
    //获取appname
    var appname=document.getElementsByName('appname').value;
    //获取图标
    var applogo=document.getElementsByName('applogo').value;
    //获取地址
    var addrest=document.getElementsByName('addrest').value;
    //获取备注
    var remark=document.getElementsByName('remark').value;
    
    //验证账号
    //分别给该对象绑定失去焦点事件
    appname.addEventListener= function () {
        var str1=appname.value
        var reg1=/^[a-zA-Z_\u4e00-\u9fa5]{1,10}$/;
        if(!reg1.test(str1)){
			
            appname1=0;
        }else{
            appname1=1;
        }
    }
	
    //验证logo
    applogo.addEventListener=function(){
        var str2=applogo.value;
        var reg2=/\.(png|jpeg|jpg|PNG|JPEG|JPG)$/;
        if(!reg2.test(str2)){  
            applogo1=0;
        }else{
            applogo1=1;
        }
    }

     //验证地址
     addrest.addEventListener=function(){
        var str3=addrest.value;
        var reg3=/^((https|http|ftp|rtsp|mms)?:\/\/)+[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"\"])*/;
       if(!reg3.test(str3)){        
            addrest1=0;
        }else{
            addrest1=1;
        }
    }

    //验证备注
    remark.addEventListener=function(){
        var str4=remark.value;
        var reg4=/^[a-zA-Z_\u4e00-\u9fa5]{1,50}$/;
        if(!reg4.test(str4)){ 
            remark1=0;
        }else{
            remark1=1;
        }
    }

   

    function fn1(){
        if(appname1==1 && applogo==1 && addrest==1 && remark==1){
            return true;
        }else{
			 if(appname1!=1){  alert("<"+str1+">错误！软件名只能是1-10位‘字母(大小写不限)’，‘汉字’组成！"); }
			 else if(applogo1!=1){ alert("<"+str2+">错误！图片格式限定为：png,jpg,jpeg,webp");}
			 else if(addrest1!=1){ alert("<"+str3+">错误！请确定下载地址是否为有效链接！");}
			 else if(remark1!=1){  alert("<"+str4+">错误！备注只能是1510位‘字母(大小写不限)’，‘汉字’组成！");}
			 else { alert('app内容不符合规定！'); }
            return false;
        }
    }

  
</script>


</html>