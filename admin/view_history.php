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

<style type="text/css">
<!--
.style2 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<div class = 'title2' align = 'left' style = 'padding-top:5px;padding-bottom:5px;'><span id = 'username' name = 'username'></span> / 飲食日誌資料</div>
<table border = '0' cellpadding = '4' cellspacing = '1' width = '700' bgcolor = '#CCCCCC'>
<tr bgcolor = '#EDEDDE'>
	<td align = 'center' bgcolor="#FFCC00" class = 'text13px style2'>新增日期</td>
	<td align = 'center' bgcolor="#FFCC00" class = 'text13px style2'>餐別</td>
	<td align = 'center' bgcolor="#FFCC00" class = 'text13px style2'>佔一天份量</td>
	<td align = 'center' bgcolor="#FFCC00" class = 'text13px style2'>熱量總數</td>
	<td align = 'center' bgcolor="#FFCC00" class = 'text13px style2'>圖片</td>
	<td align = 'center' bgcolor="#FFCC00" class = 'text13px style2'>詳細資料</td>
</tr>
<?PHP
$i = 0;
$sql = "SELECT * FROM user_food WHERE userid = '" . $_GET['historyid'] . "' ORDER BY add_time ASC";
$result = mysql_query($sql);
while ( $row = mysql_fetch_array($result) )
{
	$calTotal = '';                          //熱量總數
	$foodId = explode(',', $row['food_id']); //食物ID
	$part   = explode(',', $row['part']);    //份量
	foreach ( $foodId as $key => $value )
	{
		$foodV = mysql_fetch_array(mysql_query("SELECT ch_id, ch_image, ch_name, kg, ch_k, ch_cholesterol, ch_fat, ch_e, ch_carbohydrate, ch_potassium, ch_sodium, ch_calcium, ch_phosphorous, ch_mg FROM choose_food WHERE ch_id = '" . $value . "'"));
		$FV[$value]['ch_id']           = $foodV['ch_id'];
		$FV[$value]['ch_image']        = $foodV['ch_image'];
		$FV[$value]['ch_name']         = $foodV['ch_name'];
		$FV[$value]['kg']              = $foodV['kg'];
		$FV[$value]['ch_k']            = $foodV['ch_k'];
		$FV[$value]['ch_cholesterol']  = $foodV['ch_cholesterol'];
		$FV[$value]['ch_fat']          = $foodV['ch_fat'];
		$FV[$value]['ch_e']            = $foodV['ch_e'];
		$FV[$value]['ch_carbohydrate'] = $foodV['ch_carbohydrate'];
		$FV[$value]['ch_potassium']    = $foodV['ch_potassium'];
		$FV[$value]['ch_sodium']       = $foodV['ch_sodium'];
		$FV[$value]['ch_calcium']      = $foodV['ch_calcium'];
		$FV[$value]['ch_phosphorous']  = $foodV['ch_phosphorous'];
		$FV[$value]['ch_mg']           = $foodV['ch_mg'];
		$FV[$value]['part']            = $part[$key];           //食物份量
		$calTotal = $calTotal + ($part[$key] * $foodV['ch_k']); //熱量總數
	}
	echo "<tr bgcolor = '#FFFFFF'>\n";
	echo "	<td class = 'text13px' align = 'center'>" . date("Y-m-d H:i:s", $row['add_time']) . "</td>\n";
	echo "	<td class = 'text13px' align = 'center'>" . $MEALTYPE[$row['meal']] . "</td>\n";
	if ( $row['percent'] == '1' ){ echo "	<td class = 'text13px' align = 'center'>1</td>\n"; }else{ echo "   <td class = 'text13px' align = 'center'>1 / " . $row['percent'] . "</td>\n"; }
	echo "	<td class = 'text13px' align = 'center'>" . $calTotal . "</td>\n";
	if ( $row['img'] != '') { echo "	<td class = 'text13px' align = 'center'><a href = '" . ROOT_URL . "/upload/" . $row['img'] . "' target = '_blank'><img src = '" . ROOT_URL . "/images/paginact.gif' border = '0'></a></td>\n"; }else{ echo "<td></td>\n"; }
	echo "	<td class = 'text13px' align = 'center'><a href = 'javascript:show_display(\"food_" . $row['id'] . "\");'>瀏覽</a></td>\n";
	echo "</tr>\n";
	echo "<tr id = 'food_" . $row['id'] . "' name = 'food_" . $row['id'] . "' style = 'display:none' colspan = '6' bgcolor = '#FFFFFF'>\n";
	echo "	<td colspan = '5' align = 'center'>\n";
	echo "	<table border = '1' cellpadding = '2' cellspacing = '1' width = '100%' style = 'border-collapse:collapse;' bordercolor = '#787878;'>\n";
	echo "	<tr bgcolor = '#FFEAAA'>\n";
	echo "		<td class = 'text13px' align = 'center'></td>\n";
	echo "		<td class = 'text13px' align = 'center'>名稱</td>\n";
	echo "		<td class = 'text13px' align = 'center'>重量</td>\n";
	echo "		<td class = 'text13px' align = 'center'>份量</td>\n";
	echo "		<td class = 'text13px' align = 'center'>熱量</td>\n";
	echo "		<td class = 'text13px' align = 'center'>膽固醇</td>\n";
	echo "		<td class = 'text13px' align = 'center'>脂肪</td>\n";
	echo "		<td class = 'text13px' align = 'center'>蛋白質</td>\n";
	echo "		<td class = 'text13px' align = 'center'>醣</td>\n";
	echo "		<td class = 'text13px' align = 'center'>鉀</td>\n";
	echo "		<td class = 'text13px' align = 'center'>鈉</td>\n";
	echo "		<td class = 'text13px' align = 'center'>鈣</td>\n";
	echo "		<td class = 'text13px' align = 'center'>磷</td>\n";
	echo "		<td class = 'text13px' align = 'center'>鎂</td>\n";
	echo "	</tr>\n";
	foreach ( $foodId as $key => $value )
	{
		if ( $value == '' ){ continue; }
		echo "<tr bgcolor = '#FFFFFF'>\n";
		echo "  <td class = 'text13px' align = 'center'><a href = 'javascript:view_food(" . $FV[$value]['ch_id'] . ")'><img src = '" . IMG_URL . "/" . $FV[$value]['ch_image'] . "' width = '50' border = '0'></a></td>\n";
		echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['ch_name'] . "</td>\n";
		echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['kg'] . "</td>\n";
		echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['part'] . "</td>\n";
		echo "  <td class = 'text13px' align = 'center'>" . ($FV[$value]['part'] * $FV[$value]['ch_k']) . "</td>\n";
		echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['ch_cholesterol'] . "</td>\n";
		echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['ch_fat'] . "</td>\n";
		echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['ch_e'] . "</td>\n";
		echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['ch_carbohydrate'] . "</td>\n";
		echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['ch_potassium'] . "</td>\n";
		echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['ch_sodium'] . "</td>\n";
		echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['ch_calcium'] . "</td>\n";
		echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['ch_phosphorous'] . "</td>\n";
		echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['ch_mg'] . "</td>\n";
		echo "</tr>\n";
	}
	if ( trim($row['note']) != '' )
	{
		echo "<tr>\n";
		echo "	<td class = 'text13px'>備註：</td>\n";
		echo "	<td class = 'text13px' colspan = '13'>" . wordnl2br($row['note']) . "</td>\n";
		echo "</tr>\n";
	}
	echo "	</table>\n";
	echo "	</td>\n";
	echo "</tr>\n";
	unset($carTotal,$foodId,$part);
	$i++;
}
if ($i == 0)
{
	echo "<tr bgcolor = '#FFFFFF'>\n";
	echo "	<td colspan = '6' align = 'center'>尚無資料!!</td>\n";
	echo "</tr>\n";
}
?>
</table>
<div align = 'center' style = 'padding-top:10px'><input type = 'button' id = 'close' name = 'close' value = '關閉視窗' onclick = 'window.close()'></div>
<script language = 'javascript'>
<!--
document.getElementById('username').innerHTML = unescape("<?PHP echo $_GET['username'];?> ");
//-->
</script>