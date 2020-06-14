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

$result = querydb("SELECT * FROM 會員", $db_conn);
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
	<div id="main-box" style="width:800px;">
		<center>
		<h2 style="color:white">會員列表</h2>
		<div  style="max-height:600px;overflow:auto" class="scrollbar">
		<table width="700" border="1" style="color:white">
			<tr>
				<td>帳號</td>
				<td>地址</td>
				<td>電話</td>
			</tr>
			<?php
				foreach ($result as $row) {
					echo '<tr>';
					echo '<td>'.$row['帳號'].'</td>'.'<td>'.$row['地址'].'</td>'.'<td>'.$row['電話'].'</td>';
					echo '</tr>';
				}
			?>  
		</table>
		</div>
		</center>
		<br>
	</div>


	<div class="footer">
		<a href="http://www.ttu.edu.tw" target="_blank" style="color: black;text-decoration:none;">ttu.edu.tw</a> &emsp;|&emsp;客服信箱：ttucse@gmail.com <br>
	</div>


</body>
</html>
