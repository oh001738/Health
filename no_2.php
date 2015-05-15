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
			<td height="324" valign = 'top' class = 'leftmenu'>
			<?PHP include_once ROOT_PATH . "/leftmenu.php";?>			</td>
			<td width="848" align = 'center' valign = 'top'>
			  <table border = '0' cellpadding = '4' cellspacing = '1' width = '95%'>
			    <tr>
			      <td style = 'padding:10 10 0 0'><div class = 'title3'>血液透析</div></td>
			    </tr>
			    <tr>
			      <td class = 'text15px'>方法：
			        <p>俗稱「洗腎」利用血液透析機器及人造透析器（人工腎臟）。將病人的血液經血液透析機，過濾其血液中的廢物及過多的水
			          份。
		            <p></p></td>
			    </tr>
			    <tr>
			      <td class = 'text15px'>療程：
			        <p>每週到透析中心進行3次透析治療，每次透析時間為4~5小時。<p></p></td>
			    </tr>
			    <tr>
			      <td class = 'text15px'>透析通路：
			        <p>一個將開始血液透析的病人，必須先做好血管通路，血管通路指的是在進行血液透析治療時，必須有一個容易進入血管的通路以便進行透析治療。<p></p></td>
			    </tr>
		        </table></td>
			<td width="17">&nbsp;</td>
		    <td width="17" valign = 'top' class = 'rightmenu'><?PHP include_once 'right_menu.php';?></td>
		<td width="103">&nbsp;</td>
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