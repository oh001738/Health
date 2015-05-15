<?PHP
include "config.php";

if ( !ck_guest_value(session_id()) )
{
	phpDirect(ROOT_URL . '/health1.php');
}

if (!$_GET['percent'] || !$_GET['meal'] || !$_GET['rand'])
{
	phpDirect(ROOT_URL . '/kfoodroot.php');
}

if ( $_POST['ch_food'])
{
	$sql = "INSERT INTO guest_food (food_id, rand, cal, percent, portion, meal, session_id, flag, add_time)VALUES(";
	$sql .= "'" . $_POST['food_id'] . "', ";
	$sql .= "'" . $_GET['rand'] . "', ";
	$sql .= "'" . $_POST['cal'] . "', ";
	$sql .= "'" . $_GET['percent'] . "', ";
	$sql .= "'" . $_POST['portion'] . "', ";
	$sql .= "'" . $_GET['meal'] . "', ";
	$sql .= "'" . session_id() . "', ";
	$sql .= "'0', ";
	$sql .= "'" . time() . "')";
	if ( !mysql_query($sql))
	{
		showMsg('選取失敗，請洽系統管理員!!');
	}
}

header_print(true);   //載入header檔

?>

<style type="text/css">
<!--
.style9 {color: #FFFFFF}
.style11 {font-size: 14px}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_popupMsg(msg) { //v1.0
  alert(msg);
}

function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>

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
		$nowL['首頁'] = 'index.php';
		$nowL['配餐'] = 'kfoodroot.php';
		$nowL[$FOODTYPE[$_GET['class']]] = '';
		echo show_path_url($nowL);
		?>
		</div>
		</td>
	</tr>	
	</table>
	</td>
</tr>
<tr>
	<td valign = 'top'>
	<table border = '0' cellpadding = '2' cellspacing = '0' width = '100%'>
	<tr>
		<td class = 'leftmenu' valign = 'top'>
		<div style = 'padding-left:10px'>
		  <div class = 'title'><img src="img/leftmenu_tittle03.jpg" width="155" height="45"></div>
		</div>
		<table border = '0' cellpadding = '2' cellspacing = '1' width = '100%'>
		<tr id = 'food' name = 'food'>
			<td class = 'text13px'>
			<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food1&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'food1' name = 'food1'>全榖根莖類</a></div>
			<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food2&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'food2' name = 'food2'>豆魚肉蛋類</a></div>
			<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food3&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'food3' name = 'food3'>蔬菜類</a></div>
			<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food4&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'food4' name = 'food4'>水果類</a></div>
			<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food5&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'food5' name = 'food5'>油脂類</a></div>
			<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food6&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'food6' name = 'food6'>奶類</a></div>
			<div style = 'padding-top:10px;padding-left:30px'><a href = "javascript:show_display('other_div');" onmouseover = "show_display('other_div');" id = 'food7' name = 'food7'>其它</a></div>
			<div id = 'other_div' name = 'other_div' style = 'display:none'>
				<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo base64_encode('調味料');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food1' name = 'class2_food1'>調味料</a></div>
				<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo base64_encode('中式早餐');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food2' name = 'class2_food2'>中式早餐</a></div>
				<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo base64_encode('西式早餐');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food3' name = 'class2_food3'>西式早餐</a></div>
				<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo base64_encode('家常菜');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food4' name = 'class2_food4'>家常菜</a></div>
				<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo base64_encode('小吃');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food5' name = 'class2_food5'>小吃</a></div>
				<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo base64_encode('套餐');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food6' name = 'class2_food6'>套餐</a></div>
				<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo base64_encode('零食點心');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food7' name = 'class2_food7'>零食點心</a></div>
				<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo base64_encode('飲料');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food8' name = 'class2_food8'>飲料</a></div>
				<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo base64_encode('酒類');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food9' name = 'class2_food9'>酒類</a></div>
			</div>
			</td>
		</tr>
		</table>
		</div>
		<a href = '<?PHP echo ROOT_URL;?>/food_plate.php?percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>'><div style = 'padding-top:10px;padding-left:10px'>
		  <div class = 'title'><img src="img/right_menu_03-1.jpg" width="146" height="36" border="0" /></div>
		</div></a>
		<div style = 'padding-top:10px' class = 'text15px'>
		<?PHP
		echo "<div style = 'padding-top:10px;padding-left:10px'>\n";
		include_once 'needcal.php';
		echo "</div>\n";
		//暫存所需熱量hidden欄位
		echo "<input type = 'hidden' id = 'h_needcal' name = 'h_needcal' value = '" . $needCal . "'>\n";
		if ( countSQL('guest_food', 'id', "WHERE session_id = '" . session_id() . "'") > 0 )
		{
			echo "<div style = 'padding-top:20px'>\n";
			echo "<div style = 'padding-top:10px;padding-left:10px'><div class = 'title'>今日配餐紀錄</div></div>\n";
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
					echo "<div style = 'padding-top:10px;padding-left:15px' class = 'text13px'><a href = '" . ROOT_URL . "/save_plate.php?percent=" . $logPlate[$key]['percent'] . "&meal=" . $logPlate[$key]['meal'] . "'>" . $MEALTYPE[$logPlate[$key]['meal']] . " - 份量：" . $percent . "</a></div>\n";
				}else{
					echo "<div style = 'padding-top:10px;padding-left:15px' class = 'text13px'><a href = '" . ROOT_URL . "/food_plate.php?percent=" . $logPlate[$key]['percent'] . "&meal=" . $logPlate[$key]['meal'] . "&rand=" . $key . "'>" . $MEALTYPE[$logPlate[$key]['meal']] . " - 份量：" . $percent . "</a></div>\n";
				}
			}
			echo "</div>\n";
		}
		echo "<div id = 'oldplate' name = 'oldplate' style = 'padding-top:10px;padding-left:10px;'>\n";
		if ( $USER['userid'] != '' )
		{ 
			$i = 0;
			echo "<div class = 'title'>我的配餐紀錄</div>\n";
			$plate = mysql_query("SELECT * FROM user_food WHERE userid = '" . $USER['userid'] . "' ORDER BY add_time DESC LIMIT 0,5");
			while ( $prow = mysql_fetch_array($plate) )
			{
				echo "<div style = 'padding-top:5px;padding-left:10px'><a href = '" . ROOT_URL . "/oldplate.php?percent=" . $_GET['percent'] . "&meal=" . $_GET['meal'] . "&rand=" . $_GET['rand'] . "&pid=" . $prow['id'] . "'><font style = 'font-size:13px'>" . date("Y-m-d", $prow['add_time']) . " - " . $MEALTYPE[$prow['meal']] . "</font></a></div>\n";
				$i++;
			}
			if ($i == 0)
			{
				echo "<div style = 'padding-top:5px;padding-left:15px' class = 'text13px'>尚無配餐紀錄</div>\n";
			}
		}
		echo "</div>\n";
		?>
		</td>
		<td valign = 'top'>
		<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
		<tr>
			<td width = '100%'>
			<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
			<tr>
				<td><div class = 'title3'><img src="img/myhistory.jpg" width="130" height="33"></div></td>
				<td>
				<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
				<form action = 'search_plate.php?percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' method = 'post' id = 'searchplateform' name = 'searchplateform'>
				<tr>
					<td class = 'text13px' align = 'right'>
					<div style = 'padding-right:5px'>
					<select id = 'year' name = 'year'>
					<?PHP
					for ($i = 2009; $i <= date("Y"); $i++)
					{
						$selected = ( $i == date("Y") )? 'selected' : '';
						$selected = ($_POST['year'] == $i)? 'selected' : $selected;
						echo "<option value = '" . $i . "' " . $selected . ">" . $i . "</option>\n";
					}
					?>
					</select> 年
					<select id = 'month' name = 'month'>
					<?PHP
					for ($i = 1; $i <= 12; $i++)
					{
						$selected = ( $i == date("n") )? 'selected' : '';
						$selected = ($_POST['month'] == $i)? 'selected' : $selected;
						echo "<option value = '" . $i . "' " . $selected . ">" . $i . "</option>\n";
					}
					?>
					</select> 月
					<select id = 'day' name = 'day'>
					<?PHP
					for ($i = 1; $i <= 31; $i++)
					{
						$selected = ( $i == date("d") )? 'selected' : '';
						$selected = ($_POST['day'] == $i)? 'selected' : $selected;
						echo "<option value = '" . $i . "' " . $selected . ">" . $i . "</option>\n";
					}
					?>
					</select> 日
					<input type = 'button' id = 'platesearch' name = 'platesearch' value = '查詢配餐紀錄' style = 'width:95px' onclick = 'cksearchplate()'>
					</div>
					</td>
				</tr>
				</form>
				</table>
				</td>
			</tr>
			</table>
		</tr>
		<tr>
			<td valign = 'top' align = 'center'>
			<table border = '0' cellpadding = '4' cellspacing = '1' width = '95%'>
			<tr bgcolor = '#FF9900'>
				<td align = 'center' class = 'text13px style9 style11'>新增日期</td>
				<td align = 'center' class = 'text13px style9 style11'>餐別</td>
				<td align = 'center' class = 'text13px style9 style11'>佔一天份量</td>
				<td align = 'center' class = 'text13px style9 style11'>熱量總數</td>
				<td align = 'center' class = 'text13px style9 style11'>備註</td>
				<td align = 'center' class = 'text13px style9 style11'>詳細資料</td>
			</tr>
			<?PHP
			$startTime = mktime(0, 0, 0, $_POST['month'], $_POST['day'], $_POST['year']);
			$endTime   = mktime(23, 59, 59, $_POST['month'], $_POST['day'], $_POST['year']);
			$sql = "SELECT * FROM user_food WHERE add_time >= '" . $startTime . "' AND add_time <= '" . $endTime . "' AND userid = '" . $USER['userid'] . "'";
			$result = mysql_query($sql);
			while ( $row = mysql_fetch_array($result) )
			{
				$calTotal = '';                          //熱量總數
				$foodId = explode(',', $row['food_id']); //食物ID
				$part   = explode(',', $row['part']);    //份量
				foreach ( $foodId as $key => $value )
				{
					$foodV = mysql_fetch_array(mysql_query("SELECT ch_id, ch_image, ch_name, kg, ch_k, ch_cholesterol, ch_fat, ch_e, ch_carbohydrate, ch_potassium, ch_sodium, ch_calcium, ch_phosphorous, ch_mg FROM choose_food WHERE ch_id = '" . $value . "'"));
					$FV[$value]['ch_id']           = $foodV['ch_id'];
					$FV[$value]['ch_image']        = $foodV['ch_image'];
					$FV[$value]['ch_name']         = $foodV['ch_name'];
					$FV[$value]['kg']              = $foodV['kg'];
					$FV[$value]['ch_k']            = $foodV['ch_k'];
					$FV[$value]['ch_cholesterol']  = $foodV['ch_cholesterol'];
					$FV[$value]['ch_fat']          = $foodV['ch_fat'];
					$FV[$value]['ch_e']            = $foodV['ch_e'];
					$FV[$value]['ch_carbohydrate'] = $foodV['ch_carbohydrate'];
					$FV[$value]['ch_potassium']    = $foodV['ch_potassium'];
					$FV[$value]['ch_sodium']       = $foodV['ch_sodium'];
					$FV[$value]['ch_calcium']      = $foodV['ch_calcium'];
					$FV[$value]['ch_phosphorous']  = $foodV['ch_phosphorous'];
					$FV[$value]['ch_mg']           = $foodV['ch_mg'];
					$FV[$value]['part']            = $part[$key];           //食物份量
					$calTotal = $calTotal + ($part[$key] * $foodV['ch_k']); //熱量總數
				}
				echo "<tr>\n";
				echo "	<td class = 'text13px' align = 'center'>" . date("Y-m-d", $row['add_time']) . "</td>\n";
				echo "	<td class = 'text13px' align = 'center'>" . $MEALTYPE[$row['meal']] . "</td>\n";
				if ( $row['percent'] == '1' ){ echo "	<td class = 'text13px' align = 'center'>1 份</td>\n"; }else{ echo "   <td class = 'text13px' align = 'center'>1 / " . $row['percent'] . " 份</td>\n"; }
				echo "	<td class = 'text13px' align = 'center'>" . $calTotal . "</td>\n";
				echo "	<td class = 'text13px'>" . wordnl2br($row['note']) .  "</td>\n";
				echo "	<td class = 'text13px' align = 'center'><a href = 'javascript:show_display(\"food_" . $row['id'] . "\");'>瀏覽</a></td>\n";
				echo "</tr>\n";
				echo "</tr>\n";
				echo "<tr id = 'food_" . $row['id'] . "' name = 'food_" . $row['id'] . "' style = 'display:none' colspan = '6'>\n";
				echo "	<td colspan = '6' align = 'center'>\n";
				echo "	<table border = '1' cellpadding = '2' cellspacing = '1' width = '100%' style = 'border-collapse:collapse;' bordercolor = '#787878;'>\n";
				echo "	<tr bgcolor = '#EEEEEE'>\n";
				echo "		<td class = 'text13px' align = 'center'></td>\n";
				echo "		<td class = 'text13px' align = 'center'>名稱</td>\n";
				echo "		<td class = 'text13px' align = 'center'>重量</td>\n";
				echo "		<td class = 'text13px' align = 'center'>份量</td>\n";
				echo "		<td class = 'text13px' align = 'center'>熱量</td>\n";
				echo "		<td class = 'text13px' align = 'center'>膽固醇</td>\n";
				echo "		<td class = 'text13px' align = 'center'>脂肪</td>\n";
				echo "		<td class = 'text13px' align = 'center'>蛋白質</td>\n";
				echo "		<td class = 'text13px' align = 'center'>份量</td>\n";
				echo "		<td class = 'text13px' align = 'center'>選取</td>\n";
				echo "	</tr>\n";
				foreach ( $foodId as $key => $value )
				{
					if ( $value == '' ){ continue; }
					echo "<form action = 'search_plate.php?percent=" . $_GET['percent'] . "&meal=" . $_GET['meal'] . "&rand=" . $_GET['rand'] . "' method = 'post' id = 'foodform_" . $value . "' name = 'foodform_" . $value . "'>\n";
					echo "<tr>\n";
					echo "  <td class = 'text13px' align = 'center'><a href = 'javascript:view_food(" . $FV[$value]['ch_id'] . ")'><img src = '" . IMG_URL . "/" . $FV[$value]['ch_image'] . "' width = '50' border = '0'></a></td>\n";
					echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['ch_name'] . "</td>\n";
					echo "  <td class = 'text13px' align = 'center'>" . round($FV[$value]['kg'], 1) . "</td>\n";
					echo "  <td class = 'text13px' align = 'center'>" . round($FV[$value]['part'], 1) . "</td>\n";
					echo "  <td class = 'text13px' align = 'center'>" . round(($FV[$value]['part'] * $FV[$value]['ch_k']), 1) . "</td>\n";
					echo "  <td class = 'text13px' align = 'center'>" . round($FV[$value]['ch_cholesterol'], 1) . "</td>\n";
					echo "  <td class = 'text13px' align = 'center'>" . round($FV[$value]['ch_fat'], 1) . "</td>\n";
					echo "  <td class = 'text13px' align = 'center'>" . round($FV[$value]['ch_e'], 1) . "</td>\n";
					echo "  <td class = 'text13px' align = 'center'>\n";
					echo "	<select id = 'portion' name = 'portion'>\n";
					echo "		<option value = '0.25'>0.25</option>\n";
					echo "		<option value = '0.33'>0.33</option>\n";
					echo "		<option value = '0.5'>0.5</option>\n";
					echo "		<option value = '0.75'>0.75</option>\n";
					echo "		<option value = '1' selected>1</option>\n";
					echo "		<option value = '1.5'>1.5</option>\n";
					echo "		<option value = '2'>2</option>\n";
					echo "	</select> 份</td>\n";
					echo "	<td align = 'center'>\n";
					echo "	<input type = 'hidden' id = 'ch_food' name = 'ch_food' value = '1'>\n";
					echo "	<input type = 'hidden' id = 'food_id' name = 'food_id' value = '" . $value . "'>\n";
					echo "	<input type = 'hidden' id = 'cal' name = 'cal' value = '" . $FV[$value]['ch_fat'] . "'>\n";
					echo "	<input type = 'hidden' id = 'year' name = 'year' value = '" . $_POST['year'] . "'>\n";
					echo "	<input type = 'hidden' id = 'month' name = 'month' value = '" . $_POST['month'] . "'>\n";
					echo "	<input type = 'hidden' id = 'day' name = 'day' value = '" . $_POST['day'] . "'>\n";
					echo "	<input type = 'submit' id = 'foodsubmit_" . $value . "' name = 'foodsubmit_" . $value . "' value = '選取'></td>\n";
					echo "</tr>\n";
					echo "</form>\n";
				}
				echo "	</table>\n";
				echo "	</td>\n";
				echo "</tr>\n";
				unset($carTotal,$foodId,$part);
			}
			?>
			</table>
			</td>
		</tr>
		</table>
		</td>
		<td class = 'rightmenu' valign = 'top'><?PHP include_once "right_menu.php";?></td>
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
function save_food(food_id, percent, meal, rand, cal)
{
	window.open('save_food.php?food_id=' + food_id + '&percent=' + percent + '&meal=' + meal + '&rand=' + rand + '&cal=' + cal,'','height=100,width=100,toolbar=no,scrollbars=no,resizable=no,top=0,left=0');
	var need_cal = document.getElementById('h_needcal').value - cal;
	document.getElementById('needcal').innerHTML = need_cal.toFixed(1);
	document.getElementById('h_needcal').value = need_cal.toFixed(1);
	if ( need_cal < 0 )
	{
		document.getElementById('needcal').style.color = '#FA0300';
	}else{
		document.getElementById('needcal').style.color = '#323232';
	}
}

//-->
</script>

</body>
</html>
