<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
require_once("./include/configure.php");
require_once("./include/db_func.php");
$db_conn = connect2db($dbhost, $dbuser, $dbpwd, $dbname);


//echo "POST==> <br>";print_r($_POST);
//echo "SESSION==> <br>";print_r($_SESSION);
if(!isset($_SESSION['id']) && !isset($_SESSION['pw']) ){
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

?>

<html>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script> 
<script> 
$(function(){ 
	$(".add").click(function(){ 
		var t=$(this).parent().find('input[class*=text_box]'); 
		t.val(parseInt(t.val())+1)  
	}) 
	$(".min").click(function(){ 
		var t=$(this).parent().find('input[class*=text_box]'); 
		t.val(parseInt(t.val())-1) 
		if(parseInt(t.val())<0){ 
		t.val(0); 
		}
 
	}) 
}) 
</script> 
<head> 
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>60嵐 | 填寫訂單</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<style type="text/css">

.gallerycontainer{
position: relative;
/*Add a height attribute and set to largest image's height to prevent overlaying*/
}

.thumbnail img{
border: 1px solid white;
margin: 0 5px 5px 0;
}

.thumbnail:hover{
background-color: transparent;
}

.thumbnail:hover img{
border: 1px solid black;
}

.thumbnail span{ /*CSS for enlarged image*/
position: absolute;
background-color: #1c292b;
padding: 5px;
left: -1000px;
border: 1px dashed gray;
visibility: hidden;
color: white;
text-decoration: none;
}

.thumbnail span img{ /*CSS for enlarged image*/
border-width: 0;
padding: 2px;
}

.thumbnail:hover span{ /*CSS for enlarged image*/
visibility: visible;
left: 15%; /*position where enlarged image should offset horizontally */
top : 15%;
z-index: 50;
}

</style>
<body>

<div id="main-box">
	<form action="order_action.php" method="post">
	<h2>填寫訂單</h2>
	<h5>★滑鼠滾動可看見更多品項</h5>

	<center>
	<table width="400" border="1" style="line-height:30px;">
		<tr>
			<td width="45%">名稱</td>
			<td width="15%">單價</td>
			<td width="40%" colspan="2" ></td>
		</tr>
	</table>
	<tr>
	<div  style="max-height:400px;overflow:auto" class="scrollbar">
	<table width="400" border="1">
		<?php
		$i=1;
		$sqlcmd = "SELECT * FROM 菜單";
		$result = querydb($sqlcmd, $db_conn);
		
			foreach ($result as $row) {
				echo '<tr>';
				$tmp=$row['品項編號'];
				$sqlcmd = "SELECT * FROM menu_picture WHERE cid='$tmp' AND valid='Y'";
				$rs = querydb($sqlcmd, $db_conn);
				if (count($rs)<=0) {
					//print_r(count($rs));
					$tmp = 0;
				}
				if($row['已上架']==1){
					echo '<td width="45%" class="thumbnail" >'.$row['品項名稱'].'<span><img width="400px" src="include/getimage.php?ID='.$tmp.'""><br /><div style="text-align:center">'.$row['品項名稱'].'</div</span></td>';
					
					echo '<td width="15%">$'.$row['單價'].'</td>';
					echo '<td width="30%><center><div iid="myDiv" name="myDiv"  style="font-size:0;display: table-cell;">
					<input class="min" name="" type="button" style="width:30px;" value="－" /> 
					<input class="text_box" type="text" style="width:40px;font-family:微軟正黑體;" value="';
					if(isset($_POST['renew'])){
						echo $_POST[$i];
					}
					else
						echo '0';
					echo '" name='.$row['品項編號'].' pattern="[0-9]+" required>
					<input class="add" name="" type="button" style="width:30px;" value="＋" /> 
					</div></center></td>';
					echo '<td width="10%">杯</td>';
					echo '</tr>';
				}
				else{
					echo '<input type="hidden" type="text" value="0" name="'.$row['品項編號'].'">';
				}
				$i++;
			}
		?>  
	</tr>
	</table>
	</div>
	<ul class="main-btn">
	<table border="0">
		<tr>
			<td><li><a href="index.php"> <input name="cancel" type="button" value="取消訂購" class="btn"></a></li></td>
			<td><li><input type="submit" value="填寫訂單資料" class="btn" name="SubmitButton"/></li></td>
		</tr>
	</table>
	</center>
	</ul>
	
	</form>
</div>


	<div class="footer">
		<a href="http://www.ttu.edu.tw" target="_blank" style="color: black;text-decoration:none;">ttu.edu.tw</a> &emsp;|&emsp;客服信箱：ttucse@gmail.com <br>
	</div>

    </form>
</body>
</html>
<?php
if(isset($_POST['renew'])){
	unset($_POST['renew'] );
}
?>