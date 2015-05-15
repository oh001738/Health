<?PHP
include "../config.php";
include "../header.php"; //載入header檔
#header_print(true);   //載入header檔

if ( !ckadmin() )
{
	showMsg("非管理者無法進入");
	reDirect(ROOT_URL);
	exit;
}


?>
<div class = 'title2' align = 'left' style = 'padding-top:5px;padding-bottom:5px;'><?PHP echo urldecode($_GET['cname']) . " / " . urldecode($_GET['username']);?> 歷史健檢資料</div>
<table border = '0' cellpadding = '4' cellspacing = '1' width = '1600' bgcolor = '#CCCCCC'>
<tr bgcolor = '#FFFFFF'>
	<td class = 'text13px' align = 'center'>出生年月日</td>
	<td class = 'text13px' align = 'center'>身高</td>
	<td class = 'text13px' align = 'center'>體重</td>
	<td class = 'text13px' align = 'center'>腰圍</td>
	<td class = 'text13px' align = 'center'>糖尿病</td>
	<td class = 'text13px' align = 'center'>高血壓</td>
	<td class = 'text13px' align = 'center'>心臟病</td>
	<td class = 'text13px' align = 'center'>腎臟病</td>
	<td class = 'text13px' align = 'center'>BMI</td>
	<td class = 'text13px' align = 'center'>理想體重</td>
	<td class = 'text13px' align = 'center'>活動分級</td>
	<td class = 'text13px' align = 'center'>血清</td>
	<td class = 'text13px' align = 'center'>血鈉</td>
	<td class = 'text13px' align = 'center'>空腹血糖</td>
	<td class = 'text13px' align = 'center'>血鉀</td>
	<td class = 'text13px' align = 'center'>糖化血色素</td>
	<td class = 'text13px' align = 'center'>血磷</td>
	<td class = 'text13px' align = 'center'>血色素</td>
	<td class = 'text13px' align = 'center'>血鈣</td>
	<td class = 'text13px' align = 'center'>血容比</td>
	<td class = 'text13px' align = 'center'>血鐵</td>
	<td class = 'text13px' align = 'center'>尿酸</td>
	<td class = 'text13px' align = 'center'>鐵總結合能力</td>
	<td class = 'text13px' align = 'center'>膽固醇</td>
	<td class = 'text13px' align = 'center'>血清轉鐵蛋白</td>
	<td class = 'text13px' align = 'center'>中性脂肪 (三酸甘油)</td>
	<td class = 'text13px' align = 'center'>新增日期</td>
</tr>
<?PHP
$i = 0;
$sql = "SELECT * FROM user_health_bk WHERE userid = '" . $_GET['userid'] . "' ORDER BY add_time DESC";
$result = mysql_query($sql);
while ( $row = mysql_fetch_array($result) )
{
	$bgcolor = ($i % 2 == 0)? '#EEFFFF' : '#FFFFFF';
	echo "<tr bgcolor = '" . $bgcolor . "'>\n";
	echo "<td class = 'text13px' align = 'center'>" . (date("Y", $row['birthday']) - 1911) . date("-m-d", $row['birthday']) . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . $row['user_h'] . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . $row['user_w'] . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . $row['waistline'] . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . $row['diabetes'] . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . $row['hypertension'] . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . $row['heart'] . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . $row['kidney'] . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . round($row['bmi'], 1) . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . round($row['good_w'], 0) . " ~ " . round($row['good_w2'], 0) . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . $row['actions'] . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . $row['creatinine'] . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . $row['na'] . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . $row['fasting_sugar'] . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . $row['kk'] . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . $row['hba1c'] . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . $row['pp'] . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . $row['hgb'] . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . $row['ca'] . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . $row['hct'] . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . $row['fe'] . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . $row['ua'] . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . $row['tibc'] . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . $row['cholesterol'] . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . $row['ferritin'] . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . $row['triglyceride'] . "</td>\n";
	echo "<td class = 'text13px' align = 'center'>" . date("Y-m-d" , $row['add_time']) . "</td>\n";
	echo "</tr>\n";
	$i++;
}
?>
</table>
<br><input type = 'button' id = 'close' name = 'close' value = '關閉視窗' onclick = 'javascrip:window.close()'>
</body>
</html>