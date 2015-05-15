<?PHP

//修改食材元素
if ($_POST['action'] == 'edit' && $_POST['id'] != '')
{
	/*$fileName = $_FILES["upimg"]["name"];
	$tmp = $_FILES["upimg"]["tmp_name"];
	if ( !empty($fileName) )
	{
		if ( copy($tmp , IMG_PATH . "/" . $fileName) )
		{
			$ch_image = $fileName;
			unlink($tmp);
		}else{
			$ch_image = base64_decode($_POST['oldimg']);
		}
	}else{
		$ch_image = base64_decode($_POST['oldimg']);
	}*/	
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
		$chKind2 = ($_POST['kind'] == 'food7')? ckString($FOODTYPE2[$_POST['kind2']], 30) : '';
		$sql = "UPDATE food_element SET ";
		$sql .= "name = '" . ckString($_POST['name'], 255) . "' , ";
		$sql .= "kind = '" . ckString($_POST['kind'], 30) . "' , ";
		$sql .= "kind2 = '" . $chKind2 . "' , ";
		$sql .= "img = '" . ckString($ch_image, 255) . "' , ";
		$sql .= "kg = '" . ckString($_POST['kg'], 10) . "' , ";
		$sql .= "k = '" . ckString($_POST['k'], 10) . "' , ";
		$sql .= "cholesterol = '" . ckString($_POST['cholesterol'], 10) . "' , ";
		$sql .= "fat = '" . ckString($_POST['fat'], 10) . "' , ";
		$sql .= "e = '" . ckString($_POST['e'], 10) . "' , ";
		$sql .= "carbohydrate = '" . ckString($_POST['carbohydrate'], 10) . "' , ";
		$sql .= "potassium = '" . ckString($_POST['potassium'], 10) . "' , ";
		$sql .= "sodium = '" . ckString($_POST['sodium'], 10) . "' , ";
		$sql .= "calcium = '" . ckString($_POST['calcium'], 10) . "' , ";
		$sql .= "phosphorous = '" . ckString($_POST['phosphorous'], 10) . "' , ";
		$sql .= "mg = '" . ckString($_POST['mg'], 10) . "', ";
		$sql .= "iron = '" . ckString($_POST['iron'], 10) . "', ";
		$sql .= "zinc = '" . ckString($_POST['zinc'], 10) . "', ";
		$sql .= "up_time = '" . time() . "' ";
		$sql .= "WHERE id = '" . $_POST['id'] . "'";
		if ( mysql_query($sql) )
		{
			showMsg('修改完成');
			actionlog(9,$USER['username']);
		}else{
			showMsg('修改失敗，請洽系統管理員!!');
		}
	}
}

