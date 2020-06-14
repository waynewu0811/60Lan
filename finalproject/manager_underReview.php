<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
require_once("./include/configure.php");
require_once("./include/db_func.php");
$db_conn = connect2db($dbhost, $dbuser, $dbpwd, $dbname);


//echo "POST==> <br>";print_r($_POST);
//echo "SESSION==> <br>";print_r($_SESSION);
/*if(!isset($_SESSION['id']) && !isset($_SESSION['pw']) ){
	if(isset($_POST['id']) && isset($_POST['pw']) ){
		$id = $_POST['id'];
		$pw = $_POST['pw'];
	}
	else{
		$id = null;
		$pw = null;
	}
}else{
	$id = $_SESSION['id'];
	$pw = $_SESSION['pw'];
}
	$sqlcmd = "SELECT * FROM 會員 WHERE 帳號 = '$id'";
	$row = querydb_fetch_row($sqlcmd, $db_conn);

	if($id != null && $pw != null && $row[0] == $id && $row[1] == $pw)
	{
		$_SESSION['id'] = $id;
		$_SESSION['pw'] = $pw;
	}
	else if($id != null && $pw != null && $row[0] == $id && $row[1] != $pw) 
	{
		echo "<script>alert('密碼錯誤 請重新確認密碼!'); window.history.back();</script>";
		exit();
	}
	else if($id != null && $pw != null)
	{
		echo "<script>alert('並無該位會員帳號!'); window.history.back();</script>";
		exit();
	}
	else{
		echo "<script>alert('請確實填寫帳號及密碼!'); window.history.back();</script>";
		exit();
	}
*/

	$sqlcmd = "SELECT * FROM 未上架商品 WHERE 已上架 = 0";
	$result = querydb($sqlcmd, $db_conn);
?>

<html> 
<head> 
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>60嵐 | 審核商品</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<nav>
  <ul>
	<li><a href="manager_statistic.php">回統計選單</a></li>
  </ul>
</nav>

<body>
<form name="button" Method="post" action="manager_underReview_done.php">
<div id="main-box" style="height:600px;">
	
	<h2>審核商品</h2>

	<center>
	<table width="400" border="1" style="line-height:30px;">
		<tr>
			<td width="40%">名稱</td>
			<td width="30%">單價</td>
			<td width="30%" style="text-align:center">審核</td>
		</tr>
	</table>
	<tr>
	<div  style="max-height:400px;overflow:auto" class="scrollbar">
	<table width="400" border="1">
		<?php
			if($result == null){
				echo '<td colspan="3" style="text-align:center">****所有商品皆已上架****</td>';
			}
			foreach ($result as $row) {
				echo '<tr>';
				echo '<td width="40%">'.$row['品項名稱'].'</td>';
				echo '<td width="30%">'.'$'.$row['單價'].'</td>';
				if($row['已上架'] == '1')
					echo '<td style="text-align:center">'.'√'.'</td>';
				else
					echo '<td width="30%" style="text-align:center">'.'<input name="check" type="submit" value="'.$row['品項編號'].'" class="btcheck" style="width:80px;"></a>'.'</td>';	
			}
		?>  
	</tr>
	</table>
	</div>
</div>
</form>



	<div class="footer">
		<a href="http://www.ttu.edu.tw" target="_blank" style="color: black;text-decoration:none;">ttu.edu.tw</a> &emsp;|&emsp;客服信箱：ttucse@gmail.com <br>
	</div>

    </form>
</body>
</html>