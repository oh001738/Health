<?PHP
require_once "../config.php";
//header_print(true);   

if ( !ckadmin() )
{
	showMsg("非管理者無法進入");
	reDirect(ROOT_URL);
	exit;
}
$op = ($_GET['op'])? $_GET['op'] : 'dashboard';

?>
<?PHP
if ( ck_login(session_id()) ){
	$showName = ( trim($USER['c_name']) != '')? $USER['c_name'] : $USER['username'];}
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<!-- HTML的HEADER -->
<?php include_once "./header.php";?>
  <body class="skin-green">
    <div class="wrapper">

	<!-- 主要導覽列 -->
	<?php include_once "./main_header.php";?>
    <!-- 左邊側欄 --> 
	<?php include_once "./sidebar.php";?>

      <!-- 內容主頁上 -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<?PHP
			$pageName['food_element'] = (($USER['power'] == '1'|| $USER['power'] =="3")?("維護食材"):("檢視食材"));
			$pageName['food'] = (($USER['power'] == '1'|| $USER['power'] =="3")?("維護食物"):("檢視食物"));
			$pageName['suitfood'] = (($USER['power'] == '1'|| $USER['power'] =="3")?("維護套餐"):("檢視套餐"));
			$pageName['user'] = (($USER['power'] == '1'|| $USER['power'] =="3")?("維護個人資料"):("檢視個人資料"));
			$pageName['attention'] = '維護個案照顧記錄';
			$pageName['power'] = '權限管理';		
			$pageName['actionview'] = '檢視行為紀錄';
			$pageName['dashboard'] = '儀錶板';
			$backName = ($USER['username'] == 'nurse')? '醫事人員' : '後台管理';
			$nowL = array($backName => 'adminlte/index.php', $pageName[$op] => 'adminlte/index.php?op='.$op);
		?>
        <section class="content-header">
          <h1>
			<?php echo $pageName[$op]; ?>
			<small>::</small>
          </h1>
		  
          <ol class="breadcrumb">
            <li><a href="./index.php"><i class="fa fa-dashboard"></i><?php echo $backName;?></a></li>
            <li class="active"><?php echo $pageName[$op];?></li>
          </ol>
        </section>

        <!-- 主內容 -->
        <section class="content">
		<?PHP
		switch ($op)
		{
			default:
				include_once ($op . '.php');
				break;
		}
		?>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php include_once "./footer.php";