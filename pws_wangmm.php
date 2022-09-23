<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登陆界面</title>
<link rel="stylesheet" href="pws.css">
</head>
<style type="text/css">


 .ya{
   
    padding: 11px 20px; 
    font-size: 18px;
    text-align: center;
    color: #FFF;    
    font-family: Tahoma;
    outline: none;
         }

 .ya:hover {
    color: #FF0;
            }
			
 ul{ line-height:0;
     margin: 0px;
     padding: 0 0 0 0;
     list-style: none;}
	 
  .yzk{ vertical-align: middle;}	 

</style>



<body>
<?php
  include_once('pws_sql.php');
  $uname=null;
  if(isset($_GET['uname'])){
	   $uname=$_GET['uname'];
	    $cha1="select wen1,hui1 from usermm  where username='".$uname."'";
	    $cha2="select wen2,hui2 from usermm  where username='".$uname."'";
	    $rescha1=mysqli_query($conn,$cha1);
		$rescha2=mysqli_query($conn,$cha2);
		
		if($rescha1){
            while($row1=mysqli_fetch_row($rescha1)){
			    $wen1=$row1[0];
				$hui1=$row1[1];
			  }
		 }else{ echo "wen1错误！";}
		 
		 if($rescha2){
			  while($row2=mysqli_fetch_row($rescha2)){
			    $wen2=$row2[0];
				$hui2=$row2[1];
			  }
		 }else{ echo "wen2错误！";}
	 }
   
  
?>


<div class="index-bg">
 <div class="bdiv" style="top:70%;">
  <div class="logo_box"></div>
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
     <?php if(!isset($_GET['uname'])){  ?>
       <table>
             <tr>
               <td>请输入您的用户名：
               <form action="pws_wangmm_yz.php" method="post">
                <input type="text" name="username" required="required" placeholder="<?php $uname;?>"/>
                <input type="submit" value="提交" />
               </form>
               </td>
             </tr>
       </table>
      <?php }else{ 
	        echo "用户<span><</span>".$_GET['uname']."<span>></span>的忘记验证";
	     }
	  ?>
       <hr />
      
      <?php 
	      if(isset($_GET['pwd'])){
		       echo "密码验证成功！您的密码是：<font color='#FF0000'>".$_GET['pwd']."</font><br>";
		       echo "为了您的账户安全，请获取密码后退出本页面！<br>";
		    }else{ 
	   ?>
       
      <form action="pws_wangmm_up.php?uname=<?php echo $uname;?>" method="post">
         <table align="center">
          <?php if(isset($wen1)&&isset($hui1)){ ?>
             <tr>
               <td>请回答我的提问1：<?php echo $wen1; ?></td>
             </tr>
             <tr>
               <td align="center"><input type="text" name="da1" class="input" required="required"/></td>
             </tr>
          <?php }else{ echo "<tr><td align='center'>空</td></tr>";} ?>  
          <?php if(isset($wen2)&&isset($hui2)){ ?> 
              <tr  style="border-top:dashed">
               <td>请回答我的提问2：<?php echo $wen2; ?> </td>
             </tr>
             <tr>
               <td align="center"><input type="text" name="da2" class="input" required="required"/></td>
             </tr>
           <?php }else{ echo "<tr><td align='center'>空</td></tr>";} ?>  
           <?php if(isset($_GET['uname'])){ ?> 
             <tr>
               <td align="center">
                 <input type="submit" value="提交"/>
                 <input type="reset" value="重置"/>
               </td>
             </tr>
            <?php } ?>  
         </table>
       </form>
       <?php } ?>
    </div>
     <div align="left"><a href="pws_login.php"><input type="button" value="返回" class="btn"/></a></div>
          
    
    
    
    </div>
  </div>
 </div>
    
</body>



</html>