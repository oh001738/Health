      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">		
          <!-- search form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            
            <!-- Optionally, you can add icons to the links -->
		<?PHP
		if ($USER['power'] == '2' || $USER['power'] == '3')
		{
			echo "<li class='header'>醫事人員</li>\n";
				echo "<li><a href = '" . ROOT_URL . "'><i class='fa fa-home fa-fw'></i>回主畫面</a></li>\n";
				echo "<li><a href = '" . ROOT_URL . "/adminlte/index.php'><i class='fa fa-tachometer fa-fw'></i>儀錶板</a></li>\n";
				echo "<li><a href = '" . ROOT_URL . "/adminlte/index.php?op=food_element'><i class='fa fa-flask fa-fw'></i>".(($USER['power'] == '3')?("維護食材"):("檢視食材"))."</a></li>\n";
				echo "<li><a href = '" . ROOT_URL . "/adminlte/index.php?op=food'><i class='fa fa-cutlery fa-fw'></i>".(($USER['power'] == '3')?("維護食物"):("檢視食物"))."</a></li>\n";
				//取消套餐功能 echo "<li><a href = '" . ROOT_URL . "/adminlte/index.php?op=suitfood'><i class='fa fa-shopping-cart fa-fw'></i>".(($USER['power'] == '3')?("維護套餐"):("檢視套餐"))."</a></li>\n";
				echo "<li><a href = '" . ROOT_URL . "/adminlte/index.php?op=user'><i class='fa fa-table fa-fw'></i>".(($USER['power'] == '3')?("維護個人資料"):("檢視個人資料"))."</a></li>\n";
				echo "<li><a href = '" . ROOT_URL . "/adminlte/index.php?op=attention'><i class='fa fa-user-plus fa-fw'></i>維護個案照顧記錄</a></li>\n";		
				echo "<li><a href = '" . ROOT_URL . "/logout.php'><i class='fa fa-sign-out fa-fw'></i>登出</a></li>\n";
		}else{
			echo "<li class='header'>管理人員</li>\n";
				echo "<li><a href = '" . ROOT_URL . "'><i class='fa fa-home fa-fw'></i>回主畫面</a></li>\n";
				echo "<li><a href = '" . ROOT_URL . "/adminlte/index.php'><i class='fa fa-tachometer fa-fw'></i>儀錶板</a></li>\n";
				echo "<li><a href = '" . ROOT_URL . "/adminlte/index.php?op=food_element'><i class='fa fa-flask fa-fw'></i>維護食材元素</a></li>\n";
				echo "<li><a href = '" . ROOT_URL . "/adminlte/index.php?op=food'><i class='fa fa-cutlery fa-fw'></i>維護食物</a></li>\n";
				//取消套餐功能 echo "<li><a href = '" . ROOT_URL . "/adminlte/index.php?op=suitfood'><i class='fa fa-shopping-cart fa-fw'></i>維護套餐</a></li>\n";
				echo "<li><a href = '" . ROOT_URL . "/adminlte/index.php?op=user'><i class='fa fa-table fa-fw'></i>維護個人資料</a></li>\n";
				echo "<li><a href = '" . ROOT_URL . "/adminlte/index.php?op=attention'><i class='fa fa-user fa-fw'></i>維護個案照顧記錄</a></li>\n";
				echo "<li><a href = '" . ROOT_URL . "/adminlte/index.php?op=power'><i class='fa fa-linux fa-fw'></i>權限管理</a></li>\n";
				echo "<li><a href = '" . ROOT_URL . "/adminlte/index.php?op=actionview'><i class='fa fa-terminal fa-fw'></i>檢視行為紀錄</a></li>\n";
				echo "<li><a href = '" . ROOT_URL . "/logout.php'><i class='fa fa-sign-out fa-fw'></i>登出</a></li>\n";

		}
		?>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>