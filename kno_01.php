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
		<td width="1005">
		<div class = 'fast_link'>
		<?PHP
		$nowL = array('首頁' => 'index.php', '健康知識' => 'knowledge.php', '國民飲食指標' => '');
		echo show_path_url($nowL);
		?>		</td>
	</tr>
	<tr>
		<td height="2810" valign="top">
		  <table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
		    <!--DWLayoutTable-->
		    <tr>
		      <td width = '180' height="3597" valign = 'top'>
	            <?PHP include_once ROOT_PATH . "/leftmenu.php";?>			</td>
			  <td width = '12'>&nbsp;</td>
              <td width = '761' align = 'center' valign = 'top'>
                <table id="___01" width="755" height="594" border="0" cellpadding="0" cellspacing="0">
                  <!--DWLayoutTable-->
                  <tr>
                    <td height="16" colspan="3" valign="top">
                    <img src="img/kno_f01.jpg" width="755" height="16" alt=""></td>
                    <td width="1"></td>
                  </tr>
                  <tr>
                    <td width="21" rowspan="2" valign="top">
                    <img src="img/kno_f02.jpg" width="21" height="554" alt=""><img src="img/kno_f02.jpg" width="21" height="554" alt=""><img src="img/kno_f02.jpg" width="21" height="554" alt=""><img src="img/kno_f02.jpg" width="21" height="554" alt=""><img src="img/kno_f02.jpg" width="21" height="554" alt=""><img src="img/kno_f02.jpg" width="21" height="554" alt=""><img src="img/kno_f02.jpg" width="21" height="233" alt=""></td>
                    <td width="713" height="31" valign="top"><img src="img/kno_a03.jpg" width="713" height="31" alt=""></td>
                    <td width="21" rowspan="2" valign="top">
                    <img src="img/kno_f05.jpg" width="21" height="554" alt=""><img src="img/kno_f05.jpg" width="21" height="554" alt=""><img src="img/kno_f05.jpg" width="21" height="554" alt=""><img src="img/kno_f05.jpg" width="21" height="554" alt=""><img src="img/kno_f05.jpg" width="21" height="554" alt=""><img src="img/kno_f05.jpg" width="21" height="554" alt=""><img src="img/kno_f05.jpg" width="21" height="233" alt=""></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td height="2739" align="left" valign="top"><p><strong class="kno_tittle02">【國民飲食指標】</strong><br>
                          <span class="kno_tittle01"><strong>◎維持理想體重 </strong></span><span class="kno_01"><br>
                          　　體重與健有密切的關係，體重過重容易引起糖尿病、高血壓和心血管疾病等慢性病；體重過輕會使抵抗力降低，容易感染疾病。維持理想體重是維護身體健康的基礎，個人的理想體重請參閱附表。 <br>
                          　　維持理想體重從小應該開始，建立良好的飲食習慣及有恆的運動是最佳的途徑。 <br>
                          </span><span class="kno_tittle01">◎均衡攝食各類食物</span><span class="kno_01"> <br>
                          　　沒有一種食物含有人體需要的所有營養素，  為了使身體能夠充分獲得各種營養素，必須均衡攝 食各類食物，不可偏食。 <br>
                          　　每天都應攝取五穀根莖類、奶類、蛋豆魚肉  類、蔬菜類、水果類及油脂類的食物。食物的選用，以多選用新鮮食物為原則。 <br>
                          <strong class="kno_tittle01">◎三餐以五穀為主食 </strong><br>
                          　　米、麵等穀類食品含有豐富澱粉及多種必需營養素，是人體最理想的熱量  來源，應作為三餐的主食。 <br>
                          為避免由飲食中食入過多的油脂，應維持國人以穀類為主食之傳統飲食習慣。 <br>
                          <strong class="kno_tittle01">◎儘量選用高纖維的食物 </strong><br>
                          　　含有豐富纖維質的食物可預防及改善便秘，並且可以減少患大腸癌的機率；亦可降低血膽固醇，有助於預防心血管疾病。食用植物性食物是獲得纖維素  的最佳方法，含豐富纖維質的食物有：豆類、蔬菜類、水果類及糙米、全麥製品、 蕃薯等全穀根莖類。 <br>
                          <strong class="kno_tittle01">◎少油、少鹽、少糖的飲食原則 </strong><br>
                          　　高脂肪飲食與肥胖、脂肪肝、  心血管疾病及某 些癌症有密切的關係。飽和脂肪及膽固醇含量高的飲食 更是造成心血管疾病的主要因素之一。 <br>
                          　　平時應少吃肥肉、五花肉、肉燥、香腸、核果類、  油酥類點心及高油脂零食等脂肪含量高的食物，日常也 應少吃內臟和蛋黃、魚卵等膽固醇含量高的食物。烹調 時應儘量少用油，且多用蒸、煮、煎、炒代替油炸的方式可減少油脂的用量。 <br>
                          　　食鹽的主要成分是鈉，經常攝取高鈉食物容易患高血壓。烹調應少用鹽及  含有高量食鹽或鈉的調味品，如：味精、醬油及各式調味醬；並少吃醃漬品及調 味濃重的零食或加工食品。 <br>
                          　　糖除了提供熱量外幾乎不含其他營養素，又易引起蛀牙及肥胖，應儘量減  少食用。通常中西式糕餅不僅多糖也多油，更應節制食用。 <br>
                          <strong class="kno_tittle01">◎多攝取鈣質豐富的食物 </strong><br>
                          　　鈣是構成骨骼及牙齒的主要成分，攝取足夠的鈣質，可促進正常的生長發育，並預防骨質疏鬆症。國人的飲食習慣，鈣質攝取量較不足，宜多攝取鈣質豐富的食物。 <br>
                          　　牛奶含豐富的鈣質，且最易被人體吸收，每天至少飲用一至二杯。其它含  鈣質較多的食物有奶製品、小魚乾、豆製品和深綠色蔬菜等。 <br>
                          <strong class="kno_tittle01">◎多喝白開水 </strong><br>
                          　　水是維持生命的必要物質，可以調節體溫、幫助消  化吸收、運送養分、預防及改善便秘等。每天應攝取約六至八杯的水。 <br>
                          　　白開水是人體最健康、最經濟的水分來源，應養成  喝白開水的習慣。市售飲料常含高糖分，經常飲用不利於 理想體重及血脂肪的控制。 <br>
                          <strong class="kno_tittle01">◎飲酒要節制 </strong><br>
                          　　如果飲酒，應加節制。 <br>
                          　　飲酒過量會影響各種營養素的吸收及利用，容易造成  營養不良及肝臟疾病，也會影響思考判斷力，引起意外事 件。懷孕期間飲酒，容易產生畸形及體重不足的嬰兒。 <br>
                          <strong class="kno_tittle01">◎成年人之理想體重範圍 </strong></span></p>
                    <table border="1" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="110" valign="top"  bgcolor="#D5EAEE"　class="kno_01">身高(公分)</td>
                          <td width="169" valign="top" bgcolor="#D5EAEE"><p class="kno_01">理想體重範圍(公斤)</p></td>
                          <td width="107" valign="top" bgcolor="#D5EAEE"><p class="kno_01">身高(公分)</p></td>
                          <td width="172" valign="top" bgcolor="#D5EAEE"><p class="kno_01">理想體重範圍(公斤)</p></td>
                        </tr>
                        <tr>
                          <td width="110" valign="top"><p align="center" class="kno_01">145</p></td>
                          <td width="169" valign="top"><p align="center" class="kno_01">39.0~50.5</p></td>
                          <td width="107" valign="top"><p align="center" class="kno_01">166</p></td>
                          <td width="172" valign="top"><p align="center" class="kno_01">51.0~66.0</p></td>
                        </tr>
                        <tr>
                          <td width="110" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">146</p></td>
                          <td width="169" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">39.0~51.0</p></td>
                          <td width="107" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">167</p></td>
                          <td width="172" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">51.5~67.0</p></td>
                        </tr>
                        <tr>
                          <td width="110" valign="top"><p align="center" class="kno_01">147</p></td>
                          <td width="169" valign="top"><p align="center" class="kno_01">40.0~52.0</p></td>
                          <td width="107" valign="top"><p align="center" class="kno_01">168</p></td>
                          <td width="172" valign="top"><p align="center" class="kno_01">52.0~68.0</p></td>
                        </tr>
                        <tr>
                          <td width="110" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">148</p></td>
                          <td width="169" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">40.5~52.5</p></td>
                          <td width="107" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">169</p></td>
                          <td width="172" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">53.0~68.5</p></td>
                        </tr>
                        <tr>
                          <td width="110" valign="top"><p align="center" class="kno_01">149</p></td>
                          <td width="169" valign="top"><p align="center" class="kno_01">41.0~53.0</p></td>
                          <td width="107" valign="top"><p align="center" class="kno_01">170</p></td>
                          <td width="172" valign="top"><p align="center" class="kno_01">53.5~69.0</p></td>
                        </tr>
                        <tr>
                          <td width="110" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">150</p></td>
                          <td width="169" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">41.5~54.0</p></td>
                          <td width="107" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">171</p></td>
                          <td width="172" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">54.0~70.0</p></td>
                        </tr>
                        <tr>
                          <td width="110" valign="top"><p align="center" class="kno_01">151</p></td>
                          <td width="169" valign="top"><p align="center" class="kno_01">42.0~55.0</p></td>
                          <td width="107" valign="top"><p align="center" class="kno_01">172</p></td>
                          <td width="172" valign="top"><p align="center" class="kno_01">54.5~71.0</p></td>
                        </tr>
                        <tr>
                          <td width="110" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">152</p></td>
                          <td width="169" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">42.5~55.5</p></td>
                          <td width="107" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">173</p></td>
                          <td width="172" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">55.0~72.0</p></td>
                        </tr>
                        <tr>
                          <td width="110" valign="top"><p align="center" class="kno_01">153</p></td>
                          <td width="169" valign="top"><p align="center" class="kno_01">43.0~56.0</p></td>
                          <td width="107" valign="top"><p align="center" class="kno_01">174</p></td>
                          <td width="172" valign="top"><p align="center" class="kno_01">56.0~72.5</p></td>
                        </tr>
                        <tr>
                          <td width="110" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">154</p></td>
                          <td width="169" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">43.5~57.0</p></td>
                          <td width="107" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">175</p></td>
                          <td width="172" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">56.5~73.5</p></td>
                        </tr>
                        <tr>
                          <td width="110" valign="top"><p align="center" class="kno_01">156</p></td>
                          <td width="169" valign="top"><p align="center" class="kno_01">45.0~58.0</p></td>
                          <td width="107" valign="top"><p align="center" class="kno_01">176</p></td>
                          <td width="172" valign="top"><p align="center" class="kno_01">57.0~74.0</p></td>
                        </tr>
                        <tr>
                          <td width="110" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">157</p></td>
                          <td width="169" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">45.5~59.0</p></td>
                          <td width="107" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">178</p></td>
                          <td width="172" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">58.5~76.0</p></td>
                        </tr>
                        <tr>
                          <td width="110" valign="top"><p align="center" class="kno_01">158</p></td>
                          <td width="169" valign="top"><p align="center" class="kno_01">46.0~60.0</p></td>
                          <td width="107" valign="top"><p align="center" class="kno_01">179</p></td>
                          <td width="172" valign="top"><p align="center" class="kno_01">59.0~77.0</p></td>
                        </tr>
                        <tr>
                          <td width="110" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">159</p></td>
                          <td width="169" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">46.5~60.5</p></td>
                          <td width="107" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">180</p></td>
                          <td width="172" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">60.0~77.5</p></td>
                        </tr>
                        <tr>
                          <td width="110" valign="top"><p align="center" class="kno_01">160</p></td>
                          <td width="169" valign="top"><p align="center" class="kno_01">47.0~61.5</p></td>
                          <td width="107" valign="top"><p align="center" class="kno_01">181</p></td>
                          <td width="172" valign="top"><p align="center" class="kno_01">60.5~78.5</p></td>
                        </tr>
                        <tr>
                          <td width="110" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">161</p></td>
                          <td width="169" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">48.0~62.0</p></td>
                          <td width="107" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">182</p></td>
                          <td width="172" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">61.0~79.5</p></td>
                        </tr>
                        <tr>
                          <td width="110" valign="top"><p align="center" class="kno_01">162</p></td>
                          <td width="169" valign="top"><p align="center" class="kno_01">48.5~63.0</p></td>
                          <td width="107" valign="top"><p align="center" class="kno_01">183</p></td>
                          <td width="172" valign="top"><p align="center" class="kno_01">62.0~80.0</p></td>
                        </tr>
                        <tr>
                          <td width="110" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">163</p></td>
                          <td width="169" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">49.0~64.0</p></td>
                          <td width="107" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">184</p></td>
                          <td width="172" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">62.5~81.0</p></td>
                        </tr>
                        <tr>
                          <td width="110" valign="top"><p align="center" class="kno_01">164</p></td>
                          <td width="169" valign="top"><p align="center" class="kno_01">49.5~64.5</p></td>
                          <td width="107" valign="top"><p align="center" class="kno_01">185</p></td>
                          <td width="172" valign="top"><p align="center" class="kno_01">63.0~82.0</p></td>
                        </tr>
                        <tr>
                          <td width="110" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">165</p></td>
                          <td width="169" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">50.0~65.0</p></td>
                          <td width="107" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">186</p></td>
                          <td width="172" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">64.0~83.0</p></td>
                        </tr>
                      </table>
                      <p class="kno_01">備註： </p>
                      <ol>
                        <li class="kno_01">BMI(Body Mass Index，身體質量指數)＝體重(公斤)/身高2(公尺) 2。 </li>
                        <li class="kno_01">理想體重範圍為BMI＝18.5－24</li>
                      </ol>
                      <p class="kno_tittle02"><strong>【成人均衡飲食建議量】(每日飲食指南)</strong></p>
                      <table border="1" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="568" colspan="3" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">每日飲食指南 </p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top"><table border="0" cellspacing="0" cellpadding="0" width="46%">
                              <tr>
                                <td><p class="kno_01">類別 </p></td>
                              </tr>
                          </table></td>
                          <td width="101" valign="top"><p class="kno_01">份量 </p></td>
                          <td width="356" valign="top"><table border="0" cellspacing="0" cellpadding="0" width="100%">
                              <tr>
                                <td><p class="kno_01">份量 </p></td>
                                <td><p>&nbsp;</p></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">五榖根莖類 </p></td>
                          <td width="101" valign="top" bgcolor="#D5EAEE"><p class="kno_01">3~6碗 </p></td>
                          <td width="356" valign="top" bgcolor="#D5EAEE"><p class="kno_01">每碗：飯一碗（200公克）<br>
                            或中型鰻頭一個<br>
                            或吐司麵包四片 </p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top"><p class="kno_01">奶類 </p></td>
                          <td width="101" valign="top"><p class="kno_01">1~2杯 </p></td>
                          <td width="356" valign="top"><p class="kno_01">每杯：牛奶一杯（240c.c.）<br>
                            發酵乳一杯（240c.c.)<br>
                            乳酪一片（約30公克） </p></td>
                        </tr>
                        <tr>
                          <td width="111" bgcolor="#D5EAEE"><p class="kno_01">蛋豆魚類 </p></td>
                          <td width="101" valign="top" bgcolor="#D5EAEE"><p class="kno_01">4份 </p></td>
                          <td width="356" valign="top" bgcolor="#D5EAEE"><p class="kno_01">每份：肉或家禽或魚類一兩（約30公克）<br>
                            或豆腐一塊（100公克）；<br>
                            或豆漿一杯（240c.c.）或蛋一個 </p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top"><p class="kno_01">蔬菜類 </p></td>
                          <td width="101" valign="top"><p class="kno_01">3碟 </p></td>
                          <td width="356" valign="top"><p class="kno_01">每碟：蔬菜三兩（約100公克） </p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">水果類 </p></td>
                          <td width="101" valign="top" bgcolor="#D5EAEE"><p class="kno_01">2個 </p></td>
                          <td width="356" valign="top" bgcolor="#D5EAEE"><p class="kno_01">每個：中型橘子一個（100公克）<br>
                            或番石榴一個 </p></td>
                        </tr>
                        <tr>
                          <td width="111"><p class="kno_01">油脂類 </p></td>
                          <td width="101"><p class="kno_01">2~3湯匙 </p></td>
                          <td width="356" valign="top"><p class="kno_01">每湯匙：一湯匙油（15公克） </p></td>
                        </tr>
                      </table>
                      <ol>
                        <li class="kno_01">「成人均衡飲食攝取量」適用於一般健康的成年人，但因個人體型及活動量  不同可依個人需要適度增減五穀根莖類的攝取量。</li>
                        <li class="kno_01">每類實務的選擇時常變換，不宜每餐均吃同一種食物。烹調用油最好採用植物性油，並須注意用量。蔬菜類中至少一碟為深綠色或深黃色蔬菜。</li>
                        <li class="kno_01">青少年、老年人及孕乳婦由於生理狀況較為特殊，可依本飲食指南做使少許改變： </li>
                      </ol>
                      <p class="kno_01">　　青少年－增加五穀根莖類、奶類及蛋、豆、魚、肉類的攝取量，尤應增加一個蛋或一杯牛奶 <br>
                        　　老年人－可適量減少油脂類及五穀根莖類的攝取。 <br>
                        　　孕乳婦－六大類食物均應酌量增加，為避免骨質疏鬆症，最好每日能增加一 至二杯牛奶；必要時，可以低脂奶代替，以降低熱量的攝取量。 </p>
                      <p align="center" class="kno_01">每100公克食物所含熱量與營養素的含量比較 </p>
                      <table border="1" cellspacing="0" cellpadding="0" width="690">
                        <tr>
                          <td width="85" align="center" valign="middle"  bgcolor="#D5EAEE" class="kno_01">食物 </td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">熱量 <br>
                            （卡路里） </p></td>
                          <td width="76" valign="top"  bgcolor="#D5EAEE"><p align="center" class="kno_01">蛋白質 </p></td>
                          <td width="76" valign="top"  bgcolor="#D5EAEE"><p align="center" class="kno_01">脂肪 </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">鈣質 </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">鐵質 </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">維生素A</p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">維生素B群 </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">維生素C</p></td>
                        </tr>
                        <tr>
                          <td width="85" valign="top"><p class="kno_01">五穀根莖類 </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋＋＋＋ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">○ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋ </p></td>
                        </tr>
                        <tr>
                          <td width="85" valign="top" bgcolor="#D5EAEE"><p class="kno_01">汽水 <br>
                            可樂 </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">○ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">○ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">○ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">○ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">○ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">○ </p></td>
                        </tr>
                        <tr>
                          <td width="85" valign="top"><p class="kno_01">後腿瘦肉 </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋＋＋ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋＋＋＋ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋＋＋ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋＋＋ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">－ </p></td>
                        </tr>
                        <tr>
                          <td width="85" valign="top" bgcolor="#D5EAEE"><p class="kno_01">魚 </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋＋＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋＋＋＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋＋＋＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">○ </p></td>
                        </tr>
                        <tr>
                          <td width="85" valign="top"><p class="kno_01">蛋 </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋＋＋ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋＋＋ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋＋＋＋ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋＋＋ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋＋ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋＋ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">○ </p></td>
                        </tr>
                        <tr>
                          <td width="85" valign="top" bgcolor="#D5EAEE"><p class="kno_01">全脂奶 </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋＋＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋＋＋＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">○ </p></td>
                        </tr>
                        <tr>
                          <td width="85" valign="top"><p class="kno_01">豬肝 </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋＋＋ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋＋＋＋ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋＋ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋＋＋＋ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋＋＋＋ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋＋＋＋ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋＋＋＋ </p></td>
                        </tr>
                        <tr>
                          <td width="85" valign="top" bgcolor="#D5EAEE"><p class="kno_01">豆腐 </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋＋＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋＋＋＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">○ </p></td>
                        </tr>
                        <tr>
                          <td width="85" valign="top"><p class="kno_01">深綠色 <br>
                            深黃紅色 <br>
                            蔬菜 </p></td>
                          <td width="76" valign="top"><p align="center">&nbsp;</p>
                              <p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top"><p align="center">&nbsp;</p>
                              <p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top"><p align="center">&nbsp;</p>
                              <p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top"><p align="center">&nbsp;</p>
                              <p align="center" class="kno_01">＋＋＋＋ </p></td>
                          <td width="76" valign="top"><p align="center">&nbsp;</p>
                              <p align="center" class="kno_01">＋ </p></td>
                          <td width="76" valign="top"><p align="center">&nbsp;</p>
                              <p align="center" class="kno_01">＋＋＋ </p></td>
                          <td width="76" valign="top"><p align="center">&nbsp;</p>
                              <p align="center" class="kno_01">＋＋ </p></td>
                          <td width="76" valign="top"><p align="center">&nbsp;</p>
                              <p align="center" class="kno_01">＋＋ </p></td>
                        </tr>
                        <tr>
                          <td width="85" valign="top" bgcolor="#D5EAEE"><p class="kno_01">淺綠色蔬菜 </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋＋＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋＋ </p></td>
                        </tr>
                        <tr>
                          <td width="85" valign="top"><p class="kno_01">深黃色水果 <br>
                            如：木瓜、芒果 </p></td>
                          <td width="76" valign="top"><p align="center">&nbsp;</p>
                              <p align="center" class="kno_01">＋ </p></td>
                          <td width="76" valign="top"><p align="center">&nbsp;</p>
                              <p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top"><p align="center">&nbsp;</p>
                              <p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top"><p align="center">&nbsp;</p>
                              <p align="center" class="kno_01">＋＋ </p></td>
                          <td width="76" valign="top"><p align="center">&nbsp;</p>
                              <p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top"><p align="center">&nbsp;</p>
                              <p align="center" class="kno_01">＋＋＋ </p></td>
                          <td width="76" valign="top"><p align="center">&nbsp;</p>
                              <p align="center" class="kno_01">＋＋ </p></td>
                          <td width="76" valign="top"><p align="center">&nbsp;</p>
                              <p align="center" class="kno_01">＋＋＋＋ </p></td>
                        </tr>
                        <tr>
                          <td width="85" valign="top" bgcolor="#D5EAEE"><p class="kno_01">枸櫞類水果 <br>
                            如：橘子、柳丁 </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋＋＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋＋ </p></td>
                          <td width="76" valign="top" bgcolor="#D5EAEE"><p align="center" class="kno_01">＋＋＋ </p></td>
                        </tr>
                        <tr>
                          <td width="85" valign="top"><p class="kno_01">蘋果 </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">－ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋＋ </p></td>
                          <td width="76" valign="top"><p align="center" class="kno_01">＋ </p></td>
                        </tr>
                      </table>
                      <p class="kno_01">圖例：＋＋＋＋非常豐富  ＋＋＋豐富  ＋＋中等  ＋少量  －微量  ○沒有 </p>
                      <p>&nbsp;</p>
                      <p><span class="kno_01">資料來源:臨床營養工作手冊</span> </p>                      <p align="left"><br>
                    <strong> </strong></p>                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td height="23" colspan="3" valign="top"><img src="img/kno_f25.jpg" width="755" height="23" alt=""></td>
                    <td></td>
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