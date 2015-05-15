<?PHP
include_once 'config.php';

header_print(true);   //載入header檔
?>
<link href="css/style.css" rel="stylesheet" type="text/css">
<body>

<table border = '1' cellpadding = '0' cellspacing = '0' width = '760' class = 'header_table'>
<tr>
	<td><?PHP include_once ROOT_PATH . '/menubar.php';?></td>
</tr>
<tr>
	<td valign = 'top'>
	<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
	  <!--DWLayoutTable-->
	<tr>
		<td width="1006">
		<div class = 'fast_link'>
		<?PHP
		$nowL = array('首頁' => 'index.php', '健康知識' => 'knowledge.php', '尚鈣讚水餃配方' => '');
		echo show_path_url($nowL);
		?>		</td>
	</tr>
	<tr>
		<td valign="top">
		  <table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
		    <!--DWLayoutTable-->
		    <tr>
		      <td width = '180' height="594" valign = 'top'>
                <?PHP include_once ROOT_PATH . "/leftmenu.php";?>			</td>
			  <td width = '18'>&nbsp;</td>
			  <td width = '755' align = 'center' valign = 'top'>
                <table id="___01" width="755" height="594" border="0" cellpadding="0" cellspacing="0">
                  <!--DWLayoutTable-->
                  <tr>
                    <td height="16" colspan="3" valign="top">
                    <img src="img/kno_f01.jpg" width="755" height="16" alt=""></td>
                  </tr>
                  <tr>
                    <td width="21" rowspan="2" valign="top">
                      <img src="img/kno_f02.jpg" width="21" height="554" alt=""></td>
                    <td width="713" height="31" valign="top"><img src="img/kno_a11.jpg" width="713" height="31" alt=""></td>
                    <td width="21" rowspan="2" valign="top">
                      <img src="img/kno_f05.jpg" width="21" height="554" alt=""></td>
                  </tr>
                  <tr>
                    <td height="523" align="left" valign="top"><p class="kno_01"><strong><img src="img/007_尚鈣讚水餃.jpg" width="371" height="145"><br>
                    </strong></p>
                      <p class="kno_01">作者：羅梅華主任</p>
                      <p class="kno_01"><strong>『尚鈣讚水餃的配方』 </strong></p>
                      <table border="1" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="279" valign="top" class="kno_01">水餃皮 </td>
                          <td width="279" valign="top"><p class="kno_01">紅蘿蔔及菠菜水餃皮 </p></td>
                        </tr>
                        <tr>
                          <td width="279" valign="top" bgcolor="#D5EAEE"><p class="kno_01">水餃餡 </p></td>
                          <td width="279" valign="top" bgcolor="#D5EAEE"><p class="kno_01">高麗菜、香菇、胡蘿蔔、韭菜、蝦米、豆干、起司丁、白胡椒、紅麴 </p></td>
                        </tr>
                                            </table>                      <p class="kno_01">&nbsp;</p></td>
                  </tr>
                  <tr>
                    <td height="23" colspan="3" valign="top"><img src="img/kno_f25.jpg" width="755" height="23" alt=""></td>
                  </tr>
                </table></td>
		  <td width = '53'></td>
		    </tr>
		                                                                                  </table></td>
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