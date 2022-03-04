<?php 
session_start();
if ($_SESSION['who'] != 'admin'){header("Location:index.php"); exit;
}else {
require_once("connect_mysql.php");
if (isset($_GET['startquary'])) {}
$sratdate = "";
$enddate = "";
$minbudge = "";
$maxbudge = "";
$premodel = "";
$youentrep = "";
if (isset($_GET['startquary'])) {$sratdate = $_GET['startquary'];}
if (isset($_GET['endquary'])) {$enddate = $_GET['endquary'];}
if (isset($_GET['int_totalbudge_min'])) {$minbudge = $_GET['...'];}
if (isset($_GET['int_totalbudge_max'])) {$maxbudge = $_GET['...'];}
if (isset($_GET['projectPass_min'])) {$minprojectpass = (float)$_GET['...']*0.01;}
if (isset($_GET['projectPass_max'])) {$maxprojectpass = (float)$_GET['...']*0.01;}
if (isset($_GET['rdo_premodel'])) {$premodel = $_GET['...'];}
if (isset($_GET['rdo_youentrep'])) {$youentrep = $_GET['...'];}
//只顯示查詢過的資料
$selectSql = "SELECT * FROM `...` WHERE (`..`='2' OR `..`='1') ";
if (isset($sratdate) && $sratdate !=""){
	$selectSql = $selectSql."AND `...` >= '$sratdate 00:00:00' ";
}
if (isset($enddate) && $enddate != ""){
	$selectSql = $selectSql."AND `...` <= '$enddate 23:59:59' ";
}
if (isset($minbudge) && $minbudge != "") {
	 $selectSql = $selectSql."AND `...` >= '$minbudge' ";
}
if (isset($maxbudge) && $maxbudge != "") {
	 $selectSql = $selectSql."AND `...` <= '$maxbudge' ";
}
if (isset($minprojectpass) && $minprojectpass != "") {
     $selectSql = $selectSql."AND `...` >= '$minprojectpass' ";
}
if (isset($maxprojectpass) && $maxprojectpass != "") {
     $selectSql = $selectSql."AND `...` <= '$maxprojectpass' ";
}
if ($premodel != "") {
    $selectSql = $selectSql."AND `...` = '$premodel' ";
}
if ($youentrep != "") {
    $selectSql = $selectSql."AND `...` = '$youentrep' ";
}
$selectSql = $selectSql."ORDER BY `...` ;";
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
				<li><a href="adminStatus.php" accesskey="1" title="adminStatus">會員管理</a></li>
				<li class="active"><a href="adminselect.php" accesskey="2" title="adminselect">計畫查詢</a></li>
                <li><a href="adminprediction.php" accesskey="3" title="adminprediction">預測紀錄查詢</a></li>
				<li><a href="adminChangeWeight.php" accesskey="4" title="adminChangeWeight">計畫預測權重設定</a></li>
				<li><a href="index.php" accesskey="4" title="index">登出</a></li>
			</ul>
		</div>
		
<?php require_once("all_banner.php"); ?>
    	
<div class="title">
		
   <script type="text/javascript">
		function formSubmit()
		{
			document.getElementById("adminsearch").submit();
		
		}
	</script>
    <table align="center">
    	<tr><td colspan="10" align="right"><?php echo "哈囉~".$_SESSION['name']." 先生/小姐"; ?></td></tr>
        <tr><td colspan="10" align="center"><b>歷史紀錄查詢</b></td></tr>
        <tr>
        	<td align="center" style="width: 10%">帳號</td>
        	<td align="center" style="width: 15%">計畫名稱</td>
            <td align="center" style="width: 15%">申請日期</td>
            <td align="center" style="width: 8%">預測模式</td>
            <td align="center" style="width: 10%">計畫總金額</td>
            <td align="center" style="width: 8%">是否為青年創業</td>
            <td align="center" colspan="4" style="width: 34%">執行項目</td>
        </tr>
        <?php if ($rst->num_rows > 0) { 
        while ($row = $rst->fetch_assoc()) { ?>
        <tr>
            <?php
            $rdo_youentrep_string = "否";
            $rdo_newcompay_string = "否";
            $rdo_gvm_string = "否";
            $rdo_lab_string = "否";
            if ($row['...'] == "1"){$rdo_youentrep_string = "是";}
            if ($row['...'] == "1"){$rdo_newcompay_string = "是";}
            if ($row['...'] == "1"){$rdo_gvm_string = "是";}
            if ($row['...'] == "1"){$rdo_lab_string = "是";}
            ?>
            
            <td align="center"> <?php echo $row['...']; ?> </td>
            <td align="center"> <?php echo $row['...']; ?> </td>
            <?php $str_YYYMMDD = explode(" ", (string)$row['...'])[0]; ?>
            <td align="center"> <?php echo $str_YYYMMDD; ?> </td>
            <td align="center"> <?php echo $row['...']; ?> </td>
            <td align="center"> <?php echo $row['...']; ?> </td>
            <td align="center"> <?php echo $rdo_youentrep_string; ?> </td>
            <td>
            	<a href="adminsearchdetail.php?userQuary=<?php echo $row['...']; ?>&userAccount=<?php echo $row['...']; ?>"><button style="display: inline-block;padding:0.6em 1em;background:#00BB00;line-height: 1em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 8px;"><font color="#FFFFFF">詳情</font>
            </td>
            <td>
                <a href="adminprojectmd.php?userQuary=<?php echo $row['...']; ?>&userAccount=<?php echo $row['...']; ?>&function=edit&premodel=<?php echo $row['...']; ?>"><button style="display: inline-block;padding:0.6em 1em;background:#00BB00;line-height: 1em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 8px;"><font color="#FFFFFF">編輯</font>
            </td>
            <td>
                <a href="adminpredictionrecord.php?userQuary=<?php echo $row['...']; ?>&userAccount=<?php echo $row['...']; ?>"><button style="display: inline-block;padding:0.6em 1em;background:#00BB00;line-height: 1em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 8px;"><font color="#FFFFFF">預測紀錄</font>
            </td>
            <td><a href="adminprojectmd.php?userQuary=<?php echo $row['...']; ?>&userAccount=<?php echo $row['...']; ?>&function=delete&premodel=<?php echo $row['...']; ?>"><button style="display: inline-block;padding:0.4em 0.8em;line-height: 1em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border: 5px solid red;background:#FFFFFF;border-radius: 8px;"><font color="#000000">刪除</font></td>
            <!--</form>-->

        </tr>
    <?php } }else {echo "<td colspan=6 align='center'>查無資料</td>";} ?>
        <tr>
            <td colspan="9" align=center>
                <input type="button" name="bt_back" onclick="javascript:location.href='adminselect.php'" value="回計畫查詢" style="display: inline-block;padding:0.8em 2em;background:#2056ac;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;font-color:#FFFFFF;" />

            </td>
        </tr>
    </table>

		<br>
		<br>
		<br>
<?php require_once("all_footer.php"); ?>
</body>
</html>

<?php } ?>