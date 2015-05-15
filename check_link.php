<?PHP
include "config.php";

if ( trim($USER['id']) != '' )
{
	$link_kind = array('1' => "妙招1_情緒轉換法.doc", "妙招2_同儕影響法.doc");
	$sql  = "INSERT INTO link_log (userid, kind, add_time)VALUES(";
	$sql .= "'" . $USER['id'] . "' , ";
	$sql .= "'" . $_GET['kind'] . "' , ";
	$sql .= "'" . time() . "')";
	if ( mysql_query($sql) )
	{
		reDirect(ROOT_URL . '/upload/' . urlencode($link_kind[$_GET['kind']]));
	}else{
		showMsg('檔案發生問題，請洽系統管理員!!');
		reDirect(ROOT_URL);
	}
}else{
	showMsg('請先登入會員!!');
	reDirect(ROOT_URL . '/userlogin.php');
}
?>