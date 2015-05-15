<?PHP
include "config.php";

if ( !ck_guest_value(session_id()) )
{
	phpDirect(ROOT_URL . '/health1.php');
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

<style type="text/css">
<!--
.style2 {font-size: 11pt}
.style3 {color: #000000}
.style5 {font-size: 10pt}
.style6 {font-size: 10pt; color: #000000; }
.style5 {
	color: #FFCC33;
	font-size: 10pt;
}
.style6 {color: #CC3399}
.style8 {font-size: 10pt}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_popupMsg(msg) { //v1.0
  alert(msg);
}

function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>

<link href="css/style.css" rel="stylesheet" type="text/css">
<body>
<?php

?>
<table border = '1' cellpadding = '0' cellspacing = '0' width = '760' class = 'header_table'>
<tr>
	<td><?PHP include_once ROOT_PATH . '/menubar.php';?></td>
</tr>
<tr>
	<td>
	<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
	<tr>
		<td>
		<div class = 'fast_link'>
		<?PHP
		$nowL['首頁'] = 'index.php';
		$nowL['配餐'] = 'kfoodroot.php';
		$nowL[$FOODTYPE[$_GET['class']]] = '';
		echo show_path_url($nowL);
		?>
		</div>
		</td>
	</tr>	
	<tr>
		<td valign = 'top'>
		<table border = '0' cellpadding = '2' cellspacing = '0' width = width="155">
		<tr>
			<td class = 'leftmenu' valign = 'top'>
			<div style = 'padding-left:10px'>
			  <div class = 'title'><img src="img/leftmenu_tittle03.jpg" width="155" height="45" border="0"></div>
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
				<div style = 'padding-top:10px;padding-left:30px'><a href = "javascript:show_display('other_div');" onmouseover = "show_display('other_div');" id = 'food7' name = 'food7'>其它</a></div>
				<div id = 'other_div' name = 'other_div' style = 'display:none'>
					<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('調味料');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food1' name = 'class2_food1'>調味料</a></div>
					<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('中式早餐');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food2' name = 'class2_food2'>中式早餐</a></div>
					<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('西式早餐');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food3' name = 'class2_food3'>西式早餐</a></div>
					<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('家常菜');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food4' name = 'class2_food4'>家常菜</a></div>
					<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('小吃');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food5' name = 'class2_food5'>小吃</a></div>
					<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('套餐');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food6' name = 'class2_food6'>套餐</a></div>
					<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('零食點心');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food7' name = 'class2_food7'>零食點心</a></div>
					<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('飲料');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food8' name = 'class2_food8'>飲料</a></div>
					<div style = 'padding-top:5px;padding-left:35px'><a href = '<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('酒類');?>&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' id = 'class2_food9' name = 'class2_food9'>酒類</a></div>
				</div>
				</td>
			</tr>
			</table>
			</div>
			<?PHP
			//先判斷是否為會員,修改健檢資料
			if ($USER['userid'] != '')
			{
				echo "<div style = 'padding-top:5px;padding-left:10px'><a href = '" . ROOT_URL . "/useredit.php'><div class = 'title'>修改健檢資料</div></a></div>\n";
			}else if ( $USER['session_id'] != '')
			{
				echo "<div style = 'padding-top:5px;padding-left:10px'><a href = '" . ROOT_URL . "/health3.php'><div class = 'title'>修改健檢資料</div></a></div>\n";
			}
			
			//暫存所需熱量hidden欄位
			echo "<input type = 'hidden' id = 'h_needcal' name = 'h_needcal' value = '" . $needCal . "'>\n";
			

/////先判斷是否為會員,清除健檢資料
			if ($USER['session_id'] != '')
			{
				$id = $USER['health_id'];
				$id2 = $USER['session_id'];
				if($USER['health_id'] != '' && $_GET['action'] == 'dele')
				{					
		        //刪除資料庫資料語法
        			$sql = "delete from guest_health where health_id='$id'";
					$sql2 = "delete from guest_food where session_id='$id2'";
		  	      if(mysql_query($sql))
    			  {
	       			 showMsg('清除成功!!');
	     			 reDirect(ROOT_URL . "/index.php");
				  }				 				 
				  else
				  {
		   		     showMsg('清除失敗，請洽系統管理員!!');
	    			 reDirect(ROOT_URL . "/index.php");
 				  }
				  if(mysql_query($sql2))
    			  {
	       			 showMsg('清除成功!!');
	     			 reDirect(ROOT_URL . "/index.php");
				  }				 				 
				  else
				  {
		   		     showMsg('清除失敗，請洽系統管理員!!');
	    			 reDirect(ROOT_URL . "/index.php");
 				  }
				}
				echo "<div style = 'padding-top:5px;padding-left:10px'><a href = 'kfoodroot.php?action=dele&id=" . $id . "&id2=".$id2."' onclick = 'return confirm(\"確定要刪除嗎?\")' id='action'><div class = 'title'>清除資料</div></a></div>\n";
			}
			
			
/////今日配餐紀錄
			echo "<div style = 'padding-top:5px;padding-left:10px'><div class = 'title'>今日配餐紀錄</div></div>\n";
			if ( countSQL('guest_food', 'id', "WHERE session_id = '" . session_id() . "'") > 0 )
			{
				$sql = "SELECT rand, percent, meal, flag FROM guest_food WHERE session_id = '" . session_id() . "'";
				$result = mysql_query($sql);
				while ( $row = mysql_fetch_array($result) )
				{
					$logPlate[$row['rand']]['percent'] = $row['percent']; //份量
					$logPlate[$row['rand']]['meal']    = $row['meal'];    //餐別
					$logPlate[$row['rand']]['flag']    = $row['flag'];    //判斷是否已送出
				}

				foreach ( $logPlate as $key => $value )
				{
					$percent = ($logPlate[$key]['percent'] == 1)? '1' : "1/" . $logPlate[$key]['percent'];
					if ($logPlate[$key]['flag'] == 1)
					{
						echo "<div style = 'padding-top:5px;padding-left:15px' class = 'text13px'><a href = '" . ROOT_URL . "/save_plate.php?percent=" . $logPlate[$key]['percent'] . "&meal=" . $logPlate[$key]['meal'] . "'>" . $MEALTYPE[$logPlate[$key]['meal']] . " - 份量：" . $percent . "</a></div>\n";
					}else{
						echo "<div style = 'padding-top:5px;padding-left:15px' class = 'text13px'><a href = '" . ROOT_URL . "/food_plate.php?percent=" . $logPlate[$key]['percent'] . "&meal=" . $logPlate[$key]['meal'] . "&rand=" . $key . "'>" . $MEALTYPE[$logPlate[$key]['meal']] . " - 份量：" . $percent . "</a></div>\n";
					}
				}
				echo "</div>\n";
			}
			else
			{
				echo "<div style = 'padding-top:5px;padding-left:15px' class = 'text13px'>尚無配餐紀錄</div>\n";
			}
			
/////我的配餐紀
			echo "<div id = 'oldplate' name = 'oldplate' style = 'padding-top:10px;padding-left:10px;'>\n";
			if ( $USER['userid'] != '' )
			{ 
				$i = 0;
				echo "<div class = 'title'>我的配餐紀錄</div>\n";
				$plate = mysql_query("SELECT * FROM user_food WHERE userid = '" . $USER['userid'] . "' ORDER BY add_time DESC LIMIT 0,5");
				while ( $prow = mysql_fetch_array($plate) )
				{
					echo "<div style = 'padding-top:5px;padding-left:10px'><a href = '" . ROOT_URL . "/oldplate.php?percent=" . $_GET['percent'] . "&meal=" . $_GET['meal'] . "&rand=" . $_GET['rand'] . "&pid=" . $prow['id'] . "'><font style = 'font-size:13px'>" . date("Y-m-d", $prow['add_time']) . " - " . $MEALTYPE[$prow['meal']] . "</font></a></div>\n";
					$i++;
				}
				if ($i == 0)
				{
					echo "<div style = 'padding-top:5px;padding-left:15px' class = 'text13px'>尚無配餐紀錄</div>\n";
				}
			}
			?>
			</td>
			<td valign = 'top'>
			<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
			<tr>
				<td width = '100%'>
				<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
				<tr>
					<td width = '20%'><div class = 'title3' style = 'padding-left:15px'><?PHP echo $FOODTYPE[$_GET['class']];?></div></td>
					<?PHP
					if ( $USER['userid'] != '' )
					{
					?>
                    	<tr>
						<td>                        
						<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
						<form action = 'search_plate.php?percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' method = 'post' id = 'searchplateform' name = 'searchplateform'>
						<tr>
							<td class = 'text13px' align = 'right'>
							<div style = 'padding-right:5px'>
							<select id = 'year' name = 'year'>
							<?PHP
							for ($i = 2009; $i <= date("Y"); $i++)
							{
								$selected = ( $i == date("Y") )? 'selected' : '';
								echo "<option value = '" . $i . "' " . $selected . ">" . $i . "</option>\n";
							}
							?>
							</select> 年
							<select id = 'month' name = 'month'>
							<?PHP
							for ($i = 1; $i <= 12; $i++)
							{
								$selected = ( $i == date("n") )? 'selected' : '';
								echo "<option value = '" . $i . "' " . $selected . ">" . $i . "</option>\n";
							}
							?>
							</select> 月
							<select id = 'day' name = 'day'>
							<?PHP
							for ($i = 1; $i <= 31; $i++)
							{
								$selected = ( $i == date("d") )? 'selected' : '';
								echo "<option value = '" . $i . "' " . $selected . ">" . $i . "</option>\n";
							}
							?>
							</select> 日
							<input type = 'button' id = 'platesearch' name = 'platesearch' value = '查詢配餐紀錄' style = 'width:95px' onclick = 'cksearchplate()'>
							</div>
							</td>
						</tr>
						</form>
						</table>
						</td>
                        </tr>
					<?PHP
					}
					?>
				</tr>
				</table>
			</tr>
			<tr>
				<td>
				<div style = 'padding-left:35px'>
				<!-- 食物列表 -->
				<table border = '0' cellpadding = '0' cellspacing = '2' width = '90%' style = 'border-collapse'>
				<tr>
				<?PHP
				$start_num = (!$_GET['page'])? '0' : $_GET['page'] * PAGE_NUM; //SQL開始筆數
				$page = ($_GET['page'])? $_GET['page'] : 0;                    //設定目前頁數
				$i = 1;
				if ( trim($_POST['keyword']) != '' || $_GET['type'] == 'search')
				{
					$key = ( trim($_POST['keyword']) != '' )? trim($_POST['keyword']) : trim(rawurldecode($_GET['keyword']));  //查詢關鍵字
					$food_total = countSQL('choose_food', 'ch_id', "WHERE ch_name LIKE '%" . $key . "%'");   //計算該類別的食物總數
					$total_page = ceil($food_total / PAGE_NUM);                    //計算總共頁數
					$sql = "SELECT * FROM choose_food WHERE ch_name LIKE '%" . $key . "%' LIMIT " . $start_num . "," . PAGE_NUM;
				
				}else{
					
					$sqlwhe = "WHERE ";
					$sqlwhe .= ($_GET['class'])? "ch_kind = '" . $_GET['class'] . "'" : "ch_kind = 'food1'";
					$sqlwhe .= ( trim($_GET['class2'] != '') )? " AND ch_kind2 = '" . rawurldecode($_GET['class2']) . "'" : '';
					$food_total = countSQL('choose_food', 'ch_id', $sqlwhe);   //計算該類別的食物總數
					$total_page = ceil($food_total / PAGE_NUM);                    //計算總共頁數
					$sql = "SELECT * FROM choose_food " . $sqlwhe . " LIMIT " . $start_num . "," . PAGE_NUM;
				}
				$result = mysql_query($sql);
				while ( $row = mysql_fetch_array($result) )
				{
					echo "<td width = '50%' align = 'center' valign = 'top'><div style = 'padding-top:10px'>\n";
					echo "<table border = '0' cellpadding = '2' cellspacing = '2' width = '100%'>\n";
					echo "<form action = '" . getenv("REQUEST_URI") . "' method = 'post' id = 'food_" . $row['ch_id'] . "' name = 'food_" . $row['ch_id'] . "'>\n";
					echo "<tr>\n";
					echo "	<td valign = 'top' align = 'left' colspan = '2'><a href = 'javascript:view_food(" . $row['ch_id'] . ", " . $_GET['percent'] . ")'><img src = '" . IMG_URL . "/" . $row['ch_image'] . "' width = '150' height = '150' border = '0'></a>\n";
					echo "	<div><font style = 'color:#3937FF'>" . $row['ch_name'] . "</font>   " . $row['ch_k'] . "卡 " . check_type_1($row['ch_k'], 651, 650, 501, 500, $_GET['percent']) . "</div>\n";
					//echo "	<div>脂肪：" . $row['ch_fat'] . "</div>\n";
					//echo "	<div>蛋白質：" . $row['ch_e'] . "</div>\n";
					echo "	</td>\n";
					echo "</tr>\n";
					echo "<tr>\n";
					echo "	<td colspan = '2' align = 'left' class = 'text13px'>份量\n";
					echo "	<select id = 'portion' name = 'portion'>\n";
					echo "	<option value = '0.25'>0.25</option>\n";
					echo "	<option value = '0.33'>0.33</option>\n";
					echo "	<option value = '0.5'>0.5</option>\n";
					echo "	<option value = '0.75'>0.75</option>\n";
					echo "	<option value = '1' selected>1</option>\n";
					echo "	<option value = '1.5'>1.5</option>\n";
					echo "	<option value = '2'>2</option>\n";
					echo "	</select> 份\n";
					echo "	<input type = 'hidden' id = 'ch_food' name = 'ch_food' value = '1'>\n";
					echo "	<input type = 'hidden' id = 'food_id' name = 'food_id' value = '" . $row['ch_id'] . "'>\n";
					echo "	<input type = 'hidden' id = 'cal' name = 'cal' value = '" . $row['ch_k'] . "'>\n";
					echo "	<input type = 'submit' id = 'choice_" . $row['ch_id'] . "' name = 'choice_" . $row['ch_id'] . "' value = '選取'></td>\n";
					echo "</tr>\n";
					echo "</form>\n";
					echo "</table>\n";
					echo "</td>\n";	
					if ( $i % 2 == 0)
					{
						echo "</tr><tr>\n";
					}
					$i++;
				}
				if ($i == 1)
				{
					showMsg('查無資料!!');
				}
				?>
				</table>
				<!-- 食物列表 -->
				</div>
				</td>
			</tr>
			</table>
			<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
			<tr>
				<td align = 'center' class = 'text13px'>
				<?PHP
				if ( $food_total > PAGE_NUM )   //判斷資料庫中的資料是否大於每頁顯示數量
				{
					if ( trim($_POST['keyword'] != '') || $_GET['type'] == 'search' )
					{
						$href = "percent=" . $_GET['percent'] . "&meal=" . $_GET['meal'] . "&rand=" . $_GET['rand'] . "&type=search&keyword=" . rawurlencode(trim($key));
					}else{
						$href = "percent=" . $_GET['percent'] . "&meal=" . $_GET['meal'] . "&rand=" . $_GET['rand'] . "&class=" . $_GET['class'] . "&class2=" . rawurlencode($_GET['class2']);
					}
					echo "<a href = '" . ROOT_URL . "/rootstalk.php?" . $href . "'>第一頁</a>";
					if ($page > 0)
					{
						$up = $page - 1;
						echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/rootstalk.php?" . $href . "&page=" . $up . "'>上一頁</a></span>";
					}
					if ($page < ($total_page - 1))
					{
						$next = $page + 1;
						echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/rootstalk.php?" . $href . "&page=" . $next . "'>下一頁</a></span>";
					}
					echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/rootstalk.php?" . $href . "&page=" . ($total_page - 1) . "'>最後一頁</a></span>";
				}				
				?>
                <a href="food_plate.php">&nbsp;查詢餐點</a>
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
	</td>
</tr>
</table>
<script language = 'javascript'>
<!--
function save_food(food_id, percent, meal, rand, cal)
{
	window.open('save_food.php?food_id=' + food_id + '&percent=' + percent + '&meal=' + meal + '&rand=' + rand + '&cal=' + cal,'','height=100,width=100,toolbar=no,scrollbars=no,resizable=no,top=0,left=0');
	var need_cal = document.getElementById('h_needcal').value - cal;
	document.getElementById('needcal').innerHTML = need_cal.toFixed(1);
	document.getElementById('h_needcal').value = need_cal.toFixed(1);
	if ( need_cal < 0 )
	{
		document.getElementById('needcal').style.color = '#FA0300';
	}else{
		document.getElementById('needcal').style.color = '#323232';
	}
}


//-->
</script>

</body>
</html>
