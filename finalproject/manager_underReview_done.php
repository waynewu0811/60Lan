<?php
session_start();
if($_SESSION['AdminRights']!=1&&$_SESSION['AdminRights']!=3){
	echo "<script>alert('並無審核權限!');</script>";
	echo "<script>history.go(-1)</script>";
	exit();
}
?>
<?php
require_once("./include/configure.php");
require_once("./include/db_func.php");
$db_conn = connect2db($dbhost, $dbuser, $dbpwd, $dbname);

$ch = $_POST['check'];
querydb("
UPDATE 菜單
SET 已上架 = 1
WHERE 品項編號 = $ch", $db_conn);


if(querydb("UPDATE `菜單` SET `已上架` = '1' WHERE `未上架商品`.`品項編號` =$ch", $db_conn))
	print_r("上架成功");

echo '<meta http-equiv=REFRESH CONTENT=0;url=manager_underReview.php>';
exit();


?>
