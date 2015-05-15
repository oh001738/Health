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
		$nowL = array('首頁' => 'index.php', '健康知識' => 'knowledge.php', '各種運動量消耗量表' => '');
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
                    <img src="img/kno_f02.jpg" width="21" height="554" alt=""><img src="img/kno_f02.jpg" width="21" height="322" alt=""></td>
                    <td width="713" height="31" valign="top"><img src="img/kno_a05.jpg" width="713" height="31" alt=""></td>
                    <td width="21" rowspan="2" valign="top">
                    <img src="img/kno_f05.jpg" width="21" height="554" alt=""><img src="img/kno_f05.jpg" width="21" height="322" alt=""></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td height="714" align="left" valign="top"><p class="kno_01"><br>（不包括基礎代謝及食物特殊動力作用） </p>
                      <table border="1" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="87" valign="top" bgcolor="#D5EAEE" class="kno_01"><div align="center">活動 </div></td>
                          <td width="167" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">大卡/公斤（體重）/小時 </p></td>
                          <td width="126" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">活動 </p></td>
                          <td width="178" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">大卡/公斤（體重）/小時 </p></td>
                        </tr>
                        <tr>
                          <td width="87" valign="top"><p align="center" class="kno_01">園藝 </p></td>
                          <td width="167" valign="top"><p align="center" class="kno_01">4.7</p></td>
                          <td width="126" valign="top"><p align="center" class="kno_01">游泳 </p></td>
                          <td width="178" valign="top"><p align="center">&nbsp;</p></td>
                        </tr>
                        <tr>
                          <td width="87" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">掃地 </p></td>
                          <td width="167" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">3.9</p></td>
                          <td width="126" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">隨意地 </p></td>
                          <td width="178" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">6.0</p></td>
                        </tr>
                        <tr>
                          <td width="87" valign="top"><p align="center" class="kno_01">拖地 </p></td>
                          <td width="167" valign="top"><p align="center" class="kno_01">4.9</p></td>
                          <td width="126" valign="top"><p align="center" class="kno_01">自由式 </p></td>
                          <td width="178" valign="top"><p align="center" class="kno_01">6.0-12.5</p></td>
                        </tr>
                        <tr>
                          <td width="87" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">打高爾夫球 </p></td>
                          <td width="167" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">3.7-5.0</p></td>
                          <td width="126" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">蝶式 </p></td>
                          <td width="178" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">14.0</p></td>
                        </tr>
                        <tr>
                          <td width="87" valign="top"><p align="center" class="kno_01">排球 </p></td>
                          <td width="167" valign="top"><p align="center" class="kno_01">3.5-8.0</p></td>
                          <td width="126" valign="top"><p align="center" class="kno_01">仰式 </p></td>
                          <td width="178" valign="top"><p align="center" class="kno_01">6.0-12.5</p></td>
                        </tr>
                        <tr>
                          <td width="87" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">棒球 </p></td>
                          <td width="167" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">4.7</p></td>
                          <td width="126" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">舞蹈 </p></td>
                          <td width="178" valign="top" bgcolor="#D5EAEE"><p align="center">&nbsp;</p></td>
                        </tr>
                        <tr>
                          <td width="87" valign="top"><p align="center" class="kno_01">乒乓球 </p></td>
                          <td width="167" valign="top"><p align="center" class="kno_01">4.9-7.0</p></td>
                          <td width="126" valign="top"><p align="center" class="kno_01">中度－激烈 </p></td>
                          <td width="178" valign="top"><p align="center" class="kno_01">4.2-5.7</p></td>
                        </tr>
                        <tr>
                          <td width="87" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">羽毛球 </p></td>
                          <td width="167" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">5.2-10.0</p></td>
                          <td width="126" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">華爾滋－倫巴 </p></td>
                          <td width="178" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">5.7-7.0</p></td>
                        </tr>
                        <tr>
                          <td width="87" valign="top"><p align="center" class="kno_01">籃球 </p></td>
                          <td width="167" valign="top"><p align="center" class="kno_01">6.0-9.0</p></td>
                          <td width="126" valign="top"><p align="center" class="kno_01">方塊舞 </p></td>
                          <td width="178" valign="top"><p align="center" class="kno_01">7.7</p></td>
                        </tr>
                        <tr>
                          <td width="87" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">網球 </p></td>
                          <td width="167" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">7.0-11.0</p></td>
                          <td width="126" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">走路 </p></td>
                          <td width="178" valign="top" bgcolor="#D5EAEE"><p align="center">&nbsp;</p></td>
                        </tr>
                        <tr>
                          <td width="87" valign="top"><p align="center" class="kno_01">足球 </p></td>
                          <td width="167" valign="top"><p align="center" class="kno_01">7.0-11.0</p></td>
                          <td width="126" valign="top"><p align="center" class="kno_01">室內漫步 </p></td>
                          <td width="178" valign="top"><p align="center" class="kno_01">3.1</p></td>
                        </tr>
                        <tr>
                          <td width="87" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">溜冰 </p></td>
                          <td width="167" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">5.0-15.0</p></td>
                          <td width="126" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">平路 </p></td>
                          <td width="178" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">5.6-7.0</p></td>
                        </tr>
                        <tr>
                          <td width="87" valign="top"><p align="center" class="kno_01">柔軟體操 </p></td>
                          <td width="167" valign="top"><p align="center" class="kno_01">5.0</p></td>
                          <td width="126" valign="top"><p align="center" class="kno_01">上坡 </p></td>
                          <td width="178" valign="top"><p align="center" class="kno_01">8.0-11.0-15.0</p></td>
                        </tr>
                        <tr>
                          <td width="87" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">跳繩 </p></td>
                          <td width="167" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">10.0-15.0</p></td>
                          <td width="126" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">下坡 </p></td>
                          <td width="178" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">3.6-3.5</p></td>
                        </tr>
                        <tr>
                          <td width="87" valign="top"><p align="center" class="kno_01">騎腳踏車8.8公里/小時 </p></td>
                          <td width="167" valign="top"><p align="center" class="kno_01">3.0</p></td>
                          <td width="126" valign="top"><p align="center" class="kno_01">（15-20度） </p></td>
                          <td width="178" valign="top"><p align="center" class="kno_01">3.7-4.3</p></td>
                        </tr>
                        <tr>
                          <td width="87" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">20.9公里/<br>小時 </p></td>
                          <td width="167" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">9.7</p></td>
                          <td width="126" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">爬山 </p></td>
                          <td width="178" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">10.0</p></td>
                        </tr>
                        <tr>
                          <td width="87" valign="top"><p align="center" class="kno_01">划船（賽舟） </p></td>
                          <td width="167" valign="top"><p align="center" class="kno_01">5.0-15.0</p></td>
                          <td width="126" valign="top"><p align="center" class="kno_01">跑步速度8公里/小時 </p></td>
                          <td width="178" valign="top"><p align="center" class="kno_01">10.0</p></td>
                        </tr>
                        <tr>
                          <td width="87" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">上樓梯 </p></td>
                          <td width="167" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">10.0-18.0</p></td>
                          <td width="126" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">12公里/小時 </p></td>
                          <td width="178" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">15.0</p></td>
                        </tr>
                        <tr>
                          <td width="87" valign="top"><p align="center" class="kno_01">下樓梯 </p></td>
                          <td width="167" valign="top"><p align="center" class="kno_01">7.1</p></td>
                          <td width="126" valign="top"><p align="center" class="kno_01">16公里/小時 <br>
                            20公里/小時 </p></td>
                          <td width="178" valign="top"><p align="center" class="kno_01">20.0<br>
                            25.0</p></td>
                        </tr>
                      </table>
                      <ol>
                        <li class="kno_01">資料來源：Sharkey B.J：Physiology of Fitness.Champaign IL,Human  Kinetics </li>
                      </ol>
                      <p class="kno_01">             Publishers（1979）.</p>
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
<table>
</body>
</html>