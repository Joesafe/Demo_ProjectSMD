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
				<li><a href="adminStatus.php" accesskey="1" title="adminStatus">會員管理</a></li>
				<li class="active"><a href="adminselect.php" accesskey="2" title="adminselect">計畫查詢</a></li>
                <li><a href="adminprediction.php" accesskey="3" title="adminprediction">預測紀錄查詢</a></li>
				<li><a href="adminChangeWeight.php" accesskey="4" title="adminChangeWeight">計畫預測權重設定</a></li>
				<li><a href="index.php" accesskey="5" title="index">登出</a></li>
			</ul>
		</div>
		
<?php require_once("all_banner.php"); ?>

	<script type="text/javascript">
        function checkAndSubmit()
    {
        var startdate = document.getElementById("startquary1");
        var enddate = document.getElementById("endquary1");
        if (startdate == " " || enddate == " ")
            {
                alert("欄位不可為空白喔~");
            }
            else
            {
                document.getElementById("form_adminsearch").submit();
            }
    }
    </script>
    	
<div class="title">
	  
	            <table align=center style="width: 70%;">
	            
            <form action="adminsearch.php" name="form_adminsearch" id="form_adminsearch" method="get">
            	<tr><td colspan="4" align="right"><?php echo "哈囉~".$_SESSION['name']." 先生/小姐"; ?></td></tr>
                <tr><td colspan="4"><b>請輸入查詢資料</b></td></tr>
                <tr>
                <td align="left">查詢日期範圍
                <td><input type="date" style="border-radius: 10px;" name="startquary" id="startquary1" value="<?php echo date("Y-m-d");?>"></td>
                <td> ~ </td>
                <td><input type="date" style="border-radius: 10px;" name="endquary" id="endquary1" value="<?php echo date("Y-m-d");?>"></td>
                </tr>
                <tr>
                <td align="left">計畫總金額範圍(千元)</td>
                <td><input type="text" style="border-radius: 10px;" name="int_totalbudge_min" id="int_totalbudge_min1" oninput="value=value.replace(/[^\d]/g,'')"  maxlength="9" /></td>
                <td> ~ </td>
                <td><input type="text" style="border-radius: 10px;" name="int_totalbudge_max" id="int_totalbudge_max1" oninput="value=value.replace(/[^\d]/g,'')"  maxlength="9" /></td>
                </tr>
                <tr>
                <td align="left">成功核准率範圍(%)</td>
                <td><input type="text" style="border-radius: 10px;" name="projectPass_min" id="projectPass_min1" oninput="value=value.replace(/[^\d]/g,'')"  maxlength="9" max="100" min="0" //></td>
                <td> ~ </td>
                <td><input type="text" style="border-radius: 10px;" name="projectPass_max" id="projectPass_max1" oninput="value=value.replace(/[^\d]/g,'')"  maxlength="9" max="100" min="0" /></td>
                </tr>
                <tr>
                <td  align="left">預測模式</td>
                <td align="left" colspan="3"><input type="radio" id="opt1" style="border-radius: 10px;" name="rdo_premodel" value="" checked />不拘
                <input type="radio" id="opt2" style="border-radius: 10px;" name="rdo_premodel" value="SBIR" />SBIR
                <input type="radio" id="opt3" style="border-radius: 10px;" name="rdo_premodel" value="CITD" />CITD
                <input type="radio" id="opt4" style="border-radius: 10px;" name="rdo_premodel" value="SIIR" />SIIR
            	</td>
                </tr>  
                <tr>
                <td align="left">是否為青年創業</td>
                <td align="left" colspan="3"><input type="radio" id="opt_y1" style="border-radius: 10px;" name="rdo_youentrep" value="" checked />不拘
                <input type="radio" id="opt_y2" style="border-radius: 10px;" name="rdo_youentrep" value="1" />是
                <input type="radio" id="opt_y3" style="border-radius: 10px;" name="rdo_youentrep" value="0" />否</td>
                </tr>           
                <tr>
                <td colspan="4" align="center">
                <input type="button" name="query" name="query1" style="border-radius: 10px" value="查詢" onclick="checkAndSubmit()">
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