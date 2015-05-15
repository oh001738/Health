<?PHP

//新增使用者
if ($_POST['action'] == 'adddatauser')
{
    //新增user資料庫語法
    $inSQL = "INSERT INTO user (c_name, e_name, email, username, `password`, telphone, celphone, address, location, add_time, up_time)VALUES(";
    $inSQL .= "'" . ckString($_POST['c_name'], 200) . "' , ";
    $inSQL .= "'" . ckString($_POST['e_name'], 200) . "' , ";
    $inSQL .= "'" . ckString($_POST['email'], 255) . "' , ";
    $inSQL .= "'" . ckString($_POST['username'], 255) . "' , ";
    $inSQL .= "'" . ckString(md5($_POST['pass_1']), 200) . "' , ";
    $inSQL .= "'" . ckString($_POST['telphone'], 100) . "' , ";
    $inSQL .= "'" . ckString($_POST['celphone'], 100) . "' , ";
    $inSQL .= "'" . ckString($_POST['address'], 100) . "' , ";
	$inSQL .= "'" . ckString($_POST['location'], 2) . "' , ";
    $inSQL .= "'" . time() . "' , ";
    $inSQL .= "'" . time() . "')";
    $ok[] = mysql_query($inSQL);

    //新增user_health資料庫語法
    $userid = get_col_value('user', 'id', "WHERE username = '" . $_POST['username'] . "'");  //取得使用者ID
    $birthday = mktime(0, 0, 0, $_POST['month'], $_POST['day'], $_POST['year']);
    $need_cal = get_cal($_POST['user_w'], $_POST['bmi'], $_POST['actions']); //計算所需卡洛里
    $inSQL2 = "INSERT INTO user_health (userid, need_cal, birthday, user_h, user_sex, user_w, diabetes, hypertension, waistline, bmi, heart, kidney, good_w, good_w2, pronunciation, actions, creatinine, na, fasting_sugar, kk, hba1c, pp, hgb, ca, hct, fe, tibc, ua, ferritin, cholesterol, triglyceride, add_time)VALUES(";
    $inSQL2 .= "'" . $userid . "' , ";
    $inSQL2 .= "'" . ckString($need_cal, 8) . "' , ";
    $inSQL2 .= "'" . $birthday . "' , ";
    $inSQL2 .= "'" . ckString($_POST['user_h'], 5) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['user_sex'], 5) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['user_w'], 5) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['diabetes'], 10) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['hypertension'], 10) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['waistline'], 3) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['bmi'], 8) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['heart'], 10) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['kidney'], 10) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['good_w'], 8) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['good_w2'], 8) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['pronunciation'], 10) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['actions'], 10) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['creatinine'], 8) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['na'], 8) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['fasting_sugar'], 8) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['kk'], 8) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['hba1c'], 8) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['pp'], 8) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['hgb'], 8) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['ca'], 8) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['hct'], 8) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['fe'], 8) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['tibc'], 8) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['ua'], 8) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['ferritin'], 8) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['cholesterol'], 8) . "' , ";
    $inSQL2 .= "'" . ckString($_POST['triglyceride'], 8) . "' , ";
    $inSQL2 .= "'" . time() . "')";
    $ok[] = mysql_query($inSQL2);

    //新增user_health_bk語法
    $birthday = mktime(0, 0, 0, $_POST['month'], $_POST['day'], $_POST['year']);
    $need_cal = get_cal($_POST['user_w'], $_POST['bmi'], $_POST['actions']); //計算所需卡洛里
    $inSQL3 = "INSERT INTO user_health_bk (userid, need_cal, birthday, user_h, user_sex, user_w, diabetes, hypertension, waistline, bmi, heart, kidney, good_w, good_w2, pronunciation, actions, creatinine, na, fasting_sugar, kk, hba1c, pp, hgb, ca, hct, fe, tibc, ua, ferritin, cholesterol, triglyceride, add_time)VALUES(";
    $inSQL3 .= "'" . $userid . "' , ";
    $inSQL3 .= "'" . ckString($need_cal, 8) . "' , ";
    $inSQL3 .= "'" . $birthday . "' , ";
    $inSQL3 .= "'" . ckString($_POST['user_h'], 5) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['user_sex'], 5) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['user_w'], 5) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['diabetes'], 10) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['hypertension'], 10) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['waistline'], 3) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['bmi'], 8) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['heart'], 10) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['kidney'], 10) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['good_w'], 8) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['good_w2'], 8) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['pronunciation'], 10) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['actions'], 10) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['creatinine'], 8) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['na'], 8) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['fasting_sugar'], 8) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['kk'], 8) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['hba1c'], 8) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['pp'], 8) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['hgb'], 8) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['ca'], 8) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['hct'], 8) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['fe'], 8) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['tibc'], 8) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['ua'], 8) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['ferritin'], 8) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['cholesterol'], 8) . "' , ";
    $inSQL3 .= "'" . ckString($_POST['triglyceride'], 8) . "' , ";
    $inSQL3 .= "'" . time() . "')";
    $ok[] = mysql_query($inSQL3);

    if ( !in_array(0, $ok) )
    {
        showMsg('新增會員成功!!');
		actionlog(19,$USER['username']);
    }else{
        showMsg('新增會員失敗，請洽系統管理員!!');
    }
}

