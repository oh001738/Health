<?PHP
include "../config.php";
include "../header.php"; //載入header檔
#header_print(true);   //載入header檔
?>
<form action = 'open_food.php?foodid=<?PHP echo $_GET['foodid'];?>' method = 'post' id = 'searchform' name = 'searchform'>
<div style = 'padding-top:5px;padding-bottom:5px'>
<span class = 'title2' style = 'padding-right:5px'><?PHP echo $FOODTYPE[$_GET['foodid']];?></span>
<input type = 'text' id = 'keyword' name = 'keyword' style = 'width:150px'>
<input type = 'hidden' id = 'action' name = 'action' value = '1'>
<input type = 'button' id = 'search' name = 'search' value = '查詢食物' onclick = 'check_form()'>
</div>
<table border = '0' cellpadding = '4' cellspacing = '1' width = '100%' bgcolor = '#CCCCCC'>
<tr bgcolor = '#EDEDDE'>
	<td class = 'text13px' align = 'center'>食物名稱</td>
	<td class = 'text13px' align = 'center'>重量</td>
	<td class = 'text13px' align = 'center'>熱量</td>
	<td class = 'text13px' align = 'center'>膽固醇</td>
	<td class = 'text13px' align = 'center'>脂肪</td>
	<td class = 'text13px' align = 'center'>蛋白質</td>
	<td class = 'text13px' align = 'center'>選擇</td>
</tr>
<?PHP
if ($_POST['action'])
{
	$food_total = countSQL('choose_food', 'ch_id', "WHERE ch_kind = '" . $_GET['foodid'] . "' AND ch_name LIKE '%" . trim($_POST['keyword']) . "%'");   //計算該類別的食物總數
}else{
	$food_total = countSQL('choose_food', 'ch_id', "WHERE ch_kind = '" . $_GET['foodid'] . "'");   //計算該類別的食物總數
}
$page = ($_GET['page'])? $_GET['page'] : 0;           //設定目前頁數
$total_page = ceil($food_total / PAGE_NUM);           //計算總共頁數
$start_num = (!$_GET['page'])? '0' : $_GET['page'] * PAGE_NUM; //SQL開始筆數
if ($_POST['action'])
{
	$sql = "SELECT * FROM choose_food WHERE ch_kind = '" . $_GET['foodid'] . "' AND ch_name LIKE '%" . trim($_POST['keyword']) . "%' ORDER BY ch_id";
}else{
	$sql = "SELECT * FROM choose_food WHERE ch_kind = '" . $_GET['foodid'] . "' ORDER BY ch_id LIMIT " . $start_num . "," . PAGE_NUM;
}
$result = mysql_query($sql);
$i = 0;
while( $row = mysql_fetch_array($result) )
{
	//JS需要用到的食物資料變數
	$ch_k   = ( trim($row['ch_k']) == '' )? 0 : $row['ch_k'];                       //判斷熱量是否未輸入資料
	$ch_cho = ( trim($row['ch_cholesterol']) == '' )? 0 : $row['ch_cholesterol'];   //判斷膽固醇是否未輸入資料
	$ch_fat = ( trim($row['ch_fat']) == '' )? 0 : $row['ch_fat'];                   //判斷脂肪是否未輸入資料
	$ch_e   = ( trim($row['ch_e']) == '' )? 0 : $row['ch_e'];                       //判斷蛋白質是否未輸入資料
	$ch_car = ( trim($row['ch_carbohydrate']) == '' )? 0 : $row['ch_carbohydrate']; //判斷醣類是否未輸入資料
	$ch_pot = ( trim($row['ch_potassium']) == '' )? 0 : $row['ch_potassium'];       //判斷鉀是否未輸入資料
	$ch_sod = ( trim($row['ch_sodium']) == '' )? 0 : $row['ch_sodium'];             //判斷鈉是否未輸入資料
	$ch_cal = ( trim($row['ch_calcium']) == '' )? 0 : $row['ch_calcium'];           //判斷鈣是否未輸入資料
	$ch_pho = ( trim($row['ch_phosphorous']) == '' )? 0 : $row['ch_phosphorous'];   //判斷磷是否未輸入資料
	$ch_mg  = ( trim($row['ch_mg']) == '' )? 0 : $row['ch_mg'];                     //判斷鎂是否未輸入資料
	$value = "'" . $row['ch_id'] . "','" . $row['ch_name'] . "','" . $ch_k . "','" . $ch_cho . "','" . $ch_fat . "','" . $ch_e . "','" . $ch_car . "','" . $ch_pot . "','" . $ch_sod . "','" . $ch_cal . "','" . $ch_pho . "','" . $ch_mg . "'";
	$bgcolor = ($i % 2 == 0)? '#FFFFFF' : '#EEEEEE';
	echo "<tr bgcolor = '#FFFFFF'>\n";
	echo "	<td class = 'text13px'>" . $row['ch_name'] . "</td>\n";
	echo "	<td class = 'text13px'>" . $row['kg'] . "</td>\n";
	echo "	<td class = 'text13px'>" . $row['ch_k'] . "</td>\n";
	echo "	<td class = 'text13px'>" . $row['ch_cholesterol'] . "</td>\n";
	echo "	<td class = 'text13px'>" . $row['ch_fat'] . "</td>\n";
	echo "	<td class = 'text13px'>" . $row['ch_e'] . "</td>\n";
	echo "	<td class = 'text13px'><a href = \"javascript:select_food(" . $value . ")\">選擇</a></td>\n";
	echo "</tr>\n";
	$i++;
}
if ( $food_total > PAGE_NUM )   //判斷資料庫中的資料是否大於每頁顯示數量
{
	echo "<tr bgcolor = '#FFFFFF'>\n";
	echo "	<td align = 'center' class = 'text13px' colspan = '7'>\n";
	echo "<a href = '" . ROOT_URL . "/admin/open_food.php?foodid=" . $_GET['foodid'] . "'>第一頁</a>";
	if ($page > 0)
	{
		$up = $page - 1;
		echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/open_food.php?foodid=" . $_GET['foodid'] . "&page=" . $up . "'>上一頁</a></span>";
	}
	if ($page < ($total_page - 1))
	{
		$next = $page + 1;
		echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/open_food.php?foodid=" . $_GET['foodid'] . "&page=" . $next . "'>下一頁</a></span>";
	}
	echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/open_food.php?foodid=" . $_GET['foodid'] . "&page=" . ($total_page - 1) . "'>最後一頁</a></span>";
	echo "	</td>\n";
	echo "</tr>\n";
}
?>
</table>
<div style = 'padding-top:5px'><input type = 'button' id = 'closewin' name = 'closewin' value = '關閉視窗' onclick = 'window.close();'></div>
</form>

