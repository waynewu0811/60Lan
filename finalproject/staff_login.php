<?php    
session_start();
header("Content-Type:text/html; charset=utf-8");
require_once("./include/configure.php");

$conn = mysqli_connect($dbhost, $dbuser, $dbpwd, $dbname);
mysqli_set_charset($conn, "UTF8" );

if (!$conn) {
  die ('無法建立MySQL資料庫的連線');
}

if(isset($_POST['logout'])) {
	$_SESSION['AdminRights'] = 0;
	echo "<script>alert('管理員權限已登出!')</script>";
	echo '<meta http-equiv=REFRESH CONTENT=0;url=staff.html>';
	exit();
}
else{
	$pwd = $_POST["pwd"];
	$_SESSION['pwd'] = $pwd;
	if ($_POST["pwd"] == ""){
		echo "<script>alert('請輸入密碼!'); window.history.back();</script>";
		exit();
	}
	else{
		$sql = "SELECT * FROM 階級 WHERE 密碼 = '$pwd'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_row($result);
		if($pwd != null && $row[1] == $pwd){
			$_SESSION['Name'] = $row[0];	
			if($row[2]==1){						//1.審核 新增 查看 root
				$_SESSION['AdminRights'] = 1;
			}
			else if($row[2]==2){				//2.審核 	  查看 manage(管理)
				$_SESSION['AdminRights'] = 2;
			}
			else if($row[2]==3){				//3.	新增  查看 secretary(秘書)
				$_SESSION['AdminRights'] = 3;
			}
			else if($row[2]==4){				//4.		  查看 boss
				$_SESSION['AdminRights'] = 4;
			}
			echo '<meta http-equiv=REFRESH CONTENT=0;url=manager.php>';
			exit();
		}
		
		
		else{
			echo "<script>alert('並無該位管理員!'); window.history.back();</script>";
			exit();
		} 
	}
}
?>
