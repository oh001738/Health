<?PHP

if ( $_POST['action'] == 'power' )
{	
	if ( trim($_POST['powerid']) == '' )        //判斷是否有power id 如無則使用insert
	{
		$sql = "INSERT INTO power (userid, power, add_time, up_time)VALUES(";
		$sql .= "'" . ckString($_POST['userid'], 10) . "' , ";
		$sql .= "'" . ckString($_POST['power'], 2) . "' , ";
		$sql .= "'" . time() . "' , ";
		$sql .= "'" . time() . "')";
	
	}else{ 

		if ( trim($_POST['power'] != '0') )      //判斷權限是否設為一般會員，如為一般會員則刪除power資料庫中資料
		{
			$sql = "UPDATE power SET ";
			$sql .= "power = '" . ckString($_POST['power'], 2) . "' , ";
			$sql .= "up_time = '" . time() . "' ";
			$sql .= "WHERE id = '" . ckString($_POST['powerid'], 10) . "' AND userid = '" . ckString($_POST['userid'], 10) . "'";
		}else{
			$sql = "DELETE FROM power WHERE id = '" . ckString($_POST['powerid'], 10) . "'";
		}
	}
	if (mysql_query($sql))
	{
		showMsg("修改完成");

	}else{
		showMsg("修改失敗，請洽系統管理員");
	}
}
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}

.style2 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>


<table border = '0' cellpadding = '2' cellspacing = '0' width = '95%'>
<tr>
	<td>
	<table border = '0' cellpadding = '2' cellspacing = '0' width = '100%'>
	<form action = '<?PHP echo getenv("REQUEST_URI");?>' id = 'searchform' name = 'searchform' method = 'post'>
	<tr>
		<td width = '12%'><div style = 'width:80px'><div class = 'title'>權限管理</div></div></td>
		<td class = 'text13px'><input type = 'text' id = 'keyword' name = 'keyword' style = 'width:150px' value = '請輸入查詢關鍵字' onclick = 'this.value = ""'>
		<input type = 'hidden' id = 'action' name = 'action' value = 'search'>
		<input type = 'button' id = 'startsearch' name = 'startsearch' value = '查詢' onclick = 'checksearch()'>
		<span style = 'padding-left:10px'>
		<select id = 'powertype' name = 'powertype' onchange = 'document.searchform.submit();'>
			<option value = ''>查詢權限</option>
			<option value = '1'>管理者</option>
			<option value = '2'>醫事人員</option>
            <option value = '3'>管理級醫事人員</option>
		</select>
		</span>
		</td>
	</tr>
	</form>
	</table>
	</td>
