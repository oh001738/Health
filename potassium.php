<?PHP
include_once 'config.php';

header_print(true);   //載入header檔
?>

<style type="text/css">
<!--
.style3 {
	color: #FFFFFF;
	font-weight: bold;
}
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
		$nowL = array('首頁' => 'index.php', '健康知識' => 'index.php', '認識鉀' => '');
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
				<td><div class = 'title3'>低鉀飲食</div></td>
			</tr>
			<tr>
				<td align = 'center'>
				<table border = '1' cellspacing = '0' cellpadding = '4' style = 'border-collapse:collapse' bordercolor = '#FFFFFF' width = '95%'>
				<tr>
					<td colspan = '2' align = 'center' valign = 'top' bgcolor="#0066FF" class = 'text15px style3'>含鉀高的食物</td>
				</tr>
				<tr>
					<td width = '48%' valign = 'top' bgcolor="#FF0000" class = 'text15px'><p align="center" class="style3">避免食用 </p></td>
					<td valign = 'top' bgcolor="#FF0033" class = 'text15px'><p align="center" class="style3">少量食用 </p></td>
				</tr>
				<tr>
					<td valign="top" class = 'text15px'>楊桃<br>低鈉鹽<br>美味鹽<br>無鹽醬油</td>
					<td valign="top" class = 'text15px'>水果類：美濃瓜、哈密瓜、木瓜、奇異果、蕃茄、玫瑰桃、草莓、芭樂、釋迦、香蕉、柳丁、榴槤<br>
					蔬菜類：紫菜、木耳、菠菜、莧菜、紅鳳菜<br>
					其　他：巧克力、梅子汁、蕃茄醬、乾燥水果乾、藥膳湯 <br>
					飲　料：咖啡、茶、雞精、人蔘精、運動飲料</td>
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