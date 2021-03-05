<?php
session_start();
if($_SESSION['AdminRights']!=1&&$_SESSION['AdminRights']!=2){
	echo "<script>alert('並無上傳權限!');</script>";
	echo '<meta http-equiv=REFRESH CONTENT=0;url=staff.html>';
	exit();
}
$changing = 0;
$tmp = 0;
?>

<Script Language="JavaScript">
<!--
function startload() {
	var Ary = document.ULFile.userfile.value.split('\\');
	document.ULFile.fname.value=Ary[Ary.length-1];
	document.ULFile.orgfn.value=document.ULFile.userfile.value
	document.forms['ULFile'].submit();
	return true;
}
-->
</SCRIPT>

<style>

.pic{height:300px;overflow:hidden;max-width: 700px;}
.pic img{transform:scale(1,1);transition: all 1s ease-out;}
.pic img:hover{transform:scale(1.2,1.2);}

.monkeyb-cust-file{
  overflow: hidden;
  position: relative;
  display: inline-block;
	border: #FFF 1px solid;
	color: #fff;
	font-size: 20px;
	letter-spacing: 5px;
	border-radius: 3px;
	font-family: "微軟正黑體";
	cursor: pointer;
}
.monkeyb-cust-file:hover{	background-color: #2c3c3f;;}
.monkeyb-cust-file input{
  position: absolute;
  opacity: 0;
  filter: alpha(opacity=0);
  top: 0;
  right: 0;
  width:100%;
  height:100%;
}
.monkeyb-cust-file img{
content:url(data:image/png;base64,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);
  padding-right:5px;  
  vertical-align: text-bottom;
}

</style>

<?php
require_once("./include/configure.php");
require_once("./include/db_func.php");
$db_conn = connect2db($dbhost, $dbuser, $dbpwd, $dbname);

$result = querydb("SELECT * FROM `菜單` ORDER BY `菜單`.`品項編號` ASC", $db_conn);


if(isset($_GET) && isset($_GET['changing_item'])){
	$changing = $_GET['changing_item'];
}


if (isset($_POST['GoUpload'])) {

	$fname = $_FILES["userfile"]['name'];
    $ftype = $_FILES["userfile"]['type'];

	//print_r($ftype);
	/*if($ftype != 'image/jpeg')
		 $ErrMsg = '請上傳副檔名為jpg之圖片';// 如果上傳的不是.jpg檔

    if ($_POST["fname"] <> $_POST["orgfn"]) $fname = $_POST["fname"];
    $fsize = $_FILES['userfile']['size'];
    if (!empty($fname) && addslashes($fname)==$fname && $fsize>0) {
		
		$uploadfile = "$AttachDir/" . str_pad($cid,8,'0',STR_PAD_LEFT) . '.jpg';
		$fd = fopen($_FILES['userfile']['tmp_name'],'rb');
		$image = fread($fd, $fsize);
		$image = addslashes($image);
		$sqlcmd = "UPDATE `menu_picture` SET photo='$image' WHERE cid=$changing";
		$result3 = updatedb($sqlcmd, $db_conn);
		
		// 如果上傳的不是.jpg檔，怎麼辦！(自行思考對策)
        //move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
        //chmod ($uploadfile,0644); 
    } else {
        $ErrMsg = '檔案不存在、大小為0或超過上限(100MBytes)';
    }
	*//////////////////////////////////////////////////////////////
	if($ftype != 'image/jpeg' &&
		   $ftype != 'image/pjpeg' &&
		   $ftype != 'image/png' &&
		   $ftype != 'image/gif'){
			 $ErrMsg = '請上傳副檔名為jpg,jpeg,png之圖片';// 如果上傳的不是.jpg檔
		}
	else{
		if ($_POST["fname"] <> $_POST["orgfn"]) $fname = $_POST["fname"];
		$fsize = $_FILES['userfile']['size'];
		if (!empty($fname) && addslashes($fname)==$fname && $fsize>0) {
			$sqlcmd = "SELECT * FROM menu_picture WHERE cid='$changing'";
			$rs = querydb($sqlcmd, $db_conn);
			if (count($rs)<=0) {
				$uploadfile = "$AttachDir/" . str_pad($cid,8,'0',STR_PAD_LEFT) . '.jpg';
				$fd = fopen($_FILES['userfile']['tmp_name'],'rb');
				$image = fread($fd, $fsize);
				$image = addslashes($image);
				$sqlcmd = "INSERT INTO menu_picture (cid,photo) VALUES ('$changing','$image')";
				$result = updatedb($sqlcmd, $db_conn);
				
			}
			else{
				$uploadfile = "$AttachDir/" . str_pad($cid,8,'0',STR_PAD_LEFT) . '.jpg';
				$fd = fopen($_FILES['userfile']['tmp_name'],'rb');
				$image = fread($fd, $fsize);
				$image = addslashes($image);
				$sqlcmd = "UPDATE menu_picture SET photo='$image' WHERE cid=$changing";
				$result = updatedb($sqlcmd, $db_conn);
				
				
			}
			
			
			// 如果上傳的不是.jpg檔，怎麼辦！(自行思考對策)
			//move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
			//chmod ($uploadfile,0644); 
		} else {
			$ErrMsg = '檔案不存在、大小為0或超過上限(100MBytes)';
		}
	}

}
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
	<li><a href="manager.php">回管理系統主頁</a></li>
  </ul>
</nav>




<body>

	
	
	<div id="main-box" style="width:800px;">
		<center>
		<h2 style="color:white">上傳圖片</h2>
		<div  style="max-height:600px;overflow:auto" class="scrollbar">
		<?php 
		$sqlcmd = "SELECT * FROM 菜單";
		$result = querydb($sqlcmd, $db_conn);
		?>
	<form method="get">	
		<select name="changing_item" class="btn" onchange="submit();">
		<option value="">請選擇</option>
		<?php
		echo("<script>console.log('".$changing."');</script>");
		foreach ($result as $row){
			echo('<option value="' . $row["品項編號"] . '"');
			if($row["品項編號"] == $changing) 
				echo ' selected';
			
			echo('>'.$row['品項名稱'].'</option>');
		}
		
		?>

		</select>
	</form>
		
		<table width="750" border="1" style="color:white;">
			<tr>
				<td width = '100px' style="text-align:center">商品編號</td>
				<td width = '300px' style="text-align:center">品項名稱↓</td>
				<td style="text-align:center">Upload</td>
				
			</tr>

			<?php
				
				$result1 = querydb("SELECT * FROM `菜單` WHERE `品項編號`=$changing  ORDER BY `菜單`.`品項編號` ASC", $db_conn);
				
				foreach ($result1 as $row) {
					
					$tmp=$row['品項編號'];
										
					echo '<tr>';
					echo '<td style="text-align:center">'.$row['品項編號'].'</td>';
					echo '<td style="text-align:center">'.$row['品項名稱'].'</td>';
					
					?>
					
					<form enctype="multipart/form-data" method="post" action="" name="ULFile">
					<input type="hidden" name="MAX_FILE_SIZE" value="102497152">
					<input type="hidden" name="cid" value="<?php echo ($row['品項編號']); ?>">
					<input type="hidden" name="GoUpload" value="1">
					<input type="hidden" name="fname">
					<input type="hidden" name="orgfn">
					
					<?php
					$result2 = querydb("SELECT * FROM `menu_picture` WHERE `cid`=$changing", $db_conn);
					//foreach ($result2 as $row2){
						#echo $row2['photo'];
						echo '<td style="text-align:center">'.'<div class="monkeyb-cust-file"> <img /><span>Select File</span><input class="monkeyb-cust-file" name="userfile" type="file" onchange="form.submit()">'.'</td>';
					//}
					?>
					</form>
					<?php
				}
			?>  
			</tr>
			
			<tr>
			
			<td colspan=3 style="text-align:center">
			
				<?php
					$sqlcmd = "SELECT * FROM menu_picture WHERE cid='$tmp' AND valid='Y'";
					$rs = querydb($sqlcmd, $db_conn);
					if (count($rs)<=0) {
						//print_r(count($rs));
						$tmp = 0;
					}
					
					echo '</br><center><div class="pic" vertical-align:middle;><img class="pic" src="include/getimage.php?ID='.$tmp.'""></div></center></br></br>';
					/*$search = querydb("SELECT * FROM `menu_picture` WHERE cid='$tmp'", $db_conn);
					#echo("SELECT * FROM `菜單圖片` WHERE cid='".$tmp."'");
					foreach ($search as $row2) {
						if($row2['valid'] == 'Y')
							echo '</br><div class="pic" vertical-align:middle;><img class="pic" src="include/getimage.php?ID='.$row['品項編號'].'""></div></br></br>';
						else
							echo '</br><input name="check" type="submit" value="'.$row['訂單編號'].'"class="btcheck" ></a></br>';
						
					
					}*////////////////////////////////////////
				?>
			
			</td>
			
			<tr>
			
		</table>
		<br>
		
		<div>
		</center>
		<br>
	</div>
	
	
	
	
	<div class="footer">
		<a href="http://www.ttu.edu.tw" target="_blank" style="color: black;text-decoration:none;">ttu.edu.tw</a> &emsp;|&emsp;客服信箱：ttucse@gmail.com <br>
	</div>


</body>
</html>
