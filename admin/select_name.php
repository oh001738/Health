<?PHP
include "../config.php";
include "../header.php"; //載入header檔
#header_print(true);   //載入header檔

if ( !ckadmin() )
{
	showMsg("非管理者無法進入");
	reDirect(ROOT_URL);
	exit;
}
?>

<form action = 'select_name.php' method = 'post' id = 'searchform' name = 'searchform'>
<div style = 'padding-top:5px;padding-bottom:5px'>
<span class = 'title2' style = 'padding-right:5px'><?PHP echo $FOODTYPE[$_GET['foodid']];?></span>
<input type = 'text' id = 'keyword' name = 'keyword' style = 'width:150px'>
<input type = 'hidden' id = 'action' name = 'action' value = '1'>
<input type = 'button' id = 'search' name = 'search' value = '查詢會員' onclick = 'check_form()'>
</div>
<table border = '0' cellpadding = '4' cellspacing = '1' width = '100%' bgcolor = '#CCCCCC'>
<tr bgcolor = '#EDEDDE'>
	<td class = 'text13px' align = 'center'>會員帳號</td>
	<td class = 'text13px' align = 'center'>會員中文姓名</td>
	<td class = 'text13px' align = 'center'>會員英文姓名</td>
	<td class = 'text13px' align = 'center'>選擇</td>
</tr>
<?PHP
if ($_POST['action'])
{
	$user_total = countSQL('user', 'id', "WHERE c_name LIKE '%" . trim($_POST['keyword']) . "%' OR e_name LIKE '%" . trim($_POST['keyword']) . "%' OR username LIKE '%" . trim($_POST['keyword']) . "%'");   //計算搜尋會員總數
}else{
	$user_total = countSQL('user', 'id');   //計算所有會員總數
}
$page = ($_GET['page'])? $_GET['page'] : 0;           //設定目前頁數
$total_page = ceil($user_total / PAGE_NUM);           //計算總共頁數
$start_num = (!$_GET['page'])? '0' : $_GET['page'] * PAGE_NUM; //SQL開始筆數
if ($_POST['action'])
{
	$sql = "SELECT id, c_name, e_name, username FROM user WHERE c_name LIKE '%" . trim($_POST['keyword']) . "%' OR e_name LIKE '%" . trim($_POST['keyword']) . "%' OR username LIKE '%" . trim($_POST['keyword']) . "%' ORDER BY id";
}else{
	$sql = "SELECT id, c_name, e_name, username FROM user ORDER BY id LIMIT " . $start_num . "," . PAGE_NUM;
}
$result = mysql_query($sql);
$i = 0;
while( $row = mysql_fetch_array($result) )
{
	$bgcolor = ($i % 2 == 0)? '#FFFFFF' : '#EEEEEE';
	$health = get_value("user_health", "WHERE userid = '" . $row['id'] . "'");
	$birthday = date("Y-m-d", $health['birthday']);
	echo "<tr bgcolor = '" . $bgcolor . "'>\n";
	echo "	<td class = 'text13px'>" . $row['username'] . "</td>\n";
	echo "	<td class = 'text13px'>" . $row['c_name'] . "</td>\n";
	echo "	<td class = 'text13px'>" . $row['e_name'] . "</td>\n";
	echo "	<td class = 'text13px'><a href = \"javascript:select_user('" . $row['id'] . "','" . $row['c_name'] . "','" . $row['e_name'] . "','" . $row['username'] . "','" . $birthday . "','" . $health['user_sex'] . "','" . $health['user_h'] . "','" . $health['user_w'] . "', '" . $health['good_w'] . " ~ " . $health['good_w2'] . "')\">選擇</a></td>\n";
	echo "</tr>\n";
	$i++;
}

if ( $user_total > PAGE_NUM )   //判斷資料庫中的資料是否大於每頁顯示數量
{
	echo "<tr bgcolor = '#FFFFFF'>\n";
	echo "	<td align = 'center' class = 'text13px' colspan = '7'>\n";
	echo "<a href = '" . ROOT_URL . "/admin/select_name.php'>第一頁</a>";
	if ($page > 0)
	{
		$up = $page - 1;
		echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/select_name.php?page=" . $up . "'>上一頁</a></span>";
	}
	if ($page < ($total_page - 1))
	{
		$next = $page + 1;
		echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/select_name.php?page=" . $next . "'>下一頁</a></span>";
	}
	echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/select_name.php?page=" . ($total_page - 1) . "'>最後一頁</a></span>";
	echo "	</td>\n";
	echo "</tr>\n";
}
?>
</table>
<div style = 'padding-top:5px'><input type = 'button' id = 'closewin' name = 'closewin' value = '關閉視窗' onclick = 'window.close();'></div>

<script language = 'javascript'>
<!--
function check_form()
{
	var obj = document.searchform;
	if ( trim(obj.keyword.value) == '' )
	{
		alert("請輸入要查詢的關鍵字!!");
		obj.keyword.focus();
	}else{
		obj.submit();
	}
}

//uid 會員ID, c_name 會員中文姓名, e_name 會員英文姓名, username 會員帳號
function select_user(uid, c_name, e_name, username, birthday, sex, height, weight, goodweight)
{
	if ( trim(c_name) != '' )
	{
		opener.document.getElementById('user_name').value = c_name;   //會員姓名
	}else if ( trim(e_name) != '' )
	{
		opener.document.getElementById('user_name').value = e_name;   //會員姓名
	}else{	
		opener.document.getElementById('user_name').value = username; //會員帳號
	}
	opener.document.getElementById('userid').value = uid;             //會員ID
	opener.document.getElementById('birthday').value   = birthday;    //會員出生年月日
	opener.document.getElementById('sex').value        = sex;         //會員性別
	opener.document.getElementById('height').value     = height;      //會員身高
	opener.document.getElementById('weight').value     = weight;      //會員體重
	opener.document.getElementById('goodweight').value = goodweight;  //會員理想體重
	window.close();
}
//-->
</script>