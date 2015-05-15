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
		$nowL = array('首頁' => 'index.php', '健康知識' => 'knowledge.php', '「地瓜鳳梨海鮮粽」製作' => '');
		echo show_path_url($nowL);
		?>		</td>
	</tr>
	<tr>
		<td valign="top">
		  <table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
		    <!--DWLayoutTable-->
		    <tr>
		      <td width = '180' height="969" valign = 'top'>
              <?PHP include_once ROOT_PATH . "/leftmenu.php";?>			</td>
			  <td width = '17'>&nbsp;</td>
			  <td width = '756' align = 'center' valign = 'top'>
                <table id="___01" width="755" height="594" border="0" cellpadding="0" cellspacing="0">
                  <!--DWLayoutTable-->
                  <tr>
                    <td height="16" colspan="3" valign="top">
                    <img src="img/kno_f01.jpg" width="755" height="16" alt=""></td>
                  </tr>
                  <tr>
                    <td width="21" rowspan="2" valign="top">
                    <img src="img/kno_f02.jpg" width="21" height="554" alt=""><img src="img/kno_f02.jpg" width="21" height="375" alt=""></td>
                    <td width="713" height="31" valign="top"><img src="img/kno_a10.jpg" width="713" height="31" alt=""></td>
                    <td width="21" rowspan="2" valign="top">
                    <img src="img/kno_f05.jpg" width="21" height="554" alt=""><img src="img/kno_f05.jpg" width="21" height="375" alt=""></td>
                  </tr>
                  <tr>
                    <td height="898" align="left" valign="top"><p class="kno_01"><strong><img src="img/006_地瓜鳳梨海鮮粽.jpg" width="210" height="123"><br></strong></p>
                      <p class="kno_01"><strong>作者:羅梅華主任 </strong><br>
                        <strong>研發-『抗暖化節能肉粽--地瓜鳳梨海鮮粽』 </strong><br>
                        <strong>(成份為糯米、金敦米、地瓜、鳳梨、香菇、花枝、蘿蔔乾、油蔥酥、蒜頭、醬油、糖、雞粉、胡椒粉)。 </strong><br>
                        <strong>作法： </strong><br>
                        <strong>1.先將糯米、金敦米以1:1之比例混合，放入電鍋先將之煮熟。 </strong><br>
                        <strong>2.將材料炒熟，包粽。 </strong><br>
                        <strong>3.包好之粽子再放入電鍋內蒸過即可食用。 </strong><br>
                      <strong>與傳統肉粽之優點比較表。</strong> </p>
                      <table border="1" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="242" valign="top" class="kno_01"><strong>傳統肉粽</strong> </td>
                          <td width="264" valign="top" bgcolor="#FFFFFF"><p class="kno_01"><strong>地瓜鳳梨海鮮粽(優點)</strong></p></td>
                        </tr>
                        <tr>
                          <td width="242" valign="top" bgcolor="#D5EAEE"><p class="kno_01"><strong>烹調4-6小時(耗時)</strong></p></td>
                          <td width="264" valign="top" bgcolor="#D5EAEE"><p class="kno_01"><strong>烹調45分(省時)</strong></p></td>
                        </tr>
                        <tr>
                          <td width="242" valign="top"><p class="kno_01"><strong>耗瓦斯(耗能)</strong></p></td>
                          <td width="264" valign="top"><p class="kno_01"><strong>省瓦斯(省電、減碳)</strong></p></td>
                        </tr>
                        <tr>
                          <td width="242" valign="top" bgcolor="#D5EAEE"><p class="kno_01"><strong>高油脂、無纖維、肉類多、 </strong></p></td>
                          <td width="264" valign="top" bgcolor="#D5EAEE"><p class="kno_01"><strong>低油脂、無肉類、高纖維 </strong></p></td>
                        </tr>
                        <tr>
                          <td width="242" valign="top"><p class="kno_01"><strong>油膩、純糯米不好消化、高納含量 </strong></p></td>
                          <td width="264" valign="top"><p class="kno_01"><strong>清淡、好消化、低納含量 </strong></p></td>
                        </tr>
                        <tr>
                          <td width="242" valign="top" bgcolor="#D5EAEE"><p class="kno_01"><strong>熱量高(每顆約450卡以上) 、不適合糖尿病及慢性病(如高血脂症)患者食用 </strong></p></td>
                          <td width="264" valign="top" bgcolor="#D5EAEE"><p class="kno_01"><strong>熱量低(每顆只有210卡) 、可適合糖尿病及慢性病(如高脂血症)患者食用 </strong></p></td>
                        </tr>
                      </table>
                      <p class="kno_01">&nbsp;</p>                    </td>
                  </tr>
                  <tr>
                    <td height="23" colspan="3" valign="top"><img src="img/kno_f25.jpg" width="755" height="23" alt=""></td>
                  </tr>
                  </tr>
              </table></td>
		  <td width = '53'>&nbsp;</td>
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