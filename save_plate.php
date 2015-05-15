<?PHP
include "config.php";

if ( !ck_guest_value(session_id()) )
{
	phpDirect(ROOT_URL . '/health1.php');
}

header_print(true);   //載入header檔

if ($_POST)
{
	if ( ck_login( session_id() ) )  //判斷是否登入會員,儲存餐盤資料
	{
		$FoodId = '';
		$Parts = '';
		$sql = "SELECT * FROM guest_food WHERE session_id = '" . session_id() . "' AND rand = '" . $_POST['rand'] . "'";
		$result = mysql_query($sql);
		while ( $rows = mysql_fetch_array($result) )
		{
			$FoodId .= $rows['food_id'] . ",";
			$Parts .= $_POST['part_' . $rows['food_id']] . ",";
		}
		if ( trim($_FILES["img"]["name"]) != '')
		{
			$filePath = ROOT_PATH . "/upload/";		//檔案複製路徑
			$filetypeArr = explode('.', strrev($_FILES["img"]["name"]));
			$fileType = strrev($filetypeArr[0]);
			if ( !in_array($fileType, $OnlyFileType) )
			{
				$i = 1;
				foreach ($OnlyFileType as $value)
				{
					$file_type .= $value;
					if ($i < count($OnlyFileType)){ $file_type .= ', '; }
					$i++;

				}
				showMsg("上傳檔名只限" . $file_type);
				reDirect(ROOT_URL . "/food_plate.php?percent=" . $_POST['percent'] . "&meal=" . $_POST['meal'] . "&rand=" . $_POST['rand']);
				exit;
			}else{
				$fileName = strrev(time()) . rand(0,9) . "." . $fileType;  //檔案名稱改為時間刻計反轉+1個亂數
				$tmp = $_FILES["img"]["tmp_name"];		
				$upimg = ( copy($tmp , $filePath . $fileName) )? $fileName : '';				
			}
		}else{
			$upimg = $_POST['hiddenimg'];
		}
		$inSQL = "INSERT INTO user_food (userid, food_id, part, percent, meal, note, img, add_time)VALUES(";
		$inSQL .= "'" . $USER['userid'] . "' , ";
		$inSQL .= "'" . $FoodId . "' , ";
		$inSQL .= "'" . $Parts . "' , ";
		$inSQL .= "'" . $_POST['percent'] . "' , ";
		$inSQL .= "'" . $_POST['meal'] . "' , ";
		$inSQL .= "'" . ckString($_POST['note']) . "' , ";
		$inSQL .= "'" . $upimg . "' , ";
		$inSQL .= "'" . time() . "')";
		mysql_query($inSQL);
		
	}
	//修改食物份量
	$o_value = mysql_query("SELECT id, food_id FROM guest_food WHERE session_id = '" . session_id() . "' AND rand = '" . $_POST['rand'] . "'");
	while ( $o_row = mysql_fetch_array($o_value) )
	{
		mysql_query("UPDATE guest_food SET portion = '" . $_POST['part_' . $o_row['food_id']] . "', note = '" . ckString($_POST['note']) . "' WHERE id = '" . $o_row['id'] . "'");
	}
	//將flag設定為1表示該餐盤已過期
	mysql_query("UPDATE guest_food SET flag = '1' WHERE session_id = '" . session_id() . "' AND rand = '" . $_POST['rand'] . "'");
	//刪除過期餐盤資料及訪客資料
	delete_value('guest_food', "WHERE add_time < '" . (time() - COOKIE_TIME) . "'");
	delete_value('guest_health', "WHERE add_time < '" . (time() - COOKIE_TIME) . "'");
	}
delete_value('guest_food', "WHERE session_id = '" . session_id() . "' OR add_time <= '" . (time() - COOKIE_TIME) . "'" ); //akai新增 新增食物完 刪除cookies 轉回首頁0513pm1118
reDirect(ROOT_URL);  //轉回首頁0513pm1118
?>

