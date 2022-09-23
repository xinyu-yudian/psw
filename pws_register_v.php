<?php 
include_once("pws_sql.php");
if (!($_POST['uname'] and $_POST['upwd'] and $_POST['rupwd'])){
	?>
	  <script type="text/javascript"> alert('信息填写不全，请重新填写！'); window.history.go(-1); </script>
	<?php
}else{
	if($_POST['upwd']!=$_POST['rupwd']){
		?>
	      <script type="text/javascript"> alert('密码与确认密码不一致，请重新填写！'); window.history.go(-1); </script>
	    <?php
	}else{  
	   $chong=$conn->query("select username from user where username ='".$_POST['uname']."'");
	   $row = mysqli_fetch_assoc($chong); 
		 if($row > 0){
			?>
	         <script type="text/javascript"> alert('该用户已存在！'); window.history.go(-1);  </script>
	        <?php
		 }else{
		   $register= "insert into `user` values(null,'".$_POST['uname']."','".$_POST['upwd']."','".date('Y-m-d')." ',null,null,null,null,null,null)";
		   $result = mysqli_query($conn,$register);
		   if ($result){
			   $gtable="CREATE TABLE  IF NOT EXISTS `".$_POST['uname']."_gtable`(
                         `gid` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                         `name` VARCHAR(30) NOT NULL,
                         `icon` mediumblob NOT NULL,
                         `dink` VARCHAR(100),
                         `remark` VARCHAR(500)
		               )ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ";


               $btable="CREATE TABLE  IF NOT EXISTS `".$_POST['uname']."_btable`(
                         `bid` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                         `name` VARCHAR(30) NOT NULL,
                         `icon` mediumblob NOT NULL,
                         `dink` VARCHAR(100),
                         `remark` VARCHAR(500)
                      )ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ";


               $qtable="CREATE TABLE  IF NOT EXISTS `".$_POST['uname']."_qtable` (
                         `qid` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                         `name` VARCHAR(30) NOT NULL,
                         `icon` mediumblob NOT NULL,
                         `dink` VARCHAR(100),
                         `remark` VARCHAR(500)
                      )ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ";
					  
					  
			   $friendstable="CREATE TABLE  IF NOT EXISTS `".$_POST['uname']."_friends` (
                         `fid` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                         `username` VARCHAR(30) NOT NULL
                      )ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ";
               $gb = mysqli_query($conn,$gtable);
			   $bb = mysqli_query($conn,$btable);
			   $qb = mysqli_query($conn,$qtable);
			   $fb = mysqli_query($conn,$friendstable);
		    ?>
	        <script type="text/javascript"> alert('恭喜您！账户已注册成功！'); window.location.href = "pws_login.php";</script>
	        <?php        
            }else{
		    ?>
	         <script type="text/javascript"> alert('账户注册失败！');window.history.go(-1); </script>
	        <?php
	      }
	   }
	}
}
?>