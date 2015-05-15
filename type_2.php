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
			<td height="499" valign = 'top' class = 'leftmenu'>
			<?PHP include_once ROOT_PATH . "/leftmenu.php";?>			</td>
			<td width="42">&nbsp;</td>
			<td width="845" align = 'center' valign = 'top'>
			  <table border = '0' cellpadding = '4' cellspacing = '1' width = '95%'>
			    <!--DWLayoutTable-->
			    <tr>
			      <td style = 'padding:10 10 0 0'><div class = 'title3'>
			        <p><img src="img/tittle01.jpg" width="61" height="33"></p>
                        <p>二、謹「腎」飲食</p>
                    </div></td>
                    <td width="45"></td>
                  </tr>
			    <tr>
			      <td class = 'text15px'><p><br>●1.以均衡飲食為原則，不需大補特補</p>
                      <p>每日飲食應由六大類食物均衡攝取，有充足的營養，身體免疫力自然提升，可以避免感染的發生。
                    <p></p></td>
                    <td></td>
                  </tr>
			    <tr>
			      <td class = 'text15px'><p>●2.適量蛋白質攝取、避免大魚大肉的習慣</p>
                      <p>蛋白質類食物於體內代謝後產生含氮廢物，由腎臟負責清除。魚、肉、蛋、奶類等動物性蛋白質含較高脂肪，攝取過量會影響血脂肪，可能造成腎臟血管病變。
                    <p></p></td>
                    <td></td>
                  </tr>
			    <tr>
			      <td class = 'text15px'><p>●3.少鹽、少調味料、少加工品</p>
                      <p>X 醃製及添加鈉鹽的加工食品、濃縮食品、調味料（豆腐乳、醬瓜、味精、豆瓣醬、蕃茄醬、沙茶醬等）需限量食用，避免長期高鹽攝取造成腎臟負擔。
                      <p>V 選擇新鮮的食材搭配香料如：蔥、薑、蒜、辣椒、枸杞、九層塔等調味，可彌補鹹度之不足。
                    <p></p></td>
                    <td></td>
                  </tr>
			    <tr>
			      <td class = 'text15px'>
			        <p>腎臟保健應由均衡飲食出發，選用高纖維、低油脂、低鹽、不含人工添加物的新鮮、自然食物為主！不需吃補，並以理想體重為目標即可達到腎臟保健。與休閒。
		            <p></p></td>
                    <td></td>
                  </tr>
		      </table></td>
			<td width="17">&nbsp;</td>
		    <td width="17" valign = 'top' class = 'rightmenu'><?PHP include_once 'right_menu.php';?></td>
		<td width="64">&nbsp;</td>
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