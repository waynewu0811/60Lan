<?php    
session_start();
?>
<html>
<head> 
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>60嵐 | 品項管理系統</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<style type="text/css">
	p {
	margin-block-start: 0.5em;
	margin-block-end: 0.5em;
	}
	</style>
</head>

<body>
    <form action="staff_login.php" method="POST">
	<div id="main-box">
	<img src="images/logo.png">
		<ul class="main-btn">
			<center>
			<li class="midtext-text"><p>60嵐品項管理系統&emsp;\\\\\\</p></li><br>
			<?php
			echo '目前為 '.$_SESSION['Name'].' 權限'; 
			?>
			<li style="padding:10px">
			<a href="manager_statistic.php"><input name="" type="button" class="btn" value="統計管理" style="width:306px;font-size:17px;"></a><p>
			<?php
			if($_SESSION['AdminRights']==1||$_SESSION['AdminRights']==2){
			echo '<a href="manager_addnew.php"><input name="" type="button" class="btn" value="新品上架" style="width:306px;font-size:17px;"></a><p>';
			}

			if($_SESSION['AdminRights']==1||$_SESSION['AdminRights']==3){
			echo '<a href="manager_underReview.php"><input name="" type="button" class="btn" value="審核上架" style="width:306px;font-size:17px;"></a><p>';
			}
			if($_SESSION['AdminRights']==1||$_SESSION['AdminRights']==2){
			echo '<a href="manager_upload.php"><input name="" type="button" class="btn" value="圖片上傳" style="width:306px;font-size:17px;"></a><p>';
			}
			?>
			<input name="logout" type="submit" class="btn" value="***管理員登出***" style="width:306px;font-size:17px;"></a>
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