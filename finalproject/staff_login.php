<?php    
session_start();
$UserPassword = "123";


if(isset($_POST['logout'])) {
	$_SESSION['AdminRights'] = 0;
	echo "<script>alert('管理員權限已登出!')</script>";
	echo '<meta http-equiv=REFRESH CONTENT=0;url=index.php>';
	exit();
}
else{
	if ($_POST["pwd"] == ""){
		echo "<script>alert('請輸入密碼!'); window.history.back();</script>";
		exit();
	}
	else{
		if ($_POST["pwd"] == $UserPassword) {
			$_SESSION['AdminRights'] = 1;
			echo '<meta http-equiv=REFRESH CONTENT=0;url=manager.php>';
			exit();
		}
		else{
			echo "<script>alert('密碼錯誤!'); window.history.back();</script>";
			exit();
		}  
	}
}
?>
