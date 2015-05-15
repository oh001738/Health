<table border = '0' cellpadding = '4' cellspacing = '0' width = '100%' valign = 'top'>
<?PHP
if ($USER['power'] == '2' || $USER['power'] == '3')
{
	echo "<tr>\n";
	echo "	<td align = 'center'><div style = 'padding-left:10px'><div class = 'title'>醫事人員</div></div></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'><a href = '" . ROOT_URL . "/admin/admin.php?op=food_element'>".(($USER['power'] == '3')?("維護食材"):("檢視食材"))."</a></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'><a href = '" . ROOT_URL . "/admin/admin.php?op=food'>".(($USER['power'] == '3')?("維護食物"):("檢視食物"))."</a></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'><a href = '" . ROOT_URL . "/admin/admin.php?op=suitfood'>".(($USER['power'] == '3')?("維護套餐"):("檢視套餐"))."</a></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'><a href = '" . ROOT_URL . "/admin/admin.php?op=user'>".(($USER['power'] == '3')?("維護個人資料"):("檢視個人資料"))."</a></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'><a href = '" . ROOT_URL . "/admin/admin.php?op=attention'>維護個案照顧記錄</a></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'><a href = '" . ROOT_URL . "/logout.php'>登出</a></td>\n";
	echo "</tr>\n";

}else{
	echo "<tr>\n";
	echo "	<td align = 'center'><div style = 'padding-left:10px'><div class = 'title'>後台管理</div></div></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'><a href = '" . ROOT_URL . "/admin/admin.php?op=food_element'>維護食材元素</a></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'><a href = '" . ROOT_URL . "/admin/admin.php?op=food'>維護食物</a></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'><a href = '" . ROOT_URL . "/admin/admin.php?op=suitfood'>維護套餐</a></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'><a href = '" . ROOT_URL . "/admin/admin.php?op=user'>維護個人資料</a></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'><a href = '" . ROOT_URL . "/admin/admin.php?op=attention'>維護個案照顧記錄</a></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'><a href = '" . ROOT_URL . "/admin/admin.php?op=power'>權限管理</a></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'><a href = '" . ROOT_URL . "/admin/admin.php?op=actionview'>檢視行為紀錄</a></td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "	<td align = 'center'><a href = '" . ROOT_URL . "/logout.php'>登出</a></td>\n";
	echo "</tr>\n";
}
?>
</table>
