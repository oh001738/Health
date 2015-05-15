<?PHP
include "config.php";
$value   = get_value('choose_food', "WHERE ch_id = '" . $_GET['food_id'] . "'", '*');
$percent = $_GET['percent'];   //取得每餐份量
header_print(true);            //載入header檔
?>

<center>
<img src = '<?PHP echo IMG_URL;?>/<?PHP echo $value['ch_image'];?>' width = '500'>
<div style = 'padding-top:5px'>
<table border = '1' cellpadding = '2' cellspacing = '1' width = '610' bordercolor = '#565656' style = 'border-collapse:collapse'>
<tr>
	<td colspan = '14' bgcolor="#FFCC00" class = 'text13px'><?PHP echo $value['ch_name'];?>
	&nbsp;重量：
	<?PHP
	if ($value['kg'] == ''){ echo ''; }else{ echo $value['kg'] . 'g'; }
	?>
	<div style = 'padding-top:3px'>內含食材：
	<?PHP
	$sql = "SELECT element_id FROM element_food_conn WHERE food_id = '" . $_GET['food_id'] . "' ORDER BY id ASC";
	$result = mysql_query($sql);
	while ( $row = mysql_fetch_array($result) )
	{
		echo get_col_value('food_element', 'name', "WHERE id = '" . $row['element_id'] . "'") . '&nbsp;&nbsp;';
		$food_element_id[] = $row['element_id'];
	}
	if ( count($food_element_id) == 0 ){ echo '無'; }
	?>
	</div>
	</td>
</tr>
<tr>
	<td align = 'center' class = 'text13px'>名稱</td>
	<td align = 'center' class = 'text13px'>重量</td>
	<td align = 'center' class = 'text13px'>熱量</td>
	<td align = 'center' class = 'text13px'>膽固醇</td>
	<td align = 'center' class = 'text13px'>脂肪</td>
	<td align = 'center' class = 'text13px'>蛋白質</td>
	<td align = 'center' class = 'text13px'>醣類</td>
	<td align = 'center' class = 'text13px'>鉀</td>
	<td align = 'center' class = 'text13px'>鈉</td>
	<td align = 'center' class = 'text13px'>鈣</td>
	<td align = 'center' class = 'text13px'>磷</td>
	<td align = 'center' class = 'text13px'>鎂</td>
	<td align = 'center' class = 'text13px'>鐵</td>
	<td align = 'center' class = 'text13px'>鋅</td>
</tr>