//新增食材元素
if ($_POST['action'] == 'add')
{	
	/*$ch_image = '';
	$fileName = $_FILES["upimg"]["name"];
	$tmp = $_FILES["upimg"]["tmp_name"];
	if ( !empty($fileName) )
	{
		if ( copy($tmp , IMG_PATH . "/" . $fileName) )
		{
			$ch_image = $fileName;
			unlink($tmp);
		}
	}*/	
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
		$chKind2 = ($_POST['ck_kind2'] == '1')? ckString($FOODTYPE2[$_POST['kind2']], 30) : '';
		
		$sql = "INSERT INTO food_element (name, kind, kind2, img, kg, k, cholesterol, fat, e, carbohydrate, potassium, sodium, calcium, phosphorous, mg, iron, zinc, add_time, up_time)VALUES(";
		$sql .= "'" . ckString($_POST['name'], 255) . "' , ";
		$sql .= "'" . ckString($_POST['kind'], 30) . "' , ";
		$sql .= "'" . $chKind2 . "' , ";
		$sql .= "'" . ckString($new_name, 255) . "' , ";
		$sql .= "'" . ckString($_POST['kg'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['k'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['cholesterol'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['fat'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['e'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['carbohydrate'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['potassium'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['sodium'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['calcium'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['phosphorous'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['mg'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['iron'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['zinc'], 10) . "' , ";
		$sql .= "'" . time() . "' , ";
		$sql .= "'" . time() . "')";

		if ( mysql_query($sql) )
		{
			showMsg('新增完成');
			actionlog(7,$USER['username']);
		}else{
			showMsg('新增失敗，請洽系統管理員!!');
		}
	}
}

//刪除食材元素
if ($op == 'food_element' && $_GET['action'] == 'delete' && $_GET['id'] != '')   
{
	if (trim($_GET['img']) != ''){ @unlink(IMG_PATH . "/" . base64_decode($_GET['img']) ); }
	$sql = "DELETE FROM food_element WHERE id = '" . $_GET['id'] . "'";
	if ( mysql_query($sql) )
	{		
		showMsg('刪除成功!!');
		actionlog(8,$USER['username']);
	}else{
		showMsg('刪除失敗，請洽系統管理員!!');
	}
}

//刪除圖片
if ( $_GET['action'] == 'delimg' && $_GET['img'] != '' )
{
	if ( unlink(IMG_PATH . "/" . base64_decode($_GET['img']) ) )
	{
		if ( mysql_query("UPDATE food_element SET img = '' WHERE id = '" . $_GET['id'] . "'") )
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


if ( $op == 'food_element' && ( $_GET['action'] == 'edit' || $_GET['action'] == 'add' ) )
{
	$backurl = base64_decode($_GET['back']);
	if ($_GET['action'] == 'edit')
	{
		$row = mysql_fetch_array( mysql_query("SELECT * FROM food_element WHERE id = '" . $_GET['id'] . "'") );
		echo "<div class = 'title' style = 'width:400px'>修改 - " . $row['name'] . "</div><div style = 'padding-bottom:5px'></div>\n";
	}else{
		echo "<div class = 'title' style = 'width:150px'>新增食物</div><div style = 'padding-bottom:5px'></div>\n";
	}
	echo "<table border = '1' cellpadding = '4' cellspacing = '1' width = '80%' style = 'border-collapse:collapse' bordercolor = '#AAAAAA'>\n";
	echo "<form action = '" . ROOT_URL . "/ngadmin/newgen.php?op=" . $op . "&action=" . $action . "&id=" . $_GET['id'] . "&back=" . $_GET['back'] . "' id = 'foodform' name = 'foodform' method = 'post' enctype = 'multipart/form-data'>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right' width = '20%'>食物圖片</td>\n";
	echo "	<td class = 'text13px'>\n";
	if ($_GET['action'] == 'edit' && trim($row['img']) != '')
	{
		echo "	<img src = '" . IMG_URL . "/" . $row['img'] . "' width = '300'>\n";
		echo "  <br><a href = '" . ROOT_URL . "/ngadmin/newgen.php?op=" . $op . "&action=delimg&id=" . $_GET['id'] . "&back=" . $_GET['back'] . "&img=" . base64_encode($row['img']) . "&getback=" . base64_encode(getenv("REQUEST_URI")) . "' onclick = 'return confirm(\"確定要刪除嗎?\")'>刪除圖片</a><br>\n";
	}
	echo "  <input type = 'file' id = 'upimg' name = 'upimg'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>所屬類別</td>\n";
	echo "	<td class = 'text13px'><select id = 'kind' name = 'kind' onchange = 'check_kind()'>\n";
	foreach ($FOODTYPE as $key => $value)
	{
		$selected = ($row['kind'] == $key)? 'selected' : '';
		echo "<option value = '" . $key . "' " . $selected . ">" . $value . "</option>\n";
	}
	echo "	</select>\n";
	$display = ($row['kind'] == 'food7')? 'block' : 'none';
	echo "	<div id = 'chkind2' name = 'chkind2' style = 'padding-top:5px;display:" . $display . "'><select id = 'kind2' name = 'kind2'>\n";
	foreach ($FOODTYPE2 as $key => $value)
	{
		$selected = ($row['kind2'] == $value)? 'selected' : '';
		echo "<option value = '" . $key . "' " . $selected . ">" . $value . "</option>\n";
	}
	echo "	</select></div>\n";
	echo "	</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>名稱</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'name' name = 'name' value = '" . $row['name'] . "' style = 'width:200px'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>重量</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'kg' name = 'kg' value = '" . $row['kg'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>熱量</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'k' name = 'k' value = '" . $row['k'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>膽固醇</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'cholesterol' name = 'cholesterol' value = '" . $row['cholesterol'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>脂肪</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'fat' name = 'fat' value = '" . $row['fat'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>蛋白質</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'e' name = 'e' value = '" . $row['e'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>醣類</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'carbohydrate' name = 'carbohydrate' value = '" . $row['carbohydrate'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>鉀</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'potassium' name = 'potassium' value = '" . $row['potassium'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>鈉</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'sodium' name = 'sodium' value = '" . $row['sodium'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>鈣</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'calcium' name = 'calcium' value = '" . $row['calcium'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>磷</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'phosphorous' name = 'phosphorous' value = '" . $row['phosphorous'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>鎂</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'mg' name = 'mg' value = '" . $row['mg'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>鐵</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'iron' name = 'iron' value = '" . $row['iron'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td class = 'text13px' align = 'right'>鋅</td>\n";
	echo "	<td class = 'text13px'><input type = 'text' id = 'zinc' name = 'zinc' value = '" . $row['zinc'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td colspan = '2' align = 'center'><input type = 'hidden' id = 'burl' name = 'burl' value = '" . $_GET['back'] . "'>\n";
	if ($_GET['action'] == 'edit')
	{
		$ckKind2 = ($row['ch_kind'] == 'food7')? '1' : '0';     //判斷食物類別2是否要存入資料庫
		echo "	<input type = 'hidden' id = 'oldimg' name = 'oldimg' value = '" . base64_encode($row['img']) . "'>\n";
		echo "  <input type = 'hidden' id = 'ck_kind2' name = 'ck_kind2' value = '" . $ckKind2 . "'>\n";
		echo "  <input type = 'hidden' id = 'action' name = 'action' value = 'edit'>\n";
		echo "	<input type = 'hidden' id = 'id' name = 'id' value = '" . $row['id'] . "'>\n";
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
elseif ( $op == 'food_element' && ( $_GET['action'] == 'seepic') )
{
	$backurl = base64_decode($_GET['back']);
	$row = mysql_fetch_array( mysql_query("SELECT * FROM food_element WHERE id = '" . $_GET['id'] . "'") );	

	echo "<div class = 'title' style = 'width:150px'>食物圖片</div><div style = 'padding-bottom:5px'></div><br>";
	echo "<div>".$row[name]."</div>";
	
	if($row[img]!='')
	{
		echo "<div><img src = '" . IMG_URL . "/" . $row['img'] . "' width = '300'></div>";
	}
	else
	{
		echo "<div><table border=1 width=300 height=300><tr><td align=center>N/A</td></tr></table></div>";
	}
	
	echo "<div><input type = 'button' id = 'back' name = 'back' value = '回上一頁' onclick = 'location.href=\"" . $backurl . "\"'></div>";
}
else if ($op == 'food_element')
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
	/**
		echo "<table border = '0' cellpadding = '4' cellspacing = '1' width = '95%' valign = 'top'>\n";
  	 	echo "<form action = '" . ROOT_URL . "/ngadmin/newgen.php?op=food_element' id = 'searchform' name = 'searchform' method = 'post'>\n";
	    echo "<tr>\n";
   		echo "  <td><div style = 'width:110px'><div class = 'title'>維護食材資料</div></div></td>\n";
	  	echo "  <td align = 'right'>\n";
		echo "<select id = 'type' name = 'type' >\n";
		echo "<option value='name'>名稱</option>\n";
		echo "  </select>\n";
		echo "<span id=searchlist></span>";
	    echo "  <input type = 'text' id = 'keyword' name = 'keyword' style = 'width:100px'>\n";
   		echo "  <input type = 'hidden' id = 'action' name = 'action' value = 'search'>\n";
	    echo "  <input type = 'submit' id = 'search' name = 'search' value = '查詢食材'>\n";        
	    echo "  <input type = 'button' id = 'add' name = 'add' value = '新增食材' onclick = 'location.href=\"newgen.php?op=".$op."&action=add&back=" . base64_encode(getenv("REQUEST_URI")) . "\"'></td>\n";
 	    echo "</tr>\n";
    	echo "</form>\n";
	    echo "</table>\n";
	**/
	?>
    
    <?php
		echo "<table border = '0' cellpadding = '4' cellspacing = '1' width = '95%' valign = 'top'>\n";
    	echo "<form action = '" . ROOT_URL . "/ngadmin/newgen.php?op=food_element' id = 'searchform' name = 'searchform' method = 'post'>\n";
	    echo "<tr>\n";
	    echo "  <td align = 'right'>\n";
	    echo "  <select id = 'type' name = 'type'>\n";
    	echo "     <option value = 'name'>名稱</option>\n";
	    echo "  </select>\n";
	    echo "  <input type = 'text' id = 'keyword' name = 'keyword' style = 'width:100px'>\n";
	    echo "  <input type = 'hidden' id = 'action' name = 'action' value = 'search'>\n";
	    echo "  <input type = 'submit' id = 'search' name = 'search' value = '查詢食材'>\n";
		if($USER['power'] == '1' ||$USER['power'] == '3')
		{
			echo "  <input type = 'button' id = 'adduser' name = 'adduser' value = '新增食材' onclick = 'location.href=\"newgen.php?op=food_element&action=add&back=" . base64_encode(getenv("REQUEST_URI")) . "\"'></td>\n";
		}
	    
    	echo "</tr>\n";
	    echo "</form>\n";
	    echo "</table>\n";
	 ?>  
<div class="panel panel-default">
<div class="panel-heading">
	<?php
		if($USER['power'] == '1' || $USER['power'] == '3')
		{
		echo "<i class='fa fa-bar-chart-o fa-fw'></i> 維護食材資料";	
		}
    	else
		{
		echo "<i class='fa fa-bar-chart-o fa-fw'></i> 檢視食材資料";		
		} 
	?>
   
   <div class="pull-right">
      <div class="btn-group">
         <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
         Actions
         <span class="caret"></span>
         </button>
         <ul class="dropdown-menu pull-right" role="menu">
            <li><a href="#">Action</a>
            </li>
            <li><a href="#">Another action</a>
            </li>
            <li><a href="#">Something else here</a>
            </li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a>
            </li>
         </ul>
      </div>
	  
   </div>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
   <div class="row">
      <div class="col-lg-12">
         <div class="table-responsive">
            <table class="table">
               <thead>
                  <tr>
                     <th>名稱</th>
                     <th>重量</th>
                     <th>熱量</th>
                     <th>膽固醇</th>
                     <th>脂肪</th>
                     <th>蛋白質</th>
                     <th>醣類</th>
                     <th>鉀</th>
                     <th>鈉</th>
                     <th>鈣</th>
                     <th>磷</th>
                     <th>鎂</th>
		<?php  if($USER['power'] == '1' || $USER['power'] == '3') 
				{ ?>
					<th>修改</th>
					<th>刪除</th>
				 <?php
				 }
				 else if($USER['power'] == '2')
				 {?>
					<th>圖片</th>
				<?php } ?>
                  </tr>
               </thead>
               <tbody>
		<?PHP
		
		$action  = (trim($_GET['action']) == '')? $_POST['action'] : $_GET['action'];
		$type    = (trim($_GET['type']) == '')? $_POST['type'] : urldecode($_GET['type']);
		$keyword = (trim($_GET['keyword']) == '')? $_POST['keyword'] : urldecode($_GET['keyword']);
		if ( $action == 'search' )
		{
			if ( trim($keyword) != '' )
			{
				$sqlwhe = " WHERE " . $type . " LIKE '%" . $keyword . "%'";
			}
		}
		$food_total = countSQL('food_element', 'id', $sqlwhe);     //計算該類別的食物總數
		$page = ($_GET['page'])? $_GET['page'] : 0;   //設定目前頁數
		$total_page = ceil($food_total / PAGE_NUM);   //計算總共頁數
		$start_num = (!$_GET['page'])? '0' : $_GET['page'] * PAGE_NUM; //SQL開始筆數
		$sql = "SELECT * FROM food_element " . $sqlwhe . " LIMIT " . $start_num . "," . PAGE_NUM;
		$result = mysql_query($sql);
		$i = 0;

		while( $row = mysql_fetch_array($result) )
		{
			$bgcolor = ($i % 2 == 0)? '#FFFFFF' : '#FFEAAA';
			echo "<tr>\n";
			echo "	<td>" . $row['name'] . "</td>\n";
			echo "	<td>" . $row['kg'] . " g</td>\n";
			echo "	<td>" . $row['k'] . "</td>\n";
			echo "	<td>" . $row['cholesterol'] . "</td>\n";
			echo "	<td>" . $row['fat'] . "</td>\n";
			echo "	<td>" . $row['e'] . "</td>\n";
			echo "	<td>" . $row['carbohydrate'] . "</td>\n";
			echo "	<td>" . $row['potassium'] . "</td>\n";
			echo "	<td>" . $row['sodium'] . "</td>\n";
			echo "	<td>" . $row['calcium'] . "</td>\n";
			echo "	<td>" . $row['phosphorous'] . "</td>\n";
			echo "	<td>" . $row['mg'] . "</td>\n";
			if($USER['power'] == '1' ||$USER['power'] == '3')
			{
			echo "	<td><a href = 'newgen.php?op=" . $op . "&action=edit&id=" . $row['id'] . "&back=" . base64_encode(getenv("REQUEST_URI")) . "'>修改</a></td>\n";
			echo "	<td><a href = 'newgen.php?op=" . $op . "&action=delete&id=" . $row['id'] . "&img=" . base64_encode($row['img']) . "' onclick = 'return confirm(\"確定要刪除嗎?\")'>刪除</a></td>\n";
			}
			elseif($USER['power'] == '2')
			{
				echo "	<td><a href = 'newgen.php?op=" . $op . "&action=seepic&id=" . $row['id'] . "&back=" . base64_encode(getenv("REQUEST_URI")) . "'><span class='glyphicon glyphicon-search'></span></td>\n";
			}
			echo "</tr>\n";
			$i++;
		}
		?>
               </tbody>
            </table>
         </div>
         <!-- /.table-responsive -->
      </div>
   </div>
   <!-- /.row -->
</div>
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
		
	
		if ( $food_total > PAGE_NUM ){   //判斷資料庫中的資料是否大於每頁顯示數量
		echo "<div style='text-align:center;'> <ul class='pagination pagination-lg'>";
		echo "<li><a href='" . ROOT_URL . "/ngadmin/newgen.php?op=" . $op . $link . "'>&laquo;</a></li>";
		echo "<li><a href='" . ROOT_URL . "/ngadmin/newgen.php?op=" . $op . "&page=" .($page). $link . "'>".($page+1)."</a></li>";
		echo "<li><a href='" . ROOT_URL . "/ngadmin/newgen.php?op=" . $op . "&page=" .($page+1). $link . "'>".($page+2)."</a></li>";
		echo "<li><a href='" . ROOT_URL . "/ngadmin/newgen.php?op=" . $op . "&page=" .($page+2). $link . "'>".($page+3)."</a></li></li>";
		echo "<li><a href='" . ROOT_URL . "/ngadmin/newgen.php?op=" . $op . "&page=" .($page+3). $link . "'>".($page+4)."</a></li></li>";
		echo "<li><a href='" . ROOT_URL . "/ngadmin/newgen.php?op=" . $op . "&page=" .($page+4). $link . "'>".($page+5)."</a></li></li>";
		echo "<li><a href='" . ROOT_URL . "/ngadmin/newgen.php?op=" . $op . "&page=" . ($total_page - 1) . $link. "'>&raquo;</a></li>";
		echo "</ul></div>";
		echo "<div style='text-align:center;'>";
		echo "<span class='label label-info'>總筆數:".$food_total."</span>";
		echo "<span class='label label-success'>目前頁數:".($page+1)."</span>";
		echo "<span class='label label-warning'>總頁:".$total_page."</span>";
		echo "</div>";
    }
		?>
        
		</td>
	</tr>
	</table>
<?PHP
}
?>

<script language = 'javascript'>
<!--
function check_form()
{
	var obj = document.foodform;
	if ( trim(obj.name.value) == '')
	{
		alert('請輸入食物名稱!!');
		obj.name.focus();

	}else if (!chk_Total(obj.name.value , 255))
	{
		alert('超過字數限制，限輸入255個字元!!');
		obj.name.focus();

	}else if ( trim(obj.kg.value) != '' && ckfloat(obj.kg.value) )
	{
		alert('請輸入半形數字或小數點!!');
		obj.kg.focus();
	
	}else if (!chk_Total(obj.kg.value , 10))
	{
		alert('超過字數限制，限輸入10個字元!!');
		obj.kg.focus();

	}else if ( trim(obj.k.value) != '' && ckfloat(obj.k.value) )
	{
		alert('請輸入半形數字或小數點!!');
		obj.k.focus();
	
	}else if (!chk_Total(obj.k.value , 10))
	{
		alert('超過字數限制，限輸入10個字元!!');
		obj.k.focus();
	
	}else if ( trim(obj.cholesterol.value) != '' && ckfloat(obj.cholesterol.value) )
	{
		alert('請輸入半形數字或小數點!!');
		obj.cholesterol.focus();
	
	}else if (!chk_Total(obj.cholesterol.value , 10))
	{
		alert('超過字數限制，限輸入10個字元!!');
		obj.cholesterol.focus();
	
	
	}else if ( trim(obj.fat.value) != '' && ckfloat(obj.fat.value) )
	{
		alert('請輸入半形數字或小數點!!');
		obj.fat.focus();
	
	}else if (!chk_Total(obj.fat.value , 10))
	{
		alert('超過字數限制，限輸入10個字元!!');
		obj.fat.focus();	
	
	}else if ( trim(obj.e.value) != '' && ckfloat(obj.e.value) )
	{
		alert('請輸入半形數字或小數點!!');
		obj.e.focus();
	
	}else if (!chk_Total(obj.e.value , 10))
	{
		alert('超過字數限制，限輸入10個字元!!');
		obj.e.focus();	
	
	}else if ( trim(obj.carbohydrate.value) != '' && ckfloat(obj.carbohydrate.value) )
	{
		alert('請輸入半形數字或小數點!!');
		obj.carbohydrate.focus();
	
	}else if (!chk_Total(obj.carbohydrate.value , 10))
	{
		alert('超過字數限制，限輸入10個字元!!');
		obj.carbohydrate.focus();	
	
	}else if ( trim(obj.potassium.value) != '' && ckfloat(obj.potassium.value) )
	{
		alert('請輸入半形數字或小數點!!');
		obj.potassium.focus();
	
	}else if (!chk_Total(obj.potassium.value , 10))
	{
		alert('超過字數限制，限輸入10個字元!!');
		obj.potassium.focus();	
	
	}else if ( trim(obj.sodium.value) != '' && ckfloat(obj.sodium.value) )
	{
		alert('請輸入半形數字或小數點!!');
		obj.sodium.focus();
	
	}else if (!chk_Total(obj.sodium.value , 10))
	{
		alert('超過字數限制，限輸入10個字元!!');
		obj.sodium.focus();	
	
	}else if ( trim(obj.calcium.value) != '' && ckfloat(obj.calcium.value) )
	{
		alert('請輸入半形數字或小數點!!');
		obj.calcium.focus();
	
	}else if (!chk_Total(obj.calcium.value , 10))
	{
		alert('超過字數限制，限輸入10個字元!!');
		obj.calcium.focus();	
	
	}else if ( trim(obj.phosphorous.value) != '' && ckfloat(obj.phosphorous.value) )
	{
		alert('請輸入半形數字或小數點!!');
		obj.phosphorous.focus();
	
	}else if (!chk_Total(obj.phosphorous.value , 10))
	{
		alert('超過字數限制，限輸入10個字元!!');
		obj.phosphorous.focus();	
	
	}else if ( trim(obj.mg.value) != '' && ckfloat(obj.mg.value) )
	{
		alert('請輸入半形數字或小數點!!');
		obj.mg.focus();
	
	}else if (!chk_Total(obj.mg.value , 10))
	{
		alert('超過字數限制，限輸入10個字元!!');
		obj.mg.focus();	
	
	}else{
		obj.submit();
	}
}

function check_kind()
{
	var obj = document.foodform;
	if (obj.kind.options[obj.kind.selectedIndex].value == 'food7')
	{
		document.getElementById('chkind2').style.display = 'block';
		document.getElementById('ck_kind2').value = '1';
	}else{
		document.getElementById('chkind2').style.display = 'none';
		document.getElementById('ck_kind2').value = '0';
	}
}

//-->
</script>