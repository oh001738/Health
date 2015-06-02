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
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">登入系統</h4>
				</div>
				<div class="modal-body">
					<form id ="loginform" name="loginform" method="post" action="login.php" role="login">
						<!--<img src="http://i.imgur.com/RcmcLv4.png" class="img-responsive" alt="" />-->
						<input type="text" name="username" id="username" placeholder="帳號" class="form-control input-lg" value="" required/>
						<input type="password" class="form-control input-lg" name="password" id="password" placeholder="密碼" required/>
					<div class="pwstrength_viewport_progress"></div>
					<button type="submit" name="go" class="btn btn-lg btn-primary btn-block">登入</button>
					</form>
					<script language="JavaScript">
					</script>
				</div>

				</div>
			</div>
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