<?php
// ���{���]���ثe�u�Τ@�ӰѼƧY�i���o�Ӥ��A�]�����w���ü{�A�Ы�Ҧp���i�I
// �ܼƤΨ禡�B�z�A�Ъ`�N�䶶��
require_once("gpsvars.php");
require_once("configure.php");
require_once("db_func.php");
$db_conn = connect2db($dbhost, $dbuser, $dbpwd, $dbname);
$ID = $_GET['ID'];
if (!isset($ID)) exit;
$filetype = 'image/pjpeg';
$sqlcmd = "SELECT * FROM `menu_picture` WHERE cid='$ID' AND valid='Y'";

#echo "SELECT * FROM `menu_picture` WHERE cid='".$ID."' AND valid='Y'";

$rs = querydb($sqlcmd, $db_conn);

	
					
//$filename = $AttachDir . '/' . str_pad($ID, 8, '0', STR_PAD_LEFT) . '.jpg';
//$fp = @fopen($filename,'r');
$filename = 'demophoto.jpg';

if (count($rs)>0) {
    //$output = fread($fp, filesize($filename));
	$output = $rs[0]['photo'];
    header("Content-type: $filetype \n");
    header("Content-Disposition: filename=$filename \n");
	echo $output;
} else{ print_r("1");die ('File Not Exist!');}

?>