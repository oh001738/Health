<?PHP 
include_once 'config.php';
header_print(true);   //載入header檔
if ( $_POST )
{
	$need_cal = get_cal($_POST['user_w'], $_POST['bmi'], $_POST['actions']); //計算所需卡洛里
	$birthday = mktime(0, 0, 0, $_POST['month'], $_POST['day'], $_POST['year']);
	
	//計算腎絲球過濾率GFR
	if ( trim($_POST['creatinine']) == 0 )
	{
		$_POST['creatinine']='';
	}

	if ( trim($_POST['creatinine']) != '' )
	{	//計算年紀
		$user_age = date("Y") - $_POST['year'] + 1;
		if ( $_POST['user_sex'] == '男' )
		{
			$GFR = 186 * pow($_POST['creatinine'], -1.154) * pow($user_age, -0.203) * 1;
		}else{
			$GFR = 186 * pow($_POST['creatinine'], -1.154) * pow($user_age, -0.203) * 0.742;
		}
	}
	
	if($_POST['creatinine']!='')
	{
		$_POST['kidney']='有';
	}
	else
	{
		$_POST['kidney']='沒有';
	}
		
	$sql = "INSERT INTO user_health (userid, need_cal, birthday, user_h, user_sex, user_w, diabetes, hypertension, waistline, bmi, heart, kidney, good_w, good_w2, pronunciation, actions, creatinine, na, bun, fasting_sugar, kk, hba1c, pp, hgb, ca, hct, fe, tibc, ua, ferritin, cholesterol, triglyceride, kidney_cure, gfr, add_time)VALUES(";
	$sql .= "'" . $_POST['userid'] . "' , ";
	$sql .= "'" . $need_cal . "' , ";
	$sql .= "'" . $birthday . "' , ";
	$sql .= "'" . $_POST['user_h'] . "' , ";
	$sql .= "'" . $_POST['user_sex'] . "' , ";
	$sql .= "'" . $_POST['user_w'] . "' , ";
	$sql .= "'" . $_POST['diabetes'] . "' , ";
	$sql .= "'" . $_POST['hypertension'] . "' , ";
	$sql .= "'" . $_POST['waistline'] . "' , ";
	$sql .= "'" . $_POST['bmi'] . "' , ";
	$sql .= "'" . $_POST['heart'] . "' , ";
	$sql .= "'" . $_POST['kidney'] . "' , ";
	$sql .= "'" . $_POST['good_w'] . "' , ";
	$sql .= "'" . $_POST['good_w2'] . "' , ";
	$sql .= "'" . $_POST['pronunciation'] . "' , ";
	$sql .= "'" . $_POST['actions'] . "' , ";
	$sql .= "'" . $_POST['creatinine'] . "' , ";
	$sql .= "'" . $_POST['na'] . "' , ";
	$sql .= "'" . $_POST['bun'] . "' , ";
	$sql .= "'" . $_POST['fasting_sugar'] . "' , ";
	$sql .= "'" . $_POST['kk'] . "' , ";
	$sql .= "'" . $_POST['hba1c'] . "' , ";
	$sql .= "'" . $_POST['pp'] . "' , ";
	$sql .= "'" . $_POST['hgb'] . "' , ";
	$sql .= "'" . $_POST['ca'] . "' , ";
	$sql .= "'" . $_POST['hct'] . "' , ";
	$sql .= "'" . $_POST['fe'] . "' , ";
	$sql .= "'" . $_POST['tibc'] . "' , ";
	$sql .= "'" . $_POST['ua'] . "' , ";
	$sql .= "'" . $_POST['ferritin'] . "' , ";
	$sql .= "'" . $_POST['cholesterol'] . "' , ";
	$sql .= "'" . $_POST['triglyceride'] . "' , ";
	$sql .= "'" . $_POST['kidney_cure'] . "' , ";
	$sql .= "'" . $GFR . "' , ";
	$sql .= "'" . time() . "')";

	$sql2 = "INSERT INTO user_health_bk (userid, need_cal, birthday, user_h, user_sex, user_w, diabetes, hypertension, waistline, bmi, heart, kidney, good_w, good_w2, pronunciation, actions, creatinine, na, bun, fasting_sugar, kk, hba1c, pp, hgb, ca, hct, fe, tibc, ua, ferritin, cholesterol, triglyceride, kidney_cure, gfr, add_time)VALUES(";
	$sql2 .= "'" . $_POST['userid'] . "' , ";
	$sql2 .= "'" . $need_cal . "' , ";
	$sql2 .= "'" . $birthday . "' , ";
	$sql2 .= "'" . $_POST['user_h'] . "' , ";
	$sql2 .= "'" . $_POST['user_sex'] . "' , ";
	$sql2 .= "'" . $_POST['user_w'] . "' , ";
	$sql2 .= "'" . $_POST['diabetes'] . "' , ";
	$sql2 .= "'" . $_POST['hypertension'] . "' , ";
	$sql2 .= "'" . $_POST['waistline'] . "' , ";
	$sql2 .= "'" . $_POST['bmi'] . "' , ";
	$sql2 .= "'" . $_POST['heart'] . "' , ";
	$sql2 .= "'" . $_POST['kidney'] . "' , ";
	$sql2 .= "'" . $_POST['good_w'] . "' , ";
	$sql2 .= "'" . $_POST['good_w2'] . "' , ";
	$sql2 .= "'" . $_POST['pronunciation'] . "' , ";
	$sql2 .= "'" . $_POST['actions'] . "' , ";
	$sql2 .= "'" . $_POST['creatinine'] . "' , ";
	$sql2 .= "'" . $_POST['na'] . "' , ";
	$sql2 .= "'" . $_POST['bun'] . "' , ";
	$sql2 .= "'" . $_POST['fasting_sugar'] . "' , ";
	$sql2 .= "'" . $_POST['kk'] . "' , ";
	$sql2 .= "'" . $_POST['hba1c'] . "' , ";
	$sql2 .= "'" . $_POST['pp'] . "' , ";
	$sql2 .= "'" . $_POST['hgb'] . "' , ";
	$sql2 .= "'" . $_POST['ca'] . "' , ";
	$sql2 .= "'" . $_POST['hct'] . "' , ";
	$sql2 .= "'" . $_POST['fe'] . "' , ";
	$sql2 .= "'" . $_POST['tibc'] . "' , ";
	$sql2 .= "'" . $_POST['ua'] . "' , ";
	$sql2 .= "'" . $_POST['ferritin'] . "' , ";
	$sql2 .= "'" . $_POST['cholesterol'] . "' , ";
	$sql2 .= "'" . $_POST['triglyceride'] . "' , ";
	$sql2 .= "'" . $_POST['kidney_cure'] . "' , ";
	$sql2 .= "'" . $GFR . "' , ";
	$sql2 .= "'" . time() . "')";
	
	$check[] = mysql_query($sql);
	$check[] = mysql_query($sql2);
	if ( in_array('0', $check) )
	{
		showMsg('資料寫入發生問題，請洽系統管理員!!');
	}else{
		reDirect(ROOT_URL . '/user_health4.php');
	}
}
?>