//修改使用者
if ( $_POST['action'] == 'updatauser' )
{
    //修改user資料庫語法
	if($USER['power']=='1')
	{
    $upSQL = "UPDATE user SET ";
    $upSQL .= "c_name = '" . ckString($_POST['c_name'], 200) . "' , ";
    $upSQL .= "e_name = '" . ckString($_POST['e_name'], 200) . "' , ";
    $upSQL .= "email = '" . ckString($_POST['email'], 255) . "' , ";
    if ( $_POST['pass_1'] != '' && $_POST['pass_1'] == $_POST['pass_2'] )
    {
        $upSQL .= "password = '" . ckString(md5($_POST['pass_1']), 255) . "' , ";
    }
    $upSQL .= "telphone = '" . ckString($_POST['telphone'], 100) . "' , ";
    $upSQL .= "celphone = '" . ckString($_POST['celphone'], 100) . "' , ";
    $upSQL .= "address = '" . ckString($_POST['address'], 255) . "' , ";
    $upSQL .= "up_time = '" . time() . "' ";
    $upSQL .= "WHERE id = '" . $_POST['user_id'] . "'";
    $ok[] = mysql_query($upSQL);		
	}


    //修改user_health資料庫語法
    $birthday = mktime(0, 0, 0, $_POST['month'], $_POST['day'], $_POST['year']);
    $upSQL2 = "UPDATE user_health SET ";
    $upSQL2 .= "birthday = '" . $birthday . "' , ";
    $upSQL2 .= "user_h = '" . ckString($_POST['user_h'], 5) . "' , ";
    $upSQL2 .= "user_sex = '" . ckString($_POST['user_sex'], 5) . "' , ";
    $upSQL2 .= "user_w = '" . ckString($_POST['user_w'], 5) . "' , ";
    $upSQL2 .= "diabetes = '" . ckString($_POST['diabetes'], 10) . "' , ";
    $upSQL2 .= "hypertension = '" . ckString($_POST['hypertension'], 10) . "' , ";
    $upSQL2 .= "waistline = '" . ckString($_POST['waistline'], 3) . "' , ";
    $upSQL2 .= "bmi = '" . ckString($_POST['bmi'], 8) . "' , ";
    $upSQL2 .= "heart = '" . ckString($_POST['heart'], 10) . "' , ";
    $upSQL2 .= "kidney = '" . ckString($_POST['kidney'], 10) . "' , ";
    $upSQL2 .= "good_w = '" . ckString($_POST['good_w'], 8) . "' , ";
    $upSQL2 .= "good_w2 = '" . ckString($_POST['good_w2'], 8) . "' , ";
    $upSQL2 .= "pronunciation = '" . ckString($_POST['pronunciation'], 10) . "' , ";
    $upSQL2 .= "actions = '" . ckString($_POST['actions'], 10) . "' , ";
    $upSQL2 .= "creatinine = '" . ckString($_POST['creatinine'], 8) . "' , ";
    $upSQL2 .= "na = '" . ckString($_POST['na'], 8) . "' , ";
    $upSQL2 .= "fasting_sugar = '" . ckString($_POST['fasting_sugar'], 8) . "' , ";
    $upSQL2 .= "kk = '" . ckString($_POST['kk'], 8) . "' , ";
    $upSQL2 .= "hba1c = '" . ckString($_POST['hba1c'], 8) . "' , ";
    $upSQL2 .= "pp = '" . ckString($_POST['pp'], 8) . "' , ";
    $upSQL2 .= "hgb = '" . ckString($_POST['hgb'], 8) . "' , ";
    $upSQL2 .= "ca = '" . ckString($_POST['ca'], 8) . "' , ";
    $upSQL2 .= "hct = '" . ckString($_POST['hct'], 8) . "' , ";
    $upSQL2 .= "fe = '" . ckString($_POST['fe'], 8) . "' , ";
    $upSQL2 .= "tibc = '" . ckString($_POST['tibc'], 8) . "' , ";
    $upSQL2 .= "ua = '" . ckString($_POST['ua'], 8) . "' , ";
    $upSQL2 .= "ferritin = '" . ckString($_POST['ferritin'], 8) . "' , ";
    $upSQL2 .= "cholesterol = '" . ckString($_POST['cholesterol'], 8) . "' , ";
    $upSQL2 .= "triglyceride = '" . ckString($_POST['triglyceride'], 8) . "' , ";
    $upSQL2 .= "up_time = '" . time() . "' ";
    $upSQL2 .= "WHERE health_id = '" . $_POST['user_health_id'] . "'";
    $ok[] = mysql_query($upSQL2);

    //新增user_health_bk語法
    $birthday = mktime(0, 0, 0, $_POST['month'], $_POST['day'], $_POST['year']);
    $need_cal = get_cal($_POST['user_w'], $_POST['bmi'], $_POST['actions']); //計算所需卡洛里
    $upSQL3 = "INSERT INTO user_health_bk (userid, need_cal, birthday, user_h, user_sex, user_w, diabetes, hypertension, waistline, bmi, heart, kidney, good_w, good_w2, pronunciation, actions, creatinine, na, fasting_sugar, kk, hba1c, pp, hgb, ca, hct, fe, tibc, ua, ferritin, cholesterol, triglyceride, add_time)VALUES(";
    $upSQL3 .= "'" . ckString($_POST['user_id'], 5) . "' , ";
    $upSQL3 .= "'" . ckString($need_cal, 8) . "' , ";
    $upSQL3 .= "'" . $birthday . "' , ";
    $upSQL3 .= "'" . ckString($_POST['user_h'], 5) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['user_sex'], 5) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['user_w'], 5) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['diabetes'], 10) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['hypertension'], 10) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['waistline'], 3) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['bmi'], 8) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['heart'], 10) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['kidney'], 10) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['good_w'], 8) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['good_w2'], 8) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['pronunciation'], 10) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['actions'], 10) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['creatinine'], 8) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['na'], 8) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['fasting_sugar'], 8) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['kk'], 8) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['hba1c'], 8) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['pp'], 8) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['hgb'], 8) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['ca'], 8) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['hct'], 8) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['fe'], 8) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['tibc'], 8) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['ua'], 8) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['ferritin'], 8) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['cholesterol'], 8) . "' , ";
    $upSQL3 .= "'" . ckString($_POST['triglyceride'], 8) . "' , ";
    $upSQL3 .= "'" . time() . "')";
    $ok[] = mysql_query($upSQL3);

    if ( !in_array(0, $ok) )
    {
        showMsg('修改會員成功!!');
		actionlog(21,$USER['username']);
    }else{
        showMsg('修改會員失敗，請洽系統管理員!!');
    }
}

//刪除使用者
if ($op == 'user' && $_GET['action'] == 'delete' && trim($_GET['id']) != '')
{
    $ok[] = delete_value("user", "WHERE id = '" . $_GET['id'] . "'");               //刪除會員個人資料
    $ok[] = delete_value("user_health", "WHERE userid = '" . $_GET['id'] . "'");    //刪除會員健檢資料
    $ok[] = delete_value("user_health_bk", "WHERE userid = '" . $_GET['id'] . "'"); //刪除會員健檢歷史資料
    if ( !in_array(0, $ok) )
    {
        showMsg('刪除會員成功!!');
		actionlog(20,$USER['username']);
        reDirect(ROOT_URL . "/admin/admin.php?op=user");
    }else{
        showMsg('刪除會員失敗，請洽系統管理員!!');
        reDirect(ROOT_URL . "/admin/admin.php?op=user");
    }
}


