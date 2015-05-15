<?PHP
include "config.php";


if ( !ck_login(session_id()) )
{
	showMsg('此功能限會員使用!!');
	reDirect(ROOT_URL);
}

if (!$_GET['percent'] || !$_GET['meal'] || !$_GET['rand'])
{
	phpDirect(ROOT_URL . '/kfoodroot.php');
}

if ( $_POST['ch_food'])
{
	$sql = "INSERT INTO guest_food (food_id, rand, cal, percent, portion, meal, session_id, flag, add_time)VALUES(";
	$sql .= "'" . $_POST['food_id'] . "', ";
	$sql .= "'" . $_GET['rand'] . "', ";
	$sql .= "'" . $_POST['cal'] . "', ";
	$sql .= "'" . $_GET['percent'] . "', ";
	$sql .= "'" . $_POST['portion'] . "', ";
	$sql .= "'" . $_GET['meal'] . "', ";
	$sql .= "'" . session_id() . "', ";
	$sql .= "'0', ";
	$sql .= "'" . time() . "')";
	if ( !mysql_query($sql))
	{
		showMsg('選取失敗，請洽系統管理員!!');
	}
}

header_print(true);   //載入header檔

?>

<body>


<table border = '1' cellpadding = '0' cellspacing = '0' class = 'header_table'>
<tr>
	<td><?PHP include_once ROOT_PATH . '/menubar.php';?></td>
</tr>
<tr>
	<td>
	<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
	<tr>
		<td valign = 'top'>
		<div class = 'fast_link'>
		<?PHP
		$nowL = array('首頁' => 'index.php', '我的配餐紀錄' => '');
		echo show_path_url($nowL);
		?>
		</td>
	</tr>
	</table>
	</td>
