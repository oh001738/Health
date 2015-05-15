<?PHP 
include_once 'config.php';

//header_print(true);   //載入header檔

?>
<style type="text/css">
<!--
-->
</style>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<body>
<!--DWLayoutTable-->
	<?PHP
	if ($USER['userid'] == '')
	{
		echo "<div class=\"panel-body\">\n"; 
		echo "<div class=\"list-group\">\n"; 
		echo "<a href=\"" . ROOT_URL . "/user_add.php\" class=\"list-group-item active\">\n"; 
		echo "<h4 class=\"list-group-item-heading\">註冊會員</h4>\n"; 
		echo "<p class=\"list-group-item-text\">Register Account</p>\n"; 
		echo "</a>\n"; 
		echo "<a data-toggle=\"modal\" data-target=\"#float-login\" class=\"list-group-item\">\n"; 
		echo "<h4 class=\"list-group-item-heading\">會員登入</h4>\n"; 
		echo "<p class=\"list-group-item-text\">Login</p>\n"; 
		echo "</a>\n"; 
		echo "</div>\n"; 
		echo "</div>\n";
	}
	?>
<table border = '0' cellpadding = '' cellspacing = '' width = '100%'>	
<tr>
  <td height="45" colspan="4" valign="top"><a href = 'img/健康知識.doc'></a><img src="img/leftmenu2_02.jpg" width="212" height="45"></td>
</tr>
<tr>
  <td height="25" colspan="4" valign="top"><a href = 'food.php?class=food1'><img src="img/leftmenu2_05.jpg" width="212" height="25" border="0"></a></td>
</tr>
<tr>
  <td height="25" colspan="4" valign="top"><a href = 'food.php?class=food2'><img src="img/leftmenu2_06.jpg" width="212" height="25" border="0"></a></td>
</tr>
<tr>
  <td height="25" colspan="4" valign="top"><a href = 'food.php?class=food3'><img src="img/leftmenu2_07.jpg" width="212" height="25" border="0"></a></td>
</tr>
<tr>
  <td height="25" colspan="4" valign="top"><a href = 'food.php?class=food4'><img src="img/leftmenu2_08.jpg" width="212" height="25" border="0"></a></td>
</tr>
<tr>
  <td height="25" colspan="4" valign="top"><a href = 'food.php?class=food5'><img src="img/leftmenu2_09.jpg" width="212" height="25" border="0"></a></td>
</tr>
<tr>
  <td height="25" colspan="4" valign="top"><a href = 'food.php?class=food6'><img src="img/leftmenu2_10.jpg" width="212" height="25" border="0"></a></td>
</tr>
<tr>
  <td height="25" colspan="4" valign="top"><img src="img/leftmenu2_11.jpg" width="212" height="25" border="0" onmouseover = "show_display('other_div');"></td>
</tr>
<tr id = 'other_div' name = 'other_div' style = 'display:none'>
	<td>
	<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
	<tr>
		<td><a href = 'food.php?class=food7&class2=<?PHP echo rawurlencode('調味料');?>'><img src = '<?PHP echo ROOT_URL;?>/img/leftmenu2_11_1.jpg' border = '0'></a></td>
	</tr>
	<tr>
		<td><a href = 'food.php?class=food7&class2=<?PHP echo rawurlencode('中式早餐');?>''><img src = '<?PHP echo ROOT_URL;?>/img/leftmenu2_11_2.jpg' border = '0'></a></td>
	</tr>
	<tr>
		<td><a href = 'food.php?class=food7&class2=<?PHP echo rawurlencode('西式早餐');?>''><img src = '<?PHP echo ROOT_URL;?>/img/leftmenu2_11_3.jpg' border = '0'></a></td>
	</tr>
	<tr>
		<td><a href = 'food.php?class=food7&class2=<?PHP echo rawurlencode('家常菜');?>''><img src = '<?PHP echo ROOT_URL;?>/img/leftmenu2_11_4.jpg' border = '0'></a></td>
	</tr>
	<tr>
		<td><a href = 'food.php?class=food7&class2=<?PHP echo rawurlencode('小吃');?>''><img src = '<?PHP echo ROOT_URL;?>/img/leftmenu2_11_5.jpg' border = '0'></a></td>
	</tr>
	<tr>
		<td><a href = 'food.php?class=food7&class2=<?PHP echo rawurlencode('套餐');?>''><img src = '<?PHP echo ROOT_URL;?>/img/leftmenu2_11_6.jpg' border = '0'></a></td>
	</tr>
	<tr>
		<td><a href = 'food.php?class=food7&class2=<?PHP echo rawurlencode('零食點心');?>''><img src = '<?PHP echo ROOT_URL;?>/img/leftmenu2_11_7.jpg' border = '0'></a></td>
	</tr>
	<tr>
		<td><a href = 'food.php?class=food7&class2=<?PHP echo rawurlencode('飲料');?>''><img src = '<?PHP echo ROOT_URL;?>/img/leftmenu2_11_8.jpg' border = '0'></a></td>
	</tr>
	<tr>
		<td><a href = 'food.php?class=food7&class2=<?PHP echo rawurlencode('酒類');?>''><img src = '<?PHP echo ROOT_URL;?>/img/leftmenu2_11_9.jpg' border = '0'></a></td>
	</tr>
	</table>
	</td>
</tr>
<tr>
  <td height="25" colspan="4" valign="top"><a href = 'measure.php'><img src="img/leftmenu2_17.jpg" width="212" height="25" border="0"></a></td>
</tr>
<tr>
  <td height="56" colspan="4" valign="top"><a href = '<?PHP echo ROOT_URL;?>/img/認識食物.doc'><span style="padding-top:0px;padding-left:0px"><img src="img/leftmenu2_12.jpg" width="212" height="56" border="0" /></span></a><a href="weight.php"></a></td>
</tr>
<tr>
  <td height="25" colspan="4" valign="top"><a href="knowegg.php"><img src="img/leftmenu2_13.jpg" width="212" height="25" border="0" /></a></td>
</tr>
<tr>
  <td height="25" colspan="4" valign="top"><a href = 'potassium.php'><img src="img/leftmenu2_14.jpg" width="212" height="25" border="0" /></a></td>
</tr>
<tr>
  <td height="25" colspan="4" valign="top"><a href = 'phosphorous.php'><img src="img/leftmenu2_15.jpg" width="212" height="25" border="0" /></a><a href = 'no_1.php'></a></td>
</tr>
<tr>
  <td height="27" colspan="4" valign="top"><a href = 'knowna.php'><img src="img/leftmenu2_16.jpg" width="212" height="25" border="0" /></a><a href = 'no_2.php'></a></td>
</tr>
<tr>
  <td height="131" colspan="4" valign="top"><a href = 'history.php'><img src="img/leftmenu_bt1.jpg" width="212" height="131" border="0" /></a><a href = 'no_3.php'></a></td>
</tr>
<tr>
  <td height="11"></td>
  <td></td>
  <td></td>
  <td></td>
</tr>
</table>