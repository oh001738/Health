<?php /////告知腎臟病(註冊會員用)?>

<?PHP 
include_once 'config.php';
header_print(true);   //載入header檔
if ( $_POST )
{
	$birthday = mktime(0, 0, 0, $_POST['month'], $_POST['day'], $_POST['year']);
	$sql = "INSERT INTO user_health (userid, birthday, user_h, user_sex, user_w, diabetes, hypertension, waistline, bmi, heart, kidney, good_w, good_w2, pronunciation, actions, creatinine, na, fasting_sugar, kk, hba1c, pp, hgb, ca, hct, fe, tibc, ua, ferritin, cholesterol, triglyceride, add_time)VALUES(";
	$sql .= "'" . $_POST['userid'] . "' , ";
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
	$sql .= "'" . time() . "')";

	$sql2 = "INSERT INTO user_health_bk (userid, birthday, user_h, user_sex, user_w, diabetes, hypertension, waistline, bmi, heart, kidney, good_w, good_w2, pronunciation, actions, creatinine, na, fasting_sugar, kk, hba1c, pp, hgb, ca, hct, fe, tibc, ua, ferritin, cholesterol, triglyceride, add_time)VALUES(";
	$sql2 .= "'" . $_POST['userid'] . "' , ";
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
	$sql2 .= "'" . time() . "')";
	$check[] = mysql_query($sql);
	$check[] = mysql_query($sql2);
	if ( in_array('0', $check) )
	{
		showMsg('資料寫入發生問題，請洽系統管理員!!');
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
  var i, args=MM_goToURL.arguments; 
  document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>

<body>

<div id="page_wrapper">

<?PHP include_once ROOT_PATH . '/menubar.php';?>   


<div id="content_wrapper"><!-- InstanceBeginEditable name="EditRegion2" --><br />
  <div id="left_side">

<h3>你的慢性腎臟病是</h3>
<form id="form1" name="form1" method="post" action="">
  <label>
  第
  <input name="textfield" type="text" value="I" size="6" />
  </label>
  級
  <br />
  <br />
  <table width="100%" border="0">
    <tr>
      <td><span class="style4 style5">GFR: 腎絲球過濾率</span>
        <p class="style4 style5">慢性腎臟病第一期 (GFR ≧ 90ml/min/1.73m) <br />
          慢性腎臟病第二期 (GFR60~89ml/min/1.73 m) <br />
          慢性腎臟病第三期 (GFR30~59ml/min/1.73 m) <br />
          慢性腎臟病第四期 (GFR15~29ml/min/1.73 m2) <br />
          慢性腎臟病第五期 (GFR＜15ml/min/1.73 m2) </p></td>
      <td><span class="style4 style5"><img src="/img/strawberries.jpg" class="float_right" alt="Strawberries" /></span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><div align="right">
        <input name="ok" type="submit" id="ok" onClick="MM_goToURL('parent','userlogin.php');return document.MM_returnValue" value="完成" />
      </div></td>
      </tr>
  </table>
</form>
</div>
<!-- InstanceEndEditable -->

<div id="spacer"></div>

</div>

<div id="page_footer">

<p>&copy; 2009 網頁最佳解析度1024*768<br />
更新時間 07/14/2009</p>

</div>

</div>

</body>
</html>
