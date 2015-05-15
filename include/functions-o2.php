<?PHP

/*判斷字數是否有超過限制*/
function ckString($str = '', $max = 0)
{
    if ($max > 0)
    {
        $str = wordscut($str, $max, false , '');
    }
    $str = strip($str);
    return $str;
}

/*判斷要切割的字數是否有中文字、$bdelete = ture表示是否要顯示完整的英文單字*/
function wordscut($string, $length, $bdelete = false , $backStr = '.....')
{
    if( strlen($string) > $length )
    {
        for($i = 0; $i < $length - 3; $i++)
        {
            if( ord($string[$i]) > 127 )
            {
                @$wordscut .= $string[$i] . $string[$i + 1];
                @$i++;
            } else {
                @$wordscut .= $string[$i];
            }
        }
        if( $i == $length-3 )
        {
            if( $bdelete )
            {
                if( ereg("[0-9a-za-z_\.\-]" , $string[$i]) )
                {
                    for($j = $i-1; $j >= 0; $j--)
                    {
                        if( !ereg("[0-9a-za-z_\.\-]", $string[$j]) ) { break; }
                        $wordscut = substr( $wordscut, 0, strlen($wordscut) - ($i - $j) + 1 );
                    }
                }
            }
        }
        return $wordscut . $backStr;
    }
    return $string;
}

//切割UTF8中文字
function utf8_substr($StrInput, $strStart, $strLen, $backStr = '....')
{
    //判斷是否需要加上$backStr

    $b_str = ( strlen($StrInput) >= $strLen )? $backStr : '';

    //對字串做URL Eecode
    $StrInput = mb_substr( $StrInput, $strStart, mb_strlen($StrInput) );
    $iString = urlencode($StrInput);
    $lstrResult = "";
    $istrLen = 0;
    $k = 0;
    do{
        $lstrChar = substr($iString, $k, 1);
        if($lstrChar == "%")
        {
            $ThisChr = hexdec( substr($iString, $k+1, 2) );
            if($ThisChr >= 128)
            {
                if($istrLen+3 < $strLen)
                {
                    $lstrResult .= urldecode( substr($iString, $k, 9) );
                    $k = $k + 9;
                    $istrLen += 3;
                }else{
                    $k = $k + 9;
                    $istrLen += 3;
                }
            }else{
                $lstrResult .= urldecode( substr($iString, $k, 3) );
                $k = $k + 3;
                $istrLen += 2;
            }
        }else{
            $lstrResult .= urldecode( substr($iString, $k, 1) );
            $k = $k + 1;
            $istrLen++;
        }
    }while ( $k < strlen($iString) && $istrLen < $strLen );
    return $lstrResult . $b_str;
}

/*將字串做換行處理*/
function wordnl2br($string)
{
    return stripslashes(nl2br($string));
}

/*解決許功蓋問題*/
function strip($str)
{
    return addslashes(trim($str));
}

/*取得使用者真實IP*/
function getIP()
{
    if ( empty($_SERVER['HTTP_X_FORWARDED_FOR']) )
    {
        $myip = $_SERVER['REMOTE_ADDR'];

    } else {

        $myip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $myip = $myip[0];
    }
    return $myip;
}

function showMsg($msg = '')
{
    if ($msg != '')
    {
        echo "<script>\n";
        echo "alert('" . $msg . "');";
        echo "</script>\n";
    }
}

function reDirect($url = '')
{
    if ( $url != '' )
    {
        echo "<script>\n";
        echo "location.href = '" . $url . "';";
        echo "</script>\n";
    }
}

//PHP轉頁
function phpDirect($url = '')
{
    reDirect($url);
}

function Fix_Backslash($org_str)
{
    if ( mysql_client_encoding() != "big5" ) return $org_str;
    $tmp_length = strlen($org_str);
    for ( $tmp_i=0; $tmp_i<$tmp_length; $tmp_i++ )
    {
        $ascii_str_a = substr($org_str, $tmp_i , 1);
        $ascii_str_b = substr($org_str, $tmp_i+1, 1);

        $ascii_value_a = ord($ascii_str_a);
        $ascii_value_b = ord($ascii_str_b);

        if ( $ascii_value_a > 128 )
        {
            if ( $ascii_value_b == 92 )
            {
                $org_str = substr($org_str, 0, $tmp_i+2) . substr($org_str,$tmp_i+3);
                $tmp_length = strlen($org_str);
            }
            $tmp_i++;
        }
    }

    $tmp_length = strlen($org_str);
    if ( substr($org_str, ($tmp_length-1), 1) == "\\" ) $org_str .= chr(32);

    $org_str = str_replace("\\0", "\ 0", $org_str);
    return $org_str;
}

function isadmin()    //判斷是否為管理者
{
    $sql = "SELECT id FROM " . DB_PREFIX . "session WHERE session_id = '" . session_id() . "' AND login_time >= '" . (time() - 10800) . "'";
    $row = mysql_fetch_array( ( mysql_query($sql) ) );
    if ( $row['id'] == '' )
    {
        echo '<meta http-equiv="refresh" content="0; url='. ROOT_URL .'/backs/back.php">';
        echo "<script>\n";
        echo "location.href = '" . ROOT_URL . "/backs/back.php'";
        echo "</script>\n";
    }else{

        $upsql = "UPDATE " . DB_PREFIX . "session SET login_time = '" . time() . "' WHERE id = '" . $row['id'] . "'";
        mysql_query($upsql);
    }
}

function getPostBy()   //取得管理者帳號
{
    $sql = "SELECT s.user_id, s.session_id, a.id, a.username FROM " . DB_PREFIX . "session s, " . DB_PREFIX . "admin a WHERE s.session_id = '" . session_id() . "' AND s.user_id = a.id";
    $row = mysql_fetch_array( ( mysql_query($sql) ) );
    return $row['username'];
}

function countSQL($table = '', $colname = '1', $where = '')    //計算資料庫筆數
{
    $sql = "SELECT COUNT(" . $colname . ") FROM " . $table . " " . $where;
    //echo $sql . "<br>";
    $row = mysql_fetch_array( ( mysql_query($sql) ) );
    return $row[0];
}

function countSQL2($where)    //計算資料庫筆數
{
	$result1 = " SELECT COUNT(*) FROM user WHERE location = " .$where;
    //$result1 = mysql_query("SELECT count(*) FROM user WHERE location = ".$where); 
	//$data2 = mysql_fetch_row($result1); 
	$data2= mysql_fetch_array(mysql_query($result1));
	return $data2[0];
}

function get_col_value($table, $colname, $where)  //取得資料庫欄位資料
{
    $sql = "SELECT " . $colname . " FROM " . $table . " " . $where;
    //echo $sql;
    $row = mysql_fetch_array( ( mysql_query($sql) ) );
    return $row[$colname];
}

function get_value($table, $where, $colname = '*')  //取得資料庫資料
{
    $sql = "SELECT " . $colname . " FROM " . $table . " " . $where;
	//echo $sql;
    $row = mysql_fetch_array( ( mysql_query($sql) ) );
    return $row;
}

function delete_value($table, $where)           //刪除資料庫資料
{
    $sql = "DELETE FROM " . $table . " " . $where;
    if ( !mysql_query($sql) )
    {
        return false;
    }else{
        return true;
    }
}

function ckuseremail($email)  //檢查email是否重複
{
    if ( countSQL('user', 'email', "WHERE email = '" . $email . "'") > 0 )
    {
        return false;
    }else{
        return true;
    }
}

function ckusername($username)  //檢查帳號是否重複
{
    if ( countSQL('user', 'username', "WHERE username = '" . $username . "'") > 0 )
    {
        return false;
    }else{
        return true;
    }
}


function ck_body_element($min, $max, $element)  //檢查身體元素是否有超過標準值
{
    if ( trim($element) == '' ) return false;
    if ( !is_numeric($element) ) return false;    //判斷是否為數字
    if ( $element >= $min && $element <= $max )
    {
        return true;
    }else{
        return false;
    }
}

function header_print($head = true)
{
    echo "<html>\n";
    echo "<head>\n";
    echo "<meta http-equiv = 'Content-Type' content = 'text/html; charset=" . WEB_CHARSET . "'>\n";
    echo "<meta name = 'description' content = 'Free 2-Column CSS Web Design Template'>\n";
    echo "<meta name = 'keywords' content = 'Free, 2-Column, CSS, Web, Design, Template'>\n";
    echo "<title>" . WEB_TITLE . "</title>\n";
    //echo "<link href = '" . ROOT_URL . "/css/style.css' type = 'text/css' rel = 'stylesheet'>\n";
    //echo "<link href = '" . ROOT_URL . "/style.css' rel = 'stylesheet' type = 'text/css'>\n";
    echo "<link href = '" . ROOT_URL . "/include/kurt.css' rel = 'stylesheet' type = 'text/css'>\n";
    echo "<link href = '" . ROOT_URL . "/css/style.css' rel = 'stylesheet' type = 'text/css'>\n";
    echo "<script type = 'text/javascript' src = '" . ROOT_URL . "/include/kurt.js'></script>\n";
    if ( $head ){ echo "</head>\n"; }
}

//會員登入
function login_user( $username = '', $password = '')
{
    $row = get_value('user', "WHERE username = '" . $username . "'");
    if ( $row['id'] == '' )
    {
        showMsg('帳號錯誤，請重新輸入!!');

    }else if ( $row['password'] != md5($password) )
    {
        showMsg('密碼錯誤，請重新輸入!!');

    }else{
        $login_time = time();       //登入時間
        $sql = mysql_query("INSERT INTO sessions(session_id, userid, login_time)VALUES('" . USER_SESSIONS . "', '" . $row['id'] . "', '" . $login_time . "')");
		$sql2 = mysql_query("INSERT INTO action_log(username, actid, actime)VALUES('" . $username . "', '" . 1 . "', '" . $login_time . "')");
        if (!$sql)
        {
            showMsg('系統發生錯誤，請洽系統管理員!!');
        }else{
            //刪除訪客餐盤資料，避免發生計算錯誤

            delete_value('guest_food', "WHERE session_id = '" . USER_SESSIONS . "' OR add_time <= '" . (time() - COOKIE_TIME) . "'" );
            delete_value('guest_health', "WHERE session_id = '" . USER_SESSIONS . "' OR add_time <= '" . (time() - COOKIE_TIME) . "'" );
            delete_value('sessions', "WHERE login_time <= '" . (time() - COOKIE_TIME) . "'"); //刪除資料庫中過期SESSION資料
            phpDirect(ROOT_URL . '/index.php');
        }
        /*$user_value = array();
        $user_value = $row;
        $user_value['session_id'] = $session_id;
        $user_value['login_time'] = $login_time;


        //將該使用者資料存入USER cookie
        foreach ( $user_value as $key => $value )
        {
            setcookie('USER[' . $key . ']', $value, (time() + COOKIE_TIME) );
        }

        //判斷使用者是否有開啟COOKIE
        ck_cookie();*/
    }
}

//紀錄動作
function actionlog($log_num,$username)
{
	$act_time = time();
	$sql2 = mysql_query("INSERT INTO action_log(username, actid, actime)VALUES('" . $username . "', '" . $log_num . "', '" . $act_time . "')");
}

//檢查使用者是否開啟COOLKIE
function ck_cookie()
{
    $ckUSER = $_COOKIE['USER'];
    if (!$ckUSER)
    {
        showMsg('無法讀取COOKIE，請將該網站設為允許存取COOKIE!!');
    }
}

//判斷使用者是否有登入
function ck_login()
{
    $row = get_value('sessions', "WHERE session_id = '" . USER_SESSIONS . "'", '*');
    //判斷資料庫與cookie資料是否一致，時間是否有超過存活時間
    if ( $row['login_time'] >= (time() - COOKIE_TIME) )
    {
        return $row;
    }else{
        return false;
    }
}

//取得使用者的個人資料
function get_user_value($userid = '')
{
    if ( trim($userid) == '') return false;
    $user_value = get_value('user', "WHERE id = '" . $userid . "'", '*');
    foreach( $user_value as $key => $value )
    {
        $user[$key] = $value;
    }
    return $user;
}

//取得使用者的健康資料
function get_user_health($userid = '')
{
    if ( trim($userid) == '') return false;
    $user_value = get_value('user_health', "WHERE userid = '" . $userid . "'", '*');
    foreach( $user_value as $key => $value )
    {
        $user[$key] = $value;
    }
    return $user;
}

