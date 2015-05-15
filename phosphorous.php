<?PHP
include_once 'config.php';

header_print(true);   //載入header檔
?>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
.style2 {color: #FF0000}
.style3 {color: #FFFFFF}
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
		$nowL = array('首頁' => 'index.php', '健康知識' => 'index.php', '認識磷' => '');
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
				<td><div class = 'title3'>低磷飲食</div></td>
			</tr>
			<tr>
				<td align = 'center'>
				<table width = '95%' border="2" cellpadding="4" cellspacing="0" bordercolor = '#FFFFFF' style = 'border-collapse:collapse'>
				<tr>
					<td colspan="2" align = 'center' valign="top" bgcolor="#FF9900" class = 'style3 text15px'><strong>含磷高的食物</strong></td>
				</tr>
				<tr>
					<td width="420" valign="top" bgcolor="#F40618" ><p align="center" class="style1">避免食用 </p></td>
					<td width="411" valign="top" bgcolor="#FF0033" ><p align="center" class="style1">少量食用 </p></td>
				</tr>
				<tr>
					<td width="420" valign="top" class = 'text15px'>
					<span class="style2">內臟類</span>：豬肝、豬心、雞胗 <br>
					<span class="style2">乳製品</span>：優格、乳酪、優酪乳、發酵乳、起司、全麥製品、小麥胚芽 <br>
					<span class="style2">乾豆類</span>：黑豆、蠶豆、紅豆、綠豆、栗子 <br>
					<span class="style2">堅果類</span>：花生、瓜子、杏仁果、開心果、腰果、核桃、芝麻 <br>
					<span class="style2">其　他</span>：健素糖、酵母粉、可樂、汽水、蛋黃、可可粉、魚卵、魚（貢）丸、沙士、肉鬆、卵磷脂、養樂多、冰淇淋</td>
					<td width="411" valign="top" class = 'text15px'><span class="style2">鮮奶 <br>
					奶粉<br>
					巿售營養多</span> <br>
					如：亞培安素、補體素、三多奶蛋白等 <br>以上使用請洽詢營養師</td>
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