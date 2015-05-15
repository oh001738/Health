<!--truncate action_log-->
<?PHP 
require_once 'config.php';
if ( trim($_POST['username']) != '' && trim($_POST['password']) != '' )	//判斷是否有送出帳號密碼
{
	login_user( trim($_POST['username']), trim($_POST['password']) );
}
?>
<div class="modal fade" id="float-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">登入系統</h4>
		</div>
		<div class="modal-body">
			<form id ="loginform" name="loginform" method="post" action="login.php" role="login">
				<!--<img src="http://i.imgur.com/RcmcLv4.png" class="img-responsive" alt="" />-->
				<input type="text" name="username" id="username" placeholder="帳號" class="form-control input-lg" value="" required/>
				<input type="password" class="form-control input-lg" name="password" id="password" placeholder="密碼" required/>
			<div class="pwstrength_viewport_progress"></div>
			<button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Sign in</button>
			</form>
			<script language="JavaScript">
			</script>
		</div>

		</div>
	</div>
</div>

