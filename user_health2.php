<?php /////使用者活動量(註冊會員用)?>

<?PHP 
include 'config.php';
header_print(true);   //載入header檔
?>

<style type="text/css">
<!--
.style4 {color: #FF0000}
.style9 {
	color: #0066FF;
	font-weight: bold;
}
.style10 {
	color: #99CC00;
	font-weight: bold;
}
.style11 {
	color: #FF0033;
	font-weight: bold;
}
.style12 {
	font-size: 14px;
	color: #666666;
}
-->
</style>
<body>

<table border = '1' cellpadding = '0' cellspacing = '0' class = 'header_table'>
<tr>
	<td><?PHP include_once ROOT_PATH . '/menubar.php';?></td>
</tr>
<tr>
	<td>
	<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
	<tr>
		<td>
		<div class = 'fast_link'>
		<?PHP
		$nowL = array('首頁' => 'index.php', '註冊會員' => '');
		echo show_path_url($nowL);
		?></td>
	</tr>
	<tr>
		<td valign = 'top'>
		<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
		<tr>
		   <td width = '180'><?PHP include_once ROOT_PATH . "/leftmenu.php";?></td>
		   <td valign = 'top'>
			  <table width="96%" border="0">
			  <form id="form1" name="form1" method="post" action="user_health3.php">
			  <tr>
					<td align = 'center' colspan = '2'><div style = 'padding-top:10px'><h3>熱量計算需要您提供活動量分級</h3></div></td>
				</tr>
				<tr>
				  <td align = 'right' width = '20%'><span class="style4">﹡</span>您的活動量分級是：</td>
				  <td>
					<input type="radio" name="actions" id="actions" value="輕度" checked>
					輕度
				  </label>
					</label></label></td>
				  </tr>
				<tr>
				  <td>&nbsp;</td>
				  <td>
					<input type="radio" name="actions" id="actions" value="中度" />
					中度</label>
					</label></td>
				  </tr>
				<tr>
				  <td>&nbsp;</td>
				  <td>
					<input type="radio" name="actions" id="actions" value="重度" />
					重度</label>
					</label></td>
				  </tr>
				<tr>
				  <td>&nbsp;</td>
				  <td>
					<input type="radio" name="actions" id="actions" value="臥床" />
				  </label>
				  臥床
					</label></td>
				  </tr>
				<tr>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				  </tr>
				<tr>
				  <td align="right" valign="top"><span class="style9">‧輕度：</span></td>
				  <td><span class="style12">除了因通車、購物等約1小時的步行和輕度手工或家事等站立之外，大部分從事坐著的工作、讀書、談話等情況。</span></td>
				  </tr>
				<tr>
				  <td align="right" valign="top"><span class="style10">‧中度：</span></td>
				  <td class="style12">除了因通車、購物等其他事項約2小時的步行和從事坐著的工作、辦公、讀書、談話等之外，還從事機械操作、接待或家事等站立較多之活動。</td>
				  </tr>
				<tr>
				  <td align="right" valign="top"><span class="style11">‧重度：</span></td>
				  <td class="style12">除了上述靜坐、站立、步行等動外，另從事農耕、漁業、建築等約1小時的重度肌肉性的工作。</td>
				</tr>
				<tr>
				   <td colspan = '2'>
				   <?PHP
					if( $_POST['year'] == '' || $_POST['month'] == '' || $_POST['day'] == '' )
					{
						echo "<script language=\"JavaScript\">";
						echo "window.alert(\"請輸入出生年月日\");";
						echo "location.href('user_health1.php?action=back');";
						echo "</script>";
						exit; 
					}else if($_POST["user_h"] =='')
					{
						echo "<script language=\"JavaScript\">";
						echo "window.alert(\"請輸入身高\");";
						echo "location.href('user_health1.php?action=back');";
						echo "</script>";
						exit;
					}else if($_POST["user_sex"] =='')
					{
						echo "<script language=\"JavaScript\">";
						echo "window.alert(\"請點選性別\");";
						echo "location.href('user_health1.php?action=back');";
						echo "</script>";
						exit; 

					}else if($_POST["user_w"] =='')
					{
						echo "<script language=\"JavaScript\">";
						echo "window.alert(\"請輸入體重\");";
						echo "location.href('user_health1.php?action=back');";
						echo "</script>";
						exit; 
					}
					
					$hidden = $_POST;
					foreach ($hidden as $key => $value)
					{
						echo "<input type = 'hidden' id = '" . $key . "' name = '" . $key . "' value = '" . $value . "'>\n";
					}
					?>
				   <div align="right" style = 'padding-right:30px'>
				   <input type="submit" name = "next" id="next" value="下一頁">
				   </div>
				   </td>
				</tr>
				</form>
			  </table>
			  </td>
			  </table>
		</td>
	</tr>
	<tr>
		<td><?PHP include_once ROOT_PATH . "/footer.php";?></td>
	</tr>
	</table>
	</td>
</tr>
</table>
</body>
</html>
