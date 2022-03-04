<?php
session_start();
ob_start();

date_default_timezone_set("Asia/Taipei");
$nowtimespt = date("Y-m-d H:i:s");
$username=$_SESSION['name'];
$cf = "";
$account = "";
$userquary = "";
$txt_sno = "";
$s01 = "";
$s02 = "";
$s03 = "";
$s04 = "";
$s05 = "";
$s06 = "";
$s07 = "";
$s08 = "";
$s09 = "";
$s10 = "";
$s11 = "";
$s12 = "";

//$account = $_GET['userAccount'];
//$ucontent = $_GET['userContent'];
if (isset($_GET['...'])) {$cf = $_GET['...'];}
if (isset($_GET['...'])) {$account = $_GET['...'];}



if ($cf=='mypredictioncalculater') {
	if (isset($_GET['...'])) {$userquary = $_GET['...'];}
	if (isset($_GET['...'])) {$sno = $_GET['...'];}
	if (isset($_GET['...'])) {$projectname = $_GET['...'];}
	if (isset($_GET['...'])) {$predictdate = $_GET['...'];}
	if (isset($_GET['...'])) {$predictmodel = $_GET['...'];}
    
	if (isset($_GET['...'])) {$s01 = $_GET['...'];}
	if (isset($_GET['...'])) {$s02 = $_GET['...'];}
	if (isset($_GET['...'])) {$s03 = $_GET['...'];}
	if (isset($_GET['...'])) {$s04 = $_GET['...'];}
	if (isset($_GET['...'])) {$s05 = $_GET['...'];}
	if (isset($_GET['...'])) {$s06 = $_GET['...'];}
	if (isset($_GET['...'])) {$s07 = $_GET['...'];}
	if (isset($_GET['...'])) {$s08 = $_GET['...'];}
	if (isset($_GET['...'])) {$s09 = $_GET['...'];}
	if (isset($_GET['...'])) {$s10 = $_GET['...'];}
	if (isset($_GET['...'])) {$s11 = $_GET['...'];}
	if (isset($_GET['...'])) {$s12 = $_GET['...'];}
    //流水號生成
    $str_sec = explode("-", $predictdate);
    $str_YYY = (string)((int)$str_sec[0]-1911);
    $str_MM = (string)$str_sec[1];
    $txt_sno = 'P-'.$str_YYY.'-'.$str_MM.'-'.$sno;
	$html = '
	列印日期:'.$nowtimespt.'<br>
	流水編號:'.$txt_sno.'<br>
	計畫名稱:'.$projectname.'<br>
	預測日期:'.$predictdate.'<br>
	預測模式:'.$predictmodel.'<br>
	預測者:'.$username.'</font><br>

		<table align="center" border="1">
			<tr><td align="center" colspan="2">...</td></tr>
			<tr>
				<td>
					項目
				</td>
				<td>
					分數
				</td>
			</tr>
			<tr>
				<td>
					1....
				</td>
				<td>
					'.$s01.'
				</td>
			</tr>
			<tr>
				<td>
					2....
				</td>
				<td>
					'.$s02.'
				</td>
			</tr>
			<tr>
				<td>
					3....
				</td>
				<td>
					'.$s03.'
				</td>
			</tr>
			<tr>
				<td>
					4....
				</td>
				<td>
					'.$s04.'
				</td>
			</tr>
			<tr>
				<td>
					5.....
				</td>
				<td>
					'.$s05.'
				</td>
			</tr>
			<tr>
				<td>
					6....
				</td>
				<td>
					'.$s06.'
				</td>
			</tr>
			<tr>
				<td>
					7....
				</td>
				<td>
					'.$s07.'
				</td>
			</tr>
			<tr>
				<td>
					8....
				</td>
				<td>
					'.$s08.'
				</td>
			</tr>
			<tr>
				<td>
					9....
				</td>
				<td>
					'.$s09.'
				</td>
			</tr>
			<tr>
				<td>
					10....
				</td>
				<td>
					'.$s10.'
				</td>
			</tr>
			<tr>
				<td>
					11....
				</td>
				<td>
					'.$s11.'
				</td>
			</tr>
			<tr>
				<td>
					12....(%)
				</td>
				<td>
					'.$s12.'
				</td>
			</tr>
		</table>';

}
if ($cf=='mysearchdetail' || $cf=='mypredictiondetail' || $cf=='adminpredictiondetail') {
	if (isset($_GET['...'])) {$userquary = $_GET['...'];}
    if ($cf=='mypredictiondetail' || $cf=='adminpredictiondetail') {
        if (isset($_GET['...'])) {$seqno = $_GET['...'];}
        $selectSql = "SELECT * FROM `...` WHERE `...` = '$userquary' AND `...` = '$seqno' AND `...` = '$account' ;";
    }elseif ($cf=='mysearchdetail') {
        $selectSql = "SELECT * FROM `...` WHERE `...` = '$userquary' AND `...` = '$account';";
    }

	require_once("connect_mysql.php");
	$rst = $connect->query($selectSql);

	if ($rst->num_rows > 0) { 
    	$row = $rst->fetch_all(MYSQLI_BOTH);
    	$rdo_youentrep_string = "...";
		$rdo_newcompay_string = "...";
		$rdo_gvm_string = "...";
		$rdo_lab_string = "...";
		if ($row[0]['...'] == "1"){$rdo_youentrep_string = "...";}
		if ($row[0]['...'] == "1"){$rdo_newcompay_string = "...";}
		if ($row[0]['...'] == "1"){$rdo_gvm_string = "...";}
		if ($row[0]['...'] == "1"){$rdo_lab_string = "...";}

		$html = '
        <font size="7">列印日期:'.$nowtimespt.'</font>
        <font size="7"><br></font>
        <font size="7">...:'.$row[0]["rdo_premodel"].'</font>
        <font size="7"><br></font>
        <font size="7">...:'.$username.'</font>
        <font size="7"><br></font>
        <font size="7"><br></font>

		<table style="text-align:center;" border="1">
        
        <tr>
        	<td colspan="3" text-align="center"><b>【'.$row[0]["..."].'】詳細資料</b>
        	</td>
        </tr>
        <tr>
            <th rowspan="3" style="text-align:center; width:15%; ">
                ...
            </th>
            <td align="left" style="width:68%;">
                ...(千元新台幣)
            </td>
            <td align="left" style="width:17%;">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(千元新台幣)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(千元新台幣)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>

        <tr>
            <th rowspan="4">
                ...
            </th>
            <td align="left">
                ...
            </td>
            <td align="left">
            	'.$rdo_youentrep_string.'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...
            </td>
            <td align="left">
            	'.$rdo_newcompay_string.'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...
            </td>
            <td align="left">
            	'.$rdo_gvm_string.'
            </td>
        </tr>
        <tr>
            <td align="left">
                .../...
            </td>
            <td align="left">
            	'.$rdo_lab_string.'
            </td>
        </tr>
        <tr>
            <th rowspan="2">
                ...
            </th>
            <td align="left">
                ...(100字內)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(100字內)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <th rowspan="5">
                ...
            </th>
            <td align="left">
                ...
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(%)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(100字內)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <th rowspan="10">
                ...
            </th>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <th rowspan="6">
                營運狀況
            </th>
            <td align="left">
                ...(第一年)(千元)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(第二年)(千元)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(第三年)(千元)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(第一年)(千元)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(第二年)(千元)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(第三年)(千元)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <th rowspan="6">
                ...
            </th>
            <td align="left">
                ...(國內)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(國內)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(國內)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(國外)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(國外)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(國外)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <th rowspan="8">
                ...
            </th>
            <td align="left">
                ...(SBIR)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(...)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(...)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(...)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(...)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(...)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(...)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(...)
            </td>    
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <th>
                ...
            </th>
            <td align="left">
                ...(%)
            </td>
            <td align="left">
            	'.(string)($row[0]["..."]).'
            </td>
        </tr>
        <tr>
            <th rowspan="15">
                ...
            </th>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(位)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>

        <tr>
            <th rowspan="5">
                ...
            </th>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <td align="left">
                ...(千元)
            </td>
            <td align="left">
            	'.$row[0]["..."].'
            </td>
        </tr>
        <tr>
            <th>
                ...
            </th>
            <td align="left">
                ...(%)
            </td>
            <td align="left">
            	'.(string)($row[0]["..."]*100).'
            </td>   
        </tr>
        <tr>
            <th>
                ...
            </th>
            <td align="left">
                ...(%)
            </td>
            <td align="left">
            	'.(string)($row[0]["..."]*100).'
            </td>   
        </tr>
		
	</table>
		';
    	} 

}

