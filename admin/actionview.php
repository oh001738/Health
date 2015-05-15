<?PHP
//刪除資料
/*if ( $_GET['type'] == 'del' && trim($_GET['id']) != '' )  
{
	$sql = "DELETE FROM action_log WHERE id = '" . trim($_GET['id']) . "'";
	if ( mysql_query($sql) )
	{
		showMsg('刪除成功!!');
		reDirect( base64_decode($_GET['backurl']) );
	}else{
		showMsg('刪除失敗，請洽系統管理員!!');
		reDirect( base64_decode($_GET['backurl']) );
	}
}*/
?>
<?php
if ( $op == 'actionview' )
{
    echo "<table border = '0' cellpadding = '4' cellspacing = '1' width = '95%' valign = 'top'>\n";
    echo "<form action = '" . ROOT_URL . "/admin/admin.php?op=actionview' id = 'searchform' name = 'searchform' method = 'post'>\n";
    echo "<tr>\n";	
	echo "  <td><div style = 'width:110px'><div class = 'title'>檢視行為記錄</div></div></td>\n";
    echo "  <td align = 'right'>\n";
		echo "<select id = 'type' name = 'type' onChange=Javascript:changelist();>\n";
		echo "<option selected value='0'>請選擇</option>\n";
		echo "<option value='username'>帳號</option>\n";
		echo "<option value = 'actid'>動作</option>\n";
		echo "<option value = 'actime'>時間</option>\n";
		echo "  </select>\n";
	echo "<span id=searchlist></span>";
    //echo "  <input type = 'text' id = 'keyword' name = 'keyword' style = 'width:100px'>\n";
    echo "  <input type = 'hidden' id = 'action' name = 'action' value = 'search'>\n";	 
    echo "  <input type = 'submit' id = 'search' name = 'search' value = '查詢會員'>\n";

    echo "</tr>\n";
    echo "</form>\n";
    echo "</table>\n";	
 
    echo "<table border = '1' cellpadding = '4' cellspacing = '1' width = '95%' valign = 'top' style = 'border-collapse:collapse' bgcolor = '#AAAAAA'>\n";
	echo "	<tr bgcolor = '#EDEDDE'>\n";
	echo "		<td width=5% class = 'text13px' align = 'center'>序號</td>\n";
	echo "		<td class = 'text13px' align = 'center'>帳號</td>\n";
	echo "		<td class = 'text13px' align = 'center'>行為</td>\n";
	echo "		<td width=30% class = 'text13px' align = 'center'>時間</td>\n";
	//echo "		<td class = 'text13px' align = 'center' width = '5%'>刪除</td>\n";
	echo "	</tr>\n";
	
    $action  = (trim($_GET['action']) == '')? $_POST['action'] : $_GET['action'];
	$type    = (trim($_GET['type']) == '')? $_POST['type'] : urldecode($_GET['type']);
	$keyword = (trim($_GET['keyword']) == '')? $_POST['keyword'] : urldecode($_GET['keyword']);
	
	if ( $action == 'search' )
    	{
			if ( trim($keyword) != '')
			{
				if(trim($type) == 'username')
				{
					$sqlwhe = " WHERE username LIKE '%" . $keyword . "%'";
				}
				elseif(trim($type) == 'actid')
				{
					$sqlwhe = " WHERE " . $type . " = '". $keyword."'";
				}
				elseif(trim($type) == 'actime')
				{
					$sqlwhe = " WHERE actime LIKE '%" . $keyword . "%'"; ///*****
				}
			}			
    	}	
	
	

    $start_num = (!$_GET['page'])? '0' : $_GET['page'] * PAGE_NUM; //SQL開始筆數
    $sql = "SELECT * FROM action_log " . $sqlwhe . " LIMIT " . $start_num . "," . PAGE_NUM;
    $result = mysql_query($sql);
    $i = 0;	
    	
	date_default_timezone_set("Asia/Taipei");

	while( $row = mysql_fetch_array($result) )
	{
		$bgcolor = ($i % 2 == 0)? '#FFFFFF' : '#EEEEEE';
		echo "<tr bgcolor = '" . $bgcolor . "'>\n";
		echo "	<td class = 'text13px'>" . $row['id'] . "</td>\n";
		echo "	<td class = 'text13px'>" . $row['username'] . "</td>\n";
		echo "	<td class = 'text13px'>" . $ACTTYPE[$row['actid']] . "</td>\n";
		echo "	<td class = 'text13px'>" . date("Y-m-d H:i:s", $row['actime']) . "</td>\n";
		//echo "	<td class = 'text13px' align = 'center'><a href = '" . ROOT_URL . "/admin/admin.php?op=" . $_GET['op'] . "&type=del&id=" . $row['id'] . "&backurl=" . base64_encode(getenv("REQUEST_URI")) . "' onclick = 'return confirm(\"確定要刪除嗎?\")'>刪除</a></td>\n";
		echo "</tr>\n";
		$i++;
	}
    echo "</table>\n";
    
    
    echo "<div style = 'padding-top:5px;padding-bottom:5px'>\n";
    echo "<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>\n";
    echo "<tr bgcolor = '#FFFFFF'>\n";
    echo "  <td align = 'center' class = 'text13px'>\n";
	if ( $action == 'search' )
	{
		if ( trim($keyword) != '' )
		{
			$link = '&action=search&type=' . urlencode($type) . '&keyword=' . urlencode($keyword);
		}
	}
	else
	{
		$link = '';
	}

		if($USER['power']==1)
		{
			$act_total = countSQL('action_log', 'id', $sqlwhe);     //計算會員總數
		}

    	$page = ($_GET['page'])? $_GET['page'] : 0;   //設定目前頁數
	    $total_page = ceil($act_total / PAGE_NUM);   //計算總共頁
		
		echo "總數:".$act_total."　頁數:".($page+1)."　總頁:".$total_page."<br>";
	
    	if ( $act_total > PAGE_NUM )   //判斷資料庫中的資料是否大於每頁顯示數量
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
		
	
    echo "  </td>\n";
    echo "</tr>\n";
    echo "</table>\n";
}