</tr>
<tr>
	<td valign = 'top' align = 'center'>
	<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
	<tr>
		<td valign = 'top' class = 'leftmenu' >
		<div style = 'padding-left:10px'>
		  <div class = 'title'>配餐</div>
		</div>
		<table border = '0' cellpadding = '2' cellspacing = '1' width = '100%'>
		<tr id = 'food' name = 'food'>
			<td class = 'text13px'>
			<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food1&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'food1' name = 'food1'>全榖根莖類</a></div>
			<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food2&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'food2' name = 'food2'>豆魚肉蛋類</a></div>
			<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food3&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'food3' name = 'food3'>蔬菜類</a></div>
			<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food4&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'food4' name = 'food4'>水果類</a></div>
			<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food5&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'food5' name = 'food5'>油脂類</a></div>
			<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food6&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'food6' name = 'food6'>奶類</a></div>
			<div style = 'padding-top:10px;padding-left:30px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'food7' name = 'food7'>其它</a></div>
			</td>
		</tr>
		</table>
		</div>
		<a href = '<?PHP echo ROOT_URL;?>/food_plate.php?percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>'><div style = 'padding-top:10px;padding-left:10px'><div class = 'title'>餐盤</div>
		</div></a>
		<?PHP
		echo "<div id = 'oldplate' name = 'oldplate' style = 'padding-top:10px;padding-left:10px;'>\n";
		if ( $USER['userid'] != '' )
		{ 
			$i = 0;
			echo "<div class = 'title'>我的配餐紀錄</div>\n";
			$plate = mysql_query("SELECT * FROM user_food WHERE userid = '" . $USER['userid'] . "' ORDER BY add_time DESC LIMIT 0,10");
			while ( $prow = mysql_fetch_array($plate) )
			{
				echo "<div style = 'padding-top:5px;padding-left:10px'><a href = '" . ROOT_URL . "/oldplate.php?percent=" . $_GET['percent'] . "&meal=" . $_GET['meal'] . "&rand=" . $_GET['rand'] . "&pid=" . $prow['id'] . "' id = 'plate_" . $i . "' name = 'plate_" . $i . "'><font style = 'font-size:13px'>" . date("Y/m/d", $prow['add_time']) . "-" . $MEALTYPE[$prow['meal']] . "</font></a></div>\n";
				echo "<input type = 'hidden' id = 'plateid_" . $i . "' name = 'plateid_" . $i . "' value = '" . $prow['id'] . "'>\n";
				$i++;
			}
			echo "<input type = 'hidden' id = 'plate_no' name = 'plate_no' value = '" . $i . "'>\n";
		}
		echo "</div>\n";
		?>
		</td>
		<td valign = 'top'>
		<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
		<tr>
			<td width = '100%'>
			<table border = '0' cellpadding = '0' cellspacing = '2' width = '100%' style = 'border-collapse'>
			<tr>
			<?PHP
			$i = 1;
			$sql = "SELECT * FROM user_food WHERE id = '" . trim($_GET['pid']) . "'";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			$food_id = explode(',', $row['food_id']); //食物ID
			$part    = explode(',', $row['part']);    //食物份量
			foreach ( $food_id as $key => $value  )
			{
				if ( trim($value) == '') 
				{
					echo "</tr>\n";
					continue;
				}
				$frow = get_value("choose_food", "WHERE ch_id = '" . $value . "'");
				echo "<td width = '33%' align = 'left' valign = 'top'><div style = 'padding-top:10px'>\n";
				echo "<div width = '33%'>\n";
				echo "<table border = '0' cellpadding = '2' cellspacing = '0' width = '100%'>\n";
				echo "<form action = '" . getenv("REQUEST_URI") . "' method = 'post' id = 'food_" . $frow['ch_id'] . "' name = 'food_" . $frow['ch_id'] . "'>\n";
				echo "<tr>\n";
				echo "	<td valign = 'top' align = 'left' width = '62'><a href = 'javascript:view_food(" . $frow['ch_id'] . ")'><img src = '" . IMG_URL . "/" . $frow['ch_image'] . "' width = '60' border = '0'></a></td>\n";
				echo "	<td class = 'text13px' valign = 'top' align = 'left'><div><font style = 'color:#3937FF'>名稱：" . $frow['ch_name'] . "</font></div>\n";
				echo "	<div>熱量：" . $frow['ch_k'] . "</div>\n";
				echo "	<div>脂肪：" . $frow['ch_fat'] . "</div>\n";
				echo "	<div>蛋白質：" . $frow['ch_e'] . "</div>\n";
				echo "	</td>\n";
				echo "</tr>\n";
				echo "<tr>\n";
				echo "	<td colspan = '2' align = 'left' class = 'text13px'>份量\n";
				echo "	<select id = 'portion' name = 'portion'>\n";
				if ($part[$key] == '0.25'){ echo "	<option value = '0.25' selected>0.25</option>\n"; }else{ echo "	<option value = '0.25'>0.25</option>\n"; }
				if ($part[$key] == '0.33'){ echo "	<option value = '0.33' selected>0.33</option>\n"; }else{ echo "	<option value = '0.33'>0.33</option>\n"; }
				if ($part[$key] == '0.75'){ echo "	<option value = '0.75' selected>0.75</option>\n"; }else{ echo "	<option value = '0.75'>0.75</option>\n"; }
				if ($part[$key] == '1'){ echo "	<option value = '1' selected>1</option>\n"; }else{ echo "	<option value = '1'>1</option>\n"; }
				if ($part[$key] == '1.5'){ echo "	<option value = '1.5' selected>1.5</option>\n"; }else{ echo "	<option value = '1.5'>1.5</option>\n"; }
				if ($part[$key] == '2'){ echo "	<option value = '2' selected>2</option>\n"; }else{ echo "	<option value = '2'>2</option>\n"; }
				echo "	</select> 份\n";
				echo "	<input type = 'hidden' id = 'ch_food' name = 'ch_food' value = '1'>\n";
				echo "	<input type = 'hidden' id = 'food_id' name = 'food_id' value = '" . $frow['ch_id'] . "'>\n";
				echo "	<input type = 'hidden' id = 'cal' name = 'cal' value = '" . $frow['ch_k'] . "'>\n";
				echo "	<input type = 'submit' id = 'choice_" . $frow['ch_id'] . "' name = 'choice_" . $frow['ch_id'] . "' value = '選取'></td>\n";
				echo "</tr>\n";
				echo "</form>\n";
				echo "</table>\n";
				echo "</div></td>\n";	
				if ( $i % 3 == 0)
				{
					echo "</tr><tr>\n";
				}
				$i++;
			}
			?>
			</table>
			</td>
		</tr>
		</table>
		</td>
		<td class = 'rightmenu' valign = 'top'><?PHP include_once "right_menu.php";?></td>
	</tr>
	</table>
	</td>
</tr>
<tr>
	<td>
	<?PHP include_once ROOT_PATH . "/footer.php";?>
	</td>
</tr>
</table>
</body>
</html>