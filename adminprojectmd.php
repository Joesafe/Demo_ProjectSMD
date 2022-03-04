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
			<h1><a href="#">智慧文件管理系統</a></h1>
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
    	
<div class="title">
	  
	 
	<table align="center">
	<?php
      $querytime = $_GET['userQuary'];
      $account = $_GET['userAccount'];
      $function = $_GET['function'];
      $premodel = $_GET['premodel'];
      require_once("connect_mysql.php");
      if ($function == 'delete') {
        //`recordStatus`='0'資料庫為刪除狀態
        $selectSql="UPDATE `...` SET `...`='0' WHERE `...`='$account' AND `...`='$...' AND `rdo_premodel`='$premodel' ;";
        echo $selectSql;
        $rstData = $connect->query($selectSql);
        echo $rstData;
        if ($rstData == "1")
        {
            //echo $rstData;
            echo "<script> if(confirm(' 刪除完成。 '))  location.href='adminselect.php';else location.href='adminselect.php'; </script>";
        }
        else { 
            //echo $rstData;
            echo "<script> if(confirm(' 修改失敗。 '))  location.href='adminselect.php';else location.href='adminselect.php'; </script>";
          }
        } 

      $selectSql1 = "SELECT * FROM `...` WHERE `...`='$account' AND `...`='$querytime'; ";
      //echo $selectSql1;
      $rst1 = $connect->query($selectSql1);
      if ($function == 'edit') {
        $unfill = 0;
        if ($rst1->num_rows > 0) { 
        $row = $rst1->fetch_all(MYSQLI_BOTH)
      ?>
      <table align="center">
        <tr><td colspan="2" align="right"><?php echo "哈囉~".$_SESSION['name']." 先生/小姐"; ?></td></tr>
        <tr><td align="center" colspan="2"><b>【<?php echo $row[0]['...']; ?>】修改資料</b></td></tr>
        <tr><td colspan="2" align="center"><font color="#EA0000">按鈕顏色：紅色（未填寫完成）；綠色（已填寫完成）；灰色（非必填選項）</font></td></tr>

        <tr>
          <td align="left">項目</td>
          <td align="center">狀態</td>
        </tr>
        <tr>
          <td align="left">...</td>
          <td align="center"><button style="display: inline-block;padding:0.8em 2em;background:#00BB00;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;" onclick="location.href='adminquary0.php?userAccount=<?php echo $account ?>&userQuary=<?php echo $querytime ?>&premodel=<?php echo $premodel ?>&status=0'"><font color="#FFFFFF">編輯/修改</font></td></td>
        </tr>
        
          <tr>
            <td align="left">...</td>
            <?php if ($row[0]['...']!=NULL && $row[0]['...']!=NULL && $row[0]['...'] !=NULL) { ?><td  align="center"><button style="display: inline-block;padding:0.8em 2em;background: #00BB00;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;"onclick="location.href='adminquary1.php?userAccount=<?php echo $account ?>&userQuary=<?php echo $querytime ?>&premodel=<?php echo $premodel ?>&status=1'"><font color="#FFFFFF">已完成</font></td> <?php }else{ $unfill += 1; ?> <td align="center"><button style="display: inline-block;padding:0.8em 2em;background:#FF0000;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;"onclick="location.href='adminquary1.php?userAccount=<?php echo $account ?>&userQuary=<?php echo $querytime ?>&premodel=<?php echo $premodel ?>&status=1'"><font color="#FFFFFF">未完成</font></td><?php } ?>
          </tr>
          <tr>
            <td align="left">...</td>
            <?php if ($row[0]['...']!=NULL && $row[0]['...']!=NULL && $row[0]['...'] !=NULL && $row[0]['...'] !=NULL) { ?><td align="center"><button style="display: inline-block;padding:0.8em 2em;background: #00BB00;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;"onclick="location.href='adminquary2.php?userAccount=<?php echo $account ?>&userQuary=<?php echo $querytime ?>&premodel=<?php echo $premodel ?>&status=1'"><font color="#FFFFFF">已完成</font></td> <?php }else{ $unfill += 1; ?> <td align="center"><button style="display: inline-block;padding:0.8em 2em;background:#FF0000;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;"onclick="location.href='adminquary2.php?userAccount=<?php echo $account ?>&userQuary=<?php echo $querytime ?>&premodel=<?php echo $premodel ?>&status=1'"><font color="#FFFFFF">未完成</font></td><?php } ?>
          </tr>
          <tr>
            <td align="left">...</td>
            <?php if ($row[0]['...']!=NULL && $row[0]['...']!=NULL) { ?><td align="center"><button style="display: inline-block;padding:0.8em 2em;background:#00BB00;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;"onclick="location.href='adminquary3.php?userAccount=<?php echo $account ?>&userQuary=<?php echo $querytime ?>&premodel=<?php echo $premodel ?>&status=1'"><font color="#FFFFFF">已完成</font></td> <?php }else{ ?> <td align="center"><button style="display: inline-block;padding:0.8em 2em;background:#D0D0D0;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;"onclick="location.href='adminquary3.php?userAccount=<?php echo $account ?>&userQuary=<?php echo $querytime ?>&premodel=<?php echo $premodel ?>&status=1'"><font color="#000000">未完成</font></td><?php } ?>
          </tr>
          <tr>
            <td align="left">...</td>
            <?php if ($row[0]['...']!=NULL && $row[0]['...']!=NULL && $row[0]['...']!=NULL && $row[0]['flo_netprofit']!=NULL && $row[0]['txt_busitem']!=NULL) { ?><td align="center"><button style="display: inline-block;padding:0.8em 2em;background:  #00BB00;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;"onclick="location.href='adminquary4.php?userAccount=<?php echo $account ?>&userQuary=<?php echo $querytime ?>&premodel=<?php echo $premodel ?>&status=1'"><font color="#FFFFFF">已完成</font></td> <?php }else{ if($row[0]['rdo_premodel'] == 'SIIR'){ echo "<td><button style=\"display: inline-block;padding:0.8em 2em;background:#D0D0D0;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;\" onclick=\"location.href='adminquary4.php?userAccount=".$account."&userQuary=".$querytime."&premodel=".$premodel."&status=1'\"><font color='#000000'>未完成</font></td>"; }else { $unfill += 1; echo "<td align='center'><button style=\"display: inline-block;padding:0.8em 2em;background:#FF0000;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;\" onclick=\"location.href='adminquary4.php?userAccount=".$account."&userQuary=".$querytime."&premodel=".$premodel."&status=1'\"><font color='#FFFFFF'>未完成</font></td>";} } ?>
          </tr>
          <tr>
          <td align="left">...</td>
            <?php if ($row[0]['...']!=NULL && $row[0]['...']!=NULL && $row[0]['...'] !=NULL && $row[0]['int_newpatent'] !=NULL && $row[0]['int_pronumber'] !=NULL && $row[0]['int_invcapital'] !=NULL && $row[0]['int_newcompany'] !=NULL && $row[0]['int_extproduct'] !=NULL && $row[0]['int_dowcost'] !=NULL && $row[0]['int_patproduct'] !=NULL) { ?><td align="center"><button style="display: inline-block;padding:0.8em 2em;background:#00BB00;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;"onclick="location.href='adminquary5.php?userAccount=<?php echo $account ?>&userQuary=<?php echo $querytime ?>&premodel=<?php echo $premodel ?>&status=1'"><font color="#FFFFFF">已完成</font></td> <?php }else{ $unfill += 1; ?> <td align="center"><button style="display: inline-block;padding:0.8em 2em;background:#FF0000;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;"onclick="location.href='adminquary5.php?userAccount=<?php echo $account ?>&userQuary=<?php echo $querytime ?>&premodel=<?php echo $premodel ?>&status=1'"><font color="#FFFFFF">未完成</font></td><?php } ?>
          </tr>
          <td align="left">...</td>
            <?php if ($row[0]['...']!=NULL && $row[0]['...']!=NULL && $row[0]['...'] !=NULL && $row[0]['...'] !=NULL && $row[0]['...'] !=NULL && $row[0]['...']!=NULL) { ?><td align="center"><button style="display: inline-block;padding:0.8em 2em;background:  #00BB00;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;"onclick="location.href='adminquary6.php?userAccount=<?php echo $account ?>&userQuary=<?php echo $querytime ?>&premodel=<?php echo $premodel ?>&status=1'"><font color="#FFFFFF">已完成</font></td> <?php }else{ if($row[0]['rdo_premodel'] == 'SIIR'){ echo "<td align='center'><button style=\"display: inline-block;padding:0.8em 2em;background:#D0D0D0;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;\"onclick=\"location.href='adminquary6.php?userAccount=".$account."&userQuary=".$querytime."&premodel=".$premodel."&status=1'\"><font color='#000000'>未完成</font></td>"; }else { $unfill += 1; echo "<td align='center'><button style=\"display: inline-block;padding:0.8em 2em;background:#FF0000;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;\"onclick=\"location.href='adminquary6.php?userAccount=".$account."&userQuary=".$querytime."&premodel=".$premodel."&status=1'\"><font color='#FFFFFF'>未完成</font></td>";} } ?>
          </tr>
          <td align="left">...</td>
            <?php if ($row[0]['...']!=NULL && $row[0]['...']!=NULL && $row[0]['...'] !=NULL && $row[0]['...'] !=NULL && $row[0]['...'] !=NULL && $row[0]['...']!=NULL) { ?><td align="center"><button style="display: inline-block;padding:0.8em 2em;background:#00BB00;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;"onclick="location.href='adminquary7.php?userAccount=<?php echo $account ?>&userQuary=<?php echo $querytime ?>&premodel=<?php echo $premodel ?>&status=1'"><font color="#FFFFFF">已完成</font></td> <?php }else{ $unfill += 1; ?> <td align="center"><button style="display: inline-block;padding:0.8em 2em;background:#FF0000;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;"onclick="location.href='adminquary7.php?userAccount=<?php echo $account ?>&userQuary=<?php echo $querytime ?>&premodel=<?php echo $premodel ?>&status=1'"><font color="#FFFFFF">未完成</font></td><?php } ?>
          </tr>
          <td align="left">...</td>
            <?php if ($row[0]['...']!=NULL && $row[0]['...']!=NULL && $row[0]['...'] !=NULL && $row[0]['...'] !=NULL && $row[0]['...'] !=NULL && $row[0]['...']!=NULL && $row[0]['...']!=NULL && $row[0]['...']!=NULL) { ?><td align="center"><button style="display: inline-block;padding:0.8em 2em;background:#00BB00;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;"onclick="location.href='adminquary8.php?userAccount=<?php echo $account ?>&userQuary=<?php echo $querytime ?>&premodel=<?php echo $premodel ?>&status=1'"><font color="#FFFFFF">已完成</font></td> <?php }else{ $unfill += 1; ?> <td align="center"><button style="display: inline-block;padding:0.8em 2em;background:#FF0000;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;"onclick="location.href='adminquary8.php?userAccount=<?php echo $account ?>&userQuary=<?php echo $querytime ?>&premodel=<?php echo $premodel ?>&status=1'"><font color="#FFFFFF">未完成</font></td><?php } ?>
          </tr>
          <td align="left">...</td>
            <?php if ($row[0]['...']!=NULL) { ?><td align="center"><button style="display: inline-block;padding:0.8em 2em;background:#00BB00;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;"onclick="location.href='adminquary9.php?userAccount=<?php echo $account ?>&userQuary=<?php echo $querytime ?>&premodel=<?php echo $premodel ?>&status=1'"><font color="#FFFFFF">已完成</font></td> <?php }else{ $unfill += 1; ?> <td align="center"><button style="display: inline-block;padding:0.8em 2em;background:#FF0000;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;"onclick="location.href='adminquary9.php?userAccount=<?php echo $account ?>&userQuary=<?php echo $querytime ?>&premodel=<?php echo $premodel ?>&status=1'"><font color="#FFFFFF">未完成</font></td><?php } ?>
          </tr>
          <td align="left">...</td>
            <?php if ($row[0]['...']!=NULL && $row[0]['...']!=NULL && $row[0]['...'] !=NULL && $row[0]['...'] !=NULL && $row[0]['...'] !=NULL && $row[0]['...']!=NULL && $row[0]['...']!=NULL && $row[0]['...']!=NULL && $row[0]['...']!=NULL && $row[0]['...']!=NULL) { ?><td align="center"><button style="display: inline-block;padding:0.8em 2em;background:    #00BB00;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;" onclick="location.href='adminquary10.php?userAccount=<?php echo $account ?>&userQuary=<?php echo $querytime ?>&premodel=<?php echo $premodel ?>&status=1'"><font color="#FFFFFF">已完成</font></td> <?php }else{ $unfill += 1; ?> <td align="center"><button style="display: inline-block;padding:0.8em 2em;background:#FF0000;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;"onclick="location.href='adminquary10.php?userAccount=<?php echo $account ?>&userQuary=<?php echo $querytime ?>&premodel=<?php echo $premodel ?>&status=1'"><font color="#FFFFFF">未完成</font></td><?php } ?>
          </tr>
          <td align="left">...</td>
            <?php if ($row[0]['...']!=NULL && $row[0]['...']!=NULL && $row[0]['...'] !=NULL && $row[0]['...'] !=NULL && $row[0]['...'] !=NULL) { ?><td align="center"><button style="display: inline-block;padding:0.8em 2em;background:#00BB00;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;"onclick="location.href='adminquary11.php?userAccount=<?php echo $account ?>&userQuary=<?php echo $querytime ?>&premodel=<?php echo $premodel ?>&status=1'"><font color="#FFFFFF">已完成</font></td> <?php }else{ $unfill += 1; ?> <td align="center"><button style="display: inline-block;padding:0.8em 2em;background:#FF0000;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;"onclick="location.href='adminquary11.php?userAccount=<?php echo $account ?>&userQuary=<?php echo $querytime ?>&premodel=<?php echo $premodel ?>&status=1'"><font color="#FFFFFF">未完成</font></td><?php } ?>
          </tr>
          </tr>
          <td align="left">...</td>
            <?php if ($unfill==0){ echo "<td align='center'><button style=\"display: inline-block;padding:0.8em 2em;background:#00BB00;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;\"onclick=\"location.href='mycalculater.php?userAccount=".$account."&userQuary=".$querytime."&premodel=".$premodel."&status=1'\"><font color='#FFFFFF'>計算</font></td>"; }else{ echo "<td align='center'><button style=\"display: inline-block;padding:0.8em 2em;background:#FF0000;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;\"onclick='location.href='#'\" ><font color='#FFFFFF'>未填寫完成</font></td>"; } ?>
          </tr>
          <tr>
            <td colspan="2" align=center>
                <input type="button" name="bt_back" onclick="javascript:location.href='adminselect.php'" value="回計畫查詢" style="display: inline-block;padding:0.8em 2em;background:#2056ac;line-height: 1.8em;letter-spacing: 1px;text-decoration: none;font-size: 1em;margin: 1em 0;border: none;cursor: pointer;border-radius: 10px;font-color:#FFFFFF;" />

            </td>
          </tr>

      </table>
	<?php }else{echo "資料不存在於資料庫。";} }?>
        
</div>
    <br>
    <br>
    <br>
<?php require_once("all_footer.php"); ?>
</body>
</html>
<?php } ?>