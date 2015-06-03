<?PHP
include "config.php";

if ( !ck_guest_value(session_id()) )
{
	phpDirect(ROOT_URL . '/health1.php');
}

if (!$_GET['percent'])
{
	phpDirect(ROOT_URL . '/kfoodroot.php');
}

if ( $_GET['action'] == 'remove' && trim($_GET['plate_id']) != '' )
{
	delete_value('guest_food', "WHERE id = '" . $_GET['plate_id'] . "'");
}

if ($_POST['action'] == 'save_plate')  //更新份量
{	
	$filePath = ROOT_PATH . "/upload/";		//檔案複製路徑
	$filetypeArr = explode('.', strrev($_FILES["img"]["name"]));
	$fileType = strrev($filetypeArr[0]);
	if (trim($_FILES["img"]["name"]) != '')
	{
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
		}else{
			$fileName = strrev(time()) . rand(0,9) . "." . $fileType;  //檔案名稱改為時間刻計反轉+1個亂數
			$tmp = $_FILES["img"]["tmp_name"];		
			$upimg = ( copy($tmp , $filePath . $fileName) )? $fileName : '';
			
		}
	}else{
		$upimg = $_POST['hiddenimg'];
	}
	$o_value = mysql_query("SELECT id, food_id FROM guest_food WHERE session_id = '" . session_id() . "' AND rand = '" . $_GET['rand'] . "'");
	while ( $o_row = mysql_fetch_array($o_value) )
	{
		$note = ( strip_tags(trim($_POST['note'])) == '備註欄' )? '' : $_POST['note'];
		$upsql = "UPDATE guest_food SET portion = '" . $_POST['part_' . $o_row['food_id']] . "', note = '" . $note . "', img = '" . $upimg . "' WHERE id = '" . $o_row['id'] . "'";
		mysql_query($upsql);
	}
}

if ( $_POST['action'] == 'plate_delimg' )
{
	if (trim($_POST['delimg']) != ''){ @unlink(ROOT_PATH. "/upload/" . base64_decode($_POST['delimg']) ); }
	$o_value = mysql_query("SELECT id, food_id FROM guest_food WHERE session_id = '" . session_id() . "' AND rand = '" . $_POST['rand'] . "'");
	while ( $o_row = mysql_fetch_array($o_value) )
	{
		mysql_query("UPDATE guest_food SET img = '' WHERE id = '" . $o_row['id'] . "'");
	}
}

if ( $_GET['action'] == 'oldplate' )
{
	$sql = "SELECT * FROM user_food WHERE id = '" . $_GET['id'] . "' AND userid = '" . $USER['userid'] . "'";
	$row = mysql_fetch_array(mysql_query($sql));
	$foodID = explode(',', $row['food_id']);  //食物ID
	$part   = explode(',', $row['part']);     //食物份量
	foreach( $foodID as $key => $value )
	{
		if ( trim($value) != '')
		{
			$sql2 = "INSERT INTO guest_food (food_id, rand, cal, percent, portion, meal, session_id, flag, note, add_time)VALUES(";
			$sql2 .= "'" . $value . "', ";
			$sql2 .= "'" . $_GET['rand'] . "', ";
			$sql2 .= "'" . get_col_value('choose_food', 'ch_k', "WHERE ch_id = '" . $value . "'") . "', ";
			$sql2 .= "'" . $_GET['percent'] . "', ";
			$sql2 .= "'" . $part[$key] . "', ";
			$sql2 .= "'" . $_GET['meal'] . "', ";
			$sql2 .= "'" . session_id() . "', ";
			$sql2 .= "'" . 0 . "', ";
			$sql2 .= "'" . $_POST['note'] . "', ";
			$sql2 .= "'" . time() . "')";
			mysql_query($sql2);
		}
	}
}

header_print(true);   //載入header檔

?>

<script type="text/JavaScript">
<!--
function MM_popupMsg(msg) { //v1.0
  alert(msg);
}

function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}

function finish()
{
	document.getElementById("plate").attributes["action"].value = '<?PHP echo ROOT_URL;?>/save_plate.php';
	//document.getElementById('plate').getAttribute('action') = '<?PHP echo ROOT_URL;?>/save_plate.php';
	//document.getElementById('plate').action.value = '<?PHP echo ROOT_URL;?>/save_plate.php';
	document.getElementById('plate').submit();
	
	<?php	
	$act_time = time();
	$sql2 = mysql_query("INSERT INTO action_log(username, actid, actime)VALUES('" . $USER['username'] . "', '" . 3 . "', '" . $act_time . "')"); 
	?>
}