if ( $op == 'user' && ( $_GET['action'] == 'edit' || $_GET['action'] == 'add' ) )
{
    if ($_GET['action'] == 'edit')
    {
        $row  = get_value("user", "WHERE id = '" . $_GET['id'] . "'");           //取得會員個人資料
        $prow = get_value("user_health", "WHERE userid = '" . $row['id'] . "'"); //取得會員健檢資料
    }
	
    echo "<table border = '0' cellpadding = '4' cellspacing = '1' width = '90%' valign = 'top' style = 'border-collapse:collapse' bgcolor = '#AAAAAA'>\n";
    echo "<form action = '" . getenv("REQUEST_URI") . "' method = 'post' id = 'form1' name = 'form1'>\n";
	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	echo "<table border = '1' cellpadding = '4' cellspacing = '1' width = '90%' valign = 'top' style = 'border-collapse:collapse' bgcolor = '#AAAAAA'>\n";
    echo "<form action = '" . getenv("REQUEST_URI") . "' method = 'post' id = 'form1' name = 'form1'>\n";
	
	//帳號資料區
	if( $USER['power'] == '3') //只能看
	{
    echo "<tr bgcolor = '#EDEDDE'>\n";
    echo "  <td align = 'center' colspan = '4'><div class = 'title2'>會員個人資料</div></td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right' width = '20%'>會員帳號：</td>\n";
	echo "  <td class = 'text13px' align = 'left'>" . $row['username'] . "</td>\n";
    echo "  <td class = 'text13px' align = 'right' width = '20%'>email：</td>\n";
    echo "  <td class = 'text13px' align = 'left' style = 'width:150px'>".$row['email']."</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>中文姓名：</td>\n";
    echo "  <td class = 'text13px' align = 'left' style = 'width:150px'>".$row['c_name']."</td>\n";
    echo "  <td class = 'text13px' align = 'right'>英文姓名：</td>\n";
    echo "  <td class = 'text13px' align = 'left' style = 'width:150px'>".$row['e_name']."</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>電話號碼：</td>\n";
    echo "  <td class = 'text13px' align = 'left' style = 'width:150px'>" . $row['telphone'] . "</td>\n";
    echo "  <td class = 'text13px' align = 'right'>行動電話：</td>\n";
    echo "  <td class = 'text13px' align = 'left' style = 'width:150px'>". $row['celphone'] . "</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>地址：</td>\n";
    echo "  <td class = 'text13px' align = 'left' colspan = '3' style = 'width:400px'>". $row['address'] ."</td>\n";
    echo "</tr>\n";
	echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>所屬院區：</td>\n";
    echo "  <td class = 'text13px' align = 'left' colspan = '3' style = 'width:150px'>"?>
                        <?php
						if($row['location']=='0')
						{
							echo "請選擇";
						}
						elseif($row['location']=='1')
						{
							echo "台北";
						}
						elseif($row['location']=='2')
						{
							echo "台中";
						}
						elseif($row['location']=='3')
						{
							echo "高雄";
						}						
						?><?php "</td>\n";
    echo "</tr>\n";
	}
	elseif($USER['power'] == '1')  //可修改
	{
    echo "<tr bgcolor = '#EDEDDE'>\n";
    echo "  <td align = 'center' colspan = '4'><div class = 'title2'>會員個人資料</div></td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right' width = '20%'><font class = 'redvalue'>*</font>會員帳號：</td>\n";
    if ($_GET['action'] == 'edit')
    {
        echo "  <td class = 'text13px' align = 'left'>" . $row['username'] . "</td>\n";
    }else{
        echo "  <td class = 'text13px' align = 'left'><input type = 'text' id = 'username' name = 'username' value = ''  style = 'width:150px'></td>\n";
    }
    echo "  <td class = 'text13px' align = 'right' width = '20%'>email：</td>\n";
    echo "  <td class = 'text13px' align = 'left'><input type = 'text' id = 'email' name = 'email' value = '" . $row['email'] . "' style = 'width:150px'></td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    if ($_GET['action'] == 'edit')
    {
        echo "  <td class = 'text13px' align = 'right'>修改密碼：</td>\n";
    }else{
        echo "  <td class = 'text13px' align = 'right'><font class = 'redvalue'>*</font>輸入密碼：</td>\n";
    }
    echo "  <td class = 'text13px' align = 'left'><input type = 'password' id = 'pass_1' name = 'pass_1' style = 'width:150px'></td>\n";
    echo "  <td class = 'text13px' align = 'right'>再次輸入密碼：</td>\n";
    echo "  <td class = 'text13px' align = 'left'><input type = 'password' id = 'pass_2' name = 'pass_2' style = 'width:150px'></td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'><font class = 'redvalue'>*</font>中文姓名：</td>\n";
    echo "  <td class = 'text13px' align = 'left'><input type = 'text' id = 'c_name' name = 'c_name' value = '" . $row['c_name'] . "' style = 'width:150px'></td>\n";
    echo "  <td class = 'text13px' align = 'right'>英文姓名：</td>\n";
    echo "  <td class = 'text13px' align = 'left'><input type = 'text' id = 'e_name' name = 'e_name' value = '" . $row['e_name'] . "' style = 'width:150px'></td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>電話號碼：</td>\n";
    echo "  <td class = 'text13px' align = 'left'><input type = 'text' id = 'telphone' name = 'telphone' value = '" . $row['telphone'] . "' style = 'width:150px'></td>\n";
    echo "  <td class = 'text13px' align = 'right'>行動電話：</td>\n";
    echo "  <td class = 'text13px' align = 'left'><input type = 'text' id = 'celphone' name = 'celphone' value = '" . $row['celphone'] . "' style = 'width:150px'></td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>地址：</td>\n";
    echo "  <td class = 'text13px' align = 'left' colspan = '3'><input type = 'text' id = 'address' name = 'address' value = '" . $row['address'] . "' style = 'width:400px'></td>\n";
    echo "</tr>\n";		
	echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>所屬院區：</td>\n";
    echo "  <td class = 'text13px' align = 'left' colspan = '3'>
			<select id = 'location' name = 'location' style = 'width:300px'>
						<option value = '0' ".($row['location']=='0'?'selected':'select').">請選擇</option>
                        <option value = '1' ".($row['location']=='1'?'selected':'select').">台北</option>
                        <option value = '2' ".($row['location']=='2'?'selected':'select').">台中</option>
                        <option value = '3' ".($row['location']=='3'?'selected':'select').">高雄</option>
						</select></td>\n";
    echo "</tr>\n";		
	}

	
	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
    echo "<tr bgcolor = '#EDEDDE'>\n";
    echo "  <td align = 'center' colspan = '4'><div class = 'title2'>健康資料</div></td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>出生年月日：</td>\n";
    echo "  <td class = 'text13px'>民國 <select id = 'year' name = 'year' class = 'text13px'>\n";
    for ($i = 1; $i <= (date("Y") - 1911); $i++)
    {
        $selected = ($i == (date("Y", $prow['birthday']) - 1911))? 'selected' : '';
        echo "<option value = '" . ($i + 1911) . "' " . $selected . ">" . $i . "</option>\n";
    }
    echo "  </select> 年";
    echo "  <select id = 'month' name = 'month' class = 'text13px'>\n";
    for ($i = 1; $i <= 12; $i++)
    {
        $selected = ($i == date("n", $prow['birthday']))? 'selected' : '';
        echo "<option value = '" . $i . "' " . $selected . ">" . $i . "</option>\n";
    }
    echo "  </select> 月";
    echo "  <select id = 'day' name = 'day' class = 'text13px'>\n";
    for ($i = 1; $i <= 31; $i++)
    {
        $selected = ($i == date("d", $prow['birthday']))? 'selected' : '';
        echo "<option value = '" . $i . "' " . $selected . ">" . $i . "</option>\n";
    }
    echo "  </select> 日";
    echo "  </td>\n";
    echo "  <td class = 'text13px' align = 'right'>性別：</td>\n";
    $male   = ($prow['user_sex'] == '男')? 'checked' : '';
    $female = ($prow['user_sex'] == '女')? 'checked' : '';
    echo "  <td class = 'text13px'><input type = 'radio' id = 'user_sex' name = 'user_sex' value = '男' " . $male . ">男 <input type = 'radio' id = 'user_sex' name = 'user_sex' value = '女' " . $female . ">女</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>身高：</td>\n";
    echo "  <td class = 'text13px'><select id = 'user_h' name = 'user_h' onchange = 'Sumprice()'>\n";
    for ($i = 100; $i <= 200; $i++)
    {
        $selected = ($prow['user_h'] == $i)? 'selected' : '';
        echo "<option value = '" . $i . "' " . $selected . ">" . $i . "</option>\n";
    }
    echo "  </select></td>\n";
    echo "  <td class = 'text13px' align = 'right'>體重：</td>\n";
    echo "  <td class = 'text13px'><select id = 'user_w' name = 'user_w' onchange = 'Sumprice()'>\n";
    for ($i = 20; $i <= 150; $i++)
    {
        $selected = ($prow['user_w'] == $i)? 'selected' : '';
        echo "<option value = '" . $i . "' " . $selected . ">" . $i . "</option>\n";
    }
    echo "  </select></td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>腰圍：</td>\n";
    echo "  <td class = 'text13px'><select id = 'waistline' name = 'waistline'>\n";
    for ($i = 10; $i < 60; $i = $i + 0.5)
    {
        $selected = ($prow['waistline'] == $i)? 'selected' : '';
        echo "<option value = '" . $i . "' " . $selected . ">" . $i . "</option>\n";
    }
    echo "  </select></td>\n";
    echo "  <td class = 'text13px' align = 'right'>語音提醒：</td>\n";
    echo "  <td class = 'text13px'>\n";
    $pronunciation1 = ($prow['pronunciation'] == '國語')? 'checked' : '';
    $pronunciation2 = ($prow['pronunciation'] == '閩南語')? 'checked' : '';
    echo "  <input type = 'radio' id = 'pronunciation' name = 'pronunciation' value = '國語' " . $pronunciation1 . ">國語\n";
    echo "  <input type = 'radio' id = 'pronunciation' name = 'pronunciation' value = '閩南語' " . $pronunciation2 . ">閩南語\n";
    echo "  </td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>糖尿病：</td>\n";
    echo "  <td class = 'text13px'>\n";
    $diabetes1 = ($prow['diabetes'] == '有')? 'checked' : '';
    $diabetes2 = ($prow['diabetes'] == '沒有')? 'checked' : '';
    $diabetes3 = ($prow['diabetes'] == '不知道')? 'checked' : '';
    echo "  <input type = 'radio' id = 'diabetes' name = 'diabetes' value = '有' " . $diabetes1 . ">有\n";
    echo "  <input type = 'radio' id = 'diabetes' name = 'diabetes' value = '沒有' " . $diabetes2 . ">沒有\n";
    echo "  <input type = 'radio' id = 'diabetes' name = 'diabetes' value = '不知道' " . $diabetes3 . ">不知道\n";
    echo "  </td>\n";
    echo "  <td class = 'text13px' align = 'right'>高血壓：</td>\n";
    echo "  <td class = 'text13px'>\n";
    $hypertension1 = ($prow['hypertension'] == '有')? 'checked' : '';
    $hypertension2 = ($prow['hypertension'] == '沒有')? 'checked' : '';
    $hypertension3 = ($prow['hypertension'] == '不知道')? 'checked' : '';
    echo "  <input type = 'radio' id = 'hypertension' name = 'hypertension' value = '有' " . $hypertension1 . ">有\n";
    echo "  <input type = 'radio' id = 'hypertension' name = 'hypertension' value = '沒有' " . $hypertension2 . ">沒有\n";
    echo "  <input type = 'radio' id = 'hypertension' name = 'hypertension' value = '不知道' " . $hypertension3 . ">不知道\n";
    echo "  </td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>心臟病：</td>\n";
    echo "  <td class = 'text13px'>\n";
    $heart1 = ($prow['heart'] == '有')? 'checked' : '';
    $heart2 = ($prow['heart'] == '沒有')? 'checked' : '';
    $heart3 = ($prow['heart'] == '不知道')? 'checked' : '';
    echo "  <input type = 'radio' id = 'heart' name = 'heart' value = '有' " . $heart1 . ">有\n";
    echo "  <input type = 'radio' id = 'heart' name = 'heart' value = '沒有' " . $heart2 . ">沒有\n";
    echo "  <input type = 'radio' id = 'heart' name = 'heart' value = '不知道' " . $heart3 . ">不知道\n";
    echo "  </td>\n";
    echo "  <td class = 'text13px' align = 'right'>腎臟病：</td>\n";
    echo "  <td class = 'text13px'>\n";
    $kidney1 = ($prow['kidney'] == '有')? 'checked' : '';
    $kidney2 = ($prow['kidney'] == '沒有')? 'checked' : '';
    $kidney3 = ($prow['kidney'] == '不知道')? 'checked' : '';
    echo "  <input type = 'radio' id = 'kidney' name = 'kidney' value = '有' " . $kidney1 . ">有\n";
    echo "  <input type = 'radio' id = 'kidney' name = 'kidney' value = '沒有' " . $kidney2 . ">沒有\n";
    echo "  <input type = 'radio' id = 'kidney' name = 'kidney' value = '不知道' " . $kidney3 . ">不知道\n";
    echo "  </td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>身體質量指數(BMI)：</td>\n";
    echo "  <td class = 'text13px'><input type = 'text' id = 'bmi' name = 'bmi' value = '" . $prow['bmi'] . "' style = 'border:0' readonly></td>\n";
    echo "  <td class = 'text13px' align = 'right'>理想體重：</td>\n";
    echo "  <td class = 'text13px'><input type = 'text' id = 'good_w' name = 'good_w' value = '" . $prow['good_w'] . "' style = 'border:0' style = 'width:28px' readonly>~<input type = 'text' id = 'good_w2' name = 'good_w2' value = '" . $prow['good_w2'] . "' style = 'border:0' readonly></td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>活動分級：</td>\n";
    echo "  <td class = 'text13px'>\n";
    $action1 = ($prow['actions'] == '輕度')? 'checked' : '';
    $action2 = ($prow['actions'] == '中度')? 'checked' : '';
    $action3 = ($prow['actions'] == '重度')? 'checked' : '';
    $action4 = ($prow['actions'] == '臥床')? 'checked' : '';
    echo "  <input type = 'radio' id = 'actions' name = 'actions' value = '輕度' " . $action1 . ">輕度\n";
    echo "  <input type = 'radio' id = 'actions' name = 'actions' value = '中度' " . $action2 . ">中度\n";
    echo "  <input type = 'radio' id = 'actions' name = 'actions' value = '重度' " . $action3 . ">重度\n";
    echo "  <input type = 'radio' id = 'actions' name = 'actions' value = '臥床' " . $action4 . ">臥床\n";
    echo "  </td>\n";
    echo "  <td class = 'text13px' align = 'right'>血清 Creatinine：</td>\n";
    echo "  <td class = 'text13px'><input type = 'text' id = 'creatinine' name = 'creatinine' value = '" . $prow['creatinine'] . "'  onblur = 'ckhealth(\"creatinine\", 90, 150)' style = 'width:50px'> mg/dL</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>血鈉 Na：</td>\n";
    echo "  <td class = 'text13px'><input type = 'text' id = 'na' name = 'na' value = '" . $prow['na'] . "' onblur = 'ckhealth(\"na\", 130, 250)' style = 'width:50px'> mEq/L</td>\n";
    echo "  <td class = 'text13px' align = 'right'>空腹血糖 Fasting sugar：</td>\n";
    echo "  <td class = 'text13px'><input type = 'text' id = 'fasting_sugar' name = 'fasting_sugar' value = '" . $prow['fasting_sugar'] . "' onblur = 'ckhealth(\"fasting_sugar\", 90, 150)' style = 'width:50px'> mg/dL</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>血鉀 K：</td>\n";
    echo "  <td class = 'text13px'><input type = 'text' id = 'kk' name = 'kk' value = '" . $prow['kk'] . "' onblur = 'ckhealth(\"kk\", 90, 150)' style = 'width:50px'> mEq/L</td>\n";
    echo "  <td class = 'text13px' align = 'right'>糖化血色素 HbA1c：</td>\n";
    echo "  <td class = 'text13px'><input type = 'text' id = 'hba1c' name = 'hba1c' value = '" . $prow['hba1c'] . "' onblur = 'ckhealth(\"hba1c\", 90, 150)' style = 'width:50px'> %</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>血磷  P：</td>\n";
    echo "  <td class = 'text13px'><input type = 'text' id = 'pp' name = 'pp' value = '" . $prow['pp'] . "' onblur = 'ckhealth(\"pp\", 130, 250)' style = 'width:50px'> mg/dL</td>\n";
    echo "  <td class = 'text13px' align = 'right'>血色素  Hgb：</td>\n";
    echo "  <td class = 'text13px'><input type = 'text' id = 'hgb' name = 'hgb' value = '" . $prow['hgb'] . "' onblur = 'ckhealth(\"hgb\", 130, 250)' style = 'width:50px'> g/dL</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>血鈣 Ca：</td>\n";
    echo "  <td class = 'text13px'><input type = 'text' id = 'ca' name = 'ca' value = '" . $prow['ca'] . "' onblur = 'ckhealth(\"ca\", 130, 250)' style = 'width:50px'> mg/dL</td>\n";
    echo "  <td class = 'text13px' align = 'right'>血容比  Hct：</td>\n";
    echo "  <td class = 'text13px'><input type = 'text' id = 'hct' name = 'hct' value = '" . $prow['hct'] . "' onblur = 'ckhealth(\"hct\", 90, 150)' style = 'width:50px'> %</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>血鐵  Fe：</td>\n";
    echo "  <td class = 'text13px'><input type = 'text' id = 'fe' name = 'fe' value = '" . $prow['fe'] . "' onblur = 'ckhealth(\"fe\", 130, 250)' style = 'width:50px'> μg/dL</td>\n";
    echo "  <td class = 'text13px' align = 'right'>尿酸  Ua：</td>\n";
    echo "  <td class = 'text13px'><input type = 'text' id = 'ua' name = 'ua' value = '" . $prow['ua'] . "' onblur = 'ckhealth(\"ua\", 90, 150)' style = 'width:50px'> mg/dL</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>鐵總結合能力 TIBC：</td>\n";
    echo "  <td class = 'text13px'><input type = 'text' id = 'tibc' name = 'tibc' value = '" . $prow['tibc'] . "' onblur = 'ckhealth(\"tibc\", 130, 250)' style = 'width:50px'> μg/dL</td>\n";
    echo "  <td class = 'text13px' align = 'right'>膽固醇 Cholesterol：</td>\n";
    echo "  <td class = 'text13px'><input type = 'text' id = 'cholesterol' name = 'cholesterol' value = '" . $prow['cholesterol'] . "' onblur = 'ckhealth(\"cholesterol\", 90, 150)' style = 'width:50px'> mg/dL</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>血清轉鐵蛋白 Ferritin：</td>\n";
    echo "  <td class = 'text13px'><input type = 'text' id = 'ferritin' name = 'ferritin' value = '" . $prow['ferritin'] . "' onblur = 'ckhealth(\"ferritin\", 130, 250)' style = 'width:50px'> mg/mL</td>\n";
    echo "  <td class = 'text13px' align = 'right'>中性脂肪 (三酸甘油) Triglyceride：</td>\n";
    echo "  <td class = 'text13px'><input type = 'text' id = 'triglyceride' name = 'triglyceride' value = '" . $prow['triglyceride'] . "' onblur = 'ckhealth(\"triglyceride\", 130, 250)' style = 'width:50px'> mg/dL</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' colspan = '4' align = 'center'>\n";
    if ($_GET['action'] == 'edit')
    {
        echo "  <input type = 'hidden' id = 'user_id' name = 'user_id' value = '" . $row['id'] . "'>\n";
        echo "  <input type = 'hidden' id = 'user_health_id' name = 'user_health_id' value = '" . $prow['health_id'] . "'>\n";
        echo "  <input type = 'hidden' id = 'action' name = 'action' value = 'updatauser'>\n";
    }else{
        echo "  <input type = 'hidden' id = 'action' name = 'action' value = 'adddatauser'>\n";
    }
    echo "  <input type = 'button' id = 'back' name = 'back' value = '回上一頁' onclick =javascript:self.history.back()>\n";
    check_save();
    echo "  </td>\n";
    echo "</tr>\n";
    if ($_GET['action'] == 'edit')
    {
        echo "<tr bgcolor = '#EDEDDE'>\n";
        echo "  <td class = 'text13px' colspan = '4' align = 'center'>\n";
        echo "  <input type = 'button' id = 'search' name = 'serach' value = ' 查詢會員歷史健檢資料 ' onclick = 'user_history(" . $row['id'] . ",\"" . urlencode($row['username']) . "\",\"" . urlencode($row['c_name']) . "\")'>\n";
        echo "  </td>\n";
        echo "</tr>\n";
    }
    echo "</form>\n";
    echo "</table><br>\n";

}
/*----------------------------------------------------------------------------------------------------------------*/
 /*----------------------------------------------------------------------------------------------------------------*/
  /*----------------------------------------------------------------------------------------------------------------*/