?>

<script language = 'javascript'>
<!--
function select_name()
{
	window.open('select_name.php','','height=500,width=500,toolbar=no,scrollbars=yes,resizable=no,top=100,left=100');
}

function select_date(inputId, time)
{
	var dvalue = document.getElementById(inputId).value;
	window.open('select_date.php?id=' + inputId + '&time=' + time + '&dvalue=' + dvalue,'','height=50,width=300,toolbar=no,scrollbars=yes,resizable=no,top=100,left=100');
}

function check()
{
	var obj = document.attentionform;
	var time1 = obj.food_date.value;
	var time2 = obj.food_date2.value;
	if ( trim(time1) != ''){ time1 = time1.split('-'); }
	if ( trim(time2) != ''){ time2 = time2.split('-'); }

	document.getElementById('user_name').style.border  = '1px solid #7F9DB9';

	if ( trim(obj.case_id.value) == '' )
	{
		alert("請輸入病歷號碼!!");
		obj.case_id.focus();

	}else if ( trim(obj.attention_date.value) == '' )
	{
		alert("請輸入衛教日期!!");
		obj.attention_date.focus();
	
	}else if ( trim(obj.user_name.value) == '' )
	{
		alert("請輸入姓名!!");
		obj.user_name.focus();

	}else if ( !cktime(time1[0], time1[1], time1[2], time2[0], time2[1], time2[2]) && (trim(obj.food_date.value) != '' || trim(obj.food_date2.value) != '') )
	{
		alert('請選擇正確時間!!');
		obj.food_date2.focus();

	}else if ( !chk_Total(obj.case_id.value, 50) )
	{
		alert('字數超過限制，請輸入25個以內中文字!!');
		obj.case_id.focus();

	}else if ( !chk_Total(obj.user_name.value, 200) )
	{
		alert('字數超過限制，請輸入100個以內中文字!!');
		document.getElementById('user_name').style.border  = '2px solid #FA0300';
		obj.user_name.focus();

	}else if ( !chk_Total(obj.doctor.value, 200) )
	{
		alert('字數超過限制，請輸入100個以內中文字!!');
		obj.doctor.focus();

	}else if ( !chk_Total(obj.fixweight.value, 50) )
	{
		alert('字數超過限制，請輸入25個以內中文字!!');
		obj.fixweight.focus();

	}else if ( !chk_Total(obj.need_cal.value, 100) )
	{
		alert('字數超過限制，請輸入50個以內中文字!!');
		obj.need_cal.focus();

	}else if ( !chk_Total(obj.get_egg.value, 100) )
	{
		alert('字數超過限制，請輸入50個以內中文字!!');
		obj.get_egg.focus();
	
	}else if ( !chk_Total(obj.principal_food.value, 200) )
	{
		alert('字數超過限制，請輸入100個以內中文字!!');
		obj.principal_food.focus();
	
	}else if ( !chk_Total(obj.fruit.value, 200) )
	{
		alert('字數超過限制，請輸入100個以內中文字!!');
		obj.fruit.focus();
	
	}else if ( !chk_Total(obj.oil.value, 200) )
	{
		alert('字數超過限制，請輸入100個以內中文字!!');
		obj.oil.focus();
	
	}else if ( !chk_Total(obj.meat.value, 200) )
	{
		alert('字數超過限制，請輸入100個以內中文字!!');
		obj.meat.focus();
	
	}else if ( !chk_Total(obj.vegetables.value, 200) )
	{
		alert('字數超過限制，請輸入100個以內中文字!!');
		obj.vegetables.focus();
	
	}else if ( !chk_Total(obj.starch.value, 200) )
	{
		alert('字數超過限制，請輸入100個以內中文字!!');
		obj.starch.focus();
	
	}else{
		obj.submit();
	}
}

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

