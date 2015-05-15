<?php /////檢視個人資料?>
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
		$nowL = array('首頁' => 'index.php', '檢視個人資料' => 'userinfo.php');
		echo show_path_url($nowL);
		?>
		</div>
		</td>
	</tr>
	<tr>
		<td>
		<table border = '0' width = '100%' cellspacing = '0' cellpadding = '0'>
		<tr>
			<td class = 'leftmenu' valign = 'top'>
			<a href = '<?PHP echo ROOT_URL;?>/food_plate.php?percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>'><div style = 'padding-top:5px;padding-left:10px'><div class = 'title'><img src="img/right_menu_03.jpg" width="262" height="36" border="0" /></div>
			</div></a>
			<div style = 'padding-top:10px' class = 'text15px'>
			<?PHP
			//暫存所需熱量hidden欄位
			echo "<input type = 'hidden' id = 'h_needcal' name = 'h_needcal' value = '" . $needCal . "'>\n";
			if ( countSQL('guest_food', 'id', "WHERE session_id = '" . session_id() . "'") > 0 )
			{
				echo "<div style = 'padding-top:5px;padding-left:10px'><div class = 'title'>今日配餐紀錄</div></div>\n";
				$sql = "SELECT rand, percent, meal, flag FROM guest_food WHERE session_id = '" . session_id() . "'";
				$result = mysql_query($sql);
				while ( $row = mysql_fetch_array($result) )
				{
					$logPlate[$row['rand']]['percent'] = $row['percent']; //份量
					$logPlate[$row['rand']]['meal']    = $row['meal'];    //餐別
					$logPlate[$row['rand']]['flag']    = $row['flag'];    //判斷是否已送出
				}

				foreach ( $logPlate as $key => $value )
				{
					$percent = ($logPlate[$key]['percent'] == 1)? '1' : "1/" . $logPlate[$key]['percent'];
					if ($logPlate[$key]['flag'] == 1)
					{
						echo "<div style = 'padding-top:5px;padding-left:15px' class = 'text13px'><a href = '" . ROOT_URL . "/save_plate.php?percent=" . $logPlate[$key]['percent'] . "&meal=" . $logPlate[$key]['meal'] . "'>" . $MEALTYPE[$logPlate[$key]['meal']] . " - 份量：" . $percent . "</a></div>\n";
					}else{
						echo "<div style = 'padding-top:5px;padding-left:15px' class = 'text13px'><a href = '" . ROOT_URL . "/food_plate.php?percent=" . $logPlate[$key]['percent'] . "&meal=" . $logPlate[$key]['meal'] . "&rand=" . $key . "'>" . $MEALTYPE[$logPlate[$key]['meal']] . " - 份量：" . $percent . "</a></div>\n";
					}
				}
				echo "</div>\n";
			}
			if ( $USER['userid'] != '' )
			{ 
				$i = 0;
				echo "<div style = 'padding-left:10px'><div class = 'title'>我的配餐紀錄</div></div>\n";
				$plate = mysql_query("SELECT * FROM user_food WHERE userid = '" . $USER['userid'] . "' ORDER BY add_time DESC LIMIT 0,5");
				while ( $prow = mysql_fetch_array($plate) )
				{
					echo "<div style = 'padding-top:5px;padding-left:15px'><a href = '" . ROOT_URL . "/oldplate.php?percent=" . $_GET['percent'] . "&meal=" . $_GET['meal'] . "&rand=" . $_GET['rand'] . "&pid=" . $prow['id'] . "'><font style = 'font-size:13px'>" . date("Y-m-d", $prow['add_time']) . " - " . $MEALTYPE[$prow['meal']] . "</font></a></div>\n";
					$i++;
				}
				if ($i == 0)
				{
					echo "<div style = 'padding-top:5px;padding-left:15px' class = 'text13px'>尚無配餐紀錄</div>\n";
				}
			}
			?>
			</td>
			<td valign = 'top' align = 'center'>

