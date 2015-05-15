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
		$nowL = array('首頁' => 'index.php', '健康知識' => 'knowledge.php', '「黃金粽」製作' => '');
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
                    <td width="713" height="31" valign="top"><img src="img/kno_a09.jpg" width="713" height="31" alt=""></td>
                    <td width="21" rowspan="2" valign="top">
                    <img src="img/kno_f05.jpg" width="21" height="554" alt=""><img src="img/kno_f05.jpg" width="21" height="375" alt=""></td>
                  </tr>
                  <tr>
                    <td height="898" align="left" valign="top"><p class="kno_01"><strong><img src="img/003_黃金粽3.jpg" width="195" height="129"><br>作者：羅梅華主任 </strong><br>
                        <strong>98年5月5日營養室研發「黃金粽」之營養<span class="kno_01">分析 </span></strong></p>
                      <table border="1" cellspacing="0" cellpadding="0" width="643">
                        <tr>
                          <td width="47" valign="top"><p>&nbsp;</p></td>
                          <td width="57" valign="top"><p class="kno_01">黃金飯 </p></td>
                          <td width="38" valign="top"><p class="kno_01">花枝 </p></td>
                          <td width="66" valign="top"><p class="kno_01">素豆雞 </p></td>
                          <td width="38" valign="top"><p class="kno_01">米豆 </p></td>
                          <td width="38" valign="top"><p class="kno_01">香菇 </p></td>
                          <td width="57" valign="top"><p class="kno_01">蘿蔔乾 </p></td>
                          <td width="57" valign="top"><p class="kno_01">主食 </p></td>
                          <td width="66" valign="top"><p class="kno_01">肉魚豆 </p></td>
                          <td width="57" valign="top"><p class="kno_01">蔬菜 </p></td>
                          <td width="47" valign="top"><p class="kno_01">油脂 </p></td>
                          <td width="76" valign="top"><p class="kno_01">黃金粽 </p></td>
                        </tr>
                        <tr>
                          <td width="47" valign="top"><p class="kno_01">重量 </p></td>
                          <td width="57" valign="top"><p class="kno_01">100g</p></td>
                          <td width="38" valign="top"><p class="kno_01">15g</p></td>
                          <td width="66" valign="top"><p class="kno_01">5g</p></td>
                          <td width="38" valign="top"><p class="kno_01">5g</p></td>
                          <td width="38" valign="top"><p class="kno_01">5g</p></td>
                          <td width="57" valign="top"><p class="kno_01">5g</p></td>
                          <td width="57" valign="top"><p class="kno_01">100g</p></td>
                          <td width="66" valign="top"><p class="kno_01">25g</p></td>
                          <td width="57" valign="top"><p class="kno_01">10g</p></td>
                          <td width="47" valign="top"><p class="kno_01">0</p></td>
                          <td width="76" valign="top"><p class="kno_01">135g/個 </p></td>
                        </tr>
                        <tr>
                          <td width="47" valign="top"><p class="kno_01">份量 </p></td>
                          <td width="57" valign="top"><p>&nbsp;</p></td>
                          <td width="38" valign="top"><p>&nbsp;</p></td>
                          <td width="66" valign="top"><p>&nbsp;</p></td>
                          <td width="38" valign="top"><p>&nbsp;</p></td>
                          <td width="38" valign="top"><p>&nbsp;</p></td>
                          <td width="57" valign="top"><p>&nbsp;</p></td>
                          <td width="57" valign="top"><p class="kno_01">2份 </p></td>
                          <td width="66" valign="top"><p class="kno_01">0.5份 </p></td>
                          <td width="57" valign="top"><p class="kno_01">0.1份 </p></td>
                          <td width="47" valign="top"><p class="kno_01">0</p></td>
                          <td width="76" valign="top"><p>&nbsp;</p></td>
                        </tr>
                        <tr>
                          <td width="47" valign="top"><p class="kno_01">熱量 </p></td>
                          <td width="57" valign="top"><p>&nbsp;</p></td>
                          <td width="38" valign="top"><p>&nbsp;</p></td>
                          <td width="66" valign="top"><p>&nbsp;</p></td>
                          <td width="38" valign="top"><p>&nbsp;</p></td>
                          <td width="38" valign="top"><p>&nbsp;</p></td>
                          <td width="57" valign="top"><p>&nbsp;</p></td>
                          <td width="57" valign="top"><p class="kno_01">140卡 </p></td>
                          <td width="66" valign="top"><p class="kno_01">27.5卡 </p></td>
                          <td width="57" valign="top"><p class="kno_01">2.5卡 </p></td>
                          <td width="47" valign="top"><p class="kno_01">0</p></td>
                          <td width="76" valign="top"><p class="kno_01">170卡/個 </p></td>
                        </tr>
                      </table>
                      <p class="kno_01">研發材料及方法：</p>
                      <p class="kno_01">　　　材料：</p>
                      <ol><ol>
                          <li class="kno_01">長糯米。2.花枝。3.乾香菇。4.菜脯。5.素豆雞(長條形)。6.米豆。7.薑黃素。8.粽葉。9.粽線。</li>
                        </ol>
                      </ol>
                      <p class="kno_01">　　　製作方法：每顆重量、餡料大小可自行斟酌</p>
                      <ol>
                        <ol>
                          <li class="kno_01">長糯米洗好後用水浸泡5分鐘。</li>
                          <li class="kno_01">浸好後的長糯米將水瀝乾，用電鍋煮，於內鍋內加一點油及少量的水(若約米1杯，水就是半杯)及薑黃素(薑黃素將米染成黃色即可)，外鍋放水，將糯米煮熟，即成金黃色的薑黃飯。同時米豆放入電鍋內蒸熟。</li>
                          <li class="kno_01">乾香菇先泡水。粽葉先洗淨備用。菜脯先泡水。花枝洗淨備用。乾素豆雞(長條形)泡水備用。</li>
                          <li class="kno_01">香菇、菜脯、素豆雞、花枝切小塊。</li>
                          <li class="kno_01">油鍋爆香後放入香菇、菜脯、素豆雞、花枝切小塊、米豆，加入白胡椒粉、醬油、糖、鹽、黑胡椒粉等調味、炒熟，味道適口後起鍋備用。</li>
                          <li class="kno_01">薑黃飯打鬆放冷後備用。</li>
                          <li class="kno_01">包粽子，原則上取薑黃飯100g+花枝15g+素豆雞5g+香菇5g+蘿蔔乾5g+米豆5g，包成每顆135克的『黃金粽』。<br>
                              <span class="kno_01">黃金粽再放入沸水煮15分鍾，完成製備。                      </span> </li>
                        </ol>
                      </ol>                      <p class="kno_01">&nbsp;</p>                    </td>
                  </tr>
                  <tr>
                    <td height="23" colspan="3" valign="top"><img src="img/kno_f25.jpg" width="755" height="23" alt=""></td>
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