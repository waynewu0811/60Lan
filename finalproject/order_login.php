<?php

header("Content-Type:text/html; charset=utf-8");

$conn = mysqli_connect('localhost', 'root', '','60lan');
mysqli_set_charset($conn, "UTF8");
if (!$conn) {
  die ('無法建立MySQL資料庫的連線');
}
$id = $_POST['id'];
$pw = $_POST['pw'];

$sql = "SELECT * FROM 會員 WHERE 帳號 = '$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($result);


if($id != null && $pw != null && $row[0] == $id && $row[1] == $pw)
{
	$_SESSION['username'] = $id;
	echo '登入成功!';
    echo '<meta http-equiv=REFRESH CONTENT=1;url=order_action.php>';
	exit();
}
else{
	echo "<script>alert('請重新確認密碼!'); window.history.back();</script>";
	exit();
}
?>
