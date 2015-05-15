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
		$nowL = array('首頁' => 'index.php', '健康知識' => 'knowledge.php', '中秋節—廣式月餅製作' => '');
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
                      <img src="img/kno_f02.jpg" width="21" height="554" alt=""><img src="img/kno_f02.jpg" width="21" height="599" alt=""></td>
                    <td width="713" height="31" valign="top"><img src="img/kno_a13.jpg" width="713" height="31" alt=""></td>
                    <td width="21" rowspan="2" valign="top">
                      <img src="img/kno_f05.jpg" width="21" height="554" alt=""><img src="img/kno_f05.jpg" width="21" height="600" alt=""></td>
                  </tr>
                  <tr>
                    <td height="523" align="left" valign="top"><p class="kno_01"><strong><img src="img/009_中秋節—廣式月餅(抹茶蛋黃口味).jpg" width="47" height="63"><br>
                    </strong></p>
                      <p class="kno_01"><strong>作者:羅梅華主任 </strong><br>
                        <strong>研發製作『中秋節—廣式月餅』 </strong></p>
                      <p class="kno_01"><strong>製作36個廣式月餅之每個重量 </strong><br>
                      <strong>材料及工具:</strong></p>
                      <ol>
                        <li class="kno_01"><strong>抹茶餡(80元)，(25克/個)</strong></li>
                        <li class="kno_01"><strong>低油紅豆餡(45元)，(25克/個)</strong></li>
                        <li class="kno_01"><strong>轉化糖1瓶80元，(此次用360克)</strong></li>
                        <li class="kno_01"><strong>月餅模子 </strong></li>
                        <li class="kno_01"><strong>低筋麵粉(取560g)，之後油跟轉化糖和入後，油皮取30克/個 </strong></li>
                        <li class="kno_01"><strong>花生油或沙拉油 </strong></li>
                        <li class="kno_01"><strong>蛋黃1顆，之後要擦時在取蛋黃就好加入少取水打散。 </strong></li>
                        <li class="kno_01"><strong>高梁酒或米酒 </strong></li>
                        <li class="kno_01"><strong>鹹蛋黃(160元/20個/盒)—半個/個 </strong></li>
                        <li class="kno_01"><strong>刷子 </strong></li>
                        <li class="kno_01"><strong>烤盤 </strong></li>
                        <li class="kno_01"><strong>電鍋內鍋2個 </strong></li>
                        <li class="kno_01"><strong>過濾低筋麵粉的篩子一個 </strong></li>
                        <li class="kno_01"><strong>600克之磅秤 </strong></li>
                        <li class="kno_01"><strong>量杯1個 </strong></li>
                        <li class="kno_01"><strong>長方型盤子二個。 </strong></li>
                        <li class="kno_01"><strong>單個包裝之填貼小袋子 </strong></li>
                      </ol>
                      <p class="kno_01"><strong>製作方法:</strong> </p>
                      <ol>
                        <li class="kno_01"><strong>烤箱先預熱10分鐘,待溫度至175度 </strong></li>
                        <li class="kno_01"><strong>先將鹹蛋黃取出,在烤盤上抹上沙拉油,將蛋黃放置在烤盤上,取米酒直接倒酒在每顆鹹蛋黃上,放入烤盤(175度)約5分鐘，看蛋黃表面有點熟就可以了。 </strong></li>
                        <li class="kno_01"><strong>將560g之低筋麵粉先用篩子過濾去除大顆粒粉粒。 </strong></li>
                        <li class="kno_01"><strong>先倒入轉化糖360g用拌匙攪勻後再加入沙拉油，用順時鐘方向和勻，靜置醒麵糰30分鐘 </strong></li>
                        <li class="kno_01"><strong>在醒麵糰的同時，可將抹茶餡及紅豆餡先分成每個25克重，放在乾淨的盤子上，共計36個。 </strong></li>
                        <li class="kno_01"><strong>若鹹蛋黃用175度烤箱烤的表面有點熟後，取出，將鹹蛋黃分切對半，之後每個廣式月餅內放半個鹹蛋黃即可。 </strong></li>
                        <li class="kno_01"><strong>取25克之抹茶(紅豆沙)餡將半顆的鹹蛋黃包入，搓成圓型。 </strong></li>
                        <li class="kno_01"><strong>將醒了30分鐘之油皮麵糰分成每個30克之小糰。 </strong></li>
                        <li class="kno_01"><strong>將油皮30克包入含鹹蛋黃之抹茶餡，放入「月餅模子壓成型」，放在已有抹沙拉油之烤盤上。 </strong></li>
                      </ol>
                      <span class="kno_01"><strong>將成型好之廣式月餅，刷上蛋黃汁液，不用太用力刷，否則紋路會不見，放入上下溫度都為175度之烤箱中烤20分鐘時拉開烤箱門，再擦一次蛋黃液，再烤15分鐘即可。</strong></span>
                      <p class="kno_01">&nbsp;</p>                    </td>
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
<table>
</body>
</html>