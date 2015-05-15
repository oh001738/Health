<?PHP
include_once 'config.php';

header_print(true);   //載入header檔
?>

<style type="text/css">
<!--
.style2 {font-size: 10pt}
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
			<td height="315" valign = 'top' class = 'leftmenu'>
			<?PHP include_once ROOT_PATH . "/leftmenu.php";?>			</td>
			<td width="846" align = 'center' valign = 'top'>
			  <table border = '0' cellpadding = '4' cellspacing = '1' width = '95%'>
			    <tr>
			      <td style = 'padding:10 10 0 0'><div class = 'title3'>腎臟移植</div></td>
			  </tr>
			    <tr>
			      <td class = 'text15px'><br>方法：
			        <p>經由外科手術，將一個健康的腎臟給予腎衰竭病人稱之腎移植，移植的腎臟可以代替原來壞掉的腎臟功能。
		            <p></p></td>
			  </tr>
			    <tr>
			      <td class = 'text15px'>腎臟來源：
			        <p>1.可由血親（五等親內）捐贈。
			          <p>2.腦死病患家屬願意將親人的器官捐贈。</p>
				  <p>	捐贈者須接受抽血檢驗與檢查確定捐贈者的腎臟是正常的。
				    <p>	受贈者與捐贈者的組織配對須達到一定的符合條件，才能進行移植。</td>
			  </tr>
		        </table></td>
			<td width="22">&nbsp;</td>
		    <td width="22" valign = 'top' class = 'rightmenu'><?PHP include_once 'right_menu.php';?></td>
		<td width="90">&nbsp;</td>
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