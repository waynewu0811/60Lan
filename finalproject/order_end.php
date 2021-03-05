<?php 
session_start();
header("Content-Type:text/html; charset=utf-8");
require_once("./include/configure.php");
require_once("./include/db_func.php");
$db_conn = connect2db($dbhost, $dbuser, $dbpwd, $dbname);


if (empty($_SESSION['sum'])){
	echo "<script>alert('消費總金額不能為零!請重新填寫訂單!'); </script>";
	echo '<meta http-equiv=REFRESH CONTENT=0;url=order.php>';
	exit();
}

$sqlcmd = "SELECT * FROM 菜單";
$result = querydb($sqlcmd, $db_conn);

$i = 1;
$sqlcmd = "SELECT MAX(訂單編號)AS max_no FROM 訂單";
$max = querydb_fetch_row($sqlcmd, $db_conn);


$id = $_SESSION['id'];
//print_r($_POST);
$time = $_POST['time'];
$sum = 0;
$tel = $_POST['tel'];
$address = $_POST['address'];

foreach ($result as $row) {
	$ex = $_SESSION['count'][$i]*$row['單價'];
	$no = $_SESSION['count'][$i];
	if($no != "0"){
		updatedb("INSERT INTO 訂單詳細記錄 (訂單編號, 品項編號, 數量,小計) VALUES ('$max[max_no]'+1, '$row[品項編號]', '$no', $ex)", $db_conn);
	}
	$sum += $ex;
	$i++;
}
updatedb("INSERT INTO 訂單 (訂單編號, 帳號, 訂單時間, 總金額, 電話, 地址, 已送達) VALUES ('$max[max_no]'+1, '$id', '$time', '$sum', '$tel', '$address', 0)", $db_conn);


?>


<html>
<head> 
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>60嵐 | 訂單送出</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>

    <form>
	<div id="main-box">
	<img src="images/logo.png">
		<ul class="main-btn">
			<center>
			<li class="midtext-text"><p>訂單已送出&emsp;\\\\\\</p></li><br>
			<table border="0" style="color:white">
			<?php echo '<tr><td><p>訂單時間: '.$time .'</p></td></tr>'?>
			<?php echo '<tr><td><p>訂單編號: '.str_pad(($max['max_no']+1),4,'0',STR_PAD_LEFT).'</p></td></tr>'?>
			<?php echo '<tr><td><p>聯絡電話: '.($tel).'</p></td></tr>'?>
			<?php echo '<tr><td><p>預計送達地址: '.($address).'</p></td></tr>'?>
			
			</table>
			<li><a href="index.php"> <input type="button" value="回到首頁" class="btn" style="width:306px;font-size:17px;"></a></li>
			</center>
		</ul>
	</div>

	<div class="footer">
		<a href="http://www.ttu.edu.tw" target="_blank" style="color: black;text-decoration:none;">ttu.edu.tw</a> &emsp;|&emsp;客服信箱：ttucse@gmail.com <br>
	</div>

    </form>
</body>
</html>

<?php
 session_unset(); 
?>
