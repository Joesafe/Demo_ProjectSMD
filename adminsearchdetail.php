<?php
session_start();

if ($_SESSION['who'] != 'admin'){header("Location:index.php"); exit;
}else {

require_once("connect_mysql.php");
//$nowAccount1 = $_GET['nowAccount'];
//$nowTime1 = $_GET['nowTime'];
//$nowModel1 = $_GET['nowModel'];
$datestp = $_GET['...'];
$account = $_GET['...'];
//$predictmd = $_GET['rdo_premodel'][$nowModel1];
$selectSql = "SELECT * FROM `...` WHERE `...` = '$datestp' AND `...` = '$account';";
//echo $selectSql;
$rst = $connect->query($selectSql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php require_once("all_head.php"); ?>
<body>

<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
        	<span class="icon icon-cog"></span>
			<h1><a href="#">...</a></h1>
		</div>
		<div id="menu">
			<ul>
				<ul>
                <li><a href="adminStatus.php" accesskey="1" title="adminStatus">會員審核</a></li>
                <li class="active"><a href="adminselect.php" accesskey="2" title="adminselect">計畫查詢</a></li>
                <li><a href="adminprediction.php" accesskey="3" title="adminprediction">預測紀錄查詢</a></li>
                <li><a href="adminChangeWeight.php" accesskey="4" title="adminChangeWeight">計畫預測權重設定</a></li>
                <li><a href="index.php" accesskey="5" title="index">登出</a></li>
            </ul>
			</ul>
		</div>
		
<?php require_once("all_banner.php"); ?>
   	
<div class="title">
	
	<table align="center">
		<?php if ($rst->num_rows > 0) { 
	$row = $rst->fetch_all(MYSQLI_BOTH) ?>
	
        <tr><td colspan="3" align="right"><?php echo "哈囉~".$_SESSION['name']." 先生/小姐"; ?></td></tr>
        <tr><td colspan="3" align="center"><b>【<?php echo $row[0]['...']; ?>】詳細資料</b></td></tr>
        <tr>
            <th rowspan="3">
                ...
            </th>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
            	<?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <?php
			$rdo_youentrep_string = "否";
			$rdo_newcompay_string = "否";
			$rdo_gvm_string = "否";
			$rdo_lab_string = "否";
			if ($row[0]['...'] == "1"){$rdo_youentrep_string = "是";}
			if ($row[0]['...'] == "1"){$rdo_newcompay_string = "是";}
			if ($row[0]['...'] == "1"){$rdo_gvm_string = "是";}
			if ($row[0]['...'] == "1"){$rdo_lab_string = "是";}
		?>
        <tr>
            <th rowspan="4">
                ...
            </th>
            <td align="left">
                .
            </td>
            <td align="left">
               <?php echo $rdo_youentrep_string; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...
            </td>
            <td align="left">
               <?php echo $rdo_newcompay_string; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ....
            </td>
            <td align="left">
                <?php echo $rdo_gvm_string; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ./.
            </td>
            <td align="left">
                <?php echo $rdo_lab_string; ?>
            </td>
        </tr>
        <tr>
            <th rowspan="2">
                ...
            </th>
            <td align="left">
                ...(100字內)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(100字內)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <th rowspan="5">
                ...
            </th>
            <td align="left">
                ...日期
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
               <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
               <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(%)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(100字內)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <th rowspan="10">
                ...
            </th>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
        </tr>
        <tr>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <th rowspan="6">
                ...
            </th>
            <td align="left">
                ...(第一年)(千元)
            </td>
            <td align="left">
               <?php echo $row[0]['...']; ?>
        </tr>
        <tr>
            <td align="left">
                ...(第二年)(千元)
            </td>
            <td align="left">
               <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(第三年)(千元)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(第一年)(千元)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(第二年)(千元)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(第三年)(千元)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <th rowspan="6">
                ...
            </th>
            <td align="left">
                ...(國內)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
        </tr>
        <tr>
            <td align="left">
                ...(國內)
            </td>
            <td align="left">
               <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(國外)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(國外)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(國外)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <th rowspan="8">
                ...
            </th>
            <td align="left">
                ...(SBIR)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
        </tr>
        <tr>
            <td align="left">
                ...(SIIR)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(...)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(其他)
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(...)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(...)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(...)
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(...)
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <th>
                ...
            </th>
            <td align="left">
                ...(%)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
        </tr>
        <tr>
            <th rowspan="15">
                ...
            </th>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
        </tr>
        <tr>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...（含）以下(位)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ..(含)以上(位)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>

        <tr>
            <th rowspan="5">
                ...
            </th>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
        </tr>
        <tr>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
                <?php echo $row[0]['...']; ?>
            </td>
        </tr>
        <tr>
            <th>
                ...
            </th>
            <td align="left">
                ...
            </td>
            <td align="left">
               <?php echo $row[0]['...']; ?>
            </td>   
        </tr>
        <tr>
            <th>
                ...
            </th>
            <td align="left">
                ...(%)
            </td>
            <td align="left">
               <?php echo $row[0]['...']*100; ?>
            </td>   
        </tr>
        <?php }else {echo "查無資料。";} ?>
        <tr>
            <td colspan="3" align="center">
                <input type="button" name="pageback" id="pageback1" onclick="history.back()" value="回上一頁" />
            </td>
        </tr>
		
	</table>
	
	
		<br>
		<br>
		<br>
	</div>
<?php require_once("all_footer.php"); ?>
</body>
</html>

<?php } ?>

