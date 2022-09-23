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
		left:43%;
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
      <form action="pws_liyan_yz.php" method="post">
      <table>
       <tr><td align="center" height="80"><font size="+2" color="#FFFF00">用户留言板</font></td></tr>
     
       
       <tr><td>
         <textarea id="message" name="message" placeholder="请输入你的留言，我们将为你提供最快的服务" cols="80" rows="10" required="required"></textarea>
       </td></tr>  
       <tr><td align="center" height="100">
          <a href="pws_umface.php"><input type="button" value="返回" class="btn"/> </a>&nbsp;&nbsp;&nbsp;&nbsp;
         <input type="submit" value="提交" class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;
         <input type="reset" value="重置"   class="btn"/>
       </td></tr>
       </table>
       </form>
    </div>
    <div align="center" class="login">Leave a message to the administrator&nbsp向管理员留言</div>
   </div>
  </div>
</div>
</body>


</html>