<?PHP
include "config.php";

header_print(true);   //載入header檔

?>
<body>
	<?PHP include_once ROOT_PATH . '/menubar.php';?>
	<div class="container">	
	<div class="row">
	<!--左邊的-->
	<div class="col-md-3 visible-lg visible-md">
		<table>
		<tr>
			<td>
			<div class = 'fast_link'>
			<?PHP
			$nowL = array('首頁' => 'index.php', '認識食物' => 'food.php');
			echo show_path_url($nowL);
			?>
			
			</div>
			</td>
		</tr>
		<tr>
		</tr>
		</table>		
		<?PHP include_once ROOT_PATH . '/leftmenu2.php';?>

	</div>
	<!--中間的-->
	<div class="col-md-6 col-sm-8">
		<div class="row">
		<div class="panel panel-primary">
		  <div class="panel-heading">
			<h3 class="panel-title">查詢</h3>
		  </div>
		  <div class="panel-body">
			<form action = '" . ROOT_URL . "/food.php' method = 'post' id = 'searchform' name = 'searchform'>
			<div class="row">
				<div class="col-md-8">
				<input type = 'text' id = 'keyword' class="form-control input-sm" name = 'keyword' placeholder="請輸入食物名稱" onclick = 'this.value = ""'>
				</div>
				<div class="col-md-4">
				<a href="javascript:cksearch1()" type="button" class="btn btn-success btn-sm active" role="button">搜尋</a>
				</div>
			</div>
			</form>
		  </div>
		</div>		
		<div class="panel panel-success">
		  <div class="panel-heading">
			<h3 class="panel-title">食物列表</h3>
		  </div>
		<div class="panel-body">
		<form action = 'food.php?class=<?PHP echo $_GET['class'];?>&class2=<?PHP echo $_GET['class2'];?>' method = 'post' id = 'sort_form' name = 'sort_form'>
			<div class="row">
				<div class="col-md-12">
				排序依據：
				<select id = 'orderby' name = 'orderby'>
					<option value = 'ch_name' <?PHP if ($_POST['orderby'] == 'ch_name' || $_GET['orderby'] == 'ch_name') echo 'selected';?>>食物名稱</option>
					<option value = 'kg' <?PHP if ($_POST['orderby'] == 'kg' || $_GET['orderby'] == 'kg') echo 'selected';?>>重量</option>
					<option value = 'ch_k' <?PHP if ($_POST['orderby'] == 'ch_k' || $_GET['orderby'] == 'ch_k') echo 'selected';?>>熱量</option>
					<option value = 'ch_cholesterol' <?PHP if ($_POST['orderby'] == 'ch_cholesterol' || $_GET['orderby'] == 'ch_cholesterol') echo 'selected';?>>膽固醇</option>
					<option value = 'ch_fat' <?PHP if ($_POST['orderby'] == 'ch_fat' || $_GET['orderby'] == 'ch_fat') echo 'selected';?>>脂肪</option>
					<option value = 'ch_e' <?PHP if ($_POST['orderby'] == 'ch_e' || $_GET['orderby'] == 'ch_e') echo 'selected';?>>蛋白質</option>
					<option value = 'ch_carbohydrate' <?PHP if ($_POST['orderby'] == 'ch_carbohydrate' || $_GET['orderby'] == 'ch_carbohydrate') echo 'selected';?>>醣類</option>
					<option value = 'ch_potassium' <?PHP if ($_POST['orderby'] == 'ch_potassium' || $_GET['orderby'] == 'ch_potassium') echo 'selected';?>>鉀</option>
					<option value = 'ch_sodium' <?PHP if ($_POST['orderby'] == 'ch_sodium' || $_GET['orderby'] == 'ch_sodium') echo 'selected';?>>鈉</option>
					<option value = 'ch_calcium' <?PHP if ($_POST['orderby'] == 'ch_calcium' || $_GET['orderby'] == 'ch_calcium') echo 'selected';?>>鈣</option>
					<option value = 'ch_phosphorous' <?PHP if ($_POST['orderby'] == 'ch_phosphorous' || $_GET['orderby'] == 'ch_phosphorous') echo 'selected';?>>磷</option>
					<option value = 'ch_mg' <?PHP if ($_POST['orderby'] == 'ch_mg' || $_GET['orderby'] == 'ch_mg') echo 'selected';?>>鎂</option>
					<option value = 'ch_iron' <?PHP if ($_POST['orderby'] == 'ch_iron' || $_GET['orderby'] == 'ch_iron') echo 'selected';?>>鐵</option>
					<option value = 'ch_zinc' <?PHP if ($_POST['orderby'] == 'ch_zinc' || $_GET['orderby'] == 'ch_zinc') echo 'selected';?>>鋅</option>
				</select>
				<select id = 'sort' name = 'sort'>
					<option value = 'ASC' <?PHP if ($_POST['sort'] == 'ASC' || $_GET['sort'] == 'ASC') echo 'selected';?>>由低到高</option>
					<option value = 'DESC' <?PHP if ($_POST['sort'] == 'DESC' || $_GET['sort'] == 'DESC') echo 'selected';?>>由高到低</option>
				</select>
					<input type = 'submit' id = 'order_sort' name = 'order_sort' value = '排序'>
				</div>
			</div>
		</form>
		<?PHP
			$start_num = (!$_GET['page'])? '0' : $_GET['page'] * PAGE_NUM; //SQL開始筆數
			$page = ($_GET['page'])? $_GET['page'] : 0;                    //設定目前頁數
			$i = 1;

			$orderby    = ( trim($_POST['orderby']) != '' )? $_POST['orderby'] : $_GET['orderby'];
			$sort       = ( trim($_POST['sort']) != '' )? $_POST['sort'] : $_GET['sort'];
			$order_name = ( trim($orderby) != '' )? $orderby : 'ch_name';           //設定排序欄位
			$sort       = ( trim($sort) != '' )? $sort : 'ASC';                     //設定排序規則
			$ORDER_BY   = ' ORDER BY ' . $order_name . ' ' . $sort;

			if ( trim($_POST['keyword']) != '' || $_GET['type'] == 'search')
			{
				$key = ( trim($_POST['keyword']) != '' )? trim($_POST['keyword']) : trim(rawurldecode($_GET['keyword']));  //查詢關鍵字
				$food_total = countSQL('choose_food', 'ch_id', "WHERE ch_name LIKE '%" . $key . "%'");   //計算該類別的食物總數
				$total_page = ceil($food_total / PAGE_NUM);                    //計算總共頁數
				$sql = "SELECT * FROM choose_food WHERE ch_name LIKE '%" . $key . "%' " . $ORDER_BY . " LIMIT " . $start_num . "," . PAGE_NUM;
				
			}else{
				
				$sqlwhe = " WHERE ";
				$sqlwhe .= ($_GET['class'])? "ch_kind = '" . $_GET['class'] . "'" : "ch_kind = 'food1'";
				$sqlwhe .= ( trim($_GET['class2']) != '')? " AND ch_kind2 = '" . rawurldecode($_GET['class2']) . "'" : '';
				$food_total = countSQL('choose_food', 'ch_id', $sqlwhe);   //計算該類別的食物總數
				$total_page = ceil($food_total / PAGE_NUM);                    //計算總共頁數
				$sql = "SELECT * FROM choose_food " . $sqlwhe . $ORDER_BY . " LIMIT " . $start_num . "," . PAGE_NUM;
			}
			$result = mysql_query($sql);
			while ( $row = mysql_fetch_array($result) )
			{
				//單品項食物熱量佔一日所需的%數
				if($USER['need_cal']==""){
				}
				else if ($row['ch_k'] !=="0"){
				$kcal_spend = (($row['ch_k']*100)/$USER['need_cal']);				
				}
				else{
				
				$kcal_spend = 0;
				}
				echo "<div class=\"col-md-12\">\n"; 
				echo "<div class=\"media\">\n"; 
				echo "<a href=\"javascript:view_food(" . $row['ch_id'] . ",1)\" class=\"pull-left\">\n"; 
				echo "<img src=\"" . IMG_URL . "/" . $row['ch_image'] . "\" class=\"media-object img-rounded\" alt=\"Food's Image\" width = \"80\" height = \"80\">\n"; 
				echo "</a>\n"; 
				echo "<div class=\"media-body\">\n"; 
				echo "<h4 class=\"media-heading text-left\"><a href=\"javascript:view_food(" . $row['ch_id'] . ",1)\">".$row['ch_name']." </a><small>熱量:".$row['ch_k']."</small></h4>\n"; 
				echo "<div class=\"progress\">\n"; //占用熱量圖表
				echo "<div class=\"progress-bar progress-bar-warning progress-bar-striped active\" role=\"progressbar\" aria-valuenow=\"".round($kcal_spend)."\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ".round($kcal_spend)."%;\">".round($kcal_spend)."%</div>\n"; //占用熱量圖表
				echo "</div>"; //占用熱量圖表				
				echo "<table class=\"table table-condensed\">\n"; 
				echo "<tr>\n"; 
				echo "<td>重量</td>\n"; 
				echo "<td>".$row['kg']."</td>\n"; 
				echo "<td>膽固醇</td>\n"; 
				echo "<td>".round($row['ch_cholesterol'])."</td>\n"; 
				echo "<td>碳水化合物</td>\n"; 
				echo "<td>".round($row['ch_carbohydrate'])."</td>\n"; 
				echo "</tr>\n"; 
				echo "<tr>\n"; 
				echo "<td>脂肪</td>\n"; 
				echo "<td>".round($row['ch_fat'])."</td>\n"; 
				echo "<td>蛋白質</td>\n"; 
				echo "<td>".round($row['ch_e'])."</td>\n"; 
				echo "<td>鈉</td>\n"; 
				echo "<td>".round($row['ch_sodium'])."</td>\n"; 
				echo "</tr>\n"; 
				echo "</table>\n"; 
				echo "</div>\n"; 
				echo "</div>\n"; 
				echo "</div>\n";
				echo "<div class=\"col-md-12\"><hr></div>\n";
				
			$i++;
			}
		?>
		<?PHP
		if ( $food_total > PAGE_NUM )   //判斷資料庫中的資料是否大於每頁顯示數量
		{
			$href = ( trim($_POST['keyword'] != '') || $_GET['type'] == 'search' )? "type=search&keyword=" . rawurlencode(trim($key)) : "class=" . $_GET['class'] . "&class2=" . rawurlencode(trim($_GET['class2'])) . "&orderby=" . $orderby . "&sort=" . $sort;
			echo "<a href = '" . ROOT_URL . "/food.php?" . $href . "'>第一頁</a>";
			if ($page > 0)
			{
				$up = $page - 1;
				echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/food.php?" . $href . "&page=" . $up . "&orderby=" . $orderby . "&sort=" . $sort . "'>上一頁</a></span>";
			}
			if ($page < ($total_page - 1))
			{
				$next = $page + 1;
				echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/food.php?" . $href . "&page=" . $next . "&orderby=" . $orderby . "&sort=" . $sort . "'>下一頁</a></span>";
			}
			echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/food.php?" . $href . "&page=" . ($total_page - 1) . "&orderby=" . $orderby . "&sort=" . $sort . "'>最後一頁</a></span>";
		}
		?>
		</div>
		</div>		
		</div>
	</div>
	<div class="col-md-3 col-sm-4"><?PHP include_once "right_menu.php";?></div><br>		
    </div> <!-- /container -->
	<?PHP include_once ROOT_PATH . '/footer.php';?>