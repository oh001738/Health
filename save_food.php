<?PHP
include "config.php";

header_print(true);   //載入header檔

$sql = "INSERT INTO guest_food (food_id, rand, cal, percent, portion, meal, session_id, flag, add_time)VALUES(";
$sql .= "'" . $_GET['food_id'] . "', ";
$sql .= "'" . $_GET['rand'] . "', ";
$sql .= "'" . $_GET['cal'] . "', ";
$sql .= "'" . $_GET['percent'] . "', ";
$sql .= "'1', ";
$sql .= "'" . $_GET['meal'] . "', ";
$sql .= "'" . session_id() . "', ";
$sql .= "'0', ";
$sql .= "'" . time() . "')";

if ( mysql_query($sql) )
{
	showMsg('選取成功!!');
	echo "<script>window.close();</script>\n";
}else{
	showMsg('選取失敗，請洽系統管理員!!');
	echo "<script>window.close();</script>\n";
}
?>
