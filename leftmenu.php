<?PHP 
include_once 'config.php';

#header_print(true);   //載入header檔

/*if ( trim($_POST['username']) != '' && trim($_POST['password']) != '' )	//判斷是否有送出帳號密碼
{
	login_user( trim($_POST['username']), trim($_POST['password']) );
}*/

?>
<style type="text/css">
<!--
-->
</style>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<?PHP
if ($USER['userid'] == '')
	{
		echo "<div class=\"panel-body\">\n"; 
		echo "<div class=\"list-group\">\n"; 
		echo "<a href=\"" . ROOT_URL . "/user_add.php\" class=\"list-group-item active\">\n"; 
		echo "<h4 class=\"list-group-item-heading\">註冊會員</h4>\n"; 
		echo "<p class=\"list-group-item-text\">Register Account</p>\n"; 
		echo "</a>\n"; 
		echo "<a href=\"#\" data-toggle=\"modal\" data-target=\"#float-login\" class=\"list-group-item\">\n";		
		echo "<h4 class=\"list-group-item-heading\">會員登入</h4>\n"; 
		echo "<p class=\"list-group-item-text\">Login</p>\n"; 
		echo "</a>\n"; 
		echo "</div>\n"; 
		echo "</div>\n";
	}
?>
<table border = '0' cellpadding = '' cellspacing = '' width = '100%'> 
<tr>
<td height="139" colspan="4" align="left" valign="top">
<!--登入/註冊--> 

<!--圖1-->    
    <a href = 'history.php'><div style = 'padding-top:0px;padding-left:0px'>
      <div><img src="img/leftmenu_bt1.jpg" width="212" height="131" border="0" /></div>
	  </div>
    </a></td>
</tr>
<!--圖2-->
<tr>
  <td height="145" colspan="4" align="left" valign="top">
	  <div style = 'padding-top:0px;padding-left:0px'>
	  <div class = ''><img src="img/leftmenu_bt2.jpg" width="212" height="137" border="0" /></div>
	</div></td>
</tr>
<!--健康知識-->
<tr>
  <td height="31" colspan="4" valign="top">
	  <div style = 'padding-top:0px;padding-left:0px'>
	  <div class = ''><img src="img/leftmenu_knowledge.jpg" width="212" height="23" border="0" /></div>
	</div></td>
</tr>
<tr>
  <td height="27" colspan="4" valign="top"><a href = 'type_1.php'><div class = 'title2' style = 'padding-left:25px'>秘訣一
    
  </div>
  </a></td>
</tr>

<tr>
  <td height="27" colspan="4" valign="top"><a href="weight.php"><div class = 'title2' style = 'padding-left:25px'>認識體重</div>
  </a></td>
</tr>
<!--疾病知識-->
<tr>
  <td height="31" colspan="4" valign="top"><div style = 'padding-top:0px;padding-left:0px'>
    <div class = ''><img src="img/leftmenu_kidney.jpg" width="212" height="23" /></div>
    </div></td>
</tr>
<tr>
  <td height="27" colspan="4" valign="top"><a href = 'no_1.php'><div class = 'title2' style = 'padding-left:25px'>腎臟移植</div>
  </a></td>
</tr>
</table>
<script language = 'javascript'>
<!--
function check_login()
{
	var Obj = document.form1;
	if ( trim(Obj.username.value) == '' )
	{
		alert('請輸入帳號!!');
		Obj.username.focus();
	
	}else if ( trim(Obj.password.value) == '' )
	{
		alert('請輸入密碼!!');
		Obj.password.focus();
	
	}else{
		Obj.submit();
	}
}
//-->
</script>
