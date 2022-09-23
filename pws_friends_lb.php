<?php 
session_start();
$uname=$_SESSION['uname'];
include_once("pws_sql.php");  

if(isset($_POST['friends']))
{  $select="select username from user where username='".$_POST['friends']."'";	
   $res=mysqli_query($conn,$select);
   if($res){
        $arr = array();
       while($row = mysqli_fetch_array($res)) {
       	$arr[]=$row;
       }
    
	echo " <table style='line-height:5px;'> ";
	  foreach($arr as $key => $value){
		if($value[0]!=null){
		 echo "<tr>"; 
	     echo '<td width="220" align="left"><img src="pws_icon.php?name='.$value[0].'" width="50" height="50"></td>';
         echo '<td width="120" align="left">'.$value[0].' </td>';
         echo  '<td width="270" align="right"> '; 
            echo '<a href=""><input type="button" value="访问" /></a>
                  <a href="pws_delect.php?appname=<?php echo $value[0];?>" onClick="if(confirm(\'确实要删除数据吗？\')){return true;}else{return false;}"><input type="button" value="删除"/></a>
                </td>';
		 
		 echo "</tr>"; 
		 echo "<tr><td colspan='3'><hr style='height:5px;border:none;border-top:2px dotted #FFF;' /></td></tr>"; 
	   }else{  echo "您查询的好友不存在！";}
	 }
	
	echo "</table>";
   }else{ echo "您查询的好友不存在！";;}
}else{
	
	
// 查询数据库记录总数
$str1="select count(*)  from (select username  from ".$uname."_friends) as g";
 $result1 = mysqli_query($conn,$str1);     
   if($result1){      
       $row1 = mysqli_fetch_row($result1);           //将结果以数组的形式反馈给result1
       $count = $row1[0];  
	 if($count!=0){         
       $endpage = ceil($count/3);
       if(isset($_GET['page']))
       {
       	$page = (int)$_GET['page'];
       }
       else
       {
       	$page =1;
       }

  // 每次查询从第$lim条开始，查询$pageSize条
 $str = "SELECT username FROM ".$uname."_friends";
    if($page!="")
       {
       	$str .= " limit ".(($page-1)*3).",3";       //设置数据的条数
       }
       $result = mysqli_query($conn,$str);
	   if($result){
        $arr = array();
       while($row = mysqli_fetch_array($result)) {
       	$arr[]=$row;
       }
	   }else{ echo "错误2!";}
     

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>好友列表</title>
</head>

<body>
 <div align="center">
    <table style="line-height:5px;"> 
        <?php  foreach($arr as $key => $value){?>
            <tr>
                <td width="80" align="left"><img src="pws_frinds_hx.php?friendname=<?php echo $value[0]; ?>" width="50" height="50">' </td>
                <td width="80"align="left"><?php echo $value[0]; ?></td>
                <td width="150"align="left">
                  <a href="pws_fangwen.php?uname=<?php echo  $value[0];?>"><input type="button" value="访问" /></a>
                  <a href="pws_delect_friends.php?friendsname=<?php echo $value[0];?>" onClick="if(confirm(\'确实要删除该好友吗？\')){return true;}else{return false;}"><input type="button" value="删除好友"/></a>
                </td>
            </tr>
            <tr><td colspan="3"><hr style=" height:5px;border:none;border-top:2px dotted #FFF;" /></td></tr>
        <?php } ?>
    </table>
       <div>
         <?php if($count>0){?>
         <a href="pws_friends_lb.php?page=1"><input type="button" value="首页"/></a>
        <?php if($count>3){ if($page!=1){?>
         <a href="pws_friends_lb.php?page=<?php echo $page-1;?>)" ><input type="button" value="上一页"/></a>
        <?php } if($page!=$endpage){?>
         <a href="pws_friends_lb.php?page=<?php echo $page+1;?>" ><input type="button" value="下一页"/></a>
        <?php } ?>
         <a href="pws_friends_lb.php?page=<?php echo $endpage;?>"><input type="button" value="尾页"/></a>
        <?php }}?>
         <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;第<?php echo $page; ?>页---共<?php echo $endpage;?>页</span>
       </div>
    </div>
</body>




</html>

<?php
    }else{ echo "亲，您还没有添加好友哦，赶快去添加你的小伙伴吧"; }
}else{echo "错误1！";}

}
 ?>