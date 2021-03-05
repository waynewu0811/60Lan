<?php
header("Content-Type:text/html; charset=utf-8");
?>
<script type="text/javascript">
    function check() {
        if (document.getElementById('checkprivacyRule').checked) {
            reg.submit();
			return true; 
        } else {
            document.getElementById('checkprivacyRule').focus();
			document.getElementById("ok").style.border = "double";
			
			return false; 
        }
    }
</script>

<html>
<head> 
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>60嵐 | 隱私權條款</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<nav>
  <ul>
    <li><a href="index.php">回到首頁</a></li>
  </ul>
</nav>

<body>

	<form name="reg" action="guest_login.php" method="post">
	<div id="main-box" style="width:800px;">

	<h2 style="margin:0 10% 8%;">隱私權條款</h2>
	<ul class="main-btn">
		<center>
		<div style="text-align: left;width:600px;">
			<p>您同意提供個人資料(包括姓名、電話、地址、e-mail 及消費相關資料)予60嵐，並同意60嵐及關係企業或委託之第三人得為餐飲服務、行銷、寄送DM廣告資料、消費者及客戶管理與服務，及其他經營合於營業登記項目所定之業務等目的，蒐集、處理及利用您的個人資料。</p>

			<p>使用個人資料之期限，以完成前述特定目的之必要期間為止，惟如法律另有規定或許可更長之期間者，不在此限。您暸解如未確實提供完整之個人資料將無法完成本訂購及獲得有關優惠及服務。</p>

			<p>就所提供之個人資料您依法得行使查詢或請求閱覽、請求製給複製本、請求補充或更正、請求停止蒐集、處理或利用以及請求刪除之權利。若您欲行使上述權利時，歡迎來信至本公司客服信箱。</p>												
		</div>
		<input type="checkbox" id="checkprivacyRule" value="" style="width:20px;height:20px;"> <font id="ok">本人已詳細閱讀並同意60嵐訂餐蒐集、處理及利用本人的個人資料。</font>
		<table border="0">
			<tr>
				<td><li><a href="index.php"> <input name="cancel" type="button" value="取消訂購" class="btn"></a></li></td>
				<td><li><input type="submit" value="確認並同意" class="btn" name="SubmitButton" onclick=" return check()"/></li></td>
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
