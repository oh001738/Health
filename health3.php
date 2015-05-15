<?PHP
include_once 'config.php';

header_print(true);   //載入header檔
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
		$nowL = array('首頁' => 'index.php', '配餐' => 'kfoodroot.php');
		echo show_path_url($nowL);
		?>
		</td>
	</tr>
	<tr>
		<td valign = 'top' align = 'center'>
		  <div class = 'title3' style = 'padding-left:45px'>請選擇您最近的檢驗值<span style = 'padding-left:10px'>(倘若不方便提供，請直接跳過)</span></div>
		  <span class = "text13px" style = 'padding-left:45px'><font color = '#8F19FF'>(請盡量填寫，不知道的部份可以空下來不必填寫，各醫院正常值可能會有輕微差異)</font></span>
		  <table width="85%" border="0" cellspacing = '1' cellpadding = '4' align="center">
		  <form id="form1" name="form1" method="post" action="health5.php">
		  <tr>
		     <td colspan = '2' align = 'center'><input type="button" name="ok" id="ok" value="下一頁" onclick = 'check_int();'></td>
		  </tr>
	      <tr bgcolor = '#FFFFFF'>
		     <td width = '40%'>血中肌肝酸 Creatinine </td>
			 <td><input name = 'creatinine' type = 'text' id = 'creatinine'  style = 'width:80px' onblur = 'ckhealth("creatinine", 0.7, 1.4)'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(0.7~1.4)</font></td>
		  </tr>
		  <tr bgcolor = '#FFFFFF'>
		     <td>血鈉  Na</td>
			 <td><input type = 'text' name = 'na' id = 'na'  style = 'width:80px' onblur = 'ckhealth("na", 137, 153)'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(0.7~1.4)</font></td>
		  </tr>
		  <tr bgcolor = '#FFFFFF'>
		     <td>血尿素氮 BUN</td>
			 <td><input type = 'text' name = 'bun' id = 'bun'  style = 'width:80px' onblur = 'ckhealth("bun", 5, 25)'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(5~25)</font></td>
		  </tr>
		  <tr bgcolor = '#FFFFFF'>
		     <td>血鉀 K</td>
			 <td><input type = 'text' name = 'kk' id = 'kk'  style = 'width:80px' onblur = 'ckhealth("kk", 3.5, 5.0)'> meg/dl <font style = 'color:#1C19FF;font-weight:800'>(3.5~5.0)</font></td>
		  </tr>
		  <tr bgcolor = '#FFFFFF'>
		     <td>空腹血糖 Fasting sugar</td>
			 <td><input type = 'text' name = 'fasting_sugar' id = 'fasting_sugar' style = 'width:80px' onblur = 'ckhealth("fasting_sugar", 70, 110)'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(70~110)</font></td>
		  </tr>
		  <tr bgcolor = '#FFFFFF'>
		     <td>血磷  P</td>
			 <td><input type = 'text' name = 'pp' id = 'pp' style = 'width:80px' onblur = 'ckhealth("pp", 2.5, 4.5)'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(2.5~4.5)</font></td>
		  </tr>
		  <tr bgcolor = '#FFFFFF'>
		     <td>糖化血色素 HbA1C</td>
			 <td><input type = 'text' name = 'hba1c' id = 'hba1c' style = 'width:80px' onblur = 'ckhealth("hba1c", 4, 6)'> % <font style = 'color:#1C19FF;font-weight:800'>(4~6)</font></td>
		  </tr>
		  <tr bgcolor = '#FFFFFF'>
		     <td>血鈣 Ca</td>
			 <td><input type = 'text' name = 'ca' id = 'ca' style = 'width:80px' onblur = 'ckhealth("ca", 8.4, 10.2)'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(8.4~10.2)</font></td>
		  </tr>
		  <tr bgcolor = '#FFFFFF'>
		     <td>血色素  Hgb</td>
			 <td><input type = 'text' name = 'hgb' id = 'hgb' style = 'width:80px' onblur = 'ckhealth2("hgb", <?PHP if ($_POST['user_sex'] == '男'){ echo 1; }else{ echo 0;}?>, 12.3, 18.3, 11.3, 15.3)'> g/dl <font style = 'color:#1C19FF;font-weight:800'>(男:12.3~18.3 女:11.3~15.3)</font></td>
		  </tr>
		  <tr bgcolor = '#FFFFFF'>
		     <td>血鐵  Fe</td>
			 <td><input type = 'text' name = 'fe' id = 'fe' style = 'width:80px' onblur = 'ckhealth("fe", 50, 160)'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(50~160)</font></td>
		  </tr>
		  <tr bgcolor = '#FFFFFF'>
		     <td>血容比  Hct</td>
			 <td><input type = 'text' name = 'hct' id = 'hct' style = 'width:80px' onblur = 'ckhealth2("hct", <?PHP if ($_POST['user_sex'] == '男'){ echo 1; }else{ echo 0;}?>, 40, 52, 37, 47)'> % <font style = 'color:#1C19FF;font-weight:800'>(男:40~52 女:37~47)</font></td>
		  </tr>
		  <tr bgcolor = '#FFFFFF'>
		     <td>鐵總結合能力 TIBC</td>
			 <td><input type = 'text' name = 'tibc' id = 'tibc' style = 'width:80px' onblur = 'ckhealth("tibc", 175, 375)'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(175~375)</font></td>
		  </tr>
		  <tr bgcolor = '#FFFFFF'>
		     <td>尿酸  Ua</td>
			 <td><input type = 'text' name = 'ua' id = 'ua' style = 'width:80px' onblur = 'ckhealth("ua", 2.4, 7.2)'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(2.4~7.2)</font></td>
		  </tr>
		  <tr bgcolor = '#FFFFFF'>
		     <td>血清轉鐵蛋白 Ferritin</td>
			 <td><input type = 'text' name = 'ferritin' id = 'ferritin' style = 'width:80px' onblur = 'ckhealth("ferritin", 10, 300)'> mg/ml <font style = 'color:#1C19FF;font-weight:800'>(10~300)</font></td>
		  </tr>
		  <tr bgcolor = '#FFFFFF'>
		     <td>膽固醇 Cholesterol</td>
			 <td><input type = 'text' name = 'cholesterol' id = 'cholesterol' style = 'width:80px' onblur = 'ckhealth("cholesterol", 0, 200)'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(0~200)</font></td>
		  </tr>
		  <tr bgcolor = '#FFFFFF'>
		     <td>中性脂肪 (三酸甘油)Triglyceride</td>
			 <td><input type = 'text' name = 'triglyceride' id = 'triglyceride' style = 'width:80px' onblur = 'ckhealth("triglyceride", 0, 200)'> mg/dl <font style = 'color:#1C19FF;font-weight:800'>(0~200)</font></td>
		  </tr>
		  <tr bgcolor = '#FFFFFF'>
		     <td colspan = '2' align = 'center'>
			 <div style = 'padding-right:20px'>
			 <?PHP
			 $hidden = $_POST;
			 foreach ( $hidden as $key => $value )
			 {
				echo "<input type = 'hidden' id = '" . $key . "' name = '" . $key . "' value = '" . $value . "'>\n";
			 }
			 ?>
			 <input type="button" name="ok" id="ok" value="下一頁" onclick = 'check_int();'>
			 </div>
		     </td>
		  </tr>
		  </form>
		  </table>
		</td>
		<td class = 'rightmenu' valign = 'top'><?PHP include_once 'right_menu.php';?></td>
	</tr>
	</table>
	<br><?PHP include_once ROOT_PATH . "/footer.php";?>
	</td>
</tr>
</table>
</body>
</html>
