<?php
session_start();
require_once("connect_mysql.php");
//取得更新資料
$account = $_GET['userAccount'];
$querytime = $_GET['userQuary'];
$premodel = $_GET['premodel'];
$value1 = $_GET['txt_projectName'];
$value2 = $_GET['rdo_premodel'];
//excute sql
$Sql1 = "UPDATE `...` SET `...`='$value1', `...`='$value2' WHERE `...`='$account' AND `...`='$querytime' ;";
//echo $Sql1;
//sql
$rstData = $connect->query($Sql1);
if ($rstData =="1") {
	echo "<script> if(confirm(' 修改完成。 ')) location.href='adminprojectmd.php?function=edit&userAccount=".$account."&userQuary=".$querytime."&premodel=".$value2."' </script>";
}else {
	echo "<script> if(confirm(' 修改失敗，請重新輸入。 ')) location.href='adminprojectmd.php?function=edit&userAccount=".$account."&userQuary=".$querytime."&premodel=".$value2."' </script>";
}

?>