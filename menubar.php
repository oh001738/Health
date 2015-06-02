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
          <a class="navbar-brand" href="<?PHP echo ROOT_URL;?>/index.php"><b>DRS</b>飲食記錄系統</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?PHP echo ROOT_URL;?>/kfoodroot.php"><i class="fa fa-pencil-square-o"></i>飲食記錄</a></li>
            <li><a href="<?PHP echo ROOT_URL;?>/history.php"><i class="fa fa-search"></i>查詢飲食記錄</a></li>
			<li><a href="<?PHP echo ROOT_URL;?>/food.php"><i class="fa fa-flask"></i>營養資料庫查詢</a></li>
          </ul>
        <ul class="nav navbar-nav navbar-right">
	<?PHP
		  	if(ck_login(session_id())){
			
			if (ckadmin())
			{
				if ( $USER['power'] == '1' )
				{
				
				echo "<li><a href = '" . ROOT_URL . "/adminlte/index.php'><i class=\"fa fa-server\"></i>後台管理</a></li>\n";

				}else if ($USER['power'] == '2' || $USER['power'] == '3')
				{
				echo "<li><a href = '" . ROOT_URL . "/adminlte/index.php'><i class=\"fa fa-server\"></i>醫療人員管理</a></li>\n";
				}
			}
			echo "<li><a href = '" . ROOT_URL . "/logout.php'><i class=\"fa fa-sign-out\"></i>登出</a></li>\n";
			}else{
				echo "<li><a href = '" . ROOT_URL . "/user_add.php'><i class=\"fa fa-sign-in\"></i>註冊會員</a></li>\n";
				echo "<li><a class=\"rect\" href=\"#\" data-toggle=\"modal\" data-target=\"#float-login\"><i class=\"fa fa-sign-out\"></i>登入</a></li>";
			}

	?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<?php
	require_once "login.php";
	?>
	<style type="text/css">body { padding-top: 60px; }</style>

