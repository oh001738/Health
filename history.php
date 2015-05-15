<?PHP
include "config.php";

header_print(true);   //載入header檔

if ( !ck_login(session_id()) )
{
	showMsg('此功能限會員使用!!');
	reDirect(ROOT_URL);
}

if ( $_GET['type'] == 'del' && $_GET['delid'] != '' )   //刪除配餐記錄
{
	actionlog(5,$USER['username']);
	$userID = get_col_value('user_food', 'userid', "WHERE id = '" . $_GET['delid'] . "'");
	if ( $userID != $USER['userid'] )
	{
		showMsg('刪除失敗!!');
		reDirect(ROOT_URL . '/history.php');
	}else{
		if ( delete_value('user_food', "WHERE id = '" . $_GET['delid'] . "'") )
		{
			showMsg('刪除成功!!');
			reDirect(ROOT_URL . '/history.php');
		}else{
			showMsg('刪除失敗，請洽系統管理員!!');
			reDirect(ROOT_URL . '/history.php');
		}
	}
}
?>
<body>

	<?PHP include_once ROOT_PATH . '/menubar.php';?>
	<div class="container">	
	<div class="row">
		<div class="col-md-12">
		<table border = '0' cellpadding = '0' cellspacing = '0' class = 'table table-condensed'>
		<tr>
			<td>
			<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
			<tr>
				<td colspan = '2' valign = 'top'>
				<div class = 'fast_link'>
				<?PHP
				$nowL = array('首頁' => 'index.php', '我的配餐記錄' => 'history.php');
				echo show_path_url($nowL);
				?>
				</td>
			</tr>
			<tr>
				<td valign = 'top'>
				<div class = 'title3' style = 'padding-left:50px;padding-top:5px;padding-bottom:5px'>我的配餐記錄</div>
				<div class = 'title3' style = 'padding-left:50px;padding-top:5px;padding-bottom:5px'><a href="kfoodroot.php">&nbsp;新增餐點</a></div>
				<center>
				<table border = '0' cellpadding = '4' cellspacing = '1' width = '95%'>
				<tr bgcolor = '#EEEEEE'>
					<td class = 'text13px' align = 'center'>新增日期</td>
					<td class = 'text13px' align = 'center'>餐別</td>
					<td class = 'text13px' align = 'center'>佔一天份量</td>
					<td class = 'text13px' align = 'center'>熱量總數</td>
					<td class = 'text13px' align = 'center'>圖片</td>
					<td class = 'text13px' align = 'center'>詳細資料</td>
					<td class = 'text13px' align = 'center'>刪除</td>
				</tr>
				<?PHP
				$sql = "SELECT * FROM user_food WHERE userid = '" . $USER['userid'] . "' ORDER BY add_time DESC";
				$result = mysql_query($sql);
				while ( $row = mysql_fetch_array($result) )
				{
					//$calTotal = '';                          //熱量總數
					$foodId = explode(',', $row['food_id']); //食物ID
					$part   = explode(',', $row['part']);    //份量
					foreach ( $foodId as $key => $value )
					{
						$foodV = mysql_fetch_array(mysql_query("SELECT ch_id, ch_image, ch_name, kg, ch_k, ch_cholesterol, ch_fat, ch_e, ch_carbohydrate, ch_potassium, ch_sodium, ch_calcium, ch_phosphorous, ch_mg, ch_iron, ch_zinc FROM choose_food WHERE ch_id = '" . $value . "'"));
						$FV[$value]['ch_id']           = $foodV['ch_id'];
						$FV[$value]['ch_image']        = $foodV['ch_image'];
						$FV[$value]['ch_name']         = $foodV['ch_name'];
						$FV[$value]['kg']              = $foodV['kg'];
						$FV[$value]['ch_k']            = $foodV['ch_k'];
						$FV[$value]['ch_cholesterol']  = $foodV['ch_cholesterol'];
						$FV[$value]['ch_fat']          = $foodV['ch_fat'];
						$FV[$value]['ch_e']            = $foodV['ch_e'];
						$FV[$value]['ch_carbohydrate'] = $foodV['ch_carbohydrate'];
						$FV[$value]['ch_potassium']    = $foodV['ch_potassium'];
						$FV[$value]['ch_sodium']       = $foodV['ch_sodium'];
						$FV[$value]['ch_calcium']      = $foodV['ch_calcium'];
						$FV[$value]['ch_phosphorous']  = $foodV['ch_phosphorous'];
						$FV[$value]['ch_mg']           = $foodV['ch_mg'];
						$FV[$value]['ch_iron']         = $foodV['ch_iron'];
						$FV[$value]['ch_zinc']		   = $foodV['ch_zinc'];
						$FV[$value]['part']            = $part[$key];           //食物份量
						$calTotal = $calTotal + ($part[$key] * $foodV['ch_k']); //熱量總數
					}
					//日期時間維度內容
					echo "<tr>\n";
					echo "	<td class = 'text13px' align = 'center'>" . date("Y-m-d H:i:s", $row['add_time']) . "</td>\n"; //新增日期
					echo "	<td class = 'text13px' align = 'center'>" . $MEALTYPE[$row['meal']] . "</td>\n"; //餐別
					if ( $row['percent'] == '1' ){ echo "	<td class = 'text13px' align = 'center'>1</td>\n"; }else{ echo "   <td class = 'text13px' align = 'center'>1 / " . $row['percent'] . "</td>\n"; }
					echo "	<td class = 'text13px' align = 'center'>" . $calTotal . "</td>\n";
					if ( $row['img'] != '') { echo "	<td class = 'text13px' align = 'center'><a href = '" . ROOT_URL . "/upload/" . $row['img'] . "' target = '_blank'><img src = '" . ROOT_URL . "/images/paginact.gif' border = '0'></a></td>\n"; }else{ echo "<td></td>\n"; }
					echo "	<td class = 'text13px' align = 'center'><a href = 'javascript:show_display(\"food_" . $row['id'] . "\");'>瀏覽</a></td>\n";
					echo "	<td class = 'text13px' align = 'center'><a href = 'history.php?type=del&delid=" . $row['id'] . "' onclick = 'return confirm(\"確定要刪除嗎?\")'>刪除</a></td>\n";
					echo "</tr>\n";
					//吃的東西的內容
					echo "<tr id = 'food_" . $row['id'] . "' name = 'food_" . $row['id'] . "' style = 'display:none' colspan = '6'>\n";
					echo "	<td colspan = '6' align = 'center'>\n";
					echo "	<table border = '1' cellpadding = '2' cellspacing = '1' width = '100%' style = 'border-collapse:collapse;' bordercolor = '#787878;'>\n";
					echo "	<tr bgcolor = '#EEEEEE'>\n";
					echo "		<td class = 'text13px' align = 'center'></td>\n";
					echo "		<td class = 'text13px' align = 'center'>名稱</td>\n";
					echo "		<td class = 'text13px' align = 'center'>重量</td>\n";
					echo "		<td class = 'text13px' align = 'center'>份量</td>\n";
					echo "		<td class = 'text13px' align = 'center'>熱量</td>\n";
					echo "		<td class = 'text13px' align = 'center'>膽固醇</td>\n";
					echo "		<td class = 'text13px' align = 'center'>脂肪</td>\n";
					echo "		<td class = 'text13px' align = 'center'>蛋白質</td>\n";
					echo "		<td class = 'text13px' align = 'center'>醣</td>\n";
					echo "		<td class = 'text13px' align = 'center'>鉀</td>\n";
					echo "		<td class = 'text13px' align = 'center'>鈉</td>\n";
					echo "		<td class = 'text13px' align = 'center'>鈣</td>\n";
					echo "		<td class = 'text13px' align = 'center'>磷</td>\n";
					echo "		<td class = 'text13px' align = 'center'>鎂</td>\n";
					echo "		<td class = 'text13px' align = 'center'>鐵</td>\n";
					echo "		<td class = 'text13px' align = 'center'>鋅</td>\n";
					echo "	</tr>\n";
					
					foreach ( $foodId as $key => $value )
					{
						if ( $value == '' ){ continue; }
						echo "<tr>\n";
						echo "  <td class = 'text13px' align = 'center'><a href = 'javascript:view_food(" . $FV[$value]['ch_id'] . ")'><img src = '" . IMG_URL . "/" . $FV[$value]['ch_image'] . "' width = '50' border = '0'></a></td>\n";
						echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['ch_name'] . "</td>\n";
						echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['kg'] . "</td>\n";
						echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['part'] . "</td>\n";
						echo "  <td class = 'text13px' align = 'center'>" . ($FV[$value]['part'] * $FV[$value]['ch_k']) . "</td>\n";
						echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['ch_cholesterol'] . "</td>\n";
						echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['ch_fat'] . "</td>\n";
						echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['ch_e'] . "</td>\n";
						echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['ch_carbohydrate'] . "</td>\n";
						echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['ch_potassium'] . "</td>\n";
						echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['ch_sodium'] . "</td>\n";
						echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['ch_calcium'] . "</td>\n";
						echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['ch_phosphorous'] . "</td>\n";
						echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['ch_mg'] . "</td>\n";
						echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['ch_iron'] . "</td>\n";
						echo "  <td class = 'text13px' align = 'center'>" . $FV[$value]['ch_zinc'] . "</td>\n";
						echo "</tr>\n";
					}
					if ( trim($row['note']) != '' )
					{
						echo "<tr>\n";
						echo "	<td class = 'text13px'>備註：</td>\n";
						echo "	<td class = 'text13px' colspan = '15'>" . wordnl2br($row['note']) . "</td>\n";
						echo "</tr>\n";
					}
					echo "	</table>\n";
					echo "	</td>\n";
					echo "</tr>\n";
					unset($carTotal,$foodId,$part);
				}
				?>
				</td>
			</tr>
			</table>
			</td>
		</tr>
		</table>
		</div>	
		<div class="col-md-3 visible-lg visible-md"></div><br>			
		</div> <!-- /container -->
		<?PHP include_once ROOT_PATH . '/footer.php';?>
	
</body>
</html>