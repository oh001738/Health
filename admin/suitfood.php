<?PHP
//新增套餐資料
if ($_POST['type'] == 'add')
{
	$foodId = $_POST['food_id'];
	foreach ($foodId as $value)
	{
		if ($value != '')
		{
			$fid .= $value . ",";
		}
	}
	$sql = "INSERT INTO suitfood (food_id, suit_name, add_time, up_time)VALUES('" . $fid . "', '" . ckString($_POST['suitname'], 255) . "', '" . time() . "', '" . time() . "')";
	if (mysql_query($sql))
	{
		showMsg('新增套餐成功!!');
		actionlog(15,$USER['username']);
	}else{
		showMsg('新增套餐失敗，請洽系統管理員!!');
	}	
}

//修改套餐資料
if ($_POST['type'] == 'edit')
{
	$foodId = $_POST['food_id'];
	foreach ($foodId as $value)
	{
		if ($value != '')
		{
			$fid .= $value . ",";
		}
	}
	$sql = "UPDATE suitfood SET ";
	$sql .= "food_id = '" . $fid . "' , ";
	$sql .= "suit_name = '" . ckString($_POST['suitname'], 255) . "' , ";
	$sql .= "up_time = '" . time() . "' ";
	$sql .= "WHERE id = '" . $_POST['suitid'] . "'";
	if (mysql_query($sql))
	{
		showMsg('修改套餐成功!!');
		actionlog(17,$USER['username']);
	}else{
		showMsg('修改套餐失敗，請洽系統管理員!!');
	}	
}

//刪除套餐資料
if ( $_GET['action'] == 'delete' && trim($_GET['id']) != '' )
{
	$sql = "DELETE FROM suitfood WHERE id = '" . $_GET['id'] . "'";
	if ( mysql_query($sql) )
	{
		showMsg('刪除套餐成功!!');
		actionlog(16,$USER['username']);
		reDirect(base64_decode($_GET['back']) );
	}else{
		reDirect(base64_decode($_GET['back']) );
		showMsg('刪除套餐失敗，請洽系統管理員!!');
	}
}
?>