<script language = 'javascript'>
<!--
function check_form()
{
	var obj = document.searchform;
	if ( trim(obj.keyword.value) == '' )
	{
		alert("請輸入要查詢的食物名稱!!");
		obj.keyword.focus();
	}else{
		obj.submit();
	}
}

//fname食物名稱, k 熱量, cholesterol 膽固醇, fat 脂肪, e 蛋白質, carbohydrate 醣類, potassium 鉀, sodium 鈉, calcium 鈣, phosphorous 磷, mg 鎂
function select_food(fid, fname, k, cholesterol, fat, e, carbohydrate, potassium, sodium, calcium, phosphorous, mg)
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

	var ch_k   = opener.document.getElementById('ch_k').value;            //熱量
	var ch_cho = opener.document.getElementById('ch_cholesterol').value;  //膽固醇
	var ch_fat = opener.document.getElementById('ch_fat').value;          //脂肪
	var ch_e   = opener.document.getElementById('ch_e').value;            //蛋白質
	var ch_car = opener.document.getElementById('ch_carbohydrate').value; //醣類
	var ch_pot = opener.document.getElementById('ch_potassium').value;    //鉀
	var ch_sod = opener.document.getElementById('ch_sodium').value;       //鈉
	var ch_cal = opener.document.getElementById('ch_calcium').value;      //鈣
	var ch_pho = opener.document.getElementById('ch_phosphorous').value;  //磷
	var ch_mg  = opener.document.getElementById('ch_mg').value;           //鎂

	opener.document.getElementById('ch_k').value            = formatFloat( (parseFloat(ch_k)   + k), 3 );   //熱量取得小數第一位
	opener.document.getElementById('ch_cholesterol').value  = formatFloat( (parseFloat(ch_cho) + cho), 3 ); //膽固醇取得小數第一位
	opener.document.getElementById('ch_fat').value          = formatFloat( (parseFloat(ch_fat) + fat), 3 ); //脂肪取得小數第一位
	opener.document.getElementById('ch_e').value            = formatFloat( (parseFloat(ch_e)   + e), 3 );   //蛋白質取得小數第一位
	opener.document.getElementById('ch_carbohydrate').value = formatFloat( (parseFloat(ch_car) + car), 3 ); //醣類取得小數第一位
	opener.document.getElementById('ch_potassium').value    = formatFloat( (parseFloat(ch_pot) + pot), 3 ); //鉀取得小數第一位
	opener.document.getElementById('ch_sodium').value       = formatFloat( (parseFloat(ch_sod) + sod), 3 ); //鈉取得小數第一位
	opener.document.getElementById('ch_calcium').value      = formatFloat( (parseFloat(ch_cal) + cal), 3 ); //鈣取得小數第一位
	opener.document.getElementById('ch_phosphorous').value  = formatFloat( (parseFloat(ch_pho) + pho), 3 ); //磷取得小數第一位
	opener.document.getElementById('ch_mg').value           = formatFloat( (parseFloat(ch_mg)  + mg), 3 );  //鎂取得小數第一位

	foodlist = opener.document.getElementById('foodlist').innerHTML;
	var food = "<div style = 'padding-top:5px' id = 'food_" + fid + "' name = 'food_" + fid + "'><a href = 'javascript:delfood(\"food_" + fid + "\",\"" + k + "\",\"" + cho + "\",\"" + fat + "\",\"" + e + "\",\"" + car + "\",\"" + pot + "\",\"" + sod + "\",\"" + cal + "\",\"" + pho + "\",\"" + mg + "\")' title = '刪除' onclick = 'return confirm(\"確定要刪除嗎?\")'>" + fname + " <img src = '<?PHP echo ROOT_URL;?>/img/delete.gif' border = '0'></a><input type = 'hidden' id = 'food_id[]' name = 'food_id[]' value = '" + fid + "'></div>";
	opener.document.getElementById('foodlist').innerHTML = foodlist + food;
}
//-->
</script>