<?php 

include_once("pws_sql.php");  

// 查询数据库记录总数
$str1="select count(*)  from (select username,messagebod from message) as g";
 $result1 = mysqli_query($conn,$str1);     
   if($result1){      
       $row1 = mysqli_fetch_row($result1);           //将结果以数组的形式反馈给result1
       $count = $row1[0];  
	 if($count!=0){         
       $endpage = ceil($count/9);
       if(isset($_GET['page']))
       {
       	$page = (int)$_GET['page'];
       }
       else
       {
       	$page =1;
       }

  // 每次查询从第$lim条开始，查询$pageSize条
 $str = "select username,messagebod from (select username,messagebod from message) as g";
    if($page!="")
       {
       	$str .= " limit ".(($page-1)*9).",9";       //设置数据的条数
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
<title>用户留言</title>
<style type="text/css">
 .ys{ color:#FF0;}
</style>
</head>

<body>
  <div align="center">
    <table>
       <tr class="ys">
         <td width="200"  align="center">用户名</td>
         <td width="200"  align="center">留言</td>
         <td width="200"  align="center">操作</td>
       </tr>
        <?php  foreach($arr as $key => $value){?>
            <tr>
                <td  align="center"><?php echo $value[0]; ?></td>
                <td   align="center"><?php echo $value[1]; ?></td>
                <td   align="center">
                  <a href="pws_liuyan_delect.php?username=<?php echo $value[0];?>" onClick="if(confirm(\'确实要删除数据吗？\')){return true;}else{return false;}"><input type="button" value="删除"/></a>
                </td>
            </tr>
        <?php } ?>
    </table>
       <div>
         <?php if($count>0){?>
         <a href="pws_admin_liuyan.php?page=1"><input type="button" value="首页"/></a>
        <?php if($count>9){ if($page!=1){?>
         <a href="pws_admin_liuyan.php?page=<?php echo $page-1;?>)" ><input type="button" value="上一页"/></a>
        <?php } if($page!=$endpage){?>
         <a href="pws_admin_liuyan.php?page=<?php echo $page+1;?>" ><input type="button" value="下一页"/></a>
        <?php } ?>
         <a href="pws_admin_liuyan.php?page=<?php echo $endpage;?>"><input type="button" value="尾页"/></a>
        <?php }}?>
         <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;第<?php echo $page; ?>页---共<?php echo $endpage;?>页</span>
       </div>
  
  </div>
</body>
</html>


<?php
    }else{ echo "暂时没有收到用户留言！"; }
}else{echo "错误1！";}
 ?>