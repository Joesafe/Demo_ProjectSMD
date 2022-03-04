<?php
session_start();
$_SESSION['who'] = '';
$_SESSION['fbId'] = '';
$_SESSION['fbName'] = '';

require_once("connect_mysql.php");
 //取得帳號密碼
$id = $_GET['id'];
$nm = $_GET['name'];

if (isset($id)) {$_SESSION['fbId'] = $id;}
if (isset($nm)) {$_SESSION['fbName'] = $nm;}


//選擇資料表user，條件是欄位id = 1的
$selectSql = "SELECT * FROM `userinfo` Where userAccount = '$id' ";
//呼叫query方法(SQL語法)
$memberData = $connect->query($selectSql);

//有資料筆數大於0時才執行
if ($memberData->num_rows > 0) {

//讀取剛才取回的資料
    while ($row = $memberData->fetch_assoc()) {
        //print_r($row);
        //echo "登入成功"."<br>";
        if ($row['userStatus'] == 0)//會員資料未審核
        {
            //echo '您的帳號權限未開通，請洽管理員。';
            //sleep(6);
            echo "<script> if(confirm(' 您的帳號權限未開通，請洽管理員。 '))  location.href='index.php';else location.href='index.php' </script>";
        }
        else if($row['userStatus'] == 1)//會員
        {
            $_SESSION['who'] = 'my';
            $_SESSION['account'] = $id;
            $_SESSION['name'] = $nm;
            echo '<meta http-equiv=REFRESH CONTENT=1;url=mynewproject.php>';
        }
        else
        {
            echo "<script> if(confirm(' 帳號不存在，請洽管理員。 '))  location.href='index.php';else location.href='index.php' </script>";
        }
    }
}else {
    // echo 'FB第一次登入。請填寫email';
    echo "<meta http-equiv=REFRESH CONTENT=1;url=loginfbmail.php>";
}
?>