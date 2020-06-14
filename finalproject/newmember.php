<html>
<style>
input[type=text] {
  width: 160px;
  -webkit-transition: width .35s ease-in-out;
  transition: width .35s ease-in-out;
}
input[type=text]:hover {
  width: 250px;
}
input[type=text]:focus {
  width: 250px;
}
</style>
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
    <form action="register.php" method="post">
	<div id="main-box">
	<img src="images/logo2.png" style=" height=50%">
	<ul class="main-btn"><br>
	
	<h2 style="margin:0 10% 8%;">加入會員&emsp;\\\\\\</h2>
	<div style="margin:0 0 0 10px;">
		<li class="inline">請輸入會員帳號:&emsp;</li>
		<li><input type="text" maxlength="15" name="id" placeholder="帳號長度為1-15位英數字" style="width:300px;height:30px;" pattern="[a-zA-Z0-9]+" required /></li><br>
		<li class="inline">請輸入會員密碼:&emsp;</li>
		<li><input type="text" maxlength="10" name="pw" placeholder="密碼長度為1-10位英數字" style="width:300px;height:30px;" pattern="[a-zA-Z0-9]+" required /></li><br>
		<li class="inline">請輸入聯絡電話:&emsp;</li>
		<li><input type="text" maxlength="10" name="tel" style="width:300px;height:30px;" pattern="[0-9]+" required /></li><br>
		<li class="inline">請輸入通訊地址:&emsp;</li>
		<li><input type="text" maxlength="30" name="address" style="width:300px;height:30px;" required /></li><br><br>
	</div>
	<center>
	<li><a href="index.php"> <input name="cancel" type="button" value="取消" class="btn"></a></li>
	<li><input type="submit" value="確認並加入會員" class="btn" name="SubmitButton"/></li>
	</center>
	</ul>
	
	</div>

	<div class="footer">
		<a href="http://www.ttu.edu.tw"style="color: black;text-decoration:none;">ttu.edu.tw</a> &emsp;|&emsp;客服信箱：ttucse@gmail.com <br>
	</div>

    </form>
</body>
</html>
