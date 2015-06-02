<?PHP
include "config.php";

if ( !ck_guest_value(session_id()) )
{
	showMsg('此功能限會員使用!!');
	//reDirect(ROOT_URL);
}

header_print(true);   //載入header檔
?>
<link href="css/style.css" rel="stylesheet" type="text/css"></link>
<body>
	<?PHP include_once ROOT_PATH . '/menubar.php';?>
	<div class="container">	
	<div class="row">
	<!--左邊的-->
	<div class="col-md-3 col-sm-4">
		<div class="row">
			<div class="col-md-12">
				<div class = 'fast_link'>
				<?PHP
				$nowL = array('首頁' => 'index.php', '配餐' => 'kfoodroot.php');
				echo show_path_url($nowL);
				?>
				</div>
			</div>
		</div>
		<div class="row"><!--配餐-->
			<div class="col-md-12">
				<div class="row">
					<div class="panel panel-success">
						<div class="panel-heading">
						<h3 class="panel-title">配餐</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-5">
								餐別
								</div>
								<div class="col-md-7">
								<select id = 'meal' name = 'meal' style = 'font-size:13px' onchange = 'show_food()'>
									<option value = 'breakfast'>早餐</option>
									<option value = 'lunch'>午餐</option>
									<option value = 'dinner'>晚餐</option>
								</select>
								</div>
							</div><!--餐別-->
							<br>
							<div class="row">
								<div class="col-md-5">
								佔一天份量
								</div>
								<div class="col-md-7">
								<select id = 'percent' name = 'percent' onchange = 'show_food()' style = 'font-size:13px'>
									<option value = '' selected>請選擇</option>
									<option value = '6'>1 / 6</option>
									<option value = '5'>1 / 5</option>
									<option value = '4'>1 / 4</option>
									<option value = '3'>1 / 3</option>
									<option value = '2'>1 / 2</option>
									<option value = '1'>1</option>
								</select>
								</div>
							</div><br><!--佔一天份量-->
							<div class="row">
								<div class="col-md-12">
									<div id = 'food' name = 'food' style = 'display:none'>
									<div class="list-group">
									<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food1" id="food1" class="list-group-item"><strong> 全榖根莖類 </strong></a>
									<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food2" id="food2" class="list-group-item"><strong> 豆魚肉蛋類 </strong></a>
									<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food3" id="food3" class="list-group-item"><strong> 蔬菜類 </strong></a>
									<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food4" id="food4" class="list-group-item"><strong> 水果類 </strong></a>
									<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food5" id="food5" class="list-group-item"><strong> 油脂類 </strong></a>
									<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food6" id = "food6" class="list-group-item"><strong> 奶類 </strong></a>
									<a href="javascript:show_display('other_div');" id = "food7" name = "food7" onmouseover = "show_display('other_div');" class="list-group-item"><strong> 其它 </strong></a>
									
										<div id = 'other_div' name = 'other_div' style = 'display:none'>
										
										<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7" id = "class2_food1" class="list-group-item"> 調味料 </a>
										<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7" id = "class2_food2" class="list-group-item"> 中式早餐 </a>
										<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7" id = "class2_food3" class="list-group-item"> 西式早餐 </a>
										<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7" id = "class2_food4" class="list-group-item"> 家常菜 </a>
										<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7" id = "class2_food5" class="list-group-item"> 小吃 </a>
										<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7" id = "class2_food6" class="list-group-item"> 套餐 </a>
										<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7" id = "class2_food7" class="list-group-item"> 零食點心 </a>
										<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7" id = "class2_food8" class="list-group-item"> 飲料 </a>
										<a href="<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7" id = "class2_food9" class="list-group-item"> 酒類 </a>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>						
				</div>
			</div>		
		</div><!--配餐-->		
		<?PHP
		/*
			//先判斷是否為會員,修改健檢資料
			echo "<div class=\"row\">\n"; 
			echo "<div class=\"col-md-12\">\n"; 
			echo "<div class=\"btn-group\" role=\"group\" aria-label=\"...\">\n"; 
				if ($USER['userid'] != '')
				{
					echo "<a class=\"btn btn-default\" href=\"" . ROOT_URL . "/useredit2.php\" role=\"button\">修改健檢資料</a>\n";
					//echo "<div style = 'padding-top:5px;padding-left:10px'><a href = '" . ROOT_URL . "/useredit2.php'><div class = 'title'>修改健檢資料</div></a></div>\n";
				}else if ( $USER['session_id'] != '')
				{
					echo "<a class=\"btn btn-primary active\" href=\"" . ROOT_URL . "/health1.php\" role=\"button\">修改健檢資料</a>\n"; 
					//echo "<div style = 'padding-top:5px;padding-left:10px'><a href = '" . ROOT_URL . "/health1.php'><div class = 'title'>修改健檢資料</div></a></div>\n";
				}
				//先判斷是否為會員,清除健檢資料
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
					echo "<a class=\"btn btn-danger active\" href=\"kfoodroot.php?action=dele&id=" . $id . "&id2=".$id2."' onclick = 'return confirm(\"確定要刪除嗎?\")\" role=\"button\" id=\"action\">清除</a>\n";
					//echo "<div style = 'padding-top:5px;padding-left:10px'><a href = 'kfoodroot.php?action=dele&id=" . $id . "&id2=".$id2."' onclick = 'return confirm(\"確定要刪除嗎?\")' id='action'><div class = 'title'>清除資料</div></a></div>\n";
				}
			echo "</div>\n";//btn-group 
			echo "</div>\n";//col
			echo "</div>\n";//row
			*/
		?>
		<?php
	
				//未確認配餐紀錄			
				echo "<div class=\"row\"><!--未確認配餐記錄-->\n"; 
				echo "<div class=\"col-md-12 hidden-xs\">\n"; 
				echo "<div class=\"row\">\n"; 
				echo "<div class=\"panel panel-success\">\n"; 
				echo "<div class=\"panel-heading\">\n"; 
				echo "<h3 class=\"panel-title\">未確認配餐記錄</h3>\n"; 
				echo "</div>\n"; 
				echo "<div class=\"panel-body\">\n";

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
							echo "<div><a href = '" . ROOT_URL . "/save_plate.php?percent=" . $logPlate[$key]['percent'] . "&meal=" . $logPlate[$key]['meal'] . "'>" . $MEALTYPE[$logPlate[$key]['meal']] . " - 份量：" . $percent . "</a></div>\n";
						}else{
							echo "<h3><a href = '" . ROOT_URL . "/food_plate.php?percent=" . $logPlate[$key]['percent'] . "&meal=" . $logPlate[$key]['meal'] . "&rand=" . $key . "'><span class=\"label label-primary\">" . $MEALTYPE[$logPlate[$key]['meal']] . " - 份量：" . $percent . "</span></a></h3>\n";
						}
					}
					echo "</div>\n";
					echo "</div>\n";
					echo "</div>\n";
					echo "</div>\n";
					//echo "</div>\n";					
				}
				else
				{
					echo "<div style = 'padding-top:5px;padding-left:15px' class = 'text13px'>配餐記錄皆已確認</div>\n";
					echo "</div>\n";
					echo "</div>\n";
					echo "</div>\n";
					echo "</div>\n";
					//echo "</div>\n";
				}
				?>
				
				
				<?php
				//我的配餐紀錄
				//echo "<div class=\"row\"><!--我的配餐記錄-->\n"; 
				echo "<div class=\"col-md-12 hidden-xs\">\n"; 
				echo "<div class=\"row\">\n"; 
				echo "<div class=\"panel panel-success\">\n"; 
				echo "<div class=\"panel-heading\">\n"; 
				echo "<h3 class=\"panel-title\">我的配餐記錄</h3>\n"; 
				echo "</div>\n"; 
				echo "<div class=\"panel-body\">\n";
				if ( $USER['userid'] != '' )
				{ 
					$i = 0;
					$plate = mysql_query("SELECT * FROM user_food WHERE userid = '" . $USER['userid'] . "' ORDER BY add_time DESC LIMIT 0,5");
					while ( $prow = mysql_fetch_array($plate) )
					{
						echo "<div><a href = '' id = 'plate_" . $i . "' name = 'plate_" . $i . "'><h4>" . date("Y-m-d", $prow['add_time']) . " - " . $MEALTYPE[$prow['meal']] . "</h4></a></div>\n";
						echo "<input type = 'hidden' id = 'plateid_" . $i . "' name = 'plateid_" . $i . "' value = '" . $prow['id'] . "'>\n";

						$i++;
					}
					if ($i == 0)
					{
						echo "<div style = 'padding-top:5px;padding-left:15px' class = 'text13px'>尚無配餐紀錄</div>\n";
					}
					echo "<input type = 'hidden' id = 'plate_no' name = 'plate_no' value = '" . $i . "'>\n";
				}
				echo "</div>\n";
				echo "</div>\n";
				echo "</div>\n";
				echo "</div>\n";
				echo "</div>\n";
				?>
		</div> <!--end-->
		<!--中間的-->
		<div class="col-md-6 col-sm-8">
			<div class="row">
			<div class="col-md-12">
			<div class = 'title3'><span class="pull-left">配餐 - 哈佛飲食金字塔</span></div>       
			<img src = '<?PHP echo ROOT_URL;?>/img/Harvard_healthy_eating_pyramid.jpg' width = '100%'>	
			</div>
			</div>
		</div>
		<!--右邊的-->
		<div class="col-md-3 hidden-sm hidden-xs">
		<div class="row">
		<?PHP include_once "right_menu.php";?>
		</div>
		</div>
	</div> <!-- /container -->
	

