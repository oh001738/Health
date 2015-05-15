<?PHP
//新增維護個案照顧紀錄
if ($_POST['type'] == 'add')
{
	$sql = "INSERT INTO attention (userid, case_id, user_name, birthday, attention_date, sex, doctor, height, weight, goodweight, fixweight, food_date, food_date2, need_cal, get_mg, get_water, get_egg, get_na, get_pho, get_cal, get_pot, motive, low_egg, get_car, get_fat, principal_food, fruit, oil, meat, vegetables, starch, egg_kidney, nitrogen, supply, simple_food, low_pho, out_food, low_egg_eat, low_na, festival, diabetes, low_pot, belly, car_oil, high_cho, chew, add_cal, note, add_time, up_time)VALUES(";
	$sql .= "'" . ckString($_POST['userid'], 10) . "' , ";
	$sql .= "'" . ckString($_POST['case_id'], 50) . "' , ";
	$sql .= "'" . ckString($_POST['user_name'], 200) . "' , ";
	$sql .= "'" . ckString($_POST['birthday'], 50) . "' , ";
	$sql .= "'" . ckString($_POST['attention_date'], 50) . "' , ";
	$sql .= "'" . ckString($_POST['sex'], 10) . "' , ";
	$sql .= "'" . ckString($_POST['doctor'], 200) . "' , ";
	$sql .= "'" . ckString($_POST['height'], 20) . "' , ";
	$sql .= "'" . ckString($_POST['weight'], 20) . "' , ";
	$sql .= "'" . ckString($_POST['goodweight'], 50) . "' , ";
	$sql .= "'" . ckString($_POST['fixweight'], 50) . "' , ";
	$sql .= "'" . ckString($_POST['food_date'], 20) . "' , ";
	$sql .= "'" . ckString($_POST['food_date2'], 20) . "' , ";
	$sql .= "'" . ckString($_POST['need_cal'], 100) . "' , ";
	$sql .= "'" . $_POST['get_mg'] . "' , ";
	$sql .= "'" . $_POST['get_water'] . "' , ";
	$sql .= "'" . ckString($_POST['get_egg'], 100) . "' , ";
	$sql .= "'" . $_POST['get_na'] . "' , ";
	$sql .= "'" . $_POST['get_pho'] . "' , ";
	$sql .= "'" . $_POST['get_cal'] . "' , ";
	$sql .= "'" . $_POST['get_pot'] . "' , ";
	$sql .= "'" . $_POST['motive'] . "' , ";
	$sql .= "'" . $_POST['low_egg'] . "' , ";
	$sql .= "'" . $_POST['get_car'] . "' , ";
	$sql .= "'" . $_POST['get_fat'] . "' , ";
	$sql .= "'" . ckString($_POST['principal_food'], 200) . "' , ";
	$sql .= "'" . ckString($_POST['fruit'], 200) . "' , ";
	$sql .= "'" . ckString($_POST['oil'], 200) . "' , ";
	$sql .= "'" . ckString($_POST['meat'], 200) . "' , ";
	$sql .= "'" . ckString($_POST['vegetables'], 200) . "' , ";
	$sql .= "'" . ckString($_POST['starch'], 200) . "' , ";
	$sql .= "'" . $_POST['egg_kidney'] . "' , ";
	$sql .= "'" . $_POST['nitrogen'] . "' , ";
	$sql .= "'" . $_POST['supply'] . "' , ";
	$sql .= "'" . $_POST['simple_food'] . "' , ";
	$sql .= "'" . $_POST['low_pho'] . "' , ";
	$sql .= "'" . $_POST['out_food'] . "' , ";
	$sql .= "'" . $_POST['low_egg_eat'] . "' , ";
	$sql .= "'" . $_POST['low_na'] . "' , ";
	$sql .= "'" . $_POST['festival'] . "' , ";
	$sql .= "'" . $_POST['diabetes'] . "' , ";
	$sql .= "'" . $_POST['low_pot'] . "' , ";
	$sql .= "'" . $_POST['belly'] . "' , ";
	$sql .= "'" . $_POST['car_oil'] . "' , ";
	$sql .= "'" . $_POST['high_cho'] . "' , ";
	$sql .= "'" . $_POST['chew'] . "' , ";
	$sql .= "'" . $_POST['add_cal'] . "' , ";
	$sql .= "'" . ckString($_POST['note']) . "' , ";
	$sql .= "'" . time() . "' , ";
	$sql .= "'" . time() . "')";
	if ( mysql_query($sql) )
	{
		showMsg('新增成功!!');
		actionlog(23,$USER['username']);
	}else{
		showMsg('新增失敗，請洽系統管理員!!');
	}

//修改維護個案照顧紀錄
}else if ( $_POST['type'] == 'edit' )
{
	$sql = "UPDATE attention SET ";
	$sql .= "userid = '" . ckString($_POST['userid'], 10) . "' , ";
	$sql .= "case_id = '" . ckString($_POST['case_id'], 50) . "' , ";
	$sql .= "user_name = '" . ckString($_POST['user_name'], 200) . "' , ";
	$sql .= "birthday = '" . ckString($_POST['birthday'], 50) . "' , ";
	$sql .= "attention_date = '" . ckString($_POST['attention_date'], 50) . "' , ";
	$sql .= "sex = '" . ckString($_POST['sex'], 10) . "' , ";
	$sql .= "doctor = '" . ckString($_POST['doctor'], 200) . "' , ";
	$sql .= "height = '" . ckString($_POST['height'], 20) . "' , ";
	$sql .= "weight = '" . ckString($_POST['weight'], 20) . "' , ";
	$sql .= "goodweight = '" . ckString($_POST['goodweight'], 50) . "' , ";
	$sql .= "fixweight = '" . ckString($_POST['fixweight'], 50) . "' , ";
	$sql .= "food_date = '" . ckString($_POST['food_date'], 20) . "' , ";
	$sql .= "food_date2 = '" . ckString($_POST['food_date2'], 20) . "' , ";
	$sql .= "need_cal = '" . ckString($_POST['need_cal'], 100) . "' , ";
	$sql .= "get_mg = '" . $_POST['get_mg'] . "' , ";
	$sql .= "get_water = '" . $_POST['get_water'] . "' , ";
	$sql .= "get_egg = '" . ckString($_POST['get_egg'], 100) . "' , ";
	$sql .= "get_na = '" . $_POST['get_na'] . "' , ";
	$sql .= "get_pho = '" . $_POST['get_pho'] . "' , ";
	$sql .= "get_cal = '" . $_POST['get_cal'] . "' , ";
	$sql .= "get_pot = '" . $_POST['get_pot'] . "' , ";
	$sql .= "motive = '" . $_POST['motive'] . "' , ";
	$sql .= "low_egg = '" . $_POST['low_egg'] . "' , ";
	$sql .= "get_car = '" . $_POST['get_car'] . "' , ";
	$sql .= "get_fat = '" . $_POST['get_fat'] . "' , ";
	$sql .= "principal_food = '" . ckString($_POST['principal_food'], 200) . "' , ";
	$sql .= "fruit = '" . ckString($_POST['fruit'], 200) . "' , ";
	$sql .= "oil = '" . ckString($_POST['oil'], 200) . "' , ";
	$sql .= "meat = '" . ckString($_POST['meat'], 200) . "' , ";
	$sql .= "vegetables = '" . ckString($_POST['vegetables'], 200) . "' , ";
	$sql .= "starch = '" . ckString($_POST['starch'], 200) . "' , ";
	$sql .= "egg_kidney = '" . $_POST['egg_kidney'] . "' , ";
	$sql .= "nitrogen = '" . $_POST['nitrogen'] . "' , ";
	$sql .= "supply = '" . $_POST['supply'] . "' , ";
	$sql .= "simple_food = '" . $_POST['simple_food'] . "' , ";
	$sql .= "low_pho = '" . $_POST['low_pho'] . "' , ";
	$sql .= "out_food = '" . $_POST['out_food'] . "' , ";
	$sql .= "low_egg_eat = '" . $_POST['low_egg_eat'] . "' , ";
	$sql .= "low_na = '" . $_POST['low_na'] . "' , ";
	$sql .= "festival = '" . $_POST['festival'] . "' , ";
	$sql .= "diabetes = '" . $_POST['diabetes'] . "' , ";
	$sql .= "low_pot = '" . $_POST['low_pot'] . "' , ";
	$sql .= "belly = '" . $_POST['belly'] . "' , ";
	$sql .= "car_oil = '" . $_POST['car_oil'] . "' , ";
	$sql .= "high_cho = '" . $_POST['high_cho'] . "' , ";
	$sql .= "chew = '" . $_POST['chew'] . "' , ";
	$sql .= "add_cal = '" . $_POST['add_cal'] . "' , ";
	$sql .= "note = '" . ckString($_POST['note']) . "' , ";
	$sql .= "up_time = '" . time() . "' ";
	$sql .= "WHERE id = '" . $_POST['attention_id'] . "'";
	if ( mysql_query($sql) )
	{
		actionlog(25,$USER['username']);
		showMsg('修改成功!!');
	}else{
		showMsg('修改失敗，請洽系統管理員!!');
	}

//刪除維護個案照顧紀錄
}else if ( $_GET['type'] == 'del' && trim($_GET['id']) != '' )  
{
	$sql = "DELETE FROM attention WHERE id = '" . trim($_GET['id']) . "'";
	if ( mysql_query($sql) )
	{
		showMsg('刪除成功!!');
		actionlog(24,$USER['username']);
		reDirect( base64_decode($_GET['backurl']) );
	}else{
		showMsg('刪除失敗，請洽系統管理員!!');
		reDirect( base64_decode($_GET['backurl']) );
	}
}
?>
<?PHP
if ( $_GET['action'] == '' || $_POST['action'] == 'search' )
{
	echo "<table border = '0' cellpadding = '2' cellspacing = '0' width = '100%'>\n";
	echo "<tr>\n";
	echo "	<td>\n";
	echo "	<table border = '0' cellpadding = '2' cellspacing = '0' width = '100%'>\n";
	echo "	<form action = '" . getenv("REQUEST_URI") . "' id = 'searchform' name = 'searchform' method = 'post'>\n";
	echo "	<tr>\n";
	echo "		<td width = '23%'><div style = 'width:170px'><div class = 'title'>維護個案照顧記錄</div></div></td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'keyword' name = 'keyword' style = 'width:150px' value = '請輸入查詢關鍵字' onclick = 'this.value = \"\"'>\n";
	echo "		<input type = 'hidden' id = 'action' name = 'action' value = 'search'>\n";
	echo "		<input type = 'button' id = 'startsearch' name = 'startsearch' value = '查詢' onclick = 'checksearch()'>\n";
	echo "		<span style = 'padding-left:20px'><input type = 'button' id = 'addattention' name = 'addattention' value = '新增個案照顧紀錄' onclick = 'location.href=\"" . ROOT_URL . "/admin/admin.php?op=" . $_GET['op'] . "&action=add&backurl=" . base64_encode(getenv("REQUEST_URI")) . "\"'></span>\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	</form>\n";
	echo "	</table>\n";
	echo "	</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td valign = 'top' align = 'center'>\n";
	echo "	<table border = '0' cellpadding = '4' cellspacing = '1' width = '100%' bgcolor = '#CCCCCC'>\n";
	echo "	<tr bgcolor = '#EDEDDE'>\n";
	echo "		<td class = 'text13px' align = 'center'>病歷號碼</td>\n";
	echo "		<td class = 'text13px' align = 'center'>姓名</td>\n";
	echo "		<td class = 'text13px' align = 'center' width = '15%'>出生日期</td>\n";
	echo "		<td class = 'text13px' align = 'center'>主治醫生</td>\n";
	echo "		<td class = 'text13px' align = 'center' width = '11%'>飲食日誌瀏覽</td>\n";
	echo "		<td class = 'text13px' align = 'center' width = '5%'>修改</td>\n";
	echo "		<td class = 'text13px' align = 'center' width = '5%'>刪除</td>\n";
	echo "	</tr>\n";
	if ($_POST['action'] == 'search')
	{
		$user_total = countSQL('attention', 'id', "WHERE case_id LIKE '%" . trim($_POST['keyword']) . "%' OR user_name LIKE '%" . trim($_POST['keyword']) . "%' OR doctor LIKE '%" . trim($_POST['keyword']) . "%'");   //計算搜尋會員總數
	}else{
		$user_total = countSQL('attention', 'id');   //計算所有會員總數
	}
	$page = ($_GET['page'])? $_GET['page'] : 0;      //設定目前頁數
	$total_page = ceil($user_total / PAGE_NUM);      //計算總共頁數
	$start_num = (!$_GET['page'])? '0' : $_GET['page'] * PAGE_NUM; //SQL開始筆數
	if ($_POST['action'])
	{
		$sql = "SELECT id, userid, case_id, user_name, birthday, doctor FROM attention WHERE case_id LIKE '%" . trim($_POST['keyword']) . "%' OR user_name LIKE '%" . trim($_POST['keyword']) . "%' OR doctor LIKE '%" . trim($_POST['keyword']) . "%' ORDER BY id";
	}else{
		$sql = "SELECT id, userid, case_id, user_name, birthday, doctor FROM attention ORDER BY id LIMIT " . $start_num . "," . PAGE_NUM;
	}
	$result = mysql_query($sql);
	$i = 0;
	while( $row = mysql_fetch_array($result) )
	{
		$bgcolor = ($i % 2 == 0)? '#FFFFFF' : '#EEEEEE';
		echo "<tr bgcolor = '" . $bgcolor . "'>\n";
		echo "	<td class = 'text13px'>" . $row['case_id'] . "</td>\n";
		echo "	<td class = 'text13px'>" . $row['user_name'] . "</td>\n";
		echo "	<td class = 'text13px'>" . $row['birthday'] . "</td>\n";
		echo "	<td class = 'text13px'>" . $row['doctor'] . "</td>\n";
		echo "	<td class = 'text13px'><a href = 'javascript:open_history(\"" . $row['userid'] . "\",\"" . $row['user_name'] . "\");'>瀏覽</a></td>\n";
		echo "	<td class = 'text13px' align = 'center'><a href = '" . ROOT_URL . "/admin/admin.php?op=" . $_GET['op'] . "&action=edit&id=" . $row['id'] . "&backurl=" . base64_encode(getenv("REQUEST_URI")) . "'>修改</a></td>\n";
		echo "	<td class = 'text13px' align = 'center'><a href = '" . ROOT_URL . "/admin/admin.php?op=" . $_GET['op'] . "&type=del&id=" . $row['id'] . "&backurl=" . base64_encode(getenv("REQUEST_URI")) . "' onclick = 'return confirm(\"確定要刪除嗎?\")'>刪除</a></td>\n";
		echo "</tr>\n";
		$i++;
	}
	if ( $user_total > PAGE_NUM )   //判斷資料庫中的資料是否大於每頁顯示數量
	{
		echo "<tr bgcolor = '#FFFFFF'>\n";
		echo "	<td align = 'center' class = 'text13px' colspan = '7'>\n";
		echo "<a href = '" . ROOT_URL . "/admin/admin.php?op=attention'>第一頁</a>";
		if ($page > 0)
		{
			$up = $page - 1;
			echo "	<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/admin.php?op=attention&page=" . $up . "'>上一頁</a></span>";
		}
		if ($page < ($total_page - 1))
		{
			$next = $page + 1;
			echo "	<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/admin.php?op=attention&page=" . $next . "'>下一頁</a></span>";
		}
		echo "	<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/admin.php?op=attention&page=" . ($total_page - 1) . "'>最後一頁</a></span>";
		echo "	</td>\n";
		echo "</tr>\n";
	}
	if ($i == 0)
	{
		echo "<tr bgcolor = '#FFFFFF'>\n";
		echo "	<td class = 'text13px' align = 'center' colspan = '7'><font color = '#FF0000'>查無資料!!請重新查詢</font></td>\n";
		echo "</tr>\n";
	}
	echo "	</table>\n";
	echo "	</td>\n";
	echo "</tr>\n";

}else if ($_GET['action'] == 'add' || $_GET['action'] == 'edit')
{
	if ($_GET['action'] == 'edit')
	{
		$row = get_value("attention", "WHERE id = '" . $_GET['id'] . "'");
	}
	echo "<table border = '0' cellpadding = '2' cellspacing = '0' width = '100%'>\n";
	echo "<tr>\n";
	echo "	<td><div style = 'width:170px'><div class = 'title'>維護個案照顧記錄</div></div></td>\n";
	echo "<tr>\n";
	echo "	<td valign = 'top' align = 'center'>\n";
	echo "	<table border = '0' cellpadding = '4' cellspacing = '1' width = '100%' bgcolor = '#CCCCCC'>\n";
	echo "	<form action = '" . getenv("REQUEST_URI") . "' id = 'attentionform' name = 'attentionform' method = 'post'>\n";
	echo "	<tr bgcolor = '#EDEDDE'>\n";
	echo "		<td align = 'center' class = 'text15px' colspan = '6'>基本資料</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' width = '13%' align = 'right'><font class = 'redValue'>*</font>病歷號碼：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'case_id' name = 'case_id' style = 'width:100px' value = '" . $row['case_id'] . "'></td>\n";
	echo "		<td class = 'text13px' width = '13%' align = 'right'><font class = 'redValue'>*</font>姓名：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'user_name' name = 'user_name' value = '" . $row['user_name'] . "' onclick = 'select_name()' readonly style = 'width:100px'>\n";
	echo "		<input type = 'hidden' id = 'userid' name = 'userid' value = '" . $row['userid'] . "'>\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' width = '18%' align = 'right'><font class = 'redValue'>*</font>出生日期：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'birthday' name = 'birthday' value = '" . $row['birthday'] . "' style = 'width:80px;border:0' readonly></td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'><font class = 'redValue'>*</font>衛教日期：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'attention_date' name = 'attention_date' value = '" . $row['attention_date'] . "' onclick = 'select_date(\"attention_date\")' readonly style = 'width:100px'>\n";
	echo "		<img src = '" . ROOT_URL . "/images/cleanup.gif' title = '清除' style = 'cursor:hand' onclick = 'clear_value(\"attention_date\")'></td>\n";
	echo "		<td class = 'text13px' align = 'right'><font class = 'redValue'>*</font>性別：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'sex' name = 'sex' value = '" . $row['sex'] . "' style = 'width:50px;border:0' readonly></td>\n";
	echo "		<td class = 'text13px' align = 'right'>主治醫生：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'doctor' name = 'doctor' value = '" . $row['doctor'] . "' style = 'width:100px'></td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>身高：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'height' name = 'height' value = '" . $row['height'] . "' style = 'width:80px;border:0' readonly></td>\n";
	echo "		<td class = 'text13px' align = 'right'>目前體重：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'weight' name = 'weight' value = '" . $row['weight'] . "' style = 'width:80px;border:0' readonly></td>\n";
	echo "		<td class = 'text13px' align = 'right'>理想體重：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'goodweight' name = 'goodweight' value = '" . $row['goodweight'] . "' style = 'width:80px;border:0' readonly></td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>校正體重：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'fixweight' name = 'fixweight' value = '" . $row['fixweight'] . "' style = 'width:80px'> kg</td>\n";
	echo "		<td class = 'text13px' align = 'right'>飲食日誌區間：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'food_date' name = 'food_date' value = '" . $row['food_date'] . "' onclick = 'select_date(\"food_date\")' readonly style = 'width:70px'> ~\n";
	echo "		<input type = 'text' id = 'food_date2' name = 'food_date2' value = '" . $row['food_date2'] . "' onclick = 'select_date(\"food_date2\")' readonly style = 'width:70px'>\n";
	echo "		<img src = '" . ROOT_URL . "/images/cleanup.gif' title = '清除' style = 'cursor:hand' onclick = 'clear_value(\"food_date\"),clear_value(\"food_date2\")'></td>\n";
	echo "		<td class = 'text13px' align = 'right'>飲食日誌瀏覽：</td>\n";
	echo "		<td class = 'text13px'><a href = 'javascript:open_history(\"" . $row['userid'] . "\",\"" . $row['user_name'] . "\");'>瀏覽</a></td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#EDEDDE'>\n";
	echo "		<td align = 'center' class = 'text15px' colspan = '6'>營養診斷與飲食問題</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>熱量需求：</td>\n";
	echo "		<td class = 'text13px' colspan = '2'><input type = 'text' id = 'need_cal' name = 'need_cal' style = 'width:80px' value = '" . $row['need_cal'] . "'> kcal/day</td>\n";
	echo "		<td class = 'text13px' align = 'right'>磷攝取：</td>\n";
	echo "		<td class = 'text13px' colspan = '2'>\n";
	unset($checked);
	$checked[1] = ($row['get_mg'] == '1')? 'checked' : '';
	$checked[2] = ($row['get_mg'] == '2')? 'checked' : '';
	$checked[0] = ($checked[1] == '' && $checked[2] == '' )? 'checked' : '';
	echo "		<input type = 'radio' id = 'get_mg' name = 'get_mg' value = '2' " . $checked[2] . ">過多\n";
	echo "		<input type = 'radio' id = 'get_mg' name = 'get_mg' value = '0' " . $checked[0] . ">適當\n";
	echo "		<input type = 'radio' id = 'get_mg' name = 'get_mg' value = '1' " . $checked[1] . ">不足\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>水分攝取：</td>\n";
	echo "		<td class = 'text13px' colspan = '2'>\n";
	unset($checked);
	$checked[1] = ($row['get_water'] == '1')? 'checked' : '';
	$checked[2] = ($row['get_water'] == '2')? 'checked' : '';
	$checked[0] = ($checked[1] == '' && $checked[2] == '' )? 'checked' : '';
	echo "		<input type = 'radio' id = 'get_water' name = 'get_water' value = '2' " . $checked[2] . ">過多\n";
	echo "		<input type = 'radio' id = 'get_water' name = 'get_water' value = '0' " . $checked[0] . ">適當\n";
	echo "		<input type = 'radio' id = 'get_water' name = 'get_water' value = '1' " . $checked[1] . ">不足\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right'>蛋白質需求：</td>\n";
	echo "		<td class = 'text13px' colspan = '2'><input type = 'text' id = 'get_egg' name = 'get_egg' style = 'width:80px' value = '" . $row['get_egg'] . "'> g/day</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>鈉攝取：</td>\n";
	echo "		<td class = 'text13px' colspan = '2'>\n";
	unset($checked);
	$checked[1] = ($row['get_na'] == '1')? 'checked' : '';
	$checked[2] = ($row['get_na'] == '2')? 'checked' : '';
	$checked[0] = ($checked[1] == '' && $checked[2] == '' )? 'checked' : '';
	echo "		<input type = 'radio' id = 'get_na' name = 'get_na' value = '2' " . $checked[2] . ">過多\n";
	echo "		<input type = 'radio' id = 'get_na' name = 'get_na' value = '0' " . $checked[0] . ">適當\n";
	echo "		<input type = 'radio' id = 'get_na' name = 'get_na' value = '1' " . $checked[1] . ">不足\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right'>磷結合劑使用正確性：</td>\n";
	echo "		<td class = 'text13px' colspan = '2'>\n";
	unset($checked);
	$checked[1] = ($row['get_pho'] == '1')? 'checked' : '';
	$checked[2] = ($row['get_pho'] == '2')? 'checked' : '';
	$checked[0] = ($checked[1] == '' && $checked[2] == '' )? 'checked' : '';
	echo "		<input type = 'radio' id = 'get_pho' name = 'get_pho' value = '2' " . $checked[2] . ">良好\n";
	echo "		<input type = 'radio' id = 'get_pho' name = 'get_pho' value = '0' " . $checked[0] . ">尚可\n";
	echo "		<input type = 'radio' id = 'get_pho' name = 'get_pho' value = '1' " . $checked[1] . ">不良\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>熱量攝取：</td>\n";
	echo "		<td class = 'text13px' colspan = '2'>\n";
	unset($checked);
	$checked[1] = ($row['get_cal'] == '1')? 'checked' : '';
	$checked[2] = ($row['get_cal'] == '2')? 'checked' : '';
	$checked[0] = ($checked[1] == '' && $checked[2] == '' )? 'checked' : '';
	echo "		<input type = 'radio' id = 'get_cal' name = 'get_cal' value = '2' " . $checked[2] . ">過多\n";
	echo "		<input type = 'radio' id = 'get_cal' name = 'get_cal' value = '0' " . $checked[0] . ">適當\n";
	echo "		<input type = 'radio' id = 'get_cal' name = 'get_cal' value = '1' " . $checked[1] . ">不足\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right'>鉀攝取：</td>\n";
	echo "		<td class = 'text13px' colspan = '2'>\n";
	unset($checked);
	$checked[1] = ($row['get_pot'] == '1')? 'checked' : '';
	$checked[2] = ($row['get_pot'] == '2')? 'checked' : '';
	$checked[0] = ($checked[1] == '' && $checked[2] == '' )? 'checked' : '';
	echo "		<input type = 'radio' id = 'get_pot' name = 'get_pot' value = '2' " . $checked[2] . ">過多\n";
	echo "		<input type = 'radio' id = 'get_pot' name = 'get_pot' value = '0' " . $checked[0] . ">適當\n";
	echo "		<input type = 'radio' id = 'get_pot' name = 'get_pot' value = '1' " . $checked[1] . ">不足\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>飲食控制動機：</td>\n";
	echo "		<td class = 'text13px' colspan = '2'>\n";
	unset($checked);
	$checked[1] = ($row['motive'] == '1')? 'checked' : '';
	$checked[2] = ($row['motive'] == '2')? 'checked' : '';
	$checked[3] = ($row['motive'] == '3')? 'checked' : '';
	$checked[0] = ($checked[1] == '' && $checked[2] == '' && $checked[3] == '' )? 'checked' : '';
	echo "		<input type = 'radio' id = 'motive' name = 'motive' value = '3' " . $checked[3] . ">強烈\n";
	echo "		<input type = 'radio' id = 'motive' name = 'motive' value = '2' " . $checked[2] . ">普通\n";
	echo "		<input type = 'radio' id = 'motive' name = 'motive' value = '1' " . $checked[1] . ">勉強\n";
	echo "		<input type = 'radio' id = 'motive' name = 'motive' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right'>補充低蛋白點心：</td>\n";
	echo "		<td class = 'text13px' colspan = '2'>\n";
	unset($checked);
	$checked[1] = ($row['low_egg'] == '1')? 'checked' : '';
	$checked[2] = ($row['low_egg'] == '2')? 'checked' : '';
	$checked[3] = ($row['low_egg'] == '3')? 'checked' : '';
	$checked[0] = ($checked[1] == '' && $checked[2] == '' && $checked[3] == '' )? 'checked' : '';
	echo "		<input type = 'radio' id = 'low_egg' name = 'low_egg' value = '3' " . $checked[3] . ">總是\n";
	echo "		<input type = 'radio' id = 'low_egg' name = 'low_egg' value = '2' " . $checked[2] . ">常常\n";
	echo "		<input type = 'radio' id = 'low_egg' name = 'low_egg' value = '1' " . $checked[1] . ">偶爾\n";
	echo "		<input type = 'radio' id = 'low_egg' name = 'low_egg' value = '0' " . $checked[0] . ">沒有\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>單醣攝取：</td>\n";
	echo "		<td class = 'text13px' colspan = '2'>\n";
	unset($checked);
	$checked[1] = ($row['get_car'] == '1')? 'checked' : '';
	$checked[2] = ($row['get_car'] == '2')? 'checked' : '';
	$checked[0] = ($checked[1] == '' && $checked[2] == '' )? 'checked' : '';
	echo "		<input type = 'radio' id = 'get_car' name = 'get_car' value = '2' " . $checked[2] . ">過多\n";
	echo "		<input type = 'radio' id = 'get_car' name = 'get_car' value = '0' " . $checked[0] . ">適當\n";
	echo "		<input type = 'radio' id = 'get_car' name = 'get_car' value = '1' " . $checked[1] . ">不足\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right'>飽和脂訪攝取：</td>\n";
	echo "		<td class = 'text13px' colspan = '2'>\n";
	unset($checked);
	$checked[1] = ($row['get_fat'] == '1')? 'checked' : '';
	$checked[2] = ($row['get_fat'] == '2')? 'checked' : '';
	$checked[0] = ($checked[1] == '' && $checked[2] == '' )? 'checked' : '';
	echo "		<input type = 'radio' id = 'get_fat' name = 'get_fat' value = '2' " . $checked[2] . ">過多\n";
	echo "		<input type = 'radio' id = 'get_fat' name = 'get_fat' value = '0' " . $checked[0] . ">適當\n";
	echo "		<input type = 'radio' id = 'get_fat' name = 'get_fat' value = '1' " . $checked[1] . ">不足\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#EDEDDE'>\n";
	echo "		<td align = 'center' class = 'text15px' colspan = '6'>營養介入策略</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' colspan = '6'>飲食計畫</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>主食：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'principal_food' name = 'principal_food' style = 'width:80px' value = '" . $row['principal_food'] . "'> 份</td>\n";
	echo "		<td class = 'text13px' align = 'right'>水果：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'fruit' name = 'fruit' style = 'width:80px' value = '" . $row['fruit'] . "'> 份</td>\n";
	echo "		<td class = 'text13px' align = 'right'>油脂：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'oil' name = 'oil' style = 'width:80px' value = '" . $row['oil'] . "'> 份</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>肉魚豆蛋：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'meat' name = 'meat' style = 'width:80px' value = '" . $row['meat'] . "'> 份</td>\n";
	echo "		<td class = 'text13px' align = 'right'>蔬菜：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'vegetables' name = 'vegetables' style = 'width:80px' value = '" . $row['vegetables'] . "'> 份</td>\n";
	echo "		<td class = 'text13px' align = 'right'>低氮澱粉：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'starch' name = 'starch' style = 'width:80px' value = '" . $row['starch'] . "'> 份</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>蛋白質食物與腎臟病之關係：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['egg_kidney'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'egg_kidney' name = 'egg_kidney' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'egg_kidney' name = 'egg_kidney' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>低氮點心製作指導：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['nitrogen'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'nitrogen' name = 'nitrogen' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'nitrogen' name = 'nitrogen' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>營養醫療補充品使用：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['supply'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'supply' name = 'supply' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'supply' name = 'supply' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>簡易食物分量與待換：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['simple_food'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'simple_food' name = 'simple_food' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'simple_food' name = 'simple_food' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>低磷飲食：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['low_pho'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'low_pho' name = 'low_pho' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'low_pho' name = 'low_pho' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>外食原則與建議：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['out_food'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'out_food' name = 'out_food' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'out_food' name = 'out_food' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>低蛋白飲食原則：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['low_egg_eat'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'low_egg_eat' name = 'low_egg_eat' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'low_egg_eat' name = 'low_egg_eat' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>低鈉飲食：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['low_na'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'low_na' name = 'low_na' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'low_na' name = 'low_na' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>年節飲食指導：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['festival'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'festival' name = 'festival' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'festival' name = 'festival' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>糖尿病腎病變飲食調整：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['diabetes'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'diabetes' name = 'diabetes' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'diabetes' name = 'diabetes' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>低鉀飲食：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['low_pot'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'low_pot' name = 'low_pot' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'low_pot' name = 'low_pot' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>食慾不振飲食對策：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['belly'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'belly' name = 'belly' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'belly' name = 'belly' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>增加熱量攝取:油脂補充技巧</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['car_oil'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'car_oil' name = 'car_oil' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'car_oil' name = 'car_oil' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>高膽固醇/三酸甘油脂飲食：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['high_cho'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'high_cho' name = 'high_cho' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'high_cho' name = 'high_cho' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>咀嚼不良飲食原則：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['chew'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'chew' name = 'chew' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'chew' name = 'chew' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>增加熱量攝取:純糖類補充技巧</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['add_cal'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'add_cal' name = 'add_cal' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'add_cal' name = 'add_cal' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>備註：</td>\n";
	echo "		<td class = 'text13px' colspan = '5'><textarea id = 'note' name = 'note' cols = '70' rows = '7'>" . $row['note'] . "</textarea></td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td colspan = '6' class = 'text13px' align = 'center'>\n";
	if ($_GET['action'] == 'edit')
	{
		echo "<input type = 'hidden' id = 'type' name = 'type' value = 'edit'>\n";
		echo "<input type = 'hidden' id = 'attention_id' name = 'attention_id' value = '" . $row['id'] . "'>\n";
	}else{
		echo "<input type = 'hidden' id = 'type' name = 'type' value = 'add'>\n";
	}
	echo "		<input type = 'button' id = 'back' name = 'back' value = '回上一頁' onclick = 'location.href=\"" . base64_decode($_GET['backurl']) . "\"'>\n";
	echo "		<span style = 'padding-left:20px'><input type = 'button' id = 'send' name = 'send' value = '送出' onclick = 'check()'></span></td>\n";
	echo "	</tr>\n";
	echo "	</form>\n";
	echo "	</table>\n";
	echo "	</td>\n";
	echo "</tr>\n";
}
?>
</table><br>

