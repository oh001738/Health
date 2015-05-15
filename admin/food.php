<?PHP

//========================================================修改食物===========================================================
if ($_POST['action'] == 'edit' && $_POST['ch_id'] != '')
{
	$error    = false;
	$pic      = $_FILES["upimg"];
	
	$pic_type = $OnlyFileType;                    //只允許上傳圖檔
	$temp_arr = explode(".",$pic['name']); 
	$name_2   = strtolower(end($temp_arr));	      //副檔名
	$new_name = time() . '.' . $name_2;
	if ( trim($pic['name']) != '' )
	{
		if (in_array($name_2,$pic_type))
		{
			$srcSize = getImageSize($pic["tmp_name"]); //讀圖片大小
			//套入浮水印寫入檔案
			if ( GDcopyR(ROOT_PATH . '/img/LOGO.png', $pic["tmp_name"] , ROOT_PATH . "/img/". $new_name, $srcSize[0], $srcSize[1], 100, 0.2) )
			{
				$ch_image = $new_name;
				@unlink(ROOT_PATH . "/img/". base64_decode($_POST['oldimg']));   //刪除過期圖檔
			}else{
				showMsg("上傳圖片失敗，請洽系統管理員!!");
				$error = true;
			}
			
		}else{
			showMsg("上傳檔案副檔名限定：jpg、jpeg、gif、png 上傳圖片失敗!!");
			$error = true;
		}
	}else{
		$ch_image = base64_decode($_POST['oldimg']);
	}

	if ( $error == false)
	{
		//判斷是否要存入食物類別2
		$chKind2 = ($_POST['ck_kind2'] == '1')? ckString($FOODTYPE2[$_POST['ch_kind2']], 30) : '';
		$sql = "UPDATE choose_food SET ";
		$sql .= "ch_kind = '" . ckString($_POST['ch_kind'], 30) . "' , ";
		$sql .= "ch_kind2 = '" . $chKind2 . "' , ";
		$sql .= "ch_image = '" . ckString($ch_image, 255) . "' , ";
		$sql .= "ch_name = '" . ckString($_POST['ch_name'], 20) . "' , ";
		$sql .= "kg = '" . ckString($_POST['kg'], 10) . "' , ";
		$sql .= "ch_k = '" . ckString($_POST['ch_k'], 10) . "' , ";
		$sql .= "ch_cholesterol = '" . ckString($_POST['ch_cholesterol'], 10) . "' , ";
		$sql .= "ch_fat = '" . ckString($_POST['ch_fat'], 10) . "' , ";
		$sql .= "ch_e = '" . ckString($_POST['ch_e'], 10) . "' , ";
		$sql .= "ch_carbohydrate = '" . ckString($_POST['ch_carbohydrate'], 10) . "' , ";
		$sql .= "ch_potassium = '" . ckString($_POST['ch_potassium'], 10) . "' , ";
		$sql .= "ch_sodium = '" . ckString($_POST['ch_sodium'], 10) . "' , ";
		$sql .= "ch_calcium = '" . ckString($_POST['ch_calcium'], 10) . "' , ";
		$sql .= "ch_phosphorous = '" . ckString($_POST['ch_phosphorous'], 10) . "' , ";
		$sql .= "ch_mg = '" . ckString($_POST['ch_mg'], 10) . "' , ";
		$sql .= "ch_iron = '" . ckString($_POST['ch_iron'], 10) . "' , ";
		$sql .= "ch_zinc = '" . ckString($_POST['ch_zinc'], 10) . "' ";
		$sql .= "WHERE ch_id = '" . $_POST['ch_id'] . "'";

		//存入食物元素
		$fe_id = $_POST['food_id'];
		//先刪除食物元素在新增
		$del_fe_sql = "DELETE FROM element_food_conn WHERE food_id = '" . $_POST['ch_id'] . "'";
		if (mysql_query($del_fe_sql))
		{
			if ( trim($fe_id) != '' )
			{
				foreach ($fe_id as $element_id)
				{
					$insert_fe_sql = "INSERT INTO element_food_conn (food_id, element_id)VALUES('" . $_POST['ch_id'] . "', '" . $element_id . "')";
					mysql_query($insert_fe_sql);
				}
			}
		}
	}

	if ( mysql_query($sql) )
	{
		showMsg('修改完成');
		actionlog(13,$USER['username']);
	}else{
		showMsg('修改失敗，請洽系統管理員!!');
	}
}