//判斷訪客是否有填寫個人資料
function ck_guest_value( $session_id = '' )
{
    if ( ck_login( $session_id )){ return true; }
    if ( countSQL('guest_health', 'health_id', "WHERE session_id = '" . $session_id . "'") > 0 )
    {
        return true;
    }else{
        return false;
    }
}

//取得訪客的健康資料
function get_guest_health($health_id = '')
{
    if ( trim($session_id) == '') return false;
    $user_value = get_value('guest_health', "WHERE health_id = '" . $health_id . "'", '*');
    foreach( $user_value as $key => $value )
    {
        $user[$key] = $value;
    }
    return $user;
}

//計算所需卡洛里$weight = 體重, $bmi = BMI, $action = 活動量分級
function get_cal($weight = '', $bmi = '', $action = '')
{
    $x['輕度'] = array('thin' => '40', 'middle' => '35', 'fat' => '30');
    $x['中度'] = array('thin' => '40', 'middle' => '35', 'fat' => '30');
    $x['重度'] = array('thin' => '45', 'middle' => '40', 'fat' => '35');
    $x['臥床'] = array('thin' => '35', 'middle' => '30', 'fat' => '25');
    if ($weight == '' || $bmi == '' || $action == ''){ return false; }
    if ( $bmi >= 24 )
    {
        $cal = $weight * $x[$action]['fat'];
    }else if ( $bmi < 18.5 )
    {
        $cal = $weight * $x[$action]['thin'];
    }else{
        $cal = $weight * $x[$action]['middle'];
    }
    return $cal;
}

//計算剩餘熱量數$cal = 一天所需熱量, $sid = session_id();
function get_count_cal($cal = '', $sid = '')
{
    $result = mysql_query("SELECT cal, portion FROM guest_food WHERE session_id = '" . $sid . "'");
    while ( $row = mysql_fetch_array($result) )
    {
        $cal = floor($cal - ($row['cal'] * $row['portion']));
    }
    return $cal;
}

//計算本餐剩餘熱量數$cal = 一天所需熱量, $sid = session_id(), $meal餐別;
function get_meal_count_cal($cal = '', $sid = '', $meal = '')
{
    $result = mysql_query("SELECT cal, portion FROM guest_food WHERE session_id = '" . $sid . "' AND meal = '" . $meal . "'");
    while ( $row = mysql_fetch_array($result) )
    {
        $cal = floor($cal - ($row['cal'] * $row['portion']));
    }
    return $cal;
}

//秀出目前所在位置$url key值表示名稱，value表示網址
function show_path_url($url = '')
{
    $i = 0;
    $gourl = '';
    foreach( $url as $key => $value )
    {
        if ( trim($value) == '')
        {
            $gourl .= "<font style = 'font-size:13px'>" . $key . "</font>\n";
        }else{
            $gourl .= "<a href = '" . ROOT_URL . "/" . $value . "'><font style = 'font-size:13px'>" . $key . "</font></a>\n";
        }
        $i++;
        if ($i < count($url) )
        {
            $gourl .= ' > ';
        }
    }
    return $gourl;
}

//產生亂數
function get_rand($min = 0, $max = 0)
{
    return rand($min, $max);
}

function get_food_plate($s_id = '')
{
    if ( $s_id == '' ){ return false; }

    //只抓取最新的一次配餐
    $sql = "SELECT * FROM guest_food WHERE session_id = '" . $s_id . "' AND rand = (SELECT rand FROM guest_food WHERE session_id = '" . $s_id . "' ORDER BY add_time DESC LIMIT 0,1)";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result) )
    {
        $value[$row['id']]['food_id'] = $row['food_id'];  //食物ID
        $value[$row['id']]['cal']     = $row['cal'];      //卡洛里
        $value[$row['id']]['percent'] = $row['percent'];  //本次配餐佔一天份量
        $value[$row['id']]['portion'] = $row['portion'];  //食物份量
        $value[$row['id']]['meal']    = $row['meal'];     //餐別
    }
    return $value;
}

//儲存瀏覽人數
function input_counter($s_id = '')
{
    if ($s_id == ''){ return false; }
    if ( countSQL("counter", "1", "WHERE session_id = '" . $s_id . "'") > 0)
    {
        if ( countSQL("sessions", "1", "WHERE session_id = '" . $s_id . "'") > 0 )
        {
            $sql = "UPDATE counter SET is_reg = '1' WHERE session_id = '" . $s_id . "'";
            mysql_query($sql);
        }
    }else{
        $sql = "INSERT INTO counter (session_id, add_time)VALUES('" . $s_id . "' , '" . time() . "')";
        mysql_query($sql);
    }
}

//取得瀏覽人數紀錄
function get_counter()
{
    $startTime = mktime(0, 0, 0, date("m"), date("d"), date("Y"));   //今日瀏覽人數開始時間
    $endTime   = mktime(23, 59, 59, date("m"), date("d"), date("Y"));//今日瀏覽人數結束時間
    $value['all_total'] = countSQL("counter");   //累計瀏覽人數
    $value['today_total'] = countSQL("counter", "1", "WHERE add_time >= '" . $startTime . "' AND add_time <= '" . $endTime . "'");   //今日瀏覽人數
    $value['user_total'] = countSQL("user");     //累計會員人數
    return $value;
}

function ckadmin()
{
    global $USER;
    $pvalue = get_col_value("power", "power", "WHERE userid = '" . $USER['userid'] . "'");
    if ($pvalue != '')
    {
        $USER['power'] = $pvalue;
        return true;
    }else{
        return false;
    }
}
//<!---==========================================================================================================================--->
/////限制營養素:
//檢查一天所需的蛋白質
function check_protein2($maxV = '')
{
    global $USER, $CFG;

    $bmi_s_protein2  = $CFG['bmi_s_protein'];     //蛋白質BMI偏低限定值
    $bmi_c_protein2  = $CFG['bmi_c_protein'];     //蛋白質BMI正常限定值
    $bmi_b_protein2  = $CFG['bmi_b_protein'];     //蛋白質BMI過重限定值
    $stage1_protein2 = $CFG['stage1_protein'];  //蛋白質腎臟病限定值1
    $stage2_protein2 = $CFG['stage2_protein'];  //蛋白質腎臟病限定值2
    $stage3_protein2 = $CFG['stage3_protein'];  //蛋白質腎臟病限定值3
    $stage4_protein2 = $CFG['stage4_protein'];  //蛋白質腎臟病限定值4
    $stage5_protein2 = $CFG['stage5_protein'];  //蛋白質腎臟病限定值5
    $hd_protein_12 = $CFG['hd_protein_1'];        //蛋白質腎臟病限定值HD
    $hd_protein_22 = $CFG['hd_protein_2'];        //蛋白質腎臟病限定值HD
    $capd_protein_12 = $CFG['capd_protein_1'];  //蛋白質腎臟病限定值CAPD
    $capd_protein_22 = $CFG['capd_protein_2'];  //蛋白質腎臟病限定值CAPD

    if ( $USER['kidney'] == '有' )         //先判斷是否有腎臟病
    {
        if ( $USER['kidney_cure'] == 'HD' )//在判斷是否有洗腎
        {
                $msg = $hd_protein_12 . '~' . $hd_protein_22;
        }
		elseif ( $USER['kidney_cure'] == 'CAPD' )
        {
                $msg = $capd_protein_12 . '~' . $capd_protein_22;
        }
     	elseif ( $USER['gfr'] >= 90 )
        {
                $msg = $stage1_protein2;
		}
		elseif ( $USER['gfr'] >= 60 && $USER['gfr'] < 90 )
        {
                $msg = $stage2_protein2;
 
        }
		elseif ( $USER['gfr'] >= 30 && $USER['gfr'] < 60 )
        {
                $msg = $stage3_protein2;
        }
		elseif ( $USER['gfr'] >= 15 && $USER['gfr'] < 30 )
		{
                $msg = $stage4_protein2;
        }
		elseif ($USER['gfr'] < 15 )
        {
                $msg = $stage5_protein2;
    	}
	}
	else
	{
       	if ( $USER['bmi'] < 18.5 )
       	{
                $msg = $bmi_s_protein2;
       	}
		elseif ( $USER['bmi'] > 24 )
       	{
               $msg = $bmi_b_protein2;
       	}
		else
		{
               $msg = $bmi_c_protein2;
       	}
   	}
	if($msg=='')
	{
		$msg = "N/A";
	}
    return $msg;
}
//-----------------------------------------------------------------------------------------------------------------------------------
//檢查蛋白質是否過量$maxV = 最大值, $percent = 本餐所需
function check_protein($maxV = '', $percent = '')
{
    global $USER, $CFG;

    $bmi_s_protein  = ($percent != '' && $CFG['bmi_s_protein'] != '')? round( ($CFG['bmi_s_protein'] / $percent), 1) : $CFG['bmi_s_protein'];     //蛋白質BMI偏低限定值
    $bmi_c_protein  = ($percent != '' && $CFG['bmi_c_protein'] != '')? round( ($CFG['bmi_c_protein'] / $percent), 1) : $CFG['bmi_c_protein'];     //蛋白質BMI正常限定值
    $bmi_b_protein  = ($percent != '' && $CFG['bmi_b_protein'] != '')? round( ($CFG['bmi_b_protein'] / $percent), 1) : $CFG['bmi_b_protein'];     //蛋白質BMI過重限定值
    $stage1_protein = ($percent != '' && $CFG['stage1_protein'] != '')? round( ($CFG['stage1_protein'] / $percent), 1) : $CFG['stage1_protein'];  //蛋白質腎臟病限定值1
    $stage2_protein = ($percent != '' && $CFG['stage2_protein'] != '')? round( ($CFG['stage2_protein'] / $percent), 1) : $CFG['stage2_protein'];  //蛋白質腎臟病限定值2
    $stage3_protein = ($percent != '' && $CFG['stage3_protein'] != '')? round( ($CFG['stage3_protein'] / $percent), 1) : $CFG['stage3_protein'];  //蛋白質腎臟病限定值3
    $stage4_protein = ($percent != '' && $CFG['stage4_protein'] != '')? round( ($CFG['stage4_protein'] / $percent), 1) : $CFG['stage4_protein'];  //蛋白質腎臟病限定值4
    $stage5_protein = ($percent != '' && $CFG['stage5_protein'] != '')? round( ($CFG['stage5_protein'] / $percent), 1) : $CFG['stage5_protein'];  //蛋白質腎臟病限定值5
    $hd_protein_1   = ($percent != '' && $CFG['hd_protein_1'] != '')? round( ($CFG['hd_protein_1'] / $percent), 1) : $CFG['hd_protein_1'];        //蛋白質腎臟病限定值HD
    $hd_protein_2   = ($percent != '' && $CFG['hd_protein_2'] != '')? round( ($CFG['hd_protein_2'] / $percent), 1) : $CFG['hd_protein_2'];        //蛋白質腎臟病限定值HD
    $capd_protein_1 = ($percent != '' && $CFG['capd_protein_1'] != '')? round( ($CFG['capd_protein_1'] / $percent), 1) : $CFG['capd_protein_1'];  //蛋白質腎臟病限定值CAPD
    $capd_protein_2 = ($percent != '' && $CFG['capd_protein_2'] != '')? round( ($CFG['capd_protein_2'] / $percent), 1) : $CFG['capd_protein_2'];  //蛋白質腎臟病限定值CAPD

    if ( $USER['kidney'] == '有' )         //先判斷是否有腎臟病
    {
        if ( $USER['kidney_cure'] == 'HD' )//在判斷是否有洗腎
        {
            if ( $maxV == '' || ($hd_protein_1 >= $maxV && $hd_protein_2 <= $maxV) )
            {
                $msg = $hd_protein_1 . '~' . $hd_protein_2;
            }else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $hd_protein_1 . '~' . $hd_protein_2 . "</font>\n";
            }
        }
        elseif ( $USER['kidney_cure'] == 'CAPD' )
        {
            if ( $maxV == '' || ($capd_protein_1 >= $maxV && $capd_protein_2 <= $maxV) )
            {
                $msg = $capd_protein_1 . '~' . $capd_protein_2;
            }else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $capd_protein_1 . '~' . $capd_protein_2 . "</font>\n";
            }
        }elseif ( $USER['gfr'] >= 90 )
        {
            if ( $maxV == '' || $stage1_protein > $maxV )
            {
                $msg = $stage1_protein;
            }else{
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage1_protein . "</font>\n";
            }
        }elseif ( $USER['gfr'] >= 60 && $USER['gfr'] < 90 )
        {
            if ( $maxV == '' || $stage2_protein > $maxV )
            {
                $msg = $stage2_protein;
            }else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage2_protein . "</font>\n";
            }
        }elseif ( $USER['gfr'] >= 30 && $USER['gfr'] < 60 )
        {
            if ( $maxV == '' || $stage3_protein > $maxV )
            {
                $msg = $stage3_protein;
            }else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage3_protein . "</font>\n";
            }
        }elseif ( $USER['gfr'] >= 15 && $USER['gfr'] < 30 )
        {
            if ( $maxV == '' || $stage4_protein > $maxV )
            {
                $msg = $stage4_protein;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage4_protein . "</font>\n";
            }
        }elseif ($USER['gfr'] < 15 )
        {
            if ( $maxV == '' || $stage5_protein > $maxV )
            {
                $msg = $stage5_protein;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage5_protein . "</font>\n";
            }
        }
    }
    else
    {
        if ( $USER['bmi'] < 18.5 )
        {
            if ( $maxV == '' || $bmi_s_protein > $maxV )
            {
                $msg = $bmi_s_protein;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_s_protein . "</font>\n";
            }
        }
        elseif ( $USER['bmi'] > 24 )
        {
            if ( $maxV == '' || $bmi_b_protein > $maxV )
            {
                $msg = $bmi_b_protein;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_b_protein . "</font>\n";
            }
        }
        else
        {
            if ( $maxV == '' || $bmi_c_protein > $maxV )
            {
                $msg = $bmi_c_protein;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_c_protein . "</font>\n";
            }
        }
    }
	if($msg=='')
	{
		$msg = "N/A";
	}
    return $msg;
}
//<!---==========================================================================================================================--->

