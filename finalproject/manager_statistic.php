<?php
session_start();
if( ! $_SESSION['AdminRights']){
	echo "<script>alert('並無管理員權限!');</script>";
	echo '<meta http-equiv=REFRESH CONTENT=0;url=staff.html>';
	exit();
}
?>
<html>
<head> 
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>60嵐 | 內部管理</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<nav>
  <ul>
	<li><a href="manager.php">回管理系統主頁</a></li>
  </ul>
</nav>

<body>
    <form>
	<div id="main-box">
	<img src="images/logo.png">
		<ul class="main-btn">
			<center>
			<br>
			<li style="padding:10px">
			<a href="manager_statistic1.php"><input type="button" class="btn" value="1.統計資料" style="width:306px;font-size:17px;"></a><p>
			<a href="manager_statistic2.php"><input type="button" class="btn" value="2.會員列表" style="width:306px;font-size:17px;"></a><p>
			<a href="manager_statistic3.php"><input type="button" class="btn" value="3.訂單列表" style="width:306px;font-size:17px;"></a><p>
			</li>
			</center>
			
		</ul>
	</div>

	<div class="footer">
		<a href="http://www.ttu.edu.tw" target="_blank" style="color: black;text-decoration:none;">ttu.edu.tw</a> &emsp;|&emsp;客服信箱：ttucse@gmail.com <br>
	</div>

    </form>
</body>
</html>