if ($cf=='adminpredictionlist') {
    if (isset($_GET['...'])) {$qsql = $_GET['...'];}
    require_once("connect_mysql.php");
    $rst = $connect->query($qsql);
    $html='
    <table border="1" align="center" >
        <thead>
            <tr>
                <th data-field="sid" data-sortable="true">...</th>
                <th data-field="sdate" data-sortable="true">預測日期</th>
                <th data-field="suser" data-sortable="true">...</th>
                <th data-field="sprojectnm" data-sortable="true">...</th>
                <th data-field="spremodel" data-sortable="true">...</th>
                <th data-field="ssuccess" data-sortable="true">...(%)</th>
            </tr>

        </thead>
        <tbody>
        ';
    if ($rst->num_rows > 0) { 
        while ($row = $rst->fetch_assoc()) {
            $s = (string)$row['...'];
            $str_sec = explode("-", $s);
            $str_YYY = (string)((int)$str_sec[0]-1911);
            $str_MM = (string)$str_sec[1];
            $txt_seqNo = 'P-'.$str_YYY.'-'.$str_MM.'-'.$row['...'];
            $html=$html.'<tr><td>'.$txt_seqNo.'</td>';//1
            $html=$html.'<td>'.$row['...'].'</td>';//2
            $tmp_user = $row['...'];
            $thisuser_name = "";
            $selectuserSql = "SELECT `...` FROM `...` WHERE `...`= '$tmp_user' LIMIT 1;";
            $userInfoRst = $connect->query($selectuserSql);
            $d = $userInfoRst->fetch_assoc();
            $thisuser_name = $d['...'];
            $html=$html.'<td>'.$thisuser_name.'</td>';//3
            $html=$html.'<td>'.$row['...'].'</td>';//4
            $html=$html.'<td>'.$row['...'].'</td>';//5
            $html=$html.'<td>'.(string)($row['...']*100).'</td></tr>';//6
        }
    }
    $html = $html.'</tbody></table><br>列印日期:'.$nowtimespt.'<br>';

}

