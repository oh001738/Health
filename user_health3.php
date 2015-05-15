<?PHP 
include_once 'config.php';
header_print(true);   //載入header檔

if ( trim($_POST['actions']) == '' )
{
	echo "<script language=\"JavaScript\">";
	echo "window.alert(\"請選擇您的活動量分級\");";
	echo "location.href('user_health2.php');";
	echo "</script>";
	exit;
}
?>

<style type="text/css">
<!--
.style2 {font-size: 11pt}
.style3 {color: #FFFFFF}
.style4 {color: #FF0000}
.style5 {color: #000000}
.style6 {font-size: 12px}
-->
</style>

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
		$nowL = array('首頁' => 'index.php', '註冊會員' => '');
		echo show_path_url($nowL);
		?></td>
	</tr>
	<tr>
	   <td valign = 'top'>
		<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
		<tr>
		    <td width = '180'><?PHP include_once ROOT_PATH . "/leftmenu.php";?></td>
			<td valign = 'top'>
			<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
			<tr>
				<td align = 'center'><div style = 'padding-top:15px'><h3>請選擇您最近的檢驗值</div>
				<div style = 'padding-top:10px;padding-bottom:10px'><font style = 'color:#FF0000'>倘若不方便提供，請直接跳過</font></div>
				<span class="style5 style6">(請盡量填寫，不知道的部份可以空下來不必填寫，各醫院正常值可能會有輕微差異)</span></h3>
				</td>
			</tr>
			<tr>
				<td align = 'center'>
				<table width = '90%' border = '0' cellpadding = '5' cellspacing = '1'>
				<form id = 'form1' name = 'form1' method = 'post' action = 'user_health4.php'>
				<tr>
				   <td colspan = '2' align = 'center'>
				   <input type="button" name="ok" id="ok" value="下一頁" onclick = 'check_int();'>
				   </td>
				</tr>
				<tr bgcolor = '#FFFFFF'>
				   <td width = '35%'><span class="style4 style5">血中肌肝酸 Creatinine </span></td>
				   <td><input type = 'text' name = 'creatinine' id = 'creatinine' onblur = 'ckhealth("creatinine", 0.7, 1.4)' style = 'width:100px'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(0.7~1.4)</font></td>
				</tr>
				<tr bgcolor = '#FFFFFF'>
				   <td><span class = 'style5'>血鈉  Na</span></td>
				   <td><input type = 'text' name = 'na' id = 'na' onblur = 'ckhealth("na", 137, 153)' style = 'width:100px'> mEq/l <font style = 'color:#1C19FF;font-weight:800'>(137~153)</font></td>
				</tr>
				<tr bgcolor = '#FFFFFF'>
				   <td><span class = 'style5'>血尿素氮 BUN</span></td>
				   <td><input type = 'text' name = 'bun' id = 'bun' onblur = 'ckhealth("bun", 5, 25)' style = 'width:100px'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(5~25)</font></td>
				</tr>
				<tr bgcolor = '#FFFFFF'>
				   <td><span class = 'style5'>血鉀 K</span></td>
				   <td><input type = 'text' name = 'kk' id = 'kk' onblur = 'ckhealth("bun", 5, 25)' style = 'width:100px'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(5~25)</font></td>
				</tr>
				<tr bgcolor = '#FFFFFF'>
				   <td><span class = 'style5'>空腹血糖 Fasting sugar</span></td>
				   <td><input type = 'text' name = 'fasting_sugar' id = 'fasting_sugar' onblur = 'ckhealth("fasting_sugar", 70, 110)' style = 'width:100px'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(70~110)</font></td>
				</tr>
				<tr bgcolor = '#FFFFFF'>
				   <td><span class = 'style5'>血磷  P</span></td>
				   <td><input type = 'text' name = 'pp' id = 'pp' onblur = 'ckhealth("pp", 2.5, 4.5)' style = 'width:100px'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(2.5~4.5)</font></td>
				</tr>
				<tr bgcolor = '#FFFFFF'>
				   <td><span class = 'style5'>糖化血色素 HbA1C</span></td>
				   <td><input type = 'text' name = 'hba1c' id = 'hba1c' onblur = 'ckhealth("hba1c", 4, 6)' style = 'width:100px'> % <font style = 'color:#1C19FF;font-weight:800'>(4~6)</font></td>
				</tr>
				<tr bgcolor = '#FFFFFF'>
				   <td><span class = 'style5'>血鈣 Ca</span></td>
				   <td><input type = 'text' name = 'ca' id = 'ca' onblur = 'ckhealth("ca", 8.4, 10.2)' style = 'width:100px'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(8.4~10.2)</font></td>
				</tr>
				<tr bgcolor = '#FFFFFF'>
				   <td><span class = 'style5'>血色素  Hgb</span></td>
				   <td><input type = 'text' name = 'hgb' id = 'hgb' onblur = 'ckhealth2("hgb", <?PHP if ($_POST['user_sex'] == '男'){ echo 1; }else{ echo 0;}?>, 12.3, 18.3, 11.3, 15.3)' style = 'width:100px'> g/dl <font style = 'color:#1C19FF;font-weight:800'>(男：12.3~18.3 女：11.3~15.3)</font></td>
				</tr>
				<tr bgcolor = '#FFFFFF'>
				   <td><span class = 'style5'>血鐵  Fe</span></td>
				   <td><input type = 'text' name = 'fe' id = 'fe' onblur = 'ckhealth("fe", 50, 160)' style = 'width:100px'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(50~160)</font></td>
				</tr>
				<tr bgcolor = '#FFFFFF'>
				   <td><span class = 'style5'>血容比  Hct</span></td>
				   <td><input type = 'text' name = 'hct' id = 'hct' onblur = 'ckhealth2("hct", <?PHP if ($_POST['user_sex'] == '男'){ echo 1; }else{ echo 0;}?>, 40, 52, 37, 47)' style = 'width:100px'> % <font style = 'color:#1C19FF;font-weight:800'>(男：40~52 女：37~47)</font></td>
				</tr>
				<tr bgcolor = '#FFFFFF'>
				   <td><span class = 'style5'>鐵總結合能力 TIBC</span></td>
				   <td><input type = 'text' name = 'tibc' id = 'tibc' onblur = 'ckhealth("tibc", 175, 375)' style = 'width:100px'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(175~375)</font></td>
				</tr>
				<tr bgcolor = '#FFFFFF'>
				   <td><span class = 'style5'>尿酸  Ua</span></td>
				   <td><input type = 'text' name = 'ua' id = 'ua' onblur = 'ckhealth("ua", 2.4, 7.2)' style = 'width:100px'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(2.4~7.2)</font></td>
				</tr>
				<tr bgcolor = '#FFFFFF'>
				   <td><span class = 'style5'>血清轉鐵蛋白 Ferritin</span></td>
				   <td><input type = 'text' name = 'ferritin' id = 'ferritin' onblur = 'ckhealth("ferritin", 10, 300)' style = 'width:100px'> mg/ml <font style = 'color:#1C19FF;font-weight:800'>(10~300)</font></td>
				</tr>
				<tr bgcolor = '#FFFFFF'>
				   <td><span class = 'style5'>膽固醇 Cholesterol</span></td>
				   <td><input type = 'text' name = 'cholesterol' id = 'cholesterol' onblur = 'ckhealth("cholesterol", 0, 200)' style = 'width:100px'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(0~200)</font></td>
				</tr>
				<tr bgcolor = '#FFFFFF'>
				   <td><span class = 'style5'>中性脂肪 (三酸甘油) Triglyceride</span></td>
				   <td><input type = 'text' name = 'triglyceride' id = 'triglyceride' onblur = 'ckhealth("triglyceride", 0, 200)' style = 'width:100px'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(0~200)</font></td>
				</tr>
				<tr>
				   <td colspan = '2' align = 'center'>
				   <?PHP
				   $hidden = $_POST;
				   foreach ( $hidden as $key => $value )
				   {
					   echo "<input type = 'hidden' id = '" . $key . "' name = '" . $key . "' value = '" . $value . "'>\n";
				   }
				   ?>
				   <input type="button" name="ok" id="ok" value="下一頁" onclick = 'check_int();'>
				   </td>
			    </tr>
				</table>
				</td>
			  </tr>
			  </table>
			  </td>
		   </tr>
		   </table>
		</form>
		</td>
	</tr>
	<tr>
		<td>
		<?PHP include_once ROOT_PATH . "/footer.php";?>
		</td>
	</tr>
	</table>
	<td>
</tr>
</table>
</body>
</html>
