	<?PHP
	require_once "config.php";

	?>

<div class="row"><!--Total Row Section -->
	<div class="col-md-12"><!--Total Box Size -->
	<!--Personal Info-->
		<div class="row">
			<div class="col-md-12">
			<?PHP
			if ( ck_login(session_id()) )
			{
				echo "<table>\n";
				echo "<tr>\n";
				echo "	<td valign = 'top'><span style = 'padding-right:10px'>\n";
				$showName = ( trim($USER['c_name']) != '')? $USER['c_name'] : $USER['username'];
				echo "<a href = '" . ROOT_URL . "/userinfo.php'> 您好!! " . $showName . "</a>\n";
				echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/useredit.php'><font style = 'font-size:13px'>修改資料</font></a></span>";
				echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/logout.php'><font style = 'font-size:13px'>登出</font></a></span>\n";
				echo "</span></td>\n";
				echo "</tr>\n";
				echo "</table>\n";
				echo "<br>\n";
			}
			?>			
			</div>
		</div>
		<?php
		if (basename($_SERVER['PHP_SELF'])=='food.php')
		{
		echo "";
		}
		else 
		{
		echo "<div class=\"row\">\n"; 
		echo "<div class=\"col-md-12\">\n"; 
		echo "<div class=\"panel panel-primary\">\n"; 
		echo "<div class=\"panel-heading\">\n"; 
		echo "<h3 class=\"panel-title\">查詢</h3>\n"; 
		echo "</div>\n"; 
		echo "<div class=\"panel-body\">\n";
		if ( trim($_GET['percent']) != '' && trim($_GET['meal']) != '' && trim($_GET['rand']) != '' )
		{
		echo "<form action = '" . ROOT_URL . "/rootstalk.php?percent=" . $_GET['percent'] . "&meal=" . $_GET['meal'] . "&rand=" . $_GET['rand'] . "' method = 'post' id = 'searchform' name = 'searchform'>\n";
		}else{
		echo "<form action = '" . ROOT_URL . "/food.php' method = 'post' id = 'searchform' name = 'searchform'>\n";
		}
		echo "<div class=\"row\">\n"; 
		echo "<div class=\"col-md-8\">\n"; 
		echo "<input type = 'text' id = 'keyword' class=\"form-control input-sm\" name = 'keyword' placeholder=\"請輸入食物名稱\" onclick = 'this.value = \"\"'>\n"; 
		echo "</div>\n"; 
		echo "<div class=\"col-md-4\">\n"; 
		echo "<a href=\"javascript:cksearch()\" type=\"button\" class=\"btn btn-success btn-sm active\" role=\"button\">搜尋</a>\n"; 
		echo "</div>\n"; 
		echo "</div>\n"; 
		echo "</form>\n"; 
		echo "</div>\n"; 
		echo "</div>\n"; 
		echo "</div>\n"; 
		echo "</div><!--查詢 Box Section-->	\n";
		}?>

	<!--個人餐盤-->	
		<div class="row">
			<div class="col-md-12 col-xs-6">
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
					echo "食物名稱\n";
					echo "</div>\n";
					echo "<div class=\"col-md-3 col-xs-3\">\n";
					echo "Qty\n";
					echo "</div>\n";
					echo "<div class=\"col-md-4 col-xs-4\">\n";
					echo "熱量\n";
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
						echo "x " . $value['portion'] . "\n";
						echo "</div>\n";
						echo "<div class=\"col-md-4 col-xs-4\">\n";
						echo "" . $value['cal'] . "\n";
						echo "</div>\n";
						echo "</div>\n";
					}
					echo "</div>\n";
				echo "<div class=\"row\">\n";
				echo "<div class=\"col-md-12\">\n";
				echo "總和：" . $carTotal . "\n";
				echo "</div>\n";
				echo "</div>\n";				
				echo "<div class=\"panel-footer\">".dishes()."<h5>送出飲食記錄</h5></a></div>";
				echo "</div>\n";
				}
				//echo "</div>\n";
				?>			
		</div><!--個人餐盤 Box Section-->
	<!--所需熱量-->
			<div class="col-md-12 col-xs-6">
			<?PHP include_once 'needcal.php';?>
			</div>
		</div><!--所需熱量 Box Section-->

	<!--連線資訊-->	
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
				  <div class="panel-heading">
					<h3 class="panel-title">連線資訊</h3>
				  </div>
				  <div class="panel-body">
					<?PHP
					$counter = get_counter();
					?>				  
					<div class="row">					
						<div class="col-md-8">累計瀏覽人數：</div>
						<div class="col-md-4"><?PHP echo $counter['all_total'];?></div>
					</div>
					<div class="row">					
						<div class="col-md-8">今日瀏覽人數：</div>
						<div class="col-md-4"><?PHP echo $counter['today_total'];?></div>
					</div>
					<div class="row">					
						<div class="col-md-8">總計會員人數：</div>
						<div class="col-md-4"><?PHP echo $counter['user_total'];?></div>
					</div>
					<div class="row">					
						<div class="col-md-5">IP位置:</div>
						<div class="col-md-7"><?PHP echo $_SERVER['REMOTE_ADDR'];?></div>
					</div>
				  </div>
				</div>
			</div>
		</div><!--連線資訊 Box Section-->	
	</div><!--Total Box Size -->
</div><!--Total Row Section -->	
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
