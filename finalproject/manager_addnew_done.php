<?php 
require_once("./include/configure.php");
require_once("./include/db_func.php");
$db_conn = connect2db($dbhost, $dbuser, $dbpwd, $dbname);

$row = querydb_fetch_row("SELECT MAX(`品項編號`) FROM `菜單` ", $db_conn);
$row[0]+=1;
$addname = $_POST['addname'];
$addprice = $_POST['addprice'];
if($addname!=null && $addprice!=null){
	updatedb("INSERT INTO 菜單 (品項編號, 品項名稱, 單價) VALUES ('$row[0]', '$addname', '$addprice')", $db_conn);
echo "<script>alert('新增成功!');</script>";
	echo '<meta http-equiv=REFRESH CONTENT=0;url=manager_addnew.php>';
	exit();
}
else{
	echo "<script>alert('新增失敗!');</script>";
	echo '<meta http-equiv=REFRESH CONTENT=0;url=manager_addnew.php>';
	exit();
}
?>
