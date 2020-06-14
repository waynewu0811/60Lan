<?php
session_start();
session_unset();
session_destroy(); 
?>
<html>

<head> 
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>60嵐 | 線上訂購</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<nav>
  <ul>
    <li><a href="introduce.html">介紹</a></li>
    <li><a href="privacyRule.php">立即訂購</a></li>
    <li><a href="staff.html">內部管理</a></li>
  </ul>
</nav>

<body>
    <form>
	<div id="main-box">
	
	<img src="images/logo.png" class="center" style="border:2px white dashed;">
		<ul class="main-btn">
	<center>
			<li class="midtext-text"><p>60嵐外送訂購系統&emsp;\\\\\\</p></li><br>
			<table border="0">
			<tr>
				<td><li><a href="introduce.html"> <input name="" type="button" class="btn" value="介紹"></a></li></td>
				<td><li><a href="privacyRule.php"> <input name="" type="button" class="btn" value="立即登入&amp;訂購"></a></li></td>
			</tr>
			</table>
			<table border="0">
			<tr><td><li class="info-text">還沒加入會員？馬上加入>> <a href="newmember.php" style="text-decoration:none;color:#dddddb;">加入會員</a></li></tr></td>
			<tr><td><li class="info-text">第一次使用嗎？請參考>> <a href="howtobuy.html" target="_blank" style="text-decoration:none;color:#dddddb;">線上訂購流程說明</a></li></tr></td>
			</table>
		</ul>
	</center>	
	</div>

	<div class="footer">
		<a href="http://www.ttu.edu.tw" target="_blank" style="color: black;text-decoration:none;">ttu.edu.tw</a> &emsp;|&emsp;客服信箱：ttucse@gmail.com <br>
	</div>

    </form>
</body>
</html>
