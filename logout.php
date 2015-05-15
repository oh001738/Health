<?PHP
include "config.php";

$logout_time = time();

if ( $USER )
{
	$sql2 = mysql_query("INSERT INTO action_log(username, actid, actime)VALUES('" . $USER{'username'} . "', '" . 2 . "', '" . $logout_time . "')");
	
	//刪除USER變數
	unset($USER);	

	//刪除SESSION資料，並刪除大於COOKIE_TIME的資料
	if ( delete_value('sessions', "WHERE session_id = '" . session_id() . "' OR login_time <= '" . (time() - COOKIE_TIME) . "'" ) )
	{  
		delete_value('guest_food', "WHERE session_id = '" . session_id() . "' OR add_time <= '" . (time() - COOKIE_TIME) . "'" );
		delete_value('guest_health', "WHERE session_id = '" . session_id() . "' OR add_time <= '" . (time() - COOKIE_TIME) . "'" );
		
		reDirect(ROOT_URL);  //轉回首頁
	}
}else{
	reDirect(ROOT_URL);  //轉回首頁
}
?>