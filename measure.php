<?PHP
include_once 'config.php';

header_print(true);   //載入header檔
?>

<style type="text/css">
<!--
.style2 {font-size: 11pt}
-->
</style>

<body>

<table border = '1' cellpadding = '0' cellspacing = '0' width = '760' class = 'header_table'>
<tr>
	<td><?PHP include_once ROOT_PATH . '/menubar.php';?></td>
</tr>
<tr>
	<td valign = 'top'>
	<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
	<tr>
		<td>
		<div class = 'fast_link'>
		<?PHP
		$nowL = array('首頁' => 'index.php', '健康知識' => 'index.php', '量測工具' => '');
		echo show_path_url($nowL);
		?>
		</td>
	</tr>
	<tr>
		<td>
		<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
		<tr>
			<td width = '18%' valign = 'top'>
			<?PHP include_once ROOT_PATH . "/leftmenu2.php";?>
			</td>
			<td valign = 'top' align = 'center'>
<table id="___01" width="755" height="594" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="10">
			<img src="img/measure_01.jpg" width="755" height="16" alt=""></td>
	</tr>
	<tr>
		<td rowspan="8">
			<img src="img/measure_02.jpg" width="21" height="577" alt=""></td>
		<td colspan="2">
			<img src="img/measure_03.jpg" width="95" height="31" alt=""></td>
		<td colspan="6">
			<img src="img/measure_04.jpg" width="618" height="31" alt=""></td>
		<td rowspan="8">
			<img src="img/measure_05.jpg" width="21" height="577" alt=""></td>
	</tr>
	<tr>
		<td rowspan="7">
			<img src="img/measure_06.jpg" width="1" height="546" alt=""></td>
		<td colspan="2" rowspan="2">
			<img src="img/量測工具_07.jpg" width="165" height="225" alt=""></td>
		<td>
			<img src="img/measure_08.jpg" width="105" height="85" alt=""></td>
		<td rowspan="6">
			<img src="img/measure_09.jpg" width="90" height="523" alt=""></td>
		<td rowspan="2">
			<img src="img/量測工具_09.jpg" width="165" height="225" alt=""></td>
		<td>
			<img src="img/measure_11.jpg" width="105" height="85" alt=""></td>
		<td rowspan="6">
			<img src="img/measure_12.jpg" width="82" height="523" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="img/量測工具_12.jpg" width="105" height="140" alt=""></td>
		<td>
			<img src="img/量測工具_13.jpg" width="105" height="140" alt=""></td>
	</tr>
	<tr>
		<td colspan="3">
			<img src="img/measure_15.jpg" width="270" height="28" alt=""></td>
		<td colspan="2">
			<img src="img/measure_16.jpg" width="270" height="28" alt=""></td>
	</tr>
	<tr>
		<td colspan="2" rowspan="2">
			<img src="img/量測工具_17.jpg" width="165" height="225" alt=""></td>
		<td>
			<img src="img/measure_18.jpg" width="105" height="85" alt=""></td>
		<td rowspan="2">
			<img src="img/量測工具_19.jpg" width="165" height="225" alt=""></td>
		<td>
			<img src="img/measure_20.jpg" width="105" height="85" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="img/量測工具_19-23.jpg" width="105" height="140" alt=""></td>
		<td>
			<img src="img/measure_22.jpg" width="105" height="140" alt=""></td>
	</tr>
	<tr>
		<td colspan="3">
			<img src="img/measure_23.jpg" width="270" height="45" alt=""></td>
		<td colspan="2">
			<img src="img/measure_24.jpg" width="270" height="45" alt=""></td>
	</tr>
	<tr>
		<td colspan="7">
			<img src="img/measure_25.jpg" width="712" height="23" alt=""></td>
	</tr>
	<tr>
		<td>
			<img src="img/間距.gif" width="21" height="1" alt=""></td>
		<td>
			<img src="img/間距.gif" width="1" height="1" alt=""></td>
		<td>
			<img src="img/間距.gif" width="94" height="1" alt=""></td>
		<td>
			<img src="img/間距.gif" width="71" height="1" alt=""></td>
		<td>
			<img src="img/間距.gif" width="105" height="1" alt=""></td>
		<td>
			<img src="img/間距.gif" width="90" height="1" alt=""></td>
		<td>
			<img src="img/間距.gif" width="165" height="1" alt=""></td>
		<td>
			<img src="img/間距.gif" width="105" height="1" alt=""></td>
		<td>
			<img src="img/間距.gif" width="82" height="1" alt=""></td>
		<td>
			<img src="img/間距.gif" width="21" height="1" alt=""></td>
	</tr>
</table>
			</td>
		</tr>
		
		</table>
		</td>
	</tr>
	</table>
	</td>
</tr>
<tr>
	<td>
	<?PHP include_once ROOT_PATH . "/footer.php";?>
	</td>
</tr>
<table>
</body>
</html>