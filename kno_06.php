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
		$nowL = array('首頁' => 'index.php', '健康知識' => 'knowledge.php', '國產酒之酒精含量' => '');
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
                    <td width="713" height="31" valign="top"><img src="img/kno_a08.jpg" width="713" height="31" alt=""></td>
                    <td width="21" rowspan="2" valign="top">
                    <img src="img/kno_f05.jpg" width="21" height="554" alt=""><img src="img/kno_f05.jpg" width="21" height="375" alt=""></td>
                  </tr>
                  <tr>
                    <td height="898" align="left" valign="top"><p class="kno_01">&nbsp;</p>
                      <table border="1" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="170" valign="top"><p align="center" class="kno_01">酒別 </p></td>
                          <td width="120" valign="top"><p align="center" class="kno_01">酒精度（﹪） </p></td>
                          <td width="144" valign="top"><p align="center" class="kno_01">酒別 </p></td>
                          <td width="124" valign="top"><p align="center" class="kno_01">酒精度（﹪） </p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top" bgcolor="#D5EAEE"><p class="kno_01">寡糖檸檬酒醋 </p></td>
                          <td width="120" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">0.5</p></td>
                          <td width="144" valign="top" bgcolor="#D5EAEE"><p class="kno_01">紅鶴酎 </p></td>
                          <td width="124" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">28.5</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top"><p class="kno_01">米酒水 </p></td>
                          <td width="120" valign="top"><p align="center" class="kno_01">1.0</p></td>
                          <td width="144" valign="top"><p class="kno_01">參茸酒 </p></td>
                          <td width="124" valign="top"><p align="center" class="kno_01">28.5</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top" bgcolor="#D5EAEE"><p class="kno_01">涼酒 </p></td>
                          <td width="120" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">3.0</p></td>
                          <td width="144" valign="top" bgcolor="#D5EAEE"><p class="kno_01">鹿茸酒 </p></td>
                          <td width="124" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">28.5</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top"><p class="kno_01">台灣啤酒 </p></td>
                          <td width="120" valign="top"><p align="center" class="kno_01">4.5</p></td>
                          <td width="144" valign="top"><p class="kno_01">米酒頭 </p></td>
                          <td width="124" valign="top"><p align="center" class="kno_01">34.0</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top" bgcolor="#D5EAEE"><p class="kno_01">台灣生啤酒 </p></td>
                          <td width="120" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">4.5</p></td>
                          <td width="144" valign="top" bgcolor="#D5EAEE"><p class="kno_01">蓮香酒 </p></td>
                          <td width="124" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">34.0</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top"><p class="kno_01">Woops巫普斯氣泡酒 </p></td>
                          <td width="120" valign="top"><p align="center" class="kno_01">5.0</p></td>
                          <td width="144" valign="top"><p class="kno_01">龍鳳酒 </p></td>
                          <td width="124" valign="top"><p align="center" class="kno_01">34.0</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top" bgcolor="#D5EAEE"><p class="kno_01">野櫻梅紅酒 </p></td>
                          <td width="120" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">6.0</p></td>
                          <td width="144" valign="top" bgcolor="#D5EAEE"><p class="kno_01">雙鹿五加啤酒 </p></td>
                          <td width="124" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">34.0</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top"><p class="kno_01">紅麴葡萄酒 </p></td>
                          <td width="120" valign="top"><p align="center" class="kno_01">8.5</p></td>
                          <td width="144" valign="top"><p class="kno_01">竹葉青酒 </p></td>
                          <td width="124" valign="top"><p align="center" class="kno_01">35.0</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top" bgcolor="#D5EAEE"><p class="kno_01">白葡萄酒 </p></td>
                          <td width="120" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">10.5</p></td>
                          <td width="144" valign="top" bgcolor="#D5EAEE"><p class="kno_01">38°特級高梁酒 </p></td>
                          <td width="124" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">38.0</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top"><p class="kno_01">玫瑰紅酒 </p></td>
                          <td width="120" valign="top"><p align="center" class="kno_01">10.5</p></td>
                          <td width="144" valign="top"><p class="kno_01">茉莉花酒 </p></td>
                          <td width="124" valign="top"><p align="center" class="kno_01">38.5</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top" bgcolor="#D5EAEE"><p class="kno_01">紅葡萄酒 </p></td>
                          <td width="120" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">10.5</p></td>
                          <td width="144" valign="top" bgcolor="#D5EAEE"><p class="kno_01">白蘭地 </p></td>
                          <td width="124" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">40.0</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top"><p class="kno_01">小米酒 </p></td>
                          <td width="120" valign="top"><p align="center" class="kno_01">12.0</p></td>
                          <td width="144" valign="top"><p class="kno_01">玉露酒 </p></td>
                          <td width="124" valign="top"><p align="center" class="kno_01">40.0</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top" bgcolor="#D5EAEE"><p class="kno_01">梅酒 </p></td>
                          <td width="120" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">13.0</p></td>
                          <td width="144" valign="top" bgcolor="#D5EAEE"><p class="kno_01">威士忌 </p></td>
                          <td width="124" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">40.0</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top"><p class="kno_01">烏梅酒 </p></td>
                          <td width="120" valign="top"><p align="center" class="kno_01">13.0</p></td>
                          <td width="144" valign="top"><p class="kno_01">蘭姆酒 </p></td>
                          <td width="124" valign="top"><p align="center" class="kno_01">40.0</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top" bgcolor="#D5EAEE"><p class="kno_01">荔枝酒 </p></td>
                          <td width="120" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">13.0</p></td>
                          <td width="144" valign="top" bgcolor="#D5EAEE"><p class="kno_01">伏特加酒 </p></td>
                          <td width="124" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">40.0</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top"><p class="kno_01">永康酒 </p></td>
                          <td width="120" valign="top"><p align="center" class="kno_01">14.0</p></td>
                          <td width="144" valign="top"><p class="kno_01">愛蘭白酒 </p></td>
                          <td width="124" valign="top"><p align="center" class="kno_01">40.0</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top" bgcolor="#D5EAEE"><p class="kno_01">清酒 </p></td>
                          <td width="120" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">15.0</p></td>
                          <td width="144" valign="top" bgcolor="#D5EAEE"><p class="kno_01">陳年高梁酒 </p></td>
                          <td width="124" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">40.0</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top"><p class="kno_01">紅露酒 </p></td>
                          <td width="120" valign="top"><p align="center" class="kno_01">15.0</p></td>
                          <td width="144" valign="top"><p class="kno_01">稻香40°料理米酒 </p></td>
                          <td width="124" valign="top"><p align="center" class="kno_01">40.0</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top" bgcolor="#D5EAEE"><p class="kno_01">紹興酒 </p></td>
                          <td width="120" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">15.0</p></td>
                          <td width="144" valign="top" bgcolor="#D5EAEE"><p class="kno_01">琴酒 </p></td>
                          <td width="124" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">42.0</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top"><p class="kno_01">黃酒 </p></td>
                          <td width="120" valign="top"><p align="center" class="kno_01">16.0</p></td>
                          <td width="144" valign="top"><p class="kno_01">大武醇 </p></td>
                          <td width="124" valign="top"><p align="center" class="kno_01">43.5</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top" bgcolor="#D5EAEE"><p class="kno_01">花雕酒 </p></td>
                          <td width="120" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">16.0</p></td>
                          <td width="144" valign="top" bgcolor="#D5EAEE"><p class="kno_01">高梁酒 </p></td>
                          <td width="124" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">43.5</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top"><p class="kno_01">陳年紹興酒 </p></td>
                          <td width="120" valign="top"><p align="center" class="kno_01">16.5</p></td>
                          <td width="144" valign="top"><p class="kno_01">紅高梁 </p></td>
                          <td width="124" valign="top"><p align="center" class="kno_01">52.0</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top" bgcolor="#D5EAEE"><p class="kno_01">玉台凍頂茗蘭地 </p></td>
                          <td width="120" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">18.0</p></td>
                          <td width="144" valign="top" bgcolor="#D5EAEE"><p class="kno_01">二鍋頭 </p></td>
                          <td width="124" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">54.0</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top"><p class="kno_01">金棗酒 </p></td>
                          <td width="120" valign="top"><p align="center" class="kno_01">19.0</p></td>
                          <td width="144" valign="top"><p class="kno_01">玉山茅台酒 </p></td>
                          <td width="124" valign="top"><p align="center" class="kno_01">54.0</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top" bgcolor="#D5EAEE"><p class="kno_01">何首烏酒 </p></td>
                          <td width="120" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">19.0</p></td>
                          <td width="144" valign="top" bgcolor="#D5EAEE"><p class="kno_01">玉山高梁酒 </p></td>
                          <td width="124" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">54.0</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top"><p class="kno_01">稻香20°料理米酒 </p></td>
                          <td width="120" valign="top"><p align="center" class="kno_01">19.5</p></td>
                          <td width="144" valign="top"><p class="kno_01">金高梁 </p></td>
                          <td width="124" valign="top"><p align="center" class="kno_01">58.0</p></td>
                        </tr>
                        <tr>
                          <td width="170" valign="top" bgcolor="#D5EAEE"><p class="kno_01">稻香紅標米酒 </p></td>
                          <td width="120" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">22.0</p></td>
                          <td width="144" valign="top" bgcolor="#D5EAEE"><p class="kno_01">稻香60°料理米酒 </p></td>
                          <td width="124" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">60.0</p></td>
                        </tr>
                                                                  </table>                      <p class="kno_01">資料來源：台灣菸酒股份有限公司http：//www.ttl.com.tw<br>
                    資料來源:臨床營養工作手冊</p></td>
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