<?php
session_start();
if( ! $_SESSION['AdminRights']){
	echo "<script>alert('並無管理員權限!');</script>";
	echo '<meta http-equiv=REFRESH CONTENT=0;url=staff.html>';
	exit();
}
?>
<?php
require_once("./include/configure.php");
require_once("./include/db_func.php");
$db_conn = connect2db($dbhost, $dbuser, $dbpwd, $dbname);

$result = querydb("
SELECT 品項名稱,SUM(數量)總數量,SUM(小計)總金額 
FROM (SELECT 菜單.品項名稱,數量,小計 FROM 菜單,訂單詳細記錄 
WHERE 菜單.品項編號 = 訂單詳細記錄.品項編號)as total 
GROUP BY 品項名稱 ORDER BY `總數量` DESC", $db_conn);

$sum = 0;
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
	<li><a href="manager_statistic.php">回統計選單</a></li>
  </ul>
</nav>

<body>
	<div id="main-box">
		<center>
		<h2 style="color:white">品項銷售量</h2>
		<div  style="max-height:600px;overflow:auto" class="scrollbar">
		<table width="400" border="1" style="color:white">
		<tr>
			<td>品項名稱</td>
			<td>總銷售量↓</td>
			<td>總金額</td>
		</tr>
		<?php
			foreach ($result as $row) {
				echo '<tr>';
				echo '<td>'.$row['品項名稱'].'</td>';
				echo '<td>'.$row['總數量'].'杯</td>';
				echo '<td>$'.$row['總金額'].'</td>';
				echo '</tr>';
				$sum += $row['總金額'];
			}
		?>  
		</table>
		</div>
		<h2 style="color:white">目前總業績</h2>
	<?php
		echo '<h3 style="color:white">$ '.$sum.'</h3>';
	?> 
		</center>
		<br>
	</div>


	<div class="footer">
		<a href="http://www.ttu.edu.tw" target="_blank" style="color: black;text-decoration:none;">ttu.edu.tw</a> &emsp;|&emsp;客服信箱：ttucse@gmail.com <br>
	</div>


</body>
</html>