<?PHP
if ( count($food_element_id) > 0 )
{
	foreach ( $food_element_id as $f_e_value )
	{
		$foodValue = get_value('food_element', "WHERE id = '" . $f_e_value . "'");
		echo "<tr>\n";
		echo "   <td align = 'center' class = 'text13px'>" . $foodValue['name'] . "</td>\n";
		echo "   <td align = 'center' class = 'text13px'>\n";
		if ($value['kg'] == ''){ echo ''; }else{ echo $foodValue['kg'] . 'g'; }
		echo "   </td>\n";
		echo "   <td align = 'center' class = 'text13px'>" . $foodValue['k'] . "</td>\n";
		echo "   <td align = 'center' class = 'text13px'>" . $foodValue['cholesterol'] . "</td>\n";
		echo "   <td align = 'center' class = 'text13px'>" . $foodValue['fat'] . "</td>\n";
		echo "   <td align = 'center' class = 'text13px'>" . $foodValue['e'] . "</td>\n";
		echo "   <td align = 'center' class = 'text13px'>" . $foodValue['carbohydrate'] . "</td>\n";
		echo "   <td align = 'center' class = 'text13px'>" . $foodValue['potassium'] . "</td>\n";
		echo "   <td align = 'center' class = 'text13px'>" . $foodValue['sodium'] . "</td>\n";
		echo "   <td align = 'center' class = 'text13px'>" . $foodValue['calcium'] . "</td>\n";
		echo "   <td align = 'center' class = 'text13px'>" . $foodValue['phosphorous'] . "</td>\n";
		echo "   <td align = 'center' class = 'text13px'>" . $foodValue['mg'] . "</td>\n";
		echo "   <td align = 'center' class = 'text13px'>" . $foodValue['iron'] . "</td>\n";
		echo "   <td align = 'center' class = 'text13px'>" . $foodValue['zinc'] . "</td>\n";
		echo "</tr>\n";
	}
}
?>
<tr>
	<td align = 'center' class = 'text13px'><?PHP echo $value['ch_name'];?></td>
	<td align = 'center' class = 'text13px'><?PHP if ($value['kg'] == ''){ echo '每100g'; }else{ echo '每100g'; } ?></td>
	<td align = 'center' class = 'text13px'><?PHP echo get_one_g($value['ch_k'], $value['kg'], 100);?></td>
	<td align = 'center' class = 'text13px'><?PHP echo get_one_g($value['ch_cholesterol'], $value['kg'], 100);?></td>
	<td align = 'center' class = 'text13px'><?PHP echo get_one_g($value['ch_fat'], $value['kg'], 100);?></td>
	<td align = 'center' class = 'text13px'><?PHP echo get_one_g($value['ch_e'], $value['kg'], 100);?></td>
	<td align = 'center' class = 'text13px'><?PHP echo get_one_g($value['ch_carbohydrate'], $value['kg'], 100);?></td>
	<td align = 'center' class = 'text13px'><?PHP echo get_one_g($value['ch_potassium'], $value['kg'], 100);?></td>
	<td align = 'center' class = 'text13px'><?PHP echo get_one_g($value['ch_sodium'], $value['kg'], 100);?></td>
	<td align = 'center' class = 'text13px'><?PHP echo get_one_g($value['ch_calcium'], $value['kg'], 100);?></td>
	<td align = 'center' class = 'text13px'><?PHP echo get_one_g($value['ch_phosphorous'], $value['kg'], 100);?></td>
	<td align = 'center' class = 'text13px'><?PHP echo get_one_g($value['ch_mg'], $value['kg'], 100);?></td>
	<td align = 'center' class = 'text13px'><?PHP echo get_one_g($value['ch_iron'], $value['kg'], 100);?></td>
	<td align = 'center' class = 'text13px'><?PHP echo get_one_g($value['ch_zinc'], $value['kg'], 100);?></td>
</tr>
<tr>
	<td align = 'center' class = 'text13px'>每100g</td>
	<td align = 'center' class = 'text13px'></td>
	<td align = 'center' class = 'text13px'><?PHP echo check_type_1($value['ch_k'], 651, 650, 501, 500, $percent, $value['kg']); ?></td>
	<td align = 'center' class = 'text13px'></td>
	<td align = 'center' class = 'text13px'><?PHP echo check_type_1($value['ch_fat'], 15, 14.9, 12, 11.9, $percent, $value['kg']); ?></td>
	<td align = 'center' class = 'text13px'><?PHP echo check_type_1($value['ch_e'], 15, 14.9, 11, 10.9, $percent, $value['kg']); ?></td>
	<td align = 'center' class = 'text13px'><?PHP echo check_type_1($value['ch_carbohydrate'], 76, 75, 46, 45, $percent, $value['kg']); ?></td>
	<td align = 'center' class = 'text13px'><?PHP echo check_type_1($value['ch_potassium'], 731, 730, 461, 460, $percent, $value['kg']); ?></td>
	<td align = 'center' class = 'text13px'><?PHP echo check_type_1($value['ch_sodium'], 1066, 1065, 800, 799, $percent, $value['kg']); ?></td>
	<td align = 'center' class = 'text13px'><?PHP echo check_type_1($value['ch_calcium'], 834, 833, 401, 400, $percent, $value['kg']); ?></td>
	<td align = 'center' class = 'text13px'><?PHP echo check_type_1($value['ch_phosphorous'], 1334, 1333, 267, 266, $percent, $value['kg']); ?></td>
	<td align = 'center' class = 'text13px'><?PHP echo check_type_1($value['ch_mg'], 234, 233, 121, 120, $percent, $value['kg']); ?></td>
	<td align = 'center' class = 'text13px'></td>
	<td align = 'center' class = 'text13px'></td>
</tr>
</table>
</div>
<div style = 'padding-top:10px'><input type = 'button' id = 'close' name = 'close' value = '關閉視窗' onclick = 'window.close()'></div>
</center>
</body>
</html>