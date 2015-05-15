<?PHP
include_once 'config.php';

header_print(true);   //載入header檔
?>
<link href="css/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {color: #666666}
-->
</style>
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
		$nowL = array('首頁' => 'index.php', '健康知識' => 'knowledge.php', '營養素的功用及食物來源' => '');
		echo show_path_url($nowL);
		?>		</td>
	</tr>
	<tr>
		<td valign="top">
		  <table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
		    <!--DWLayoutTable-->
		    <tr>
		      <td width = '180' height="3124" valign = 'top'>
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
                    <td width="21" rowspan="3" valign="top">
                    <img src="img/kno_f02.jpg" width="21" height="554" alt=""><img src="img/kno_f02.jpg" width="21" height="554" alt=""><img src="img/kno_f02.jpg" width="21" height="554" alt=""><img src="img/kno_f02.jpg" width="21" height="554" alt=""><img src="img/kno_f02.jpg" width="21" height="554" alt=""><img src="img/kno_f02.jpg" width="21" height="554" alt=""></td>
                    <td width="713" height="31" valign="top"><img src="img/kno_a06.jpg" width="713" height="31" alt=""></td>
                    <td width="21" rowspan="3" valign="top">
                    <img src="img/kno_f05.jpg" width="21" height="554" alt=""><img src="img/kno_f05.jpg" width="21" height="554" alt=""><img src="img/kno_f05.jpg" width="21" height="554" alt=""><img src="img/kno_f05.jpg" width="21" height="554" alt=""><img src="img/kno_f05.jpg" width="21" height="554" alt=""><img src="img/kno_f05.jpg" width="21" height="554" alt=""></td>
                  </tr>
                  <tr>
                    <td height="3052" align="left" valign="top"><p class="kno_01">&nbsp;</p>
                      <table border="1" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">營養素分類 </p></td>
                          <td width="286" valign="top"><p align="center" class="kno_01">功用 </p></td>
                          <td width="186" valign="top"><p align="center" class="kno_01">食物來源 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">蛋白質 </p></td>
                          <td width="286" valign="top"><ol>
                            <li class="kno_01">維持人體生長發育，構成及修補細胞、組織之主要材料。 </li>
                            <li class="kno_01">調節生理機能 。 </li>
                            <li class="kno_01">供給熱能。 </li>
                          </ol></td>
                          <td width="186" valign="top"><p class="kno_01">奶類、肉類、蛋類、魚類、豆類及豆製品、內臟類、全榖類等。 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">脂肪 </p></td>
                          <td width="286" valign="top"><ol>
                            <li class="kno_01">供給熱能。 </li>
                            <li class="kno_01">幫助脂溶性維生素的吸收與利用。 </li>
                            <li class="kno_01">增加食物美味及飽腹感。 </li>
                          </ol></td>
                          <td width="186" valign="top"><p class="kno_01">玉米油、大豆油、花生油、豬油、牛油、奶油、人造奶油、麻油等。 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">醣類 </p></td>
                          <td width="286" valign="top"><ol>
                            <li class="kno_01">供給熱能。 </li>
                            <li class="kno_01">節省蛋白質的功能。 </li>
                            <li class="kno_01">幫助脂肪在體內代謝。 </li>
                            <li class="kno_01">形成人體內的物質。 </li>
                            <li class="kno_01">調節生理機能。 </li>
                          </ol></td>
                          <td width="186" valign="top"><p class="kno_01">米、飯、麵條、饅頭、玉米、馬鈴薯、蕃薯、芋頭、樹薯粉、甘蔗、蜂蜜、果醬等。 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">礦物質 <br>
                              <br>
                          </p></td>
                          <td width="286" valign="top"><p class="kno_01">營養上之主要礦物質有鈣、磷、鐵、銅、鉀、鈉、氟、碘、氯、硫、鎂、錳、鈷等，這些礦物質也就是食物燒成灰石的殘餘部分，又稱灰分。其在營養素裡所佔的份量雖很少，（醣類、脂肪、蛋白質、水和其他有關物質，佔人體體重96%，礦物質佔%4），但其重要性卻很大。 <br>
                            礦物質的一般功用： </p>
                              <ol>
                                <li class="kno_01">構成身體細胞的原料：如構成骨骼、牙齒、肌肉、血球、神經之主要成分。 </li>
                                <li class="kno_01">調節生理機能: 如維持體液酸鹼平衡，調節滲透壓，心臟肌肉收縮，神經傳導等機能。 </li>
                              </ol>
                            <p class="kno_01">茲將各種礦物質的營養功用及食物來源分述如下： </p></td>
                          <td width="186" valign="top"><p>&nbsp;</p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">鈣 </p></td>
                          <td width="286" valign="top"><p class="kno_01">j構成骨骼和牙齒的主要成分。<br>
                            k調節心跳及肌肉的收縮。<br>
                            l使血液有凝結力。<br>
                            m維持正常神經的感應性。<br>
                            n活化酵素。 </p></td>
                          <td width="186" valign="top"><p class="kno_01">奶類、魚類（連骨進食）、蛋類、深綠色蔬菜、豆類及豆類製品。 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">磷 </p></td>
                          <td width="286" valign="top"><p class="kno_01">構成骨骼和牙齒的要素。<br>
                            促進脂肪與醣類的新陳代謝。 <br>
                            體內的磷酸鹽具有緩衝作用，故能維持血液、體液的酸鹼平衡。<br>
                            是組織細胞核蛋白質的主要物質。 </p></td>
                          <td width="186" valign="top"><p class="kno_01">家禽類、魚類、肉類、全榖類、乾果、牛奶、莢豆等。 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">鐵 </p></td>
                          <td width="286" valign="top"><p class="kno_01">組成血紅素的主要元素。<br>
                            是體內部分酵素的組成元素。 </p></td>
                          <td width="186" valign="top"><p class="kno_01">肝及內臟類、蛋黃、牛奶、瘦肉、貝類、海藻類、豆類、全榖類、葡萄乾、綠葉蔬菜等。 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">鉀鈉氯 </p></td>
                          <td width="286" valign="top"><p class="kno_01">為細胞內、外液之重要陽離子，可維持體內水分之平衡集體液之滲透壓。<br>
                            保持pH值不變，使動物體內之血液、乳液及內分泌等之pH值保持常數。<br>
                            調節神經與肌肉的刺激感受性。<br>
                            鉀、鈉、氯三元素缺乏任何一種時，可使人生長停滯。 </p></td>
                          <td width="186" valign="top"><p class="kno_01">鉀--瘦肉、內臟、五穀類<br>
                            鈉--奶類、蛋類、肉類<br>
                            氯--奶類、蛋類、肉類 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">氟 </p></td>
                          <td width="286" valign="top"><p class="kno_01">構成骨骼和牙齒之一種重要成分。 </p></td>
                          <td width="186" valign="top"><p class="kno_01">海產類、骨質食物、菠菜 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">碘 </p></td>
                          <td width="286" valign="top"><p class="kno_01">甲狀腺球蛋白的主要成分，以調節能量之新陳代謝。 </p></td>
                          <td width="186" valign="top"><p class="kno_01">海產類、肉類、蛋、奶類、五穀類、綠葉蔬菜 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">銅 </p></td>
                          <td width="286" valign="top"><p class="kno_01">銅與血紅素之造成有關可幫助鐵質之運用。 </p></td>
                          <td width="186" valign="top"><p class="kno_01">肝臟、蚌肉、瘦肉、堅果類 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">鎂 </p></td>
                          <td width="286" valign="top"><p class="kno_01">構成骨骼之主要成分。<br>
                            調節生理機能，並為組成幾種肌肉酵素的成分。 </p></td>
                          <td width="186" valign="top"><p class="kno_01">五穀類、堅果類、瘦肉、奶類、豆莢、綠葉蔬菜 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">硫 </p></td>
                          <td width="286" valign="top"><p class="kno_01">與蛋白質之代謝作用有關，為構成毛髮、軟骨、（肌腱）、胰島素等之必需成分。 </p></td>
                          <td width="186" valign="top"><p class="kno_01">蛋類、奶類、瘦肉類、豆莢類、堅果類 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">鈷 </p></td>
                          <td width="286" valign="top"><p class="kno_01">是維生素B12的一種成分，也是造成紅血球的一種必要營養素。 </p></td>
                          <td width="186" valign="top"><p class="kno_01">綠葉蔬菜（變化大，視土壤中鈷含量而定） </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">錳 </p></td>
                          <td width="286" valign="top"><p class="kno_01">對內分泌的活動，酵素的運用及磷酸鈣的新陳代謝有幫助。 </p></td>
                          <td width="186" valign="top"><p class="kno_01">小麥、糠皮、堅果、豆莢類、萵苣、鳳梨 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">維生素 <br>
                          </p></td>
                          <td width="286" valign="top"><p class="kno_01">維生素又稱維他命，其中能溶解於脂肪者稱脂溶性維生素，能溶解於水者稱水溶性維生素。大多數不能從身體中製造，而必需從食物中攝取，其在身體中的作用，就好像機械中的潤滑油，茲將其功用及食物來源分述如下： </p></td>
                          <td width="186" valign="top"><p>&nbsp;</p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p class="kno_01">脂溶性維生素 </p></td>
                          <td width="286" valign="top"><p>&nbsp;</p></td>
                          <td width="186" valign="top"><p>&nbsp;</p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">維生素A </p></td>
                          <td width="286" valign="top"><p class="kno_01">使眼睛適應光線之變化，維持在黑暗光線下的正常視力。<br>
                            保護表皮、黏膜使細菌不易侵害（增加抵抗傳染病的能力）。<br>
                            促進牙齒和骨骼的正常生長。 </p></td>
                          <td width="186" valign="top"><p class="kno_01">肝、蛋黃、牛奶、牛油、人造奶油、黃綠色蔬菜及水果（如清江白菜、胡蘿蔔、菠菜、蕃茄、黃紅心蕃薯、木瓜、芒果等）、魚肝油 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">維生素D </p></td>
                          <td width="286" valign="top"><p class="kno_01">協助鈣、磷的吸收與運用。<br>
                            幫助骨骼和牙齒的正常發育。<br>
                            為神經、肌肉正常生理上所必須。 </p></td>
                          <td width="186" valign="top"><p class="kno_01">魚肝油、蛋黃、牛油、魚類、肝、添加維生素D之鮮奶等。 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">維生素E </p></td>
                          <td width="286" valign="top"><p class="kno_01">減少維生素A及多元不飽和脂肪酸的氧化，控制細胞氧化。<br>
                            維持動物生殖機能。 </p></td>
                          <td width="186" valign="top"><p class="kno_01">榖類、米糠油、小麥胚芽油、棉子油、綠葉蔬菜、蛋黃、堅果類。 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">維生素K </p></td>
                          <td width="286" valign="top"><p class="kno_01">構成凝血脢元所必需的一種物質，可促進血液在傷口凝固，以免流血不止。 </p></td>
                          <td width="186" valign="top"><p class="kno_01">綠葉蔬菜如菠菜、萵苣是維生素K最好的來源，蛋黃、肝臟亦含有少量。 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p class="kno_01">水溶性維生素 </p></td>
                          <td width="286" valign="top"><p>&nbsp;</p></td>
                          <td width="186" valign="top"><p>&nbsp;</p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">維生素B1 </p></td>
                          <td width="286" valign="top"><p class="kno_01">增加食慾。<br>
                            促進胃腸蠕動及消化液的分泌。<br>
                            預防及治療腳氣病神經炎。<br>
                            促進動物生長。<br>
                            能量代謝的重要輔脢。 </p></td>
                          <td width="186" valign="top"><p class="kno_01">胚芽米、麥芽、米糠、肝、瘦肉、酵母、豆類、蛋黃、魚卵、蔬菜等。 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">維生素B2 </p></td>
                          <td width="286" valign="top"><p class="kno_01">輔助細胞的氧化還原作用。<br>
                            防治眼血管沖血及嘴角裂痛。 </p></td>
                          <td width="186" valign="top"><p class="kno_01">酵母、內臟類、牛奶、蛋類、花生、豆類、綠葉菜、瘦肉等。 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">維生素B6 </p></td>
                          <td width="286" valign="top"><p class="kno_01">為一種輔脢，幫助胺基酸之合成與分解。<br>
                            幫助色胺酸變成菸鹼酸。 </p></td>
                          <td width="186" valign="top"><p class="kno_01">肉類、魚類、蔬菜類、酵母、麥芽、肝、腎、糙米、蛋、牛奶、豆類、花生等。 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">維生素B12 </p></td>
                          <td width="286" valign="top"><p class="kno_01">促進核酸之合成。<br>
                            對醣類和脂肪代謝有重要功用，病影響血液中麩基胺硫的濃度。<br>
                            治惡性貧血及惡性貧血神經系統的病症。 </p></td>
                          <td width="186" valign="top"><p class="kno_01">肝、腎、瘦肉、乳、乳酪、蛋等。 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">菸鹼酸 </p></td>
                          <td width="286" valign="top"><p class="kno_01">構成醣類分解過程中二種輔脢的主要成分，此輔脢主要作用為輸送氫。<br>
                            使皮膚健康，也有益於神經系統的健康。 </p></td>
                          <td width="186" valign="top"><p class="kno_01">肝、酵母、糙米、全榖製品、瘦肉、蛋、魚類、乾豆類、綠葉蔬菜、牛奶等。 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">葉酸 </p></td>
                          <td width="286" valign="top"><p class="kno_01">幫助血液的形成，可防治惡性貧血症。<br>
                            促成核酸及核蛋白合成。 </p></td>
                          <td width="186" valign="top"><p class="kno_01">新鮮的綠色蔬菜、肝、腎、瘦肉等。 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">維生素C </p></td>
                          <td width="286" valign="top"><p class="kno_01">細胞間質的主要構成物質，使細胞間保持良好狀況。<br>
                            加速傷口之癒合。 <br>
                            增加對傳染病的抵抗力。 </p></td>
                          <td width="186" valign="top"><p class="kno_01">深綠及黃紅色蔬菜、水果（如青辣椒、蕃石榴、柑橘類、蕃茄、檸檬等）。 </p></td>
                        </tr>
                        <tr>
                          <td width="86" valign="top"><p align="center" class="kno_01">水 </p></td>
                          <td width="286" valign="top"><p class="kno_01">人體的基本組成，為生長之基本物質與身體修護之用。<br>
                            促進食物消化和吸收作用。<br>
                            維持正常循環作用及排泄作用。<br>
                            調節體溫。<br>
                            滋潤各組織的表面，可減少器官間的摩擦    。<br>
                            幫助維持體內電解質的平衡。 </p></td>
                          <td width="186" valign="top"><p>&nbsp;</p></td>
                        </tr>
                                                                  </table>
                    <p>&nbsp;</p>                      <p class="kno_01">資料來源:臨床營養工作手冊</p></td>
                  </tr>
                  <tr>
                    <td height="1"></td>
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
<table>
</body>
</html>