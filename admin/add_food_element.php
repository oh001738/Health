<?PHP
include "../config.php";
include "../header.php"; //載入header檔
#header_print(true);   //載入header檔
?>
<form action = '<?PHP echo getenv("REQUEST_URI");?>' method = 'post' id = 'searchform' name = 'searchform'>
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
	$food_total = countSQL('food_element', 'id', "WHERE kind = '" . $_GET['foodid'] . "' AND name LIKE '%" . trim($_POST['keyword']) . "%'");   //計算該類別的食物總數
}else{
	$food_total = countSQL('food_element', 'id', "WHERE kind = '" . $_GET['foodid'] . "'"); //計算該類別的食物總數
}
$page = ($_GET['page'])? $_GET['page'] : 0;           //設定目前頁數
$total_page = ceil($food_total / PAGE_NUM);           //計算總共頁數
$start_num = (!$_GET['page'])? '0' : $_GET['page'] * PAGE_NUM; //SQL開始筆數
if ($_POST['action'])
{
	$sql = "SELECT * FROM food_element WHERE kind = '" . $_GET['foodid'] . "' AND name LIKE '%" . trim($_POST['keyword']) . "%' ORDER BY id";
}else{
	$sql = "SELECT * FROM food_element WHERE kind = '" . $_GET['foodid'] . "' ORDER BY id LIMIT " . $start_num . "," . PAGE_NUM;
}

