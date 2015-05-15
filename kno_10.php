<?PHP
include_once 'config.php';

header_print(true);   //載入header檔
?>
<link href="css/style.css" rel="stylesheet" type="text/css">
<body>

<table border = '1' cellpadding = '0' cellspacing = '0' width = '760' class = 'header_table'>
<tr>
	<td><?PHP include_once ROOT_PATH . '/menubar.php';?></td>
</tr>
<tr>
	<td valign = 'top'>
	<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
	  <!--DWLayoutTable-->
	<tr>
		<td width="1006">
		<div class = 'fast_link'>
		<?PHP
		$nowL = array('首頁' => 'index.php', '健康知識' => 'knowledge.php', '椰漿山粉圓西谷米製作' => '');
		echo show_path_url($nowL);
		?>		</td>
	</tr>
	<tr>
		<td valign="top">
		  <table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
		    <!--DWLayoutTable-->
		    <tr>
		      <td width = '180' height="594" valign = 'top'>
                <?PHP include_once ROOT_PATH . "/leftmenu.php";?>			</td>
			  <td width = '18'>&nbsp;</td>
			  <td width = '755' align = 'center' valign = 'top'>
                <table id="___01" width="755" height="594" border="0" cellpadding="0" cellspacing="0">
                  <!--DWLayoutTable-->
                  <tr>
                    <td height="16" colspan="3" valign="top">
                    <img src="img/kno_f01.jpg" width="755" height="16" alt=""></td>
                  </tr>
                  <tr>
                    <td width="21" rowspan="2" valign="top">
                      <img src="img/kno_f02.jpg" width="21" height="554" alt=""></td>
                    <td width="713" height="31" valign="top"><img src="img/kno_a12.jpg" width="713" height="31" alt=""></td>
                    <td width="21" rowspan="2" valign="top">
                      <img src="img/kno_f05.jpg" width="21" height="554" alt=""></td>
                  </tr>
                  <tr>
                    <td height="523" align="left" valign="top"><p class="kno_01"><strong><img src="img/008_椰漿山粉圓西谷米.jpg" width="135" height="151"><br>
                    </strong></p>
                      <p class="kno_01"><strong>作者：羅梅華主任 </strong><br>
                        <strong>為提升菜色品質、給予患者舒適之口適性及更完整之營養補充 </strong><br>
                        <strong>營養室研發『椰漿山粉圓西谷米』點心 </strong><br>
                      <strong>(西谷米140g、椰奶400ml、山粉圓30g、糖120g)，252卡/人份 </strong></p>
                      <table border="1" cellspacing="0" cellpadding="0" width="566">
                        <tr>
                          <td width="158" valign="top" class="kno_01"><strong>供應7人份之營養成份熱量表</strong> </td>
                          <td width="81" valign="top"><p class="kno_01"><strong>醣類(g)</strong></p></td>
                          <td width="99" valign="top"><p class="kno_01"><strong>蛋白質(g)</strong></p></td>
                          <td width="81" valign="top"><p class="kno_01"><strong>脂肪(g)</strong></p></td>
                          <td width="147" valign="top"><p class="kno_01"><strong>總熱量(kcal)</strong></p></td>
                        </tr>
                        <tr>
                          <td width="158" valign="top" bgcolor="#D5EAEE"><p class="kno_01"><strong>西谷米140g</strong></p></td>
                          <td width="81" valign="top" bgcolor="#D5EAEE"><p class="kno_01"><strong>105</strong></p></td>
                          <td width="99" valign="top" bgcolor="#D5EAEE"><p class="kno_01"><strong>14</strong></p></td>
                          <td width="81" valign="top" bgcolor="#D5EAEE"><p class="kno_01"><strong>0</strong></p></td>
                          <td width="147" valign="top" bgcolor="#D5EAEE"><p class="kno_01"><strong>476kcal</strong></p></td>
                        </tr>
                        <tr>
                          <td width="158" valign="top"><p class="kno_01"><strong>椰漿400ml</strong></p></td>
                          <td width="81" valign="top"><p class="kno_01"><strong>32</strong></p></td>
                          <td width="99" valign="top"><p class="kno_01"><strong>8</strong></p></td>
                          <td width="81" valign="top"><p class="kno_01"><strong>72</strong></p></td>
                          <td width="147" valign="top"><p class="kno_01"><strong>808kcal</strong></p></td>
                        </tr>
                        <tr>
                          <td width="158" valign="top" bgcolor="#D5EAEE"><p class="kno_01"><strong>糖140g</strong></p></td>
                          <td width="81" valign="top" bgcolor="#D5EAEE"><p class="kno_01"><strong>120</strong></p></td>
                          <td width="99" valign="top" bgcolor="#D5EAEE"><p class="kno_01"><strong>--</strong></p></td>
                          <td width="81" valign="top" bgcolor="#D5EAEE"><p class="kno_01"><strong>--</strong></p></td>
                          <td width="147" valign="top" bgcolor="#D5EAEE"><p class="kno_01"><strong>480kcal</strong></p></td>
                        </tr>
                        <tr>
                          <td width="158" valign="top"><p class="kno_01"><strong>山粉圓30g</strong></p></td>
                          <td width="81" valign="top"><p class="kno_01"><strong>-</strong></p></td>
                          <td width="99" valign="top"><p class="kno_01"><strong>-</strong></p></td>
                          <td width="81" valign="top"><p class="kno_01"><strong>-</strong></p></td>
                          <td width="147" valign="top"><p class="kno_01"><strong>-</strong></p></td>
                        </tr>
                        <tr>
                          <td width="158" valign="top" bgcolor="#D5EAEE"><p class="kno_01"><strong>&nbsp;</strong></p></td>
                          <td width="81" valign="top" bgcolor="#D5EAEE"><p class="kno_01"><strong>&nbsp;</strong></p></td>
                          <td width="99" valign="top" bgcolor="#D5EAEE"><p class="kno_01"><strong>&nbsp;</strong></p></td>
                          <td width="81" valign="top" bgcolor="#D5EAEE"><p class="kno_01"><strong>&nbsp;</strong></p></td>
                          <td width="147" valign="top" bgcolor="#D5EAEE"><p class="kno_01"><strong>1764kcal/7人份 </strong></p></td>
                        </tr>
                      </table>                      
                    </td>
                  </tr>
                  <tr>
                    <td height="23" colspan="3" valign="top"><img src="img/kno_f25.jpg" width="755" height="23" alt=""></td>
                  </tr>
                </table></td>
		  <td width = '53'></td>
		    </tr>
		                                                                                  </table></td>
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