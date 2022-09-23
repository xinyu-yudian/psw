 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户界面左</title>
<style type="text/css">
.logo_box {
		position: absolute;
		background-color: #fff;
		width: 100px;
		height: 100px;
		border-radius: 100px;
		top: 100px;
		left: 46%;
		border: solid 5px #A68364;
		text-align: center;
		left:15%;
		top:3%;
		background-size:100px;
	}

.wz{ color:#FF3;
     text-shadow: 1px 1px 1px grey;}


.btn{
    width: 70px;
    height: 35px;
    background:linear-gradient(315deg, #39F 0%, #0CF 74%);
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

ul{  list-style: none; margin:0; padding:0; line-height:40px; }

.divbg {
    margin: 5px 0;
    background-color:#FFF;
    border-radius: 20px;
    border: 1px solid #DDD;
	background: rgba(240,245,255,0.1);
    padding: 20px 20px;
    min-height: 150px;
	width:70px;
	height:150px;
}




.btn2{
    width: 70px;
    height: 35px;
    background:linear-gradient(315deg, #89d8d3 0%, #03c8a8 74%);
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
.btn2::before{
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
.btn2:hover::before{
    top: 0;
    height: 100%;
}
.btn2:active{
    top: 2px;
}

ul { margin: 0px;
    padding: 0 0 0 0;
    list-style: none;
     }
	 
.logo_box2 {
		position: absolute;
		background-color: #fff;
		width: 100px;
		height: 100px;
		left:10%;
		border-radius: 100px;
		border: solid 5px #A68364;
		background-size:100px;
	}
	

</style>



</head>


<body>
<div align="center">
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
  
  
  
   <div align="center" class="wz"><br/><br/><br/><br/><br/><br/>
      <?php
	   if(empty($_SESSION['uname'])){  //函数用于检查一个变量是否为空。
		    echo "<script> alert('请通过正确路径登录本系统!'); top.location.href='pws_login.php'; </script>";
	    }else{  echo $uname; }
	  ?>
    <ul style="line-height:0">
     <li >
      <div class="divbg" align="left" style="height:200px;">
      <ul>
		<li><a href="pws_umface_rightx.php" target="RFX"><input type="button" class="btn" value="我的仓库"  title="我的仓库"/></a></li>
        <li><a href="pws_userinfo.php" target="RFX"><input type="button" class="btn" value="我的信息"  title="我的信息"/></a></li>
        <li><a href="pws_shangchen.php" target="RFX"><input type="button" class="btn" value="应用商城"  title="应用商城"/></a></li>
        <li><a href="pws_myFrieds.php" target="RFX"><input type="button" class="btn" value="我的好友"  title="我的好友"/></a></li>
        <li><a href="pws_aboutme.php" target="RFX"><input type="button" class="btn" value="关于我们"  title="关于我们"/></a></li>
      </ul>
     </div>
    </li>
      
    <li style="line-height:4;" ><a onclick="top.location.href='pws_sdestroy.php'"><input type="button" class="btn2" value="退出登录"/></a></li>
   </ul>
   </div>
 
   
 </div>


</body>
</html>