$result = mysql_query($sql);
$i = 0;
while( $row = mysql_fetch_array($result) )
{
	//JS需要用到的食物資料變數
	$kg  = ( trim($row['kg']) == '' )? 0 : $row['kg'];                     //判斷重量是否未輸入資料
	$k   = ( trim($row['k']) == '' )? 0 : $row['k'];                       //判斷熱量是否未輸入資料
	$cho = ( trim($row['cholesterol']) == '' )? 0 : $row['cholesterol'];   //判斷膽固醇是否未輸入資料
	$fat = ( trim($row['fat']) == '' )? 0 : $row['fat'];                   //判斷脂肪是否未輸入資料
	$e   = ( trim($row['e']) == '' )? 0 : $row['e'];                       //判斷蛋白質是否未輸入資料
	$car = ( trim($row['carbohydrate']) == '' )? 0 : $row['carbohydrate']; //判斷醣類是否未輸入資料
	$pot = ( trim($row['potassium']) == '' )? 0 : $row['potassium'];       //判斷鉀是否未輸入資料
	$sod = ( trim($row['sodium']) == '' )? 0 : $row['sodium'];             //判斷鈉是否未輸入資料
	$cal = ( trim($row['calcium']) == '' )? 0 : $row['calcium'];           //判斷鈣是否未輸入資料
	$pho = ( trim($row['phosphorous']) == '' )? 0 : $row['phosphorous'];   //判斷磷是否未輸入資料
	$mg  = ( trim($row['mg']) == '' )? 0 : $row['mg'];                     //判斷鎂是否未輸入資料
	$iro = ( trim($row['iron']) == '' )? 0 : $row['iron'];                 //判斷鐵是否未輸入資料
	$zin = ( trim($row['zinc']) == '' )? 0 : $row['zinc'];                 //判斷鋅是否未輸入資料
	$value = "'" . $row['id'] . "','" . $row['name'] . "','" . $kg . "','" . $k . "','" . $cho . "','" . $fat . "','" . $e . "','" . $car . "','" . $pot . "','" . $sod . "','" . $cal . "','" . $pho . "','" . $mg . "','" . $iro . "','" . $zin . "'";
	$bgcolor = ($i % 2 == 0)? '#FFFFFF' : '#EEEEEE';
	echo "<tr bgcolor = '#FFFFFF'>\n";
	echo "	<td class = 'text13px'>" . $row['name'] . "</td>\n";
	echo "	<td class = 'text13px'>" . $row['kg'] . "</td>\n";
	echo "	<td class = 'text13px'>" . $row['k'] . "</td>\n";
	echo "	<td class = 'text13px'>" . $row['cholesterol'] . "</td>\n";
	echo "	<td class = 'text13px'>" . $row['fat'] . "</td>\n";
	echo "	<td class = 'text13px'>" . $row['e'] . "</td>\n";
	echo "	<td class = 'text13px'><a href = \"javascript:select_food(" . $value . ")\">選擇</a></td>\n";
	echo "</tr>\n";
	$i++;
}
if ( $food_total > PAGE_NUM )   //判斷資料庫中的資料是否大於每頁顯示數量
{
	echo "<tr bgcolor = '#FFFFFF'>\n";
	echo "	<td align = 'center' class = 'text13px' colspan = '7'>\n";
	echo "<a href = '" . ROOT_URL . "/admin/add_food_element.php?foodid=" . $_GET['foodid'] . "'>第一頁</a>";
	if ($page > 0)
	{
		$up = $page - 1;
		echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/add_food_element.php?foodid=" . $_GET['foodid'] . "&page=" . $up . "'>上一頁</a></span>";
	}
	if ($page < ($total_page - 1))
	{
		$next = $page + 1;
		echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/add_food_element.php?foodid=" . $_GET['foodid'] . "&page=" . $next . "'>下一頁</a></span>";
	}
	echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/add_food_element.php?foodid=" . $_GET['foodid'] . "&page=" . ($total_page - 1) . "'>最後一頁</a></span>";
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

//fname食物名稱, kg 重量, k 熱量, cholesterol 膽固醇, fat 脂肪, e 蛋白質, carbohydrate 醣類, potassium 鉀, sodium 鈉, calcium 鈣, phosphorous 磷, mg 鎂, iron 鐵, zinc 鋅
function select_food(fid, fname, kg, k, cholesterol, fat, e, carbohydrate, potassium, sodium, calcium, phosphorous, mg, iron, zinc)
{
	var kg  = parseFloat(kg);          //重量
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
	var iro = parseFloat(iron);        //鐵
	var zin = parseFloat(zinc);        //鋅
	
	if ( opener.document.getElementById('kg').value == '' )             { var ch_kg  = 0; }else{ var ch_kg  = opener.document.getElementById('kg').value; }              //熱量
	if ( opener.document.getElementById('ch_k').value == '' )           { var ch_k   = 0; }else{ var ch_k   = opener.document.getElementById('ch_k').value; }            //熱量
	if ( opener.document.getElementById('ch_cholesterol').value == '' ) { var ch_cho = 0; }else{ var ch_cho = opener.document.getElementById('ch_cholesterol').value; }  //膽固醇
	if ( opener.document.getElementById('ch_fat').value == '' )         { var ch_fat = 0; }else{ var ch_fat = opener.document.getElementById('ch_fat').value; }          //脂肪
	if ( opener.document.getElementById('ch_e').value == '' )           { var ch_e   = 0; }else{ var ch_e   = opener.document.getElementById('ch_e').value; }            //蛋白質
	if ( opener.document.getElementById('ch_carbohydrate').value == '' ){ var ch_car = 0; }else{ var ch_car = opener.document.getElementById('ch_carbohydrate').value; } //醣類
	if ( opener.document.getElementById('ch_potassium').value == '' )   { var ch_pot = 0; }else{ var ch_pot = opener.document.getElementById('ch_potassium').value; }    //鉀
	if ( opener.document.getElementById('ch_sodium').value == '' )      { var ch_sod = 0; }else{ var ch_sod = opener.document.getElementById('ch_sodium').value; }       //鈉
	if ( opener.document.getElementById('ch_calcium').value == '' )     { var ch_cal = 0; }else{ var ch_cal = opener.document.getElementById('ch_calcium').value; }      //鈣
	if ( opener.document.getElementById('ch_phosphorous').value == '' ) { var ch_pho = 0; }else{ var ch_pho = opener.document.getElementById('ch_phosphorous').value; }  //磷
	if ( opener.document.getElementById('ch_mg').value == '' )          { var ch_mg  = 0; }else{ var ch_mg  = opener.document.getElementById('ch_mg').value; }           //鎂
	if ( opener.document.getElementById('ch_k').value == '' )           { var ch_k   = 0; }else{ var ch_k   = opener.document.getElementById('ch_k').value; }            //熱量
	if ( opener.document.getElementById('ch_iron').value == '' )        { var ch_iro = 0; }else{ var ch_iro = opener.document.getElementById('ch_iron').value; }         //鐵
	if ( opener.document.getElementById('ch_zinc').value == '' )        { var ch_zin = 0; }else{ var ch_zin = opener.document.getElementById('ch_zinc').value; }         //鋅
	
	opener.document.getElementById('kg').value              = formatFloat( (parseFloat(ch_kg)  + kg), 3 );  //重量取得小數第一位
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
	opener.document.getElementById('ch_iron').value         = formatFloat( (parseFloat(ch_iro)  + iro), 3 );//鐵取得小數第一位
	opener.document.getElementById('ch_zinc').value         = formatFloat( (parseFloat(ch_zin)  + zin), 3 );//鋅取得小數第一位

	foodlist = opener.document.getElementById('foodlist').innerHTML;
	var food = "<div style = 'padding-top:5px' id = 'food_" + fid + "' name = 'food_" + fid + "'><a href = 'javascript:delfood(\"food_" + fid + "\",\"" + kg + "\",\"" + k + "\",\"" + cho + "\",\"" + fat + "\",\"" + e + "\",\"" + car + "\",\"" + pot + "\",\"" + sod + "\",\"" + cal + "\",\"" + pho + "\",\"" + mg + "\",\"" + zin + "\",\"" + iro + "\")' title = '刪除' onclick = 'return confirm(\"確定要刪除嗎?\")'>" + fname + " <img src = '<?PHP echo ROOT_URL;?>/img/delete.gif' border = '0'></a><input type = 'hidden' id = 'food_id[]' name = 'food_id[]' value = '" + fid + "'></div>";
	opener.document.getElementById('foodlist').innerHTML = foodlist + food;
}
//-->
</script>