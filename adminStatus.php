<?php 

session_start();

if ($_SESSION['who'] != 'admin'){header("Location:index.php"); exit;
}else {

require_once("connect_mysql.php");
$useraccount = 'aaa';
$selectSql = "SELECT * FROM `userinfo` WHERE `...` = 0 OR `...` = 1 ORDER BY `...`;";
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
				<li class="active"><a href="adminStatus.php" accesskey="1" title="adminStatus">會員管理</a></li>
				<li><a href="adminselect.php" accesskey="2" title="adminselect">計畫查詢</a></li>
                <li><a href="adminprediction.php" accesskey="3" title="adminprediction">預測紀錄查詢</a></li>
				<li><a href="adminChangeWeight.php" accesskey="4" title="adminChangeWeight">計畫預測權重設定</a></li>
				<li><a href="index.php" accesskey="5" title="index">登出</a></li>
			</ul>
		</div>
		
<?php require_once("all_banner.php"); ?>
   	
<div class="title">
	<script type="text/javascript">
      
		function formSubmit()
		{
			document.getElementById("form_adminStatus").submit();
		
		}
	</script>
</div>	
	<table align="center">

        <form action="dbadminStatus.php" name="form_adminStatus" method="get" id="form_adminStatus">
           <tr><td colspan="9" align="right"><?php echo "哈囉~".$_SESSION['name']." 先生/小姐"; ?></td></tr>
           <tr><td colspan="9"><b>...</b></td></tr>
           <tr>
           		<td align="left" colspan="9"><input type="button" name="bt_back" onclick="javascript:location.href='adminregister.php'" value="新增會員" style="display: inline-block;padding:0.8em 2em;background:#FF2D2D;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;font-color:#FFFFFF;" /></td>
           </tr>
            <tr>
                <td align="left" style="width: 5%;">編號</td>
                <td align="left" style="width: 10%;">帳號</td>
                <td align="left" style="width: 10%;">姓名</td>
                <td align="center" style="width: 21%;">狀態</td>
                <td align="center" style="width: 10%;">剩餘次數</td>
                <td align="center" style="width: 10%;">使用次數</td>
                <td align="center" style="width: 20%;">使用期限</td>
                <td align="center" style="width: 14%;">詳細/修改 資料</td>
            </tr>
            <?php
            if ($rst->num_rows > 0) { 
                $userStatus_string = "";
                $count = 1;
                while ($row = $rst->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td align="left"><?php echo $row['userAccount']; ?></td>
                    <td align="left"><?php echo $row['userName']; ?></td>
                    <td align="center">
                        <?php if ($row['userStatus'] == 1){ ?>
                            <input type="radio" style="border-radius: 10px;" name="rdo[<?php echo $row['...']; ?>]" value="1" checked />啟用
                            <input type="radio" style="border-radius: 10px;" name="rdo[<?php echo $row['...']; ?>]" value="0" />停用
                            <input type="radio" style="border-radius: 10px;" name="rdo[<?php echo $row['...']; ?>]" value="3" />刪除
                        <?php } ?>  
                        <?php if ($row['userStatus'] == 0) { ?>
                            <input type="radio" style="border-radius: 10px;" name="rdo[<?php echo $row['...']; ?>]" value="1" />啟用
                            <input type="radio" style="border-radius: 10px;" name="rdo[<?php echo $row['...']; ?>]" value="0" checked />停用
                            <input type="radio" style="border-radius: 10px;" name="rdo[<?php echo $row['...']; ?>]" value="3" />刪除
                        <?php } ?>
                    </td>
                    <td>
                         <input type="text" style="border-radius: 10px; width: 95%; " name="cterleft[<?php echo $row['userAccount']; ?>]" oninput="value=value.replace(/[^\d]/g,'')"  maxlength="6" value="<?php echo $row['...']; ?>" >
                    </td>
                    <td>
                         <input type="text" style="border-radius: 10px; width: 95%; " name="cter[<?php echo $row['userAccount']; ?>]" oninput="value=value.replace(/[^\d]/g,'')"  maxlength="6" value="<?php echo $row['...']; ?>" >
                    </td>
                    <td>
                        <input type="date" style="border-radius: 10px;" name="dte[<?php echo $row['...']; ?>]" value="<?php echo $row['...']; ?>">
                    </td>
                    <td>
                        <a href="adminmodify.php?modifyid=<?php echo $row['...']; ?>" >詳情/修改</a>
                    </td>
                </tr>
                <?php $count += 1; } }else {echo "<td colspan=6 align='center'>查無資料</td>";} ?>
                <tr>
                    <td colspan="8">
                       <input type="button" onclick="formSubmit()" style="border-radius: 10px;" name="bt_submit" value="確定修改" />
                    </td>
                </tr>
        </form>
	</table>
	
	
		<br>
		<br>
		<br>
	
<?php require_once("all_footer.php"); ?>
</body>
</html>

<?php } ?>