function open_history(userid, username)
{
	if ( trim(userid) != '' && trim(username) != '')
	{
		var historyId = userid;
		var username  = username;
	}else{
		var historyId = document.getElementById('userid').value;
		var username  = document.getElementById('user_name').value;
	}
	window.open('view_history.php?historyid=' + historyId + '&username=' + escape(username),'會員飲食日誌','height=450,width=740,toolbar=no,scrollbars=yes,resizable=yes,top=20,left=20');
}

changelist();
function changelist()
{
	switch(document.searchform.type.value)
	{
		case "0":document.all.searchlist.innerHTML=""
			break;
		
		case "username":
			document.all.searchlist.innerHTML="<input type = 'text' id = 'keyword' name = 'keyword' style = 'width:155px'>"
			break;
		
		case "actid":
			document.all.searchlist.innerHTML="<input type = 'text' id = 'keyword' name = 'keyword' style = 'width:155px'>"
			break;		
			
		case "actime":
			document.all.searchlist.innerHTML= "<td class = 'text13px' id = 'keyword' name = 'keyword'>民國<select id = 'year' name = 'year' class = 'text13px'>"
			for (i = 1; i <= (date("Y") - 1911); i++)
		    {
        		document.write("<option value = ' (i + 1911) ' selected > i</option>")
		    }
			break;
		}
}

datesearch();
function datesearch()
{
	"<td class = 'text13px' id = 'keyword' name = 'keyword'>民國<select id = 'year' name = 'year' class = 'text13px'>"
    for (i = 1; i <= (date("Y") - 1911); i++)
    {
        document.write("<option value = ' (i + 1911) ' selected > i</option>")
    } 
		document.write("</select> 年<select id = 'month' name = 'month' class = 'text13px'>")
    for (i = 1; i <= 12; i++)
    {
       document.write( "<option value = 'i' selected > i </option>")
    }
    document.write("</select> 月<select id = 'day' name = 'day' class = 'text13px'>")
    for (i = 1; i <= 31; i++)
    {
        document.write("<option value = 'i ' $selected> i </option>")
    }
    document.write("</select> 日</td>")
}

//-->
</script>