elseif ( $op == 'user' &&  $_GET['action'] == 'view'  )
{
    if ($_GET['action'] == 'view')
    {
        $row  = get_value("user", "WHERE id = '" . $_GET['id'] . "'");           //取得會員個人資料
        $prow = get_value("user_health", "WHERE userid = '" . $row['id'] . "'"); //取得會員健檢資料
    }
    echo "<table border = '0' cellpadding = '4' cellspacing = '1' width = '90%' valign = 'top' style = 'border-collapse:collapse' bgcolor = '#AAAAAA'>\n";
    echo "<form action = '" . getenv("REQUEST_URI") . "' method = 'post' id = 'form1' name = 'form1'>\n";
    echo "<tr bgcolor = '#EDEDDE'>\n";
    echo "  <td align = 'center' colspan = '4'><div class = 'title2'>會員個人資料</div></td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right' width = '20%'>會員帳號：</td>\n";
	echo "  <td class = 'text13px' align = 'left'>" . $row['username'] . "</td>\n";
    echo "  <td class = 'text13px' align = 'right' width = '20%'>email：</td>\n";
    echo "  <td class = 'text13px' align = 'left' style = 'width:150px'>".$row['email']."</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>中文姓名：</td>\n";
    echo "  <td class = 'text13px' align = 'left' style = 'width:150px'>".$row['c_name']."</td>\n";
    echo "  <td class = 'text13px' align = 'right'>英文姓名：</td>\n";
    echo "  <td class = 'text13px' align = 'left' style = 'width:150px'>".$row['e_name']."</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>電話號碼：</td>\n";
    echo "  <td class = 'text13px' align = 'left' style = 'width:150px'>" . $row['telphone'] . "</td>\n";
    echo "  <td class = 'text13px' align = 'right'>行動電話：</td>\n";
    echo "  <td class = 'text13px' align = 'left' style = 'width:150px'>". $row['celphone'] . "</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>地址：</td>\n";
    echo "  <td class = 'text13px' align = 'left' colspan = '3' style = 'width:400px'>". $row['address'] ."</td>\n";
    echo "</tr>\n";
	echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>所屬院區：</td>\n";
    echo "  <td class = 'text13px' align = 'left' colspan = '3' style = 'width:150px'>"?>
                        <?php
						if($row['location']=='1')
						{
							echo "台北";
						}
						elseif($row['location']=='2')
						{
							echo "台中";
						}
						elseif($row['location']=='3')
						{
							echo "高雄";
						}				
						?><?php "</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#EDEDDE'>\n";
    echo "  <td align = 'center' colspan = '4'><div class = 'title2'>健康資料</div></td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>出生年月日：</td>\n";
    echo "  <td class = 'text13px'>民國\n";
    echo (date("Y", $prow['birthday']) - 1911)." 年 ";
    echo date("n", $prow['birthday'])." 月 ";
    echo date("d", $prow['birthday'])." 日 ";
    echo "  </td>\n";
    echo "  <td class = 'text13px' align = 'right'>性別：</td>\n";
    echo "  <td class = 'text13px'>".$prow['user_sex']."</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>身高：</td>\n";
    echo "  <td class = 'text13px'>".$prow['user_h']."</td>\n";

    echo "  <td class = 'text13px' align = 'right'>體重：</td>\n";
    echo "  <td class = 'text13px'>".$prow['user_w']."</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>腰圍：</td>\n";
    echo "  <td class = 'text13px'>".$prow['waistline']."</td>\n";
    echo "  <td class = 'text13px' align = 'right'>語音提醒：</td>\n";
    echo "  <td class = 'text13px'>".$prow['pronunciation']."</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>糖尿病：</td>\n";
    echo "  <td class = 'text13px'>".$prow['diabetes']."</td>\n";
    echo "  <td class = 'text13px' align = 'right'>高血壓：</td>\n";
    echo "  <td class = 'text13px'>".$prow['hypertension']."</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>心臟病：</td>\n";
    echo "  <td class = 'text13px'>".$prow['heart']."</td>\n";
    echo "  <td class = 'text13px' align = 'right'>腎臟病：</td>\n";
    echo "  <td class = 'text13px'>".$prow['kidney']."</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>身體質量指數(BMI)：</td>\n";
    echo "  <td class = 'text13px'>". $prow['bmi'] ."</td>\n";
    echo "  <td class = 'text13px' align = 'right'>理想體重：</td>\n";
    echo "  <td class = 'text13px'>" . $prow['good_w'] . "~" . $prow['good_w2'] . "</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>活動分級：</td>\n";
    echo "  <td class = 'text13px'>".$prow['actions']."</td>\n";
    echo "  <td class = 'text13px' align = 'right'>血清 Creatinine：</td>\n";
    echo "  <td class = 'text13px'>".$prow['creatinine']." mg/dL</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>血鈉 Na：</td>\n";
    echo "  <td class = 'text13px'>". $prow['na'] . " mEq/L</td>\n";
    echo "  <td class = 'text13px' align = 'right'>空腹血糖 Fasting sugar：</td>\n";
    echo "  <td class = 'text13px' >". $prow['fasting_sugar'] ." mg/dL</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>血鉀 K：</td>\n";
    echo "  <td class = 'text13px'>". $prow['kk'] . "mEq/L</td>\n";
    echo "  <td class = 'text13px' align = 'right'>糖化血色素 HbA1c：</td>\n";
    echo "  <td class = 'text13px'>" . $prow['hba1c'] ." %</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>血磷  P：</td>\n";
    echo "  <td class = 'text13px'>". $prow['pp'] ." mg/dL</td>\n";
    echo "  <td class = 'text13px' align = 'right'>血色素  Hgb：</td>\n";
    echo "  <td class = 'text13px'>". $prow['hgb'] ." g/dL</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>血鈣 Ca：</td>\n";
    echo "  <td class = 'text13px'>". $prow['ca'] ." mg/dL</td>\n";
    echo "  <td class = 'text13px' align = 'right'>血容比  Hct：</td>\n";
    echo "  <td class = 'text13px'>". $prow['hct'] ." %</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>血鐵  Fe：</td>\n";
    echo "  <td class = 'text13px'>". $prow['fe'] ." μg/dL</td>\n";
    echo "  <td class = 'text13px' align = 'right'>尿酸  Ua：</td>\n";
    echo "  <td class = 'text13px'>". $prow['ua'] ." mg/dL</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>鐵總結合能力 TIBC：</td>\n";
    echo "  <td class = 'text13px'>". $prow['tibc'] ." μg/dL</td>\n";
    echo "  <td class = 'text13px' align = 'right'>膽固醇 Cholesterol：</td>\n";
    echo "  <td class = 'text13px'>". $prow['cholesterol'] ." mg/dL</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' align = 'right'>血清轉鐵蛋白 Ferritin：</td>\n";
    echo "  <td class = 'text13px'>" . $prow['ferritin'] . " mg/mL</td>\n";
    echo "  <td class = 'text13px' align = 'right'>中性脂肪 (三酸甘油) Triglyceride：</td>\n";
    echo "  <td class = 'text13px'>" . $prow['triglyceride'] . " mg/dL</td>\n";
    echo "</tr>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td class = 'text13px' colspan = '4' align = 'center'>\n";
    if ($_GET['action'] == 'edit'||$_GET['action'] == 'view')
    {
        echo "  <input type = 'hidden' id = 'user_id' name = 'user_id' value = '" . $row['id'] . "'>\n";
        echo "  <input type = 'hidden' id = 'user_health_id' name = 'user_health_id' value = '" . $prow['health_id'] . "'>\n";
        echo "  <input type = 'hidden' id = 'action' name = 'action' value = 'updatauser'>\n";
    }else{
        echo "  <input type = 'hidden' id = 'action' name = 'action' value = 'adddatauser'>\n";
    }
    echo "  <input type = 'button' id = 'back' name = 'back' value = '回上一頁' onclick = 'location.href=\"" . base64_decode($_GET['back']) . "\"'>\n";    
    echo "  </td>\n";
    echo "</tr>\n";
    if ($_GET['action'] == 'edit'||$_GET['action'] == 'view')
    {
        echo "<tr bgcolor = '#EDEDDE'>\n";
        echo "  <td class = 'text13px' colspan = '4' align = 'center'>\n";
        echo "  <input type = 'button' id = 'search' name = 'serach' value = ' 查詢會員歷史健檢資料 ' onclick = 'user_history(" . $row['id'] . ",\"" . urlencode($row['username']) . "\",\"" . urlencode($row['c_name']) . "\")'>\n";
        echo "  </td>\n";
        echo "</tr>\n";
    }
    echo "</form>\n";
    echo "</table><br>\n";

}