<style type="text/css">
<!--
.style9 {color: #FFFFFF}
.style14 {font-size: 14px}
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
		$nowL['首頁'] = 'index.php';
		$nowL['配餐'] = 'kfoodroot.php';
		$nowL['個人餐盤'] = '';
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
	<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
	<tr>
		<td valign = 'top' class = 'leftmenu'>
		<div style = 'padding-left:15px'>
		<div class = 'title'><strong><img src="img/leftmenu_tittle03.jpg" width="155" height="45" border="0"></strong></div>
		<table border = '0' cellpadding = '2' cellspacing = '1' width = '100%'>
		<tr>
			<td class = 'text13px'>
			<div style = 'padding-top:10px'>
			餐別
			<select id = 'meal' name = 'meal' style = 'font-size:13px' onchange = 'show_food()'>
				<option value = 'breakfast'>早餐</option>
				<option value = 'lunch'>午餐</option>
				<option value = 'dinner'>晚餐</option>
			</select>
			</div>
			<div style = 'padding-top:10px'>
			佔一天份量
			<select id = 'percent' name = 'percent' onchange = 'show_food()' style = 'font-size:13px'>
				<option value = '' selected>請選擇</option>
				<option value = '6'>1 / 6</option>
				<option value = '5'>1 / 5</option>
				<option value = '4'>1 / 4</option>
				<option value = '3'>1 / 3</option>
				<option value = '2'>1 / 2</option>
				<option value = '1'>1</option>
			</select>
			</div>
			</td>
		</tr>
		<tr id = 'food' name = 'food' style = 'display:none'>
			<td class = 'text13px'>
			<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food1' id = 'food1' name = 'food1'>全榖根莖類</a></div>
			<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food2' id = 'food2' name = 'food2'>豆魚肉蛋類</a></div>
			<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food3' id = 'food3' name = 'food3'>蔬菜類</a></div>
			<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food4' id = 'food4' name = 'food4'>水果類</a></div>
			<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food5' id = 'food5' name = 'food5'>油脂類</a></div>
			<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food6' id = 'food6' name = 'food6'>奶類</a></div>
			<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7' id = 'food7' name = 'food7'>其它</a></div>
			</td>
		</tr>
		</table>
		</div>
		<?PHP
		echo "<div style = 'padding-top:10px;padding-left:10px'>\n";
		include_once 'needcal.php';
		echo "</div>\n";
		if ( countSQL('guest_food', 'id', "WHERE session_id = '" . session_id() . "'") > 0 )
		{
			echo "<div style = 'padding-top:20px;padding-left:15px'>\n";
			echo "<div class = 'title'>今日配餐紀錄</div>\n";
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
					echo "<div style = 'padding-top:10px;padding-left:30px' class = 'text13px'><a href = '" . ROOT_URL . "/save_plate.php?percent=" . $logPlate[$key]['percent'] . "&meal=" . $logPlate[$key]['meal'] . "'>" . $MEALTYPE[$logPlate[$key]['meal']] . " - 份量：" . $percent . "</a></div>\n";
				}else{
					echo "<div style = 'padding-top:10px;padding-left:30px' class = 'text13px'><a href = '" . ROOT_URL . "/food_plate.php?percent=" . $logPlate[$key]['percent'] . "&meal=" . $logPlate[$key]['meal'] . "&rand=" . $key . "'>" . $MEALTYPE[$logPlate[$key]['meal']] . " - 份量：" . $percent . "</a></div>\n";
				}
			}
			echo "</div>\n";
		}
		?>
		</td>
		<td valign = 'top' align = 'center'>
		<table border = '0' cellpadding = '2' cellspacing = '1' width = '95%'>
		<form action = 'save_plate.php' id = 'plate' name = 'plate' method = 'post'>
		<tr bordercolor="#FFFFFF" bgcolor = '#EDEDED'>
			<td><span class="style14"></span></td>
			<td align = 'center' bgcolor="#FF9900"><font class = 'text13px style9 style14'>食物名稱</font></td>
			<td align = 'center' bgcolor="#FF9900"><font class = 'text13px style9 style14'>份量</font></td>
			<td align = 'center' bgcolor="#FF9900"><font class = 'text13px style9 style14'>熱量<br>
			  (kcal)</font></td>
			<td align = 'center' bgcolor="#FF9900"><font class = 'text13px style9 style14'>膽固醇<br>
			  (mg)</font></td>
			<td align = 'center' bgcolor="#FF9900"><font class = 'text13px style9 style14'>脂肪<br>
			  (mg)</font></td>
			<td align = 'center' bgcolor="#FF9900"><font class = 'text13px style9 style14'>蛋白質<br>
			  (mg)</font></td>
			<td align = 'center' bgcolor="#FF9900"><font class = 'text13px style9 style14'>醣類<br>
			  (mg)</font></td>
			<?PHP
			if ( trim($USER['username']) != '')   //判斷是否有登入會員，可看更多資料
			{
				echo "<td align = 'center'><font class = 'text13px'>鉀</font></td>\n";
				echo "<td align = 'center'><font class = 'text13px'>鈉</font></td>\n";
				echo "<td align = 'center'><font class = 'text13px'>鈣</font></td>\n";
				echo "<td align = 'center'><font class = 'text13px'>磷</font></td>\n";
				echo "<td align = 'center'><font class = 'text13px'>鎂</font></td>\n";
			}
			?>
		</tr>
		<?PHP
		$i = 0;
		$getMeal = ($_GET['meal'])? $_GET['meal'] : $_POST['meal'];
		$getPerc = ($_GET['percent'])? $_GET['percent'] : $_POST['percent'];
		$sql = "SELECT * FROM guest_food WHERE session_id = '" . session_id() . "' AND flag = '1' AND meal = '" . $getMeal . "' AND percent = '" . $getPerc . "'";
		$result = mysql_query($sql);
		while ( $row = mysql_fetch_array($result) )
		{
			$food_value = mysql_fetch_array(mysql_query("SELECT * FROM choose_food WHERE ch_id = '" . $row['food_id'] . "'"));
			echo "<tr>\n";
			echo "	<td><img src = '" . IMG_URL . "/" . $food_value['ch_image'] . "' width = '80' border = '0'></td>\n";
			echo "	<td class = 'text13px'>" . $food_value['ch_name'] . "</td>\n";
			echo "	<td class = 'text13px'>";
			if ( $row['portion'] == '0.25'){ echo '0.25'; }
			if ( $row['portion'] == '0.33'){ echo '0.33'; }
			if ( $row['portion'] == '0.5') { echo '0.5'; }
			if ( $row['portion'] == '0.75'){ echo '0.75'; }
			if ( $row['portion'] == '1'){ echo '1'; }
			if ( $row['portion'] == '1.5'){ echo '1.5'; }
			if ( $row['portion'] == '2'){ echo '2'; }
			echo " 份</td>\n";
			$c_cal = round(($row['portion'] * $food_value['ch_k']), 1);            //重新計算熱量份數
			$c_cho = round(($row['portion'] * $food_value['ch_cholesterol']), 1);  //重新計算熱量份數
			$c_fat = round(($row['portion'] * $food_value['ch_fat']), 1);          //重新計算熱量份數
			$c_e   = round(($row['portion'] * $food_value['ch_e']), 1);            //重新計算熱量份數
			$c_car = round(($row['portion'] * $food_value['ch_carbohydrate']), 1); //重新計算熱量份數
			if ( trim($USER['username']) != '')   //判斷是否有登入會員，可看更多資料
			{
				$c_pot = round(($row['portion'] * $food_value['ch_potassium']), 1);  //重新計算熱量份數
				$c_sod = round(($row['portion'] * $food_value['ch_sodium']), 1);     //重新計算熱量份數
				$c_calc = round(($row['portion'] * $food_value['ch_calcium']), 1);    //重新計算熱量份數
				$c_pho = round(($row['portion'] * $food_value['ch_phosphorous']), 1);//重新計算熱量份數
				$c_mg  = round(($row['portion'] * $food_value['ch_mg']), 1);         //重新計算熱量份數
			}
			echo "	<td class = 'text13px' align = 'center'>" . $c_cal . "</td>\n";
			echo "	<td class = 'text13px' align = 'center'>" . $c_cho . "</td>\n";
			echo "	<td class = 'text13px' align = 'center'>" . $c_fat . "</td>\n";
			echo "	<td class = 'text13px' align = 'center'>" . $c_e . "</td>\n";
			echo "	<td class = 'text13px' align = 'center'>" . $c_car . "</td>\n";
			if ( trim($USER['username']) != '')   //判斷是否有登入會員，可看更多資料
			{
				echo "	<td class = 'text13px' align = 'center'>" . round($food_value['ch_potassium'], 1) . "</td>\n";
				echo "	<td class = 'text13px' align = 'center'>" . round($food_value['ch_sodium'], 1) . "</td>\n";
				echo "	<td class = 'text13px' align = 'center'>" . round($food_value['ch_calcium'], 1) . "</td>\n";
				echo "	<td class = 'text13px' align = 'center'>" . round($food_value['ch_phosphorous'], 1) . "</td>\n";
				echo "	<td class = 'text13px' align = 'center'>" . round($food_value['ch_mg'], 1) . "</td>\n";
			}
			echo "</tr>\n";
			$cal[]          = $c_cal; //熱量總數
			$cholesterol[]  = $c_cho; //膽固醇總數
			$fat[]          = $c_fat; //脂肪總數
			$egg[]          = $c_e;   //蛋白質總數
			$carbohydrate[] = $c_car; //醣類總數
			$potassium[]    = $c_pot; //鉀總數
			$sodium[]       = $c_sod; //鈉總數
			$calcium[]      = $c_calc;//鈣總數
			$phosphorous[]  = $c_pho; //磷總數
			$mg[]           = $c_mg;  //鎂總數
			$i++;
			$noteValue = wordnl2br($row['note']);
		}
		
		if ($i == 0)
		{
			echo "<tr>\n";
			echo "	<td colspan = '9' align = 'center' class = 'text15px'><div style = 'padding-top:10px'><font color = '#FA0300'>您的餐盤中尚無食物喔!!</font></div></td>\n";
			echo "</tr>\n";
		}else{
			echo "<tr>\n";
			echo "	<td class = 'text13px' colspan = '3' align = 'right'>總計</td>\n";
			echo "	<td class = 'text13px' align = 'center' id = 'carTotal' name = 'carTotal'>" . array_sum($cal) . "</td>\n";
			echo "	<td class = 'text13px' align = 'center' id = 'choTotal' name = 'choTotal'>" . array_sum($cholesterol) . "</td>\n";
			echo "	<td class = 'text13px' align = 'center' id = 'fatTotal' name = 'fatTotal'>" . array_sum($fat) . "</td>\n";
			echo "	<td class = 'text13px' align = 'center' id = 'eggTotal' name = 'eggTotal'>" . array_sum($egg) . "</td>\n";
			echo "	<td class = 'text13px' align = 'center' id = 'carbTotal' name = 'carbTotal'>" . array_sum($carbohydrate) . "</td>\n";
			if ( trim($USER['username']) != '')   //判斷是否有登入會員，可看更多資料
			{
				echo "	<td class = 'text13pxbold' align = 'center' id = 'potTotal' name = 'potTotal'>" . array_sum($potassium) . "</td>\n";
				echo "	<td class = 'text13pxbold' align = 'center' id = 'sodTotal' name = 'sodTotal'>" . array_sum($sodium) . "</td>\n";
				echo "	<td class = 'text13pxbold' align = 'center' id = 'calcTotal' name = 'calcTotal'>" . array_sum($calcium) . "</td>\n";
				echo "	<td class = 'text13pxbold' align = 'center' id = 'phoTotal' name = 'phoTotal'>" . array_sum($phosphorous) . "</td>\n";
				echo "	<td class = 'text13pxbold' align = 'center' id = 'mgbTotal' name = 'mgbTotal'>" . array_sum($mg) . "</td>\n";
			}
			echo "</tr>\n";
		}
		if ( trim($noteValue) != '' )
		{
			echo "<tr>\n";
			echo "	<td align = 'right' class = 'text13px'>備註欄：</td>\n";
			echo "  <td class = 'text13px' colspan = '5'>" . $noteValue . "</td>\n";
			echo "</tr>\n";
		}
		//刪除資料庫中的過期資料
		delete_value('guest_food', "WHERE add_time < '" . COOKIE_TIME . "'");
		?>
		</table>
		<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
		<tr>	
			<td align = 'right' class = 'text13px'>
			<div style = 'padding-top:10px'>
			<span style = 'padding-right:10px'><a href = '<?PHP echo ROOT_URL;?>/img/每日飲食建議菜單-98.6.17.doc'>列印建議菜單</a></span>
			<span style = 'padding-right:10px'><a href = '<?PHP echo ROOT_URL;?>/img/飲食份量及熱量表--低蛋白飲食-980617.xls'>列印衛教單</a></span>
			</div>
			</td>
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
function show_food()
{
	if (document.getElementById('percent').options[document.getElementById('percent').selectedIndex].value == '')
	{
		document.getElementById('food').style.display = 'none';
	}else{
		var p_value = document.getElementById('percent').options[document.getElementById('percent').selectedIndex].value;
		var m_value = document.getElementById('meal').options[document.getElementById('meal').selectedIndex].value;
		document.getElementById('food').style.display = 'block';
		var rand = get_random(1, 999999999);
		document.getElementById('food1').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food1&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('food2').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food2&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('food3').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food3&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('food4').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food4&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('food5').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food5&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('food6').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food6&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('food7').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
	}
}
//-->
</script>

</body>
</html>
