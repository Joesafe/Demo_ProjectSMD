<?php
session_start();
$_SESSION['who'] = '';
$_SESSION['userName'] = '';
require_once("connect_mysql.php");
 //取得帳號密碼
$id = $_POST['inputAccount'];
$pw = $_POST['inputPassword'];

//選擇資料表user，條件是欄位id = 1的
$selectSql = "SELECT * FROM `userinfo` Where userAccount = '$id' AND userPassword = '$pw'";
//呼叫query方法(SQL語法)
$memberData = $connect->query($selectSql);

//有資料筆數大於0時才執行
if ($memberData->num_rows > 0) {

//讀取剛才取回的資料
    while ($row = $memberData->fetch_assoc()) {
        //print_r($row);
        //echo "登入成功"."<br>";
        if ($row['...'] == 0)//會員資料未審核
        {
            echo "<script> if(confirm( '您的帳號權限未開通，請洽管理員。 '))  location.href='index.php';else location.href='register.php'; </script>";
            echo '您的帳號權限未開通，請洽管理員。';
            //echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
        }
        else if($row['...'] == 1)//會員
        {
            $_SESSION['who'] = 'my';
            $_SESSION['account'] = $row['...'];
            $_SESSION['name'] = $row['...'];
            echo '<meta http-equiv=REFRESH CONTENT=1;url=mynewproject.php>';
        }
        else if($row['userStatus'] == 2)//管理者
        {
            $_SESSION['who'] = 'admin';
            $_SESSION['account'] = $row['...'];
            $_SESSION['name'] = $row['...'];
            echo '<meta http-equiv=REFRESH CONTENT=1;url=adminStatus.php>';
        }
    }
} else {
    echo "<script> if(confirm( '查無該組帳號密碼，請重新登入或註冊。'))  location.href='index.php';else location.href='register.php'; </script>";
    echo '查無該組帳號密碼，請重新登入。';
    //echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
?>