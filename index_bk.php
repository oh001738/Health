<?PHP 
include "config.php";

header_print(true);   //載入header檔
?>

<style type="text/css">
<!--
.style5 {font-size: 10pt}
-->
</style>
<BODY TOPMARGIN="0" LEFTMARGIN="0" MARGINWIDTH="0" MARGINHEIGHT="0">
<center>
<table border = '0' cellpadding = '0' cellspacing = '0' width = '800'>
<TR>
	<TD COLSPAN="15"><IMG SRC="images/index_1.gif" WIDTH="800" BORDER="0" HEIGHT="43"></TD>
</TR>
<TR>
	<TD ROWSPAN="11"><IMG SRC="images/index_2.gif" WIDTH="85" BORDER="0" HEIGHT="515"></TD>
	<TD COLSPAN="6" ROWSPAN="4"><a href="health.php"><IMG SRC="images/index_3.jpg" WIDTH="151" BORDER="0" HEIGHT="197"></a></TD>
	<TD COLSPAN="8"><IMG SRC="images/index_4.jpg" WIDTH="564" BORDER="0" HEIGHT="12"></TD>
</TR>
<TR>
	<TD COLSPAN="2" ROWSPAN="2"><IMG SRC="images/index_5.jpg" WIDTH="282" BORDER="0" HEIGHT="166"></TD>
	<TD COLSPAN="5"><IMG SRC="images/index_6.jpg" WIDTH="174" BORDER="0" HEIGHT="72"></TD>
	<TD><IMG SRC="images/index_7.gif" WIDTH="108" BORDER="0" HEIGHT="72"></TD>
</TR>
<TR>
	<TD COLSPAN="6">
	<table width="50%" border="0" cellpadding="2" cellspacing="0">
	<form action="userlogin.php" method="post" name="form1" id="form1">
	  <tr>
		<td width="50%"><div align="center"><span class="style5">帳號</span></div></td>
		<td width="50%">
			<input type="text" id = 'username' name="username" value = '' style = 'font-size:13px;width:100px'>
		</td>
	  </tr>
	  <tr>
		<td><div align="center"><span class="style5">密碼</span></div></td>
		<td><input type="password" id = 'password' name = 'password' style = 'font-size:13px;width:100px'></td>
	  </tr>
	  <tr>
		<td class="style5" colspan = '2' align = 'center'>
		<a href="user_add.php">加入會員</a>
		<span style = 'padding-left:15px'><a href="javascript:check_form();">登入</a></span></td>
	  </tr>
	</form>
	</table>
	</TD>
</TR>
<TR>
	<TD COLSPAN="8"><IMG SRC="images/index_9.jpg" WIDTH="564" BORDER="0" HEIGHT="19"></TD>
</TR>
<TR>
	<TD COLSPAN="2"><IMG SRC="images/index_10.jpg" WIDTH="45" BORDER="0" HEIGHT="27"></TD>
	<TD COLSPAN="2"><a href="health.html"><IMG SRC="images/index_11.jpg" WIDTH="86" BORDER="0" HEIGHT="27"></a></TD>
	<TD COLSPAN="10"><IMG SRC="images/index_12.jpg" WIDTH="584" BORDER="0" HEIGHT="27"></TD>
</TR>
<TR>
	<TD COLSPAN="14"><IMG SRC="images/index_13.jpg" WIDTH="715" BORDER="0" HEIGHT="92"></TD>
</TR>
<TR>
	<TD ROWSPAN="2"><IMG SRC="images/index_14.gif" WIDTH="19" BORDER="0" HEIGHT="147"></TD>
	<TD COLSPAN="6" ROWSPAN="2"><a href="food.php?class=food1"><IMG SRC="images/index_15.jpg" WIDTH="151" BORDER="0" HEIGHT="147"></a></TD>
	<TD COLSPAN="7"><IMG SRC="images/index_16.jpg" WIDTH="545" BORDER="0" HEIGHT="31"></TD>
