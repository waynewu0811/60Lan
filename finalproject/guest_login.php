<?php
header("Content-Type:text/html; charset=utf-8");
require_once("./include/configure.php");
require_once("./include/db_func.php");
$db_conn = connect2db($dbhost, $dbuser, $dbpwd, $dbname);
$sqlcmd = "SELECT * FROM 菜單";
$result = querydb($sqlcmd, $db_conn);

?>

<html>
<head> 
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>60嵐 | 登入會員</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<nav>
  <ul>
    <li><a href="index.php">回到首頁</a></li>
  </ul>
</nav>
<body>

	<form action="order.php" method="post">
	<div id="main-box">

	<h2 style="margin:0 10% 8%;">登入會員</h2>
	<ul class="main-btn">
		
	<div style="margin:0 0 0 10px;">	
		<li class="inline">請輸入會員帳號:&emsp;</li><br>
		<li><input type="text" maxlength="15" name="id" style="width:300px;height:30px;" pattern="[a-zA-Z0-9]+" required></li><br>
		
		<li class="inline">請輸入會員密碼:&emsp;</li><br>
		<li><input type="password" maxlength="10" name="pw" style="width:300px;height:30px;color:black;" pattern="[a-zA-Z0-9]+" required></li><br><br>
		
	</div>
		<center>
		<table border="0">
			<tr>
				<td><li><a href="index.php"> <input name="cancel" type="button" value="取消訂購" class="btn"></a></li></td>
				<td><li><input type="submit" value="確認並登入" class="btn" name="SubmitButton"/></li></td>
			</tr>
		</table>
		</center>
	</ul>
	</form>
	</div>


	<div class="footer">
		<a href="http://www.ttu.edu.tw" target="_blank" style="color: black;text-decoration:none;">ttu.edu.tw</a> &emsp;|&emsp;客服信箱：ttucse@gmail.com <br>
	</div>

</body>
</html>
