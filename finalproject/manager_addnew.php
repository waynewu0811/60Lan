<?php
session_start();
if( ! $_SESSION['AdminRights']){
	echo "<script>alert('並無管理員權限!');</script>";
	echo "<script>history.go(-1)</script>";
	exit();
}
?>
<?php
require_once("./include/configure.php");
require_once("./include/db_func.php");
$db_conn = connect2db($dbhost, $dbuser, $dbpwd, $dbname);

$result = querydb("SELECT * FROM 菜單 WHERE 已上架=1", $db_conn);
?>

<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>60嵐 | 新增品項</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<nav>
  <ul>
	<li><a href="manager.php">回管理系統主頁</a></li>
  </ul>
</nav>

<body>

    <form action="manager_addnew_done.php" method="post">
        <div id="main-box">
            <h2 style="color:white">目前已上架品項</h2>
			<center>
			<table width="400" border="1" style="color:white">
                    <tr>
                        <td width="60%">名稱</td>
                        <td width="40%">單價(元)</td>
                    </tr>
			</table>
			<div  style="max-height:300px;overflow:auto" class="scrollbar">
			<table width="400" border="1" style="color:white">	
				<?php
				foreach ($result as $row){
				echo '
				<tr>
					';
					echo '
					<td width="60%">'.$row['品項名稱'].'</td>'.'
					<td width="40%">'.'$'.$row['單價'].'</td>';
					echo '
				</tr>';
				}
				?>
			</table>
			</div>
			</center>
            <h2 style="color:white">新增品項(需經過審核)</h2>
            <ul class="main-btn">
                <center>
                    <li class="inline">請輸入新品名稱:&emsp;</li>
                    <li>
                        <input type="text" maxlength="10" name="addname" />
                    </li>
                    <br>
                    <li class="inline">請輸入新品單價:&emsp;</li>
                    <li>
                        <input type="text" maxlength="10" name="addprice" />
                    </li>
                    <br><br>

					<table border="0">
					<tr>
						<td><li><input type="submit" value="確認並送出" class="btn" /></li></td>
						<td><li><a href="manager.php"> <input name="cancel" type="button" value="回到上頁" class="btn"></a></li></td>
					</tr>
					</table>
                </center>
            </ul>

    </form>

    </div>


    <div class="footer">
        <a href="http://www.ttu.edu.tw" target="_blank" style="color: black;text-decoration:none;">ttu.edu.tw</a> &emsp;|&emsp;客服信箱：ttucse@gmail.com
        <br>
    </div>

    </form>
</body>
</html>
