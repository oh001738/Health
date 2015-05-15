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
			<td height="405" valign = 'top' class = 'leftmenu'>
			<?PHP include_once ROOT_PATH . "/leftmenu.php";?>			</td>
			<td width="843" align = 'center' valign = 'top'>
			  <table border = '0' cellpadding = '4' cellspacing = '1' width = '95%'>
			    <tr>
			      <td style = 'padding:10 10 0 0'><div class = 'title3'>
			        <p><img src="img/tittle01.jpg" width="61" height="33"></p>
				      <p>五、自我監測與健康檢查</p>
				    </div></td>
			    </tr>
			    <tr>
			      <td class = 'text15px'><p><br>●1.觀察異常的尿液型態：</p>
                      <p>如廁情況的改變
                      <p>解尿次數明顯增加與尿量明顯改變，尤其是在夜間如廁次數的增加已影響睡眠品質，即需要特別注意。</p>
				      <p>尿液外觀的改變</p>
			        <p>尿液的顏色或性質改變，如血尿、尿有泡沫等。如有以上情形需就醫求診，勿延誤病情。</p></td>
			    </tr>
			    <tr>
			      <td class = 'text15px'><p>●2.定期健康檢查：</p>
                      <p>健保補助成年健檢：40歲以上成人每3年一次；65歲以上老人每年一次                  
                    <p>從健康檢查報告中就可初步得知有無腎臟病，以早期發現早期治療。<p></p></td>
			    </tr>
		        </table></td>
			<td width="23">&nbsp;</td>
		    <td width="23" valign = 'top' class = 'rightmenu'><?PHP include_once 'right_menu.php';?></td>
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