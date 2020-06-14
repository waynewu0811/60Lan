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

$result = querydb("SELECT * FROM `訂單` ORDER BY `訂單`.`訂單編號` ASC", $db_conn);

?>

<html>
<head> 
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>60嵐 | 內部管理</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<nav>

<nav>
  <ul>
	<li><a href="manager_statistic.php">回統計選單</a></li>
  </ul>
</nav>

<body>
	<form name="button" Method="post" action="manager_check.php">
	<div id="main-box" style="width:800px;">
		<center>
		<h2 style="color:white">訂單列表</h2>
		<div  style="max-height:600px;overflow:auto" class="scrollbar">
		<table width="750" border="1" style="color:white;">
			<tr>
				<td>帳號</td>
				<td>訂單時間↓</td>
				<td>金額</td>
				<td>聯絡電話</td>
				<td>送貨地址</td>
				<td>送達</td>
			</tr>
			
			<?php
				foreach ($result as $row) {
					echo '<tr>';
					echo '<td>'.$row['帳號'].'</td>';
					echo '<td>'.$row['訂單時間'].'</td>';
					echo '<td>$'.$row['總金額'].'</td>';
					echo '<td>'.$row['電話'].'</td>';
					echo '<td>'.$row['地址'].'</td>';
					
					if($row['已送達'] == '1')
						echo '<td style="text-align:center">'.'√'.'</td>';
					else
						echo '<td style="text-align:center">'.'<input name="check" type="submit" value="'.$row['訂單編號'].'"class="btcheck" ></a>'.'</td>';
					echo '</tr>';
				}
			?>  
			
		</table>
		<div>
		</center>
		<br>
	</div>
	</form>

	<div class="footer">
		<a href="http://www.ttu.edu.tw" target="_blank" style="color: black;text-decoration:none;">ttu.edu.tw</a> &emsp;|&emsp;客服信箱：ttucse@gmail.com <br>
	</div>


</body>
</html>
