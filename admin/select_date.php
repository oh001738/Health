<?PHP
include "../config.php";
include "../header.php"; //載入header檔
#header_print(true);   //載入header檔

$time = explode('-', $_GET['dvalue']);  //儲存時間歷史資料
?>
<div style = 'padding-top:10px' style = 'align:center' align = 'center'>
<table border = '0' cellpadding = '2' cellspacing = '0' width = '100%'>
<form action = '' id = 'date' name = 'date' method = 'post'>
<tr>
	<td style = 'font-size:15px'>
	<select id = 'year' name = 'year'>
	<?PHP
	for ($i = 2008; $i <= (date("Y") + 1); $i++)
	{
		$selected = ($i == date("Y") && count($time) == 1)? 'selected' : '';
		$selected = ($i == $time[0])? 'selected' : $selected;
		echo "<option value = '" . $i . "' " . $selected . ">" . $i . "</option>\n";
	}
	?>
	</select> 年
	<select id = 'month' name = 'month'>
	<?PHP
	for ($i = 1; $i <= 12; $i++)
	{
		$selected = ($i == date("m") && count($time) == 1)? 'selected' : '';
		$selected = ($i == $time[1])? 'selected' : $selected;
		$prefix = ($i < 10)? '0' : '';
		echo "<option value = '" . $prefix . $i . "' " . $selected . ">" . $prefix . $i . "</option>\n";
	}
	?>
	</select> 月
	<select id = 'day' name = 'day'>
	<?PHP
	for ($i = 1; $i <= 31; $i++)
	{
		$selected = ($i == date("d") && count($time) == 1)? 'selected' : '';
		$selected = ($i == $time[2])? 'selected' : $selected;
		$prefix = ($i < 10)? '0' : '';
		echo "<option value = '" . $prefix . $i . "' " . $selected . ">" . $prefix . $i . "</option>\n";
	}
	?>
	</select> 日
	</td>
	<td><input type = 'button' id = 'ok' name = 'ok' value = '確定' onclick = 'check()'></td>
</tr>
</form>
</table>
</div>

<script language = 'javascript'>
<!--
function check()
{
	var year  = document.date.year.options[document.date.year.selectedIndex].value;
	var month = document.date.month.options[document.date.month.selectedIndex].value;
	var day   = document.date.day.options[document.date.day.selectedIndex].value;
	if ( !dateV(year, month, day) )
	{
		alert("請選擇正確時間!!");
		document.date.day.focus();
	}else{
		var date = year + '-' + month + '-' + day;
		opener.document.getElementById('<?PHP echo $_GET["id"];?>').value = date;   
		window.close();
	}
}
//-->
</script>