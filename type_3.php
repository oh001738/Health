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
			<td height="291" valign = 'top' class = 'leftmenu'>
			<?PHP include_once ROOT_PATH . "/leftmenu.php";?>			</td>
			<td width="853" align = 'center' valign = 'top'>
			  <table border = '0' cellpadding = '4' cellspacing = '1' width = '95%'>
			    <tr>
			      <td style = 'padding:10 10 0 0'><div class = 'title3'>
			        <p><img src="img/tittle01.jpg" width="61" height="33"></p>
                        <p>三、適度喝水、勿憋尿</p>
                    </div></td>
                  </tr>
			    <tr>
			      <td class = 'text15px'><p><br>●1.適量喝水</p>
                      <p>水份可幫助廢物及結石由尿液排出，除非有特別禁忌〔如心血管疾病、腎臟病、肝硬化引起水腫者應與醫師討論飲水量〕者，每天可喝約1600～2000西西水份。 老年人避免夜間多喝水以免影響睡眠。
                    <p></p></td>
                  </tr>
			    <tr>
			      <td class = 'text15px'><p>●2.勿憋尿</p>
                      <p>有尿意感時宜馬上解尿，以減少膀胱過度膨脹引起泌尿道感染。
                    <p></p></td>
                  </tr>
		      </table></td>
			<td width="24">&nbsp;</td>
			<td width="17" valign = 'top' class = 'rightmenu'><?PHP include_once 'right_menu.php';?></td>
		<td width="92">&nbsp;</td>
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