</TR>
<TR>
	<TD COLSPAN="2"><IMG SRC="images/index_17.jpg" WIDTH="278" BORDER="0" HEIGHT="116"></TD>
	<TD COLSPAN="3"><a href="health1.php"><IMG SRC="images/index_18.jpg" WIDTH="140" BORDER="0" HEIGHT="116"></a></TD>
	<TD COLSPAN="2"><IMG SRC="images/index_19.gif" WIDTH="127" BORDER="0" HEIGHT="116"></TD>
</TR>
<TR>
	<TD COLSPAN="14"><IMG SRC="images/index_20.jpg" WIDTH="715" BORDER="0" HEIGHT="10"></TD>
</TR>
<TR>
	<TD COLSPAN="3"><IMG SRC="images/index_21.gif" WIDTH="55" BORDER="0" HEIGHT="20"></TD>
	<TD COLSPAN="2"><IMG SRC="images/index_22.jpg" WIDTH="80" BORDER="0" HEIGHT="20"></TD>
	<TD COLSPAN="5"><IMG SRC="images/index_23.jpg" WIDTH="367" BORDER="0" HEIGHT="20"></TD>
	<TD><a href="health1.php"><IMG SRC="images/index_24.jpg" WIDTH="39" BORDER="0" HEIGHT="20"></a></TD>
	<TD COLSPAN="3"><IMG SRC="images/index_25.gif" WIDTH="174" BORDER="0" HEIGHT="20"></TD>
</TR>
<TR>
	<TD COLSPAN="14"><IMG SRC="images/index_26.jpg" WIDTH="715" BORDER="0" HEIGHT="22"></TD>
</TR>
<TR>
	<TD COLSPAN="15"><IMG SRC="images/index_27.gif" WIDTH="800" BORDER="0" HEIGHT="42"></TD>
</TR>
<TR>
	<TD><IMG SRC="images/space.gif" WIDTH="85" BORDER="0" HEIGHT="1"></TD>
	<TD><IMG SRC="images/space.gif" WIDTH="19" BORDER="0" HEIGHT="1"></TD>
	<TD><IMG SRC="images/space.gif" WIDTH="26" BORDER="0" HEIGHT="1"></TD>
	<TD><IMG SRC="images/space.gif" WIDTH="10" BORDER="0" HEIGHT="1"></TD>
	<TD><IMG SRC="images/space.gif" WIDTH="76" BORDER="0" HEIGHT="1"></TD>
	<TD><IMG SRC="images/space.gif" WIDTH="4" BORDER="0" HEIGHT="1"></TD>
	<TD><IMG SRC="images/space.gif" WIDTH="16" BORDER="0" HEIGHT="1"></TD>
	<TD><IMG SRC="images/space.gif" WIDTH="19" BORDER="0" HEIGHT="1"></TD>
	<TD><IMG SRC="images/space.gif" WIDTH="263" BORDER="0" HEIGHT="1"></TD>
	<TD><IMG SRC="images/space.gif" WIDTH="15" BORDER="0" HEIGHT="1"></TD>
	<TD><IMG SRC="images/space.gif" WIDTH="54" BORDER="0" HEIGHT="1"></TD>
	<TD><IMG SRC="images/space.gif" WIDTH="39" BORDER="0" HEIGHT="1"></TD>
	<TD><IMG SRC="images/space.gif" WIDTH="47" BORDER="0" HEIGHT="1"></TD>
	<TD><IMG SRC="images/space.gif" WIDTH="19" BORDER="0" HEIGHT="1"></TD>
	<TD><IMG SRC="images/space.gif" WIDTH="108" BORDER="0" HEIGHT="1"></TD>
</TR>
</TABLE>
</center>

<script language = 'javascript'>
<!--
function check_form()
{
	var obj = document.form1;
	if ( trim(obj.username.value) == '' )
	{
		alert('請輸入帳號!!');
		obj.username.focus();
	
	}else if ( trim(obj.password.value) == '' )
	{
		alert('請輸入密碼!!');
		obj.password.focus();
	
	}else{
		obj.submit();
	}
}
//-->
</script>

</BODY>
</HTML>