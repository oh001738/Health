<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>

<table width="970" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="970" height="200" valign="top"><script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','920','height','200','src','img/flash','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','img/flash' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="920" height="200">
      <param name="movie" value="img/flash.swf" />
      <param name="quality" value="high" />
      <embed src="img/flash.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="920" height="200"></embed>
    </object></noscript></td>
  </tr>
</table>
<table width="970" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="223" height="30" valign="top" bgcolor="#FBCA01"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td width="93" valign="top"><a href="index.php"><img src="img/menu_01.jpg" width="93" height="30" border="0" /></a></td>
    <td width="93" valign="top"><a href="food.php"><img src="img/menu_02.jpg" width="93" height="30" border="0" /></a></td>
    <td width="93" valign="top"><a href="index.php"><img src="img/menu_03.jpg" width="93" height="30" border="0" /></a></td>
    <td width="93" valign="top"><a href="kfoodroot.php"><img src="img/menu_04.jpg" width="93" height="30" border="0" /></a></td>
    <td width="93" valign="top"><a href="history.php"><img src="img/menu_05.jpg" width="93" height="30" border="0" /></a></td>
    <td width="22" valign="top" bgcolor="#FBCA01"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td width="260" valign="middle" bgcolor="#FBCA01"><?PHP
		if (ckadmin())
		{
			if ( $USER['power'] == '1' )
			{
				echo "<a href = '" . ROOT_URL . "/admin/admin.php' class = 'menu_link'><font class = 'header_menu'>後台管理</font></a></td>\n";

			}else if ($USER['power'] == '2')
			{
				echo "<a href = '" . ROOT_URL . "/admin/admin.php' class = 'menu_link'><font class = 'header_menu'>醫事人員</font></a></td>\n";
			}
		}
		?></td>
  </tr>
  <!--DWLayoutTable-->
</table>

