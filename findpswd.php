<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php require_once("all_head.php"); ?>
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
        	<span class="icon icon-cog"></span>
			<h1><a href="#">智慧文件管理系統</a></h1>
		</div>
		
		<script type="text/javascript">
		function findpasswordfun() 
		{
			document.getElementById("findpswd1").submit();
		}	
	</script>
<?php require_once("all_banner.php"); ?>
    	
<div class="title">
	<table align="center">
        <form action="mailfindpswd.php" name="findpswd" id="findpswd1" method="post">
            <tr><td colspan="2"><center><b>輸入帳號或E-Mail，密碼將寄送到您的E-Mail。</b></center></td></tr>
            <tr>
                <td>帳號</td>
                <td><input required="required" type="text" id="txt_oldpassword1" name="txt_oldpassword" style="border-radius: 10px;" placeholder="限英文及數字" /></td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td><input type="text" id="txt_email1" name="txt_email" style="border-radius: 10px;"  placeholder="限英文及數字"></td>
            </tr>
            <tr align="center">
                <td colspan="3">
                    <input type="button" name="submit1" onclick="findpasswordfun()" style="display: inline-block;padding:0.8em 2em;background:#2056ac;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;font-color:#FFFFFF;" value="送出" />
                    <input type="button" name="bt_back" onclick="javascript:location.href='index.php'" value="回首頁" style="display: inline-block;padding:0.8em 2em;background:#2056ac;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;font-color:#FFFFFF;" />
                </td>
            </tr>
               
        </form>
    </table>
            <br>

            
	 
</div>
		<br>
		<br>
		<br>
<?php require_once("all_footer.php"); ?>
</body>
</html>
