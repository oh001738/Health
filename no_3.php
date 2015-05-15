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

<table border = '1' cellpadding = '0' cellspacing = '0' class = 'header_table'>
<tr>
	<td><?PHP include_once ROOT_PATH . '/menubar.php';?></td>
</tr>
<tr>
	<td>
	<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
	<tr>
		<td>
		<div class = 'fast_link'></td>
	</tr>
	<tr>
		<td>
		<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
		  <!--DWLayoutTable-->
		<tr>
			<td height="343" valign = 'top' class = 'leftmenu'>
			<?PHP include_once ROOT_PATH . "/leftmenu.php";?>			</td>
			<td width="846" align = 'center' valign = 'top'>
			  <table border = '0' cellpadding = '4' cellspacing = '1' width = '95%'>
			    <tr>
			      <td style = 'padding:10 10 0 0'><div class = 'title3'>腹膜透析</div></td>
			      </tr>
			    <tr>
			      <td class = 'text15px'>方法：
			        <p>俗稱「洗肚子」利用人體的自然構造腹膜作為半透膜，藉由進入肚子的透析液將身體過多的水份及代謝廢物進行排除。
		            <p></p></td>
			      </tr>
			    <tr>
			      <td class = 'text15px'>療程：
			        <p>患者，在家中或適當場所自行操作一天換液４次，每次換液時，先將腹腔內含廢物的透析液引流出來，再灌入新鮮透析液，每次換液約20～30分鐘，新鮮透析液在腹腔內停留4～6小時進行廢物清除後，才需再次換液；所以不用至透析中心，透析期間可以上班、上學、從事家事、買菜活動等。<p></p></td>
			      </tr>
			    <tr>
			      <td class = 'text15px'>透析通路：
			        <p>執行腹膜透析須一週前在腹部（腹腔）以外科手術植入一條永久性的腹膜透析導管。<p></p></td>
			      </tr>
		        </table></td>
			<td width="17">&nbsp;</td>
		    <td width="17" valign = 'top' class = 'rightmenu'><?PHP include_once 'right_menu.php';?></td>
		<td width="107">&nbsp;</td>
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