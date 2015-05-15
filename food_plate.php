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

<style type="text/css">
<!--
.style2 {font-size: 11pt}
.style3 {color: #000000}
.style5 {font-size: 10pt}
.style6 {font-size: 10pt; color: #000000; }
.style5 {
	color: #FFCC33;
	font-size: 10pt;
}
.style6 {color: #CC3399}
.style8 {font-size: 10pt}
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
		$nowL['首頁'] = 'index.php';
		$nowL['配餐'] = 'kfoodroot.php';
		$nowL['個人餐盤'] = '';
		echo show_path_url($nowL);
		?>
		</div>
		</td>
	</tr>
	<tr>
		<td>
		<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
		<tr>
			<td valign = 'top' class = 'leftmenu'>
			<div style = 'padding-left:15px'>
			<div class = 'title'>配餐</div>
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
					<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('調味料');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food1' name = 'class2_food1'>調味料</a></div>
					<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('中式早餐');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food2' name = 'class2_food2'>中式早餐</a></div>
					<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('西式早餐');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food3' name = 'class2_food3'>西式早餐</a></div>
					<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('家常菜');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food4' name = 'class2_food4'>家常菜</a></div>
					<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('小吃');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food5' name = 'class2_food5'>小吃</a></div>
					<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('套餐');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food6' name = 'class2_food6'>套餐</a></div>
					<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('零食點心');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food7' name = 'class2_food7'>零食點心</a></div>
					<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('飲料');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food8' name = 'class2_food8'>飲料</a></div>
					<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('酒類');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food9' name = 'class2_food9'>酒類</a></div>
				</div>
				</td>
			</tr>
			</table>
			</div></div>
			<div style = 'padding-top:10px;padding-left:15px' class = 'text13px'>
			<?PHP
			include_once 'needcal.php';
			/*$per = ( $_GET['percent'] == 1 )? '1' : '1/' . $_GET['percent'];
			echo '餐別：' . $MEALTYPE[$_GET['meal']] . "<br>";
			echo '佔一天份量：' . $per . '份<br>';
			$good_w = explode('.' , $USER['good_w']);
			$good_w2 = explode('.' , $USER['good_w2']);
			echo '理想體重為：' . $good_w[0] . ' ~ ' . $good_w2[0] . 'kg<br>';
			$needCal = get_count_cal($USER['need_cal'], session_id());
			if ($needCal < 0)
			{
				$color = "color = '#FF0000'";
			}
			echo '一日所需熱量：' . $USER['need_cal'] . "</font><br>";
			echo '剩餘可攝取熱量：<font id = "needcal" name = "needcal" ' . $color . '>' . $needCal . "</font><br>";
			//暫存所需熱量hidden欄位
			echo "<input type = 'hidden' id = 'h_needcal' name = 'h_needcal' value = '" . $needCal . "'>\n";*/
			?>
			</div>
			</td>
			<td valign = 'top' align = 'center' style = 'padding:0 0 10 0'>
			<table border = '0' cellpadding = '2' cellspacing = '2' width = '95%'>
			<form action = '<?PHP echo getenv("REQUEST_URI");?>' id = 'plate' name = 'plate' method = 'post' enctype = 'multipart/form-data'>
			<tr bgcolor = '#EDEDED'>
				<td></td>
				<td align = 'center'><font class = 'text13px'>食物<br>名稱</font></td>
				<td align = 'center'><font class = 'text13px'>份量<br></font></td>
				<td align = 'center'><font class = 'text13px'>熱量<br>(kcal)</font></td>
				<td align = 'center'><font class = 'text13px'>膽固醇<br>(mg)</font></td>
				<td align = 'center'><font class = 'text13px'>脂肪<br>(g)</font></td>
				<td align = 'center'><font class = 'text13px'>蛋白質<br>(g)</font></td>
				<td align = 'center'><font class = 'text13px'>醣類<br>(g)</font></td>
				<?PHP
				if ( trim($USER['username']) != '')   //判斷是否有登入會員，可看更多資料
				{
					echo "<td align = 'center'><font class = 'text13px'>鉀<br>(mg)</font></td>\n";
					echo "<td align = 'center'><font class = 'text13px'>鈉<br>(mg)</font></td>\n";
					echo "<td align = 'center'><font class = 'text13px'>鈣<br>(mg)</font></td>\n";
					echo "<td align = 'center'><font class = 'text13px'>磷<br>(mg)</font></td>\n";
					echo "<td align = 'center'><font class = 'text13px'>鎂<br>(mg)</font></td>\n";
					echo "<td align = 'center'><font class = 'text13px'>鐵<br>(mg)</font></td>\n";
					echo "<td align = 'center'><font class = 'text13px'>鋅<br>(mg)</font></td>\n";
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
				$bgcolor = ($i % 2 == 1)? '#EDEDED' : '';
				$food_value = mysql_fetch_array(mysql_query("SELECT * FROM choose_food WHERE ch_id = '" . $row['food_id'] . "'"));
				echo "<tr bgcolor = '" . $bgcolor . "'>\n";
				echo "	<td><a href = 'javascript:view_food(" . $food_value['ch_id'] . ")'><img src = '" . IMG_URL . "/" . $food_value['ch_image'] . "' width = '50' border = '0'></a></td>\n";
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
				
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////顯示紅綠燈
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
				$textA = "<textarea id = 'note' name = 'note' cols = '60' rows = '5'>" . $noteValue . "</textarea>\n";
			}else{
				$textA = "<textarea id = 'note' name = 'note' cols = '60' rows = '5'></textarea>\n";
			}
			?>
			<tr>
				<td colspan = '16' class = 'text13px'>
				<table border = '0' cellpadding = '2' cellspacing = '2' width = '100%'>
				<tr bgcolor = '#EBF5FF'>
					<td class = 'text13px' colspan = '2'><div style = 'padding-top:5px'><font style = 'color:#0300FA'>※倘若檢索結果無法找到您的食物，請在此處上傳您的食物圖片</font></td>
				</tr>
				<tr>
					<td class = 'text13px' bgcolor = '#EBF5FF' align = 'right' width = '110'>請提供圖片上傳：</td>
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
					<td class = 'text13px' valign = 'top' bgcolor = '#EBF5FF' align = 'right'>備註欄：</td>
					<td class = 'text13px'>
					<input type = 'hidden' id = 'percent' name = 'percent' value = '<?PHP echo $_GET['percent'];?>'>
					<input type = 'hidden' id = 'meal' name = 'meal' value = '<?PHP echo $_GET['meal'];?>'>
					<input type = 'hidden' id = 'rand' name = 'rand' value = '<?PHP echo $_GET['rand'];?>'>
					<input type = 'hidden' id = 'action' name = 'action' value = 'save_plate'>
					<?PHP echo $textA;?>
					<br><font style = 'color:#0300FA'>※請盡量填寫您的食物細節，包含食材名稱及重量</font>
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
				<div style = 'padding-top:10px;padding-right:20px'>
				<?PHP
				if ($i > 0)
				{
					echo "	<span style = 'padding-right:10px'><input type = 'button' id = 'uploadsave' name = 'uploadsave' value = '重新計算熱量&圖片上傳' onclick = 'document.plate.submit();' style = 'width:160px;height:25px;'></span>\n";
					echo "	<span style = 'padding-right:10px'><input type = 'button' id = 'checksave' name = 'checksave' value = '確認' onclick = 'finish();' style = 'width:40px;height:25px;'></span>\n";
				}
				?>
				<span style = 'padding-right:10px'><input type = 'button' id = 'contorder' name = 'cont_order' value = '繼續點餐' onclick = 'location.href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food1&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>"' style = 'width:100px;height:25px;'></span>				
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
		<td colspan = '2'>
		<?PHP include_once ROOT_PATH . "/footer.php";?>
		</td>
	</tr>
	</table>
	</td>
</tr>
</table>
<!------------------------------------------------------------------------------------------------------->

<!------------------------------------------------------------------------------------------------------->
<form action = '<?PHP echo getenv("REQUEST_URI");?>' id = 'delimgform' name = 'delimgform' method = 'post'>
<input type = 'hidden' id = 'delimg' name = 'delimg' value = '<?PHP echo base64_encode($images);?>'>
<input type = 'hidden' id = 'percent' name = 'percent' value = '<?PHP echo $_GET['percent'];?>'>
<input type = 'hidden' id = 'meal' name = 'meal' value = '<?PHP echo $_GET['meal'];?>'>
<input type = 'hidden' id = 'rand' name = 'rand' value = '<?PHP echo $_GET['rand'];?>'>
<input type = 'hidden' id = 'action' name = 'action' value = 'plate_delimg'>
</form>
</body>
</html>