elseif ( $op == 'user' )
{
	
    echo "<table border = '0' cellpadding = '4' cellspacing = '1' width = '95%' valign = 'top'>\n";
    echo "<form action = '" . ROOT_URL . "/admin/admin.php?op=user' id = 'searchform' name = 'searchform' method = 'post'>\n";
    echo "<tr>\n";	
	if($USER['power'] == '1' || $USER['power'] == '3')
	{
		echo "  <td><div style = 'width:110px'><div class = 'title'>維護個人資料</div></div></td>\n";
	}
	else
	{
		echo "  <td><div style = 'width:110px'><div class = 'title'>檢視個人資料</div></div></td>\n";
	}    
    echo "  <td align = 'right'>\n";
    echo "  <select id = 'type' name = 'type'>\n";
    echo "     <option value = 'username'>帳號</option>\n";
    echo "     <option value = 'c_name'>中文姓名</option>\n";
    echo "     <option value = 'e_name'>英文姓名</option>\n";
    echo "     <option value = 'email'>email</option>\n";
    echo "     <option value = 'telphone'>電話</option>\n";
    echo "     <option value = 'celphone'>手機</option>\n";
    echo "  </select>\n";
    echo "  <input type = 'text' id = 'keyword' name = 'keyword' style = 'width:100px'>\n";
    echo "  <input type = 'hidden' id = 'action' name = 'action' value = 'search'>\n";
    echo "  <input type = 'submit' id = 'search' name = 'search' value = '查詢會員'>\n";
	if($USER['power'] == '1')
	 {
		 echo "  <input type = 'button' id = 'adduser' name = 'adduser' value = '新增會員' onclick = 'location.href=\"admin.php?op=" . $op . "&action=add&back=" . base64_encode(getenv("REQUEST_URI")) . "\"'></td>\n";
	 }
    echo "</tr>\n";
    echo "</form>\n";
    echo "</table>\n";	
 
    echo "<table border = '1' cellpadding = '4' cellspacing = '1' width = '95%' valign = 'top' style = 'border-collapse:collapse' bgcolor = '#AAAAAA'>\n";
    echo "<tr bgcolor = '#EEEEEE'>\n";
    echo "  <td class = 'text13px' align = 'center'>會員帳號</td>\n";
    echo "  <td class = 'text13px' align = 'center'>中文姓名</td>\n";
    echo "  <td class = 'text13px' align = 'center'>英文姓名</td>\n";
    echo "  <td class = 'text13px' align = 'center'>email</td>\n";
    echo "  <td class = 'text13px' align = 'center'>電話</td>\n";
    if($USER['power'] == '1')
    {
    	echo "  <td class = 'text13px' align = 'center'>修改</td>\n";
   		echo "  <td class = 'text13px' align = 'center'>刪除</td>\n";
    }
	elseif($USER['power'] == '3')
	{
		echo "  <td class = 'text13px' align = 'center'>修改</td>\n";
	}
    else
    {
		echo "  <td class = 'text13px' align = 'center'>檢視</td>\n"; 

    }    	
    echo "</tr>\n";
	
    $action  = (trim($_GET['action']) == '')? $_POST['action'] : $_GET['action'];
	$type    = (trim($_GET['type']) == '')? $_POST['type'] : urldecode($_GET['type']);
	$keyword = (trim($_GET['keyword']) == '')? $_POST['keyword'] : urldecode($_GET['keyword']);
	
	
	if($USER['power']==1)
	{
		if ( $action == 'search' )
		{
			if ( trim($keyword) != '' )
			{
				$sqlwhe = " WHERE " . $type . " LIKE '%" . $keyword . "%'";
			}
			else
			{
				$sqlwhe = " WHERE " . $type . " LIKE '%" . $keyword . "%'";
			}
		}
	}
	elseif($USER['power'] == '2'||$USER['power'] == '3')
	{
		 if ( $action == 'search' )
		 {
			if ( trim($keyword) != '' )
			{
				$sqlwhe = "WHERE location=".$USER['location'];
			}
			else
			{
				$sqlwhe = "WHERE location=".$USER['location'];
			}
		 }
		 else
		 {
			 $sqlwhe = "WHERE location=".$USER['location'];
		 }
	}
	
	

    $start_num = (!$_GET['page'])? '0' : $_GET['page'] * PAGE_NUM; //SQL開始筆數
    $sql = "SELECT * FROM user " . $sqlwhe . " LIMIT " . $start_num . "," . PAGE_NUM;
    $result = mysql_query($sql);

    $i = 0;	
    while( $row = mysql_fetch_array($result) )
    {
		$bgcolor = ($i % 2 == 0)? '#FFFFFF' : '#EEEEEE';
		if($USER['power'] == '1')
		{			
			echo "  <tr bgcolor = '" . $bgcolor . "'>\n";
        	echo "  <td align = 'center' class = 'text13px'>" . $row['username'] . "</td>\n";
        	echo "  <td align = 'center' class = 'text13px'>" . $row['c_name'] . "</td>\n";
        	echo "  <td align = 'center' class = 'text13px'>" . $row['e_name'] . "</td>\n";			
        	echo "  <td align = 'center' class = 'text13px'>" . $row['email'] . "</td>\n";
        	echo "  <td align = 'center' class = 'text13px'>" . $row['telphone'] . "</td>\n";
   			echo "  <td align = 'center' class = 'text13px'><a href = 'admin.php?op=" . $op . "&action=edit&id=" . $row['id'] . "&back=" . base64_encode(getenv("REQUEST_URI")) . "'>修改</a></td>\n";
       		echo "  <td align = 'center' class = 'text13px'><a href = 'admin.php?op=" . $op . "&action=delete&id=" . $row['id'] . "' onclick = 'return confirm(\"確定要刪除嗎?\")'>刪除</a></td>\n";
		}
		else
		{
			//if($USER['location']==$row['location'])			
			{
        		echo "  <tr bgcolor = '" . $bgcolor . "'>\n";
     		   	echo "  <td align = 'center' class = 'text13px'>" . $row['username'] . "</td>\n";
        		echo "  <td align = 'center' class = 'text13px'>" . $row['c_name'] . "</td>\n";
        		echo "  <td align = 'center' class = 'text13px'>" . $row['e_name'] . "</td>\n";			
        		echo "  <td align = 'center' class = 'text13px'><a href = 'mailto:" . $row['email'] . "'>" . $row['email'] . "</a></td>\n";
        		echo "  <td align = 'center' class = 'text13px'>" . $row['telphone'] . "</td>\n";
        		if($USER['power'] == '2')
    			{
					echo "  <td align = 'center' class = 'text13px'><a href = 'admin.php?op=" . $op . "&action=view&id=" . $row['id'] . "&back=" . base64_encode(getenv("REQUEST_URI")) . "'>檢視</a></td>\n";  	
    			}
				elseif($USER['power'] == '3')
				{
					echo "  <td align = 'center' class = 'text13px'><a href = 'admin.php?op=" . $op . "&action=edit&id=" . $row['id'] . "&back=" . base64_encode(getenv("REQUEST_URI")) . "'>修改</a></td>\n";
				}			
			}
		}
        	echo "</tr>\n";
        	$i++;
    }
    echo "</table>\n";
    echo "<div style = 'padding-top:5px;padding-bottom:5px'>\n";
    echo "<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td align = 'center' class = 'text13px'>\n";
	if ( $action == 'search' )
	{
		if ( trim($keyword) != '' )
		{
			$link = '&action=search&type=' . urlencode($type) . '&keyword=' . urlencode($keyword);
		}
	}
	else
	{
		$link = '';
	}

		if($USER['power']==1)
		{
			$user_total = countSQL('user', 'id', $sqlwhe);     //計算會員總數
		}
		elseif($USER['power']==3||$USER['power']==2)
		{
			$user_total = countSQL2($USER['location']);
		}
    	$page = ($_GET['page'])? $_GET['page'] : 0;   //設定目前頁數
	    $total_page = ceil($user_total / PAGE_NUM);   //計算總共頁
		
		echo "總數:".$user_total." 頁數:".($page+1)." 總頁:".$total_page."<br>";
	
    	if ( $user_total > PAGE_NUM )   //判斷資料庫中的資料是否大於每頁顯示數量
	    {
    	    echo "<a href = '" . ROOT_URL . "/admin/admin.php?op=" . $op . $link . "'>第一頁</a>";
        	if ($page > 0)
	        {
    	        $up = $page - 1;
        	    echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/admin.php?op=" . $op . "&page=" . $up . $link . "'>上一頁</a></span>";
        	}
        	if ($page < ($total_page - 1))
        	{
            	$next = $page + 1;
	            echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/admin.php?op=" . $op . "&page=" . $next . $link . "'>下一頁</a></span>";
    	    }
        	echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/admin.php?op=" . $op . "&page=" . ($total_page - 1) . $link. "'>最後一頁</a></span>";
	    }		
		
	
    echo "  </td>\n";
    echo "</tr>\n";
    echo "</table>\n";
}
?>