<style type="text/css">
<!--
.style2 {font-size: 11pt}
.style3 {color: #FFFFFF}
.style4 {font-size: 12px}
.style5 {font-size: 12pt}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>

<body>
<table border = '1' cellpadding = '0' cellspacing = '0' class = 'header_table'>
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
		$nowL = array('首頁' => 'index.php', '註冊會員' => 'user_add.php');
		echo show_path_url($nowL);
		?></td>
	</tr>
	<tr>
		<td align = 'center'>
		<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
		<tr>
			<td width = '180'><?PHP include_once ROOT_PATH . "/leftmenu.php";?></td>
			<td valign = 'top' align = 'center'>
			<table width="90%" border="0">
			<tr>
				<td colspan = '2'><div style = 'font-size:17px;font-weight:700;color:#3B39DF'>註冊成功</div></td>
			</tr>
			<tr>
				<td>
				<div class = 'title3'>
				<?PHP
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
				?>
				</div>
				<div>男性：GRF = 186 x Scr<sup>-1.154</sup> x Age<sup>-0.203</sup> x 1</div>
				<div>女性：GRF = 186 x Scr<sup>-1.154</sup> x Age<sup>-0.203</sup> x 0.742</div>
				</td>
			</tr>
			<tr>
			  <td><span class="style4 style5">GFR腎絲球過濾率：<font style = 'color:#FF0000;font-weight:700;'><?PHP echo round($GFR, 2);?></span>
				<p class="style4 style5">慢性腎臟病第一期 (GFR ≧ 90ml/min/1.73m) <br />
				  慢性腎臟病第二期 (GFR60~89ml/min/1.73 m) <br />
				  慢性腎臟病第三期 (GFR30~59ml/min/1.73 m) <br />
				  慢性腎臟病第四期 (GFR15~29ml/min/1.73 m2) <br />
				  慢性腎臟病第五期 (GFR＜15ml/min/1.73 m2) </p></td>
			  <td><span class="style4 style5"><img src="<?PHP echo ROOT_URL;?>/img/strawberries.jpg" class="float_right" alt="Strawberries" /></span></td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
			</tr>
			<tr>
			  <td colspan="2"><div align="right">
				<input name="下一頁" type="button" id="下一頁" onClick="MM_goToURL('parent','<?PHP echo ROOT_URL;?>/userlogin.php');return document.MM_returnValue" value="完成" />
			  </div></td>
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
	</td>
</tr>
</table>
</body>
</html>
