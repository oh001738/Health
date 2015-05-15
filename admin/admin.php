<?PHP
include "../config.php";
include "../header.php"; //載入header檔

//header_print(true);   

if ( !ckadmin() )
{
	showMsg("非管理者無法進入");
	reDirect(ROOT_URL);
	exit;
}



$op = ($_GET['op'])? $_GET['op'] : 'mainadmin';
?>

<body>
<table border = '1' cellpadding = '0' cellspacing = '0' width = '100%' class = 'header_table'>
<tr>
	<td valign = 'top'><?PHP include_once ROOT_PATH . "/menubar.php";?></td>
</tr>
<tr>
	<td>
	<div class = 'fast_link'>
	<?PHP
	$pageName['food_element'] = (($USER['power'] == '1'|| $USER['power'] =="3")?("維護食材"):("檢視食材"));
	$pageName['food'] = (($USER['power'] == '1'|| $USER['power'] =="3")?("維護食物"):("檢視食物"));
	$pageName['suitfood'] = (($USER['power'] == '1'|| $USER['power'] =="3")?("維護套餐"):("檢視套餐"));
	$pageName['user'] = (($USER['power'] == '1'|| $USER['power'] =="3")?("維護個人資料"):("檢視個人資料"));
	$pageName['attention'] = '維護個案照顧記錄';
	$pageName['power'] = '權限管理';		
	$pageName['actionview'] = '檢視行為紀錄';
	$backName = ($USER['username'] == 'nurse')? '醫事人員' : '後台管理';
	$nowL = array('首頁' => 'index.php', $backName => 'admin/admin.php', $pageName[$op] => 'admin/admin.php?op='.$op);
	echo show_path_url($nowL);
	?>
	</div>
	</td>
</tr>
<tr>
	<td valign = 'top'>
	<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
	<tr>
		<td class = 'leftmenu' valign = 'top' align = 'center'><?PHP include_once ROOT_PATH . '/admin/menu-o.php';?></td>
		<td align = 'center' valign = 'top'>
		<?PHP
		switch ($op)
		{
			default:
				include_once ($op . '.php');
				break;
		}
		?>
		</td>
	</tr>
	</table>
	</td>
</tr>
<tr>
	<td>
	<?PHP include_once ROOT_PATH . "/footer.php";?>
	</td>
</tr>
</table>
</body>