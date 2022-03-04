<?php
session_start();

if ($_SESSION['who'] != 'admin'){header("Location:index.php"); exit;
}else {

require_once("connect_mysql.php");
$selectSql = "SELECT * FROM `...` WHERE 1;";
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
				<li><a href="adminselect.php" accesskey="2" title="adminselect">計畫查詢</a></li>
				<li><a href="adminprediction.php" accesskey="3" title="adminprediction">預測紀錄查詢</a></li>
				<li class="active"><a href="adminChangeWeight.php" accesskey="4" title="adminChangeWeight">計畫預測權重設定</a></li>
				<li><a href="index.php" accesskey="5" title="index">登出</a></li>
			</ul>
		</div>
		
<?php require_once("all_banner.php"); ?>
   	
<div class="title">
	
	<table align="center">
		<script type="text/javascript">
		function formSubmit()
		{
			var i1 = document.getElementById("weightItem1-0").value;
			var i2 = document.getElementById("weightItem1-1").value;
			var i3 = document.getElementById("weightItem1-2").value;
			var i4 = document.getElementById("weightItem2-0").value;
			var i5 = document.getElementById("weightItem2-1").value;
			var i6 = document.getElementById("weightItem2-2").value;
			var i7 = document.getElementById("weightItem3-0").value;
			var i8 = document.getElementById("weightItem3-1").value;
			//var i9 = document.getElementById("weightItem3-2").value;
			var i10 = document.getElementById("weightItem4-0").value;
			var i11 = document.getElementById("weightItem4-1").value;
			var i12 = document.getElementById("weightItem4-2").value;
			var i13 = document.getElementById("weightItem5-0").value;
			var i14 = document.getElementById("weightItem5-1").value;
			//var i15 = document.getElementById("weightItem5-2").value;
			var i16 = document.getElementById("weightItem6-0").value;
			var i17 = document.getElementById("weightItem6-1").value;
			var i18 = document.getElementById("weightItem6-2").value;
			var i19 = document.getElementById("weightItem7-0").value;
			var i20 = document.getElementById("weightItem7-1").value;
			var i21 = document.getElementById("weightItem7-2").value;
			var i22 = document.getElementById("weightItem8-0").value;
			var i23 = document.getElementById("weightItem8-1").value;
			var i24 = document.getElementById("weightItem8-2").value;
			var i25 = document.getElementById("weightItem9-0").value;
			var i26 = document.getElementById("weightItem9-1").value;
			var i27 = document.getElementById("weightItem9-2").value;
			var i28 = document.getElementById("weightItem10-0").value;
			var i29 = document.getElementById("weightItem10-1").value;
			var i30 = document.getElementById("weightItem10-2").value;
			var i31 = document.getElementById("weightItem11-0").value;
			var i32 = document.getElementById("weightItem11-1").value;
			var i33 = document.getElementById("weightItem11-2").value;
			if (i1 >= 0 && i1 <= 1 && i2 >= 0 && i2 <= 1 && i3 >= 0 && i3 <= 1 && i4 >= 0 && i4 <= 1 && i5 >= 0 && i5 <= 1 && i6 >= 0 && i6 <= 1 && i7 >= 0 && i7 <= 1 && i8 >= 0 && i8 <= 1 && i10 >= 0 && i10 <= 1 && i11 >= 0 && i11 <= 1 && i12 >= 0 && i12 <= 1 && i13 >= 0 && i13 <= 1 && i14 >= 0 && i14 <= 1 && i16 >= 0 && i16 <= 1 && i17 >= 0 && i17 <= 1 && i18 >= 0 && i18 <= 1 && i19 >= 0 && i19 <= 1 && i20 >= 0 && i20 <= 1 && i21 >= 0 && i21 <= 1 && i22 >= 0 && i22 <= 1 && i23 >= 0 && i23 <= 1 && i24 >= 0 && i24 <= 1 && i25 >= 0 && i25 <= 1 && i26 >= 0 && i26 <= 1 && i27 >= 0 && i27 <= 1 && i28 >= 0 && i28 <= 1 && i29 >= 0 && i29 <= 1 && i30 >= 0 && i30 <= 1 && i31 >= 0 && i31 <= 1 && i32 >= 0 && i32 <= 1 && i33 >= 0 && i33 <= 1){
				document.getElementById("form_dbchangeweight").submit();
			}else {alert(" 輸入錯誤！權重值最大為1，最小為0。。 ");}
		}
	</script>
		<form action="dbchangeweight.php" id="form_dbchangeweight" meth="get">

		<?php if ($rst->num_rows > 0) { 
		$row = $rst->fetch_all(MYSQLI_BOTH) ?>

		<tr><td colspan="4" align="right"><?php echo "哈囉~".$_SESSION['name']." 先生/小姐"; ?></td></tr>
		<tr><td colspan="4"><b>...，請輸入0~1的小數或整數。</b></td></tr>
		<tr>
			<td align="left">預測模式</td>
			<td align="left"><?php echo $row[0]['...']; ?></td>
			<td align="left"><?php echo $row[1]['...']; ?></td>
			<td align="left"><?php echo $row[2]['...']; ?></td>
		</tr>
		<tr>
			<td align="left">...</td>
			<td align="left" ><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem1-0" id="weightItem1-0" value="<?php echo $row[0]['...']; ?>"></td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem1-1" id="weightItem1-1" value="<?php echo $row[1]['...']; ?>"></td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem1-2" id="weightItem1-2" value="<?php echo $row[2]['...']; ?>"></td>
		</tr>
		<tr>
			<td align="left">...</td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem2-0" id="weightItem2-0" value="<?php echo $row[0]['...']; ?>" ></td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem2-1" id="weightItem2-1" value="<?php echo $row[1]['...']; ?>" ></td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem2-2" id="weightItem2-2" value="<?php echo $row[2]['...']; ?>" ></td>
		</tr>
		<tr>
			<td align="left">...</td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem3-0" id="weightItem3-0" value="<?php echo $row[0]['...']; ?>"></td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem3-1" id="weightItem3-1" value="<?php echo $row[1]['...']; ?>"></td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="不計算" step="0.01" min="0" max="1" name="weightItem3-2" id="weightItem3-2" readonly ></td>
		<tr>
			<td align="left">...</td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem4-0" id="weightItem4-0" value="<?php echo $row[0]['...']; ?>"></td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem4-1" id="weightItem4-1" value="<?php echo $row[1]['...']; ?>"></td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem4-2" id="weightItem4-2" value="<?php echo $row[2]['...']; ?>"></td>
		</tr>
		<tr>
			<td align="left">...</td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem5-0" id="weightItem5-0" value="<?php echo $row[0]['...']; ?>"></td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem5-1" id="weightItem5-1" value="<?php echo $row[1]['...']; ?>"></td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="不計算" step="0.01" min="0" max="1" name="weightItem5-2" id="weightItem5-2"  readonly ></td>
		</tr>
		<tr>
			<td align="left">...</td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem6-0" id="weightItem6-0" value="<?php echo $row[0]['...']; ?>"></td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem6-1" id="weightItem6-1" value="<?php echo $row[1]['...']; ?>"></td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem6-2" id="weightItem6-2" value="<?php echo $row[2]['...']; ?>"></td>
		</tr>
		<tr>
			<td align="left">...</td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem7-0" id="weightItem7-0" value="<?php echo $row[0]['...']; ?>"></td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem7-1" id="weightItem7-1" value="<?php echo $row[1]['...']; ?>"></td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem7-2" id="weightItem7-2" value="<?php echo $row[2]['...']; ?>"></td>
		</tr>
		<tr>
			<td align="left">市占率</td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem8-0" id="weightItem8-0" value="<?php echo $row[0]['...']; ?>"></td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem8-1" id="weightItem8-1" value="<?php echo $row[1]['...']; ?>"></td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem8-2" id="weightItem8-2" value="<?php echo $row[2]['...']; ?>"></td>
		</tr>
		<tr>
			<td align="left">計畫參與人力</td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem9-0" id="weightItem9-0" value="<?php echo $row[0]['...']; ?>"></td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem9-1" id="weightItem9-1" value="<?php echo $row[1]['...']; ?>"></td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem9-2" id="weightItem9-2" value="<?php echo $row[2]['...']; ?>"></td>
		</tr>
		<tr>
			<td align="left">申請經費</td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem10-0" id="weightItem10-0" value="<?php echo $row[0]['...']; ?>"></td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem10-1" id="weightItem10-1" value="<?php echo $row[1]['...']; ?>"></td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem10-2" id="weightItem10-2" value="<?php echo $row[2]['...']; ?>"></td>
		</tr>
		<tr>
			<td align="left">創新度</td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem11-0" id="weightItem11-0" value="<?php echo $row[0]['...']; ?>"></td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem11-1" id="weightItem11-1" value="<?php echo $row[1]['...']; ?>"></td>
			<td align="left"><input type="number" style="border-radius: 10px;" placeholder="0" step="0.01" min="0" max="1" name="weightItem11-2" id="weightItem11-2" value="<?php echo $row[2]['...']; ?>"></td>
		</tr>
		

	<?php }else {echo "資料庫無資料。";} ?>
		<tr>
			<td colspan="4" align="center">
				<input type="button" id="btsubmit1" style="border-radius: 10px;" onclick="formSubmit()" value="存檔"></td>
		</tr>
	</form>		
	</table>
</div>
	
	
		<br>
		<br>
		<br>
	<?php require_once("all_footer.php"); ?>
</body>
</html>

<?php } ?>