<script language = 'javascript'>
<!--
function show_food()
{
	if (document.getElementById('percent').options[document.getElementById('percent').selectedIndex].value == '')
	{
		document.getElementById('food').style.display = 'none';
	}else{
		var p_value = document.getElementById('percent').options[document.getElementById('percent').selectedIndex].value;
		var m_value = document.getElementById('meal').options[document.getElementById('meal').selectedIndex].value;
		document.getElementById('food').style.display = 'block';
		var rand = get_random(1, 999999999);
		document.getElementById('food1').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food1&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('food2').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food2&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('food3').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food3&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('food4').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food4&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('food5').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food5&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('food6').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food6&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		
		document.getElementById('class2_food1').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('調味料');?>&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('class2_food2').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('中式早餐');?>&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('class2_food3').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('西式早餐');?>&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('class2_food4').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('家常菜');?>&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('class2_food5').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('小吃');?>&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('class2_food6').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('套餐');?>&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('class2_food7').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('零食點心');?>&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('class2_food8').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('飲料');?>&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;
		document.getElementById('class2_food9').href = "<?PHP echo ROOT_URL;?>/rootstalk.php?class=food7&class2=<?PHP echo rawurlencode('酒類');?>&percent=" + p_value + "&meal=" + m_value + "&rand=" + rand;

		var plate_no = document.getElementById('plate_no').value;
		document.getElementById('oldplate').style.display = 'block';
		for (i = 0; i < plate_no; i++)
		{
			var pid = document.getElementById('plateid_' + i).value;
			document.getElementById('plate_' + i).href = "<?PHP echo ROOT_URL;?>/oldplate.php?percent=" + p_value + "&meal=" + m_value + "&rand=" + rand + "&pid=" + pid;
		}
	}
}

function show_other_div()
{
	if ( document.getElementById('other_div').style.display == 'none' )
	{
		document.getElementById('other_div').style.display = 'block';
	}else{
		document.getElementById('other_div').style.display = 'none';
	}
}
//-->
</script>
<?PHP include_once ROOT_PATH . '/footer.php';?>