if ($cf=='mypredictionrecord') {
    if (isset($_GET['...'])) {$qsql = $_GET['...'];}
    if (isset($_GET['...'])) {$prjtname = $_GET['...'];}
    require_once("....php");
    $rst = $connect->query($qsql);
    $html = '
    <font size="7">列印日期:'.$nowtimespt.'</font><br>
    <font size="7"><br></font>
    <table align="center" border="1">
    <tr>
        <td colspan="3"><b>【'.$prjtname.'...</b></td>
    </tr>
    <tr>
        <td align="center" style="width: 35%;">...</td>
        <td align="center" style="width: 35%;">...</td>
        <td align="center" style="width: 30%;">...(%)</td>
    </tr>';
    if ($rst->num_rows > 0) { 
        while ($row = $rst->fetch_assoc()) {
            //流水編號格式
            $s = (string)$row['...'];
            $str_sec = explode("-", $s);
            $str_YYY = (string)((int)$str_sec[0]-1911);
            $str_MM = (string)$str_sec[1];
            $str_YYYMMDD = explode(" ", $s)[0];
            $txt_seqNo = 'P-'.$str_YYY.'-'.$str_MM.'-'.$row['...'];
            $html = $html.'<tr><td align="center" style="width: 35%;"> <label> '.$txt_seqNo.' </label> </td>
                            <td align="center" style="width: 35%;"> <label> '.$str_YYYMMDD.' </label> </td>
                            <td align="center" style="width: 30%;"> <label> '.(string)((float)$row["final_itm12"]*100).' </label> </td></tr>';
        }
    }

    $html = $html.'</table>';
}

require_once('examples_tcpdf/tcpdf_include.php');
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('...');
$pdf->SetTitle('...');
$pdf->SetSubject('製表時間 : '.$nowtimespt);
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//define ('PDF_HEADER_STRING', "帝天");
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, '', '...');

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/chi.php')) {
	require_once(dirname(__FILE__).'/lang/chi.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
//$pdf->SetFont('dejavusans', '', 10);
$pdf->SetFont('msungstdlight', '', 16);
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Print a table

// add a page
$pdf->AddPage();




// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();


//Close and output PDF document
$fname = '...'.$account.(string)date("Ymd_His").'.pdf';
ob_end_clean();
$pdf->Output($fname, 'I');

//============================================================+
// END OF FILE
//============================================================+
?>