//========================================================新增食物===========================================================
if ( $_POST['action'] == 'add' )
{
	$error    = false;
	$pic      = $_FILES["upimg"];
	$pic_type = $OnlyFileType;                    //只允許上傳圖檔
	$temp_arr = explode(".",$pic['name']); 
	$name_2   = strtolower(end($temp_arr));	      //副檔名
	$new_name = time() . '.' . $name_2;
	if ( $pic['name'] != '' )
	{
		if (in_array($name_2,$pic_type))
		{
			$srcSize = getImageSize($pic["tmp_name"]); //讀圖片大小
			//套入浮水印寫入檔案
			if ( GDcopyR(ROOT_PATH . '/img/LOGO.png', $pic["tmp_name"] , ROOT_PATH . "/img/". $new_name , $srcSize[0], $srcSize[1], 100, 0.2) )
			{
				$ch_image = $new_name;
			}else{
				showMsg("上傳圖片失敗，請洽系統管理員!!");
				$error = true;
			}
			
		}else{
			showMsg("上傳檔案副檔名限定：jpg、jpeg、gif、png 上傳圖片失敗!!");
			$error = true;
		}
	}

	if ( $error == false )
	{
		//判斷是否要存入食物類別2
		$chKind2 = ($_POST['ck_kind2'] == '1')? ckString($FOODTYPE2[$_POST['ch_kind2']], 30) : '';
		
		$sql = "INSERT choose_food (ch_kind, ch_kind2, ch_image, ch_name, kg, ch_k, ch_cholesterol, ch_fat, ch_e, ch_carbohydrate, ch_potassium, ch_sodium, ch_calcium, ch_phosphorous, ch_mg, ch_iron, ch_zinc)VALUES(";
		$sql .= "'" . ckString($_POST['ch_kind'], 30) . "' , ";
		$sql .= "'" . $chKind2 . "' , ";
		$sql .= "'" . ckString($ch_image, 255) . "' , ";
		$sql .= "'" . ckString($_POST['ch_name'], 20) . "' , ";
		$sql .= "'" . ckString($_POST['kg'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['ch_k'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['ch_cholesterol'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['ch_fat'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['ch_e'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['ch_carbohydrate'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['ch_potassium'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['ch_sodium'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['ch_calcium'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['ch_phosphorous'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['ch_mg'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['ch_iron'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['ch_zinc'], 10) . "')";
		if ( mysql_query($sql) )
		{
			showMsg('新增完成');
			actionlog(11,$USER['username']);
		}else{
			showMsg('新增完成，請洽系統管理員!!');
		}
	}
}
//===============================================================================================================================
//刪除食物
if ($op == 'food' && $_GET['action'] == 'delete' && $_GET['id'] != '')   
{
	if (trim($_GET['img']) != ''){ @unlink(IMG_PATH . "/" . base64_decode($_GET['img']) ); }
	$sql = "DELETE FROM choose_food WHERE ch_id = '" . $_GET['id'] . "'";
	if ( mysql_query($sql) )
	{
		showMsg('刪除成功!!');
		actionlog(12,$USER['username']);
		reDirect(ROOT_URL . '/admin/admin.php?op=' . $_GET['op'] . '&page=' . $_GET['page']);
	}else{
		showMsg('刪除失敗，請洽系統管理員!!');
		reDirect(ROOT_URL . '/admin/admin.php?op=' . $_GET['op'] . '&page=' . $_GET['page']);
	}
}

//===============================================================================================================================
//刪除圖片
if ( $_GET['action'] == 'delimg' && $_GET['img'] != '' )
{
	if ( unlink(IMG_PATH . "/" . base64_decode($_GET['img']) ) )
	{
		if ( mysql_query("UPDATE choose_food SET ch_image = '' WHERE ch_id = '" . $_GET['id'] . "'") )
		{
			showMsg('刪除圖片成功!!');
			reDirect(base64_decode($_GET['getback']));
		}else{
			showMsg('刪除圖片失敗，請洽系統管理員');
			reDirect(base64_decode($_GET['getback']));
		}
	}else{
		showMsg('刪除圖片失敗，請洽系統管理員!!');
		reDirect(base64_decode($_GET['getback']));
	}
}

//===============================================================================================================================
if ( $op == 'food' && ( $_GET['action'] == 'edit' || $_GET['action'] == 'add' ) )
{
	$backurl = base64_decode($_GET['back']);
	if ($_GET['action'] == 'edit')
	{
		$row = mysql_fetch_array( mysql_query("SELECT * FROM choose_food WHERE ch_id = '" . $_GET['id'] . "'") );
		echo "<div class = 'title' style = 'width:400px'>修改 - " . $row['ch_name'] . "</div><div style = 'padding-bottom:5px'></div>\n";
	}else{
		echo "<div class = 'title' style = 'width:150px'>新增食物</div><div style = 'padding-bottom:5px'></div>\n";
	}
	echo "<table border = '1' cellpadding = '4' cellspacing = '1' width = '80%' style = 'border-collapse:collapse' bordercolor = '#AAAAAA'>\n";
	echo "<form action = '" . ROOT_URL . "/admin/admin.php?op=" . $op . "&action=" . $action . "&id=" . $_GET['id'] . "&back=" . $_GET['back'] . "' id = 'foodform' name = 'foodform' method = 'post' enctype = 'multipart/form-data'>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right' width = '20%'>食物圖片</td>\n";
	echo "	<td class = 'text13px'>\n";
	if ($_GET['action'] == 'edit' && trim($row['ch_image']) != '')
	{
		echo "	<img src = '" . IMG_URL . "/" . $row['ch_image'] . "' width = '300'>\n";
		echo "  <br><a href = '" . ROOT_URL . "/admin/admin.php?op=" . $op . "&action=delimg&id=" . $_GET['id'] . "&back=" . $_GET['back'] . "&img=" . base64_encode($row['ch_image']) . "&getback=" . base64_encode(getenv("REQUEST_URI")) . "' onclick = 'return confirm(\"確定要刪除嗎?\")'>刪除圖片</a><br>\n";
	}
	echo "  <input type = 'file' id = 'upimg' name = 'upimg'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>所屬類別</td>\n";
	echo "	<td class = 'text13px'><select id = 'ch_kind' name = 'ch_kind' onchange = 'check_kind()'>\n";
	foreach ($FOODTYPE as $key => $value)
	{
		$selected = ($row['ch_kind'] == $key)? 'selected' : '';
		echo "<option value = '" . $key . "' " . $selected . ">" . $value . "</option>\n";
	}
	echo "	</select>\n";
	$display = ($row['ch_kind'] == 'food7')? 'block' : 'none';
	echo "	<div id = 'ch_kind2' name = 'ch_kind2' style = 'padding-top:5px;display:" . $display . "'><select id = 'ch_kind2' name = 'ch_kind2'>\n";
	foreach ($FOODTYPE2 as $key => $value)
	{
		$selected = ($row['ch_kind2'] == $value)? 'selected' : '';
		echo "<option value = '" . $key . "' " . $selected . ">" . $value . "</option>\n";
	}
	echo "	</select></div>\n";
	echo "	</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>食材元素</td>\n";
	echo "	<td class = 'text13px'>\n";
	foreach ( $FOODTYPE as $key => $value )
	{
		echo "<span style = 'padding-right:10px'><a href = 'javascript:open_food_element(\"" . $key . "\")'>" . $value . "</a></span>\n";
	}
	echo "	<div id = 'foodlist' name = 'foodlist'>\n";
	if ($_GET['action'] == 'edit' && trim($_GET['id']) != '')
	{
		$fsql = "SELECT * FROM element_food_conn WHERE food_id = '" . $row['ch_id'] . "' ORDER BY id";
		$fresult = mysql_query($fsql);
		while ( $frow = mysql_fetch_array($fresult) )
		{
			$frow = get_value('food_element', "WHERE id = '" . $frow['element_id'] . "'");
			$k_v   = ( trim($frow['k']) == '')? '0' : $frow['k'];                       //熱量
			$cho_v = ( trim($frow['cholesterol']) == '')? '0' : $frow['cholesterol'];   //膽固醇
			$fat_v = ( trim($frow['fat']) == '')? '0' : $frow['fat'];                   //脂肪
			$e_v   = ( trim($frow['e']) == '')? '0' : $frow['e'];                       //蛋白質
			$car_v = ( trim($frow['carbohydrate']) == '')? '0' : $frow['carbohydrate']; //醣類
			$pot_v = ( trim($frow['potassium']) == '')? '0' : $frow['potassium'];       //鉀
			$sod_v = ( trim($frow['sodium']) == '')? '0' : $frow['sodium'];             //鈉
			$cal_v = ( trim($frow['calcium']) == '')? '0' : $frow['calcium'];           //鈣
			$pho_v = ( trim($frow['phosphorous']) == '')? '0' : $frow['phosphorous'];   //磷
			$mg_v  = ( trim($frow['mg']) == '')? '0' : $frow['mg'];                     //鎂
			$iro_v = ( trim($frow['iron']) == '')? '0' : $frow['iron'];                 //鐵
			$zin_v = ( trim($frow['zinc']) == '')? '0' : $frow['zinc'];                 //鋅

			$k[]   = $frow['k'];           //熱量
			$cho[] = $frow['cholesterol']; //膽固醇
			$fat[] = $frow['fat'];         //脂肪
			$e[]   = $frow['e'];           //蛋白質
			$car[] = $frow['carbohydrate'];//醣類
			$pot[] = $frow['potassium'];   //鉀
			$sod[] = $frow['sodium'];      //鈉
			$cal[] = $frow['calcium'];     //鈣
			$pho[] = $frow['phosphorous']; //磷
			$mg[]  = $frow['mg'];          //鎂
			$iro[] = $frow['iron'];        //鐵
			$zin[] = $frow['zinc'];        //鋅

			echo "<div style = 'padding-top:5px' id = 'food_" . $frow['id'] . "' name = 'food_" . $frow['id'] . "'>\n";
			echo "<a href = 'javascript:delfood(\"food_" . $frow['id'] . "\",\"" . $k_v . "\",\"" . $cho_v . "\",\"" . $fat_v . "\",\"" . $e_v . "\",\"" . $car_v . "\",\"" . $pot_v . "\",\"" . $sod_v . "\",\"" . $cal_v . "\",\"" . $pho_v . "\",\"" . $mg_v . "\",\"" . $iro_v . "\",\"" . $zin_v . "\")' title = '刪除' onclick = 'return confirm(\"確定要刪除嗎?\")'>\n";
			echo $frow['name'] . " <img src = '" . ROOT_URL . "/img/delete.gif' border = '0'></a><input type = 'hidden' id = 'food_id[]' name = 'food_id[]' value = '" . $frow['id'] . "'></div>\n";
		}
	}
	$k_sum   = ($_GET['action'] == 'edit')? @round(array_sum($k), 3)   : '0'; //熱量
	$cho_sum = ($_GET['action'] == 'edit')? @round(array_sum($cho), 3) : '0'; //膽固醇
	$fat_sum = ($_GET['action'] == 'edit')? @round(array_sum($fat), 3) : '0'; //脂肪
	$e_sum   = ($_GET['action'] == 'edit')? @round(array_sum($e), 3)   : '0'; //蛋白質
	$car_sum = ($_GET['action'] == 'edit')? @round(array_sum($car), 3) : '0'; //醣類
	$pot_sum = ($_GET['action'] == 'edit')? @round(array_sum($pot), 3) : '0'; //鉀
	$sod_sum = ($_GET['action'] == 'edit')? @round(array_sum($sod), 3) : '0'; //鈉
	$cal_sum = ($_GET['action'] == 'edit')? @round(array_sum($cal), 3) : '0'; //鈣
	$pho_sum = ($_GET['action'] == 'edit')? @round(array_sum($pho), 3) : '0'; //磷
	$mg_sum  = ($_GET['action'] == 'edit')? @round(array_sum($mg), 3)  : '0'; //鎂
	echo "	</div>\n";
	echo "	</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>名稱</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'ch_name' name = 'ch_name' value = '" . $row['ch_name'] . "' style = 'width:200px'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>重量</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'kg' name = 'kg' value = '" . $row['kg'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>熱量</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'ch_k' name = 'ch_k' value = '" . $row['ch_k'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>膽固醇</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'ch_cholesterol' name = 'ch_cholesterol' value = '" . $row['ch_cholesterol'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>脂肪</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'ch_fat' name = 'ch_fat' value = '" . $row['ch_fat'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>蛋白質</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'ch_e' name = 'ch_e' value = '" . $row['ch_e'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>醣類</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'ch_carbohydrate' name = 'ch_carbohydrate' value = '" . $row['ch_carbohydrate'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>鉀</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'ch_potassium' name = 'ch_potassium' value = '" . $row['ch_potassium'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>鈉</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'ch_sodium' name = 'ch_sodium' value = '" . $row['ch_sodium'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>鈣</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'ch_calcium' name = 'ch_calcium' value = '" . $row['ch_calcium'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>磷</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'ch_phosphorous' name = 'ch_phosphorous' value = '" . $row['ch_phosphorous'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>鎂</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'ch_mg' name = 'ch_mg' value = '" . $row['ch_mg'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>鐵</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'ch_iron' name = 'ch_iron' value = '" . $row['ch_iron'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>鋅</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'ch_zinc' name = 'ch_zinc' value = '" . $row['ch_zinc'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td colspan = '2' align = 'center'><input type = 'hidden' id = 'burl' name = 'burl' value = '" . $_GET['back'] . "'>\n";
	if ($_GET['action'] == 'edit')
	{
		$ckKind2 = ($row['ch_kind'] == 'food7')? '1' : '0';     //判斷食物類別2是否要存入資料庫
		echo "	<input type = 'hidden' id = 'oldimg' name = 'oldimg' value = '" . base64_encode($row['ch_image']) . "'>\n";
		echo "  <input type = 'hidden' id = 'ck_kind2' name = 'ck_kind2' value = '" . $ckKind2 . "'>\n";
		echo "  <input type = 'hidden' id = 'action' name = 'action' value = 'edit'>\n";
		echo "	<input type = 'hidden' id = 'ch_id' name = 'ch_id' value = '" . $row['ch_id'] . "'>\n";
		echo "	<input type = 'button' id = 'update' name = 'update' value = '修改' onclick = 'check_form()'>\n";
	}else{
		echo "  <input type = 'hidden' id = 'ck_kind2' name = 'ck_kind2' value = '0'>\n";
		echo "  <input type = 'hidden' id = 'action' name = 'action' value = 'add'>\n";
		echo "	<input type = 'button' id = 'update' name = 'update' value = '新增' onclick = 'check_form()'>\n";
	}
	echo "	<span style = 'padding-left:10px'><input type = 'button' id = 'back' name = 'back' value = '回上一頁' onclick = 'location.href=\"" . $backurl . "\"'></span></td>\n";
	echo "</tr>\n";
	echo "</form>\n";
	echo "</table>\n";
}
elseif ( $op == 'food' && ( $_GET['action'] == 'seepic') )
{
	$backurl = base64_decode($_GET['back']);
	$row = mysql_fetch_array( mysql_query("SELECT * FROM choose_food WHERE ch_id = '" . $_GET['id'] . "'") );
	
	echo "<div class = 'title' style = 'width:150px'>食物圖片</div><div style = 'padding-bottom:5px'></div><br>";
	echo "<div>".$row['ch_name']."</div>";
	if($row['ch_image']!='')
	{
		echo "<div><img src = '" . IMG_URL . "/" . $row['ch_image'] . "' width = '300'></div>";
	}
	else
	{
		echo "<div><table border=1 width=300 height=300><tr><td align=center>N/A</td></tr></table></div>";
	}
	
	echo "<div><input type = 'button' id = 'back' name = 'back' value = '回上一頁' onclick = 'location.href=\"" . $backurl . "\"'></div>";
}
//============================================================查詢食物==============================================================
else if ($op == 'food')
{
?>
<style type="text/css">
<!--
.style2 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
	<?php
	    echo "<table border = '0' cellpadding = '4' cellspacing = '1' width = '95%' valign = 'top'>\n";
  	 	echo "<form action = '" . ROOT_URL . "/admin/admin.php?op=food' id = 'searchform' name = 'searchform' method = 'post'>\n";
	    echo "<tr>\n";
		if($USER['power'] == '1' ||$USER['power'] == '3')
		{
		echo "  <td><div style = 'width:110px'><div class = 'title'>維護食物資料</div></div></td>\n";	
		}
   		else
		{
		echo "  <td><div style = 'width:110px'><div class = 'title'>檢視食物資料</div></div></td>\n";
		}
	  	echo "  <td align = 'right'>\n";
		echo "<select id = 'type' name = 'type' onChange=Javascript:changelist();>\n";
		echo "<option selected value=0>請選擇</option>\n";
		echo "<option value = 'kind'>類別</option>\n";
		echo "<option value = 'ch_name'>名稱</option>\n";
		echo "<option value = 'kg'> 重量</option>\n";
		echo "<option value = 'ch_k'>熱量</option>\n";
		echo "  </select>\n";
		echo "<span id=searchlist></span>";
	    //echo "  <input type = 'text' id = 'keyword' name = 'keyword' style = 'width:100px'>\n";
   		echo "  <input type = 'hidden' id = 'action' name = 'action' value = 'search'>\n";
	    echo "  <input type = 'submit' id = 'search' name = 'search' value = '查詢食物'>\n";
		if($USER['power'] == '1' || $USER['power'] == '3')
		{
			echo "  <input type = 'button' id = 'addfood' name = 'addfood' value = '新增食物' onclick = 'location.href=\"admin.php?op=".$op."&action=add&back=" . base64_encode(getenv("REQUEST_URI")) . "\"'></td>\n";
		}
	    
 	    echo "</tr>\n";
    	echo "</form>\n";
	    echo "</table>\n";
		
		echo "<table border = '1' cellpadding = '2' cellspacing = '1' width = '100%' style = 'border-collapse:collapse' bordercolor = '#FFE375'>";
		echo "<tr bgcolor = '#EEEEEE'>";
		echo "<td align = 'center' bgcolor='#FFCC00' class = 'text13px style2'>所屬類別</td>";
		echo "<td align = 'center' bgcolor='#FFCC00' class = 'text13px style2'>名稱</td>";
		echo "<td align = 'center' bgcolor='#FFCC00' class = 'text13px style2'>重量</td>";
		echo "<td align = 'center' bgcolor='#FFCC00' class = 'text13px style2'>熱量</td>";
		echo "<td align = 'center' bgcolor='#FFCC00' class = 'text13px style2'>膽固醇</td>";
		echo "<td align = 'center' bgcolor='#FFCC00' class = 'text13px style2'>脂肪</td>";
		echo "<td align = 'center' bgcolor='#FFCC00' class = 'text13px style2'>蛋白質</td>";
		echo "<td align = 'center' bgcolor='#FFCC00' class = 'text13px style2'>醣類</td>";
		echo "<td align = 'center' bgcolor='#FFCC00' class = 'text13px style2'>鉀</td>";
		echo "<td align = 'center' bgcolor='#FFCC00' class = 'text13px style2'>鈉</td>";
		echo "<td align = 'center' bgcolor='#FFCC00' class = 'text13px style2'>鈣</td>";
		echo "<td align = 'center' bgcolor='#FFCC00' class = 'text13px style2'>磷</td>";
		echo "<td align = 'center' bgcolor='#FFCC00' class = 'text13px style2'>鎂</td>";
		if($USER['power'] == '1' || $USER['power'] == '3')
		{
			echo "<td align = 'center' bgcolor='#FFCC00' class = 'text13px style2'>修改</td>";
			echo "<td align = 'center' bgcolor='#FFCC00' class = 'text13px style2'>刪除</td>";
		}
		if($USER['power'] == '2')
		{
			echo "<td align = 'center' bgcolor='#FFCC00' class = 'text13px style2'>圖片</td>";
		}
		echo "</tr>";
		
	
		
		if($type=='kind')
		{			
			if($keyword=='food1'||$keyword=='food2'||$keyword=='food3'||$keyword=='food4'||$keyword=='food5'||$keyword=='food6')
			{
				$type='ch_kind';
								
			}
			else
			{
				$type='ch_kind2';
				
			}
			//$keyword = $kindname;
		}	
		
		if ( $action == 'search' )
    	{
			if ( trim($keyword) != '')
			{
				if(trim($type) == 'ch_kind')
				{
					$sqlwhe = " WHERE ch_kind = '" . $keyword . "'";
					//$kind='ch_kind';					
				}
				elseif(trim($type) == 'ch_kind2')
				{
					$sqlwhe = " WHERE ch_kind2 = '" . $keyword . "'";
					//$kind='ch_kind2';
				}
				elseif(trim($type) == 'ch_name')
				{
					$sqlwhe = " WHERE ch_name LIKE '%" . $keyword . "%'";
				}
				else
				{
					if ( trim($keyword) != '' && trim($keyword) != 0)
					{
						$sqlwhe = " WHERE " . $type . " LIKE '%" . $keyword . "%'";
					}
					elseif(trim($keyword) ==0)
					{
						$sqlwhe = " WHERE " . $type . " =0";
					}
				}
			}			
    	}
	
	$action  = (trim($_GET['action']) == '')? $_POST['action'] : $_GET['action'];
	$type    = (trim($_GET['type']) == '')? $_POST['type'] : urldecode($_GET['type']);
	$kindname = (trim($_GET['kindname']) == '')? $_POST['kindname'] : urldecode($_GET['kindname']);	
	$keyword = (trim($_GET['keyword']) == '')? $_POST['keyword'] : urldecode($_GET['keyword']);		

    $food_total = countSQL('choose_food', 'ch_id', $sqlwhe);     //計算該類別的食物總數
    $page = ($_GET['page'])? $_GET['page'] : 0;   //設定目前頁數
    $total_page = ceil($food_total / PAGE_NUM);   //計算總共頁數
    $start_num = (!$_GET['page'])? '0' : $_GET['page'] * PAGE_NUM; //SQL開始筆數
    $sql = "SELECT * FROM choose_food" . $sqlwhe . " LIMIT " . $start_num . "," . PAGE_NUM;
    $result = mysql_query($sql);
    $i = 0;
					if($type=='kind')
		{			
			if($keyword=='food1'||$keyword=='food2'||$keyword=='food3'||$keyword=='food4'||$keyword=='food5'||$keyword=='food6')
			{
				$type='ch_kind';
								
			}
			else
			{
				$type='ch_kind2';
				
			}
			//$keyword = $kindname;
		}	
		while( $row = mysql_fetch_array($result) )
	{		
		$bgcolor = ($i % 2 == 0)? '#FFFFFF' : '#FFEAAA';
		$kind = ($row['ch_kind2'] == '')? $FOODTYPE[$row['ch_kind']] : $row['ch_kind2'];
		echo "<tr bgcolor = '" . $bgcolor . "'>\n";
		echo "	<td align = 'center' class = 'text13px'>" . $kind . "</td>\n";
		echo "	<td align = 'center' class = 'text13px'>" . $row['ch_name'] . "</td>\n";
		echo "	<td align = 'center' class = 'text13px'>" . $row['kg'] . " g</td>\n";
		echo "	<td align = 'center' class = 'text13px'>" . $row['ch_k'] . "</td>\n";
		echo "	<td align = 'center' class = 'text13px'>" . $row['ch_cholesterol'] . "</td>\n";
		echo "	<td align = 'center' class = 'text13px'>" . $row['ch_fat'] . "</td>\n";
		echo "	<td align = 'center' class = 'text13px'>" . $row['ch_e'] . "</td>\n";
		echo "	<td align = 'center' class = 'text13px'>" . $row['ch_carbohydrate'] . "</td>\n";
		echo "	<td align = 'center' class = 'text13px'>" . $row['ch_potassium'] . "</td>\n";
		echo "	<td align = 'center' class = 'text13px'>" . $row['ch_sodium'] . "</td>\n";
		echo "	<td align = 'center' class = 'text13px'>" . $row['ch_calcium'] . "</td>\n";
		echo "	<td align = 'center' class = 'text13px'>" . $row['ch_phosphorous'] . "</td>\n";
		echo "	<td align = 'center' class = 'text13px'>" . $row['ch_mg'] . "</td>\n";
		if($USER['power'] == '1' || $USER['power'] == '3')
		{
			echo "	<td align = 'center' class = 'text13px'><a href = 'admin.php?op=" . $op . "&action=edit&id=" . $row['ch_id'] . "&back=" . base64_encode(getenv("REQUEST_URI")) . "'>修改</a></td>\n";
			echo "	<td align = 'center' class = 'text13px'><a href = 'admin.php?op=" . $op . "&action=delete&id=" . $row['ch_id'] . "&page=" . $page . "&img=" . base64_encode($row['ch_image']) . "' onclick = 'return confirm(\"確定要刪除嗎?\")'>刪除</a></td>\n";
		}
		elseif($USER['power'] == '2')
		{
			echo "	<td align = 'center' class = 'text13px'><a href = 'admin.php?op=" . $op . "&action=seepic&id=" . $row['ch_id'] . "&back=" . base64_encode(getenv("REQUEST_URI")) . "'>檢視</td>\n";
		}
		echo "</tr>\n";
		$i++;
	}
	echo "</table>\n";
	?>
	<div style = 'padding-top:5px;padding-bottom:5px'>
	<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
	<tr>
		<td align = 'center' class = 'text13px'>        

<?PHP
 	if ( $action == 'search' )
	{
		if ( trim($keyword) != '' )
		{
			$link = '&action=search&type=' . urlencode($type) . '&keyword=' . urlencode($keyword);
		}
	}
	
	    $page = ($_GET['page'])? $_GET['page'] : 0;   //設定目前頁數
	    $total_page = ceil($food_total / PAGE_NUM);   //計算總共頁
		echo "總數:".$food_total."　頁數:".($page+1)."　總頁:".$total_page."<br>";
	
		if ( $food_total > PAGE_NUM )   //判斷資料庫中的資料是否大於每頁顯示數量
    {
        echo "<a href = '" . ROOT_URL . "/admin/admin.php?op=" . $op . $link . "'>第一頁</a>";
        if ($page > 0)
        {
            $up = $page - 1;
            echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/admin.php?op=" . $op . "&page=" . $up . $link . "'>上一頁</a></span>";
        }
        if ($page < ($total_page - 1))
        {
            $next = $page + 1;
            echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/admin.php?op=" . $op . "&page=" . $next . $link . "'>下一頁</a></span>";
        }
        echo "<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/admin.php?op=" . $op . "&page=" . ($total_page - 1) . $link. "'>最後一頁</a></span>";
    }
		?>
		</td>
	</tr>
	</table>
<?PHP
}	
?>
<!--//=============================================================================================================================-->


<script language = 'javascript'>
<!--

function open_food_element(food)
{
	window.open('add_food_element.php?foodid=' + food,'','height=500,width=500,toolbar=no,scrollbars=yes,resizable=no,top=100,left=100');
}

//刪除內含食材 fid Div名稱, k 熱量, cholesterol 膽固醇, fat 脂肪, e 蛋白質, carbohydrate 醣類, potassium 鉀, sodium 鈉, calcium 鈣, phosphorous 磷, mg 鎂, iron 鐵, zinc 鋅
function delfood(fid, k, cholesterol, fat, e, carbohydrate, potassium, sodium, calcium, phosphorous, mg, iron, zinc)
{
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

	document.getElementById(fid).outerHTML = ''; //刪除食材

	var ch_k   = document.getElementById('ch_k').value;            //熱量
	var ch_cho = document.getElementById('ch_cholesterol').value;  //膽固醇
	var ch_fat = document.getElementById('ch_fat').value;          //脂肪
	var ch_e   = document.getElementById('ch_e').value;            //蛋白質
	var ch_car = document.getElementById('ch_carbohydrate').value; //醣類
	var ch_pot = document.getElementById('ch_potassium').value;    //鉀
	var ch_sod = document.getElementById('ch_sodium').value;       //鈉
	var ch_cal = document.getElementById('ch_calcium').value;      //鈣
	var ch_pho = document.getElementById('ch_phosphorous').value;  //磷
	var ch_mg  = document.getElementById('ch_mg').value;           //鎂
	var ch_iro = document.getElementById('ch_iron').value;         //鐵
	var ch_zin = document.getElementById('ch_zinc').value;         //鋅

	document.getElementById('ch_k').value            = formatFloat( (parseFloat(ch_k)   - k), 3 );   //熱量取得小數第3位
	document.getElementById('ch_cholesterol').value  = formatFloat( (parseFloat(ch_cho) - cho), 3 ); //膽固醇取得小數第3位
	document.getElementById('ch_fat').value          = formatFloat( (parseFloat(ch_fat) - fat), 3 ); //脂肪取得小數第3位
	document.getElementById('ch_e').value            = formatFloat( (parseFloat(ch_e)   - e), 3 );   //蛋白質取得小數第3位
	document.getElementById('ch_carbohydrate').value = formatFloat( (parseFloat(ch_car) - car), 3 ); //醣類取得小數第3位
	document.getElementById('ch_potassium').value    = formatFloat( (parseFloat(ch_pot) - pot), 3 ); //鉀取得小數第3位
	document.getElementById('ch_sodium').value       = formatFloat( (parseFloat(ch_sod) - sod), 3 ); //鈉取得小數第3位
	document.getElementById('ch_calcium').value      = formatFloat( (parseFloat(ch_cal) - cal), 3 ); //鈣取得小數第3位
	document.getElementById('ch_phosphorous').value  = formatFloat( (parseFloat(ch_pho) - pho), 3 ); //磷取得小數第3位
	document.getElementById('ch_mg').value           = formatFloat( (parseFloat(ch_mg)  - mg), 3 );  //鎂取得小數第3位
	document.getElementById('ch_iron').value         = formatFloat( (parseFloat(ch_iro)- iro), 3 );  //鐵取得小數第3位
	document.getElementById('ch_zinc').value         = formatFloat( (parseFloat(ch_zin)- zin), 3 );  //鋅取得小數第3位
}

function check_form()
{
	var obj = document.foodform;
	if ( trim(obj.ch_name.value) == '')
	{
		alert('請輸入食物名稱!!');
		obj.ch_name.focus();
	}else{
		obj.submit();
	}
}

function check_kind()
{
	var obj = document.foodform;
	if (obj.ch_kind.options[obj.ch_kind.selectedIndex].value == 'food7')
	{
		document.getElementById('ch_kind2').style.display = 'block';
		document.getElementById('ck_kind2').value = '1';
	}else{
		document.getElementById('ch_kind2').style.display = 'none';
		document.getElementById('ck_kind2').value = '0';
	}
}

	changelist();
	function changelist()
	{
		switch(document.searchform.type.value)
		{
			case "0":document.all.searchlist.innerHTML=""
			break;
		
			case "kind":
				document.all.searchlist.innerHTML=
					"<select id='keyword' name='keyword' style = 'width:155px'><option value='food1'>全榖根莖類及加工製品<option value='food2'>豆魚肉蛋類<option value='food3'>蔬菜類<option value='food4'>水果類<option value='food5'>油脂類<option value='food6'>奶類<option value='調味料'>調味料<option value='中式早餐'>中式早餐<option value='西式早餐'>西式早餐<option value='家常菜'>家常菜<option value='小吃'>小吃<option value='套餐'>套餐<option value='零食點心'>零食點心<option value='飲料'>飲料<option value='酒類'>酒類</select>"
			break;
		
			case "ch_name":
				document.all.searchlist.innerHTML="<input type = 'text' id = 'keyword' name = 'keyword' style = 'width:155px'>"
			break;		
			
			case "kg":
				document.all.searchlist.innerHTML="<input type = 'text' id = 'keyword' name = 'keyword' style = 'width:155px'>"
			break;
		
			case "ch_k":
				document.all.searchlist.innerHTML="<input type = 'text' id = 'keyword' name = 'keyword' style = 'width:155px'>"
			break;
		}
	}
//-->
</script>