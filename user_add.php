<?PHP
include_once 'config.php';

header_print(true);   //載入header檔
?>
<link href="css/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
a:link {
	color: #666666;
}
a:visited {
	color: #666666;
}
a:hover {
	color: #666666;
}
a:active {
	color: #666666;
}
.style4 {color: #FF0000}
-->
</style><body>

<table border = '1' cellpadding = '0' cellspacing = '0' class = 'header_table'>
<tr>
	<td><?PHP include_once ROOT_PATH . '/menubar.php';?></td>
</tr>
<tr>
	<td valign = 'top'>
	<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
	  <!--DWLayoutTable-->
	<tr>
		<td width="1005">
		<div class = 'fast_link'>
		<?PHP
		$nowL = array('首頁' => 'index.php', '註冊會員' => 'add_user.php');
		echo show_path_url($nowL);
		?></td>
	</tr>
	<tr>
	   <td valign="top" align = 'center'>
		  <table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
		    <tr>
		      <td width = '179' valign = 'top'><?PHP include_once ROOT_PATH . "/leftmenu.php";?></td>
			  <td width = '16'>&nbsp;</td>
			  <td width = '755' align = 'center' valign = 'top'>
			  <img src = '<?PHP echo ROOT_URL;?>/img/registeraccount.jpg'>
			  <table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
			  <tr>
			     <td valign = 'top'>
				 <table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
				 <tr>
				    <td width = '21' height = '16'><img src = '<?PHP echo ROOT_URL;?>/img/border/border_top_left.jpg'></td>
					<td background = '<?PHP echo ROOT_URL;?>/img/border/border_top_middle.jpg'></td>
					<td width = '27'><img src = '<?PHP echo ROOT_URL;?>/img/border/border_top_right.jpg'></td>
				 </tr>
				 <tr>
					<td background = '<?PHP echo ROOT_URL;?>/img/border/border_middle_left.jpg'></td>
					<td>
				    <table border = '0' cellpadding = '3' cellspacing = '1' width = '100%'>
					<form id = 'form1' name = 'form1' method = 'post' action = 'user_health1.php'>
					<!--<tr>
					   <td width = '35%' align = 'right' class = 'kno_tittle02'>個人資料</td>
					   <td></td>
					</tr>//-->
                    <tr>
	                   <td width = '35%' align = 'right' class = 'kno_01'><span class="style4">*</span>帳號</td>
			           <td><input type = 'text' name = 'username' id = 'username' style = 'width:200px'></td>
		            </tr>
                    <tr>
	                   <td width = '35%' align = 'right' class = 'kno_01'><span class="style4">*</span>密碼</td>
			           <td><input type = 'password' name = 'password' id = 'password' style = 'width:200px'></td>
		            </tr>
					<tr>
	                   <td width = '35%' align = 'right' class = 'kno_01'><span class="style4">*</span>再次輸入密碼</td>
			           <td><input type = 'password' name = 'password2' id = 'password2' style = 'width:200px'></td>
		            </tr> 
					<tr>
	                   <td width = '35%' align = 'right' class = 'kno_01'><span class="style4">*</span>電子郵件：</td>
			           <td><input type = 'text' name = 'email' id = 'email' style = 'width:200px'></td>
		            </tr>                    
					<tr>
	                   <td align = 'right' class = 'kno_01'>中文姓名：</td>
			           <td><input type = 'text' name = 'c_name' id = 'c_name' style = 'width:200px'></td>
		            </tr>
					<tr>
	                   <td align = 'right' class = 'kno_01'>英文名字：</td>
			           <td><input type = 'text' name = 'e_name' id = 'e_name' style = 'width:200px'></td>
		            </tr>
					
					<tr>
	                   <td align = 'right' class = 'kno_01'>電話號碼：</td>
			           <td><input type = 'text' name = 'telphone' id = 'telphone' style = 'width:200px'></td>
		            </tr>
					<tr>
	                   <td align = 'right' class = 'kno_01'>行動電話：</td>
			           <td><input type = 'text' name = 'celphone' id = 'celphone' style = 'width:200px'></td>
		            </tr>
					<tr>
	                   <td align = 'right' class = 'kno_01'>地址：</td>
			           <td><input type = 'text' name = 'address' id = 'address' style = 'width:300px'></td>
		            </tr>
					<tr>
	                   <td align = 'right' class = 'kno_01'>所屬醫院(若沒有可略過)：</td>
			           <td>
                      	<select id = 'location' name = 'location' style = 'width:300px'>
						<option value = '0' selected>請選擇</option>
                        <option value = '1' select>台北</option>
                        <option value = '2' select>台中</option>
                        <option value = '3' select>高雄</option>
						</select> </td>
		            </tr>
					<tr>
					   <td align = 'right'><input type = 'button' name = 'ok' id = 'ok' value = '確定' onclick = 'check_form();'></td>
					   <td><input type = 'reset' name = '確定2' id = '確定2' value = '重設'></td>
					</tr>
					</form>
					</table>
					</td>
					<td background = '<?PHP echo ROOT_URL;?>/img/border/border_middle_right.jpg'></td>
				 </tr>
				 <tr>
				    <td height = '23'><img src = '<?PHP echo ROOT_URL;?>/img/border/border_bottom_left.jpg'></td>
					<td background = '<?PHP echo ROOT_URL;?>/img/border/border_bottom_middle.jpg'></td>
					<td><img src = '<?PHP echo ROOT_URL;?>/img/border/border_bottom_right.jpg'></td>
				 </tr>
				 </table>
				 </td>
			  </tr>
			  </table>
			  </td>
                   
              </tr>
                  
                  <tr>
                    <td height="23" colspan="3" valign="top"><img src="img/kno_f25.jpg" width="755" height="23" alt=""></td>
                  </tr>
            </table></td>
		  <td width = '55'></td>
	    </tr>
      </table></td>
  </tr>
	<tr>
	  <td></td>
  </tr>
	  <tr>
		<td><?PHP include_once ROOT_PATH . "/footer.php";?></td>
	</tr>
	</table>
	</td>
</tr>
</table>
<script language = 'javascript'>
<!--
function check_form()
{
	var obj = document.form1;
	if ( !ckEmail(obj.email.value) )
	{
		alert('請輸入正確的E-mail!!');
		obj.email.focus();
	}else{
		obj.submit();
	}
}
//-->
</script>
</body>
</html>