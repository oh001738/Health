<?php /////配餐修改個人資料?>
<?PHP
include "config.php";

header_print(true);   //載入header檔

if ( !ck_login(session_id()) )
{
	showMsg('此功能僅限會員使用!!');
	phpDirect(ROOT_URL);
}

$step = ($_POST['step'])? $_POST['step'] : '1';
$step = ($_GET['step'])? $_GET['step'] : $step;
?>

<style type = 'text/css'>
<!--
.style2 {font-size: 11pt}
.style3 {color: #FFFFFF}
.style4 {color: #FF0000}
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
		<div class = 'fast_link'>
		<?PHP
		$nowL = array('首頁' => 'index.php', '修改會員資料' => 'useredit2.php');
		echo show_path_url($nowL);
		?>
		</div>
		</td>
	</tr>
	<tr>
		<td>
		<table border = '0' width = '100%' cellspacing = '0' cellpadding = '0'>
		<tr>
			<td width='155' valign = 'top'></td>
			<td valign = 'top' align = 'center'>
			<?PHP
			switch ($step)
			{
				case '1':
					$userHealth = get_user_health($USER['userid']);
					echo "<div class = 'title3' style = 'padding-left:100px;padding-top:1px;'>修改個人資料</div>\n";
					echo "<form id = 'form2' name = 'form2' method = 'post' action = 'useredit2.php'>\n";
							echo "<table width = '90%' border = '0' align = 'center' cellpadding = '3' cellspacing = '1'>\n";
							echo "<tr>\n";
							echo "	<td width = '20%'><span class = 'style4'>﹡</span>出生年月日</td>\n";
							echo "	<td>\n";
							echo "	民國 <select id = 'year' name = 'year'>\n";
							for ($i = 1; $i <= (date("Y") - 1911); $i++)
							{
								$selected = ($i == (date("Y", $userHealth['birthday']) - 1911))? 'selected' : '';
								echo "   <option value = '" . ($i + 1911) . "' " . $selected . ">" . $i . "</option>\n";
							}
							echo "	</select> 年\n";
							echo "	<select id = 'month' name = 'month'>\n";
							for ($i = 1; $i <= 12; $i++)
							{
								$selected = ($i == date("n", $userHealth['birthday']))? 'selected' : '';
								echo "   <option value = '" . $i . "' " . $selected . ">" . $i . "</option>\n";
							}
							echo "	</select> 月\n";
							echo "	<select id = 'day' name = 'day'>\n";
							for ($i = 1; $i <= 31; $i++)
							{
								$selected = ($i == date("d", $userHealth['birthday']))? 'selected' : '';
								echo "   <option value = '" . $i . "' " . $selected . ">" . $i . "</option>\n";
							}
							echo "	</select> 日\n";
							echo "	</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							if ($userHealth['user_sex'] == '男')
							{
								$male = 'checked';
							}else{
								$female = 'checked';
							}
							echo "	<td><span class = 'style4' align = 'right'>﹡</span>性別</td>\n";
							echo "	<td><input type = 'radio' id = 'user_sex' name = 'user_sex'  value = '男' " . $male . ">男\n";
							echo "	<input type= 'radio' name= 'user_sex' id= 'user_sex' value= '女' " . $female . ">女</td>\n";
							
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td>糖尿病</td>\n";
							echo "	<td>\n";
							if ( $userHealth['diabetes'] == '有' )
							{
								$diabetes_1 = 'checked';
							}else if ( $userHealth['diabetes'] == '沒有' ){
								$diabetes_2 = 'checked';
							}else{
								$diabetes_3 = 'checked';
							}
							echo "	<input type= 'radio' name= 'diabetes' id= 'diabetes' value= '有' " . $diabetes_1 . ">有\n";
							echo "	<input type= 'radio' name= 'diabetes' id= 'diabetes' value= '沒有' " . $diabetes_2 . ">沒有\n";
							echo "	<input type= 'radio' name= 'diabetes' id= 'diabetes' value= '不知道' " . $diabetes_3 . ">不知道</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td>高血壓</td>\n";
							echo "	<td>\n";
							if ( $userHealth['hypertension'] == '有' )
							{
								$hypertension_1 = 'checked';
							}else if ( $userHealth['hypertension'] == '沒有' ){
								$hypertension_2 = 'checked';
							}else{
								$hypertension_3 = 'checked';
							}
							echo "	<input type= 'radio' name= 'hypertension' id= 'hypertension' value= '有' " . $hypertension_1 . ">有\n";
							echo "	<input type= 'radio' name= 'hypertension' id= 'hypertension' value= '沒有' " . $hypertension_2 . ">沒有\n";
							echo "	<input type= 'radio' name= 'hypertension' id= 'hypertension' value= '不知道' " . $hypertension_3 . ">不知道</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td>心臟病</td>\n";
							echo "	<td>\n";
							if ( $userHealth['heart'] == '有' )
							{
								$heart_1 = 'checked';
							}else if ( $userHealth['heart'] == '沒有' ){
								$heart_2 = 'checked';
							}else{
								$heart_3 = 'checked';
							}
							echo "	<input type= 'radio' name= 'heart' id= 'heart' value= '有' " . $heart_1 . ">有\n";
							echo "	<input type= 'radio' name= 'heart' id= 'heart' value= '沒有' " . $heart_2 . ">沒有\n";
							echo "	<input type= 'radio' name= 'heart' id= 'heart' value= '不知道' " . $heart_3 . ">不知道</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td>腎臟病</td>\n";
							echo "	<td>\n";
							if ( $userHealth['kidney'] == '有' )
							{
								$kidney_1 = 'checked';
							}else if ( $userHealth['kidney'] == '沒有' ){
								$kidney_2 = 'checked';
							}else{
								$kidney_3 = 'checked';
							}
							echo "	<input type= 'radio' name= 'kidney' id= 'kidney' value= '有' " . $kidney_1 . " onclick = 'show_kidney(true)'>有\n";
							echo "	<input type= 'radio' name= 'kidney' id= 'kidney' value= '沒有' " . $kidney_2 . " onclick = 'show_kidney(false)'>沒有\n";
							echo "	<input type= 'radio' name= 'kidney' id= 'kidney' value= '不知道' " . $kidney_3 . " onclick = 'show_kidney(false)'>不知道</td>\n";
							echo "</tr>\n";
							$showcure = ($userHealth['kidney'] == '有')? 'block' : 'none';
							$hd_checked = ($userHealth['kidney_cure'] == 'HD')? 'checked' : '';
							$cp_checked = ($userHealth['kidney_cure'] == 'CAPD')? 'checked' : '';
							$no_checked = ($userHealth['kidney_cure'] == '')? 'checked' : '';
							echo "<tr id = 'showkidney' name = 'showkidney' style = 'display:" . $showcure . "' align = 'left'>\n";
							echo "	<td colspan = '2'>\n";
							echo "	<input type = 'radio' id = 'kidney_cure' name = 'kidney_cure' value = '' " . $no_checked . ">無洗腎，有洗腎\n";
							echo "	<input type = 'radio' id = 'kidney_cure' name = 'kidney_cure' value = 'HD' " . $hd_checked . ">血液透析(HD)\n";
							echo "	<div style = 'padding-left:107px'><input type = 'radio' id = 'kidney_cure' name = 'kidney_cure' value = 'CAPD' " . $cp_checked . ">腹膜透析(CAPD)</div>\n";
							echo "	</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td>語音提醒</td>\n";
							echo "	<td colspan = '2'>\n";
							if ( $userHealth['pronunciation'] == '國語' )
							{
								$pronunciation_1 = 'checked';
							}else{
								$pronunciation_2 = 'checked';
							}
							echo "	<input type= 'radio' name= 'pronunciation' id= 'pronunciation' value= '國語' " . $pronunciation_1 . ">國語\n";
							echo "	<input type= 'radio' name= 'pronunciation' id= 'pronunciation' value= '閩南語' " . $pronunciation_2 . ">閩南語</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td><span class = 'style4'>﹡</span>身高</td>\n";
							echo "	<td>\n";
							echo "	<select id = 'user_h' name = 'user_h' onchange = 'Sumprice()'>\n";
							echo "	<option value = '' selected>請選擇</option>\n";
							for ($i = 100; $i <= 200; $i++)
							{
								$selected = ($i == $userHealth['user_h'])? 'selected' : '';
								echo "   <option value = '" . $i . "' " . $selected . ">" . $i . "</option>\n";
							}
							echo "	</select> 公分\n";
							echo "	</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td><span class= 'style4'>﹡</span>體重</td>\n";
							echo "	<td>\n";
							echo "	<select id = 'user_w' name = 'user_w' onchange = 'Sumprice()'>\n";
							echo "	<option value = '' selected>請選擇</option>\n";
							for ($i = 20; $i <= 150; $i++)
							{
								$selected = ($i == $userHealth['user_w'])? 'selected' : '';
								echo "   <option value = '" . $i . "' " . $selected . ">" . $i . "</option>\n";
							}
							echo "</select> 公斤</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td colspan = '2'>您的身體質量指數 (BMI) 為<input name= 'bmi' type= 'text' id= 'bmi' size= '4' value='".$userHealth['bmi']."' readonly></td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td id = 'msg' name = 'msg' colspan = '2'></td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td colspan = '2'>您的理想體重為 <input name= 'good_w' type= 'text' id= 'good_w' size= '3' value='".$userHealth['good_w']."' readonly> ~ <input name= 'good_w2' type= 'text' id= 'good_w2' size= '3' value='".$userHealth['good_w2']."' readonly></td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td>腰圍</span></td>\n";
							echo "	<td>\n";
							echo "	<select id = 'waistline' name = 'waistline'>\n";
							for ($i = 10; $i < 60; $i = $i + 0.5)
							{
								$selected = ($i == $userHealth['waistline'])? 'selected' : '';
								echo "   <option value = '" . $i . "' " . $selected . ">" . $i . "</option>\n";
							}
							echo "	</select> 吋</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td></td>\n";
							echo "	<td>\n";
							echo "	<div style = 'padding-left:100px'>\n";
							echo "	<input type = 'hidden' id = 'step' name = 'step' value = '2'>\n";
							echo "	<input type = 'hidden' id = 'userid' name = 'userid' value = '" . trim($USER['userid']) . "'>\n";
							echo "	<input type = 'hidden' id = 'healthid' name = 'healthid' value = '" . trim($userHealth['health_id']) . "'>\n";
							echo "	<input type= 'button' name= 'next' id= 'next' value= '下一頁' onclick = 'check_form2()'></div>\n";
							echo "	</td>\n";
							echo "</tr>\n";
							echo "</table>\n";
							echo "</div>\n";
							echo "</form>\n";
					break;
					
				case '2':
					$userHealth = get_user_health($_POST['userid']);
					if ( $userHealth['actions'] == '輕度' )
					{
						$actions_1 = 'checked';
					}else if ( $userHealth['actions'] == '中度' )
					{
						$actions_2 = 'checked';
					}else if ( $userHealth['actions'] == '重度' )
					{
						$actions_3 = 'checked';
					}else{
						$actions_4 = 'checked';
					}
					echo "<div class = 'title3' align = 'left' style = 'padding-left:30px'>請輸入活動因子</div>\n";
					echo "<form id = 'form1' name = 'form1' method = 'post' action = 'useredit2.php'>\n";
					echo "<table width = '95%' border = '0' align = 'center' cellpadding = '3' cellspacing = '1'>\n";
					echo "<tr>\n";
					echo "	<td align = 'right'><span class = 'style4'>﹡</span>您的活動量分級是：</td>\n";
					echo "	<td width = '70%'><input type = 'radio' name = 'actions' id = 'actions' value = '輕度' " . $actions_1 . ">輕度</td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "	<td></td>\n";
					echo "	<td><input type = 'radio' name = 'actions' id = 'actions' value = '中度' " . $actions_2 . ">中度</td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "	<td></td>\n";
					echo "	<td><input type = 'radio' name = 'actions' id = 'actions' value = '重度' " . $actions_3 . ">重度</td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "	<td></td>\n";
					echo "	<td><input type = 'radio' name = 'actions' id = 'actions' value = '臥床' " . $actions_4 . ">臥床</td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "	<td align = 'right'><span>‧輕度：</span></td>\n";
					echo "	<td>除了因通車、購物等約1小時的步行和輕度手工或家事等站立之外，大部分從事坐著的工作、讀書、談話等情況。</td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "	<td align = 'right'><span>‧中度：</span></td>\n";
					echo "	<td>除了因通車、購物等其他事項約2小時的步行和從事坐著的工作、辦公、讀書、談話等之外，還從事機械操作、接待或家事等站立較多之活動。</td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "	<td align = 'right'><span>‧重度：</span></td>\n";
					echo "	<td>除了上述靜坐、站立、步行等動外，另從事農耕、漁業、建築等約1小時的重度肌肉性的工作。</td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "	<td colspan = '2' align = 'right';>\n";
					echo "	<div style = 'padding-top:20px'>\n";
					$hidden = $_POST;
					foreach ($hidden as $key => $value)
					{
						if ($key == 'step')
						{
							echo "<input type = 'hidden' id = '" . $key . "' name = '" . $key . "' value = '3'>\n";
						}else{
							echo "<input type = 'hidden' id = '" . $key . "' name = '" . $key . "' value = '" . $value . "'>\n";
						}
					}
					echo "	<input type = 'submit' name = 'next' id = 'next' value = '下一頁'>\n";
					echo "	</div>\n";
					echo "	</td>\n";
					echo "</tr>\n";
					echo "</table>\n";
					echo "</form>\n";
					break;

				case '3':
					$userHealth = get_user_health($_POST['userid']);
					echo "<div class = 'title3' align = 'left' style = 'padding-left:30px'>請選擇您最近的檢驗值<br>\n";
					echo "<span><font class = 'text13px'><font color = '#8F19FF'>(請盡量填寫，不知道的部份可以空下來不必填寫<br>各醫院正常值可能會有輕微差異)</font></font></span></div>\n";
					echo "<span><font class = 'text13px'>若輸入數值後變為紅色方框，表示超過標準範圍</font></span></div>\n";
					echo "<form id = 'form1' name = 'form1' method = 'post' action = 'useredit2.php'>\n";
					echo "<table width = '100%' border = '0' align = 'center' cellpadding = '6' cellspacing = '1'>\n";
					echo "<tr>\n";
					echo "	<td width = '28%'>血中肌肝酸<br>Creatinine</td>\n";
					echo "	<td><input name = 'creatinine' type = 'text' id = 'creatinine' style = 'width:60px' value = '" . $userHealth['creatinine'] . "' onblur = 'ckhealth(\"creatinine\", 0.7, 1.4)'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(0.7~1.4)</font></td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "	<td>血鈉<br>Na</td>\n";
					echo "	<td><input name = 'na' type = 'text' id = 'na' style = 'width:60px' value = '" . $userHealth['na'] . "' onblur = 'ckhealth(\"na\", 137, 153)'> mEq/l <font style = 'color:#1C19FF;font-weight:800'>(137~153)</font></td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "	<td><span class = 'style5'>血尿素氮<br>BUN</span></td>\n";
					echo "	<td><input name = 'bun' type = 'text' id = 'bun' style = 'width:60px' value = '" . $userHealth['bun'] . "' onblur = 'ckhealth(\"bun\", 5, 25)'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(5~25)</font></td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "	<td><span class = 'style5'>血鉀<br>K</span></td>\n";
					echo "	<td><input name = 'kk' type = 'text' id = 'kk' style = 'width:60px' value = '" . $userHealth['kk'] . "' onblur = 'ckhealth(\"kk\", 3.5, 5.0)'> meg/dl <font style = 'color:#1C19FF;font-weight:800'>(3.5~5.0)</font></td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "	<td><span class = 'style5'>空腹血糖<br>Fasting sugar</span></td>\n";
					echo "	<td><input name = 'fasting_sugar' type = 'text' id = 'fasting_sugar' style = 'width:60px' value = '" . $userHealth['fasting_sugar'] . "' onblur = 'ckhealth(\"fasting_sugar\", 70, 110)'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(70~110)</font></td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "	<td>血磷<br>P</td>\n";
					echo "	<td><input name = 'pp' type = 'text' id = 'pp' style = 'width:60px' value = '" . $userHealth['pp'] . "' onblur = 'ckhealth(\"pp\", 2.5, 4.5)'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(2.5~4.5)</font></td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "	<td>糖化血色素<br>HbA1c</td>\n";
					echo "	<td><input name = 'hba1c' type = 'text' id = 'hba1c' style = 'width:60px' value = '" . $userHealth['hba1c'] . "' onblur = 'ckhealth(\"hba1c\", 4, 6)'> % <font style = 'color:#1C19FF;font-weight:800'>(4~6)</font></td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "	<td>血鈣<br>Ca</td>\n";
					echo "	<td><input name = 'ca' type = 'text' id = 'ca' style = 'width:60px' value = '" . $userHealth['ca'] . "' onblur = 'ckhealth(\"ca\", 8.4, 10.2)'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(8.4~10.2)</font></td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					$type = ($userHealth['user_sex'] == '男')? '1' : '0';
					echo "	<td>血色素<br>Hgb</td>\n";
					echo "	<td><input name = 'hgb' type = 'text' id = 'hgb' style = 'width:60px' value = '" . $userHealth['hgb'] . "' onblur = 'ckhealth2(\"hgb\", " . $type . ", 12.3, 18.3, 11.3, 15.3)'> g/dl <font style = 'color:#1C19FF;font-weight:800'>(男：12.3~18.3 女：11.3~15.3)</font></td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "	<td>血鐵<br>Fe</td>\n";
					echo "	<td><input name = 'fe' type = 'text' id = 'fe' style = 'width:60px' value = '" . $userHealth['fe'] . "' onblur = 'ckhealth(\"fe\", 50, 160)'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(50~160)</font></td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "	<td>血容比<br>Hct</td>\n";
					echo "	<td><input name = 'hct' type = 'text' id = 'hct' style = 'width:60px' value = '" . $userHealth['hct'] . "' onblur = 'ckhealth2(\"hct\", " . $type . ", 40, 52, 37, 47)'> % <font style = 'color:#1C19FF;font-weight:800'>(男：40~52 女：37~47)</font></td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "	<td>鐵總結合能力<br>TIBC</td>\n";
					echo "	<td><input name = 'tibc' type = 'text' id = 'tibc' style = 'width:60px' value = '" . $userHealth['tibc'] . "' onblur = 'ckhealth(\"tibc\", 175, 375)'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(175~375)</font></td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "	<td>尿酸<br>Ua</td>\n";
					echo "	<td><input name = 'ua' type = 'text' id = 'ua' style = 'width:60px' value = '" . $userHealth['ua'] . "' onblur = 'ckhealth(\"ua\", 2.4, 7.2)'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(2.4~7.2)</font></td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "	<td>血清轉鐵蛋白<br>Ferritin</td>\n";
					echo "	<td><input name = 'ferritin' type = 'text' id = 'ferritin' style = 'width:60px' value = '" . $userHealth['ferritin'] . "' onblur = 'ckhealth(\"ferritin\", 10, 300)'> mg/ml <font style = 'color:#1C19FF;font-weight:800'>(10~300)</font></td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "	<td>膽固醇<br>Cholesterol</td>\n";
					echo "	<td><input name = 'cholesterol' type = 'text' id = 'cholesterol' style = 'width:60px' value = '" . $userHealth['cholesterol'] . "' onblur = 'ckhealth(\"cholesterol\", 0, 200)'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(0~200)</font></td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "	<td>中性脂肪 (三酸甘油)<br>Triglyceride</td>\n";
					echo "	<td valign = 'top'><input name = 'triglyceride' type = 'text' id = 'triglyceride' style = 'width:60px' value = '" . $userHealth['triglyceride'] . "' onblur = 'ckhealth(\"triglyceride\", 0, 200)'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(0~200)</font></td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "	<td colspan = '4'>\n";
					echo "	<div align = 'right' style = 'padding-right:30px'>\n";
					$hidden = $_POST;
					foreach ( $hidden as $key => $value )
					{
						if ($key == 'step')
						{
							echo "<input type = 'hidden' id = '" . $key . "' name = '" . $key . "' value = '4'>\n";
						}else{
							echo "<input type = 'hidden' id = '" . $key . "' name = '" . $key . "' value = '" . $value . "'>\n";
						}
					}
					echo "	<input type = 'button' name = 'ok' id = 'ok' value = '下一頁' onclick = 'check_int();'>\n";
					echo "	</div>\n";
					echo "	</td>\n";
					echo "</tr>\n";
					echo "</table>\n";
					echo "</form>\n";
					break;

				case '4':

						$need_cal = get_cal($_POST['user_w'], $_POST['bmi'], $_POST['actions']);
						$birthday = mktime(0, 0, 0, $_POST['month'], $_POST['day'], $_POST['year']);

						//計算腎絲球過濾率GFR
						if ( trim($_POST['creatinine']) != '' )
						{	//計算年紀
							$user_age = date("Y") - $_POST['year'] + 1;
							if ( $_POST['user_sex'] == '男' )
							{
								$GFR = 186 * pow($_POST['creatinine'], -1.154) * pow($user_age, -0.203) * 1;
							}else{
								$GFR = 186 * pow($_POST['creatinine'], -1.154) * pow($user_age, -0.203) * 0.742;
							}
							$GFR=round($GFR,2);
						}
						else
						{
							$GFR = '';
						}
						
							if($_POST['creatinine']!='')
							{
					    		$_POST['kidney']='有';
							}
							else
					 		{
								$_POST['kidney']='沒有';
							}
						

						$sql = "UPDATE user_health SET ";
						$sql .= "need_cal = '" . ckString($need_cal, 8) . "' , ";
						$sql .= "birthday = '" . $birthday . "' , ";
						$sql .= "user_h = '" . ckString($_POST['user_h'], 5) . "' , ";
						$sql .= "user_sex = '" . ckString($_POST['user_sex'], 5) . "' , ";
						$sql .= "user_w = '" . ckString($_POST['user_w'], 5) . "' , ";
						$sql .= "diabetes = '" . ckString($_POST['diabetes'], 10) . "' , ";
						$sql .= "hypertension = '" . ckString($_POST['hypertension'], 10) . "' , ";
						$sql .= "waistline = '" . ckString($_POST['waistline'], 3) . "' , ";
						$sql .= "bmi = '" . ckString($_POST['bmi'], 8) . "' , ";
						$sql .= "heart = '" . ckString($_POST['heart'], 10) . "' , ";
						$sql .= "kidney = '" . ckString($_POST['kidney'], 10) . "' , ";
						$sql .= "good_w = '" . ckString($_POST['good_w'], 8) . "' , ";
						$sql .= "good_w2 = '" . ckString($_POST['good_w2'], 8) . "' , ";
						$sql .= "pronunciation = '" . ckString($_POST['pronunciation'], 10) . "' , ";
						$sql .= "actions = '" . ckString($_POST['actions'], 10) . "' , ";
						$sql .= "creatinine = '" . ckString($_POST['creatinine'], 8) . "' , ";
						$sql .= "na = '" . ckString($_POST['na'], 8) . "' , ";
						$sql .= "bun = '" . ckString($_POST['bun'], 8) . "' , ";
						$sql .= "fasting_sugar = '" . ckString($_POST['fasting_sugar'], 8) . "' , ";
						$sql .= "kk = '" . ckString($_POST['kk'], 8) . "' , ";
						$sql .= "hba1c = '" . ckString($_POST['hba1c'], 8) . "' , ";
						$sql .= "pp = '" . ckString($_POST['pp'], 8) . "' , ";
						$sql .= "hgb = '" . ckString($_POST['hgb'], 8) . "' , ";
						$sql .= "ca = '" . ckString($_POST['ca'], 8) . "' , ";
						$sql .= "hct = '" . ckString($_POST['hct'], 8) . "' , ";
						$sql .= "fe = '" . ckString($_POST['fe'], 8) . "' , ";
						$sql .= "tibc = '" . ckString($_POST['tibc'], 8) . "' , ";
						$sql .= "ua = '" . ckString($_POST['ua'], 8) . "' , ";
						$sql .= "ferritin = '" . ckString($_POST['ferritin'], 8) . "' , ";
						$sql .= "cholesterol = '" . ckString($_POST['cholesterol'], 8) . "' , ";
						$sql .= "triglyceride = '" . ckString($_POST['triglyceride'], 8) . "' , ";
						$sql .= "kidney_cure = '" . ckString($_POST['kidney_cure'], 10) . "' , ";
						$sql .= "gfr = '" . ckString($GFR, 10) . "' , ";
						$sql .= "up_time = '" . time() . "' ";
						$sql .= "WHERE health_id = '" . $_POST['healthid'] . "'";
						$ok[] = mysql_query($sql);
						
						$birthday = mktime(0, 0, 0, $_POST['month'], $_POST['day'], $_POST['year']);
						$sql2 = "INSERT INTO user_health_bk (userid, need_cal, birthday, user_h, user_sex, user_w, diabetes, hypertension, waistline, bmi, heart, kidney, good_w, good_w2, pronunciation, actions, creatinine, na, bun, fasting_sugar, kk, hba1c, pp, hgb, ca, hct, fe, tibc, ua, ferritin, cholesterol, triglyceride, kidney_cure, gfr, add_time)VALUES(";
						$sql2 .= "'" . $_POST['userid'] . "' , ";
						$sql2 .= "'" . ckString($need_cal, 8) . "' , ";
						$sql2 .= "'" . $birthday . "' , ";
						$sql2 .= "'" . ckString($_POST['user_h'], 5) . "' , ";
						$sql2 .= "'" . ckString($_POST['user_sex'], 5) . "' , ";
						$sql2 .= "'" . ckString($_POST['user_w'], 5) . "' , ";
						$sql2 .= "'" . ckString($_POST['diabetes'], 10) . "' , ";
						$sql2 .= "'" . ckString($_POST['hypertension'], 10) . "' , ";
						$sql2 .= "'" . ckString($_POST['waistline'], 3) . "' , ";
						$sql2 .= "'" . ckString($_POST['bmi'], 8) . "' , ";
						$sql2 .= "'" . ckString($_POST['heart'], 10) . "' , ";
						$sql2 .= "'" . ckString($_POST['kidney'], 10) . "' , ";
						$sql2 .= "'" . ckString($_POST['good_w'], 8) . "' , ";
						$sql2 .= "'" . ckString($_POST['good_w2'], 8) . "' , ";
						$sql2 .= "'" . ckString($_POST['pronunciation'], 10) . "' , ";
						$sql2 .= "'" . ckString($_POST['actions'], 10) . "' , ";
						$sql2 .= "'" . ckString($_POST['creatinine'], 8) . "' , ";
						$sql2 .= "'" . ckString($_POST['na'], 8) . "' , ";
						$sql2 .= "'" . ckString($_POST['bun'], 8) . "' , ";
						$sql2 .= "'" . ckString($_POST['fasting_sugar'], 8) . "' , ";
						$sql2 .= "'" . ckString($_POST['kk'], 8) . "' , ";
						$sql2 .= "'" . ckString($_POST['hba1c'], 8) . "' , ";
						$sql2 .= "'" . ckString($_POST['pp'], 8) . "' , ";
						$sql2 .= "'" . ckString($_POST['hgb'], 8) . "' , ";
						$sql2 .= "'" . ckString($_POST['ca'], 8) . "' , ";
						$sql2 .= "'" . ckString($_POST['hct'], 8) . "' , ";
						$sql2 .= "'" . ckString($_POST['fe'], 8) . "' , ";
						$sql2 .= "'" . ckString($_POST['tibc'], 8) . "' , ";
						$sql2 .= "'" . ckString($_POST['ua'], 8) . "' , ";
						$sql2 .= "'" . ckString($_POST['ferritin'], 8) . "' , ";
						$sql2 .= "'" . ckString($_POST['cholesterol'], 8) . "' , ";
						$sql2 .= "'" . ckString($_POST['triglyceride'], 8) . "' , ";
						$sql2 .= "'" . ckString($_POST['kidney_cure'], 10) . "' , ";
						$sql2 .= "'" . ckString($GFR, 10) . "' , ";
						$sql2 .= "'" . time() . "')";
						$ok[] = mysql_query($sql2);
						
						if ( !in_array(0, $ok) )
						{
							showMsg('修改完成!!');
						}else{
							showMsg('修改失敗，請恰系統管理員!!');
						}
						echo "<table width = '95%' border = '0' cellpadding = '4' cellspacing = '1' align = 'center'>\n";
						echo "<tr>\n";
						echo "  <td colspan = '2'><div class = 'title3'>\n";
						if (!$GFR)
						{
							echo "\"血中肌肝酸\"尚未輸入，無法計算腎絲球過濾率(GFR)";
						}else if ( $GFR >= 90)
						{
							echo "你的慢性腎臟病是\"第一期\"";
						}else if ( $GFR >= 60 && $GFR < 90)
						{
							echo "你的慢性腎臟病是\"第二期\"";
						}else if ( $GFR >= 30 && $GFR < 60)
						{
							echo "你的慢性腎臟病是\"第三期\"";
						}else if ( $GFR >= 15 && $GFR < 30)
						{
							echo "你的慢性腎臟病是\"第四期\"";
						}else if ( $GFR < 15)
						{
							echo "你的慢性腎臟病是\"第五期\"";
						}
						
						echo "</div>\n";
						echo "<div>男性：GRF = 186 x Scr<sup>-1.154</sup> x Age<sup>-0.203</sup> x 1</div>\n";
						echo "<div>女性：GRF = 186 x Scr<sup>-1.154</sup> x Age<sup>-0.203</sup> x 0.742</div></td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						if($GFR!='')
						{
							echo "	<td colspan = '2'>GFR腎絲球過濾率：<font style = 'color:#FF0000;font-weight:700;'>" . round($GFR, 2) . "</font>\n";
						}
						//echo "	<td colspan = '2'>GFR腎絲球過濾率：<font style = 'color:#FF0000;font-weight:700;'>" . round($GFR, 2) . "</font>\n";
						echo "	<p>慢性腎臟病第一期 (GFR ≧ 90ml/min/1.73m)<br>\n";
						echo "	慢性腎臟病第二期 (GFR60~89ml/min/1.73 m)<br>\n";
						echo "	慢性腎臟病第三期 (GFR30~59ml/min/1.73 m)<br>\n";
						echo "	慢性腎臟病第四期 (GFR15~29ml/min/1.73 m2)<br>\n";
						echo "	慢性腎臟病第五期 (GFR＜15ml/min/1.73 m2)</p></td>\n";
						//echo "	<td><span class = 'style4 style5'><img src = '" . ROOT_URL . "/img/strawberries.jpg' class = 'float_right' alt = 'Strawberries'></span>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						echo "  <td align = 'right' colspan = '2'><input name = 'ok' type = 'button' id = 'ok' onclick = \"location.href('" . ROOT_URL . "/kfoodroot.php')\" value = '完成'></td>\n";
						echo "</tr>\n";
						echo "</table>\n";
					}
			?>
			</td>
			<td class = 'rightmenu' valign = 'top'><?PHP include_once "right_menu.php";?></td>
		</tr>
		</table>
		</td>
	</tr>
	</table>
	</td>
</tr>
<tr>
	<td>
	<?PHP include_once ROOT_PATH . "/footer.php";?>
	</td>
</tr>
</table>

<script language = 'javascript'>
<!--
<?PHP
if ( $_POST['step'] == '2' || $_GET['type'] == 'edit' )
{
	echo "Sumprice();\n";
}
?>
function check_form()
{
	var Obj = document.form1;
	if ( trim(Obj.c_name.value) == '' )
	{
		alert('請輸入中文姓名!!');
		Obj.c_name.focus();

	}else if ( Obj.password_1.value != Obj.password_2.value )
	{
		alert('二次密碼輸入不一致!!');
		Obj.password_1.focus();
	}else{
		Obj.submit();
	}
}

function Sumprice()
{
	//計算BMI
	var Obj = document.form2;
	var height = Obj.user_h.options[Obj.user_h.selectedIndex].value;
	var weight = Obj.user_w.options[Obj.user_w.selectedIndex].value;
	if ( height == '' || height == 0 )
	{
		alert('請選擇身高!!');
		Obj.user_h.focus();
		return false;
	}
	if ( weight == '' || weight == 0 )
	{
		return false;
	}
	weight = parseInt(weight);
	height = parseInt(height);
	Obj.bmi.value = formatFloat( (weight / (height * height) * 10000) ,3 );
	Obj.good_w.value = formatFloat( ( ( 18.5 * (height * height) )/10000), 1);
	Obj.good_w2.value = formatFloat( ( ( 24 * (height * height) )/10000), 1);
	if ( weight > Obj.good_w2.value )
	{
		document.getElementById('msg').innerHTML = "<font style = 'font-size:13px;color:#FA0300'>(超出標準了,多運動,控制一下飲食吧.祝福你!)</font>";
	
	}else if ( weight < Obj.good_w.value )
	{
		document.getElementById('msg').innerHTML = "<font style = 'font-size:13px;color:#FA0300'>(有點過瘦了,要多吃一點喔.祝福你!)";
	}else{
		document.getElementById('msg').innerHTML = "<font style = 'font-size:13px;color:#1C19FF'>(身材維持的不錯喔,繼續加油.祝福你!)";
	}
}

function check_form2()
{
	var Obj = document.form2;
	if ( !dateV(Obj.year.options[Obj.year.selectedIndex].value, Obj.month.options[Obj.month.selectedIndex].value, Obj.day.options[Obj.day.selectedIndex].value) )
	{
		alert('請選擇正確的出生年月日!!');
		Obj.day.focus();
	
	}else if ( Obj.user_h.options[Obj.user_h.selectedIndex].value == '' )
	{
		alert('請選擇身高!!');
		Obj.user_h.focus();
	
	}else if ( Obj.user_w.options[Obj.user_w.selectedIndex].value == '' )
	{
		alert('請選擇體重!!');
		Obj.user_w.focus();
	}else{
		Obj.submit();
	}
}

//-->
</script>

</body>
</html>