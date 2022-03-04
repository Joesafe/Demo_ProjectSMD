<?php
session_start();
if (isset($_SESSION['who'])) {unset($_SESSION['who']);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php require_once("all_head.php"); ?>
<body>

	<script type="text/javascript">
	window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '...',
	      cookie     : true,
	      xfbml      : true,
	     version    : 'v9.0'
	    });
	    FB.AppEvents.logPageView();    
	    };
	    (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "https://connect.facebook.net/en_US/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	    }(document, 'script', 'facebook-jssdk'));

	    FB.getLoginStatus(function(response) {
		    statusChangeCallback(response);
		});

		function login() {
		  FB.login(function (response) {
		    console.log(response);
		    if (response.status === "connected") {
		    	var cslog_id = "response.id";
				var cslog_name = "response.name";
				var cslog_email = "response.email";
		      FB.api('/me', {
		        'fields': 'id,name,email,picture'
		      }, function (response) {
		        /*console.log(response);*/
		        cslog_id = response.id;
		        cslog_name = response.name;
		        cslog_email = response.email;
		        /*console.log(cslog_id);
		        console.log(cslog_name);
		        console.log(cslog_email);*/
		        location.href="dbloginfb.php?id="+cslog_id+"&name="+cslog_name+"&email="+cslog_email;
		      });		

		    } 
		  }, {
		      //scope: 'email',
		      //auth_type: 'rerequest'
		    });
		 
		}
		
		function checkLoginState() {
		  FB.getLoginStatus(function (response) {
		    if(response.status === 'connected'){
		      console.log('你已經登入囉')
		    }else{
		      login()
		    }
		  });
		}
		checkLoginState()

	</script>
		<div id="header-wrapper">
			<div id="header" class="container">
				<div id="logo">
		        	<span class="icon icon-cog"></span>
					<h1>...</h1>
				</div>
				
		<?php require_once("all_banner.php"); ?>
		    	
		<div class="title">
			  <h2>...</h2>
			  <br>
			  <br>
			  <script type="text/javascript">
				function formSubmit()
				{
					var acc = document.getElementById("input_loginAccount").value;
					var pswd = document.getElementById("input_loginPassword").value;
					if (acc === "" || pswd === "")
					{
						alert("帳號及密碼不可為空白喔~");
					}
					else
					{
						if (pswd.length <= 20){
							document.getElementById("loginForm1").submit();
						}else {alert(" 密碼超過最大字元上限。 ");}
					}
				}
	</script>
	<table align="center" style="width: 60%;">
		<tr>
			<td colspan="6">
				<img src="login.png">
			</td>
		</tr>
		<tr>
			<th colspan="6">
				<center><font size="5">...</font></center>
			</th>
		</tr>
	
			<form action="dblogin.php" nam="loginForm" id="loginForm1" method="post">
				
				<tr><td colspan="6"><font size="4">帳號</font></td></tr>
				<tr><td colspan="6"><input type="text" style="border-radius: 10px;" name="inputAccount" id="input_loginAccount" placeholder="請注意大小寫" /><!--attr: size maxlength value readonly--></td></tr>
							
				<tr><td colspan="6"><font size="4">密碼</font></td></tr>
				<tr><td colspan="6"><input type="password" style="border-radius: 10px;" name="inputPassword" id="input_loginPassword" placeholder="請注意大小寫" /></td></tr>
						<!--<input type="submit" value="登入" onclick="altnull()">-->
			</tr>

		<tr><td colspan="3"><input type="button" name="button_regist" style="width: 180px;height: 50px;border-radius: 10px;background-color:#ffab04; border-color: #ffab04;" value="註冊" onclick="location.href='register.php'"></td>
			
		
		<td colspan="3"><input type="button" name="submit2" onclick="formSubmit()" style="width: 180px;height: 50px;border-radius: 10px;background-color:#009100; border-color: #009100;" value="登入"></td>

		<tr><td colspan="3"><input type="reset" style="width: 180px;height: 50px;border-radius: 10px;background-color:#5B5B5B; border-color:#5B5B5B;" value="重新填寫"></td>
		
		<!--<img src="back.png" onclick="showInputValue()">-->
		</form>
		<td colspan="3"><input type="button" name="button_findpswd" style="width: 180px;height: 50px;border-radius: 10px;background-color:#CE0000; border-color:#CE0000;" value="忘記密碼" onclick="location.href='findpswd.php'">

		<!--<div class="fb-login-button" data-size="medium" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false" data-width=""></div>-->

		</td></tr>
		
	</table>

	<br>


		<br>
		<br>
		<br>
<?php require_once("all_footer.php"); ?>
</body>
</html>
