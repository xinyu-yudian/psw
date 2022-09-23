<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>广告</title>
</head>

<body>

<div align="center">

<form action="pws_admin_gg.php" method="post" enctype="multipart/form-data">
  <table>
    <tr><td>图1：<input type="file" name="tu1" required="required"/></td></tr>
    <tr><td>图2：<input type="file" name="tu2" required="required"/></td></tr>
    <tr><td>图3：<input type="file" name="tu3" required="required"/></td></tr>
    <tr><td>标语：<input type="text" name="biaoyu" required="required"/></td></tr>
    <tr><td align="center">
      <input type="hidden" name="action" value="add">
      <input type="submit" value="提交" />&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="reset" value="重置" />
    </td></tr>
    <tr><td align="center">
      <?php
if(isset($_POST['tu1'])&&isset($_POST['tu2'])&&isset($_POST['tu3'])&&isset($_POST['biaoyu'])){
	 include_once('pws_sql.php');
	 $action = isset($_POST['action'])? $_POST['action'] : '';
	  if($action=='add'){
      $image1 = mysqli_escape_string($conn, file_get_contents($_FILES['tu1']['tmp_name']));  
	  $image2 = mysqli_escape_string($conn, file_get_contents($_FILES['tu2']['tmp_name']));  
	  $image3 = mysqli_escape_string($conn, file_get_contents($_FILES['tu3']['tmp_name']));  
      $sqlstr = "update adable set tu1='".$image1."',tu2='".$image2."',tu3='".$image3."',biaoyu='".$_POST['biaoyu']."' where adid=1";
    $playsql= mysqli_query($conn,$sqlstr);
	 if ($playsql){
	     echo "广告修改成功！";  
	   }else{
	     echo "广告修改失败！";
	   }
	}
}

?>
    
    </td></tr>
  </table>
</form>

</div>




</body>
</html>