<!-------------------------------------------------------------------------------------------------------------->	
<?php
if ( $USER['userid'] != '' )
			{ 
				$plate = mysql_query("SELECT * FROM user WHERE id = '" . $USER['id'] . "' ORDER BY add_time DESC LIMIT 0,5");
				while ( $prow = mysql_fetch_array($plate) )
				{
					switch ($step)
					{
					case '1':
						echo "<div class = 'title3' style = 'padding-left:10px;padding-top:1px;'>檢視個人資料</div>\n";
						$userValue = get_user_value($USER['userid']);
						echo "<form id = 'form1' name = 'form1' method = 'post' action = '" . getenv("REQUEST_URI") . "'>\n";
						echo "<table width = '95%' border = '0' align = 'center'>\n";
						echo "<tr>\n";
						echo "	<td colspan = '2'><div style = 'padding-left:150px'>個人資料</div></td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						echo "<td align = 'right' width = '25%'>中文姓名：</td>\n";
						echo "<td>" .trim($USER['c_name']). "</td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						echo "	<td align = 'right'>英文名字：</td>\n";
						echo "<td>" .trim($USER['e_name']). "</td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						echo "	<td align = 'right'>電子郵件：</td>\n";
						echo "<td>" .trim($USER['email']). "</td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						echo "	<td align = 'right'>帳號：</td>\n";
						echo "<td>" .trim($USER['username']). "</td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						echo "	<td colspan = '2'><div style = 'padding-left:150px;padding-top:20px'>通訊</div></td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						echo "	<td align = 'right'>電話號碼：</td>\n";
						echo "<td>" .trim($USER['telphone']). "</td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						echo "	<td align = 'right'>行動電話：</td>\n";
						echo "<td>" .trim($USER['celphone']). "</td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						echo "	<td align = 'right'>地址：</td>\n";
						echo "<td>" .trim($USER['address']). "</td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						echo "	<td align = 'right'>所屬院區：</td>\n";
						echo "<td>" ?>
                        <?php
						if(trim($USER['location'])=='1')
						{
							echo "台北";
						}
						elseif(trim($USER['location'])=='2')
						{
							echo "台中";
						}
						elseif(trim($USER['location'])=='3')
						{
							echo "高雄";
						}						
						?><?php "</td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						echo "	<td colspan = '2'><div style = 'padding-left:150px;padding-top:10px'>\n";
						echo "	<input type = 'hidden' id = 'step' name = 'step' value = '2'>\n";
						echo "	<input type = 'hidden' id = 'userid' name = 'userid' value = '" . $userValue['id'] . "'>\n";
						echo "	<input type = 'submit' name = 'next' id = 'next' value = '下一頁'>\n";
						echo "</tr>\n";
						echo "</table>\n";
						echo "</form> \n";
						break;
							
				case '2':
				
					if ( ($_POST['step'] == '2' && trim($_POST['userid']) != '') )
					{

							$userHealth = get_user_health($USER['userid']);
							echo "<div class = 'title3' style = 'padding-left:100px;padding-top:1px;'>檢視個人資料</div>\n";
							echo "<form id = 'form2' name = 'form2' method = 'post' action = 'userinfo.php'>\n";
							echo "<table width = '90%' border = '0' align = 'center' cellpadding = '3' cellspacing = '1'>\n";
							echo "<tr>\n";
							echo "	<td width = '40%'>出生年月日</td>\n";
							$year = date("Y",mktime (0, 0, 0, 0, 0, date("Y", $userHealth['birthday'])))+1;
							$month = date("m",mktime (0, 0, 0, date("m", $userHealth['birthday']), 0, 0))-11;
							$day = date("d",mktime (0, 0, 0, 0, date("d", $userHealth['birthday']), 0));
							echo "<td>民國" .($year-1911). "年".$month."月".$day."日</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td>性別</td>\n";
							echo "<td>" .trim($USER['user_sex']). "</td>\n";				
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td>糖尿病</td>\n";
							echo "<td>" .trim($USER['diabetes']). "</td>\n";							
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td>高血壓</td>\n";
							echo "<td>" .trim($USER['hypertension']). "</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td>心臟病</td>\n";
							echo "<td>" .trim($USER['heart']). "</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td>腎臟病</td>\n";
							echo "<td>" .trim($USER['kidney']). "</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td>語音提醒</td>\n";
							echo "<td>" .trim($USER['pronunciation']). "</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td>身高</td>\n";
							echo "<td>" .trim($USER['user_h']). "</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td>體重</td>\n";
							echo "<td>" .trim($USER['user_w']). "</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td colspan = '2'>您的身體質量指數 (BMI) 為" .trim($USER['bmi']). "</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td id = 'msg' name = 'msg' colspan = '2'></td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td colspan = '2'>您的理想體重為".trim($USER['good_w']). "～".trim($USER['good_w2'])."</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td>腰圍</span></td>\n";
							echo "<td>" .trim($USER['waistline'])."吋". "</td>\n";							
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td align = 'right'>您的活動量分級是：</td>\n";
							echo "<td>" .trim($USER['actions'])."</td>\n";
							echo "</tr>\n";							
							echo "	<td></td>\n";
							echo "	<td>\n";
							echo "	<div style = 'padding-left:100px'>\n";
							echo "	<input type = 'hidden' id = 'step' name = 'step' value = '3'>\n";
							echo "	<input type = 'hidden' id = 'userid' name = 'userid' value = '" . trim($USER['userid']) . "'>\n";
							echo "	<input type = 'submit' name = 'next' id = 'next' value = '下一頁'>\n";
							echo "	</td>\n";
							echo "</tr>\n";
							echo "</table>\n";
							echo "</div>\n";
							echo "</form>\n";

					}
					break;
							
				case '3':
					$userHealth = get_user_health($_POST['userid']);
					echo "<div class = 'title3' align = 'left' style = 'padding-left:30px'>檢康檢查各項檢驗值<br>\n";
					echo "<span><font class = 'text13px'>若數值為紅色字體，表示超過標準範圍</font></span></div>\n";
					echo "<form id = 'form1' name = 'form1' method = 'post' action = '" . getenv("REQUEST_URI") . "'>\n";
					echo "<table width = '100%' border = '0' align = 'center' cellpadding = '6' cellspacing = '1'>\n";
					echo "<tr>\n";
					
					echo "<td width = '35%'>血中肌肝酸<br>Creatinine</td>\n";
					if(trim($USER['creatinine']) < 0.7 || trim($USER['creatinine']) > 1.4)
					{
						echo "<td width = '30%'><font style = 'color:#FA0300;font-weight:800'>".trim($USER['creatinine'])."</font> mg/dl </td>\n";
					}
					else
					{
						echo "<td width = '30%'>".trim($USER['creatinine'])."</font>mg/dl </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(0.7~1.4)</font></td>";
					echo "</tr>\n";
					
					echo "<tr>\n";					
					echo "	<td>血鈉<br>Na</td>\n";
					if(trim($USER['na']) < 137 || trim($USER['na']) > 153)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['na'])."</font> mEq/l </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['na'])."</font> mEq/l </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(137~153)</font></td>";
					echo "</tr>\n";
					
					echo "<tr>\n";					
					echo "	<td>血尿素氮<br>BUN</td>\n";			
					if(trim($USER['bun']) < 5 || trim($USER['bun']) > 25)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['bun'])."</font> mg/dl </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['bun'])."</font> mg/dl </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(5~25)</font></td>";
					echo "</tr>\n";
					
					echo "<tr>\n";					
					echo "	<td>血鉀<br>K</td>\n";	
					if(trim($USER['kk']) < 3.5 || trim($USER['kk']) > 5.0)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['kk'])."</font> meg/dl </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['kk'])."</font> meg/dl </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(3.5~5.0)</font></td>";
					echo "</tr>\n";
					
					echo "<tr>\n";					
					echo "	<td>空腹血糖<br>Fasting sugar</td>\n";	
					if(trim($USER['fasting_sugar']) < 70 || trim($USER['fasting_sugar']) > 110)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['fasting_sugar'])."</font> mg/dl </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['fasting_sugar'])."</font> mg/dl </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(70~110)</font></td>";
					echo "</tr>\n";
					
					echo "<tr>\n";					
					echo "	<td>血磷<br>P</td>\n";	
					if(trim($USER['pp']) < 2.5 || trim($USER['pp']) > 4.5)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['pp'])."</font> mg/dl </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['pp'])."</font> mg/dl </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(2.5~4.5)</font></td>";
					echo "</tr>\n";
					
					echo "<tr>\n";					
					echo "	<td>糖化血色素<br>HbA1c</td>\n";	
					if(trim($USER['hba1c']) < 4 || trim($USER['hba1c']) > 6)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['hba1c'])."</font> % </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['hba1c'])."</font> % </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(4~6)</font></td>";
					echo "</tr>\n";
					
					echo "<tr>\n";					
					echo "	<td>血鈣<br>Ca</td>\n";	
					if(trim($USER['ca']) < 8.4 || trim($USER['ca']) > 10.2)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['ca'])."</font> mg/dl </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['ca'])."</font> mg/dl </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(8.4~10.2)</font></td>";
					echo "</tr>\n";

					echo "<tr>\n";					
					echo "	<td>血色素<br>Hgb</td>\n";
					$type = (trim($USER['user_sex']) == '男')? '1' : '0';
					$hgbtmp = trim($USER['hgb']);
					
					if(($type==1 && ($hgbtmp<12.3 || $hgbtmp>18.3))||($type==0 && ($hgbtmp<11.3 || $hgbtmp>15.3)))
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".$hgbtmp."</font> g/dl </td>\n";
					}
					else
					{
						echo "<td>".trim($hgbtmp)."</font> g/dl </td>\n";
					}
					echo "	<td><font style = 'color:#1C19FF;font-weight:800'>(男：12.3~18.3 女：11.3~15.3)</font></td>\n";	
					echo "</tr>\n";
					
					echo "<tr>\n";					
					echo "	<td>血鐵<br>Fe</td>\n";	
					if(trim($USER['fe']) < 50 || trim($USER['fe']) > 160)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['fe'])."</font> mg/dl </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['fe'])."</font> mg/dl </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(50~160)</font></td>";
					echo "</tr>\n";
					
					echo "<tr>\n";					
					echo "	<td>血容比<br>Hct</td>\n";
					$hcttmp = trim($USER['hct']);
					if(($type==1 && ($hcttmp<40 || $hcttmp>52))||($type==0 && ($hcttmp<37 || $hcttmp>47)))
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".$hcttmp."</font> % </td>\n";
					}
					else
					{
						echo "<td>".trim($hcttmp)."</font> % </td>\n";
					}
					echo "	<td><font style = 'color:#1C19FF;font-weight:800'>(男：40~52 女：37~47)</font></td>\n";	
					echo "</tr>\n";
		
					echo "<tr>\n";					
					echo "	<td>鐵總結合能力<br>TIBC</td>\n";	
					if(trim($USER['tibc']) < 175 || trim($USER['tibc']) > 375)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['tibc'])."</font> mg/dl </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['tibc'])."</font> mg/dl </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(175~375)</font></td>";
					echo "</tr>\n";

					echo "<tr>\n";						
					echo "	<td>尿酸<br>Ua</td>\n";	
					if(trim($USER['ua']) < 2.4 || trim($USER['ua']) > 7.2)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['tibc'])."</font> mg/dl </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['ua'])."</font> mg/dl </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(2.4~7.2)</font></td>";
					echo "</tr>\n";
					
					echo "<tr>\n";						
					echo "	<td>血清轉鐵蛋白<br>Ferritin</td>\n";	
					if(trim($USER['ferritin']) < 10 || trim($USER['ferritin']) > 300)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['ferritin'])."</font> mg/dl </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['ferritin'])."</font> mg/dl </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(10~300)</font></td>";
					echo "</tr>\n";
					
					echo "<tr>\n";						
					echo "	<td>膽固醇<br>Cholesterol</td>\n";	
					if(trim($USER['cholesterol']) < 0 || trim($USER['cholesterol']) > 200)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['cholesterol'])."</font> mg/dl </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['cholesterol'])."</font> mg/dl </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(0~200)</font></td>";
					echo "</tr>\n";
					
					echo "<tr>\n";						
					echo "	<td>中性脂肪(三酸甘油)<br>Triglyceride</td>\n";	
					if(trim($USER['triglyceride']) < 0 || trim($USER['triglyceride']) > 200)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['triglyceride'])."</font> mg/dl </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['triglyceride'])."</font> mg/dl </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(0~200)</font></td>";
					echo "</tr>\n";						

					echo "<tr>\n";
					echo "	<td>\n";
					echo "	<div style = 'padding-left:100px'>\n";
					echo "	<input type = 'hidden' id = 'step' name = 'step' value = '4'>\n";
					echo "	<input type = 'hidden' id = 'userid' name = 'userid' value = '" . trim($USER['userid']) . "'>\n";
					echo "	<input type = 'submit' name = 'next' id = 'next' value = '下一頁'>\n";
					echo "	</td>\n";
					echo "</tr>\n";
					echo "</table>\n";
					echo "</form>\n";
					break;
					
				case '4':
				
						$GFR = trim($USER['gfr']);

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
							echo "你的慢性腎臟病是\"第四期\"";
						}
						echo "</div>\n";
						echo "<div>男性：GRF = 186 x Scr<sup>-1.154</sup> x Age<sup>-0.203</sup> x 1</div>\n";
						echo "<div>女性：GRF = 186 x Scr<sup>-1.154</sup> x Age<sup>-0.203</sup> x 0.742</div></td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						echo "	<td colspan = '2'>GFR腎絲球過濾率：<font style = 'color:#FF0000;font-weight:700;'>" . round($GFR, 2) . "</font>\n";
						echo "	<p>慢性腎臟病第一期 (GFR ≧ 90ml/min/1.73m)<br>\n";
						echo "	慢性腎臟病第二期 (GFR60~89ml/min/1.73 m)<br>\n";
						echo "	慢性腎臟病第三期 (GFR30~59ml/min/1.73 m)<br>\n";
						echo "	慢性腎臟病第四期 (GFR15~29ml/min/1.73 m2)<br>\n";
						echo "	慢性腎臟病第五期 (GFR＜15ml/min/1.73 m2)</p></td>\n";
						echo "</tr>\n";
						echo "</table>\n";
					break;							
					}
				}
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
</body>
</html>