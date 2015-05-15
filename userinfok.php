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
		$nowL = array('首頁' => 'index.php', '檢視個人資料' => 'userinfo.php');
		echo show_path_url($nowL);
		?>
		</div>
		</td>
	</tr>
	<tr>
		<td>
		<table border = '0' width = '100%' cellspacing = '0' cellpadding = '0'>
		<tr>
			<td class = 'leftmenu' valign = 'top'>
			<a href = '<?PHP echo ROOT_URL;?>/food_plate.php?percent=<?PHP echo $_GET['percent'];?>&meal=<?PHP echo $_GET['meal'];?>&rand=<?PHP echo $_GET['rand'];?>'><div style = 'padding-top:5px;padding-left:10px'><div class = 'title'>餐盤</div>
			</div></a>
			<div style = 'padding-top:10px' class = 'text15px'>
			<?PHP
			//暫存所需熱量hidden欄位
			echo "<input type = 'hidden' id = 'h_needcal' name = 'h_needcal' value = '" . $needCal . "'>\n";
			if ( countSQL('guest_food', 'id', "WHERE session_id = '" . session_id() . "'") > 0 )
			{
				echo "<div style = 'padding-top:5px;padding-left:10px'><div class = 'title'>今日配餐紀錄</div></div>\n";
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
			if ( $USER['userid'] != '' )
			{ 
				$i = 0;
				echo "<div style = 'padding-left:10px'><div class = 'title'>我的配餐紀錄</div></div>\n";
				$plate = mysql_query("SELECT * FROM user_food WHERE userid = '" . $USER['userid'] . "' ORDER BY add_time DESC LIMIT 0,5");
				while ( $prow = mysql_fetch_array($plate) )
				{
					echo "<div style = 'padding-top:5px;padding-left:15px'><a href = '" . ROOT_URL . "/oldplate.php?percent=" . $_GET['percent'] . "&meal=" . $_GET['meal'] . "&rand=" . $_GET['rand'] . "&pid=" . $prow['id'] . "'><font style = 'font-size:13px'>" . date("Y-m-d", $prow['add_time']) . " - " . $MEALTYPE[$prow['meal']] . "</font></a></div>\n";
					$i++;
				}
				if ($i == 0)
				{
					echo "<div style = 'padding-top:5px;padding-left:15px' class = 'text13px'>尚無配餐紀錄</div>\n";
				}
			}
			?>
			</td>
			<td valign = 'top' align = 'center'>

<!--＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
<!--＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->	
<?php
if($_GET['action']=='')
{
	switch ($step)
	{
	case '1':
	    echo "<table border = '0' cellpadding = '4' cellspacing = '1' width = '95%' valign = 'top' style = 'border-collapse:collapse' bgcolor = '#AAAAAA'>\n";
	    echo "<form action = '" . getenv("REQUEST_URI") . "' method = 'post' id = 'form1' name = 'form1'>\n";
    	echo "<tr bgcolor = '#EDEDDE'>\n";
	    echo "  <td align = 'center' colspan = '4'><div class = 'title2'>會員個人資料</div></td>\n";
    	echo "</tr>\n";
	    echo "<tr bgcolor = '#FFFFFF'>\n";
    	echo "  <td class = 'text13px' align = 'right' width = '25%'>會員帳號：</td>\n";
		echo "  <td class = 'text13px' align = 'left'>" . $USER['username'] . "</td>\n";
    	echo "  <td class = 'text13px' align = 'right' width = '25%'>email：</td>\n";
	    echo "  <td class = 'text13px' align = 'left' style = 'width:150px'>".$USER['email']."</td>\n";
	    echo "</tr>\n";
	    echo "<tr bgcolor = '#FFFFFF'>\n";
	    echo "  <td class = 'text13px' align = 'right'>中文姓名：</td>\n";
	    echo "  <td class = 'text13px' align = 'left' style = 'width:150px'>".$USER['c_name']."</td>\n";
	    echo "  <td class = 'text13px' align = 'right'>英文姓名：</td>\n";
	    echo "  <td class = 'text13px' align = 'left' style = 'width:150px'>".$USER['e_name']."</td>\n";
	    echo "</tr>\n";
	    echo "<tr bgcolor = '#FFFFFF'>\n";
	    echo "  <td class = 'text13px' align = 'right'>電話號碼：</td>\n";
	    echo "  <td class = 'text13px' align = 'left' colspan = '3' style = 'width:400px'>". $USER['telphone'] ."</td>\n";
		echo "</tr>\n";
		echo "<tr bgcolor = '#FFFFFF'>\n";
	    echo "  <td class = 'text13px' align = 'right'>行動電話：</td>\n";
	    echo "  <td class = 'text13px' align = 'left' colspan = '3' style = 'width:400px'>". $$USER['celphone']."</td>\n";
		echo "</tr>\n";
	    echo "<tr bgcolor = '#FFFFFF'>\n";
	    echo "  <td class = 'text13px' align = 'right'>地址：</td>\n";
	    echo "  <td class = 'text13px' align = 'left' colspan = '3' style = 'width:400px'>". $USER['address'] ."</td>\n";
	    echo "</tr>\n";
		echo "<tr bgcolor = '#FFFFFF'>\n";
	    echo "  <td class = 'text13px' align = 'right'>所屬院區：</td>\n";
	    echo "  <td class = 'text13px' align = 'left' colspan = '3' style = 'width:150px'>"?>
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
						?><?php "</td>\n";
	    echo "</tr>\n";
	    echo "<tr bgcolor = '#EDEDDE'>\n";
	    echo "  <td align = 'center' colspan = '4'><div class = 'title2'>健康資料</div></td>\n";
	    echo "</tr>\n";
	    echo "<tr bgcolor = '#FFFFFF'>\n";
	    echo "  <td class = 'text13px' align = 'right'>出生年月日：</td>\n";
	    echo "  <td class = 'text13px'>民國\n";
	    echo (date("Y", $USER['birthday']) - 1911)." 年 ";
    	echo date("n", $USER['birthday'])." 月 ";
	    echo date("d", $USER['birthday'])." 日 ";
	    echo "  </td>\n";
	    echo "  <td class = 'text13px' align = 'right'>性別：</td>\n";
	    echo "  <td class = 'text13px'>".$USER['user_sex']."</td>\n";
	    echo "</tr>\n";
	    echo "<tr bgcolor = '#FFFFFF'>\n";
	    echo "  <td class = 'text13px' align = 'right'>身高：</td>\n";
	    echo "  <td class = 'text13px'>".$USER['user_h']."</td>\n";
	    echo "  <td class = 'text13px' align = 'right'>體重：</td>\n";
	    echo "  <td class = 'text13px'>".$USER['user_w']."</td>\n";
	    echo "</tr>\n";
	    echo "<tr bgcolor = '#FFFFFF'>\n";
	    echo "  <td class = 'text13px' align = 'right'>腰圍：</td>\n";
    	echo "  <td class = 'text13px'>".$USER['waistline']."</td>\n";
	    echo "  <td class = 'text13px' align = 'right'>語音提醒：</td>\n";
	    echo "  <td class = 'text13px'>".$USER['pronunciation']."</td>\n";
	    echo "</tr>\n";
	    echo "<tr bgcolor = '#FFFFFF'>\n";
	    echo "  <td class = 'text13px' align = 'right'>糖尿病：</td>\n";
	    echo "  <td class = 'text13px'>".$USER['diabetes']."</td>\n";
	    echo "  <td class = 'text13px' align = 'right'>高血壓：</td>\n";
	    echo "  <td class = 'text13px'>".$USER['hypertension']."</td>\n";
	    echo "</tr>\n";
	    echo "<tr bgcolor = '#FFFFFF'>\n";
	    echo "  <td class = 'text13px' align = 'right'>心臟病：</td>\n";
	    echo "  <td class = 'text13px'>".$USER['heart']."</td>\n";
	    echo "  <td class = 'text13px' align = 'right'>腎臟病：</td>\n";
	    echo "  <td class = 'text13px'>".$USER['kidney']."</td>\n";
	    echo "</tr>\n";
	    echo "<tr bgcolor = '#FFFFFF'>\n";
	    echo "  <td class = 'text13px' align = 'right'>身體質量指數(BMI)：</td>\n";
	    echo "  <td class = 'text13px'>". $USER['bmi'] ."</td>\n";
	    echo "  <td class = 'text13px' align = 'right'>理想體重：</td>\n";
	    echo "  <td class = 'text13px'>" . $USER['good_w'] . "~" . $USER['good_w2'] . "</td>\n";
	    echo "</tr>\n";
	    echo "<tr bgcolor = '#FFFFFF'>\n";
	    echo "  <td class = 'text13px' align = 'right'>活動分級：</td>\n";
	    echo "  <td class = 'text13px'>".$USER['actions']."</td>\n";
	    echo "  <td class = 'text13px' align = 'right'>血清 Creatinine：</td>\n";
	    echo "  <td class = 'text13px'>".$USER['creatinine']." mg/dL</td>\n";
	    echo "</tr>\n";
	    echo "<tr bgcolor = '#FFFFFF'>\n";
	    echo "  <td class = 'text13px' align = 'right'>血鈉 Na：</td>\n";
    	echo "  <td class = 'text13px'>". $USER['na'] . " mEq/L</td>\n";
	    echo "  <td class = 'text13px' align = 'right'>空腹血糖 Fasting sugar：</td>\n";
	    echo "  <td class = 'text13px' >". $USER['fasting_sugar'] ." mg/dL</td>\n";
	    echo "</tr>\n";
	    echo "<tr bgcolor = '#FFFFFF'>\n";
	    echo "  <td class = 'text13px' align = 'right'>血鉀 K：</td>\n";
	    echo "  <td class = 'text13px'>". $USER['kk'] . "mEq/L</td>\n";
	    echo "  <td class = 'text13px' align = 'right'>糖化血色素 HbA1c：</td>\n";
    	echo "  <td class = 'text13px'>" . $USER['hba1c'] ." %</td>\n";
	    echo "</tr>\n";
	    echo "<tr bgcolor = '#FFFFFF'>\n";
	    echo "  <td class = 'text13px' align = 'right'>血磷  P：</td>\n";
	    echo "  <td class = 'text13px'>". $USER['pp'] ." mg/dL</td>\n";
	    echo "  <td class = 'text13px' align = 'right'>血色素  Hgb：</td>\n";
	    echo "  <td class = 'text13px'>". $USER['hgb'] ." g/dL</td>\n";
	    echo "</tr>\n";
	    echo "<tr bgcolor = '#FFFFFF'>\n";
    	echo "  <td class = 'text13px' align = 'right'>血鈣 Ca：</td>\n";
	    echo "  <td class = 'text13px'>". $USER['ca'] ." mg/dL</td>\n";
    	echo "  <td class = 'text13px' align = 'right'>血容比  Hct：</td>\n";
	    echo "  <td class = 'text13px'>". $prow['hct'] ." %</td>\n";
    	echo "</tr>\n";
	    echo "<tr bgcolor = '#FFFFFF'>\n";
	    echo "  <td class = 'text13px' align = 'right'>血鐵  Fe：</td>\n";
    	echo "  <td class = 'text13px'>". $USER['fe'] ." μg/dL</td>\n";
	    echo "  <td class = 'text13px' align = 'right'>尿酸  Ua：</td>\n";
    	echo "  <td class = 'text13px'>". $USER['ua'] ." mg/dL</td>\n";
	    echo "</tr>\n";
	    echo "<tr bgcolor = '#FFFFFF'>\n";
	    echo "  <td class = 'text13px' align = 'right'>鐵總結合能力 TIBC：</td>\n";
	    echo "  <td class = 'text13px'>". $USER['tibc'] ." μg/dL</td>\n";
	    echo "  <td class = 'text13px' align = 'right'>膽固醇 Cholesterol：</td>\n";
	    echo "  <td class = 'text13px'>". $USER['cholesterol'] ." mg/dL</td>\n";
	    echo "</tr>\n";
	    echo "<tr bgcolor = '#FFFFFF'>\n";
	    echo "  <td class = 'text13px' align = 'right'>血清轉鐵蛋白 Ferritin：</td>\n";
	    echo "  <td class = 'text13px'>" . $USER['ferritin'] . " mg/mL</td>\n";
	    echo "  <td class = 'text13px' align = 'right'>中性脂肪 (三酸甘油) Triglyceride：</td>\n";
	    echo "  <td class = 'text13px'>" . $USER['triglyceride'] . " mg/dL</td>\n";
	    echo "</tr>\n";
    	echo "<tr bgcolor = '#FFFFFF'>\n";
	    echo "  <td class = 'text13px' colspan = '4' align = 'center'>\n";

    	echo "  <input type = 'button' id = 'back' name = 'back' value = '回上一頁' onclick = 'location.href=\"" . base64_decode($_GET['back']) . "\"'>\n";
		echo "	<input type = 'hidden' id = 'step' name = 'step' value = '2'>\n";
		echo "	<input type = 'submit' name = 'next' id = 'next' value= '檢視個案'></div></td>\n";

	    echo "  </td>\n";
	    echo "</tr>\n";
	    echo "</form>\n";
    	echo "</table><br>\n";
		break;	
	case '2':
	
	echo "<table border = '0' cellpadding = '2' cellspacing = '0' width = '100%'>\n";
	echo "<tr>\n";
	echo "	<td>\n";
	echo "	<table border = '0' cellpadding = '2' cellspacing = '0' width = '100%'>\n";
	echo "	<form action = '" . getenv("REQUEST_URI") . "' id = 'searchform' name = 'searchform' method = 'post'>\n";
	echo "	<tr>\n";
	echo "		<td width = '23%'><div style = 'width:170px'><div class = 'title'>檢視個人個案照顧記錄</div></div></td>\n";
	echo "	</tr>\n";
	echo "	</form>\n";
	echo "	</table>\n";
	echo "	</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td valign = 'top' align = 'center'>\n";
	echo "	<table border = '0' cellpadding = '4' cellspacing = '1' width = '90%' bgcolor = '#CCCCCC'>\n";
	echo "	<tr bgcolor = '#EDEDDE'>\n";
	echo "		<td class = 'text13px' align = 'center' width = '20%'>病歷號碼</td>\n";
	echo "		<td class = 'text13px' align = 'center' width = '20%'>姓名</td>\n";
	echo "		<td class = 'text13px' align = 'center' width = '20%'>出生日期</td>\n";
	echo "		<td class = 'text13px' align = 'center'  width = '20%'>主治醫生</td>\n";
	echo "		<td class = 'text13px' align = 'center' width = '10%'>檢視</td>\n";
	echo "	</tr>\n";
	
	$case_total = countSQL3($USER['id']);   //計算總數
	$page = ($_GET['page'])? $_GET['page'] : 0;      //設定目前頁數
	$total_page = ceil($case_total / PAGE_NUM);      //計算總共頁數
	$start_num = (!$_GET['page'])? '0' : $_GET['page'] * PAGE_NUM; //SQL開始筆數
	$sql = "SELECT id, userid, case_id, user_name, birthday, doctor FROM attention WHERE userid = '". $USER['id'] ."' ORDER BY add_time";
	
	$result = mysql_query($sql);
	$i = 0;
	while( $row = mysql_fetch_array($result) )
	{
		$bgcolor = ($i % 2 == 0)? '#FFFFFF' : '#EEEEEE';
		echo "<tr bgcolor = '" . $bgcolor . "'>\n";
		echo "	<td class = 'text13px'>" . $row['case_id'] . "</td>\n";
		echo "	<td class = 'text13px'>" . $row['user_name'] . "</td>\n";
		echo "	<td class = 'text13px'>" . $row['birthday'] . "</td>\n";
		echo "	<td class = 'text13px'>" . $row['doctor'] . "</td>\n";
		//echo "	<td class = 'text13px' align = 'center'><a href = '" . ROOT_URL . "/attention_case.php?action=view&id=".$USER['id'] . "'>檢視</a></td>\n";
		echo "	<td class = 'text13px' align = 'center'><a href = '" . ROOT_URL . "/userinfo.php?action=view&id=" . $USER['id'] .  "'>檢視</a></td>\n";
		
		echo "</tr>\n";
		$i++;
	}
	if ( $user_total > PAGE_NUM )   //判斷資料庫中的資料是否大於每頁顯示數量
	{
		echo "<tr bgcolor = '#FFFFFF'>\n";
		echo "	<td align = 'center' class = 'text13px' colspan = '7'>\n";
		echo "<a href = '" . ROOT_URL . "/admin/admin.php?op=attention'>第一頁</a>";
		if ($page > 0)
		{
			$up = $page - 1;
			echo "	<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/admin.php?op=attention&page=" . $up . "'>上一頁</a></span>";
		}
		if ($page < ($total_page - 1))
		{
			$next = $page + 1;
			echo "	<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/admin.php?op=attention&page=" . $next . "'>下一頁</a></span>";
		}
		echo "	<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/admin.php?op=attention&page=" . ($total_page - 1) . "'>最後一頁</a></span>";
		echo "	</td>\n";
		echo "</tr>\n";
	}
	echo "	</table>\n";
	echo "	</td>\n";
	echo "</tr>\n";
	echo "	</table>\n";
	echo "總數:".$case_total."　頁數:".($page+1)."　總頁:".$total_page."<br>";
		//echo "<input type = 'button' id = 'printp' name = 'printp' value = '立即列印' onclick = 'javascript:window.print()'>\n";
	break;
	}
}
elseif($_GET['action'] == 'view')
{
	$row = get_value("attention", "WHERE id = '" . $USER['userid'] . "'");
	echo "##########".$USER['userid']."##########\n";
	echo "##########".$row['case_id']."##########\n";
	
	echo "<table border = '0' cellpadding = '2' cellspacing = '0' width = '100%'>\n";
	echo "<tr>\n";
	echo "	<td>\n";
	echo "	<table border = '0' cellpadding = '2' cellspacing = '0' width = '100%'>\n";
	echo "	<form action = '" . getenv("REQUEST_URI") . "' id = 'searchform' name = 'searchform' method = 'post'>\n";
	echo "	<tr>\n";
	echo "		<td width = '23%'><div style = 'width:170px'><div class = 'title'>檢視個人個案照顧記錄</div></div></td>\n";
	echo "	</tr>\n";
	echo "	</form>\n";
	echo "	</table>\n";
	echo "	</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td valign = 'top' align = 'center'>\n";
	echo "	<table border = '0' cellpadding = '4' cellspacing = '1' width = '100%' bgcolor = '#CCCCCC'>\n";
	echo "	<form action = '" . getenv("REQUEST_URI") . "' id = 'attentionform' name = 'attentionform' method = 'post'>\n";
	echo "	<tr bgcolor = '#EDEDDE'>\n";
	echo "		<td align = 'center' class = 'text15px' colspan = '6'>基本資料</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' width = '20%' align = 'right'><font class = 'redValue'>*</font>病歷號碼：</td>\n";
	echo "		<td class = 'text13px' width = '20%'>".$USER['case_id']."</td>\n";
	echo "		<td class = 'text13px' width = '15%' align = 'right'><font class = 'redValue'>*</font>姓名：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'user_name' name = 'user_name' value = '" . $USER['user_name'] . "' onclick = 'select_name()' readonly style = 'width:15%'>\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' width = '20%' align = 'right'><font class = 'redValue'>*</font>出生日期：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'birthday' name = 'birthday' value = '" . $row['birthday'] . "' style = 'width:80px;border:0' readonly></td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'><font class = 'redValue'>*</font>衛教日期：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'attention_date' name = 'attention_date' value = '" . $row['attention_date'] . "' onclick = 'select_date(\"attention_date\")' readonly style = 'width:100px'>\n";
	echo "		<img src = '" . ROOT_URL . "/images/cleanup.gif' title = '清除' style = 'cursor:hand' onclick = 'clear_value(\"attention_date\")'></td>\n";
	echo "		<td class = 'text13px' align = 'right'><font class = 'redValue'>*</font>性別：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'sex' name = 'sex' value = '" . $row['sex'] . "' style = 'width:50px;border:0' readonly></td>\n";
	echo "		<td class = 'text13px' align = 'right'>主治醫生：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'doctor' name = 'doctor' value = '" . $row['doctor'] . "' style = 'width:100px'></td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>身高：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'height' name = 'height' value = '" . $row['height'] . "' style = 'width:80px;border:0' readonly></td>\n";
	echo "		<td class = 'text13px' align = 'right'>目前體重：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'weight' name = 'weight' value = '" . $row['weight'] . "' style = 'width:80px;border:0' readonly></td>\n";
	echo "		<td class = 'text13px' align = 'right'>理想體重：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'goodweight' name = 'goodweight' value = '" . $row['goodweight'] . "' style = 'width:80px;border:0' readonly></td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>校正體重：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'fixweight' name = 'fixweight' value = '" . $row['fixweight'] . "' style = 'width:80px'> kg</td>\n";
	echo "		<td class = 'text13px' align = 'right'>飲食日誌區間：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'food_date' name = 'food_date' value = '" . $row['food_date'] . "' onclick = 'select_date(\"food_date\")' readonly style = 'width:70px'> ~\n";
	echo "		<input type = 'text' id = 'food_date2' name = 'food_date2' value = '" . $row['food_date2'] . "' onclick = 'select_date(\"food_date2\")' readonly style = 'width:70px'>\n";
	echo "		<img src = '" . ROOT_URL . "/images/cleanup.gif' title = '清除' style = 'cursor:hand' onclick = 'clear_value(\"food_date\"),clear_value(\"food_date2\")'></td>\n";
	echo "		<td class = 'text13px' align = 'right'>飲食日誌瀏覽：</td>\n";
	echo "		<td class = 'text13px'><a href = 'javascript:open_history(\"" . $row['userid'] . "\",\"" . $row['user_name'] . "\");'>瀏覽</a></td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#EDEDDE'>\n";
	echo "		<td align = 'center' class = 'text15px' colspan = '6'>營養診斷與飲食問題</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>熱量需求：</td>\n";
	echo "		<td class = 'text13px' colspan = '2'><input type = 'text' id = 'need_cal' name = 'need_cal' style = 'width:80px' value = '" . $row['need_cal'] . "'> kcal/day</td>\n";
	echo "		<td class = 'text13px' align = 'right'>磷攝取：</td>\n";
	echo "		<td class = 'text13px' colspan = '2'>\n";
	unset($checked);
	$checked[1] = ($row['get_mg'] == '1')? 'checked' : '';
	$checked[2] = ($row['get_mg'] == '2')? 'checked' : '';
	$checked[0] = ($checked[1] == '' && $checked[2] == '' )? 'checked' : '';
	echo "		<input type = 'radio' id = 'get_mg' name = 'get_mg' value = '2' " . $checked[2] . ">過多\n";
	echo "		<input type = 'radio' id = 'get_mg' name = 'get_mg' value = '0' " . $checked[0] . ">適當\n";
	echo "		<input type = 'radio' id = 'get_mg' name = 'get_mg' value = '1' " . $checked[1] . ">不足\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>水分攝取：</td>\n";
	echo "		<td class = 'text13px' colspan = '2'>\n";
	unset($checked);
	$checked[1] = ($row['get_water'] == '1')? 'checked' : '';
	$checked[2] = ($row['get_water'] == '2')? 'checked' : '';
	$checked[0] = ($checked[1] == '' && $checked[2] == '' )? 'checked' : '';
	echo "		<input type = 'radio' id = 'get_water' name = 'get_water' value = '2' " . $checked[2] . ">過多\n";
	echo "		<input type = 'radio' id = 'get_water' name = 'get_water' value = '0' " . $checked[0] . ">適當\n";
	echo "		<input type = 'radio' id = 'get_water' name = 'get_water' value = '1' " . $checked[1] . ">不足\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right'>蛋白質需求：</td>\n";
	echo "		<td class = 'text13px' colspan = '2'><input type = 'text' id = 'get_egg' name = 'get_egg' style = 'width:80px' value = '" . $row['get_egg'] . "'> g/day</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>鈉攝取：</td>\n";
	echo "		<td class = 'text13px' colspan = '2'>\n";
	unset($checked);
	$checked[1] = ($row['get_na'] == '1')? 'checked' : '';
	$checked[2] = ($row['get_na'] == '2')? 'checked' : '';
	$checked[0] = ($checked[1] == '' && $checked[2] == '' )? 'checked' : '';
	echo "		<input type = 'radio' id = 'get_na' name = 'get_na' value = '2' " . $checked[2] . ">過多\n";
	echo "		<input type = 'radio' id = 'get_na' name = 'get_na' value = '0' " . $checked[0] . ">適當\n";
	echo "		<input type = 'radio' id = 'get_na' name = 'get_na' value = '1' " . $checked[1] . ">不足\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right'>磷結合劑使用正確性：</td>\n";
	echo "		<td class = 'text13px' colspan = '2'>\n";
	unset($checked);
	$checked[1] = ($row['get_pho'] == '1')? 'checked' : '';
	$checked[2] = ($row['get_pho'] == '2')? 'checked' : '';
	$checked[0] = ($checked[1] == '' && $checked[2] == '' )? 'checked' : '';
	echo "		<input type = 'radio' id = 'get_pho' name = 'get_pho' value = '2' " . $checked[2] . ">良好\n";
	echo "		<input type = 'radio' id = 'get_pho' name = 'get_pho' value = '0' " . $checked[0] . ">尚可\n";
	echo "		<input type = 'radio' id = 'get_pho' name = 'get_pho' value = '1' " . $checked[1] . ">不良\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>熱量攝取：</td>\n";
	echo "		<td class = 'text13px' colspan = '2'>\n";
	unset($checked);
	$checked[1] = ($row['get_cal'] == '1')? 'checked' : '';
	$checked[2] = ($row['get_cal'] == '2')? 'checked' : '';
	$checked[0] = ($checked[1] == '' && $checked[2] == '' )? 'checked' : '';
	echo "		<input type = 'radio' id = 'get_cal' name = 'get_cal' value = '2' " . $checked[2] . ">過多\n";
	echo "		<input type = 'radio' id = 'get_cal' name = 'get_cal' value = '0' " . $checked[0] . ">適當\n";
	echo "		<input type = 'radio' id = 'get_cal' name = 'get_cal' value = '1' " . $checked[1] . ">不足\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right'>鉀攝取：</td>\n";
	echo "		<td class = 'text13px' colspan = '2'>\n";
	unset($checked);
	$checked[1] = ($row['get_pot'] == '1')? 'checked' : '';
	$checked[2] = ($row['get_pot'] == '2')? 'checked' : '';
	$checked[0] = ($checked[1] == '' && $checked[2] == '' )? 'checked' : '';
	echo "		<input type = 'radio' id = 'get_pot' name = 'get_pot' value = '2' " . $checked[2] . ">過多\n";
	echo "		<input type = 'radio' id = 'get_pot' name = 'get_pot' value = '0' " . $checked[0] . ">適當\n";
	echo "		<input type = 'radio' id = 'get_pot' name = 'get_pot' value = '1' " . $checked[1] . ">不足\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>飲食控制動機：</td>\n";
	echo "		<td class = 'text13px' colspan = '2'>\n";
	unset($checked);
	$checked[1] = ($row['motive'] == '1')? 'checked' : '';
	$checked[2] = ($row['motive'] == '2')? 'checked' : '';
	$checked[3] = ($row['motive'] == '3')? 'checked' : '';
	$checked[0] = ($checked[1] == '' && $checked[2] == '' && $checked[3] == '' )? 'checked' : '';
	echo "		<input type = 'radio' id = 'motive' name = 'motive' value = '3' " . $checked[3] . ">強烈\n";
	echo "		<input type = 'radio' id = 'motive' name = 'motive' value = '2' " . $checked[2] . ">普通\n";
	echo "		<input type = 'radio' id = 'motive' name = 'motive' value = '1' " . $checked[1] . ">勉強\n";
	echo "		<input type = 'radio' id = 'motive' name = 'motive' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right'>補充低蛋白點心：</td>\n";
	echo "		<td class = 'text13px' colspan = '2'>\n";
	unset($checked);
	$checked[1] = ($row['low_egg'] == '1')? 'checked' : '';
	$checked[2] = ($row['low_egg'] == '2')? 'checked' : '';
	$checked[3] = ($row['low_egg'] == '3')? 'checked' : '';
	$checked[0] = ($checked[1] == '' && $checked[2] == '' && $checked[3] == '' )? 'checked' : '';
	echo "		<input type = 'radio' id = 'low_egg' name = 'low_egg' value = '3' " . $checked[3] . ">總是\n";
	echo "		<input type = 'radio' id = 'low_egg' name = 'low_egg' value = '2' " . $checked[2] . ">常常\n";
	echo "		<input type = 'radio' id = 'low_egg' name = 'low_egg' value = '1' " . $checked[1] . ">偶爾\n";
	echo "		<input type = 'radio' id = 'low_egg' name = 'low_egg' value = '0' " . $checked[0] . ">沒有\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>單醣攝取：</td>\n";
	echo "		<td class = 'text13px' colspan = '2'>\n";
	unset($checked);
	$checked[1] = ($row['get_car'] == '1')? 'checked' : '';
	$checked[2] = ($row['get_car'] == '2')? 'checked' : '';
	$checked[0] = ($checked[1] == '' && $checked[2] == '' )? 'checked' : '';
	echo "		<input type = 'radio' id = 'get_car' name = 'get_car' value = '2' " . $checked[2] . ">過多\n";
	echo "		<input type = 'radio' id = 'get_car' name = 'get_car' value = '0' " . $checked[0] . ">適當\n";
	echo "		<input type = 'radio' id = 'get_car' name = 'get_car' value = '1' " . $checked[1] . ">不足\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right'>飽和脂訪攝取：</td>\n";
	echo "		<td class = 'text13px' colspan = '2'>\n";
	unset($checked);
	$checked[1] = ($row['get_fat'] == '1')? 'checked' : '';
	$checked[2] = ($row['get_fat'] == '2')? 'checked' : '';
	$checked[0] = ($checked[1] == '' && $checked[2] == '' )? 'checked' : '';
	echo "		<input type = 'radio' id = 'get_fat' name = 'get_fat' value = '2' " . $checked[2] . ">過多\n";
	echo "		<input type = 'radio' id = 'get_fat' name = 'get_fat' value = '0' " . $checked[0] . ">適當\n";
	echo "		<input type = 'radio' id = 'get_fat' name = 'get_fat' value = '1' " . $checked[1] . ">不足\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#EDEDDE'>\n";
	echo "		<td align = 'center' class = 'text15px' colspan = '6'>營養介入策略</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' colspan = '6'>飲食計畫</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>主食：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'principal_food' name = 'principal_food' style = 'width:80px' value = '" . $row['principal_food'] . "'> 份</td>\n";
	echo "		<td class = 'text13px' align = 'right'>水果：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'fruit' name = 'fruit' style = 'width:80px' value = '" . $row['fruit'] . "'> 份</td>\n";
	echo "		<td class = 'text13px' align = 'right'>油脂：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'oil' name = 'oil' style = 'width:80px' value = '" . $row['oil'] . "'> 份</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>肉魚豆蛋：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'meat' name = 'meat' style = 'width:80px' value = '" . $row['meat'] . "'> 份</td>\n";
	echo "		<td class = 'text13px' align = 'right'>蔬菜：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'vegetables' name = 'vegetables' style = 'width:80px' value = '" . $row['vegetables'] . "'> 份</td>\n";
	echo "		<td class = 'text13px' align = 'right'>低氮澱粉：</td>\n";
	echo "		<td class = 'text13px'><input type = 'text' id = 'starch' name = 'starch' style = 'width:80px' value = '" . $row['starch'] . "'> 份</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>蛋白質食物與腎臟病之關係：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['egg_kidney'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'egg_kidney' name = 'egg_kidney' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'egg_kidney' name = 'egg_kidney' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>低氮點心製作指導：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['nitrogen'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'nitrogen' name = 'nitrogen' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'nitrogen' name = 'nitrogen' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>營養醫療補充品使用：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['supply'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'supply' name = 'supply' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'supply' name = 'supply' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>簡易食物分量與待換：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['simple_food'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'simple_food' name = 'simple_food' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'simple_food' name = 'simple_food' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>低磷飲食：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['low_pho'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'low_pho' name = 'low_pho' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'low_pho' name = 'low_pho' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>外食原則與建議：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['out_food'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'out_food' name = 'out_food' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'out_food' name = 'out_food' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>低蛋白飲食原則：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['low_egg_eat'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'low_egg_eat' name = 'low_egg_eat' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'low_egg_eat' name = 'low_egg_eat' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>低鈉飲食：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['low_na'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'low_na' name = 'low_na' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'low_na' name = 'low_na' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>年節飲食指導：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['festival'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'festival' name = 'festival' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'festival' name = 'festival' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>糖尿病腎病變飲食調整：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['diabetes'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'diabetes' name = 'diabetes' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'diabetes' name = 'diabetes' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>低鉀飲食：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['low_pot'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'low_pot' name = 'low_pot' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'low_pot' name = 'low_pot' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>食慾不振飲食對策：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['belly'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'belly' name = 'belly' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'belly' name = 'belly' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>增加熱量攝取:油脂補充技巧</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['car_oil'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'car_oil' name = 'car_oil' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'car_oil' name = 'car_oil' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>高膽固醇/三酸甘油脂飲食：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['high_cho'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'high_cho' name = 'high_cho' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'high_cho' name = 'high_cho' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>咀嚼不良飲食原則：</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['chew'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'chew' name = 'chew' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'chew' name = 'chew' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "		<td class = 'text13px' align = 'right' colspan = '2'>增加熱量攝取:純糖類補充技巧</td>\n";
	echo "		<td class = 'text13px'>\n";
	unset($checked);
	if ($row['add_cal'] == '1'){ $checked[1] = 'checked'; }else{ $checked[0] = 'checked'; }
	echo "		<input type = 'radio' id = 'add_cal' name = 'add_cal' value = '1' " . $checked[1] . ">有\n";
	echo "		<input type = 'radio' id = 'add_cal' name = 'add_cal' value = '0' " . $checked[0] . ">無\n";
	echo "		</td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td class = 'text13px' align = 'right'>備註：</td>\n";
	echo "		<td class = 'text13px' colspan = '5'><textarea id = 'note' name = 'note' cols = '70' rows = '7'>" . $row['note'] . "</textarea></td>\n";
	echo "	</tr>\n";
	echo "	<tr bgcolor = '#FFFFFF'>\n";
	echo "		<td colspan = '6' class = 'text13px' align = 'center'>\n";

	echo "<input type = 'button' id = 'printp' name = 'printp' value = '立即列印' onclick = 'javascript:window.print()'>\n";
	echo "		<input type = 'button' id = 'back' name = 'back' value = '回上一頁' onclick = 'location.href=\"" . base64_decode($_GET['backurl']) . "\"'>\n";
	echo "	</tr>\n";
	echo "	</form>\n";
	echo "	</table>\n";
	echo "	</td>\n";
	echo "</tr>\n";
	echo "	</table>\n";
}



/*
if($_GET['action'] == '')
{
	if($USER['userid']!='')
	{

	}	
}
elseif()
{
	
}*/

/*if ( $USER['userid'] != '' )
			{ 
				$plate = mysql_query("SELECT * FROM user WHERE id = '" . $USER['id'] . "' ORDER BY add_time DESC LIMIT 0,5");
				while ( $prow = mysql_fetch_array($plate) )
				{
					switch ($step)
					{
					case '1':
						echo "<div class = 'title3' style = 'padding-left:10px;padding-top:1px;'>檢視個人資料</div>\n";
						$userValue = get_user_value($USER['userid']);
						echo "<form id = 'form1' name = 'form1' method = 'post' action = '" . getenv("REQUEST_URI") . "'>\n";
						echo "<table width = '95%' border = '0' align = 'center'>\n";
						echo "<tr>\n";
						echo "	<td colspan = '2'><div style = 'padding-left:150px'>個人資料</div></td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						echo "<td align = 'right' width = '25%'>中文姓名：</td>\n";
						echo "<td>" .trim($USER['c_name']). "</td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						echo "	<td align = 'right'>英文名字：</td>\n";
						echo "<td>" .trim($USER['e_name']). "</td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						echo "	<td align = 'right'>電子郵件：</td>\n";
						echo "<td>" .trim($USER['email']). "</td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						echo "	<td align = 'right'>帳號：</td>\n";
						echo "<td>" .trim($USER['username']). "</td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						echo "	<td colspan = '2'><div style = 'padding-left:150px;padding-top:20px'>通訊</div></td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						echo "	<td align = 'right'>電話號碼：</td>\n";
						echo "<td>" .trim($USER['telphone']). "</td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						echo "	<td align = 'right'>行動電話：</td>\n";
						echo "<td>" .trim($USER['celphone']). "</td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						echo "	<td align = 'right'>地址：</td>\n";
						echo "<td>" .trim($USER['address']). "</td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						echo "	<td align = 'right'>所屬院區：</td>\n";
						echo "<td>" ?>
                        <?php
						if(trim($USER['location'])=='1')
						{
							echo "台北";
						}
						elseif(trim($USER['location'])=='2')
						{
							echo "台中";
						}
						elseif(trim($USER['location'])=='3')
						{
							echo "高雄";
						}						
						?><?php "</td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						echo "	<td colspan = '2'><div style = 'padding-left:150px;padding-top:10px'>\n";
						echo "	<input type = 'hidden' id = 'step' name = 'step' value = '2'>\n";
						echo "	<input type = 'hidden' id = 'userid' name = 'userid' value = '" . $userValue['id'] . "'>\n";
						echo "	<input type = 'submit' name = 'next' id = 'next' value = '下一頁'>\n";
						echo "</tr>\n";
						echo "</table>\n";
						echo "</form> \n";
						break;
							
				case '2':
				
					if ( ($_POST['step'] == '2' && trim($_POST['userid']) != '') )
					{

							$userHealth = get_user_health($USER['userid']);
							echo "<div class = 'title3' style = 'padding-left:100px;padding-top:1px;'>檢視個人資料</div>\n";
							echo "<form id = 'form2' name = 'form2' method = 'post' action = 'userinfo.php'>\n";
							echo "<table width = '90%' border = '0' align = 'center' cellpadding = '3' cellspacing = '1'>\n";
							echo "<tr>\n";
							echo "	<td width = '40%'>出生年月日</td>\n";
							$year = date("Y",mktime (0, 0, 0, 0, 0, date("Y", $userHealth['birthday'])))+1;
							$month = date("m",mktime (0, 0, 0, date("m", $userHealth['birthday']), 0, 0))-11;
							$day = date("d",mktime (0, 0, 0, 0, date("d", $userHealth['birthday']), 0));
							echo "<td>民國" .($year-1911). "年".$month."月".$day."日</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td>性別</td>\n";
							echo "<td>" .trim($USER['user_sex']). "</td>\n";				
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td>糖尿病</td>\n";
							echo "<td>" .trim($USER['diabetes']). "</td>\n";							
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td>高血壓</td>\n";
							echo "<td>" .trim($USER['hypertension']). "</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td>心臟病</td>\n";
							echo "<td>" .trim($USER['heart']). "</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td>腎臟病</td>\n";
							echo "<td>" .trim($USER['kidney']). "</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td>語音提醒</td>\n";
							echo "<td>" .trim($USER['pronunciation']). "</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td>身高</td>\n";
							echo "<td>" .trim($USER['user_h']). "</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td>體重</td>\n";
							echo "<td>" .trim($USER['user_w']). "</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td colspan = '2'>您的身體質量指數 (BMI) 為" .trim($USER['bmi']). "</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td id = 'msg' name = 'msg' colspan = '2'></td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td colspan = '2'>您的理想體重為".trim($USER['good_w']). "～".trim($USER['good_w2'])."</td>\n";
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td>腰圍</span></td>\n";
							echo "<td>" .trim($USER['waistline'])."吋". "</td>\n";							
							echo "</tr>\n";
							echo "<tr>\n";
							echo "	<td align = 'right'>您的活動量分級是：</td>\n";
							echo "<td>" .trim($USER['actions'])."</td>\n";
							echo "</tr>\n";							
							echo "	<td></td>\n";
							echo "	<td>\n";
							echo "	<div style = 'padding-left:100px'>\n";
							echo "	<input type = 'hidden' id = 'step' name = 'step' value = '3'>\n";
							echo "	<input type = 'hidden' id = 'userid' name = 'userid' value = '" . trim($USER['userid']) . "'>\n";
							echo "	<input type = 'submit' name = 'next' id = 'next' value = '下一頁'>\n";
							echo "	</td>\n";
							echo "</tr>\n";
							echo "</table>\n";
							echo "</div>\n";
							echo "</form>\n";

					}
					break;
							
				case '3':
					$userHealth = get_user_health($_POST['userid']);
					echo "<div class = 'title3' align = 'left' style = 'padding-left:30px'>檢康檢查各項檢驗值<br>\n";
					echo "<span><font class = 'text13px'>若數值為紅色字體，表示超過標準範圍</font></span></div>\n";
					echo "<form id = 'form1' name = 'form1' method = 'post' action = '" . getenv("REQUEST_URI") . "'>\n";
					echo "<table width = '100%' border = '0' align = 'center' cellpadding = '6' cellspacing = '1'>\n";
					echo "<tr>\n";
					
					echo "<td width = '35%'>血中肌肝酸<br>Creatinine</td>\n";
					if(trim($USER['creatinine']) < 0.7 || trim($USER['creatinine']) > 1.4)
					{
						echo "<td width = '30%'><font style = 'color:#FA0300;font-weight:800'>".trim($USER['creatinine'])."</font> mg/dl </td>\n";
					}
					else
					{
						echo "<td width = '30%'>".trim($USER['creatinine'])."</font>mg/dl </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(0.7~1.4)</font></td>";
					echo "</tr>\n";
					
					echo "<tr>\n";					
					echo "	<td>血鈉<br>Na</td>\n";
					if(trim($USER['na']) < 137 || trim($USER['na']) > 153)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['na'])."</font> mEq/l </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['na'])."</font> mEq/l </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(137~153)</font></td>";
					echo "</tr>\n";
					
					echo "<tr>\n";					
					echo "	<td>血尿素氮<br>BUN</td>\n";			
					if(trim($USER['bun']) < 5 || trim($USER['bun']) > 25)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['bun'])."</font> mg/dl </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['bun'])."</font> mg/dl </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(5~25)</font></td>";
					echo "</tr>\n";
					
					echo "<tr>\n";					
					echo "	<td>血鉀<br>K</td>\n";	
					if(trim($USER['kk']) < 3.5 || trim($USER['kk']) > 5.0)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['kk'])."</font> meg/dl </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['kk'])."</font> meg/dl </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(3.5~5.0)</font></td>";
					echo "</tr>\n";
					
					echo "<tr>\n";					
					echo "	<td>空腹血糖<br>Fasting sugar</td>\n";	
					if(trim($USER['fasting_sugar']) < 70 || trim($USER['fasting_sugar']) > 110)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['fasting_sugar'])."</font> mg/dl </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['fasting_sugar'])."</font> mg/dl </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(70~110)</font></td>";
					echo "</tr>\n";
					
					echo "<tr>\n";					
					echo "	<td>血磷<br>P</td>\n";	
					if(trim($USER['pp']) < 2.5 || trim($USER['pp']) > 4.5)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['pp'])."</font> mg/dl </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['pp'])."</font> mg/dl </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(2.5~4.5)</font></td>";
					echo "</tr>\n";
					
					echo "<tr>\n";					
					echo "	<td>糖化血色素<br>HbA1c</td>\n";	
					if(trim($USER['hba1c']) < 4 || trim($USER['hba1c']) > 6)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['hba1c'])."</font> % </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['hba1c'])."</font> % </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(4~6)</font></td>";
					echo "</tr>\n";
					
					echo "<tr>\n";					
					echo "	<td>血鈣<br>Ca</td>\n";	
					if(trim($USER['ca']) < 8.4 || trim($USER['ca']) > 10.2)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['ca'])."</font> mg/dl </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['ca'])."</font> mg/dl </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(8.4~10.2)</font></td>";
					echo "</tr>\n";

					echo "<tr>\n";					
					echo "	<td>血色素<br>Hgb</td>\n";
					$type = (trim($USER['user_sex']) == '男')? '1' : '0';
					$hgbtmp = trim($USER['hgb']);
					
					if(($type==1 && ($hgbtmp<12.3 || $hgbtmp>18.3))||($type==0 && ($hgbtmp<11.3 || $hgbtmp>15.3)))
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".$hgbtmp."</font> g/dl </td>\n";
					}
					else
					{
						echo "<td>".trim($hgbtmp)."</font> g/dl </td>\n";
					}
					echo "	<td><font style = 'color:#1C19FF;font-weight:800'>(男：12.3~18.3 女：11.3~15.3)</font></td>\n";	
					echo "</tr>\n";
					
					echo "<tr>\n";					
					echo "	<td>血鐵<br>Fe</td>\n";	
					if(trim($USER['fe']) < 50 || trim($USER['fe']) > 160)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['fe'])."</font> mg/dl </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['fe'])."</font> mg/dl </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(50~160)</font></td>";
					echo "</tr>\n";
					
					echo "<tr>\n";					
					echo "	<td>血容比<br>Hct</td>\n";
					$hcttmp = trim($USER['hct']);
					if(($type==1 && ($hcttmp<40 || $hcttmp>52))||($type==0 && ($hcttmp<37 || $hcttmp>47)))
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".$hcttmp."</font> % </td>\n";
					}
					else
					{
						echo "<td>".trim($hcttmp)."</font> % </td>\n";
					}
					echo "	<td><font style = 'color:#1C19FF;font-weight:800'>(男：40~52 女：37~47)</font></td>\n";	
					echo "</tr>\n";
		
					echo "<tr>\n";					
					echo "	<td>鐵總結合能力<br>TIBC</td>\n";	
					if(trim($USER['tibc']) < 175 || trim($USER['tibc']) > 375)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['tibc'])."</font> mg/dl </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['tibc'])."</font> mg/dl </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(175~375)</font></td>";
					echo "</tr>\n";

					echo "<tr>\n";						
					echo "	<td>尿酸<br>Ua</td>\n";	
					if(trim($USER['ua']) < 2.4 || trim($USER['ua']) > 7.2)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['tibc'])."</font> mg/dl </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['ua'])."</font> mg/dl </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(2.4~7.2)</font></td>";
					echo "</tr>\n";
					
					echo "<tr>\n";						
					echo "	<td>血清轉鐵蛋白<br>Ferritin</td>\n";	
					if(trim($USER['ferritin']) < 10 || trim($USER['ferritin']) > 300)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['ferritin'])."</font> mg/dl </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['ferritin'])."</font> mg/dl </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(10~300)</font></td>";
					echo "</tr>\n";
					
					echo "<tr>\n";						
					echo "	<td>膽固醇<br>Cholesterol</td>\n";	
					if(trim($USER['cholesterol']) < 0 || trim($USER['cholesterol']) > 200)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['cholesterol'])."</font> mg/dl </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['cholesterol'])."</font> mg/dl </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(0~200)</font></td>";
					echo "</tr>\n";
					
					echo "<tr>\n";						
					echo "	<td>中性脂肪(三酸甘油)<br>Triglyceride</td>\n";	
					if(trim($USER['triglyceride']) < 0 || trim($USER['triglyceride']) > 200)
					{
						echo "<td><font style = 'color:#FA0300;font-weight:800'>".trim($USER['triglyceride'])."</font> mg/dl </td>\n";
					}
					else
					{
						echo "<td>".trim($USER['triglyceride'])."</font> mg/dl </td>\n";
					}
					echo "<td><font style = 'color:#1C19FF;font-weight:800'>(0~200)</font></td>";
					echo "</tr>\n";						

					echo "<tr>\n";
					echo "	<td>\n";
					echo "	<div style = 'padding-left:100px'>\n";
					echo "	<input type = 'hidden' id = 'step' name = 'step' value = '4'>\n";
					echo "	<input type = 'hidden' id = 'userid' name = 'userid' value = '" . trim($USER['userid']) . "'>\n";
					echo "	<input type = 'submit' name = 'next' id = 'next' value = '下一頁'>\n";
					echo "	</td>\n";
					echo "</tr>\n";
					echo "</table>\n";
					echo "</form>\n";
					break;
					
				case '4':
				
						$GFR = trim($USER['gfr']);

						echo "<table width = '95%' border = '0' cellpadding = '4' cellspacing = '1' align = 'center'>\n";
						echo "<tr>\n";
						echo "  <td colspan = '2'><div class = 'title3'>\n";
						if (!$GFR)
						{
							echo "\"血中肌肝酸\"尚未輸入，無法計算腎絲球過濾率(GFR)";
						}else if ( $GFR >= 90)
						{
							echo "你的慢性腎臟病是\"第一期\"";
						}else if ( $GFR >= 60 && $GFR < 90)
						{
							echo "你的慢性腎臟病是\"第二期\"";
						}else if ( $GFR >= 30 && $GFR < 60)
						{
							echo "你的慢性腎臟病是\"第三期\"";
						}else if ( $GFR >= 15 && $GFR < 30)
						{
							echo "你的慢性腎臟病是\"第四期\"";
						}else if ( $GFR < 15)
						{
							echo "你的慢性腎臟病是\"第四期\"";
						}
						echo "</div>\n";
						echo "<div>男性：GRF = 186 x Scr<sup>-1.154</sup> x Age<sup>-0.203</sup> x 1</div>\n";
						echo "<div>女性：GRF = 186 x Scr<sup>-1.154</sup> x Age<sup>-0.203</sup> x 0.742</div></td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						echo "	<td colspan = '2'>GFR腎絲球過濾率：<font style = 'color:#FF0000;font-weight:700;'>" . round($GFR, 2) . "</font>\n";
						echo "	<p>慢性腎臟病第一期 (GFR ≧ 90ml/min/1.73m)<br>\n";
						echo "	慢性腎臟病第二期 (GFR60~89ml/min/1.73 m)<br>\n";
						echo "	慢性腎臟病第三期 (GFR30~59ml/min/1.73 m)<br>\n";
						echo "	慢性腎臟病第四期 (GFR15~29ml/min/1.73 m2)<br>\n";
						echo "	慢性腎臟病第五期 (GFR＜15ml/min/1.73 m2)</p></td>\n";
						echo "</tr>\n";
						echo "</table>\n";
					break;							
					}
				}
			}*/
			?>
<!--＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
<!--＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
			</td>
			<td class = 'rightmenu' valign = 'top'><?PHP include_once "right_menu.php";?></td>
		</tr>
		</table>
		</td>
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