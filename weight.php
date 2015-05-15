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
			<td height="57" valign = 'top' class = 'leftmenu'>
			<?PHP include_once ROOT_PATH . "/leftmenu.php";?>			</td>
			<td width="850" align = 'center' valign = 'top'>
			  <table border = '0' cellpadding = '4' cellspacing = '1' width = '95%'>
			    <tr>
			      <td><div class = 'title3'>認識體重</div></td>
	              </tr>
			    <tr>
			      <td class = 'text15px'>均衡飲食 是健康的基礎，如果能根據 [ 食物金字塔 ] 的比例進食，再無須倚賴進補以供身體所需。</td>
	              </tr>
		        </table></td>
			<td width="24">&nbsp;</td>
		    <td width="24" valign = 'top' class = 'rightmenu'><?PHP include_once 'right_menu.php';?></td>
		<td width="96">&nbsp;</td>
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