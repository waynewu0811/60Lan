<?php
if (isset($_POST['Abort'])) {
    header("Location: contactlist.php");
    exit();
}    
// Authentication 認證
require_once("../include/auth.php");
// 變數及函式處理，請注意其順序
require_once("../include/gpsvars.php");
require_once("../include/configure.php");
require_once("../include/db_func.php");
require_once("../include/aux_func.php");
$db_conn = connect2db('mysqli',$dbhost, $dbuser, $dbpwd, $dbname);
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
<?php
if (isset($GoUpload) && $GoUpload=='1') {
    $fname = $_FILES["userfile"]['name'];
    $ftype = $_FILES["userfile"]['type'];
    if ($_POST["fname"] <> $_POST["orgfn"]) $fname = $_POST["fname"];
    $fsize = $_FILES['userfile']['size'];
    if (!empty($fname) && addslashes($fname)==$fname && $fsize>0) {
        $uploadfile = "$AttachDir/" . str_pad($cid,8,'0',STR_PAD_LEFT) . '.jpg';
        // 如果上傳的不是.jpg檔，怎麼辦！(自行思考對策)
        move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
        chmod ($uploadfile,0644); 
    } else {
        $ErrMsg = '<font color="Red">'
            . '檔案不存在、大小為0或超過上限(100MBytes)</font>';
    }
}
require_once("../include/header.php");
?>
<br />
<form enctype="multipart/form-data" method="post" action="" name="ULFile">
<table width="420" align="center" border="0" cellspacing="0" cellpadding="0">
<tr><td align="center">
<span style="font:12pt">
<b>人員編號<?php echo $cid ?>附件檔案上傳</b></span></td>
</tr>
</table>

<input type="hidden" name="MAX_FILE_SIZE" value="102497152">
<input type="hidden" name="cid" value="<?php echo $cid ?>">
<input type="hidden" name="GoUpload" value="1">
<input type="hidden" name="fname">
<input type="hidden" name="orgfn">
<br />
<table width="420" border="0" cellspacing="0" cellpadding="3" align="center">
<tr>
<td align="center"> 上傳檔名：<input name="userfile" type="file"> </td>
</tr>
<tr>
<th>
<input type="button" name="upload" value="上傳照片" onclick="startload()">&nbsp;&nbsp;
<input type="submit" name="Abort" value="結束上傳">
</th></tr>
</table>
</form>
<?php
$filename = $AttachDir . '/' . str_pad($cid, 8, '0', STR_PAD_LEFT) . '.jpg';
if (file_exists($filename)) {
    $Tag = date('His');
?>
<br /> <br />
<div align="center">原存影像<br /><br />
<img src="getimage.php?ID=<?php echo $cid ?>&Tag=<?php echo $Tag ?>" border="0" width="320">
</div>
<?php
}
require_once ("/var/www/html/I4010/include/footer.php");
?>