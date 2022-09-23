<?php  
include_once('pws_sql.php');
$username=$_GET['username'];
$sql_delect1="delete from message where username='".$username."'";


$result1=mysqli_query($conn,$sql_delect1);

 ?>
   <script type="text/javascript">
      window.history.go(-1); 
   </script>
 <?php

?>