<?php 

date_default_timezone_set("Asia/Taipei");
require_once("connect_mysql.php");
$userA = $_POST['txt_oldpassword'];
$userE = $_POST['txt_email'];
$selectSql = '';
//$selectSql = "SELECT * FROM `userinfo` Where userAccount = '$userA' AND userEmail = '$userE' ;";
if($userA != ''){$selectSql = "SELECT * FROM `...` WHERE `...` = '$userA';"; echo $selectSql.'<br>';}
elseif($userE != ''){$selectSql = "SELECT * FROM `...` WHERE `...` = '$userE';";  echo $selectSql.'<br>';}
elseif($userA != '' && $userE != ''){echo "<script> if(confirm(' 帳號或信箱有誤，至少輸入一項。 ')) location.href='findpswd.php';else location.href='index.php'; </script>";}

$memberData = $connect->query($selectSql);
//有資料筆數大於0時才執行
if ($memberData->num_rows > 0) {
	//讀取剛才取回的資料
    while ($row = $memberData->fetch_assoc()) {
		$userN = $row['...'];
		$userAcct = $row['...'];
		$userPswd = $row['...'];
		$userE = $row['...'];
		require("phpMailer/class.phpmailer.php");
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->CharSet ='UTF-8';//防止中文亂碼
		
		//發信的gmail
		$mail->Username = "...";
		$mail->Password = "...";
		
		//$mail->FromName = "=?utf-8?B?".base64_encode("testBot地天")."?=";// 寄件者名稱(你自己要顯示的名稱) utf-8版
		$mail->FromName = "...系統客服信箱";// 寄件者名稱(你自己要顯示的名稱)
		$webmaster_email = "...";//回覆信件至此信箱
		
		
		//$email="hotgm99@gmail.com";
		$email = $userE;// 收件者信箱
		$name = $userN;// 收件者的名稱
		$mail->From = $webmaster_email;// 預設
		$mail->AddAddress($email,$name);// 預設
		$mail->AddReplyTo($webmaster_email);// 預設
		$mail->WordWrap = 50;//每50字斷一次行
		
		// 信件標題
		$mail->Subject = "...，密碼補發(".date("Y-m-d H:i:s").")";
		$mail->IsHTML(true); // send as HTML
		$mail->Body = $userN." 先生/小姐 您好：<br> 由於您使用忘記密碼功能，故將密碼補發至您的信箱。<br>帳號：".$userAcct."<br>密碼：".$userPswd;//信件內容(html版，就是可以有html標籤的如粗體、斜體之類)
		//$mail->AltBody = "測試用信件內容1114，您的密碼是test v2";//信件內容(純文字版)
		$mail->isSMTP();
		$mail->Host = '...';
		$mail->SMTPAuth = false;
		$mail->SMTPAutoTLS = false; 
		$mail->Port = 25; 

		if(!$mail->Send()){
			echo "<script> if(confirm(' 發信系統異常，請聯絡管理員。".$mail->ErrorInfo." '))  location.href='findpswd.php';else location.href='index.php'; </script>";
			//echo "發信錯誤，請稍後再重新嘗試。".$mail->ErrorInfo;//如果有錯誤會印出原因
		}
		else{
			echo "<script> if(confirm(' 密碼已發送至您(帳號)的信箱。 '))  location.href='index.php';else location.href='findpswd.php'; </script>";
		}

    }
} else {
	echo "<script> if(confirm(' 帳號或信箱有誤，請重新輸入。 ')) location.href='findpswd.php';else location.href='index.php'; </script>";
}













