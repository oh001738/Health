<?PHP

$DB['ID']   = mysql_connect(DB_HOST , DB_USER , DB_PASS)or die("資料庫連線失敗");
$DB['CONN'] = mysql_select_db(DB_NAME , $DB['ID']);
@mysql_query('SET character_set_client = utf8;');
@mysql_query('SET character_set_results = utf8;');
@mysql_query('SET character_set_connection = utf8;');

/*判斷字數是否有超過限制*/
function ckString($str = '', $max = 0)
{		
	$str = wordscut($str, $max, false , '');
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

/*將字串做換行處理*/
function wordnl2br($string)
{
	return nl2br($string);
}

/*解決許功蓋問題*/
function strip($str)
{
	return $str;
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

function countSQL($table, $colname, $where)    //計算資料庫筆數
{
	$sql = "SELECT COUNT(" . $colname . ") FROM " . $table . " " . $where;
	//echo $sql . "<br>";
	$row = mysql_fetch_array( ( mysql_query($sql) ) );
	return $row[0];
}
?>  
