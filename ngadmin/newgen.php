<?PHP
include "../config.php";
//header_print(true);   

if ( !ckadmin() )
{
	showMsg("非管理者無法進入");
	reDirect(ROOT_URL);
	exit;
}
$op = ($_GET['op'])? $_GET['op'] : 'mainadmin';

?>
<?php include_once ROOT_PATH .'/ngadmin/ngheader.php';
?>
<body>

    <div id="wrapper">
			<!-- Navigation -->
				<?PHP include_once ROOT_PATH . '/ngadmin/ngmenu.php';?>
			<!-- /.navbar-static-side -->
        <div id="page-wrapper">
		<?PHP
			$pageName['food_element'] = (($USER['power'] == '1'|| $USER['power'] =="3")?("維護食材"):("檢視食材"));
			$pageName['food'] = (($USER['power'] == '1'|| $USER['power'] =="3")?("維護食物"):("檢視食物"));
			$pageName['suitfood'] = (($USER['power'] == '1'|| $USER['power'] =="3")?("維護套餐"):("檢視套餐"));
			$pageName['user'] = (($USER['power'] == '1'|| $USER['power'] =="3")?("維護個人資料"):("檢視個人資料"));
			$pageName['attention'] = '維護個案照顧記錄';
			$pageName['power'] = '權限管理';		
			$pageName['actionview'] = '檢視行為紀錄';
			$backName = ($USER['username'] == 'nurse')? '醫事人員' : '後台管理';
			$nowL = array($backName => 'ngadmin/newgen.php', $pageName[$op] => 'ngadmin/newgen.php?op='.$op);
			echo show_path_url($nowL);
		?>
		
		<?PHP
		switch ($op)
		{
			default:
				include_once ($op . '.php');
				break;
		}
		?>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
</body>

</html>