function clearText()
{
	document.getElementById('note').innerHTML = '';
}

function delimg_plate()
{
	if ( confirm('確定要刪除圖片嗎?') )
	{
		document.delimgform.submit();
	}
}
//-->
</script>

<body>
	<?PHP include_once ROOT_PATH . '/menubar.php';?>
	<div class="container">	
	<div class="row">
	<!--左邊的-->
	<div class="col-md-3 visible-lg visible-md">
		<div class="panel panel-success">
			<div class="panel-heading">
			<h3 class="panel-title">食物類別</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<div id = 'food' name = 'food'>
						<div class="list-group">
						<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food1&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id="food1" class="list-group-item"><strong> 全榖根莖類 </strong></a>
						<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food2&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id="food2" class="list-group-item"><strong> 豆魚肉蛋類 </strong></a>
						<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food3&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id="food3" class="list-group-item"><strong> 蔬菜類 </strong></a>
						<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food4&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id="food4" class="list-group-item"><strong> 水果類 </strong></a>
						<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food5&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id="food5" class="list-group-item"><strong> 油脂類 </strong></a>
						<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food6&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id = "food6" class="list-group-item"><strong> 奶類 </strong></a>
						<a href="javascript:show_display('other_div');" id = "food7" name = "food7" onmouseover = "show_display('other_div');" class="list-group-item"><strong> 其它 </strong></a>
						
							<div id = 'other_div' name = 'other_div' style = 'display:none'>
							
							<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id = "class2_food1" class="list-group-item"> 調味料 </a>
							<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id = "class2_food2" class="list-group-item"> 中式早餐 </a>
							<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id = "class2_food3" class="list-group-item"> 西式早餐 </a>
							<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id = "class2_food4" class="list-group-item"> 家常菜 </a>
							<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id = "class2_food5" class="list-group-item"> 小吃 </a>
							<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id = "class2_food6" class="list-group-item"> 套餐 </a>
							<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id = "class2_food7" class="list-group-item"> 零食點心 </a>
							<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id = "class2_food8" class="list-group-item"> 飲料 </a>
							<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id = "class2_food9" class="list-group-item"> 酒類 </a>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<!--中間的-->
	<div class="col-md-9">
		<div class="row">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title">食物列表</h3>
				</div>
				<div class="panel-body">
				<div class="table-condensed">
				<table class="table">
				<tr>
					<td valign = 'top' align = 'center' style = 'padding:0 0 10 0'>
					<table border = '0' cellpadding = '1' cellspacing = '1' width = '95%'>
					<form action = '<?PHP echo getenv("REQUEST_URI");?>' id = 'plate' name = 'plate' method = 'post' enctype = 'multipart/form-data'>
					<tr bgcolor = '#F0FFFF'>
						<td></td>
						<td align = 'center'><font class = 'text13px'>食物<br>名稱</font></td>
						<td align = 'center'><font class = 'text13px'>份量<br></font></td>
						<td align = 'center'><font class = 'text13px'>熱量<br>kcal</font></td>
						<td align = 'center'><font class = 'text13px'>膽固醇<br>mg</font></td>
						<td align = 'center'><font class = 'text13px'>脂肪<br>g</font></td>
						<td align = 'center'><font class = 'text13px'>蛋白質<br>g</font></td>
						<td align = 'center'><font class = 'text13px'>醣類<br>g</font></td>
						<?PHP
						if ( trim($USER['username']) != '')   //判斷是否有登入會員，可看更多資料
						{
							echo "<td align = 'center'><font class = 'text13px'>鉀<br>mg</font></td>\n";
							echo "<td align = 'center'><font class = 'text13px'>鈉<br>mg</font></td>\n";
							echo "<td align = 'center'><font class = 'text13px'>鈣<br>mg</font></td>\n";
							echo "<td align = 'center'><font class = 'text13px'>磷<br>mg</font></td>\n";
							echo "<td align = 'center'><font class = 'text13px'>鎂<br>mg</font></td>\n";
							echo "<td align = 'center'><font class = 'text13px'>鐵<br>mg</font></td>\n";
							echo "<td align = 'center'><font class = 'text13px'>鋅<br>mg</font></td>\n";
						}
						?>
						<td width = '5%'></td>
					</tr>

					<?PHP
					$i = 0;
					$sql = "SELECT * FROM guest_food WHERE session_id = '" . session_id() . "' AND flag = 0 AND rand = '" . $_GET['rand'] . "'";
					$result = mysql_query($sql);
					while ( $row = mysql_fetch_array($result) )
					{
						$bgcolor = ($i % 2 == 1)? '#F0FFFF' : '';
						$food_value = mysql_fetch_array(mysql_query("SELECT * FROM choose_food WHERE ch_id = '" . $row['food_id'] . "'"));
						echo "<tr bgcolor = '" . $bgcolor . "'>\n";
						echo "	<td><a href = 'javascript:view_food(" . $food_value['ch_id'] . ")'><img src = '" . IMG_URL . "/" . $food_value['ch_image'] . "' width = '45' border = '0'></a></td>\n";
						echo "	<td class = 'text13px'>" . $food_value['ch_name'] . "</td>\n";
						echo "	<td class = 'text13px'>\n";
						echo "	<select id = 'part_" . $row['food_id'] . "' name = 'part_" . $row['food_id'] . "'>\n";
						if ($row['portion'] == '0.25'){ echo "<option value = '0.25' selected>0.25</option>\n"; }else{ echo "<option value = '0.25'>0.25</option>\n"; }
						if ($row['portion'] == '0.33'){ echo "<option value = '0.33' selected>0.33</option>\n"; }else{ echo "<option value = '0.33'>0.33</option>\n"; }
						if ($row['portion'] == '0.5'){ echo "<option value = '0.5' selected>0.5</option>\n"; }else{ echo "<option value = '0.5'>0.5</option>\n"; }
						if ($row['portion'] == '0.75'){ echo "<option value = '0.75' selected>0.75</option>\n"; }else{ echo "<option value = '0.75'>0.75</option>\n"; }
						if ($row['portion'] == '1'){ echo "<option value = '1' selected>1</option>\n"; }else{ echo "<option value = '1'>1</option>\n"; }
						if ($row['portion'] == '1.5'){ echo "<option value = '1.5' selected>1.5</option>\n"; }else{ echo "<option value = '1.5'>1.5</option>\n"; }
						if ($row['portion'] == '2'){ echo "<option value = '2' selected>2</option>\n"; }else{ echo "<option value = '2'>2</option>\n"; }
						echo "	</select>份\n";
						echo "	</td>\n";
						echo "	<td class = 'text13px' align = 'center'>" . round($food_value['ch_k'], 1) . "</td>\n";
						echo "	<td class = 'text13px' align = 'center'>" . round($food_value['ch_cholesterol'], 1) . "</td>\n";
						echo "	<td class = 'text13px' align = 'center'>" . round($food_value['ch_fat'], 1) . "</td>\n";
						echo "	<td class = 'text13px' align = 'center'>" . round($food_value['ch_e'], 1) . "</td>\n";
						echo "	<td class = 'text13px' align = 'center'>" . round($food_value['ch_carbohydrate'], 1) . "</td>\n";
						if ( trim($USER['username']) != '')   //判斷是否有登入會員，可看更多資料
						{
							echo "	<td class = 'text13px' align = 'center'>" . round($food_value['ch_potassium'], 1) . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . round($food_value['ch_sodium'], 1) . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . round($food_value['ch_calcium'], 1) . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . round($food_value['ch_phosphorous'], 1) . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . round($food_value['ch_mg'], 1) . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . round($food_value['ch_iron'], 1) . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . round($food_value['ch_zinc'], 1) . "</td>\n";
						}
						echo "	<td class = 'text13px' align = 'center'><a href = '" . ROOT_URL . "/food_plate.php?percent=" . $_GET['percent'] . "&meal=" . $_GET['meal'] . "&rand=" . $_GET['rand'] . "&action=remove&plate_id=" . $row['id'] . "'>移除</a></td>\n";
						echo "</tr>\n";
						$cal[] = round( ($food_value['ch_k'] * $row['portion']), 1 );                     //熱量總數
						$cholesterol[] = round( ($food_value['ch_cholesterol'] * $row['portion']), 1 );   //膽固醇總數
						$fat[] = round( ($food_value['ch_fat'] * $row['portion']), 1 );                   //脂肪總數
						$egg[] = round( ($food_value['ch_e'] * $row['portion']), 1 );                     //蛋白質總數
						$carbohydrate[] = round( ($food_value['ch_carbohydrate'] * $row['portion']), 1 ); //醣類總數
						if ( trim($USER['username']) != '')  //判斷是否有登入會員，可看更多資料
						{
							$potassium[]   = round( ($food_value['ch_potassium'] * $row['portion']), 1);    //熱量總數
							$sodium[]      = round( ($food_value['ch_sodium'] * $row['portion']), 1 );      //膽固醇總數
							$calcium[]     = round( ($food_value['ch_calcium'] * $row['portion']), 1 );     //脂肪總數
							$phosphorous[] = round( ($food_value['ch_phosphorous'] * $row['portion']), 1 ); //蛋白質總數
							$mg[]          = round( ($food_value['ch_mg'] * $row['portion']), 1 );          //醣類總數
							$iron[]        = round( ($food_value['ch_iron'] * $row['portion']), 1 );        //蛋白質總數
							$zinc[]        = round( ($food_value['ch_zinc'] * $row['portion']), 1 );        //醣類總數
						}
						$noteValue = stripslashes($row['note']); //備註欄資料
						$images = ( trim($row['img']) != '')? $row['img'] : $images;                   //上傳圖片資料
						$i++;
					}
					if ($i == 0)
					{
						if ( trim($USER['username']) != '')   //判斷是否有登入會員
						{
							echo "<tr bgcolor = '#EEEEEE'>\n";
							echo "	<td class = 'text13px' align = 'center' colspan = '3'>個人一日所需</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . $USER['need_cal'] . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_cho2() . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'></td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_protein2() . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_car2() . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_pot2() . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_na2() . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_cal2() . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_pho2() . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_mg2() . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_iron2() . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_zinc2() . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'></td>\n";
							echo "</tr>\n";
						}
						echo "<tr>\n";
						echo "	<td colspan = '14' align = 'center' class = 'text15px'><div style = 'padding-top:10px'><font color = '#FA0300'>您的餐盤中尚無食物喔!!</font></div></td>\n";
						echo "</tr>\n";
					}else{
						echo "<tr>\n";
						echo "	<td class = 'text13pxbold' colspan = '3' align = 'right'>總計</td>\n";
						echo "	<td class = 'text13pxbold' align = 'center' id = 'carTotal' name = 'carTotal'>" . array_sum($cal) . "</td>\n";
						echo "	<td class = 'text13pxbold' align = 'center' id = 'choTotal' name = 'choTotal'>" . array_sum($cholesterol) . "</td>\n";
						echo "	<td class = 'text13pxbold' align = 'center' id = 'fatTotal' name = 'fatTotal'>" . array_sum($fat) . "</td>\n";
						echo "	<td class = 'text13pxbold' align = 'center' id = 'eggTotal' name = 'eggTotal'>" . array_sum($egg) . "</td>\n";
						echo "	<td class = 'text13pxbold' align = 'center' id = 'carbTotal' name = 'carbTotal'>" . array_sum($carbohydrate) . "</td>\n";
						if ( trim($USER['username']) != '')   //判斷是否有登入會員，可看更多資料
						{
							echo "	<td class = 'text13pxbold' align = 'center' id = 'potTotal' name = 'potTotal'>" . array_sum($potassium) . "</td>\n";
							echo "	<td class = 'text13pxbold' align = 'center' id = 'sodTotal' name = 'sodTotal'>" . array_sum($sodium) . "</td>\n";
							echo "	<td class = 'text13pxbold' align = 'center' id = 'calcTotal' name = 'calcTotal'>" . array_sum($calcium) . "</td>\n";
							echo "	<td class = 'text13pxbold' align = 'center' id = 'phoTotal' name = 'phoTotal'>" . array_sum($phosphorous) . "</td>\n";
							echo "	<td class = 'text13pxbold' align = 'center' id = 'mgbTotal' name = 'mgbTotal'>" . array_sum($mg) . "</td>\n";
							echo "	<td class = 'text13pxbold' align = 'center' id = 'ironTotal' name = 'ironTotal'>" . array_sum($iron) . "</td>\n";
							echo "	<td class = 'text13pxbold' align = 'center' id = 'zincTotal' name = 'zincTotal'>" . array_sum($zinc) . "</td>\n";
						}
						echo "<tr>\n";
						
		//顯示紅綠燈
						echo "	<td class = 'text13pxbold' colspan = '3' align = 'right'></td>\n";
						echo "	<td class = 'text13pxbold' align = 'center' id = 'carTotal' name = 'carTotal'>". check_type_2( array_sum($cal) , ($USER['need_cal'] /$percent) ,($USER['need_cal'] /$percent) , $percent) . "</td>\n";
						echo "	<td class = 'text13pxbold' align = 'center' id = 'choTotal' name = 'choTotal'> </td>\n";
						echo "	<td class = 'text13pxbold' align = 'center' id = 'fatTotal' name = 'fatTotal'>". check_type_2(array_sum($fat),check_fat(array_sum($fat), $USER['need_cal'], $percent) ,check_fat(array_sum($fat), $USER['need_cal'], $percent),$percent) . "</td>\n";			
						echo "	<td class = 'text13pxbold' align = 'center' id = 'eggTotal' name = 'eggTotal'>". check_type_2(array_sum($egg),check_protein(array_sum($egg), $percent),check_protein(array_sum($egg), $percent),$percent) .  "</td>\n";					
						echo "	<td class = 'text13pxbold' align = 'center' id = 'carbTotal' name = 'carbTotal'>" . check_type_2(array_sum($carbohydrate),check_car(array_sum($carbohydrate), $percent),check_car(array_sum($carbohydrate), $percent),$percent) . "</td>\n";
						
						if ( trim($USER['username']) != '')   //判斷是否有登入會員，可看更多資料
						{
							echo "	<td class = 'text13pxbold' align = 'center' id = 'potTotal' name = 'potTotal'>" . check_type_2(array_sum($potassium),check_pot(array_sum($potassium), $percent),check_pot(array_sum($potassium), $percent),$percent) . "</td>\n";
							echo "	<td class = 'text13pxbold' align = 'center' id = 'sodTotal' name = 'sodTotal'>" . check_type_2(array_sum($sodium), check_na(array_sum($sodium), $percent),check_na(array_sum($sodium), $percent), $percent) . "</td>\n";
							echo "	<td class = 'text13pxbold' align = 'center' id = 'calcTotal' name = 'calcTotal'>" . check_type_2(array_sum($calcium), check_cal(array_sum($calcium), $percent),check_cal(array_sum($calcium), $percent), $percent) . "</td>\n";
							echo "	<td class = 'text13pxbold' align = 'center' id = 'phoTotal' name = 'phoTotal'>" . check_type_2(array_sum($phosphorous), check_pho(array_sum($phosphorous), $percent), check_pho(array_sum($phosphorous), $percent), $percent) . "</td>\n";
							echo "	<td class = 'text13pxbold' align = 'center' id = 'mgbTotal' name = 'mgbTotal'>" . check_type_2(array_sum($mg),check_mg(array_sum($mg), $percent),check_mg(array_sum($mg), $percent), $percent) . "</td>\n";
							echo "	<td class = 'text13pxbold' align = 'center' id = 'ironTotal' name = 'ironTotal'></td>\n";
							echo "	<td class = 'text13pxbold' align = 'center' id = 'zincTotal' name = 'zincTotal'></td>\n";
						}
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

						if ( trim($USER['username']) != '')   //判斷是否有登入會員
						{	
							$percent_cal = (array_sum($cal) >= $per_cal)? "<font style = 'color:#FF0000;font-weight:700'>" . round($USER['need_cal'] * (1 / $_GET['percent']) ) . "</font>\n" : round($USER['need_cal'] * (1 / $_GET['percent']) );
							echo "<tr bgcolor = '#AFFFB0'>\n";
							echo "	<td class = 'text13px' align = 'center' colspan = '3'>個人本餐所需</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . $percent_cal . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_cho(array_sum($cholesterol), $percent) . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_fat(array_sum($fat), $USER['need_cal'], $percent) . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_protein(array_sum($egg), $percent) . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_car(array_sum($carbohydrate), $percent) . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_pot(array_sum($potassium), $percent) . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_na(array_sum($sodium), $percent) . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_cal(array_sum($calcium), $percent) . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_pho(array_sum($phosphorous), $percent) . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_mg(array_sum($mg), $percent) . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_iron(array_sum($iron), $percent) . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_zinc(array_sum($zinc), $percent) . "</td>\n";
							echo "</tr>\n";
							echo "<tr bgcolor = '#AFFFB0'>\n";
							echo "	<td class = 'text13px' align = 'center' colspan = '3'>個人一日所需</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . $USER['need_cal'] . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_cho2() . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_fat(array_sum($fat), $USER['need_cal']) . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_protein2() . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_car2() . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_pot2() . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_na2() . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_cal2() . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_pho2() . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_mg2() . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_iron2() . "</td>\n";
							echo "	<td class = 'text13px' align = 'center'>" . check_zinc2() . "</td>\n";
							echo "</tr>\n";
						}
						echo "</tr>\n";
					}
					
					if ( trim($noteValue) != '')
					{
						//$textA = "<textarea id = 'note' name = 'note' cols = '60' rows = '5'>" . $noteValue . "</textarea>\n";
						$keywords = preg_split("/[\s,]+/", $noteValue);
						$textA="食物名稱: ".$keywords[0]."<br>份量: ".$keywords[1]." 份<br>重量: ".$keywords[2]." g";
					}else{
						$textA = "<textarea id = 'note' name = 'note' cols = '60' rows = '5' placeholder = '食物名稱 份量 重量 範例:芭樂 1 500'></textarea>\n";
					}
					?>
					<tr>
						<td colspan = '16' class = 'text13px'>
						<table border = '0' cellpadding = '2' cellspacing = '2' width = '100%'>
						<tr bgcolor = '#EBF5FF'>
							<td class = 'text13px' colspan = '2'><div style = 'padding-top:5px'><font style = 'color:#0300FA'>※倘若檢索結果無法找到您的食物，請在此處上傳您的食物圖片</font></td>
						</tr>
						<tr>
							<td class = 'text13px' align = 'right' width = '110'>請提供圖片上傳：</td>
							<td class = 'text13px'>
							<?PHP
							if ( trim($images) != '')
							{
								echo "<div><a href = '" . ROOT_URL . "/upload/" . $images. "' target = '_blank'><img src = '" . ROOT_URL . "/upload/" . $images . "' width = '100' border = '0'></a>\n";
								echo "<input type = 'button' id = 'delimgbutton' name = 'delimgbutton' value = '刪除圖片' onclick = 'delimg_plate();' style = 'width:70px;height:25px'></div>\n";
							}
							?>
							<input type = 'file' id = 'img' name = 'img' style = 'width:300px'>
							<input type = 'hidden' id = 'hiddenimg' name = 'hiddenimg' value = '<?PHP echo $images;?>'>
							</td>
						</tr>
						<tr>
							<td class = 'text13px' valign = 'top'  align = 'right'>備註欄：</td>
							<td class = 'text13px'>
							<input type = 'hidden' id = 'percent' name = 'percent' value = '<?PHP echo $_GET['percent'];?>'>
							<input type = 'hidden' id = 'meal' name = 'meal' value = '<?PHP echo $_GET['meal'];?>'>
							<input type = 'hidden' id = 'rand' name = 'rand' value = '<?PHP echo $_GET['rand'];?>'>
							<input type = 'hidden' id = 'action' name = 'action' value = 'save_plate'>
							<?PHP echo $textA;?>
							<br><font style = 'color:#0300FA'>※請盡量填寫您的食物細節，包含食物名稱、份量、重量，前述資料請以一個半型空白鍵隔開</font>
							</td>
						</tr>
						</table>
						</td>
					</tr>
					</form>
					</table>
					<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
					<tr>	
						<td align = 'right' class = 'text13px'>

						</td>
					</tr>
					</table>
					</td>
				</tr>
				</table>
				
				</div>
				</div>
			</div>		
		</div>
		<div>
		<?PHP
		if ($i > 0)
		{
			echo "	<span><input type = 'button' class = 'btn btn-warning' id = 'uploadsave' name = 'uploadsave' value = '重新計算熱量&圖片上傳' onclick = 'document.plate.submit();'></span>\n";
			echo "	<span><input type = 'button' class = 'btn btn-primary' id = 'checksave' name = 'checksave' value = '確認' onclick = 'finish();' ></span>\n";
		}
		?>
		<span><input type = 'button' class = 'btn btn-success' id = 'contorder' name = 'cont_order' value = '繼續點餐' onclick = 'location.href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food1&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>"'></span>				
		</div>	
	</div><!--Center-->

    </div> <!-- /container -->
	<form action = '<?PHP echo getenv("REQUEST_URI");?>' id = 'delimgform' name = 'delimgform' method = 'post'>
	<input type = 'hidden' id = 'delimg' name = 'delimg' value = '<?PHP echo base64_encode($images);?>'>
	<input type = 'hidden' id = 'percent' name = 'percent' value = '<?PHP echo $_GET['percent'];?>'>
	<input type = 'hidden' id = 'meal' name = 'meal' value = '<?PHP echo $_GET['meal'];?>'>
	<input type = 'hidden' id = 'rand' name = 'rand' value = '<?PHP echo $_GET['rand'];?>'>
	<input type = 'hidden' id = 'action' name = 'action' value = 'plate_delimg'>
	</form>
<?PHP include_once ROOT_PATH . '/footer.php';?>
