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
	<td>
	<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
	<tr>
		<td valign = 'top'>
		<div class = 'fast_link'>
		<?PHP
		$nowL = array('首頁' => 'index.php', '健康知識' => 'index.php', '認識鈉' => '');
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
			<table border = '0' cellpadding = '2' cellspacing = '1' width = '95%'>
			<tr>
				<td><div class = 'title3'>低鹽飲食</div></td>
			</tr>
			<tr>
				<td align = 'center'>
				<table border = '1' cellspacing = '0' cellpadding = '4' style = 'border-collapse:collapse' bordercolor = '#AAAAAA' width = '95%'>
				<tr>
					<td colspan = '2' valign = 'top' class = 'text15px' align = 'center'>含鹽份高的食物</td>
				</tr>
				<tr>
					<td width = '48%' valign = 'top' class = 'text15px' align = 'center'>禁食（避免）</td>
					<td valign = 'top' class = 'text15px' align = 'center'>少量食用</td>
				</tr>
				<tr>
					<td valign="top" class = 'text15px'>醃製、燻製、滷製的食品：
					醃製蔬菜（榨菜、酸菜、泡菜、雪裡紅、梅干菜）、
					火腿、香腸、燻雞、魚肉鬆、魚乾、皮蛋、鹹蛋、滷味<br>
					罐製食品：醬瓜、肉醬、沙丁魚、鮪魚、豆腐乳、
					沙茶醬、豆瓣醬、蕃茄醬、烏醋、味噌<br>
					加鹽冷凍蔬菜：碗豆莢、青豆仁<br>
					其他：麵線、油麵、速食麵、蘇打餅乾、蜜餞、脫水水果</td>
					<td valign="top" class = 'text15px'>蔬菜類：胡蘿蔔、紫菜、海帶、芹菜</td>
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
		<td><?PHP include_once ROOT_PATH . "/footer.php";?></td>
	</tr>
	</table>
	</td>
</tr>
</table>
</body>
</html>