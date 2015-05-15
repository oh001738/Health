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
		$nowL = array('首頁' => 'index.php', '健康知識' => 'knowledge.php', '食物代換表' => '');
		echo show_path_url($nowL);
		?>		</td>
	</tr>
	<tr>
		<td valign="top">
		  <table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
		    <!--DWLayoutTable-->
		    <tr>
		      <td width = '180' height="785" valign = 'top'>
                <?PHP include_once ROOT_PATH . "/leftmenu.php";?>			</td>
			  <td width = '16'>&nbsp;</td>
			  <td width = '757' align = 'center' valign = 'top'>
                <table id="___01" width="755" height="594" border="0" cellpadding="0" cellspacing="0">
                  <!--DWLayoutTable-->
                  <tr>
                    <td height="16" colspan="3" valign="top">
                    <img src="img/kno_f01.jpg" width="755" height="16" alt=""></td>
                    <td width="1"></td>
                  </tr>
                  <tr>
                    <td width="21" rowspan="2" valign="top">
                    <img src="img/kno_f02.jpg" width="21" height="554" alt=""><img src="img/kno_f02.jpg" width="21" height="191" alt=""></td>
                    <td width="713" height="31" valign="top"><img src="img/kno_a04.jpg" width="713" height="31" alt=""></td>
                    <td width="21" rowspan="2" valign="top">
                    <img src="img/kno_f05.jpg" width="21" height="554" alt=""><img src="img/kno_f05.jpg" width="21" height="191" alt=""></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td height="714" align="left" valign="top"><p class="kno_01"><br>食物代換表 </p>
                      <table border="0" cellspacing="0" cellpadding="0" width="548"><!--DWLayoutTable-->
                        <tr>
                          <td width="139" valign="top" bgcolor="#D5EAEE" class="kno_01"><div align="center">品  名 </div></td>
                          <td width="99" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">蛋白質 </p></td>
                          <td width="104" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">脂肪 </p></td>
                          <td width="113" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">碳水化合物 </p></td>
                          <td width="93" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">熱量 </p></td>
                        </tr>
                        <tr>
                          <td valign="top"><p align="center" class="kno_01">奶類(全脂)<br>
                            (低脂)<br>
                            (脫脂)</p></td>
                          <td valign="top"><p align="center" class="kno_01">8<br>
                            8<br>
                            8</p></td>
                          <td valign="top"><p align="center" class="kno_01">8<br>
                            4<br>
                            ＋ </p></td>
                          <td valign="top"><p align="center" class="kno_01">12<br>
                            12<br>
                            12</p></td>
                          <td valign="top"><p align="center" class="kno_01">150<br>
                            120<br>
                            80</p></td>
                        </tr>
                        <tr>
                          <td valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">蛋、豆、魚、肉類 <br>
                            (低脂)<br>
                            (中脂)<br>
                            (高脂)</p></td>
                          <td valign="top" bgcolor="#D5EAEE"><p align="center">&nbsp;</p>
                              <p align="center" class="kno_01">7<br>
                              7<br>
                              7</p></td>
                          <td valign="top" bgcolor="#D5EAEE"><p align="center">&nbsp;</p>
                              <p align="center" class="kno_01">3<br>
                              5<br>
                              10</p></td>
                          <td valign="top" bgcolor="#D5EAEE"><p align="center">&nbsp;</p>
                              <p align="center" class="kno_01">＋ <br>
                              ＋ <br>
                              ＋ </p></td>
                          <td valign="top" bgcolor="#D5EAEE"><p align="center">&nbsp;</p>
                              <p align="center" class="kno_01">55<br>
                              75<br>
                              120</p></td>
                        </tr>
                        <tr>
                          <td valign="top"><p align="center" class="kno_01">五穀根莖類 </p></td>
                          <td valign="top"><p align="center" class="kno_01">2</p></td>
                          <td valign="top"><p align="center" class="kno_01">＋ </p></td>
                          <td valign="top"><p align="center" class="kno_01">15</p></td>
                          <td valign="top"><p align="center" class="kno_01">70</p></td>
                        </tr>
                        <tr>
                          <td valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">蔬  菜  類 </p></td>
                          <td valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">1</p></td>
                          <td valign="top" bgcolor="#D5EAEE"><p align="center">&nbsp;</p></td>
                          <td valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">5</p></td>
                          <td valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">25</p></td>
                        </tr>
                        <tr>
                          <td valign="top"><p align="center" class="kno_01">水  果  類 </p></td>
                          <td valign="top"><p align="center" class="kno_01">＋ </p></td>
                          <td valign="top"><p align="center">&nbsp;</p></td>
                          <td valign="top"><p align="center" class="kno_01">15</p></td>
                          <td valign="top"><p align="center" class="kno_01">60</p></td>
                        </tr>
                        <tr>
                          <td valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">油  脂  類 </p></td>
                          <td valign="top" bgcolor="#D5EAEE"><p align="center">&nbsp;</p></td>
                          <td valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">5</p></td>
                          <td valign="top" bgcolor="#D5EAEE"><p align="center">&nbsp;</p></td>
                          <td valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">45</p></td>
                        </tr>
                                            </table>
                      <p class="kno_01">＋：表微量 <br>
                        (註)有關主食類部份，若採糖尿病、低蛋白飲食時，米食蛋白質含量以1.5公克 <br>
                        麵食蛋白質以2.5公克計。 </p>
                      <div align="center">
                        <table border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="632" valign="top" class="kno_01"><br>
                              稱量換算表： <br>
                              1杯＝16湯匙　　　　　　　　　1公斤＝2.2磅 <br>
                              1湯匙＝３茶匙＝15毫升　　　　1磅＝16盎司 <br>
                              1公斤＝1000公克　　　　　　　1磅＝454公克 <br>
                              1台斤(斤)＝600公克　　　　　　1盎司 ＝30公克 <br>
                              1市斤＝500公克　　　　　　　　1杯＝240公克(cc) </td>
                          </tr>
                        </table>
                      </div>
                      <span class="kno_01">資料來源:臨床營養工作手冊</span></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td height="23" colspan="3" valign="top"><img src="img/kno_f25.jpg" width="755" height="23" alt=""></td>
                    <td></td>
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