<script type="text/JavaScript">
<!--
<?PHP
if ($_GET['action'] == 'add')
{
    echo "Sumprice();\n";
}
?>



function Sumprice()
{
    //計算BMI
    var Obj = document.form1;
    var height = Obj.user_h.options[Obj.user_h.selectedIndex].value;
    var weight = Obj.user_w.options[Obj.user_w.selectedIndex].value;
    if ( height == '' || height == 0 )
    {
        alert('請選擇身高!!');
        Obj.user_h.focus();
        return false;
    }
    if ( weight == '' || weight == 0 )
    {
        return false;
    }
    weight = parseInt(weight);
    height = parseInt(height);
    Obj.bmi.value = formatFloat( (weight / (height * height) * 10000) ,3 );
    //document.getElementById('good_weight').innerHTML = formatFloat( ( ( 18.5 * (height * height) )/10000), 1) + ' ~ ' + formatFloat( ( ( 24 * (height * height) )/10000), 1);
	Obj.good_w.value = formatFloat( ( ( 18.5 * (height * height) )/10000), 1);
	Obj.good_w2.value = formatFloat( ( ( 24 * (height * height) )/10000), 1);
}

function check()
{
    var obj = document.form1;
	
    if ( obj.action.value == 'adddatauser' && trim(obj.username.value) == '' )
    {
        alert('請輸入使用者帳號!!');
        obj.username.focus();

    }else if ( trim(obj.c_name.value) == '' )
    {
        alert('請輸入中文姓名!!');
        obj.c_name.focus();

    }else if ( obj.action.value == 'adddatauser' && trim(obj.pass_1.value) == '' )
    {
        alert('請輸入密碼!!');
        obj.pass_1.focus();

    }else if ( trim(obj.pass_1.value) != trim(obj.pass_2.value) )
    {
        alert('二次密碼輸入不一致!!');
        obj.pass_2.focus();

    }else if ( !dateV(obj.year.options[obj.year.selectedIndex].value, obj.month.options[obj.month.selectedIndex].value, obj.day.options[obj.day.selectedIndex].value) )
    {
        alert('請選擇正確的出生年月日!!');
        obj.day.focus();

    }else{
        obj.submit();
    }
}

function user_history(userid, username, c_name)
{
    window.open('user_history.php?userid=' + userid + '&username=' + username + '&cname=' + c_name,'會員歷史健檢資料','height=450,width=900,toolbar=no,scrollbars=yes,resizable=yes,top=20,left=20');
}
//-->
</script>

<?php
function check_save()
{
	if($USER['power']=='1')
	{
		echo "<input type = 'button' id = 'update' name = 'update' value = '儲存' onclick = 'javascript:check()'>";
	}
	else
	{
		echo "<input type = 'submit' id = 'update' name = 'update' value = '儲存'>";
	} 
}
?>