<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
<?PHP
if (!$_GET['action'])
{
	echo "<tr>\n";
	echo "	<td valign = 'top' align = 'center'>\n";
	echo "	<table border = '0' cellpadding = '4' cellspacing = '0' width = '95%'>\n";
	echo "	<tr>\n";
	
	if($USER['power'] == '1' ||$USER['power'] == '3')
	{
	echo "		<td><div style = 'width:75px'><div class = 'title'>維護套餐</div></div></td>\n";
	echo "		<td align = 'right'><input type = 'button' id = 'addsuit' name = 'addsuit' value = '新增套餐' onclick = 'location.href=\"admin.php?op=" . $op . "&action=add&back=" . base64_encode(getenv("REQUEST_URI")) . "\"'></td>\n";
	}
	else
	{
	echo "		<td><div style = 'width:75px'><div class = 'title'>檢視套餐</div></div></td>\n";
	}
	echo "	</tr>\n";
	echo "	</table>\n";
	echo "	</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td valign = 'top' align = 'center'>\n";
	echo "	<table border = '0' cellpadding = '4' cellspacing = '1' width = '95%' bgcolor = '#CCCCCC'>\n";
	echo "	<tr bgcolor = '#EDEDDE'>\n";
	echo "		<td class = 'text13px' align = 'center' width = '20%'>套餐名稱</td>\n";
	echo "		<td class = 'text13px' align = 'center'>套餐內容</td>\n";
	echo "		<td class = 'text13px' align = 'center' width = 15%'>新增日期</td>\n";
	echo "		<td class = 'text13px' align = 'center' width = 15%'>修改日期</td>\n";
	if($USER['power'] == '1' ||$USER['power'] == '3')
	{
	echo "		<td class = 'text13px' align = 'center' width = '5%'>修改</td>\n";
	echo "		<td class = 'text13px' align = 'center' width = '5%'>刪除</td>\n";
	}
	echo "	</tr>\n";
	$i = 0;
	$food_total = countSQL('suitfood', 'id', ""); //計算該類別的食物總數
	$page = ($_GET['page'])? $_GET['page'] : 0;   //設定目前頁數
	$total_page = ceil($food_total / PAGE_NUM);   //計算總共頁數
	$start_num = (!$_GET['page'])? '0' : $_GET['page'] * PAGE_NUM; //SQL開始筆數
	$sql = "SELECT * FROM suitfood LIMIT " . $start_num . "," . PAGE_NUM;
	$result = mysql_query($sql);
	while ($row = mysql_fetch_array($result))
	{
		$bgcolor = ($i % 2 == 0)? '#EEEEEE' : '#FFFFFF';
		echo "<tr bgcolor = '" . $bgcolor . "'>\n";
		echo "	<td class = 'text13px'>" . $row['suit_name'] . "</td>\n";
		echo "	<td class = 'text13px'>\n";
		$fid = explode(',', $row['food_id']);
		$a = 1;
		foreach ( $fid as $value )
		{
			if ( trim($value) != '')
			{
				$food_name = get_col_value('choose_food', 'ch_name', "WHERE ch_id = '" . $value . "'");
				echo "<a href = 'javascript:view_food2(" . $value . ")'>" . $food_name . "</a>";
			}
			$a++;
			if ( $a < count($fid) ){ echo '、'; }
			
		}
		echo "	</td>\n";
		echo "	<td class = 'text13px' align = 'center'>" . date("Y-m-d H:i:s", $row['add_time']) . "</td>\n";
		echo "	<td class = 'text13px' align = 'center'>" . date("Y-m-d H:i:s", $row['up_time']) . "</td>\n";
		if($USER['power'] == '1' ||$USER['power'] == '3')
		{
		echo "	<td class = 'text13px' align = 'center'><a href = 'admin.php?op=suitfood&action=edit&id=" . $row['id'] . "&back=" . base64_encode(getenv("REQUEST_URI")) . "'>修改</a></td>\n";
		echo "	<td class = 'text13px' align = 'center'><a href = 'admin.php?op=suitfood&action=delete&id=" . $row['id'] . "&back=" . base64_encode(getenv("REQUEST_URI")) . "' onclick = 'return confirm(\"確定要刪除嗎?\")'>刪除</a></td>\n";
		}
		echo "</tr>\n";
		$i++;
	}
	echo "	</table>\n";
	echo "	</td>\n";
	echo "</tr>\n";
	echo "<tr bgcolor = '#FFFFFF'>\n";
	echo "	<td align = 'center' class = 'text13px'>\n";
	if ( $food_total > PAGE_NUM )   //判斷資料庫中的資料是否大於每頁顯示數量
	{
		echo "<a href = '" . ROOT_URL . "/admin/admin.php?op=" . $op . "'>第一頁</a>";
		if ($page > 0)
		{
			$up = $page - 1;
			echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/admin.php?op=" . $op . "&page=" . $up . "'>上一頁</a></span>";
		}
		if ($page < ($total_page - 1))
		{
			$next = $page + 1;
			echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/admin.php?op=" . $op . "&page=" . $next . "'>下一頁</a></span>";
		}
		echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/admin.php?op=" . $op . "&page=" . ($total_page - 1) . "'>最後一頁</a></span>";
	}
	echo "	</td>\n";
	echo "</tr>\n";

}else if ($_GET['action'] == 'add' || ($_GET['action'] == 'edit' && trim($_GET['id']) != '') )
{
	if ($_GET['action'] == 'edit' && trim($_GET['id']) != '')
	{
		$sql = "SELECT * FROM suitfood WHERE id = '" . $_GET['id'] . "'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
	}
	echo "<form action = '" . getenv("REQUEST_URI") . "' method = 'post' id = 'addsuitfood' name = 'addsuitfood'>\n";
	echo "<tr>\n";
	echo "	<td align = 'center' valign = 'top'>\n";
	echo "	<table border = '0' cellpadding = '4' cellspacing = '1' width = '95%' bgcolor = '#CCCCCC'>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' width = '20%' align = 'right'><font class = 'redValue'>*</font>套餐名稱：</td>\n";
	echo "		<td class = 'text13px' colspan = '3'><input type = 'text' id = 'suitname' name = 'suitname' style = 'width:300px' value = '" . $row['suit_name'] . "'></td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>內含食材：</td>\n";
	echo "		<td class = 'text13px' colspan = '3'>\n";
	foreach ( $FOODTYPE as $key => $value )
	{
		echo "<span style = 'padding-right:10px'><a href = 'javascript:open_food(\"" . $key . "\")'>" . $value . "</a></span>\n";
	}
	echo "		<div id = 'foodlist' name = 'foodlist'>\n";
	if ($_GET['action'] == 'edit' && trim($_GET['id']) != '')
	{
		$foodID = explode(',', $row['food_id']);
		foreach ( $foodID as $value )
		{
			if ( trim($value) != '' )
			{
				$frow = get_value('choose_food', "WHERE ch_id = '" . $value . "'");

				$k_v   = ( trim($frow['ch_k']) == '')? '0' : $frow['ch_k'];                       //熱量
				$cho_v = ( trim($frow['ch_cholesterol']) == '')? '0' : $frow['ch_cholesterol'];   //膽固醇
				$fat_v = ( trim($frow['ch_fat']) == '')? '0' : $frow['ch_fat'];                   //脂肪
				$e_v   = ( trim($frow['ch_e']) == '')? '0' : $frow['ch_e'];                       //蛋白質
				$car_v = ( trim($frow['ch_carbohydrate']) == '')? '0' : $frow['ch_carbohydrate']; //醣類
				$pot_v = ( trim($frow['ch_potassium']) == '')? '0' : $frow['ch_potassium'];       //鉀
				$sod_v = ( trim($frow['ch_sodium']) == '')? '0' : $frow['ch_sodium'];             //鈉
				$cal_v = ( trim($frow['ch_calcium']) == '')? '0' : $frow['ch_calcium'];           //鈣
				$pho_v = ( trim($frow['ch_phosphorous']) == '')? '0' : $frow['ch_phosphorous'];   //磷
				$mg_v  = ( trim($frow['ch_mg']) == '')? '0' : $frow['ch_mg'];                     //鎂

				$k[]   = $frow['ch_k'];           //熱量
				$cho[] = $frow['ch_cholesterol']; //膽固醇
				$fat[] = $frow['ch_fat'];         //脂肪
				$e[]   = $frow['ch_e'];           //蛋白質
				$car[] = $frow['ch_carbohydrate'];//醣類
				$pot[] = $frow['ch_potassium'];   //鉀
				$sod[] = $frow['ch_sodium'];      //鈉
				$cal[] = $frow['ch_calcium'];     //鈣
				$pho[] = $frow['ch_phosphorous']; //磷
				$mg[]  = $frow['ch_mg'];          //鎂

				echo "<div style = 'padding-top:5px' id = 'food_" . $value . "' name = 'food_" . $value . "'>\n";
				echo "<a href = 'javascript:delfood(\"food_" . $value . "\",\"" . $k_v . "\",\"" . $cho_v . "\",\"" . $fat_v . "\",\"" . $e_v . "\",\"" . $car_v . "\",\"" . $pot_v . "\",\"" . $sod_v . "\",\"" . $cal_v . "\",\"" . $pho_v . "\",\"" . $mg_v . "\")' title = '刪除' onclick = 'return confirm(\"確定要刪除嗎?\")'>\n";
				echo $frow['ch_name'] . " <img src = '" . ROOT_URL . "/img/delete.gif' border = '0'></a><input type = 'hidden' id = 'food_id[]' name = 'food_id[]' value = '" . $value . "'></div>\n";
			}
		}
	}
	$k_sum   = ($_GET['action'] == 'edit')? round(array_sum($k), 3)   : '0'; //熱量
	$cho_sum = ($_GET['action'] == 'edit')? round(array_sum($cho), 3) : '0'; //膽固醇
	$fat_sum = ($_GET['action'] == 'edit')? round(array_sum($fat), 3) : '0'; //脂肪
	$e_sum   = ($_GET['action'] == 'edit')? round(array_sum($e), 3)   : '0'; //蛋白質
	$car_sum = ($_GET['action'] == 'edit')? round(array_sum($car), 3) : '0'; //醣類
	$pot_sum = ($_GET['action'] == 'edit')? round(array_sum($pot), 3) : '0'; //鉀
	$sod_sum = ($_GET['action'] == 'edit')? round(array_sum($sod), 3) : '0'; //鈉
	$cal_sum = ($_GET['action'] == 'edit')? round(array_sum($cal), 3) : '0'; //鈣
	$pho_sum = ($_GET['action'] == 'edit')? round(array_sum($pho), 3) : '0'; //磷
	$mg_sum  = ($_GET['action'] == 'edit')? round(array_sum($mg), 3)  : '0'; //鎂
	echo "		</div>\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>熱量總攝取量：</td>\n";
	echo "		<td class = 'text13px'>\n";
	echo "		<input type = 'text' id = 'ch_k' name = 'ch_k' value = '" . $k_sum . "' style = 'border:1px;width:100px;' readonly></td>\n";
	echo "		<td class = 'text13px' align = 'right' width = '20%'>鉀總攝取量：</td>\n";
	echo "		<td class = 'text13px'>\n";
	echo "		<input type = 'text' id = 'ch_potassium' name = 'ch_potassium' value = '" . $pot_sum . "' style = 'border:1px;width:100px;' readonly></td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>膽固醇總攝取量：</td>\n";
	echo "		<td class = 'text13px'>\n";
	echo "		<input type = 'text' id = 'ch_cholesterol' name = 'ch_cholesterol' value = '" . $cho_sum . "' style = 'border:1px;width:100px;' readonly></td>\n";
	echo "		<td class = 'text13px' align = 'right'>鈉總攝取量：</td>\n";
	echo "		<td class = 'text13px'>\n";
	echo "		<input type = 'text' id = 'ch_sodium' name = 'ch_sodium' value = '" . $sod_sum . "' style = 'border:1px;width:100px;' readonly></td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>脂肪總攝取量：</td>\n";
	echo "		<td class = 'text13px'>\n";
	echo "		<input type = 'text' id = 'ch_fat' name = 'ch_fat' value = '" . $fat_sum . "' style = 'border:1px;width:100px;' readonly></td>\n";
	echo "		<td class = 'text13px' align = 'right'>鈣總攝取量：</td>\n";
	echo "		<td class = 'text13px'>\n";
	echo "		<input type = 'text' id = 'ch_calcium' name = 'ch_calcium' value = '" . $cal_sum . "' style = 'border:1px;width:100px;' readonly></td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>蛋白質總攝取量：</td>\n";
	echo "		<td class = 'text13px'>\n";
	echo "		<input type = 'text' id = 'ch_e' name = 'ch_e' value = '" . $e_sum . "' style = 'border:1px;width:100px;' readonly></td>\n";
	echo "		<td class = 'text13px' align = 'right'>磷總攝取量：</td>\n";
	echo "		<td class = 'text13px'>\n";
	echo "		<input type = 'text' id = 'ch_phosphorous' name = 'ch_phosphorous' value = '" . $pho_sum . "' style = 'border:1px;width:100px;' readonly></td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>醣類總攝取量：</td>\n";
	echo "		<td class = 'text13px'>\n";
	echo "		<input type = 'text' id = 'ch_carbohydrate' name = 'ch_carbohydrate' value = '" . $car_sum . "' style = 'border:1px;width:100px;' readonly></td>\n";
	echo "		<td class = 'text13px' align = 'right'>鎂總攝取量：</td>\n";
	echo "		<td class = 'text13px'>\n";
	echo "		<input type = 'text' id = 'ch_mg' name = 'ch_mg' value = '" . $mg_sum . "' style = 'border:1px;width:100px;' readonly></td>\n";
	echo "	</tr>\n";
	if ($_GET['action'] == 'edit')
	{
		echo "	<tr bgcolor = '#FFFFFF'>\n";
		echo "		<td class = 'text13px' align = 'right'>新增日期：</td>\n";
		echo "		<td class = 'text13px'>" . date("Y-m-d H:i:s", $row['add_time']) . "</td>\n";
		echo "		<td class = 'text13px' align = 'right'>修改日期：</td>\n";
		echo "		<td class = 'text13px'>" . date("Y-m-d H:i:s", $row['up_time']) . "</td>\n";
		echo "	</tr>\n";
	}
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'center' colspan = '4'>\n";
	if ($_GET['action'] == 'edit')
	{
		echo "		<input type = 'hidden' id = 'type' name = 'type' value = 'edit'>\n";
		echo "		<input type = 'hidden' id = 'suitid' name = 'suitid' value = '" . $row['id'] . "'>\n";
	}else{
		echo "		<input type = 'hidden' id = 'type' name = 'type' value = 'add'>\n";
	}
	echo "		<span style = 'padding-right:10px'><input type = 'button' id = 'back' name = 'back' value = '回上一頁' onclick = 'location.href=\"" . base64_decode($_GET['back']) . "\"'></span>\n";
	echo "		<input type = 'button' id = 'add' name = 'add' value = '儲存' onclick = 'check()'>\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	</table><br>\n";
	echo "	</td>\n";
	echo "</tr>\n";
	echo "</form>\n";
}
?>
</table>

