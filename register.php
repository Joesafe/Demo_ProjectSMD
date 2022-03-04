<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>...</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700|Questrial" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
        	<span class="icon icon-cog"></span>
			<h1><a href="#">...</a></h1>
		</div>
		
		<script type="text/javascript">
        var test_num = new RegExp("[0-9]+");
        var test_eng = new RegExp("[A-Za-z]+");
        function applyClean() 
        {
            document.getElementById("register1").reset();
            document.getElementById("select_c").value = '';
            document.getElementById("select_d").value = '';
        }
		function applyAccount() 
		{
			var i1 = document.getElementById("txt_oldpassword1").value;
			var i2 = document.getElementById("txt_password1").value;
			var i3 = document.getElementById("txt_name1").value;
			var i4 = document.getElementById("txt_phone1").value;
			var i5 = document.getElementById("txt_email1").value;
            var i6 = document.getElementById("select_c").value;
            var i7 = document.getElementById("select_d").value;
            var i8 = document.getElementById("txt_address1").value;
            
			if (i1=="" || i2=="" || i3=="" || i4=="" || i5=="" || i6=="" || i7=="" || i8=="") {
				alert(" *為必填欄位，請填寫完整。 ");
			}else {
                if (test_num.test(i2) && test_eng.test(i2) && test_num.test(i1) && test_eng.test(i1) && i2.length >= 4 && i1.length >= 4) {
                    if (i4.length == 10) {
                        if (i5.search("@") != -1) {
                            if (i1 != i2) {
                                document.getElementById("register1").submit();
                            }else {alert(" 帳號密碼不可一樣。 ");} 
                        }else {alert(" E-mail格式錯誤。 ");} 
                    }else {alert(" 連絡手機必須10碼。 ");}
                }else {alert(" 帳號、密碼請輸入包含英文與數字的4~20個字元。 ");}
            }
		}	
	</script>
		
<?php require_once("all_banner.php"); ?>
    	
<div class="title">

	<table align="center">
        <form action="dbregister.php" name="register" id="register1" method="post">
            <tr><td colspan="3"><center><b>...</b></center></td></tr>
            <tr>
                <td>帳號*</td>
                <td colspan="2"><input required="required" type="text" id="txt_oldpassword1" name="txt_oldpassword" style="border-radius: 10px;" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')" maxlength="20" pattern="[a-zA-Z0-9]{4}" placeholder="請輸入包含英文與數字的4~20個字元" /></td>
            </tr>
            <tr>
                <td>密碼*</td>
                <td colspan="2"><input required="required" type="password" id="txt_password1" name="txt_password" style="border-radius: 10px;" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')" maxlength="20" pattern="[a-zA-Z0-9]{4}" placeholder="請輸入包含英文與數字的4~20個字元"  />
                </td>
            </tr>
            <tr>
                <td>...</td>
                <td colspan="2"><input type="text" id="txt_company1" name="txt_company" style="border-radius: 10px;" placeholder="任職單位"></td>
            </tr>
            <tr>
                <td>...</td>
                <td colspan="2">
                    <input type="text" id="txt_title1" name="txt_title" style="border-radius: 10px;" placeholder="單位職稱">
                </td>
            </tr>
            <tr>
                <td>姓名*</td>
                <td colspan="2"><input type="text" id="txt_name1" name="txt_name" style="border-radius: 10px;"  placeholder="請填中文姓名">
                </td>
            </tr>
            <tr>
                <td>電話*</td>
                <td colspan="2"><input type="text" inputmode="Contact number" minlength="10" maxlength="10" id="txt_phone1" name="txt_phone" style="border-radius: 10px;" oninput="value=value.replace(/[^\d]/g,'')" pattern="[0-9]{10}" placeholder="請填手機（限數字）" ></td>
            </tr>
            <tr>
                <td rowspan="2">地址*</td>
                <div id="twzipcode">
                <td>                    
                    <select class="select" name="county" id="select_c" aria-describedby="form-county" required=""></select>               
                </td>
                <td>
                    <select class="select" name="district" id="select_d" aria-describedby="form-district" zipcode-align="left" required=""></select>
                </td>
            	</div>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="text" id="txt_address1" name="txt_address" style="border-radius: 10px;" placeholder="請填正確地址">
                    <script src="jsAddress/er.twzipcode.data.js"></script>
                    <script src="jsAddress/er.twzipcode.min.js"></script>
                    <script>
                        erTWZipcode();
                </script>
                </td>
            </tr>
            <tr>
                <td>E-mail*</td>
                <td colspan="2"><input type="text" id="txt_email1" name="txt_email" style="border-radius: 10px;"  placeholder="電子信箱"></td>
            </tr>
            <tr><td colspan="3"> <p><a href="....php" target="_blank" >服務使用條款</a></p> </td></tr>
            <tr align="center">
                <td colspan="3">
                    <input type="button" name="submit1" onclick="applyAccount()" style="display: inline-block;padding:0.8em 2em;background:#2056ac;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;font-color:#FFFFFF;" value="同意使用條款並申請" />
                    <input type="button" name="reset1" onclick="applyClean()" style="display: inline-block;padding:0.8em 2em;background:#2056ac;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;font-color:#FFFFFF;" value="重設" />
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
