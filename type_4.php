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
		<td>
		<div class = 'fast_link'></td>
	</tr>
	<tr>
		<td>
		<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
		  <!--DWLayoutTable-->
		<tr>
			<td height="168" valign = 'top' class = 'leftmenu'>
			<?PHP include_once ROOT_PATH . "/leftmenu.php";?>			</td>
			<td width="848" align = 'center' valign = 'top'>
			  <table border = '0' cellpadding = '4' cellspacing = '1' width = '95%'>
			    <tr>
			      <td style = 'padding:10 10 0 0'><div class = 'title3'>
			        <p><img src="img/tittle01.jpg" width="61" height="33"></p>
                        <p>四、尋求正確的醫療途徑、不亂吃藥</p>
                    </div></td>
                  </tr>
			    <tr>
			      <td class = 'text15px'>
			        <p><br>有需要用藥時，應諮詢及遵從醫藥專業人員指導，不要濫用止痛藥或來路不明的藥物，不相信偏方草藥、及不實廣告成藥。
		            <p></p></td>
                  </tr>		
		        </table></td>
			<td width="19">&nbsp;</td>
		    <td width="19" valign = 'top' class = 'rightmenu'><?PHP include_once 'right_menu.php';?></td>
		<td width="97">&nbsp;</td>
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