<?php 
session_start();
include_once("pws_sql.php");  

if(isset($_POST['app']))
{  $select="select * from user where a.name='".$_POST['app']."'";	
   $res=mysqli_query($conn,$select);
   if($res){
        $arr = array();
       while($row = mysqli_fetch_array($res)) {
       	$arr[]=$row;
       }
    
	echo '<table style="line-height:5px; width:1300px; height:300px;"> 
          <tr style="color:#FF0">
           <td width="80"  align="center">头像</td>
           <td width="80" align="center">用户名</td>
           <td width="80" align="center">密码</td>
           <td width="80" align="center">注册时间</td>
           <td width="80" align="center">星座</td>
           <td width="80" align="center">电话号码</td>
           <td width="80" align="center">邮箱</td>
           <td width="80" align="center">社交帐户</td>
           <td width="80" align="center">身份</td>
		   <td width="80" align="center">操作</td>
         </tr> ';
	  foreach($arr as $key => $value){
		if($value[0]!=null){
			
		 echo "<tr>"; 
	     echo '<td width="130" align="center">';
		   
	 $sql_hphoto="select hphoto from user where username='".$value[1]."'";
    $resh=mysqli_query($conn,$sql_hphoto);
   if($resh){
        $arrh = array();
       while($rowh = mysqli_fetch_array($resh)) {
       	$arrh[]=$rowh;
       }
    }
   foreach($arrh as $keyh => $valueh){
		 if($valueh[0]==null){
				 echo "<img src='logo.png' width='50' height='50'/>";
		 }else{ echo '<img src="pws_admin_hphoto.php?uname='.$value[1].'" width="50" height="50"/>';}  }
		 
		 echo '</td>';
         echo '<td width="80" align="center">'.$value[1].' </td>';
		 echo '<td width="80" align="center">'.$value[2].' </td>';
		 echo '<td width="80" align="center">'.$value[3].' </td>';
		 echo '<td width="80" align="center">'.$value[4].' </td>';
		 echo '<td width="80" align="center">'.$value[5].' </td>';
		 echo '<td width="80" align="center">'.$value[6].' </td>';
		 echo '<td width="80" align="center">'.$value[7].' </td>';
		 echo '<td width="80" align="center">'.$value[8].' </td>';
	   
	   
	     echo '<td width="80" align="center"><a href=""><button>删除</button></a></td>';
         
		 
		 echo "</tr>"; 
		 echo "<tr><td colspan='9'><hr style='height:5px;border:none;border-top:2px dotted #FFF;' /></td></tr>"; 
	   }else{  echo "您查询数据不存在！";}
	 }
	
	echo "</table>";
   }else{ echo "您查询的app不存在！";;}
}else{
// 查询数据库记录总数
$str1="select count(*) as total from user";
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
 $str = "select * from user ";
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
<title>展示所有用户</title>
<style type="text/css">
.kong{ color:#FFF; font-size:18px;}
body{ color:#FFF;}
</style>


</head>
 
<body>
   <div align="center">
    <table style=" width:1300px; height:300px;"> 
          <tr style="color:#FF0">
           <td width="80" align="center">头像</td>
           <td width="80" align="center">用户名</td>
           <td width="80" align="center">密码</td>
           <td width="80"align="center">注册时间</td>
           <td width="80" align="center">星座</td>
           <td width="80" align="center">电话号码</td>
           <td width="80" align="center">邮箱</td>
           <td width="80" align="center">社交帐户</td>
           <td width="80" align="center">身份</td>
           <td width="80" align="center">操作</td>
         </tr
        <?php  foreach($arr as $key => $value){?>
            <tr>
                <td width="130" height="52" align="center">
                    <?php 
	 $sql_hphoto="select hphoto from user where username='".$value[1]."'";
    $resh=mysqli_query($conn,$sql_hphoto);
   if($resh){
        $arrh = array();
       while($rowh = mysqli_fetch_array($resh)) {
       	$arrh[]=$rowh;
       }
    }
   foreach($arrh as $keyh => $valueh){
		 if($valueh[0]==null){
				 echo "<img src='logo.png' width='50' height='50'/>";
		 }else{ echo '<img src="pws_admin_hphoto.php?uname='.$value[1].'" width="50" height="50"/>';}  }?>
                </td>
                <td width="80" align="center"><?php echo $value[1]; ?></td>
                <td width="80" align="center"><?php echo $value[2]; ?></td>
                <td width="80" align="center"><?php echo $value[3]; ?></td>
                <td width="80" align="center"><?php echo $value[4]; ?></td>
                <td width="80" align="center"><?php echo $value[5]; ?></td>
                <td width="80" align="center"><?php echo $value[6]; ?></td>
                <td width="80" align="center"><?php echo $value[7]; ?></td>
                <td width="80" align="center"><?php echo $value[8]; ?></td>
                
                <td width="80" align="center"><a href=""><button>删除</button></a></td>
                
            </tr>
            <tr><td colspan="10"><hr style=" height:5px;border:none;border-top:2px dotted #FFF;" /></td></tr>
        <?php } ?>
    </table>
       <div>
         <?php if($count>0){?>
         <a href="pws_admin_usersl.php?page=1"><input type="button" value="首页"/></a>
        <?php if($count>2){ if($page!=1){?>
         <a href="pws_admin_usersl.php?page=<?php echo $page-1;?>)" ><input type="button" value="上一页"/></a>
        <?php } if($page!=$endpage){?>
         <a href="pws_admin_usersl.php?page=<?php echo $page+1;?>" ><input type="button" value="下一页"/></a>
        <?php } ?>
         <a href="pws_admin_usersl.php?page=<?php echo $endpage;?>"><input type="button" value="尾页"/></a>
        <?php }}?>
         <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;第<?php echo $page; ?>页---共<?php echo $endpage;?>页</span>
       </div>
    </div>
</body>



</html>



<?php
    }else{ echo "亲，您查询的数据不存在哦~"; }
}else{echo "错误1！";}

}
 ?>