</tr>
<tr>
	<td valign = 'top' align = 'center'>
	<table border = '0' cellpadding = '4' cellspacing = '1' width = '100%' bgcolor = '#CCCCCC'>
	<tr bgcolor = '#EDEDDE'>
		<td align = 'center' bgcolor="#FFCC00" class = 'text13px style2'>帳號</td>
		<td align = 'center' bgcolor="#FFCC00" class = 'text13px style2'>E-mail</td>
		<td align = 'center' bgcolor="#FFCC00" class = 'text13px style2'>中文姓名</td>
		<td align = 'center' bgcolor="#FFCC00" class = 'text13px style2'>英文姓名</td>
		<td align = 'center' bgcolor="#FFCC00" class = 'text13px style2' width = '15%'>權限</td>
	</tr>
	<?PHP
	if ($_POST['action'] == 'search' && $_POST['powertype'] == '' )
	{
		$user_total = countSQL('user', 'id', "WHERE username LIKE '%" . trim($_POST['keyword']) . "%' OR c_name LIKE '%" . trim($_POST['keyword']) . "%' OR e_name LIKE '%" . trim($_POST['keyword']) . "%' OR email LIKE '%" . trim($_POST['keyword']) . "%'");   //計算搜尋會員總數
	}else{
		$user_total = countSQL('user', 'id');   //計算所有會員總數
	}
	$page = ($_GET['page'])? $_GET['page'] : 0;      //設定目前頁數
	$total_page = ceil($user_total / PAGE_NUM);      //計算總共頁數
	$start_num = (!$_GET['page'])? '0' : $_GET['page'] * PAGE_NUM; //SQL開始筆數
	
	if ( $_POST['action'] && $_POST['powertype'] == '' )
	{
		$sql = "SELECT id, c_name, e_name, email, username FROM user WHERE username LIKE '%" . trim($_POST['keyword']) . "%' OR c_name LIKE '%" . trim($_POST['keyword']) . "%' OR e_name LIKE '%" . trim($_POST['keyword']) . "%' OR email LIKE '%" . trim($_POST['keyword']) . "%' ORDER BY id";
	}else if ($_POST['powertype'] != '')
	{
		$sql = "SELECT id, c_name, e_name, email, username FROM user ORDER BY id";
	}else{
		$sql = "SELECT id, c_name, e_name, email, username FROM user ORDER BY id LIMIT " . $start_num . "," . PAGE_NUM;
	}
	$result = mysql_query($sql);
	$i = 0;
	while( $row = mysql_fetch_array($result) )
	{
		$pvalue = get_value('power', "WHERE userid = '" . $row['id'] . "'");  //取得權限資料庫資料
		if ($_POST['powertype'] != '')
		{
			if ($_POST['powertype'] == $pvalue['power'])
			{
				$bgcolor = ($i % 2 == 0)? '#FFFFFF' : '#FFEAAA';
				echo "<form action = '" . getenv("REQUEST_URI") . "' id = 'powerform" . $row['id'] . "' name = 'powerform" . $row['id'] . "' method = 'post'>\n";
				echo "<tr bgcolor = '" . $bgcolor . "'>\n";
				echo "	<td class = 'text13px'>" . $row['username'] . "</td>\n";
				echo "	<td class = 'text13px'>" . $row['email'] . "</td>\n";
				echo "	<td class = 'text13px'>" . $row['c_name'] . "</td>\n";
				echo "	<td class = 'text13px'>" . $row['e_name'] . "</td>\n";
				echo "	<td class = 'text13px'>\n";
				echo "	<select id = 'power' name = 'power' onchange = 'document.powerform" . $row['id'] . ".submit();'>\n";
				$selected[1] = ($pvalue['power'] == '1')? 'selected': '';
				$selected[2] = ($pvalue['power'] == '2')? 'selected': '';
				$selected[3] = ($pvalue['power'] == '3')? 'selected': '';
				echo "		<option value = '0'>一般會員</option>\n";
				echo "		<option value = '1' " . $selected[1] . ">管理者</option>\n";
				echo "		<option value = '2' " . $selected[2] . ">醫事人員</option>\n";
				echo "		<option value = '3' " . $selected[3] . ">管理級醫事人員</option>\n";
				echo "	</select>\n";
				echo "	<input type = 'hidden' id = 'action' name = 'action' value = 'power'>\n";      //使用者ID
				echo "	<input type = 'hidden' id = 'userid' name = 'userid' value = '" . $row['id'] . "'>\n";      //使用者ID
				echo "	<input type = 'hidden' id = 'powerid' name = 'powerid' value = '" . $pvalue['id'] . "'>\n"; //權限ID
				echo "	</td>\n";
				echo "</tr>\n";
				echo "</form>\n";
				unset($selected);
				$i++;
			}
		}else{
			$bgcolor = ($i % 2 == 0)? '#FFFFFF' : '#FFEAAA';
			echo "<form action = '" . getenv("REQUEST_URI") . "' id = 'powerform" . $row['id'] . "' name = 'powerform" . $row['id'] . "' method = 'post'>\n";
			echo "<tr bgcolor = '" . $bgcolor . "'>\n";
			echo "	<td class = 'text13px'>" . $row['username'] . "</td>\n";
			echo "	<td class = 'text13px'>" . $row['email'] . "</td>\n";
			echo "	<td class = 'text13px'>" . $row['c_name'] . "</td>\n";
			echo "	<td class = 'text13px'>" . $row['e_name'] . "</td>\n";
			echo "	<td class = 'text13px'>\n";
			echo "	<select id = 'power' name = 'power' onchange = 'document.powerform" . $row['id'] . ".submit();'>\n";
			$selected[1] = ($pvalue['power'] == '1')? 'selected': '';
			$selected[2] = ($pvalue['power'] == '2')? 'selected': '';
			$selected[3] = ($pvalue['power'] == '3')? 'selected': '';
			echo "		<option value = '0'>一般會員</option>\n";
			echo "		<option value = '1' " . $selected[1] . ">管理者</option>\n";
			echo "		<option value = '2' " . $selected[2] . ">醫事人員</option>\n";
			echo "		<option value = '3' " . $selected[3] . ">管理級醫事人員</option>\n";
			echo "	</select>\n";
			echo "	<input type = 'hidden' id = 'action' name = 'action' value = 'power'>\n";      //使用者ID
			echo "	<input type = 'hidden' id = 'userid' name = 'userid' value = '" . $row['id'] . "'>\n";      //使用者ID
			echo "	<input type = 'hidden' id = 'powerid' name = 'powerid' value = '" . $pvalue['id'] . "'>\n"; //權限ID
			echo "	</td>\n";
			echo "</tr>\n";
			echo "</form>\n";
			unset($selected);
			$i++;
		}
	}
	if ( $user_total > PAGE_NUM && $_POST['powertype'] == '' )   //判斷資料庫中的資料是否大於每頁顯示數量
	{
		echo "<tr bgcolor = '#FFFFFF'>\n";
		echo "	<td align = 'center' class = 'text13px' colspan = '7'>\n";
		
	echo "總數:".$user_total."　頁數:".($page+1)."　總頁:".$total_page."<br>";
	
		echo "<a href = '" . ROOT_URL . "/admin/admin.php?op=" . $_GET['op'] . "'>第一頁</a>";
		if ($page > 0)
		{
			$up = $page - 1;
			echo "	<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/admin.php?op=" . $_GET['op'] . "&page=" . $up . "'>上一頁</a></span>";
		}
		if ($page < ($total_page - 1))
		{
			$next = $page + 1;
			echo "	<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/admin.php?op=" . $_GET['op'] . "&page=" . $next . "'>下一頁</a></span>";
		}
		echo "	<span style = 'padding-left:10px'><a href = '" . ROOT_URL . "/admin/admin.php?op=" . $_GET['op'] . "&page=" . ($total_page - 1) . "'>最後一頁</a></span>";
		echo "	</td>\n";
		echo "</tr>\n";
	}
	if ($i == 0)
	{
		echo "<tr bgcolor = '#FFFFFF'>\n";
		echo "	<td class = 'text13px' align = 'center' colspan = '7'><font color = '#FF0000'>查無資料!!請重新查詢</font></td>\n";
		echo "</tr>\n";
	}
	?>
	</table>
	</td>
</tr>
</table>

<script language = 'javascript'>
<!--
function checksearch()
{
	var obj = document.searchform;
	if ( trim(obj.keyword.value) == '' || trim(obj.keyword.value) == '請輸入查詢關鍵字' )
	{
		alert('請輸入查詢關鍵字!!');
		obj.keyword.value = '';
		obj.keyword.focus();
	}else{
		obj.submit();
	}
}
//-->
</script>
