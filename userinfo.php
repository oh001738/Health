<?php /////檢視個人資料?>
<?PHP
include "config.php";

header_print(true);   //載入header檔

if ( !ck_login(session_id()) )
{
	showMsg('此功能僅限會員使用!!');
	phpDirect(ROOT_URL);
}

$step = ($_POST['step'])? $_POST['step'] : '1';
$step = ($_GET['step'])? $_GET['step'] : $step;
?>
<body>

<?PHP include_once ROOT_PATH . '/menubar.php';?>
	<div class="container">	
		<div class="row">
			<!--左邊-->
			<div class="col-md-3 col-sm-3">
				<div class="row"><!--麵包屑-->
					<div class="col-md-12">
						<div class = 'fast_link'>
						<?PHP
						$nowL = array('首頁' => 'index.php', '檢視個人資料' => 'userinfo.php');
						echo show_path_url($nowL);
						?>
						</div>		
					</div>
				</div>				
			<?php	
				//今日配餐紀錄			
				echo "<div class=\"row\"><!--今日配餐記錄-->\n"; 
				echo "<div class=\"col-md-12\">\n"; 
				echo "<div class=\"row\">\n"; 
				echo "<div class=\"panel panel-success\">\n"; 
				echo "<div class=\"panel-heading\">\n"; 
				echo "<h3 class=\"panel-title\">今日配餐記錄</h3>\n"; 
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
					echo "</div>\n";					
				}
				else
				{
					echo "<span class=\"label label-danger\">尚無配餐記錄</span>\n";
					echo "</div>\n";
					echo "</div>\n";
					echo "</div>\n";
					echo "</div>\n";
					echo "</div>\n";
				}
			?>
			<?php
				//我的配餐紀錄
				echo "<div class=\"row\"><!--我的配餐記錄-->\n"; 
				echo "<div class=\"col-md-12\">\n"; 
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
						echo "<span class=\"label label-danger\">尚無配餐記錄</span>\n";
					}
					echo "<input type = 'hidden' id = 'plate_no' name = 'plate_no' value = '" . $i . "'>\n";
				}
				echo "</div>\n";
				echo "</div>\n";
				echo "</div>\n";
				echo "</div>\n";
				echo "</div>\n";
			?>			
			</div>
			<!--中間-->
			<div class="col-md-6 col-sm-9">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">會員個人資料 - <?php echo $USER['c_name'];?></h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-2 col-lg-2" align="center">
										<div class="row">
										<img alt="User Pic" src="http://i.imgur.com/yFOjllH.jpg">
										</div>
										<div class="row">
										<div class="col-md-12">
										<span class="label label-primary"><?php echo $USER['username'];?></span>
										</div>
										</div><br>
									</div>
										<div class=" col-md-10 col-lg-10 "> 
										  <table class="table table-user-information">
											<tbody>
											  <tr>
												<td>中文姓名:</td>
												<td><?php echo $USER['c_name'];?></td>
											  </tr>
											  <tr>
												<td>EMAIL:</td>
												<td><?php echo $USER['email'];?></td>
											  </tr>
											  <tr>
												<td>聯絡地址:</td>
												<td><?php echo $USER['address'];?></td>
											  </tr>
											  <tr>
												<td>所屬院區:</td>
												<td>
												   <?php
													if($USER['location']=='1')
													{
														echo "台北";
													}
													elseif($USER['location']=='2')
													{
														echo "台中";
													}
													elseif($USER['location']=='3')
													{
														echo "高雄";
													}				
													?>
												</td>
											  </tr>  								  
											<tr>
												<td>連絡電話:</td>
												<td>市話:<?php echo $USER['telphone'];?><br>手機:<?php echo $USER['celphone'];?></td>                           
											</tr>
											<tr>
												<td>減重手術方式:</td>
												<td><span class="label label-success">胃束帶手術</span></td>                           
											</tr>											
											<tr>
												<td>術後階段:</td>
												<td><span class="label label-success">第三階段</span></td>                           
											</tr>											
											</tbody>
										  </table>
										</div>
								</div>
							</div>          
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-warning">
							<div class="panel-heading">
								<h3 class="panel-title">健康資料</h3>
							</div>
							<div class="panel-body">
								<div class="row">
										<div class=" col-md-12 col-lg-12"> 
										  <table class="table table-user-health-info">
											<tbody>
											  <tr>
												<td colspan="2">出生年月日:</td>		
												<td colspan="2"><?php echo " 民國 ".(date("Y", $USER['birthday']) - 1911)." 年 ".date("n", $USER['birthday'])." 月 ".date("d", $USER['birthday'])." 月 ";?></td>
											  <tr>
												<td>性別:</td>
												<td><?php echo $USER['user_sex'];?></td>
												<td>活動分級:</td>
												<td><?php echo $USER['actions'];?></td>
											  </tr>
											  <tr>
												<td>身高:</td>
												<td><?php echo $USER['user_h'];?></td>
												<td>體重:</td>
												<td><?php echo $USER['user_w'];?></td>
											  </tr>
											  <tr>
												<td>身體質量指數(BMI):</td>
												<td><?php echo $USER['bmi'];?></td>
												<td>腰圍:</td>
												<td><?php echo $USER['waistline'];?></td>
											  </tr>
											  <tr>
												<td colspan="2">理想體重:</td>
												<td colspan="2"><?php echo $USER['good_w'] . "~" . $USER['good_w2'];?></td>
											  </tr>
											  <tr>
												<td>高血壓:</td>
												<td><?php echo $USER['hypertension'];?></td>
												<td>糖尿病:</td>
												<td><?php echo $USER['diabetes'];?></td>
											  </tr>
											  <tr>
												<td>心臟病:</td>
												<td><?php echo $USER['heart'];?></td>
												<td>腎臟病:</td>
												<td><?php echo $USER['kidney'];?></td>
											  </tr>
											  <tr>
												<td>膽固醇Cholesterol:</td>
												<td><?php echo $USER['cholesterol']."mg/dL";?></td>
												<td>中性脂肪(三酸甘油脂)Triglyceride:</td>
												<td><?php echo $USER['triglyceride']."mg/dL";?></td>												
											  </tr>
											  <tr>
												<td>血清Creatinine:</td>
												<td><?php echo $USER['creatinine']."mg/dL";?></td>
												<td>血鈉Na:</td>
												<td><?php echo $USER['na']."mEq/L";?></td>
											  </tr>
											  <tr>
												<td>空腹血糖:</td>
												<td><?php echo $USER['fasting_sugar']."mg/dL";?></td>
												<td>血鉀K:</td>
												<td><?php echo $USER['kk']."mEq/L";?></td>
											  </tr>
											  <tr>
												<td>糖化血色素HbA1c:</td>
												<td><?php echo $USER['hba1c']."%";?></td>
												<td>血磷P:</td>
												<td><?php echo $USER['pp']."mg/dL";?></td>
											  </tr>
											  <tr>
												<td>血色素Hgb:</td>
												<td><?php echo $USER['hgb']."g/dL";?></td>
												<td>血鈣Ca:</td>
												<td><?php echo $USER['ca']."mg/dL";?></td>												
											  </tr> 
											  <tr>
												<td>血容比Hct:</td>
												<td><?php echo $USER['hct']."%";?></td>
												<td>血鐵Fe:</td>
												<td><?php echo $USER['fe']."μg/dL";?></td>												
											  </tr> 
											  <tr>
												<td>尿酸Ua:</td>
												<td><?php echo $USER['ua']."mg/dL";?></td>
												<td>鐵總結合能力TIBC:</td>
												<td><?php echo $USER['tibc']."μg/dL";?></td>												
											  </tr>
											  <tr>
												<td>血清轉鐵蛋白Ferritin:</td>
												<td><?php echo $USER['ferritin']."mg/mL";?></td>
												<td>Spare</td>
												<td>zone</td>												
											  </tr>  											  
											</tbody>
										  </table>
										</div>									
								</div>
							</div>          
						</div><button type="button" id = 'back' onclick="location.href='<?php echo ROOT_URL;?>'" class="btn btn-success">回上一頁</button>
					</div>
				</div>
			</div>
			<!--右邊-->
			<div class="col-md-3 hidden-xs hidden-sm">
			<?PHP include_once "right_menu.php";?>
			</div>
		</div>		
    </div><!-- /container --><br>
<?PHP include_once ROOT_PATH . '/footer.php';?>
<script language = 'javascript'>
function open_attention(userid, username)
{
	if ( trim(userid) != '' && trim(username) != '')
	{
		var attentionId = userid;
		var username  = username;
	}else{
		var attentionId = document.getElementById('userid').value;
		var username  = document.getElementById('user_name').value;
	}
	window.open('view_attention.php?attentionid=' + attentionId + '&username=' + escape(username),'個案紀錄','height=450,width=740,toolbar=no,scrollbars=yes,resizable=yes,top=20,left=20');
}
</script>