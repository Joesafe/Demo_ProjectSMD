<?php
session_start();
require_once("connect_mysql.php");
 //取得更新資料
$arr1_0 = $_GET['weightItem1-0'];
$arr2_0 = $_GET['weightItem2-0'];
$arr3_0 = $_GET['weightItem3-0'];
$arr4_0 = $_GET['weightItem4-0'];
$arr5_0 = $_GET['weightItem5-0'];
$arr6_0 = $_GET['weightItem6-0'];
$arr7_0 = $_GET['weightItem7-0'];
$arr8_0 = $_GET['weightItem8-0'];
$arr9_0 = $_GET['weightItem9-0'];
$arr10_0 = $_GET['weightItem10-0'];
$arr11_0 = $_GET['weightItem11-0'];
$arr1_1 = $_GET['weightItem1-1'];
$arr2_1 = $_GET['weightItem2-1'];
$arr3_1 = $_GET['weightItem3-1'];
$arr4_1 = $_GET['weightItem4-1'];
$arr5_1 = $_GET['weightItem5-1'];
$arr6_1 = $_GET['weightItem6-1'];
$arr7_1 = $_GET['weightItem7-1'];
$arr8_1 = $_GET['weightItem8-1'];
$arr9_1 = $_GET['weightItem9-1'];
$arr10_1 = $_GET['weightItem10-1'];
$arr11_1 = $_GET['weightItem11-1'];
$arr1_2 = $_GET['weightItem1-2'];
$arr2_2 = $_GET['weightItem2-2'];
$arr3_2 = $_GET['weightItem3-2'];
$arr4_2 = $_GET['weightItem4-2'];
$arr5_2 = $_GET['weightItem5-2'];
$arr6_2 = $_GET['weightItem6-2'];
$arr7_2 = $_GET['weightItem7-2'];
$arr8_2 = $_GET['weightItem8-2'];
$arr9_2 = $_GET['weightItem9-2'];
$arr10_2 = $_GET['weightItem10-2'];
$arr11_2 = $_GET['weightItem11-2'];
//sql
$Sql1 = "UPDATE `...` SET `...` = CASE `...` WHEN '...' THEN '$arr1_0' WHEN '...' THEN '$arr1_1' WHEN '...' THEN '$arr1_2' END, `weightItem2` =CASE `...` WHEN '...' THEN '$arr2_0' WHEN '...' THEN '$arr2_1' WHEN '...' THEN '$arr2_2' END, `weightItem3` = CASE `...` WHEN '...' THEN '$arr3_0' WHEN '...' THEN '$arr3_1' WHEN '...' THEN '$arr3_2' END,  `...` = CASE `...` WHEN '...' THEN '$arr4_0' WHEN '...' THEN '$arr4_1' WHEN '...' THEN '$arr4_2' END, `...` = CASE `...` WHEN '...' THEN '$arr5_0' WHEN '...' THEN '$arr5_1' WHEN '...' THEN '$arr5_2' END, `...` =CASE `...` WHEN '...' THEN '$arr6_0' WHEN '...' THEN '$arr6_1' WHEN '...' THEN '$arr6_2' END, `...` = CASE `...` WHEN '...' THEN '$arr7_0' WHEN '...' THEN '$arr7_1' WHEN '...' THEN '$arr7_2' END,  `...` = CASE `...` WHEN '...' THEN '$arr8_0' WHEN '...' THEN '$arr8_1' WHEN '...' THEN '$arr8_2' END, `...` = CASE `...` WHEN '...' THEN '$arr9_0' WHEN '...' THEN '$arr9_1' WHEN '...' THEN '$arr9_2' END, `...` =CASE `...` WHEN '...' THEN '$arr10_0' WHEN '...' THEN '$arr10_1' WHEN '...' THEN '$arr10_2' END, `...` = CASE `...` WHEN '...' THEN '$arr11_0' WHEN '...' THEN '$arr11_1' WHEN '...' THEN '$arr11_2' END WHERE `...` IN ('...','...','...')";
$rstData = $connect->query($Sql1);
//echo $rstData;
if ($rstData == "1")
{
 echo "<script> if(confirm(' 修改完成。 '))  location.href='adminChangeWeight.php'; </script>";
}
else 
{ 
	echo "<script> if(confirm(' 修改失敗。 '))  location.href='adminChangeWeight.php'; </script>";
}
?>