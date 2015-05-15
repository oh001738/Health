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
	&nbsp;重量：<font style = 'font-weight:700;color:#6100BE'>
	<?PHP
	if ($value['kg'] == ''){ echo ''; }else{ echo $value['kg'] . 'g'; }
	?>
	</font>
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
		$f_element_k            = ($foodValue['k'] == 0)? '-' : $foodValue['k'];
		$f_element_cholesterol  = ($foodValue['cholesterol'] == 0)? '-' : $foodValue['cholesterol'];
		$f_element_fat          = ($foodValue['fat'] == 0)? '-' : $foodValue['fat'];
		$f_element_e            = ($foodValue['e'] == 0)? '-' : $foodValue['e'];
		$f_element_carbohydrate = ($foodValue['carbohydrate'] == 0)? '-' : $foodValue['carbohydrate'];
		$f_element_potassium    = ($foodValue['potassium'] == 0)? '-' : $foodValue['potassium'];
		$f_element_sodium       = ($foodValue['sodium'] == 0)? '-' : $foodValue['sodium'];
		$f_element_calcium      = ($foodValue['calcium'] == 0)? '-' : $foodValue['calcium'];
		$f_element_phosphorous  = ($foodValue['phosphorous'] == 0)? '-' : $foodValue['phosphorous'];
		$f_element_mg           = ($foodValue['mg'] == 0)? '-' : $foodValue['mg'];
		$f_element_iron         = ($foodValue['iron'] == 0)? '-' : $foodValue['iron'];
		$f_element_zinc         = ($foodValue['zinc'] == 0)? '-' : $foodValue['zinc'];
		echo "   <td align = 'center' class = 'text13px'>" . $f_element_k . "</td>\n";
		echo "   <td align = 'center' class = 'text13px'>" . $f_element_cholesterol . "</td>\n";
		echo "   <td align = 'center' class = 'text13px'>" . $f_element_fat . "</td>\n";
		echo "   <td align = 'center' class = 'text13px'>" . $f_element_e . "</td>\n";
		echo "   <td align = 'center' class = 'text13px'>" . $f_element_carbohydrate . "</td>\n";
		echo "   <td align = 'center' class = 'text13px'>" . $f_element_potassium . "</td>\n";
		echo "   <td align = 'center' class = 'text13px'>" . $f_element_sodium . "</td>\n";
		echo "   <td align = 'center' class = 'text13px'>" . $f_element_calcium . "</td>\n";
		echo "   <td align = 'center' class = 'text13px'>" . $f_element_phosphorous . "</td>\n";
		echo "   <td align = 'center' class = 'text13px'>" . $f_element_mg . "</td>\n";
		echo "   <td align = 'center' class = 'text13px'>" . $f_element_iron . "</td>\n";
		echo "   <td align = 'center' class = 'text13px'>" . $f_element_zinc . "</td>\n";
		echo "</tr>\n";
	}
}
?>
<tr>
	<td align = 'center' class = 'text13px'>每份</td>
	<td align = 'center' class = 'text13px'><?PHP if ($value['kg'] == ''){ echo ''; }else{ echo $value['kg'] . 'g'; }?></td>
	<td align = 'center' class = 'text13px'><?PHP if ( $value['ch_k'] == 0){ echo '-'; }else{echo $value['ch_k']; }?></td>
	<td align = 'center' class = 'text13px'><?PHP if ( $value['ch_cholesterol'] == 0){ echo '-'; }else{echo $value['ch_cholesterol']; }?></td>
	<td align = 'center' class = 'text13px'><?PHP if ( $value['ch_fat'] == 0){ echo '-'; }else{echo $value['ch_fat']; }?></td>
	<td align = 'center' class = 'text13px'><?PHP if ( $value['ch_e'] == 0){ echo '-'; }else{echo $value['ch_e']; }?></td>
	<td align = 'center' class = 'text13px'><?PHP if ( $value['ch_carbohydrate'] == 0){ echo '-'; }else{echo $value['ch_carbohydrate']; }?></td>
	<td align = 'center' class = 'text13px'><?PHP if ( $value['ch_potassium'] == 0){ echo '-'; }else{echo $value['ch_potassium']; }?></td>
	<td align = 'center' class = 'text13px'><?PHP if ( $value['ch_sodium'] == 0){ echo '-'; }else{echo $value['ch_sodium']; }?></td>
	<td align = 'center' class = 'text13px'><?PHP if ( $value['ch_calcium'] == 0){ echo '-'; }else{echo $value['ch_calcium']; }?></td>
	<td align = 'center' class = 'text13px'><?PHP if ( $value['ch_phosphorous'] == 0){ echo '-'; }else{echo $value['ch_phosphorous']; }?></td>
	<td align = 'center' class = 'text13px'><?PHP if ( $value['ch_mg'] == 0){ echo '-'; }else{echo $value['ch_mg']; }?></td>
	<td align = 'center' class = 'text13px'><?PHP if ( $value['ch_iron'] == 0){ echo '-'; }else{echo $value['ch_iron']; }?></td>
	<td align = 'center' class = 'text13px'><?PHP if ( $value['ch_zinc'] == 0){ echo '-'; }else{echo $value['ch_zinc']; }?></td>
</tr>
<tr>
	<td align = 'center' class = 'text13px'><font style = 'font-weight:700;color:#6100BE'><?PHP if ($value['kg'] == ''){ echo '每100g'; }else{ echo '每100g'; } ?></font></td>
	<td align = 'center' class = 'text13px'></td>
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
	<td align = 'center' class = 'text13px'><font style = 'font-weight:700;color:#6100BE'>每100g</font></td>
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
<tr>
	<td colspan = '14'><font style = 'color:#0300FA'>請注意此表是以每100g食物計算</font></td>
</tr>
<tr>
	<td colspan = '1' align = 'center' class = 'text13px'><font style = ''>備註</font></td>
	<td colspan = '13'></td>
</tr>
</table>
</div>
<div style = 'padding-top:10px'><input type = 'button' id = 'close' name = 'close' value = '關閉視窗' onclick = 'window.close()'></div>
</center>
</body>
</html>