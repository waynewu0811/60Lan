<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
require_once("./include/configure.php");
require_once("./include/db_func.php");
$db_conn = connect2db($dbhost, $dbuser, $dbpwd, $dbname);

//echo "POST==> <br>";print_r($_POST);
//echo "SESSION==> <br>";print_r($_SESSION);

$id = $_SESSION['id'];
$pw = $_SESSION['pw'];

$sqlcmd = "SELECT * FROM 會員 WHERE 帳號 = '$id'";

$row = querydb_fetch_row($sqlcmd, $db_conn);

if($id != null && $pw != null && $row[0] == $id && $row[1] != $pw)
{
	echo "<script>alert('密碼錯誤 請重新確認密碼!'); window.history.back();</script>";
	exit();
}

$sqlcmd = "SELECT * FROM 菜單";
$result = querydb($sqlcmd, $db_conn);
$sum = 0;

$sqlcmd = "SELECT MAX(`品項編號`) FROM `菜單` ";
$max = querydb_fetch_row($sqlcmd, $db_conn);

for($i=1;$i<=$max[0];$i++){
	$sum += $_POST[$i];
}
$_SESSION['sum'] = $sum;
if (empty($_SESSION['sum'])){
	echo "<script>alert('消費總金額不能為零!請重新填寫訂單!'); </script>";
	echo '<meta http-equiv=REFRESH CONTENT=0;url=order.php>';
	exit();
}

$i = 1;
$sum = 0;
?>

<html>
<style>

input[type=text] {
  width: 150px;
  -webkit-transition: width .35s ease-in-out;
  transition: width .35s ease-in-out;
}
input[type=text]:hover {
  width: 200px;
}
input[type=text]:focus {
  width: 200px;
}
</style>
<SCRIPT type="text/javascript">
<!-- 此check()函式在最後的「傳送」案鈕會用到 -->
function check()
{
	if(document.getElementById("tel").value != "")
		document.getElementById("tel").style.borderColor = "white";
	if(document.getElementById("address").value != "")
		document.getElementById("address").style.borderColor = "white";
	<!-- 若<form>屬性name值為reg裡的文字方塊值為空字串，則顯示「未輸入姓名」 -->
	if(document.getElementById("tel").value == "") 
	{
		document.getElementById("tel").focus();
		document.getElementById("tel").style.border = "solid";
		document.getElementById("tel").style.borderColor = "red";
		return false; 
	}
	else if(document.getElementById("address").value == "") 
	{
		document.getElementById("address").focus();
		document.getElementById("address").style.border = "solid";
		document.getElementById("address").style.borderColor = "red";
		return false; 
	}
	else{
		document.getElementById("hidden_tel").value = document.getElementById("tel").value;
		document.getElementById("hidden_address").value = document.getElementById("address").value;
		document.getElementById("hidden_time").value = document.getElementById("result").value;
		return true; 
	}
 }
 function isNumberKey(evt)
{
 var charCode = (evt.which) ? evt.which : event.keyCode
 if (charCode > 31 && (charCode < 48 || charCode > 57))
	return false;

 return true;
}
</SCRIPT>
<head> 
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>60嵐 | 確認訂單</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	
	<link href="css/datetimepicker.css" rel="stylesheet" type="text/css"/>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="js/datetimepicker.js"></script>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

    <script type="text/javascript">
    $(document).ready( function () {
        $('#picker').dateTimePicker();
    });
    </script>
</head>

<body>
	
<div id="main-box">
<h2>確認訂單</h2>

	<center>
	<table width="400" border="1">
	<tr>
		<td width="48%">名稱</td>
		<td width="20%">數量</td>
		<td width="10%"></td>
		<td width="22%">小計</td>
	</tr>
	</table>
	<div  style="max-height:200px;overflow:auto" class="scrollbar">
		<table width="400" border="1">
		<tr>
		<?php
		$_SESSION['count'] = array();
		//print_r($_POST);
			foreach ($result as $row) {
				$ex = $_POST[$i]*$row['單價'];
				if($_POST[$i] != 0){
					echo '<tr>';
					echo '<td width=48%>'.$row['品項名稱'].'</td>';
					echo '<td width=20%>'.$_POST[$i].'</td>';
					echo '<td width=10%>杯</td>';
					echo '<td width=22%> $'.$ex.'</td>';
					echo '</tr>';
				}
				$_SESSION['count'][$i] = $_POST[$i];
				$i++;
				$sum += $ex;
			}
		?>
		</tr>
		</table>
	</div>
	
	<table width="400" border="1">
		<tr>
		<?php
		$_SESSION['sum'] = $sum;
			
		echo '<td width=68% colspan="2">*****總金額*****</td>';
		echo '<td width=10%>=</td>';
		echo '<td width=22%>$'.$sum.'</td>';
		?>
		</tr>
	</table>
	</center>

	
<h2 style="color:white;margin-bottom:0px">填寫資料</h2>
<ul class="main-btn">
	<div style="margin:0 0 0 10px;">	
		<li class="inline">請輸入電話:&emsp;</li><br>
		<li><input type="text" maxlength="10" name="tel" id='tel' placeholder="訂單完成後會致電與您確認訂單" style="width:300px;height:30px;" onkeypress="return isNumberKey(event)" /></li><br>
		<li class="inline">請輸入地址:&emsp;</li><br>
		<li><input type="text" maxlength="50" name="address" id="address" placeholder="請填寫欲送達之地址" style="width:300px;height:30px;color:black;"  /></li><br>
		<li class="inline">請選擇訂單時間:&emsp;</li><br>
		<div style="width: 300px;">
			<div id="picker"> </div>
			<?php $time = date("Y-m-d H:i:s", mktime(date('H')+6, date('i'), 0, date('m'), date('d'), date('Y'))) ; ?>
			<input type="hidden" name="time" id="result" value="<?php echo $time; ?>"  />
		</div><br>
		
	</div>

	<center>
	<table border="0">
		<tr>
			<form method="POST" action="order.php">
			<td><li><input type="submit" name="renew" value="調整訂單" class="btn"/></li></td>
			<?php
			for($j=1;$j<=$max[0];$j++){
				echo'<input type="hidden" name="'.$j.'" value="'.$_POST[$j].'">';
			}
			?>
			</form>
			<form name="reg" method="post" action="order_end.php">
				<input type="hidden" name="tel" id='hidden_tel' value="">  
				<input type="hidden" name="address" id='hidden_address' value="">
				<input type="hidden" name="time" id='hidden_time' value="">
				<td><li><input type="submit" value="確認送出訂單" class="btn" onClick=" return check()"/> </li></td>
		    </form>
		</tr>
	</table>
	</center>
</ul>

</div>


	<div class="footer">
		<a href="http://www.ttu.edu.tw" target="_blank" style="color: black;text-decoration:none;">ttu.edu.tw</a> &emsp;|&emsp;客服信箱：ttucse@gmail.com <br>
	</div>


</body>
</html>