<script language = 'javascript'>
<!--
function select_name()
{
	window.open('select_name.php','','height=500,width=500,toolbar=no,scrollbars=yes,resizable=no,top=100,left=100');
}

function select_date(inputId, time)
{
	var dvalue = document.getElementById(inputId).value;
	window.open('select_date.php?id=' + inputId + '&time=' + time + '&dvalue=' + dvalue,'','height=50,width=300,toolbar=no,scrollbars=yes,resizable=no,top=100,left=100');
}

function check()
{
	var obj = document.attentionform;
	var time1 = obj.food_date.value;
	var time2 = obj.food_date2.value;
	if ( trim(time1) != ''){ time1 = time1.split('-'); }
	if ( trim(time2) != ''){ time2 = time2.split('-'); }

	document.getElementById('user_name').style.border  = '1px solid #7F9DB9';

	if ( trim(obj.case_id.value) == '' )
	{
		alert("請輸入病歷號碼!!");
		obj.case_id.focus();

	}else if ( trim(obj.attention_date.value) == '' )
	{
		alert("請輸入衛教日期!!");
		obj.attention_date.focus();
	
	}else if ( trim(obj.user_name.value) == '' )
	{
		alert("請輸入姓名!!");
		obj.user_name.focus();

	}else if ( !cktime(time1[0], time1[1], time1[2], time2[0], time2[1], time2[2]) && (trim(obj.food_date.value) != '' || trim(obj.food_date2.value) != '') )
	{
		alert('請選擇正確時間!!');
		obj.food_date2.focus();

	}else if ( !chk_Total(obj.case_id.value, 50) )
	{
		alert('字數超過限制，請輸入25個以內中文字!!');
		obj.case_id.focus();

	}else if ( !chk_Total(obj.user_name.value, 200) )
	{
		alert('字數超過限制，請輸入100個以內中文字!!');
		document.getElementById('user_name').style.border  = '2px solid #FA0300';
		obj.user_name.focus();

	}else if ( !chk_Total(obj.doctor.value, 200) )
	{
		alert('字數超過限制，請輸入100個以內中文字!!');
		obj.doctor.focus();

	}else if ( !chk_Total(obj.fixweight.value, 50) )
	{
		alert('字數超過限制，請輸入25個以內中文字!!');
		obj.fixweight.focus();

	}else if ( !chk_Total(obj.need_cal.value, 100) )
	{
		alert('字數超過限制，請輸入50個以內中文字!!');
		obj.need_cal.focus();

	}else if ( !chk_Total(obj.get_egg.value, 100) )
	{
		alert('字數超過限制，請輸入50個以內中文字!!');
		obj.get_egg.focus();
	
	}else if ( !chk_Total(obj.principal_food.value, 200) )
	{
		alert('字數超過限制，請輸入100個以內中文字!!');
		obj.principal_food.focus();
	
	}else if ( !chk_Total(obj.fruit.value, 200) )
	{
		alert('字數超過限制，請輸入100個以內中文字!!');
		obj.fruit.focus();
	
	}else if ( !chk_Total(obj.oil.value, 200) )
	{
		alert('字數超過限制，請輸入100個以內中文字!!');
		obj.oil.focus();
	
	}else if ( !chk_Total(obj.meat.value, 200) )
	{
		alert('字數超過限制，請輸入100個以內中文字!!');
		obj.meat.focus();
	
	}else if ( !chk_Total(obj.vegetables.value, 200) )
	{
		alert('字數超過限制，請輸入100個以內中文字!!');
		obj.vegetables.focus();
	
	}else if ( !chk_Total(obj.starch.value, 200) )
	{
		alert('字數超過限制，請輸入100個以內中文字!!');
		obj.starch.focus();
	
	}else{
		obj.submit();
	}
}

function checksearch()
{
	var obj = document.searchform;
	if ( trim(obj.keyword.value) == '' || trim(obj.keyword.value) == '請輸入查詢關鍵字' )
	{
		alert('請輸入查詢關鍵字!!');
		obj.keyword.value = '';
		obj.keyword.focus();
	}else{
		obj.submit();
	}
}

function open_history(userid, username)
{
	if ( trim(userid) != '' && trim(username) != '')
	{
		var historyId = userid;
		var username  = username;
	}else{
		var historyId = document.getElementById('userid').value;
		var username  = document.getElementById('user_name').value;
	}
	window.open('view_history.php?historyid=' + historyId + '&username=' + escape(username),'會員飲食日誌','height=450,width=740,toolbar=no,scrollbars=yes,resizable=yes,top=20,left=20');
}

//-->
</script>