<script language = 'javascript'>
<!--
function open_food(food)
{
	window.open('open_food.php?foodid=' + food,'','height=500,width=500,toolbar=no,scrollbars=yes,resizable=no,top=100,left=100');
}

function check()
{
	var obj = document.addsuitfood;
	if ( trim(obj.suitname.value) == '' )
	{
		alert('請輸入套餐名稱!!');
		obj.suitname.focus();

	}else if (!chk_Total(obj.suitname.value , 255))
	{
		alert('套餐名稱限120個中文字!!');
		obj.suitname.focus();

	}else if ( trim(obj.ch_k.value) == '' || trim(obj.ch_k.value) == '0'  )
	{
		alert('請選擇套餐食材，至少一種!!');
	}else{
		obj.submit();
	}
}

//刪除內含食材 fid Div名稱, k 熱量, cholesterol 膽固醇, fat 脂肪, e 蛋白質, carbohydrate 醣類, potassium 鉀, sodium 鈉, calcium 鈣, phosphorous 磷, mg 鎂
function delfood(fid, k, cholesterol, fat, e, carbohydrate, potassium, sodium, calcium, phosphorous, mg)
{
	var k   = parseFloat(k);           //熱量
	var cho = parseFloat(cholesterol); //膽固醇
	var fat = parseFloat(fat);         //脂肪
	var e   = parseFloat(e);           //蛋白質
	var car = parseFloat(carbohydrate);//醣類
	var pot = parseFloat(potassium);   //鉀
	var sod = parseFloat(sodium);      //鈉
	var cal = parseFloat(calcium);     //鈣
	var pho = parseFloat(phosphorous); //磷
	var mg  = parseFloat(mg);          //鎂

	document.getElementById(fid).outerHTML = ''; //刪除食材

	var ch_k   = document.getElementById('ch_k').value;            //熱量
	var ch_cho = document.getElementById('ch_cholesterol').value;  //膽固醇
	var ch_fat = document.getElementById('ch_fat').value;          //脂肪
	var ch_e   = document.getElementById('ch_e').value;            //蛋白質
	var ch_car = document.getElementById('ch_carbohydrate').value; //醣類
	var ch_pot = document.getElementById('ch_potassium').value;    //鉀
	var ch_sod = document.getElementById('ch_sodium').value;       //鈉
	var ch_cal = document.getElementById('ch_calcium').value;      //鈣
	var ch_pho = document.getElementById('ch_phosphorous').value;  //磷
	var ch_mg  = document.getElementById('ch_mg').value;           //鎂

	document.getElementById('ch_k').value            = formatFloat( (parseFloat(ch_k)   - k), 3 );   //熱量取得小數第3位
	document.getElementById('ch_cholesterol').value  = formatFloat( (parseFloat(ch_cho) - cho), 3 ); //膽固醇取得小數第3位
	document.getElementById('ch_fat').value          = formatFloat( (parseFloat(ch_fat) - fat), 3 ); //脂肪取得小數第3位
	document.getElementById('ch_e').value            = formatFloat( (parseFloat(ch_e)   - e), 3 );   //蛋白質取得小數第3位
	document.getElementById('ch_carbohydrate').value = formatFloat( (parseFloat(ch_car) - car), 3 ); //醣類取得小數第3位
	document.getElementById('ch_potassium').value    = formatFloat( (parseFloat(ch_pot) - pot), 3 ); //鉀取得小數第3位
	document.getElementById('ch_sodium').value       = formatFloat( (parseFloat(ch_sod) - sod), 3 ); //鈉取得小數第3位
	document.getElementById('ch_calcium').value      = formatFloat( (parseFloat(ch_cal) - cal), 3 ); //鈣取得小數第3位
	document.getElementById('ch_phosphorous').value  = formatFloat( (parseFloat(ch_pho) - pho), 3 ); //磷取得小數第3位
	document.getElementById('ch_mg').value           = formatFloat( (parseFloat(ch_mg)  - mg), 3 );  //鎂取得小數第3位
}

function view_food2(food)
{
	window.open('<?PHP echo ROOT_URL;?>/contact_food.php?food_id=' + food,'','height=450,width=500,toolbar=no,scrollbars=yes,resizable=no,top=100,left=100');
}
//-->
</script>