//檢查一天所需醣類
function check_car2($maxV = '')
{
    global $USER, $CFG;

    $bmi_s_car2  = $CFG['bmi_s_car'];    //醣類BMI偏低限定值
    $bmi_c_car2  = $CFG['bmi_c_car'];    //醣類BMI正常限定值
    $bmi_b_car2  = $CFG['bmi_b_car'];    //醣類BMI過重限定值
    $stage1_car2 = $CFG['stage1_car']; //醣類腎臟病限定值1
    $stage2_car2 = $CFG['stage2_car']; //醣類腎臟病限定值2
    $stage3_car2 = $CFG['stage3_car']; //醣類腎臟病限定值3
    $stage4_car2 = $CFG['stage4_car']; //醣類腎臟病限定值4
    $stage5_car2 = $CFG['stage5_car']; //醣類腎臟病限定值5
    $hd_car2     = $CFG['hd_car'];             //醣類腎臟病限定值HD
    $capd_car2   = $CFG['capd_car'];       //醣類腎臟病限定值CAPD

    if ( $USER['kidney'] == '有' )         //先判斷是否有腎臟病
    {
        if ( $USER['kidney_cure'] == 'HD' )//在判斷是否有洗腎
        {
                 $msg = $hd_car2;
        }
		elseif ( $USER['kidney_cure'] == 'CAPD' )
        {
                $msg = $capd_car2;
        }
		elseif ( $USER['gfr'] >= 90 )
        {
                $msg = $stage1_car2;
        }
		elseif ( $USER['gfr'] >= 60 && $USER['gfr'] < 90 )
        {
                $msg = $stage2_car2;
        }
		elseif ( $USER['gfr'] >= 30 && $USER['gfr'] < 60 )
        {
                $msg = $stage3_car2;
        }
		elseif ( $USER['gfr'] >= 15 && $USER['gfr'] < 30 )
        {
                $msg = $stage4_car2;
        }
		elseif ($USER['gfr'] < 15 )
        {
                $msg = $stage5_car2;
    	}
    }
	else
	{
       	if ( $USER['bmi'] < 18.5 )
       	{
               $msg = $bmi_s_car2;
       	}
		elseif ( $USER['bmi'] > 24 )
	    {
               $msg = $bmi_b_car2;
        }
		else
		{
               	$msg = $bmi_c_car2;
       	}
    }
	if($msg=='')
	{
		$msg = "N/A";
	}
    return $msg;
}
//-----------------------------------------------------------------------------------------------------------------------------------
//檢查醣類是否過量$maxV = 最大值, $percent = 本餐所需
function check_car($maxV = '', $percent = '')
{
    global $USER, $CFG;

    $bmi_s_car  = ($percent != '' && $CFG['bmi_s_car'] != '')? round( ($CFG['bmi_s_car'] / $percent), 1) : $CFG['bmi_s_car'];    //醣類BMI偏低限定值
    $bmi_c_car  = ($percent != '' && $CFG['bmi_c_car'] != '')? round( ($CFG['bmi_c_car'] / $percent), 1) : $CFG['bmi_c_car'];    //醣類BMI正常限定值
    $bmi_b_car  = ($percent != '' && $CFG['bmi_b_car'] != '')? round( ($CFG['bmi_b_car'] / $percent), 1) : $CFG['bmi_b_car'];    //醣類BMI過重限定值
    $stage1_car = ($percent != '' && $CFG['stage1_car'] != '')? round( ($CFG['stage1_car'] / $percent), 1) : $CFG['stage1_car']; //醣類腎臟病限定值1
    $stage2_car = ($percent != '' && $CFG['stage2_car'] != '')? round( ($CFG['stage2_car'] / $percent), 1) : $CFG['stage2_car']; //醣類腎臟病限定值2
    $stage3_car = ($percent != '' && $CFG['stage3_car'] != '')? round( ($CFG['stage3_car'] / $percent), 1) : $CFG['stage3_car']; //醣類腎臟病限定值3
    $stage4_car = ($percent != '' && $CFG['stage4_car'] != '')? round( ($CFG['stage4_car'] / $percent), 1) : $CFG['stage4_car']; //醣類腎臟病限定值4
    $stage5_car = ($percent != '' && $CFG['stage5_car'] != '')? round( ($CFG['stage5_car'] / $percent), 1) : $CFG['stage5_car']; //醣類腎臟病限定值5
    $hd_car     = ($percent != '' && $CFG['hd_car'] != '')? round( ($CFG['hd_car'] / $percent), 1) : $CFG['hd_car'];             //醣類腎臟病限定值HD
    $capd_car   = ($percent != '' && $CFG['capd_car'] != '')? round( ($CFG['capd_car'] / $percent), 1) : $CFG['capd_car'];       //醣類腎臟病限定值CAPD

    if ( $USER['kidney'] == '有' )         //先判斷是否有腎臟病
    {
        if ( $USER['kidney_cure'] == 'HD' )//在判斷是否有洗腎
        {
            if ( $maxV == '' || $hd_car > $maxV )
            {
                $msg = $hd_car;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $hd_car . "</font>\n";
            }
        }
        elseif ( $USER['kidney_cure'] == 'CAPD' )
        {
            if ( $maxV == '' || $capd_car > $maxV )
            {
                $msg = $capd_car;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $capd_car . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 90 )
        {
            if ( $maxV == '' || $stage1_car > $maxV )
            {
                $msg = $stage1_car;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage1_car . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 60 && $USER['gfr'] < 90 )
        {
            if ( $maxV == '' || $stage2_car > $maxV )
            {
                $msg = $stage2_car;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage2_car . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 30 && $USER['gfr'] < 60 )
        {
            if ( $maxV == '' || $stage3_car > $maxV )
            {
                $msg = $stage3_car;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage3_car . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 15 && $USER['gfr'] < 30 )
        {
            if ( $maxV == '' || $stage4_car > $maxV )
            {
                $msg = $stage4_car;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage4_car . "</font>\n";
            }
        }
        elseif ($USER['gfr'] < 15 )
        {
            if ( $maxV == '' || $stage5_car > $maxV )
            {
                $msg = $stage5_car;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage5_car . "</font>\n";
            }
        }
    }
    else
    {
        if ( $USER['bmi'] < 18.5 )
        {
            if ( $maxV == '' || $bmi_s_car > $maxV )
            {
                $msg = $bmi_s_car;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_s_car . "</font>\n";
            }
        }
        elseif ( $USER['bmi'] > 24 )
        {
            if ( $maxV == '' || $bmi_b_car > $maxV )
            {
                $msg = $bmi_b_car;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_b_car . "</font>\n";
            }
        }
        else
        {
            if ( $maxV == '' || $bmi_c_car > $maxV )
            {
                $msg = $bmi_c_car;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_c_car . "</font>\n";
            }
        }
    }
	if($msg=='')
	{
		$msg = "N/A";
	}
    return $msg;
}
//<!---==========================================================================================================================--->
function check_cho2($maxV = '')
{
    global $USER, $CFG;

    //判斷要回傳的訊息是否需要本餐所需份量
    $bmi_s_cho2  = $CFG['bmi_s_cho'];        //膽固醇BMI偏低限定值
    $bmi_c_cho2  = $CFG['bmi_c_cho'];        //膽固醇BMI正常限定值
    $bmi_b_cho2  = $CFG['bmi_b_cho'];        //膽固醇BMI過重限定值
    $stage1_cho2 = $CFG['stage1_cho'];     //膽固醇腎臟病限定值1
    $stage2_cho2 = $CFG['stage2_cho'];     //膽固醇腎臟病限定值2
    $stage3_cho2 = $CFG['stage3_cho'];     //膽固醇腎臟病限定值3
    $stage4_cho2 = $CFG['stage4_cho'];     //膽固醇腎臟病限定值4
    $stage5_cho2 = $CFG['stage5_cho'];     //膽固醇腎臟病限定值5
    $hd_cho2     = $CFG['hd_cho'];                 //膽固醇腎臟病限定值HD
    $capd_cho2   = $CFG['capd_cho'];           //膽固醇腎臟病限定值CAPD

    if ( $USER['kidney'] == '有' )         //先判斷是否有腎臟病
    {
        if ( $USER['kidney_cure'] == 'HD' )//在判斷是否有洗腎
        {
                 $msg = $hd_cho2;
        }
		elseif ( $USER['kidney_cure'] == 'CAPD' )
        { 
		         $msg = $capd_cho2;
        }
		elseif ( $USER['gfr'] >= 90 )
        {  
                $msg = $stage1_cho2;
        }
		elseif ( $USER['gfr'] >= 60 && $USER['gfr'] < 90 )
        {
                $msg = $stage2_cho2;  
        }
		elseif ( $USER['gfr'] >= 30 && $USER['gfr'] < 60 )
        {
                  $msg = $stage3_cho2;
        }
		elseif ( $USER['gfr'] >= 15 && $USER['gfr'] < 30 )
        {
                $msg = $stage4_cho2;
        }
		elseif ($USER['gfr'] < 15 )
        {
                $msg = $stage5_cho2;
        }
	}
	else
	{
       	if ( $USER['bmi'] < 18.5 )
       	{
                $msg = $bmi_s_cho2;
       	}
		elseif ( $USER['bmi'] > 24 )
       	{
               $msg = $bmi_b_cho2;
       	}
		else
		{
               $msg = $CFG['bmi_c_cho'];
       	}
    }
	if($msg=='')
	{
		$msg = "N/A";
	}
    return $msg;
}

//-----------------------------------------------------------------------------------------------------------------------------------
//檢查膽固醇是否過量$maxV = 最大值, $percent = 本餐所需
function check_cho($maxV = '', $percent = '')
{
    global $USER, $CFG;

    //判斷要回傳的訊息是否需要本餐所需份量
    $bmi_s_cho  = ($percent != '' && $CFG['bmi_s_cho'] != '')? round( ($CFG['bmi_s_cho'] / $percent), 1) : $CFG['bmi_s_cho'];        //膽固醇BMI偏低限定值
    $bmi_c_cho  = ($percent != '' && $CFG['bmi_c_cho'] != '')? round( ($CFG['bmi_c_cho'] / $percent), 1) : $CFG['bmi_c_cho'];        //膽固醇BMI正常限定值
    $bmi_b_cho  = ($percent != '' && $CFG['bmi_b_cho'] != '')? round( ($CFG['bmi_b_cho'] / $percent), 1) : $CFG['bmi_b_cho'];        //膽固醇BMI過重限定值
    $stage1_cho = ($percent != '' && $CFG['stage1_cho'] != '')? round( ($CFG['stage1_cho'] / $percent), 1) : $CFG['stage1_cho'];     //膽固醇腎臟病限定值1
    $stage2_cho = ($percent != '' && $CFG['stage2_cho'] != '')? round( ($CFG['stage2_cho'] / $percent), 1) : $CFG['stage2_cho'];     //膽固醇腎臟病限定值2
    $stage3_cho = ($percent != '' && $CFG['stage3_cho'] != '')? round( ($CFG['stage3_cho'] / $percent), 1) : $CFG['stage3_cho'];     //膽固醇腎臟病限定值3
    $stage4_cho = ($percent != '' && $CFG['stage4_cho'] != '')? round( ($CFG['stage4_cho'] / $percent), 1) : $CFG['stage4_cho'];     //膽固醇腎臟病限定值4
    $stage5_cho = ($percent != '' && $CFG['stage5_cho'] != '')? round( ($CFG['stage5_cho'] / $percent), 1) : $CFG['stage5_cho'];     //膽固醇腎臟病限定值5
    $hd_cho     = ($percent != '' && $CFG['hd_cho'] != '')? round( ($CFG['hd_cho'] / $percent), 1) : $CFG['hd_cho'];                 //膽固醇腎臟病限定值HD
    $capd_cho   = ($percent != '' && $CFG['capd_cho'] != '')? round( ($CFG['capd_cho'] / $percent), 1) : $CFG['capd_cho'];           //膽固醇腎臟病限定值CAPD

    if ( $USER['kidney'] == '有' )         //先判斷是否有腎臟病
    {
        if ( $USER['kidney_cure'] == 'HD' )//在判斷是否有洗腎
        {
            if ( $maxV == '' || $hd_cho > $maxV )
            {
                $msg = $hd_cho;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $hd_cho . "</font>\n";
            }
        }
        elseif ( $USER['kidney_cure'] == 'CAPD' )
        {
            if ( $maxV == '' || $capd_cho > $maxV )
            {
                $msg = $capd_cho;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $capd_cho . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 90 )
        {
            if ( $maxV == '' || $stage1_cho > $maxV )
            {
                $msg = $stage1_cho;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage1_cho . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 60 && $USER['gfr'] < 90 )
        {
            if ( $maxV == '' || $stage2_cho > $maxV )
            {
                $msg = $stage2_cho;
            }else{
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage2_cho . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 30 && $USER['gfr'] < 60 )
        {
            if ( $maxV == '' || $stage3_cho > $maxV )
            {
                $msg = $stage3_cho;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage3_cho . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 15 && $USER['gfr'] < 30 )
        {
            if ( $maxV == '' || $stage4_cho > $maxV )
            {
                $msg = $stage4_cho;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage4_cho . "</font>\n";
            }
        }
        elseif ($USER['gfr'] < 15 )
        {
            if ( $maxV == '' || $stage5_cho > $maxV )
            {
                $msg = $stage5_cho;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage5_cho . "</font>\n";
            }
        }
    }
    else
    {
        if ( $USER['bmi'] < 18.5 )
        {
            if ( $maxV == '' || $bmi_s_cho > $maxV )
            {
                $msg = $bmi_s_cho;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_s_cho . "</font>\n";
            }
        }
        elseif ( $USER['bmi'] > 24 )
        {
            if ( $maxV == '' || $bmi_b_cho > $maxV )
            {
                $msg = $bmi_b_cho;
            }else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_b_cho . "</font>\n";
            }
        }
        else
        {
            if ( $maxV == '' || $bmi_c_cho > $maxV )
            {
                $msg = $CFG['bmi_c_cho'];
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_c_cho . "</font>\n";
            }
        }
    }
	if($msg=='')
	{
		$msg = "N/A";
	}
    return $msg;
}
//<!---==========================================================================================================================--->
//一日脂肪
function check_fat2($maxV = '', $maxF = '')
{
    global $USER, $CFG;

    $fat_22 = $CFG['fat_2'];            //脂肪熱量數%
    if ( $USER['kidney'] == '有' )         //先判斷是否有腎臟病
    {
        $value = round( ($maxV * $CFG['fat_1']) / $maxF, 1);
            $msg = round( ( ($fat_22 * $maxF / 100) / $CFG['fat_1']), 1);
    }
	else
	{
		$msg = "N/A";
	}
    return $msg;
}
//-----------------------------------------------------------------------------------------------------------------------------------
//檢查脂肪是否過量$maxV = 最大值, $maxF = 總熱量, $percent = 本餐所需
function check_fat($maxV = '', $maxF = '', $percent = '')
{
    global $USER, $CFG;

    $fat_2 = ($percent != '' && $CFG['fat_2'] != '')? round( ($CFG['fat_2'] / $percent), 1) : $CFG['fat_2'];            //脂肪熱量數%
    if ( $USER['kidney'] == '有' )         //先判斷是否有腎臟病
    {
        $value = round( ($maxV * $CFG['fat_1']) / $maxF, 1);
        if ( $value >= ($fat_2/100) )
        {
            $msg = "<font style = 'color:#FF0000;font-weight:700'>" . round( ( ($fat_2 * $maxF / 100) / $CFG['fat_1']), 1) . "</font>\n";
        }
        else
        {
            $msg = round( ( ($fat_2 * $maxF / 100) / $CFG['fat_1']), 1);
        }
    }
	else
	{
		$msg = "N/A";
	}
    return $msg;
}
//<!---==========================================================================================================================--->
//一日鉀
function check_pot2($maxV = '')
{
    global $USER, $CFG;

    $bmi_s_pot2  = $CFG['bmi_s_pot'];     //鉀BMI偏低限定值
    $bmi_c_pot2  = $CFG['bmi_c_pot'];     //鉀BMI正常限定值
    $bmi_b_pot2  = $CFG['bmi_b_pot'];     //鉀BMI過重限定值
    $stage1_pot2 = $CFG['stage1_pot'];  //鉀腎臟病限定值1
    $stage2_pot2 = $CFG['stage2_pot'];  //鉀腎臟病限定值2
    $stage3_pot2 = $CFG['stage3_pot'];  //鉀腎臟病限定值3
    $stage4_pot2 = $CFG['stage4_pot'];  //鉀腎臟病限定值4
    $stage5_pot2 = $CFG['stage5_pot'];  //鉀腎臟病限定值5
    $hd_pot2     = $CFG['hd_pot'];              //鉀腎臟病限定值HD
    $capd_pot2   = $CFG['capd_pot'];        //鉀腎臟病限定值CAPD

    if ( $USER['kidney'] == '有' )         //先判斷是否有腎臟病
    {
        if ( $USER['kidney_cure'] == 'HD' )//在判斷是否有洗腎
        {
                $msg = $hd_pot2;
        }
		elseif ( $USER['kidney_cure'] == 'CAPD' )
        {
                $msg = $capd_pot2;
        }
		elseif ( $USER['gfr'] >= 90 )
        {
                $msg = $stage1_pot2;
        }
		elseif ( $USER['gfr'] >= 60 && $USER['gfr'] < 90 )
        {
                $msg = $stage2_pot2;
        }
		elseif ( $USER['gfr'] >= 30 && $USER['gfr'] < 60 )
        {
                $msg = $stage3_pot2;
        }
		elseif ( $USER['gfr'] >= 15 && $USER['gfr'] < 30 )
        {
                $msg = $stage4_pot2;
        }
		elseif ($USER['gfr'] < 15 )
        {
                $msg = $stage5_pot2;
        }
	}
	else
	{
        if ( $USER['bmi'] < 18.5 )
        { 
               $msg = $bmi_s_pot2;
	    }
		elseif ( $USER['bmi'] > 24 )
        {
              $msg = $bmi_b_pot2;
	    }
		else
		{
              $msg = $bmi_c_pot2;
		}
    }
	if($msg=='')
	{
		$msg = "N/A";
	}
    return $msg;
}
//-----------------------------------------------------------------------------------------------------------------------------------
//檢查鉀是否過量$maxV = 最大值, $percent = 本餐所需
function check_pot($maxV = '', $percent = '')
{
    global $USER, $CFG;

    $bmi_s_pot  = ($percent != '' && $CFG['bmi_s_pot'] != '')? round( ($CFG['bmi_s_pot'] / $percent), 1) : $CFG['bmi_s_pot'];     //鉀BMI偏低限定值
    $bmi_c_pot  = ($percent != '' && $CFG['bmi_c_pot'] != '')? round( ($CFG['bmi_c_pot'] / $percent), 1) : $CFG['bmi_c_pot'];     //鉀BMI正常限定值
    $bmi_b_pot  = ($percent != '' && $CFG['bmi_b_pot'] != '')? round( ($CFG['bmi_b_pot'] / $percent), 1) : $CFG['bmi_b_pot'];     //鉀BMI過重限定值
    $stage1_pot = ($percent != '' && $CFG['stage1_pot'] != '')? round( ($CFG['stage1_pot'] / $percent), 1) : $CFG['stage1_pot'];  //鉀腎臟病限定值1
    $stage2_pot = ($percent != '' && $CFG['stage2_pot'] != '')? round( ($CFG['stage2_pot'] / $percent), 1) : $CFG['stage2_pot'];  //鉀腎臟病限定值2
    $stage3_pot = ($percent != '' && $CFG['stage3_pot'] != '')? round( ($CFG['stage3_pot'] / $percent), 1) : $CFG['stage3_pot'];  //鉀腎臟病限定值3
    $stage4_pot = ($percent != '' && $CFG['stage4_pot'] != '')? round( ($CFG['stage4_pot'] / $percent), 1) : $CFG['stage4_pot'];  //鉀腎臟病限定值4
    $stage5_pot = ($percent != '' && $CFG['stage5_pot'] != '')? round( ($CFG['stage5_pot'] / $percent), 1) : $CFG['stage5_pot'];  //鉀腎臟病限定值5
    $hd_pot     = ($percent != '' && $CFG['hd_pot'] != '')? round( ($CFG['hd_pot'] / $percent), 1) : $CFG['hd_pot'];              //鉀腎臟病限定值HD
    $capd_pot   = ($percent != '' && $CFG['capd_pot'] != '')? round( ($CFG['capd_pot'] / $percent), 1) : $CFG['capd_pot'];        //鉀腎臟病限定值CAPD

    if ( $USER['kidney'] == '有' )         //先判斷是否有腎臟病
    {
        if ( $USER['kidney_cure'] == 'HD' )//在判斷是否有洗腎
        {
            if ( $maxV == '' || $hd_pot > $maxV )
            {
                $msg = $hd_pot;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $hd_pot . "</font>\n";
            }
        }
        elseif ( $USER['kidney_cure'] == 'CAPD' )
        {
            if ( $maxV == '' || $capd_pot > $maxV )
            {
                $msg = $capd_pot;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $capd_pot . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 90 )
        {
            if ( $maxV == '' || $stage1_pot > $maxV )
            {
                $msg = $stage1_pot;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage1_pot . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 60 && $USER['gfr'] < 90 )
        {
            if ( $maxV == '' || $stage2_pot > $maxV )
            {
                $msg = $stage2_pot;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage2_pot . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 30 && $USER['gfr'] < 60 )
        {
            if ( $maxV == '' || $stage3_pot > $maxV )
            {
                $msg = $stage3_pot;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage3_pot . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 15 && $USER['gfr'] < 30 )
        {
            if ( $maxV == '' || $stage4_pot > $maxV )
            {
                $msg = $stage4_pot;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage4_pot . "</font>\n";
            }
        }
        elseif ($USER['gfr'] < 15 )
        {
            if ( $maxV == '' || $stage5_pot > $maxV )
            {
                $msg = $stage5_pot;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage5_pot . "</font>\n";
            }
        }
    }
    else
    {
        if ( $USER['bmi'] < 18.5 )
        {
            if ( $maxV == '' || $bmi_s_pot > $maxV )
            {
                $msg = $bmi_s_pot;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_s_pot . "</font>\n";
            }
        }
        elseif ( $USER['bmi'] > 24 )
        {
            if ( $maxV == '' || $bmi_b_pot > $maxV )
            {
                $msg = $bmi_b_pot;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_b_pot . "</font>\n";
            }
        }
        else
        {
            if ( $maxV == '' || $bmi_c_pot > $maxV )
            {
                $msg = $bmi_c_pot;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_c_pot . "</font>\n";
            }
        }
    }
	if($msg=='')
	{
		$msg = "N/A";
	}
    return $msg;
}
//<!---==========================================================================================================================--->
//一日鈉
function check_na2($maxV = '')
{
    global $USER, $CFG;

    $bmi_s_na2  = $CFG['bmi_s_na'];     //鈉BMI偏低限定值
    $bmi_c_na2  = $CFG['bmi_c_na'];     //鈉BMI正常限定值
    $bmi_b_na2  = $CFG['bmi_b_na'];     //鈉BMI過重限定值
    $stage1_na2 = $CFG['stage1_na'];  //鈉腎臟病限定值1
    $stage2_na2 = $CFG['stage2_na'];  //鈉腎臟病限定值2
    $stage3_na2 = $CFG['stage3_na'];  //鈉腎臟病限定值3
    $stage4_na2 = $CFG['stage4_na'];  //鈉腎臟病限定值4
    $stage5_na2 = $CFG['stage5_na'];  //鈉腎臟病限定值5
    $hd_na2     = $CFG['hd_na'];              //鈉腎臟病限定值HD
    $capd_na2   = $CFG['capd_na'];        //鈉腎臟病限定值CAPD

    if ( $USER['kidney'] == '有' )         //先判斷是否有腎臟病
    {
        if ( $USER['kidney_cure'] == 'HD' )//在判斷是否有洗腎
        {
                $msg = $hd_na2;
        }
		elseif ( $USER['kidney_cure'] == 'CAPD' )
        {
                $msg = $capd_na2;
        }
		elseif ( $USER['gfr'] >= 90 )
        {
                $msg = $stage1_na2;
        }
		elseif ( $USER['gfr'] >= 60 && $USER['gfr'] < 90 )
        {
                $msg = $stage2_na2;
        }
		elseif ( $USER['gfr'] >= 30 && $USER['gfr'] < 60 )
        {
                $msg = $stage3_na2;
        }
		elseif ( $USER['gfr'] >= 15 && $USER['gfr'] < 30 )
        {
                $msg = $stage4_na2;
        }
		elseif ($USER['gfr'] < 15 )
        {
                $msg = $stage5_na2;
        }
	}
	else
	{
       	if ( $USER['bmi'] < 18.5 )
       	{
               $msg = $bmi_s_na2;
       	}
		elseif ( $USER['bmi'] > 24 )
       	{
               $msg = $bmi_b_na2;
       	}
		else
		{
               $msg = $bmi_c_na2;
       	}
   	}
	if($msg=='')
	{
		$msg = "N/A";
	}
    return $msg;
}
//-----------------------------------------------------------------------------------------------------------------------------------
//檢查鈉是否過量$maxV = 最大值, $percent = 本餐所需
function check_na($maxV = '', $percent = '')
{
    global $USER, $CFG;

    $bmi_s_na  = ($percent != '' && $CFG['bmi_s_na'] != '')? round( ($CFG['bmi_s_na'] / $percent), 1) : $CFG['bmi_s_na'];     //鈉BMI偏低限定值
    $bmi_c_na  = ($percent != '' && $CFG['bmi_c_na'] != '')? round( ($CFG['bmi_c_na'] / $percent), 1) : $CFG['bmi_c_na'];     //鈉BMI正常限定值
    $bmi_b_na  = ($percent != '' && $CFG['bmi_b_na'] != '')? round( ($CFG['bmi_b_na'] / $percent), 1) : $CFG['bmi_b_na'];     //鈉BMI過重限定值
    $stage1_na = ($percent != '' && $CFG['stage1_na'] != '')? round( ($CFG['stage1_na'] / $percent), 1) : $CFG['stage1_na'];  //鈉腎臟病限定值1
    $stage2_na = ($percent != '' && $CFG['stage2_na'] != '')? round( ($CFG['stage2_na'] / $percent), 1) : $CFG['stage2_na'];  //鈉腎臟病限定值2
    $stage3_na = ($percent != '' && $CFG['stage3_na'] != '')? round( ($CFG['stage3_na'] / $percent), 1) : $CFG['stage3_na'];  //鈉腎臟病限定值3
    $stage4_na = ($percent != '' && $CFG['stage4_na'] != '')? round( ($CFG['stage4_na'] / $percent), 1) : $CFG['stage4_na'];  //鈉腎臟病限定值4
    $stage5_na = ($percent != '' && $CFG['stage5_na'] != '')? round( ($CFG['stage5_na'] / $percent), 1) : $CFG['stage5_na'];  //鈉腎臟病限定值5
    $hd_na     = ($percent != '' && $CFG['hd_na'] != '')? round( ($CFG['hd_na'] / $percent), 1) : $CFG['hd_na'];              //鈉腎臟病限定值HD
    $capd_na   = ($percent != '' && $CFG['capd_na'] != '')? round( ($CFG['capd_na'] / $percent), 1) : $CFG['capd_na'];        //鈉腎臟病限定值CAPD

    if ( $USER['kidney'] == '有' )         //先判斷是否有腎臟病
    {
        if ( $USER['kidney_cure'] == 'HD' )//在判斷是否有洗腎
        {
            if ( $maxV == '' || $hd_na > $maxV )
            {
                $msg = $hd_na;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $hd_na . "</font>\n";
            }
        }
        elseif ( $USER['kidney_cure'] == 'CAPD' )
        {
            if ( $maxV == '' || $capd_na > $maxV )
            {
                $msg = $capd_na;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $capd_na . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 90 )
        {
            if ( $maxV == '' || $stage1_na > $maxV )
            {
                $msg = $stage1_na;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage1_na . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 60 && $USER['gfr'] < 90 )
        {
            if ( $maxV == '' || $stage2_na > $maxV )
            {
                $msg = $stage2_na;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage2_na . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 30 && $USER['gfr'] < 60 )
        {
            if ( $maxV == '' || $stage3_na > $maxV )
            {
                $msg = $stage3_na;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage3_na . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 15 && $USER['gfr'] < 30 )
        {
            if ( $maxV == '' || $stage4_na > $maxV )
            {
                $msg = $stage4_na;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage4_na . "</font>\n";
            }
        }
        elseif ($USER['gfr'] < 15 )
        {
            if ( $maxV == '' || $stage5_na > $maxV )
            {
                $msg = $stage5_na;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage5_na . "</font>\n";
            }
        }
    }
    else
    {
        if ( $USER['bmi'] < 18.5 )
        {
            if ( $maxV == '' || $bmi_s_na > $maxV )
            {
                $msg = $bmi_s_na;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_s_na . "</font>\n";
            }
        }elseif ( $USER['bmi'] > 24 )
        {
            if ( $maxV == '' || $bmi_b_na > $maxV )
            {
                $msg = $bmi_b_na;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_b_na . "</font>\n";
            }
        }
        else
        {
            if ( $maxV == '' || $bmi_c_na > $maxV )
            {
                $msg = $bmi_c_na;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_c_na . "</font>\n";
            }
        }
    }
	if($msg=='')
	{
		$msg = "N/A";
	}
    return $msg;
}
//<!---==========================================================================================================================--->
//一日鈣
function check_cal2()
{
    global $USER, $CFG;

    $bmi_s_cal2  = $CFG['bmi_s_cal'];     //鈉BMI偏低限定值
    $bmi_c_cal2  = $CFG['bmi_c_cal'];     //鈉BMI正常限定值
    $bmi_b_cal2  = $CFG['bmi_b_cal'];     //鈉BMI過重限定值
    $stage1_cal2 = $CFG['stage1_cal'];  //鈉腎臟病限定值1
    $stage2_cal2 = $CFG['stage2_cal'];  //鈉腎臟病限定值2
    $stage3_cal2 = $CFG['stage3_cal'];  //鈉腎臟病限定值3
    $stage4_cal2 = $CFG['stage4_cal'];  //鈉腎臟病限定值4
    $stage5_cal2 = $CFG['stage5_cal'];  //鈉腎臟病限定值5
    $hd_cal2     = $CFG['hd_cal'];              //鈉腎臟病限定值HD
    $capd_cal2   = $CFG['capd_cal'];        //鈉腎臟病限定值CAPD

    if ( $USER['kidney'] == '有' )         //先判斷是否有腎臟病
    {
        if ( $USER['kidney_cure'] == 'HD' )//在判斷是否有洗腎
        {
                $msg = $hd_cal2;
        }
		elseif ( $USER['kidney_cure'] == 'CAPD' )
        {
                $msg = $capd_cal2;
        }
		elseif ( $USER['gfr'] >= 90 )
        {
                $msg = $stage1_cal2;
        }
		elseif ( $USER['gfr'] >= 60 && $USER['gfr'] < 90 )
        {
                $msg = $stage2_cal2;
        }
		elseif ( $USER['gfr'] >= 30 && $USER['gfr'] < 60 )
        {
                $msg = $stage3_cal2;
        }
		elseif ( $USER['gfr'] >= 15 && $USER['gfr'] < 30 )
        {
                $msg = $stage4_cal2;
        }
		elseif ($USER['gfr'] < 15 )
        {
                $msg = $stage5_cal2;
        }
	}
	else
	{
       	if ( $USER['bmi'] < 18.5 )
       	{
               $msg = $bmi_s_cal2;
       	}
		elseif ( $USER['bmi'] > 24 )
        {	
               $msg = $bmi_b_cal2;
   	    }
		else
		{
               $msg = $bmi_c_cal2;
		}	
    }
	if($msg=='')
	{
		$msg = "N/A";
	}
    return $msg;
}
//-----------------------------------------------------------------------------------------------------------------------------------
////檢查鈣是否過量$maxV = 最大值, $percent = 本餐所需
function check_cal($maxV = '', $percent = '')
{
    global $USER, $CFG;

    $bmi_s_cal  = ($percent != '' && $CFG['bmi_s_cal'] != '')? round( ($CFG['bmi_s_cal'] / $percent), 1) : $CFG['bmi_s_cal'];        //鈣BMI偏低限定值
    $bmi_c_cal  = ($percent != '' && $CFG['bmi_c_cal'] != '')? round( ($CFG['bmi_c_cal'] / $percent), 1) : $CFG['bmi_c_cal'];        //鈣BMI正常限定值
    $bmi_b_cal  = ($percent != '' && $CFG['bmi_b_cal'] != '')? round( ($CFG['bmi_b_cal'] / $percent), 1) : $CFG['bmi_b_cal'];        //鈣BMI過重限定值
    $stage1_cal = ($percent != '' && $CFG['stage1_cal'] != '')? round( ($CFG['stage1_cal'] / $percent), 1) : $CFG['stage1_cal'];     //鈣腎臟病限定值1
    $stage2_cal = ($percent != '' && $CFG['stage2_cal'] != '')? round( ($CFG['stage2_cal'] / $percent), 1) : $CFG['stage2_cal'];     //鈣腎臟病限定值2
    $stage3_cal = ($percent != '' && $CFG['stage3_cal'] != '')? round( ($CFG['stage3_cal'] / $percent), 1) : $CFG['stage3_cal'];     //鈣腎臟病限定值3
    $stage4_cal = ($percent != '' && $CFG['stage4_cal'] != '')? round( ($CFG['stage4_cal'] / $percent), 1) : $CFG['stage4_cal'];     //鈣腎臟病限定值4
    $stage5_cal = ($percent != '' && $CFG['stage5_cal'] != '')? round( ($CFG['stage5_cal'] / $percent), 1) : $CFG['stage5_cal'];     //鈣腎臟病限定值5
    $hd_cal     = ($percent != '' && $CFG['hd_cal'] != '')? round( ($CFG['hd_cal'] / $percent), 1) : $CFG['hd_cal'];                 //鈣腎臟病限定值HD
    $capd_cal   = ($percent != '' && $CFG['capd_cal'] != '')? round( ($CFG['capd_cal'] / $percent), 1) : $CFG['capd_cal'];           //鈣腎臟病限定值CAPD

    if ( $USER['kidney'] == '有' )         //先判斷是否有腎臟病
    {
        if ( $USER['kidney_cure'] == 'HD' )//在判斷是否有洗腎
        {
            if ( $maxV == '' || $hd_cal > $maxV )
            {
                $msg = $hd_cal;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $hd_cal . "</font>\n";
            }
        }
        elseif ( $USER['kidney_cure'] == 'CAPD' )
        {
            if ( $maxV == '' || $capd_cal > $maxV )
            {
                $msg = $capd_cal;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $capd_cal . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 90 )
        {
            if ( $maxV == '' || $stage1_cal > $maxV )
            {
                $msg = $stage1_cal;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage1_cal . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 60 && $USER['gfr'] < 90 )
        {
            if ( $maxV == '' || $stage2_cal > $maxV )
            {
                $msg = $stage2_cal;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage2_cal . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 30 && $USER['gfr'] < 60 )
        {
            if ( $maxV == '' || $stage3_cal >  $maxV )
            {
                $msg = $stage3_cal;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage3_cal . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 15 && $USER['gfr'] < 30 )
        {
            if ( $maxV == '' || $stage4_cal > $maxV )
            {
                $msg = $stage4_cal;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage4_cal . "</font>\n";
            }
        }
        elseif ($USER['gfr'] < 15 )
        {
            if ( $maxV == '' || $stage5_cal > $maxV )
            {
                $msg = $stage5_cal;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage5_cal . "</font>\n";
            }
        }
    }
    else
    {
        if ( $USER['bmi'] < 18.5 )
        {
            if ( $maxV == '' || $bmi_s_cal > $maxV )
            {
                $msg = $bmi_s_cal;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_s_cal . "</font>\n";
            }
        }
        elseif ( $USER['bmi'] > 24 )
        {
            if ( $maxV == '' || $bmi_b_cal > $maxV )
            {
                $msg = $bmi_b_cal;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_b_cal . "</font>\n";
            }
        }
        else
        {
            if ( $maxV == '' || $bmi_c_cal > $maxV )
            {
                $msg = $bmi_c_cal;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_c_cal . "</font>\n";
            }
        }
    }
	if($msg=='')
	{
		$msg = "N/A";
	}
    return $msg;
}
//<!---==========================================================================================================================--->
//每日磷
function check_pho2($maxV = '')
{
    global $USER, $CFG;

    $bmi_s_pho2  = $CFG['bmi_s_pho'];     //磷BMI偏低限定值
    $bmi_c_pho2  = $CFG['bmi_c_pho'];     //磷BMI正常限定值
    $bmi_b_pho2  = $CFG['bmi_b_pho'];     //磷BMI過重限定值
    $stage1_pho2 = $CFG['stage1_pho'];  //磷腎臟病限定值1
    $stage2_pho2 = $CFG['stage2_pho'];  //磷腎臟病限定值2
    $stage3_pho2 = $CFG['stage3_pho'];  //磷腎臟病限定值3
    $stage4_pho2 = $CFG['stage4_pho'];  //磷腎臟病限定值4
    $stage5_pho2 = $CFG['stage5_pho'];  //磷腎臟病限定值5
    $hd_pho2     = $CFG['hd_pho'];              //磷腎臟病限定值HD
    $capd_pho2   = $CFG['capd_pho'];        //磷腎臟病限定值CAPD

    if ( $USER['kidney'] == '有' )         //先判斷是否有腎臟病
    {
        if ( $USER['kidney_cure'] == 'HD' )//在判斷是否有洗腎
        {
                $msg = $hd_pho2;
        }
		elseif ( $USER['kidney_cure'] == 'CAPD' )
        {
                $msg = $capd_pho2;
        }
		elseif ( $USER['gfr'] >= 90 )
        {
                $msg = $stage1_pho2;
        }
		elseif ( $USER['gfr'] >= 60 && $USER['gfr'] < 90 )
        {
                $msg = $stage2_pho2;
        }
		elseif ( $USER['gfr'] >= 30 && $USER['gfr'] < 60 )
        {			
                $msg = $stage3_pho2;
        }
		elseif ( $USER['gfr'] >= 15 && $USER['gfr'] < 30 )
        {
                $msg = $stage4_pho2;
        }
		elseif ($USER['gfr'] < 15 )
        {
                $msg = $stage5_pho2;
        }		
    }
	else
	{
		if ( $USER['bmi'] < 18.5 )
		{
				$msg = $bmi_s_pho2;
		}
		elseif ( $USER['bmi'] > 24 )
		{
				$msg = $bmi_b_pho2;
		}
		else
		{
			   $msg = $bmi_c_pho2;
		}
	}
	if($msg=='')
	{
		$msg = "N/A";
	}
    return $msg;
}
//-----------------------------------------------------------------------------------------------------------------------------------
//檢查磷是否過量$maxV = 最大值, $percent = 本餐所需
function check_pho($maxV = '', $percent = '')
{
    global $USER, $CFG;

    $bmi_s_pho  = ($percent != '' && $CFG['bmi_s_pho'] != '')? round( ($CFG['bmi_s_pho'] / $percent), 1) : $CFG['bmi_s_pho'];     //磷BMI偏低限定值
    $bmi_c_pho  = ($percent != '' && $CFG['bmi_c_pho'] != '')? round( ($CFG['bmi_c_pho'] / $percent), 1) : $CFG['bmi_c_pho'];     //磷BMI正常限定值
    $bmi_b_pho  = ($percent != '' && $CFG['bmi_b_pho'] != '')? round( ($CFG['bmi_b_pho'] / $percent), 1) : $CFG['bmi_b_pho'];     //磷BMI過重限定值
    $stage1_pho = ($percent != '' && $CFG['stage1_pho'] != '')? round( ($CFG['stage1_pho'] / $percent), 1) : $CFG['stage1_pho'];  //磷腎臟病限定值1
    $stage2_pho = ($percent != '' && $CFG['stage2_pho'] != '')? round( ($CFG['stage2_pho'] / $percent), 1) : $CFG['stage2_pho'];  //磷腎臟病限定值2
    $stage3_pho = ($percent != '' && $CFG['stage3_pho'] != '')? round( ($CFG['stage3_pho'] / $percent), 1) : $CFG['stage3_pho'];  //磷腎臟病限定值3
    $stage4_pho = ($percent != '' && $CFG['stage4_pho'] != '')? round( ($CFG['stage4_pho'] / $percent), 1) : $CFG['stage4_pho'];  //磷腎臟病限定值4
    $stage5_pho = ($percent != '' && $CFG['stage5_pho'] != '')? round( ($CFG['stage5_pho'] / $percent), 1) : $CFG['stage5_pho'];  //磷腎臟病限定值5
    $hd_pho     = ($percent != '' && $CFG['hd_pho'] != '')? round( ($CFG['hd_pho'] / $percent), 1) : $CFG['hd_pho'];              //磷腎臟病限定值HD
    $capd_pho   = ($percent != '' && $CFG['capd_pho'] != '')? round( ($CFG['capd_pho'] / $percent), 1) : $CFG['capd_pho'];        //磷腎臟病限定值CAPD

    if ( $USER['kidney'] == '有' )         //先判斷是否有腎臟病
    {
        if ( $USER['kidney_cure'] == 'HD' )//在判斷是否有洗腎
        {
            if ( $maxV == '' || $hd_pho > $maxV )
            {
                $msg = $hd_pho;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $hd_pho . "</font>\n";
            }
        }
        elseif ( $USER['kidney_cure'] == 'CAPD' )
        {
            if ( $maxV == '' || $capd_pho > $maxV )
            {
                $msg = $capd_pho;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $capd_pho . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 90 )
        {
            if ( $maxV == '' || $stage1_pho > $maxV )
            {
                $msg = $stage1_pho;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage1_pho . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 60 && $USER['gfr'] < 90 )
        {
            if ( $maxV == '' || $stage2_pho > $maxV )
            {
                $msg = $stage2_pho;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage2_pho . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 30 && $USER['gfr'] < 60 )
        {
            if ( $maxV == '' || $stage3_pho > $maxV )
            {
                $msg = $stage3_pho;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage3_pho . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 15 && $USER['gfr'] < 30 )
        {
            if ( $maxV == '' || $stage4_pho > $maxV )
            {
                $msg = $stage4_pho;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage4_pho . "</font>\n";
            }
        }
        elseif ($USER['gfr'] < 15 )
        {
            if ( $maxV == '' || $stage5_pho > $maxV )
            {
                $msg = $stage5_pho;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage5_pho . "</font>\n";
            }
        }
    }
    else
    {
        if ( $USER['bmi'] < 18.5 )
        {
            if ( $maxV == '' || $bmi_s_pho > $maxV )
            {
                $msg = $bmi_s_pho;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_s_pho . "</font>\n";
            }
        }
        elseif ( $USER['bmi'] > 24 )
        {
            if ( $maxV == '' || $bmi_b_pho > $maxV )
            {
                $msg = $bmi_b_pho;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_b_pho . "</font>\n";
            }
        }
        else
        {
            if ( $maxV == '' || $bmi_c_pho > $maxV)
            {
                $msg = $bmi_c_pho;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_c_pho . "</font>\n";
            }
        }
    }
	if($msg=='')
	{
		$msg = "N/A";
	}
    return $msg;
}
//<!---==========================================================================================================================--->
//每日鎂
function check_mg2($maxV = '')
{
    global $USER, $CFG;

    $bmi_s_mg2  = $CFG['bmi_s_mg'];        //鎂BMI偏低限定值
    $bmi_c_mg2  = $CFG['bmi_c_mg'];        //鎂BMI正常限定值
    $bmi_b_mg2  = $CFG['bmi_b_mg'];        //鎂BMI過重限定值
    $stage1_mg2 = $CFG['stage1_mg'];     //鎂腎臟病限定值1
    $stage2_mg2 = $CFG['stage2_mg'];     //鎂腎臟病限定值2
    $stage3_mg2 = $CFG['stage3_mg'];     //鎂腎臟病限定值3
    $stage4_mg2 = $CFG['stage4_mg'];     //鎂腎臟病限定值4
    $stage5_mg2 = $CFG['stage5_mg'];     //鎂腎臟病限定值5
    $hd_mg2     = $CFG['hd_mg'];                 //鎂腎臟病限定值HD
    $capd_mg2   = $CFG['capd_mg'];           //鎂腎臟病限定值CAPD

    if ( $USER['kidney'] == '有' )         //先判斷是否有腎臟病
    {
        if ( $USER['kidney_cure'] == 'HD' )//在判斷是否有洗腎
        {
                $msg = $hd_mg2;        
        }
		elseif ( $USER['kidney_cure'] == 'CAPD' )
        {
			    $msg = $capd_mg2;
        }
		elseif ( $USER['gfr'] >= 90 )
        {
			    $msg = $stage1_mg2;
        }
		elseif ( $USER['gfr'] >= 60 && $USER['gfr'] < 90 )
        {
			    $msg = $stage2_mg2;
        }
		elseif ( $USER['gfr'] >= 30 && $USER['gfr'] < 60 )
        {
			    $msg = $stage3_mg2;
        }
		elseif ( $USER['gfr'] >= 15 && $USER['gfr'] < 30 )
        {
			    $msg = $stage4_mg2;
        }
		elseif ($USER['gfr'] < 15 )
        {
			    $msg = $stage5_mg;
        }
    }
	else
	{
		if ( $USER['bmi'] < 18.5 )
		{
				$msg = $bmi_s_mg2;
		}
		elseif ( $USER['bmi'] > 24 )
		{
				$msg = $bmi_b_mg2;
		}
		else
		{
				$msg = $bmi_c_mg2;
		}
	}
	if($msg=='')
	{
		$msg = "N/A";
	}
    return $msg;
}
//-----------------------------------------------------------------------------------------------------------------------------------
//檢查鎂是否過量$maxV = 最大值, $percent = 本餐所需
function check_mg($maxV = '', $percent = '')
{
    global $USER, $CFG;

    $bmi_s_mg  = ($percent != '' && $CFG['bmi_s_mg'] != '')? round( ($CFG['bmi_s_mg'] / $percent), 1) : $CFG['bmi_s_mg'];        //鎂BMI偏低限定值
    $bmi_c_mg  = ($percent != '' && $CFG['bmi_c_mg'] != '')? round( ($CFG['bmi_c_mg'] / $percent), 1) : $CFG['bmi_c_mg'];        //鎂BMI正常限定值
    $bmi_b_mg  = ($percent != '' && $CFG['bmi_b_mg'] != '')? round( ($CFG['bmi_b_mg'] / $percent), 1) : $CFG['bmi_b_mg'];        //鎂BMI過重限定值
    $stage1_mg = ($percent != '' && $CFG['stage1_mg'] != '')? round( ($CFG['stage1_mg'] / $percent), 1) : $CFG['stage1_mg'];     //鎂腎臟病限定值1
    $stage2_mg = ($percent != '' && $CFG['stage2_mg'] != '')? round( ($CFG['stage2_mg'] / $percent), 1) : $CFG['stage2_mg'];     //鎂腎臟病限定值2
    $stage3_mg = ($percent != '' && $CFG['stage3_mg'] != '')? round( ($CFG['stage3_mg'] / $percent), 1) : $CFG['stage3_mg'];     //鎂腎臟病限定值3
    $stage4_mg = ($percent != '' && $CFG['stage4_mg'] != '')? round( ($CFG['stage4_mg'] / $percent), 1) : $CFG['stage4_mg'];     //鎂腎臟病限定值4
    $stage5_mg = ($percent != '' && $CFG['stage5_mg'] != '')? round( ($CFG['stage5_mg'] / $percent), 1) : $CFG['stage5_mg'];     //鎂腎臟病限定值5
    $hd_mg     = ($percent != '' && $CFG['hd_mg'] != '')? round( ($CFG['hd_mg'] / $percent), 1) : $CFG['hd_mg'];                 //鎂腎臟病限定值HD
    $capd_mg   = ($percent != '' && $CFG['capd_mg'] != '')? round( ($CFG['capd_mg'] / $percent), 1) : $CFG['capd_mg'];           //鎂腎臟病限定值CAPD

    if ( $USER['kidney'] == '有' )         //先判斷是否有腎臟病
    {
        if ( $USER['kidney_cure'] == 'HD' )//在判斷是否有洗腎
        {
            if ( $maxV == '' || $hd_mg > $maxV )
            {
                $msg = $hd_mg;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $hd_mg . "</font>\n";
            }
        }
        elseif ( $USER['kidney_cure'] == 'CAPD' )
        {
            if ( $maxV == '' || $capd_mg > $maxV )
            {
                $msg = $capd_mg;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $capd_mg . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 90 )
        {
            if ( $maxV == '' || $stage1_mg > $maxV )
            {
                $msg = $stage1_mg;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage1_mg . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 60 && $USER['gfr'] < 90 )
        {
            if ( $maxV == '' || $stage2_mg > $maxV )
            {
                $msg = $stage2_mg;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage2_mg . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 30 && $USER['gfr'] < 60 )
        {
            if ( $maxV == '' || $stage3_mg > $maxV )
            {
                $msg = $stage3_mg;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage3_mg . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 15 && $USER['gfr'] < 30 )
        {
            if ( $maxV == '' || $stage4_mg > $maxV )
            {
                $msg = $stage4_mg;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage4_mg . "</font>\n";
            }
        }
        elseif ($USER['gfr'] < 15 )
        {
            if ( $maxV == '' || $stage5_mg > $maxV )
            {
                $msg = $stage5_mg;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage5_mg . "</font>\n";
            }
        }
    }
    else
    {
        if ( $USER['bmi'] < 18.5 )
        {
            if ( $maxV == '' || $bmi_s_mg > $maxV )
            {
                $msg = $bmi_s_mg;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_s_mg . "</font>\n";
            }
        }
        elseif ( $USER['bmi'] > 24 )
        {
            if ( $maxV == '' || $bmi_b_mg > $maxV )
            {
                $msg = $bmi_b_mg;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_b_mg . "</font>\n";
            }
        }
        else
        {
            if ( $maxV == '' || $bmi_c_mg > $maxV )
            {
                $msg = $bmi_c_mg;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_c_mg . "</font>\n";
            }
        }
    }
	if($msg=='')
	{
		$msg = "N/A";
	}
    return $msg;
}
//<!---==========================================================================================================================--->
//每日鐵
function check_iron2($maxV = '')
{
    global $USER, $CFG;

    $bmi_s_iron2  = $CFG['bmi_s_iron'];        //鐵BMI偏低限定值
    $bmi_c_iron2  = $CFG['bmi_c_iron'];        //鐵BMI正常限定值
    $bmi_b_iron2  = $CFG['bmi_b_iron'];        //鐵BMI過重限定值
    $stage1_iron2 = $CFG['stage1_iron'];     //鐵腎臟病限定值1
    $stage2_iron2 = $CFG['stage2_iron'];     //鐵腎臟病限定值2
    $stage3_iron2 = $CFG['stage3_iron'];     //鐵腎臟病限定值3
    $stage4_iron2 = $CFG['stage4_iron'];     //鐵腎臟病限定值4
    $stage5_iron2 = $CFG['stage5_iron'];     //鐵腎臟病限定值5
    $hd_iron2     = $CFG['hd_iron'];                 //鐵腎臟病限定值HD
    $capd_iron2   = $CFG['capd_iron'];           //鐵腎臟病限定值CAPD

    if ( $USER['kidney'] == '有' )         //先判斷是否有腎臟病
    {
        if ( $USER['kidney_cure'] == 'HD' )//在判斷是否有洗腎
        {
                $msg = $hd_iron2;
        }
		elseif ( $USER['kidney_cure'] == 'CAPD' )
        {
                $msg = $capd_iron2;
        }
		elseif ( $USER['gfr'] >= 90 )
        {
                $msg = $stage1_iron2;
        }
		elseif ( $USER['gfr'] >= 60 && $USER['gfr'] < 90 )
        {
                $msg = $stage2_iron2;
        }
		elseif ( $USER['gfr'] >= 30 && $USER['gfr'] < 60 )
        {
                $msg = $stage3_iron2;
        }
		elseif ( $USER['gfr'] >= 15 && $USER['gfr'] < 30 )
        {
                $msg = $stage4_iron;
        }
		elseif ($USER['gfr'] < 15 )
        {
                $msg = $stage5_iron2;
        }        
    }
	else
	{
       	if ( $USER['bmi'] < 18.5 )
       	{
               $msg = $bmi_s_iron2;
        }
		elseif ( $USER['bmi'] > 24 )
       	{
               $msg = $bmi_b_iron2;
       	}
		else
		{
               $msg = $bmi_c_iron2;
       	}
   	}
	if($msg=='')
	{
		$msg = "N/A";
	}
    return $msg;
}
//-----------------------------------------------------------------------------------------------------------------------------------
//檢查鐵是否過量$maxV = 最大值, $percent = 本餐所需
function check_iron($maxV = '', $percent = '')
{
    global $USER, $CFG;

    $bmi_s_iron  = ($percent != '' && $CFG['bmi_s_iron'] != '')? round( ($CFG['bmi_s_iron'] / $percent), 1) : $CFG['bmi_s_iron'];        //鐵BMI偏低限定值
    $bmi_c_iron  = ($percent != '' && $CFG['bmi_c_iron'] != '')? round( ($CFG['bmi_c_iron'] / $percent), 1) : $CFG['bmi_c_iron'];        //鐵BMI正常限定值
    $bmi_b_iron  = ($percent != '' && $CFG['bmi_b_iron'] != '')? round( ($CFG['bmi_b_iron'] / $percent), 1) : $CFG['bmi_b_iron'];        //鐵BMI過重限定值
    $stage1_iron = ($percent != '' && $CFG['stage1_iron'] != '')? round( ($CFG['stage1_iron'] / $percent), 1) : $CFG['stage1_iron'];     //鐵腎臟病限定值1
    $stage2_iron = ($percent != '' && $CFG['stage2_iron'] != '')? round( ($CFG['stage2_iron'] / $percent), 1) : $CFG['stage2_iron'];     //鐵腎臟病限定值2
    $stage3_iron = ($percent != '' && $CFG['stage3_iron'] != '')? round( ($CFG['stage3_iron'] / $percent), 1) : $CFG['stage3_iron'];     //鐵腎臟病限定值3
    $stage4_iron = ($percent != '' && $CFG['stage4_iron'] != '')? round( ($CFG['stage4_iron'] / $percent), 1) : $CFG['stage4_iron'];     //鐵腎臟病限定值4
    $stage5_iron = ($percent != '' && $CFG['stage5_iron'] != '')? round( ($CFG['stage5_iron'] / $percent), 1) : $CFG['stage5_iron'];     //鐵腎臟病限定值5
    $hd_iron     = ($percent != '' && $CFG['hd_iron'] != '')? round( ($CFG['hd_iron'] / $percent), 1) : $CFG['hd_iron'];                 //鐵腎臟病限定值HD
    $capd_iron   = ($percent != '' && $CFG['capd_iron'] != '')? round( ($CFG['capd_iron'] / $percent), 1) : $CFG['capd_iron'];           //鐵腎臟病限定值CAPD

    if ( $USER['kidney'] == '有' )         //先判斷是否有腎臟病
    {
        if ( $USER['kidney_cure'] == 'HD' )//在判斷是否有洗腎
        {
            if ( $maxV == '' || $hd_iron > $maxV )
            {
                $msg = $hd_iron;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $hd_iron . "</font>\n";
            }
        }
        elseif ( $USER['kidney_cure'] == 'CAPD' )
        {
            if ( $maxV == '' || $capd_iron > $maxV )
            {
                $msg = $capd_iron;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $capd_iron . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 90 )
        {
            if ( $maxV == '' || $stage1_iron > $maxV )
            {
                $msg = $stage1_iron;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage1_iron . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 60 && $USER['gfr'] < 90 )
        {
            if ( $maxV == '' || $stage2_iron > $maxV )
            {
                $msg = $stage2_iron;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage2_iron . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 30 && $USER['gfr'] < 60 )
        {
            if ( $maxV == '' || $stage3_iron > $maxV )
            {
                $msg = $stage3_iron;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage3_iron . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 15 && $USER['gfr'] < 30 )
        {
            if ( $maxV == '' || $stage4_iron > $maxV )
            {
                $msg = $stage4_iron;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage4_iron . "</font>\n";
            }
        }
        elseif ($USER['gfr'] < 15 )
        {
            if ( $maxV == '' || $stage5_iron > $maxV )
            {
                $msg = $stage5_iron;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage5_iron . "</font>\n";
            }
        }
    }
    else
    {
        if ( $USER['bmi'] < 18.5 )
        {
            if ( $maxV == '' || $bmi_s_iron > $maxV )
            {
                $msg = $bmi_s_iron;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_s_iron . "</font>\n";
            }
        }
        elseif ( $USER['bmi'] > 24 )
        {
            if ( $maxV == '' || $bmi_b_iron > $maxV )
            {
                $msg = $bmi_b_iron;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_b_iron . "</font>\n";
            }
        }
        else
        {
            if ( $maxV == '' || $bmi_c_iron > $maxV )
            {
                $msg = $bmi_c_iron;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_c_iron . "</font>\n";
            }
        }
    }
	if($msg=='')
	{
		$msg = "N/A";
	}
    return $msg;
}
//<!---==========================================================================================================================--->
//每日鋅
function check_zinc2($maxV = '')
{
    global $USER, $CFG;

    $bmi_s_zinc2  = $CFG['bmi_s_zinc'];        //鋅BMI偏低限定值
    $bmi_c_zinc2  = $CFG['bmi_c_zinc'];        //鋅BMI正常限定值
    $bmi_b_zinc2  = $CFG['bmi_b_zinc'];        //鋅BMI過重限定值
    $stage1_zinc2 = $CFG['stage1_zinc'];     //鋅腎臟病限定值1
    $stage2_zinc2 = $CFG['stage2_zinc'];     //鋅腎臟病限定值2
    $stage3_zinc2 = $CFG['stage3_zinc'];     //鋅腎臟病限定值3
    $stage4_zinc2 = $CFG['stage4_zinc'];     //鋅腎臟病限定值4
    $stage5_zinc2 = $CFG['stage5_zinc'];     //鋅腎臟病限定值5
    $hd_zinc2     = $CFG['hd_zinc'];                 //鋅腎臟病限定值HD
    $capd_zinc2   = $CFG['capd_zinc'];           //鋅腎臟病限定值CAPD

    if ( $USER['kidney'] == '有' )         //先判斷是否有腎臟病
    {
        if ( $USER['kidney_cure'] == 'HD' )//在判斷是否有洗腎
        {
            if ( $maxV == '' || $hd_zinc2 > $maxV )
            {
                $msg = $hd_zinc2;            
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $hd_zinc2 . "</font>\n";
            }
        }
        elseif ( $USER['kidney_cure'] == 'CAPD' )
        {
            if ( $maxV == '' || $capd_zinc2 > $maxV )
            {
                $msg = $capd_zinc2;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $capd_zinc2 . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 90 )
        {
            if ( $maxV == '' || $stage1_zinc2 > $maxV )
            {
                $msg = $stage1_zinc2;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage1_zinc2 . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 60 && $USER['gfr'] < 90 )
        {
            if ( $maxV == '' || $stage2_zinc2 > $maxV )
            {
                $msg = $stage2_zinc2;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage2_zinc2 . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 30 && $USER['gfr'] < 60 )
        {
            if ( $maxV == '' || $stage3_zinc2 > $maxV )
            {
                $msg = $stage3_zinc2;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage3_zinc2 . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 15 && $USER['gfr'] < 30 )
        {
            if ( $maxV == '' || $stage4_zinc2 > $maxV )
            {
                $msg = $stage4_zinc;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage4_zinc2 . "</font>\n";
            }
        }
        elseif ($USER['gfr'] < 15 )
        {
            if ( $maxV == '' || $stage5_zinc2 > $maxV )
            {
                $msg = $stage5_zinc2;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage5_zinc2 . "</font>\n";
            }
        }
    }
    else
    {
        if ( $USER['bmi'] < 18.5 )
        {
            if ( $maxV == '' || $bmi_s_zinc2 > $maxV )
            {
                $msg = $bmi_s_zinc2;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_s_zinc2 . "</font>\n";
            }
        }
        elseif ( $USER['bmi'] > 24 )
        {
            if ( $maxV == '' || $bmi_b_zinc2 > $maxV )
            {
                $msg = $bmi_b_zinc2;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_b_zinc2 . "</font>\n";
            }
        }
        else
        {
            if ( $maxV == '' || $bmi_c_zinc2 > $maxV )
            {
                $msg = $bmi_c_zinc2;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_c_zinc2 . "</font>\n";
            }
        }
    }
	if($msg=='')
	{
		$msg = "N/A";
	}
    return $msg;
}
//-----------------------------------------------------------------------------------------------------------------------------------
//檢查鋅是否過量$maxV = 最大值, $percent = 本餐所需
function check_zinc($maxV = '', $percent = '')
{
    global $USER, $CFG;

    $bmi_s_zinc  = ($percent != '' && $CFG['bmi_s_zinc'] != '')? round( ($CFG['bmi_s_zinc'] / $percent), 1) : $CFG['bmi_s_zinc'];        //鋅BMI偏低限定值
    $bmi_c_zinc  = ($percent != '' && $CFG['bmi_c_zinc'] != '')? round( ($CFG['bmi_c_zinc'] / $percent), 1) : $CFG['bmi_c_zinc'];        //鋅BMI正常限定值
    $bmi_b_zinc  = ($percent != '' && $CFG['bmi_b_zinc'] != '')? round( ($CFG['bmi_b_zinc'] / $percent), 1) : $CFG['bmi_b_zinc'];        //鋅BMI過重限定值
    $stage1_zinc = ($percent != '' && $CFG['stage1_zinc'] != '')? round( ($CFG['stage1_zinc'] / $percent), 1) : $CFG['stage1_zinc'];     //鋅腎臟病限定值1
    $stage2_zinc = ($percent != '' && $CFG['stage2_zinc'] != '')? round( ($CFG['stage2_zinc'] / $percent), 1) : $CFG['stage2_zinc'];     //鋅腎臟病限定值2
    $stage3_zinc = ($percent != '' && $CFG['stage3_zinc'] != '')? round( ($CFG['stage3_zinc'] / $percent), 1) : $CFG['stage3_zinc'];     //鋅腎臟病限定值3
    $stage4_zinc = ($percent != '' && $CFG['stage4_zinc'] != '')? round( ($CFG['stage4_zinc'] / $percent), 1) : $CFG['stage4_zinc'];     //鋅腎臟病限定值4
    $stage5_zinc = ($percent != '' && $CFG['stage5_zinc'] != '')? round( ($CFG['stage5_zinc'] / $percent), 1) : $CFG['stage5_zinc'];     //鋅腎臟病限定值5
    $hd_zinc     = ($percent != '' && $CFG['hd_zinc'] != '')? round( ($CFG['hd_zinc'] / $percent), 1) : $CFG['hd_zinc'];                 //鋅腎臟病限定值HD
    $capd_zinc   = ($percent != '' && $CFG['capd_zinc'] != '')? round( ($CFG['capd_zinc'] / $percent), 1) : $CFG['capd_zinc'];           //鋅腎臟病限定值CAPD

    if ( $USER['kidney'] == '有' )         //先判斷是否有腎臟病
    {
        if ( $USER['kidney_cure'] == 'HD' )//在判斷是否有洗腎
        {
            if ( $maxV == '' || $hd_zinc > $maxV )
            {
                $msg = $hd_zinc;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $hd_zinc . "</font>\n";
            }
        }
        elseif ( $USER['kidney_cure'] == 'CAPD' )
        {
            if ( $maxV == '' || $capd_zinc > $maxV )
            {
                $msg = $capd_zinc;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $capd_zinc . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 90 )
        {
            if ( $maxV == '' || $stage1_zinc > $maxV )
            {
                $msg = $stage1_zinc;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage1_zinc . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 60 && $USER['gfr'] < 90 )
        {
            if ( $maxV == '' || $stage2_zinc > $maxV )
            {
                $msg = $stage2_zinc;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage2_zinc . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 30 && $USER['gfr'] < 60 )
        {
            if ( $maxV == '' || $stage3_zinc > $maxV )
            {
                $msg = $stage3_zinc;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage3_zinc . "</font>\n";
            }
        }
        elseif ( $USER['gfr'] >= 15 && $USER['gfr'] < 30 )
        {
            if ( $maxV == '' || $stage4_zinc > $maxV )
            {
                $msg = $stage4_zinc;
            }
            else            
           	{
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage4_zinc . "</font>\n";
            }
        }
        elseif ($USER['gfr'] < 15 )
        {
            if ( $maxV == '' || $stage5_zinc > $maxV )
            {
                $msg = $stage5_zinc;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $stage5_zinc . "</font>\n";
            }
        }
    }
    else
    {
        if ( $USER['bmi'] < 18.5 )
        {
            if ( $maxV == '' || $bmi_s_zinc > $maxV )
            {
                $msg = $bmi_s_zinc;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_s_zinc . "</font>\n";
            }
        }
        elseif ( $USER['bmi'] > 24 )
        {
            if ( $maxV == '' || $bmi_b_zinc > $maxV )
            {
                $msg = $bmi_b_zinc;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_b_zinc . "</font>\n";
            }
        }
        else
        {
            if ( $maxV == '' || $bmi_c_zinc > $maxV )
            {
                $msg = $bmi_c_zinc;
            }
            else
            {
                $msg = "<font style = 'color:#FF0000;font-weight:700'>" . $bmi_c_zinc . "</font>\n";
            }
        }
    }
	if($msg=='')
	{
		$msg = "N/A";
	}
    return $msg;
}
//<!---==========================================================================================================================--->

//<!---==========================================================================================================================--->


//判斷卡洛里並秀出燈號$value = 卡洛里, $max = 最大值, $mid_max = 中間值大, $mid_min = 中間值小, $min = 最小值, $percent = 份數, $kg = 食材重量, $c_kg = 計算重量
function check_type_1($value = '', $max = 0, $mid_max = 0, $mid_min = 0, $min = 0, $percent = 1, $kg = 100, $c_kg = 100)
{
    if (trim($value) == '' || $value == 0){ return ''; }
    $cV      = @round( ($c_kg / $kg), 3);
    $max     = @round($max / $percent);
    $mid_max = @round($mid_max / $percent);
    $mid_min = @round($mid_min / $percent);
    $min     = @round($min / $percent);

    if (@round(($value * $cV)) >= $max){ $msg = "<font class = 'light_1'>●</font>\n"; }
    if (@round(($value * $cV)) < $mid_max && @round(($value * $cV)) > $mid_min){ $msg = "<font class = 'light_2'>●</font>\n"; }
    if (@round(($value * $cV)) <= $min){ $msg = "<font class = 'light_3'>●</font>\n"; }
    return $msg;
}

function check_type_2($value = '', $max = 0, $min = 0, $percent)  //紅綠燈餐盤用
{	
	$value = strip_tags($value);
	$max = strip_tags($max)*1.05;
	$min = strip_tags($min)*0.95;
	
    if (trim($value) == '' || $value == 0 || $max ==''||$min=='')
	{
		 return '';
	}
	else
	{
		if($value > $max){ $msg = "<font class = 'light_1'>●</font>\n"; }
		if($valie >= $min && $value <=$max){ $msg = "<font class = 'light_2'>●</font>\n"; }
		if($value < $min){ $msg = "<font class = 'light_3'>●</font>\n"; }
	}
    return $msg;		
}

//www.buezz.com.tw GDcopyR v0.51
//http://www.bluezz.com.tw/mybook/content.php?id=593
//$copyRSrc:版權圖位置(請使用png格式透明圖)
//$picSrc:來源圖片檔案位置
//$picDes:目標圖片檔案位置
//$Width:圖片寬
//$Height:圖片高
//$quality:圖片品質1~100
//$logo_size 版權圖片在目標圖片的比例
function GDcopyR($copyRSrc, $picSrc, $picDes, $Width, $Height, $quality, $logo_size = 0.2){

    //檢查檔案是否存在
    if ( file_exists($picSrc) ) {
        $srcInfo  = pathInfo($picSrc);
        $srcSize = getImageSize($picSrc);

        $destSize[0] =  $Width;
        $destSize[1] =  $Height;

        //根據副檔名讀取圖檔
        switch (strtolower($srcInfo['extension'])) {
            case "gif": $imgSrc = imageCreateFromGif($picSrc); break;
            case "jpg": $imgSrc = imageCreateFromJpeg($picSrc); break;
            case "png": $imgSrc = imageCreateFromPng($picSrc); break;
            default:$imgSrc = imageCreateFromJpeg($picSrc); break;
        }

        $imgDes = imageCreateTrueColor($destSize[0],$destSize[1]); //GD2.0以上適用
        //建立縮圖
        ImageCopyResized($imgDes, $imgSrc, 0, 0, 0, 0, $destSize[0], $destSize[1], $srcSize[0], $srcSize[1]);
        imagedestroy($imgSrc);

        //檢查檔案是否存在
        if ( file_exists($copyRSrc) ) {
            //讀取版權圖
            $RSize = getImageSize($copyRSrc);
            $RInfo = pathInfo($copyRSrc);
            //根據副檔名讀取圖檔
            switch (strtolower($RInfo['extension'])) {
                case "gif": $RSrc = imageCreateFromGif($copyRSrc); break;
                case "jpg": $RSrc = imageCreateFromJpeg($copyRSrc); break;
                case "png": $RSrc = imageCreateFromPng($copyRSrc); break;
                default:$RSrc = imageCreateFromPng($picSrc); break;
            }
            //版權圖過大時進行縮放
            $W = ($RSize[0] > $srcSize[0])? $srcSize[0]:$RSize[0];

            //判斷版權圖片位置
            if ( $destSize[0] >= $destSize[1])     //判斷來源圖片的長寬比例
            {
                $in_logo_h = round($destSize[1] * $logo_size);                       //版權高度
                $in_logo_w = round($RSize[0] * round(($in_logo_h/$RSize[1]), 2));    //版權寬度

                $in_img_X = $destSize[0] - $in_logo_w;                               //圖片版權Y位置
                $in_img_Y = $destSize[1] - round($destSize[1] * $logo_size);         //圖片版權Y位置

            }else{
                $in_logo_w = round($destSize[0] * $logo_size);                       //版權寬度
                $in_logo_h = round($RSize[1] * round(($in_logo_w/$RSize[0]), 2));    //版權高度

                $in_img_X = $destSize[0] - round($destSize[0] * $logo_size);         //圖片版權X位置
                $in_img_Y = $destSize[1] - $in_logo_h;                               //圖片版權Y位置
            }

            //寫入版權圖
            ImageCopyResized($imgDes, $RSrc, $in_img_X, $in_img_Y , 0, 0 ,$in_logo_w, $in_logo_h,$RSize[0], $RSize[1]);

            imagedestroy($RSrc);
        }
        //寫入檔案
        @imageJpeg($imgDes, $picDes,$quality);
        imagedestroy($imgDes);
        return true;
    }
    return false;
}

//將各項數值轉換為100g
function get_one_g($k = 0, $come = 0, $to = 100)
{
    if ( $k == 0 )
    {
        return '-';
    }
	else if ($come == 0 || $come == 100 || $k == 0)
    {
        return $k;
    }
	else
	{
        return round(round($to / $come, 2) * $k, 1);
    }
}

function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")    
 {   
   $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;   
   
   switch ($theType) {   
     case "text":   
       $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";   
       break;       
     case "long":   
     case "int":   
       $theValue = ($theValue != "") ? intval($theValue) : "NULL";   
       break;   
     case "double":   
       $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";   
       break;   
     case "date":   
       $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";   
       break;   
     case "defined":   
       $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;   
       break;   
   }   
   return $theValue;   
 }
?>