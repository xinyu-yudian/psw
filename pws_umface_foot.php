<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>foot</title>
<style type="text/css">
div{ top:10%;}
.login{ color:#FFF; font-size:18px}
.wz1{ color:#F00; font-size:12px}
.wz2{ color:#FFF; font-size:5px;}
ul { margin: 0px;
    padding: 0 0 0 0;
    list-style: none;
	line-height:20px;
     }
</style>
</head>

<body>
<?php // 设置时区
    date_default_timezone_set('PRC');
    //配置考试的开始结束时间
    $starttimestr = date('Y-m-d H:i:s', strtotime('now'));
    $endtimestr = date('Y-m-d H:i:s', strtotime('+30 minutes'));
    $starttime = strtotime($starttimestr);
    $endtime = strtotime($endtimestr);
    $nowtime = time();
	if ($endtime >= $nowtime) {
        $lefttime = $endtime - $nowtime; //实际剩下的时间（秒）
    }

?>
<div align="center" style="top:0%">
  <ul>
    <li>
    <span class="wz1">温馨提示：</span><span class="wz2">系统退出倒计时（<span id="RemainM"></span> 分钟<span id='RemainS' class='miao'></span>秒）</span>
   </li>
   <li>
    <span class="login">System Main Interface&nbsp;系统主界面</span>
   </li>
  </ul>
</div>
    
<script type="text/javascript">
    var runtimes = 0;
    function GetRTime() {
        var lefttime = <?php echo $lefttime; ?> * 1000 - runtimes * 1000;
        if (lefttime >= 0) {
			var nM = Math.floor(lefttime / (1000 * 60)) % 60;
            var nS = Math.floor(lefttime / 1000) % 60;
			document.getElementById("RemainM").innerHTML = nM;
            document.getElementById("RemainS").innerHTML = nS;
            runtimes++;
            setTimeout("GetRTime()", 1000);
        }else {
            top.location='pws_login.php';
        } 
    }
    onload = function() {
        GetRTime();
    }
</script>
</body>
</html>