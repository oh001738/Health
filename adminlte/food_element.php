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
//old
	$backurl = base64_decode($_GET['back']);
	if ($_GET['action'] == 'edit')
	{
		$row = mysql_fetch_array( mysql_query("SELECT * FROM food_element WHERE id = '" . $_GET['id'] . "'") );
		echo "<div class = 'title' style = 'width:400px'>修改 - " . $row['name'] . "</div><div style = 'padding-bottom:5px'></div>\n";
	}else{
		echo "<div class = 'title' style = 'width:150px'>新增食物</div><div style = 'padding-bottom:5px'></div>\n";
	}
	echo "<table class='table table-striped'>\n";
	echo "<form action = '" . ROOT_URL . "/adminlte/index.php?op=" . $op . "&action=" . $action . "&id=" . $_GET['id'] . "&back=" . $_GET['back'] . "' id = 'foodform' name = 'foodform' method = 'post' enctype = 'multipart/form-data'>\n";
	echo "<tr>\n";
	echo "	<td align = 'center' width = '20%'>食物圖片</td>\n";
	echo "	<td>\n";
	if ($_GET['action'] == 'edit' && trim($row['img']) != '')
	{
		echo "	<img src = '" . IMG_URL . "/" . $row['img'] . "' width = '300'>\n";
		echo "  <br><a href = '" . ROOT_URL . "/adminlte/index.php?op=" . $op . "&action=delimg&id=" . $_GET['id'] . "&back=" . $_GET['back'] . "&img=" . base64_encode($row['img']) . "&getback=" . base64_encode(getenv("REQUEST_URI")) . "' onclick = 'return confirm(\"確定要刪除嗎?\")'>刪除圖片</a><br>\n";
	}
	echo "  <input type = 'file' id = 'upimg' name = 'upimg'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'>所屬類別</td>\n";
	echo "	<td><select id = 'kind' name = 'kind' onchange = 'check_kind()'>\n";
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
	echo "	<td align = 'center'>名稱</td>\n";
	echo "	<td><input type = 'text' id = 'name' name = 'name' value = '" . $row['name'] . "' style = 'width:200px'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'>重量</td>\n";
	echo "	<td><input type = 'text' id = 'kg' name = 'kg' value = '" . $row['kg'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'>熱量</td>\n";
	echo "	<td><input type = 'text' id = 'k' name = 'k' value = '" . $row['k'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'>膽固醇</td>\n";
	echo "	<td><input type = 'text' id = 'cholesterol' name = 'cholesterol' value = '" . $row['cholesterol'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'>脂肪</td>\n";
	echo "	<td><input type = 'text' id = 'fat' name = 'fat' value = '" . $row['fat'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'>蛋白質</td>\n";
	echo "	<td><input type = 'text' id = 'e' name = 'e' value = '" . $row['e'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'>醣類</td>\n";
	echo "	<td><input type = 'text' id = 'carbohydrate' name = 'carbohydrate' value = '" . $row['carbohydrate'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'>鉀</td>\n";
	echo "	<td><input type = 'text' id = 'potassium' name = 'potassium' value = '" . $row['potassium'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'>鈉</td>\n";
	echo "	<td><input type = 'text' id = 'sodium' name = 'sodium' value = '" . $row['sodium'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'>鈣</td>\n";
	echo "	<td><input type = 'text' id = 'calcium' name = 'calcium' value = '" . $row['calcium'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'>磷</td>\n";
	echo "	<td><input type = 'text' id = 'phosphorous' name = 'phosphorous' value = '" . $row['phosphorous'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'>鎂</td>\n";
	echo "	<td><input type = 'text' id = 'mg' name = 'mg' value = '" . $row['mg'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'>鐵</td>\n";
	echo "	<td><input type = 'text' id = 'iron' name = 'iron' value = '" . $row['iron'] . "'></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'>鋅</td>\n";
	echo "	<td><input type = 'text' id = 'zinc' name = 'zinc' value = '" . $row['zinc'] . "'></td>\n";
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
		echo "	<input type = 'button' class='btn btn-primary' id = 'update' name = 'update' value = '修改' onclick = 'check_form()'>\n";
	}else{
		echo "  <input type = 'hidden' id = 'ck_kind2' name = 'ck_kind2' value = '0'>\n";
		echo "  <input type = 'hidden' id = 'action' name = 'action' value = 'add'>\n";
		echo "	<input type = 'button' class='btn btn-primary' id = 'update' name = 'update' value = '新增' onclick = 'check_form()'>\n";
	}
	echo "	<span style = 'padding-left:10px'><input type = 'button' class='btn btn-warning' id = 'back' name = 'back' value = '回上一頁' onclick = 'location.href=\"" . $backurl . "\"'></span></td>\n";
	echo "</tr>\n";
	echo "</form>\n";
	echo "</table>\n";

}
elseif ( $op == 'food_element' && ( $_GET['action'] == 'seepic') )
{
	$backurl = base64_decode($_GET['back']);
	$row = mysql_fetch_array( mysql_query("SELECT * FROM food_element WHERE id = '" . $_GET['id'] . "'") );	
	echo "<div class=\"row\">\n"; 
	echo "<div class=\"col-md-6\">\n"; //左半邊
	//食物圖片開始
	echo "<div class=\"box box-primary\">\n";
	echo "<div class=\"box-header\">\n"; 
	echo "<h3 class=\"box-title\">食物圖片 - ".$row[name]."</h3>\n"; 
	echo "</div>\n"; 
	if($row[img]!='')
	{
		echo "<div class='row'>";
		echo "<div class='col-md-12 col-centered text-center'><img src = '" . IMG_URL . "/" . $row['img'] . "' width = '300'></div>";
		echo "</div>";
	}
	else
	{
		echo "<div class='row'>";
		echo "<div class='col-md-12 col-centered text-center'><table border=1 width=300 height=300><tr><td align=center>N/A Picture</td></tr></table></div>";
		echo "</div>";
	}
	echo "</div>\n"; 
	echo "</div>\n"; 
	//食物圖片結束 
	echo "<div class=\"col-md-6 col-sm-12\">\n";
	echo "<div class=\"box box-warning\">\n"; 
	echo "<div class=\"box-header\">\n"; 
	echo "<h3 class=\"box-title\">營養素分布</h3>\n"; 
	echo "</div>\n"; 
	echo "<div class=\"box-body chart-responsive\">\n";
	echo "<div id=\"donut-nutrition\" style=\"position: relative;\"></div>\n";
	
	echo "</div>\n"; 
	echo "</div>\n"; 
	echo "<div><input type = 'button' class='btn btn-success pull-right' id = 'back' name = 'back' value = '回上一頁' onclick = 'location.href=\"" . $backurl . "\"'></div>";	
	echo "</div>\n";
	echo "</div>\n";
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
      <!-- Content Wrapper. Contains page content -->
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
					<?php
						if($USER['power'] == '1' || $USER['power'] == '3')
						{
						echo "<h3 class='box-title'>維護食材資料</h3>";	
						echo "<a href='index.php?op=food_element&action=add&back=" . base64_encode(getenv("REQUEST_URI")) . "\"' class='btn btn-primary pull-right btn-sm RbtnMargin' role='button'>新增食材</a>";
						}
						else
						{
						echo "<h3 class='box-title'>檢視食材資料</h3>";		
						} 
					?>
				
                </div><!-- /.box-header -->
                <div class="box-body">
				<div class="table-responsive">
                  <table id="food-elements" class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>名稱</th>
						<th>重量</th>
						<th>熱量</th>
						<th>膽固醇</th>
						<th>脂肪</th>
						<th>蛋白質</th>
						<th>醣類</th>
						<th class='hidden-xs hidden-sm'>鉀</th>
						<th>鈉</th>
						<th class='hidden-xs hidden-sm'>鈣</th>
						<th class='hidden-xs hidden-sm'>磷</th>
						<th class='hidden-xs hidden-sm'>鎂</th>
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
		
		$action  = (trim+($_GET['action']) == '')? $_POST['action'] : $_GET['action'];
		$type    = (trim+($_GET['type']) == '')? $_POST['type'] : urldecode($_GET['type']);
		$keyword = (trim+($_GET['keyword']) == '')? $_POST['keyword'] : urldecode($_GET['keyword']);
		if ( $action == 'search' )
		{
			if ( trim+($keyword) != '' )
			{
				$sqlwhe = " WHERE " . $type . " LIKE '%" . $keyword . "%'";
			}
		}
		$food_total = countSQL('food_element', 'id', $sqlwhe);     //計算該類別的食物總數
		$page = ($_GET['page'])? $_GET['page'] : 0;   //設定目前頁數
		$total_page = ceil($food_total / PAGE_NUM);   //計算總共頁數
		$start_num = (!$_GET['page'])? '0' : $_GET['page'] * PAGE_NUM; //SQL開始筆數
		$sql = "SELECT * FROM food_element ";// . $sqlwhe . " LIMIT " . $start_num . "," . PAGE_NUM;
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
			echo "	<td class='hidden-xs hidden-sm'>" . $row['potassium'] . "</td>\n";
			echo "	<td>" . $row['sodium'] . "</td>\n";
			echo "	<td class='hidden-xs hidden-sm'>" . $row['calcium'] . "</td>\n";
			echo "	<td class='hidden-xs hidden-sm'>" . $row['phosphorous'] . "</td>\n";
			echo "	<td class='hidden-xs hidden-sm'>" . $row['mg'] . "</td>\n";
			if($USER['power'] == '1' ||$USER['power'] == '3')
			{
			echo "	<td><a href = 'index.php?op=" . $op . "&action=edit&id=" . $row['id'] . "&back=" . base64_encode(getenv("REQUEST_URI")) . "'>修改</a></td>\n";
			echo "	<td><a href = 'index.php?op=" . $op . "&action=delete&id=" . $row['id'] . "&img=" . base64_encode($row['img']) . "' onclick = 'return confirm(\"確定要刪除嗎?\")'>刪除</a></td>\n";
			}
			elseif($USER['power'] == '2')
			{
				echo "	<td><a href = 'index.php?op=" . $op . "&action=seepic&id=" . $row['id'] . "&back=" . base64_encode(getenv("REQUEST_URI")) . "'><span class='glyphicon glyphicon-search'></span></td>\n";
			}
			echo "</tr>\n";
			$i++;
		}
		?>
                    </tbody>
                    <tfoot>
                      <tr>
						<th>名稱</th>
						<th>重量</th>
						<th>熱量</th>
						<th>膽固醇</th>
						<th>脂肪</th>
						<th>蛋白質</th>
						<th>醣類</th>
						<th class='hidden-xs hidden-sm'>鉀</th>
						<th>鈉</th>
						<th class='hidden-xs hidden-sm'>鈣</th>
						<th class='hidden-xs hidden-sm'>磷</th>
						<th class='hidden-xs hidden-sm'>鎂</th>
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
                    </tfoot>
                  </table>
				  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
<?PHP
}
?>

<script language = 'javascript'>

function check_form()
{
	var obj = document.foodform;{	
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

</script>
<script>
/*
 * Play with this code and it'll update in the panel opposite.
 *
 * Why not try some of the options above?
 */
Morris.Donut({
  element: 'donut-nutrition',
  data: [
    {label: "熱量", value: <?php echo $row['k'] ?>},
	{label: "蛋白質", value: <?php echo $row['e'] ?>},
	{label: "脂肪", value: <?php echo $row['fat'] ?>},
	{label: "醣類", value: <?php echo $row['carbohydrate'] ?>},
	{label: "鈉", value: <?php echo $row['sodium'] ?>}
  ],
  resize: true
});
</script>
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $('#food-elements').dataTable({
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": true,
          "bSort": false,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>
