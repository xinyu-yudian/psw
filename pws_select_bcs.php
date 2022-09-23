<?php 
session_start();
$uname=$_SESSION['uname'];
include_once("pws_sql.php");  

// 查询数据库记录总数
$str1="select count(*)  from (select icon,name,dink from ".$uname."_btable) as b";
 $result1 = mysqli_query($conn,$str1);     
   if($result1){      
       $row1 = mysqli_fetch_row($result1);           //将结果以数组的形式反馈给result1
       $count = $row1[0];  
	 if($count!=0){         
       $endpage = ceil($count/2);
       if(isset($_GET['page']))
       {
       	$page = (int)$_GET['page'];
       }
       else
       {
       	$page =1;
       }

  // 每次查询从第$lim条开始，查询$pageSize条
 $str = "select icon,name,dink from (select icon,name,dink from ".$uname."_btable) as b";
    if($page!="")
       {
       	$str .= " limit ".(($page-1)*2).",2";       //设置数据的条数
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
<title>bc</title>
<style type="text/css">
.kong{ color:#FFF; font-size:18px;}
body{ color:#FFF;}
</style>


</head>
 
<body>
   <div align="center">
    <table style="line-height:5px;"> 
        <?php  foreach($arr as $key => $value){?>
            <tr>
                <td width="220" align="left"><img src="pws_icon.php?name=<?php echo $value[1]; ?>" width="50" height="50">' </td>
                <td width="120" align="left"><?php echo $value[1]; ?></td>
                <td width="270" align="right">
                  <button onclick=" top.location='<?php echo $value[2];?>';">官网下载</button></a>
                  <a href=""><input type="button" value="查看" /></a>
                  <a href="pws_delect.php?appname=<?php echo $value[1];?>" onclick="if(confirm(\'确实要删除数据吗？\')){return true;}else{return false;}"><input type="button" value="删除"/></a>
                </td>
            </tr>
            <tr><td colspan="3"><hr style=" height:5px;border:none;border-top:2px dotted #FFF;" /></td></tr>
        <?php } ?>
    </table>
       <div>
         <?php if($count>0){?>
         <a href="pws_select_bcs.php?page=1"><input type="button" value="首页"/></a>
        <?php if($count>2){ if($page!=1){?>
         <a href="pws_select_bcs.php?page=<?php echo $page-1;?>)" ><input type="button" value="上一页"/></a>
        <?php } if($page!=$endpage){?>
         <a href="pws_select_bcs.php?page=<?php echo $page+1;?>" ><input type="button" value="下一页"/></a>
        <?php } ?>
         <a href="pws_select_bcs.php?page=<?php echo $endpage;?>"><input type="button" value="尾页"/></a>
        <?php }}?>
        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;第<?php echo $page; ?>页---共<?php echo $endpage;?>页</span>
       </div>
    </div>
</body>



</html>



<?php
    }else{ echo "亲，您还没有添加任何数据哦~"; }
}else{echo "错误1！";}
 ?>