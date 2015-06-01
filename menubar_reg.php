<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?PHP echo ROOT_URL;?>/index.php">DRS-DEV 飲食記錄系統</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?PHP echo ROOT_URL;?>/kfoodroot.php">飲食記錄</a></li>
            <li><a href="<?PHP echo ROOT_URL;?>/history.php">查詢飲食記錄</a></li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">保健專區<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?PHP echo ROOT_URL;?>/food.php">認識食物</a></li>
                <li><a href="<?PHP echo ROOT_URL;?>/knowledge.php">健康知識</a></li>
                <li><a href="">預留區域</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">使用者回饋</li>
		<li><a href="<?PHP echo ROOT_URL;?>/webintro.php">使用說明</a></li>
		<li><a href="<?PHP echo ROOT_URL;?>/gbook00.php">留言板</a></li>
              </ul>
            </li>
          </ul>
        <ul class="nav navbar-nav navbar-right">
	<?PHP
		  	if(ck_login(session_id())){
			if (ckadmin())
			{
				if ( $USER['power'] == '1' )
				{
				
				echo "<li><a href = '" . ROOT_URL . "/adminlte/index.php'>新後台管理</a></li>\n";
				echo "<li><a href = '" . ROOT_URL . "/logout.php'>登出</a></li>\n";

				}else if ($USER['power'] == '2' || $USER['power'] == '3')
				{
				echo "<li><a href = '" . ROOT_URL . "/admin/admin.php'>醫療人員</a></li>\n";
				echo "<li><a href = '" . ROOT_URL . "/adminlte/index.php'>新醫療人員管理</a></li>\n";
				echo "<li><a href = '" . ROOT_URL . "/logout.php'>登出</a></li>\n";
				}
			}
			}else{
				echo "<li><a href = '" . ROOT_URL . "/user_add.php'>註冊會員</a></li>\n";
				echo "<li><a class=\"rect\" href=\"#\" data-toggle=\"modal\" data-target=\"#float-login\">登入</a></li>";
			}
	?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	<style type="text/css">body { padding-top: 60px; }</style>

