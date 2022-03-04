<?php 
session_start();
if ($_SESSION['who'] != 'admin'){header("Location:index.php"); exit;
}else {
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
				<?php require_once("adminmenu.php"); ?>
			</ul>
		</div>
		
<?php require_once("all_banner.php"); ?>
   	
<div class="title">
	<?php 
    $account = $_GET['userAccount'];
    $querytime = $_GET['userQuary'];
    $premodel = $_GET['premodel'];
    //$status = $_GET['status'];//上一頁是已完成或未完成
    $i1 = "";
    $i2 = "";
    $i2_1 = "";
    $i2_2 = "";
    $i2_3 = "";
    require_once("connect_mysql.php");
    $selectSql1 = "SELECT * FROM `...` WHERE `...`='$account' AND `...`='$querytime' AND `...`='$premodel' ;";
    //echo $selectSql1;
    $rst1 = $connect->query($selectSql1);
    if ($rst1->num_rows > 0)
        { 
            $row = $rst1->fetch_all(MYSQLI_BOTH);
            $i1 = $row[0]['...'];
            $i2 = $row[0]['...'];
            if ($i2=="...") {$i2_1 = "checked";
            }else if ($i2=="..."){$i2_2 = "checked";
            }else if ($i2=="..."){$i2_3 = "checked";}
            //echo $selectSql1;
        }
    ?>
    <script type="text/javascript">
    function checkAndSubmit() {
        var form_myquary = document.getElementById("form_myquary0");
        var input1 = document.getElementById("txt_projectName1").value;
        var rdob = "";
        for(var i=0; i<form_myquary.rdo_premodel.length; i++)
            {
                if(form_myquary.rdo_premodel[i].checked)
                {
                    rdob = form_myquary.rdo_premodel[i].value;
                }
            }
        if (input1 == "" || rdob == "") { alert("欄位未填寫完成。"); }
        else { document.getElementById("form_myquary0").submit(); }
    }
    </script> 
	<table align="center">

		<tr><td colspan="3" align="right"><?php echo "哈囉~".$_SESSION['name']." 先生/小姐"; ?></td></tr>
		<tr><td colspan="3" align="center"><b>【<?php echo $i1; ?>...</b></td></tr>
		<form action="dbadminquary0.php" id="form_myquary0" method="get">
        <input type="hidden" style="border-radius: 10px;" name="userAccount" value="<?php echo $account; ?>" />
        <input type="hidden" style="border-radius: 10px;" name="userQuary" value="<?php echo $querytime; ?>" />
        <input type="hidden" style="border-radius: 10px;" name="premodel" value="<?php echo $premodel; ?>" />
		<tr> <td>計畫名稱</td>
            <td><input type="text" required="required" style="border-radius: 10px;" name="txt_projectName" id="txt_projectName1" maxlength="20" value="<?php echo $i1; ?>" /></td></tr>
            <tr><td>預測模式</td>
                <td align="left"><input type="radio" name="..." value="..." <?php echo $i2_1; ?> />SBIR
                <input type="radio" style="border-radius: 10px;" name="..." value="..." <?php echo $i2_2; ?> />CITD
                <input type="radio" style="border-radius: 10px;" name="..." value="..." <?php echo $i2_3; ?> />SIIR</td>
            </tr>
        <tr>
            <td align="center" colspan="3">
                <input type="button" style="border-radius: 10px;" name="bt_submit" onclick="checkAndSubmit()" value="存檔">
            </td>
        </tr>
		</form>
	</table>
	
	
		<br>
		<br>
		<br>
	</div>
<?php require_once("all_footer.php"); ?>
</body>
</html>
<?php } ?>
