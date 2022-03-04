<?php
session_start();
require_once("connect_mysql.php");
//取得舊資料
$selectSql = "SELECT * FROM `...` WHERE `...` = 0 OR `...` = 1 ORDER BY `...`;";
$rst = $connect->query($selectSql);
if ($rst->num_rows > 0) {
	$array_status[]="";
	while ($row = $rst->fetch_assoc()) {
		$array_status[$row['...']]=$row['...'];
		$array_status[$row['...']."_email"]=$row['...'];
		$array_status[$row['...']."_name"]=$row['...'];
	}
}
//取得更新資料
//print_r($_GET['rdo']);
//echo "修改的id<-name：1為啟用0為停用<-value <br>";
$count = 0;
foreach($_GET['rdo'] as $key => $value) {
		//同時取出Name和Value
		//echo $key."<-name：".$value."<-value <br>";
		$mailContent = '';
		$Sql1 = "";
		//echo $key.",".$array_status[$key].",".$value.",".$array_status[$key."_email"].",".$array_status[$key."_name"]."<br>";
		if (((int)$array_status[$key]-(int)$value) == -1) {
			//echo ((int)$array_status[$key]-(int)$value)."變成啟用<br>";
			$Sql1 = "UPDATE `...` SET `...`='$value' WHERE `...`='$key';";
			$mailContent =" 智慧文件系統管理員已於".date("Y-m-d H:i:s")."啟用您使用的權限。<br>可從下列網址直接登入，建議以Chrome瀏覽器開啟。<br><br> https://project.kolmaker.com.tw/";
			$count = $count + 1;
		}
		if (((int)$array_status[$key]-(int)$value) == 1) {
			//echo ((int)$array_status[$key]-(int)$value)."變成停用<br>";
			$Sql1 = "UPDATE `...` SET `...`='$value' WHERE `...`='$key';";
			$mailContent =" 您的帳戶已於".date("Y-m-d H:i:s")."被智慧文件系統管理員停用，若有問題請洽智慧文件系統管理員。";
			$count = $count + 1;
		}
		if ($value == '3'){
			$Sql1 = "DELETE FROM `...` WHERE `...`='$key';";
			$mailContent =" 您的帳戶已於".date("Y-m-d H:i:s")."被智慧文件系統管理員刪除，若有問題請洽智慧文件系統管理員。";
			$count = $count + 1;
		}
		if ($Sql1 == "UPDATE `...` SET `...`='$value' WHERE `...`='$key';" || $Sql1 == "DELETE FROM `...` WHERE `...`='$key';") {
			$rstData = $connect->query($Sql1);
			//mail通知管理員
	        $userN = $array_status[$key."_name"];//Name
	        $userE = $array_status[$key."_email"];//Email
			
			if (!class_exists('PHPMailer')){
			  require("phpMailer/class.phpmailer.php");
			}
	        $mail = new PHPMailer();
	        $mail->IsSMTP();
	        $mail->SMTPAuth = true; // turn on SMTP authentication
	        $mail->CharSet ='UTF-8';//防止中文亂碼
	        
	        //發信的gmail
	        $mail->Username = "...";
	        $mail->Password = "...";
	        
	        //$mail->FromName = "=?utf-8?B?".base64_encode("testBot地天")."?=";// 寄件者名稱(你自己要顯示的名稱) utf-8版
	        $mail->FromName = "...";// 寄件者名稱(你自己要顯示的名稱)
	        $webmaster_email = "...@gmail.com";//回覆信件至此信箱

	        //$email="hotgm99@gmail.com";
	        $email = $userE;// 收件者信箱
	        $name = $userN;// 收件者的名稱
	        $mail->From = $webmaster_email;// 預設
	        $mail->AddAddress($email,$name);// 預設
	        $mail->AddReplyTo($webmaster_email);// 預設
	        $mail->WordWrap = 50;//每50字斷一次行
	        
	        // 信件標題
	        $mail->Subject = "...！(".date("Y-m-d H:i:s").")";
	        $mail->IsHTML(true); // send as HTML
	        $mail->Body = $userN." 先生/女士 您好：<br>".$mailContent;//信件內容(html版，就是可以有html標籤的如粗體、斜體之類)
	        //$mail->AltBody = "測試用信件內容1114，您的密碼是test v2";//信件內容(純文字版)
	        $mail->isSMTP();
	        $mail->Host = '...';
	        $mail->SMTPAuth = false;
	        $mail->SMTPAutoTLS = false; 
	        $mail->Port = 25;
	        //寄信確認
	        if(!$mail->Send()){
	            echo "<script> if(confirm(' 發信系統異常，請聯絡管理員。".$mail->ErrorInfo." '))  location.href='findpswd.php';else location.href='index.php'; </script>";
	            //echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
	            //echo "發信錯誤，請稍後再重新嘗試。".$mail->ErrorInfo;//如果有錯誤會印出原因
	        }
		}elseif ($Sql1 == "DELETE FROM `...` WHERE `...`='$key';") {
			$rstData = $connect->query($Sql1);
			//echo "<script> if(confirm(' 已修改使用者資料。 '))  location.href='adminStatus.php';else location.href='adminStatus.php' </script>";
		}
		//更新剩餘使用次數
		$cterleft_this = $_GET['cterleft'][$key];
		$cter_this = $_GET['cter'][$key];
		$dte_this = $_GET['dte'][$key];
		//echo $key.' : '.$cterleft_this.'/'.$cter_this.' | '.$dte_this.'<br>';
		$Sql2 = "UPDATE `...` SET `...`='$cterleft_this', `...`='$cter_this', `...`='$dte_this' WHERE `...`='$key';";
		#echo $Sql2.'<br>';
		$rstData2 = $connect->query($Sql2);

}
echo "<script> if(confirm(' 資料已更新，請回管理者介面查看。 '))  location.href='adminStatus.php';else location.href='adminStatus.php' </script>";
?>