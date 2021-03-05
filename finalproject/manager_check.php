<?php
require_once("./include/configure.php");
require_once("./include/db_func.php");
$db_conn = connect2db($dbhost, $dbuser, $dbpwd, $dbname);

$ch = $_POST['check'];
querydb("UPDATE `訂單` SET `已送達` = '1' WHERE `訂單`.`訂單編號` =$ch", $db_conn);

echo '<meta http-equiv=REFRESH CONTENT=0;url=manager_statistic3.php>';
exit();


?>
