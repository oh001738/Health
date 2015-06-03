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

<body>
<?PHP include_once ROOT_PATH . '/menubar.php';?>
	<div class="container">	
		<div class="row">
	<!--左邊的-->
	<div class="col-md-3 col-sm-4">
	<div class="row">	
		<div class="col-md-12">
			<?PHP
			$nowL['首頁'] = 'index.php';
			$nowL['配餐'] = 'kfoodroot.php';
			$nowL[$FOODTYPE[$_GET['class']]] = '';
			echo show_path_url($nowL);
			?>
		</div>
		<!--搜尋列-->
		<div class="col-md-12 col-sm-12 col-xs-6">		
		<div class="panel panel-primary">
		  <div class="panel-heading">
			<h3 class="panel-title">查詢</h3>
		  </div>
		  <div class="panel-body">
			<?php
			echo "<form action = '" . ROOT_URL . "/rootstalk.php?percent=" . $_GET['percent'] . "&meal=" . $_GET['meal'] . "&rand=" . $_GET['rand'] . "' method = 'post' id = 'searchform' name = 'searchform'>\n";
			?>
			<div class="row">
				<div class="col-md-8">
				<input type = 'text' id = 'keyword' class="form-control input-sm" name = 'keyword' placeholder="請輸入食物名稱" onclick = 'this.value = ""'>
				</div>
				<div class="col-md-4">
				<a href="javascript:cksearch()" type="button" class="btn btn-success btn-sm active" role="button">搜尋</a>
				</div>
			</div>
			</form>
		  </div>
		</div>
		</div><!--搜尋列-->
		
		<div class="col-md-12 col-sm-12 col-xs-6">
			<?PHP
				echo "<div class=\"panel panel-primary\">\n";
				echo "<div class=\"panel-heading\"><h3 class=\"panel-title\">個人餐盤</h3></div>\n";
				echo "<div class=\"panel-body\">\n";
				echo "<div class=\"row\">\n";
				$food = get_food_plate(session_id());
				if ( count($food) == 0 )
				{	
					echo "<div class=\"col-md-12\">\n";
					echo "<div><font class = 'redvalue' style = 'font-size:13px'>您的餐盤尚無食物</font></div>\n";
					echo "</div>\n";
					echo "</div>\n";
					echo "</div>\n";
					echo "</div>\n";
				}else{
					echo "<div class=\"col-md-5 col-xs-5\">\n";
					echo "<b>名稱</b>\n";
					echo "</div>\n";
					echo "<div class=\"col-md-3 col-xs-3\">\n";
					echo "<b>Qty</b>\n";
					echo "</div>\n";
					echo "<div class=\"col-md-4 col-xs-4\">\n";
					echo "<b>熱量</b>\n";
					echo "</div>\n";
					echo "</div>\n";					
					foreach ($food as $key => $value)
					{
						$food_name   = get_col_value("choose_food", "ch_name", "WHERE ch_id = '" . $value['food_id'] . "'");
						$foodN       = utf8_substr($food_name, 0, 18); //切割食物名稱
						$carTotal    = $carTotal + $value['cal'];      //卡洛里
						$thismeal    = $value['meal'];                 //餐別
						$thispercent = ($value['percent'] == '1')? $value['percent'] : "1/" . $value['percent']; //佔一天份量
						echo "<div class=\"row\">\n";
						echo "<div class=\"col-md-5 col-xs-5\">\n";
						echo "<a href = 'javascript:view_food(" . $value['food_id'] . ")' title = '" . $food_name . "'>" . $foodN . "</a>\n";
						echo "</div>\n";
						echo "<div class=\"col-md-3 col-xs-3\">\n";
						echo "" . $value['portion'] . "\n";
						echo "</div>\n";
						echo "<div class=\"col-md-4 col-xs-4\">\n";
						echo "" . $value['cal'] . "\n";
						echo "</div>\n";
						echo "</div>\n";
					}
					echo "</div>\n";
				echo "<div class=\"row\">\n";
				echo "<div class=\"col-md-12\">\n";
				echo "<b>熱量總和：" . $carTotal . "</b>\n";
				echo "</div>\n";
				echo "</div>\n";				
				echo "<div class=\"panel-footer\">".dishes()."<h4><span class=\"label label-success\">送出飲食記錄</span></h4></a></div>";
				echo "</div>\n";
				}
				//echo "</div>\n";
				?>			
		</div><!--個人餐盤 Box Section-->		
		<div class="col-md-12 col-sm-12 hidden-xs"><!--配餐-->			
				<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title">配餐</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="row">
								<div class="col-md-12">
									<div id = 'food' name = 'food'>
									<div class="list-group">
									<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food1&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id="food1" class="list-group-item"><strong> 全榖根莖類 </strong></a>
									<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food2&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id="food2" class="list-group-item"><strong> 豆魚肉蛋類 </strong></a>
									<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food3&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id="food3" class="list-group-item"><strong> 蔬菜類 </strong></a>
									<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food4&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id="food4" class="list-group-item"><strong> 水果類 </strong></a>
									<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food5&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id="food5" class="list-group-item"><strong> 油脂類 </strong></a>
									<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food6&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id = "food6" class="list-group-item"><strong> 奶類 </strong></a>
									<a href="javascript:show_display('other_div');" id = "food7" name = "food7" onmouseover = "show_display('other_div');" class="list-group-item"><strong> 其它 </strong></a>
									
										<div id = 'other_div' name = 'other_div' style = 'display:none'>										
										<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id = "class2_food1" class="list-group-item"> 調味料 </a>
										<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id = "class2_food2" class="list-group-item"> 中式早餐 </a>
										<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id = "class2_food3" class="list-group-item"> 西式早餐 </a>
										<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id = "class2_food4" class="list-group-item"> 家常菜 </a>
										<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id = "class2_food5" class="list-group-item"> 小吃 </a>
										<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id = "class2_food6" class="list-group-item"> 套餐 </a>
										<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id = "class2_food7" class="list-group-item"> 零食點心 </a>
										<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id = "class2_food8" class="list-group-item"> 飲料 </a>
										<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>" id = "class2_food9" class="list-group-item"> 酒類 </a>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>						
				</div>
		</div><!--配餐-->
	</div>
		
		<div class="col-md-12 hidden-sm hidden-xs"><!--查詢飲食記錄-->
			<div class="row">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title">調用歷史紀錄</h3>
					</div>
					<div class="panel-body">
						<div class="row">
						<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
						<tr>
							<?PHP
							if ( $USER['userid'] != '' )
							{
							?>
								<tr>
								<td>                        
								<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
								<form action = 'search_plate.php?percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>' method = 'post' id = 'searchplateform' name = 'searchplateform'>
								<tr>
									<td class = 'text13px' align = 'center'>
									<div style = 'padding-right:5px'>
									<select id = 'year' name = 'year'>
									<?PHP
									for ($i = 2009; $i <= date("Y"); $i++)
									{
										$selected = ( $i == date("Y") )? 'selected' : '';
										echo "<option value = '" . $i . "' " . $selected . ">" . $i . "</option>\n";
									}
									?>
									</select>年
									<select id = 'month' name = 'month'>
									<?PHP
									for ($i = 1; $i <= 12; $i++)
									{
										$selected = ( $i == date("n") )? 'selected' : '';
										echo "<option value = '" . $i . "' " . $selected . ">" . $i . "</option>\n";
									}
									?>
									</select>月
									<select id = 'day' name = 'day'>
									<?PHP
									for ($i = 1; $i <= 31; $i++)
									{
										$selected = ( $i == date("d") )? 'selected' : '';
										echo "<option value = '" . $i . "' " . $selected . ">" . $i . "</option>\n";
									}
									?>
									</select>日
									<center>
									<input type = 'button' class = 'btn btn-warning btn-xs' id = 'platesearch' name = 'platesearch' value = '調用飲食記錄' onclick = 'cksearchplate()'></center>
									</div>
									</td>
								</tr>
								</form>
								</table>
							<?PHP
							}
							?>
						</tr>
						</table>	
						</div>
					</div>						
				</div>
			</div>	
		</div><!--配餐-->		
	</div><!--end-->
	<!--中間的-->
	<div class="col-md-6 col-sm-8">



		<div class="col-md-12">		
		<!-- 食物列表 -->
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
						echo "<form action = '" . getenv("REQUEST_URI") . "' method = 'post' id = 'food_" . $row['ch_id'] . "' name = 'food_" . $row['ch_id'] . "'>\n"; 
						echo "<div class=\"media\">\n";
						echo "<div class=\"media-left media-middle\">\n";
						echo "<a href=\"javascript:view_food(" . $row['ch_id'] . ", " . $_GET['percent'] . ",1)\">\n"; 
						echo "<img src=\"" . IMG_URL . "/" . $row['ch_image'] . "\" class=\"media-object img-rounded\" alt=\"Food's Image\" width = \"60\" height = \"60\">\n"; 
						echo "</a>\n";
						echo "</div>\n";
						echo "<div class=\"media-body\">\n"; 
						echo "<h4 class=\"media-heading text-left\"><a href=\"javascript:view_food(" . $row['ch_id'] . ",1)\">".$row['ch_name']." </a>".check_type_1($row['ch_k'], 651, 650, 501, 500, $_GET['percent'])."<small>熱量:".$row['ch_k']."</small></h4>\n";
						echo "<table class=\"table table-condensed\">\n"; 
						echo "<tr class=\"hidden-xs hidden-sm\">\n"; 
						echo "<td >重量</td>\n"; 
						echo "<td>".$row['kg']."</td>\n"; 
						echo "<td>膽固醇</td>\n"; 
						echo "<td>".round($row['ch_cholesterol'])."</td>\n"; 
						echo "<td>脂肪</td>\n"; 
						echo "<td>".round($row['ch_fat'])."</td>\n"; 
						echo "</tr>\n"; 
						echo "<tr>\n"; 
						echo "<td>份量</td>\n"; 
 						echo "<td>\n";
						echo "	<select id = 'portion' name = 'portion'>\n";
						echo "	<option value = '0.25'>0.25</option>\n";
						echo "	<option value = '0.33'>0.33</option>\n";
						echo "	<option value = '0.5'>0.5</option>\n";
						echo "	<option value = '0.75'>0.75</option>\n";
						echo "	<option value = '1' selected>1</option>\n";
						echo "	<option value = '1.5'>1.5</option>\n";
						echo "	<option value = '2'>2</option>\n";
						echo "	</select>份\n";				
						echo "</td>\n";
						echo "<td></td>\n";
						echo "<td>";
						echo "	<input type = 'hidden' id = 'ch_food' name = 'ch_food' value = '1'>\n";
						echo "	<input type = 'hidden' id = 'food_id' name = 'food_id' value = '" . $row['ch_id'] . "'>\n";
						echo "	<input type = 'hidden' id = 'cal' name = 'cal' value = '" . $row['ch_k'] . "'>\n";
						echo "	<input type = 'submit' id = 'choice_" . $row['ch_id'] . "' name = 'choice_" . $row['ch_id'] . "' value = '選取'></td>\n";				
						echo "</form>\n";
						echo "</td>\n";
						echo "<td></td>\n";						
						echo "<td></td>\n"; 

						echo "</tr>\n"; 				
						echo "</table>\n"; 
						echo "</div>\n"; 
						echo "</div>\n"; 
						$i++;
					}
					if ($i == 1)
					{
						showMsg('查無資料!!');
					}
			?>			
	
		</div>
		<!-- 食物列表 -->
		
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
		</div>	
		<div class="col-md-3 hidden-sm hidden-xs"><?PHP include_once "right_menu.php";?></div><br>				
		</div> <!-- /container -->
	</div>
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
<?php
function dishes()
{
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
						$dish = "<a href = '" . ROOT_URL . "/save_plate.php?percent=" . $logPlate[$key]['percent'] . "&meal=" . $logPlate[$key]['meal'] . "'>";
					}else
					{
						$dish = "<a href = '" . ROOT_URL . "/food_plate.php?percent=" . $logPlate[$key]['percent'] . "&meal=" . $logPlate[$key]['meal'] . "&rand=" . $key . "'>" ;
					}
				}
			}
			return $dish;
}
?>
<?PHP include_once ROOT_PATH . '/footer.php';?>