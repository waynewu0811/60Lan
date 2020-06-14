<?php
require_once("./include/configure.php");
require_once("./include/db_func.php");
$db_conn = connect2db($dbhost, $dbuser, $dbpwd, $dbname);

$ch = $_POST['check'];
querydb("
INSERT INTO 菜單 (品項名稱, 單價)
SELECT `品項名稱`,`單價`
FROM 未上架商品
WHERE 品項編號 = $ch", $db_conn);

if(querydb("UPDATE `未上架商品` SET `已上架` = '1' WHERE `未上架商品`.`品項編號` =$ch", $db_conn))
	print_r("上架成功");

echo '<meta http-equiv=REFRESH CONTENT=0;url=manager_underReview.php>';
exit();


?>
