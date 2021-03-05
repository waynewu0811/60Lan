<?php
require_once("./include/configure.php");
require_once("./include/db_func.php");
$db_conn = connect2db($dbhost, $dbuser, $dbpwd, $dbname);

$id = $_POST['id'];
$pw = $_POST['pw'];
$tel = $_POST['tel'];
$address = $_POST['address'];

$sqlcmd = "SELECT * FROM 會員 WHERE 帳號 = '$id'";
$row = querydb_fetch_row($sqlcmd, $db_conn);

if($id == null){
	echo "<script>alert('請輸入帳號!'); window.history.back();</script>";
	exit();
}
else if($row[0] == $id){
	echo "<script>alert('已經有該會員名稱 請更換!'); window.history.back();</script>";
	exit();
}
else{
	if($id != null && $pw != null && $tel != null && $address != null)
	{
		updatedb("INSERT INTO 會員 (帳號, 密碼, 地址, 電話) VALUES ('$id', '$pw', '$address', '$tel')", $db_conn);
		echo "<script>alert('註冊成功!');</script>";
	}
	else{
		echo "<script>alert('請將資料輸入完成再註冊!'); window.history.back();</script>";
		exit();
	}
}
?>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>60嵐 | 加入會員</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<nav>
  <ul>
    <li><a href="introduce.html">介紹</a></li>
    <li><a href="order.php">立即訂購</a></li>
    <li><a href="index.php">回到首頁</a></li>
  </ul>
</nav>
<body>
    
	<div id="main-box">
	<img src="images/logo2.png" style=" height=50%">
	<ul class="main-btn"><br>
	<center>
	<h2 style="margin:0 10% 8%;">註冊成功&emsp;\\\\\\</h2>
	</center>

	&emsp;<li class="inline">帳號:&emsp;</li>
	<?php echo $id ?><br>
	&emsp;<li class="inline">密碼:&emsp;</li>
	<?php echo $pw ?><br>
	&emsp;<li class="inline">電話:&emsp;</li>
	<?php echo $tel ?><br>
	&emsp;<li class="inline">地址:&emsp;</li>
	<?php echo $address ?><br><br>
	<center>
	<li><a href="index.php"> <input type="button" value="回到首頁" class="btn"></a></li>
	</center>
	</ul>
	
	</div>

	<div class="footer">
		<a href="http://www.ttu.edu.tw"style="color: black;text-decoration:none;">ttu.edu.tw</a> &emsp;|&emsp;客服信箱：ttucse@gmail.com <br>
	</div>

    
</body>
</html>
