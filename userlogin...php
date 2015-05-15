<!--truncate action_log-->
<?PHP 
include_once 'config.php';

header_print(true);   //載入header檔

if ( trim($_POST['username']) != '' && trim($_POST['password']) != '' )	//判斷是否有送出帳號密碼
{
	login_user( trim($_POST['username']), trim($_POST['password']) );
}

if ( ck_login($USERS['session_id']) )
{
	phpDirect(ROOT_URL);
}

?>
<body>
	<?PHP include_once ROOT_PATH . '/menubar.php';?>
	<div class="container">	
	<div class="row">
		<div class="col-md-3 visible-lg visible-md">
		<?PHP
			$nowL = array('首頁' => 'index.php', '會員登入' => 'userlogin.php');
			echo show_path_url($nowL);
		?>
		<?PHP include_once ROOT_PATH . "/leftmenu.php";?>
		</div>
		<div class="col-md-9">
		
			  <table align = 'center'>
			  <tr>
			     <td><img src = '<?PHP echo ROOT_URL;?>/img/border/border_top_left.jpg'></td>
				 <td background = '<?PHP echo ROOT_URL;?>/img/border/border_top_middle.jpg'></td>
				 <td><img src = '<?PHP echo ROOT_URL;?>/img/border/border_top_right.jpg'></td>
			  </tr>
			  <tr>
			     <td background = '<?PHP echo ROOT_URL;?>/img/border/border_middle_left.jpg'></td>
			     <td valign = 'top' align = 'center'>
				 <table border = '0' cellpadding = '3' cellspacing = '1' width = '100%'>
				 <tr>
				    <td align = 'center'><img src = '<?PHP echo ROOT_URL;?>/img/login.jpg'></td>
				 </tr>
				 <tr>
				    <td align = 'center'>
				  <?PHP
					if ($USER['userid'] == '')
					{
						echo "<form id = 'loginform' name = 'loginform' method = 'post' action = 'userlogin.php'>\n";
						echo "<form class=\'form-horizontal\'>\n"; 
						echo "<div class=\"form-group\">\n"; 
						echo "<label for=\"UserLoginID\"class=\"col-sm-3 control-label\">帳號</label>\n"; 
						echo "<div class=\"col-sm-9\">\n"; 
						echo "<input type=\"text\"name=\"username\"class=\"form-control\"id=\"username\"placeholder=\"請輸入您的帳號\">\n"; 
						echo "</div>\n"; 
						echo "</div>\n"; 
						echo "<div class=\"form-group\">\n"; 
						echo "<label for=\"UserLoginPW\"class=\"col-sm-3 control-label\">密碼</label>\n"; 
						echo "<div class=\"col-sm-9\">\n"; 
						echo "<input type=\"password\"class=\"form-control\"name=\"password\"id=\"password\"placeholder=\"請輸入您的密碼\">\n"; 
						echo "</div>\n"; 
						echo "</div>\n"; 
						echo "<div class=\"form-group\">\n"; 
						echo "<div class=\"col-sm-offset-2col-sm-10\">\n"; 
						echo "   <input type = 'button' class = 'btn btn-primary' name = 'ok' id = 'ok' value = '確定' onclick = 'javascript:check_login2();'>\n";
						echo "   <input type = 'reset' class = 'btn btn-default' name = 'reset' id = 'reset' value = '清除'></span></td>\n"; 
						echo "</div>\n"; 
						echo "</div>\n"; 
						echo "</form>\n";		
						
					}
					?>
				 </td>
				 </tr>
				 </table>
				 </td>
				 <td background = '<?PHP echo ROOT_URL;?>/img/border/border_middle_right.jpg'></td>
			  </tr>
			  <tr>
			     <td><img src = '<?PHP echo ROOT_URL;?>/img/border/border_bottom_left.jpg'></td>
				 <td background = '<?PHP echo ROOT_URL;?>/img/border/border_bottom_middle.jpg'></td>
				 <td><img src = '<?PHP echo ROOT_URL;?>/img/border/border_bottom_right.jpg'></td>
			  </tr>
		</div>

		
    </div> <!-- /container -->
	
<script language = 'javascript'>
<!--
function check_login2()
{
	var Obj = document.loginform;
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
</body>
</html>