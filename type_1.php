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
			<td height="518" valign = 'top' class = 'leftmenu'>
			<?PHP include_once ROOT_PATH . "/leftmenu.php";?>			</td>
			<td width="846" align = 'center' valign = 'top'>
			  <table border = '0' cellpadding = '4' cellspacing = '1' width = '95%'>
			    <tr>
			      <td valign="top" style = 'padding:10 10 0 0'><div class = 'title3' valign="top">
			        <p><img src="img/tittle01.jpg" width="61" height="33"></p>
		                <p>一、健康生活型態</p>
	                </div></td>
	              </tr>
			    <tr>
			      <td class = 'text15px'><p><br>●1.維持理想體</p>
                      <p>BMI(身體質量指數)＝體重公斤/身高公尺2（標準值18～24 ）
                      <p>例如：身高162公分，體重60公斤其身體質量指數？<br>
                        162公分=1.62公尺<br>
                      60÷(1.62公尺x1.62公尺)=22.86(代表在理想體重範圍內)</p>
                    <p></p></td>
	              </tr>
			    <tr>
			      <td class = 'text15px'><p>●2.養成適度運動習慣：</p>
                      <p>如散步、土風舞、氣功等運動、每次運動約20～30分鐘，每週至少3次，視體力狀況採漸進式。
                    <p></p></td>
	              </tr>
			    <tr>
			      <td class = 'text15px'><p>●3.戒菸及不酗酒：</p>
                      <p>尤其糖尿病、及痛風病患絕對禁酒。
                    <p></p></td>
	              </tr>
			    <tr>
			      <td class = 'text15px'><p>●4.良好生活習慣：</p>
                      <p>避免不必要的熬夜，有適當的休息與休閒。
                    <p></p></td>
	              </tr>
		      </table></td>
			<td width="25">&nbsp;</td>
		    <td width="25" valign = 'top' class = 'rightmenu'><?PHP include_once 'right_menu.php';?></td>
		<td width="81">&nbsp;</td>
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