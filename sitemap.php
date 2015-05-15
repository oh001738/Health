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
-->
</style><body>

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
		$nowL = array('首頁' => 'index.php', '會員登入' => '');
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
                    <img src="img/kno_f02.jpg" width="21" height="557" alt=""></td>
                    <td width="713" height="38" align="left" valign="top"><img src="img/sitemap_tittle.jpg" width="151" height="40"></td>
                    <td width="21" rowspan="2" valign="top">
                    <img src="img/kno_f05.jpg" width="21" height="557" alt=""></td>
                  </tr>
                  <tr>
                    <td height="516" align="left" valign="top"><span class="map_01"><br>
                      </span>
                      <p class="map_01"><span class="map_01"><img src="img/sitemap_01.jpg" width="22" height="21" align="bottom"><a href="index.php">首頁</a>　<img src="img/sitemap_01.jpg" width="22" height="21" align="bottom"><a href="food.php">認識食物</a>　　　　　　　<img src="img/sitemap_01.jpg" width="22" height="21" align="bottom"><a href="knowledge.php">健康知識</a>　　　　　　　　　　　　　　<img src="img/sitemap_01.jpg" width="22" height="21" align="bottom"><a href="health1.php">配餐</a>　<img src="img/sitemap_01.jpg" width="22" height="21" align="bottom"><a href="history.php">飲食日誌</a><br>
                      　　　　　<img src="img/sitemap_02.jpg" width="17" height="15"><a href="food.php?class=food1">全穀根莖類及加工製品</a>　　<img src="img/sitemap_02.jpg" width="17" height="15"><a href="kno_01.php">國民飲食指標及成人均衡營養</a><br>
                        　　　　　<img src="img/sitemap_02.jpg" width="17" height="15"><a href="food.php?class=food2">豆魚肉蛋類</a>　　　　　　　<img src="img/sitemap_02.jpg" width="17" height="15"><A href="kno_02.php">食物代換表</A><br>
                        　　　　　<img src="img/sitemap_02.jpg" width="17" height="15"><a href="food.php?class=food3">蔬菜類</a>　　　　　　　　　<img src="img/sitemap_02.jpg" width="17" height="15"><A href="kno_03.php">各種運動量消耗量表</A><br>
                        </strong>　　　　　<img src="img/sitemap_02.jpg" width="17" height="15"><a href="food.php?class=food4">水果類</a>　　　　　　　　　<img src="img/sitemap_02.jpg" width="17" height="15"><A href="kno_04.php">營養素的功用及食物來源</A><br>
                      　　　　　<img src="img/sitemap_02.jpg" width="17" height="15"><a href="food.php?class=food5">油脂類</a>　　　　　　　　　<img src="img/sitemap_02.jpg" width="17" height="15"><A href="kno_05.php">我國成人之理想體重範圍</A><br>
                      　　　　　<img src="img/sitemap_02.jpg" width="17" height="15"><a href="food.php?class=food6">奶類</a>　　　　　　　　　　<img src="img/sitemap_02.jpg" width="17" height="15"><A href="kno_06.php">國產酒之酒精含量</A><br>
					              　　　　　<img src="img/sitemap_02.jpg" width="17" height="15"><a href="food.php?class=food7">其他類</a>　　　　　　　　　<img src="img/sitemap_02.jpg" width="17" height="15"><A href="kno_07.php">「黃金粽」製作</A><br>
					  　　　　　<img src="img/sitemap_02.jpg" width="17" height="15"><a href="measure.php">量測工具</a>　　　　　　　　<img src="img/sitemap_02.jpg" width="17" height="15"><A href="kno_08.php">「抗暖化節能肉粽—地瓜鳳梨海鮮粽」製作</A><br>
					  　　　　　<img src="img/sitemap_02.jpg" width="17" height="15"><a href="knowegg.php">認識低蛋白飲食</a>　　　　　<img src="img/sitemap_02.jpg" width="17" height="15"><A href="kno_09.php">「尚鈣讚水餃」製作</A><br>
					  　　　　　<img src="img/sitemap_02.jpg" width="17" height="15"><a href="potassium.php">認識鉀</a>　　　　　　　　　<img src="img/sitemap_02.jpg" width="17" height="15"><A href="kno_10.php">「椰漿西谷米」製作</A><br>
					  　　　　　<img src="img/sitemap_02.jpg" width="17" height="15"><a href="phosphorous.php">認識磷</a>　　　　　　　　　<img src="img/sitemap_02.jpg" width="17" height="15"><A href="kno_11.php">「中秋節—廣式月餅」製作</A><br>
					  　　　　　<img src="img/sitemap_02.jpg" width="17" height="15"><a href="knowna.php">認識鈉</a></span><br>
				    </p>                    </td>
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
	  <td></td>
	  </tr>
	  <tr>
		<td><?PHP include_once ROOT_PATH . "/footer.php";?></td>
	</tr>
	</table>
	</td>
</tr>
<table>
</body>
</html>