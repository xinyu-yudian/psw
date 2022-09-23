<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户界面</title>
<link rel="stylesheet" href="pws_umface.css">
<link rel="stylesheet" href="pws_dh.css">

<script src="yanhua.js"></script>

<style type="text/css">
body{
	background:url(pws_01.jpg);
    display: flex;
    justify-content: center;
    align-items: center;
}
html,body{
    margin: 0;
    height: 100%;
}

.bdiv1{
	 position: absolute;
       left:50%;
       top:75%;
       transform: translate(-50%, -80%);
    }
	
 
</style>
</head>
<!--
frameborder 属性规定是否显示 iframe 周围的边框。
framespacing属性也是设置边框的宽度
scrolling 属性规定是否在 iframe 中显示滚动条
marginwidth 属性规定框架内容与框架的左侧和右侧之间的高度，以像素计
-->


<body>


  
   
   <div class="bdiv1">
    <table style="border-spacing:100px;">
     <tr>
     <td>
    <div>
      <table>
        <tr><th align="center"><font size="+3" style="color:#FFF">特约公告</font></th></tr>
        <tr><td>
        <div class="slideshow-container">
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
     <img  src="gg01.jpg" width="550" height="250" />
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
      <img  src="gg02.jpg" width="550" height="250" />
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
   <img  src="gg03.jpg" width="550" height="250" />
  </div>
  
</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
     
         </td></tr>
        <tr><td align="center">
            <marquee  behavior="right"><font color="#FFFF33" size="+1">原神2.7版本<荒梦藏虞渊>已开启</font></marquee>
        </td></tr>
      </table>
   </div>
   </td>
   
   <td>
    <div class="adiv_face" style=" height:520px;">
        <iframe name="leftFrame" frameborder="0" scrolling="NO" src="pws_umface_tou.php"
            marginwidth="0" marginheight="5" width="900" height="460"></iframe>
       
        <iframe src="pws_umface_foot.php" name="rightFrame" frameborder="0" scrolling="NO" noresize
                    marginwidth="0" marginheight="0" width="900" height="40"></iframe>
      
     </div>
     
    </td></tr>
    </table>
   </div>
   

  
  
</body>
<script>
 var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 4000); // 切换时间为 2 秒
}
</script>

</html>