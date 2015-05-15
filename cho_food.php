<?PHP
include_once 'config.php';

header_print(true);   //載入header檔

?>

<style type="text/css">
<!--
.style2 {font-size: 11pt}
.style3 {color: #000000}
.style5 {font-size: 10pt}
.style6 {font-size: 10pt; color: #000000; }
-->
</style>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->

<body>

<div id="page_wrapper">

<?PHP include_once ROOT_PATH . '/menubar.php';?>   

<div id="content_wrapper">
  <div id="right_side">
    
    <p><span class="style6">電子郵件</span>
      <input name="textfield" type="text" size="20" />
      <br />
      <span class="style6">登入密碼      </span>
      <input name="textfield2" type="text" size="20" />
    </p>
    <table width="96%" border="0">
      <tr>
        <td><div align="right"><span class="style5"><a href="user_add.html">加入會員</a></span></div></td>
        <td><span class="style5">| 忘記密碼</span></td>
      </tr>
    </table>
    <p>&nbsp; </p>
    <h3>配餐</h3>
    <p class="style2"><span class="style3">配餐-早餐</span></p>
    <blockquote>
      <p class="style2"><a href="rootstalk.php?class=food1">      全榖根莖類</a></p>
      <p class="style2"><a href="rootstalk.php?class=food2">豆魚肉蛋類</a></p>
      <p class="style2"><a href="rootstalk.php?class=food3">蔬菜類</a></p>
      <p class="style2"><a href="rootstalk.php?class=food4">水果類</a></p>
      <p class="style2"><a href="rootstalk.php?class=food5">油脂類</a></p>
      <p class="style2"><a href="rootstalk.php?class=food6">奶類</a></p>
      <p class="style2"><a href="rootstalk.php?class=food7">其它</a></p>
      </blockquote>
    <p class="style2"><span class="style3">配餐-午餐</span></p>
    <p class="style2"><span class="style3">配餐-晚餐</span></p>
    <p class="style2"><span class="style3">配餐-點心</span></p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div><!-- InstanceBeginEditable name="EditRegion2" --><br />
  <div id="left_side">

<h3>您選的全部食物種類</h3>

<table width="96%" border="0">
  <tr>
    <td width="14%">&nbsp;</td>
    <td width="14%"><span class="style5 style5 style3">食物名稱</span></td>
    <td width="9%"><span class="style5 style5 style3">份量</span></td>
    <td width="14%"><span class="style5">熱量<br />
      (kcal)</span><br /></td>
    <td width="11%"><span class="style5 style5 style3">膽固醇<br />
      (mg)</span></td>
    <td width="13%"><span class="style5 style5 style3">脂肪<br />
      (mg)</span></td>
    <td width="12%"><span class="style5">蛋白質<br />
      (mg)</span><br /></td>
    <td width="7%"><span class="style5 style5 style3">醣類<br />
      (mg)</span></td>
    <td width="6%"><span class="style3"></span></td>
  </tr>
  <tr>
    <td><img src="img/大亨堡.JPG" width="80" height="60" /></td>
    <td><span class="style5 style5 style3">大亨保</span></td>
    <td><form action="" method="post" name="form1" class="style5 style5 style3" id="form1">
      <input name="textfield3" type="text" value="1份" size="5" />
    </form>    </td>
    <td><span class="style5 style5 style3">438.7</span></td>
    <td><span class="style5 style5 style3">48.9</span></td>
    <td><span class="style5 style5 style3">21.82</span></td>
    <td><span class="style5 style5 style3">16.9</span></td>
    <td><span class="style5 style5 style3">44.45</span></td>
    <td><div align="center"><span class="style5 style5 style3">移除</span></div></td>
  </tr>
  <tr>
    <td><img src="img/沙威瑪麵包.JPG" width="80" height="60" /></td>
    <td><span class="style5">沙威瑪麵包</span></td>
    <td><span class="style3"><span class="style5 style5 style3">
      <input name="textfield32" type="text" value="1份" size="5" />
    </span></span></td>
    <td><span class="style3 style5">216.75</span></td>
    <td><span class="style3 style5">22.15</span></td>
    <td><span class="style3 style5">8.175</span></td>
    <td><span class="style5">10.3</span></td>
    <td><span class="style3 style5">25.51</span></td>
    <td><div align="center"><span class="style3"><span class="style3 style5">移除</span></span></div></td>
  </tr>
  <tr>
    <td><img src="img/菠蘿奶酥麵包.JPG" width="80" height="60" /></td>
    <td><span class="style3 style5">菠蘿奶酥麵包</span></td>
    <td><span class="style3"><span class="style5 style5 style3">
      <input name="textfield322" type="text" value="1份" size="5" />
    </span></span></td>
    <td><span class="style3 style5">334.8</span></td>
    <td><span class="style3 style5">36.9</span></td>
    <td><span class="style3 style5">13.68</span></td>
    <td><span class="style5">8.19</span></td>
    <td><span class="style3 style5">45.27</span></td>
    <td><div align="center"><span class="style3"><span class="style3 style5">移除</span></span></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style3"></span></td>
    <td><span class="style3"></span></td>
    <td><span class="style3"></span></td>
    <td><span class="style3"></span></td>
    <td><span class="style3"></span></td>
    <td><span class="style3"></span></td>
    <td><span class="style3"></span></td>
    <td><span class="style3"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style3 style5">總計</span></td>
    <td><span class="style3"></span></td>
    <td><span class="style3 style5">990.25</span></td>
    <td><span class="style3 style5">107.95</span></td>
    <td><span class="style3 style5">43.678</span></td>
    <td><span class="style3 style5">35.39</span></td>
    <td><span class="style3 style5">115.23</span></td>
    <td><span class="style3"></span></td>
  </tr>
</table>
<br />
<br />
<table width="53%" border="0" align="right">
  <tr>
    <td width="18%"><div align="center"><span class="style5">新增</span></div></td>
    <td width="17%"><div align="center"><span class="style5"><a href="rootstalk.html">完成</a></span></div></td>
    <td width="32%"><div align="center"><span class="style5">列印建議菜單</span></div></td>
    <td width="33%"><div align="center"><span class="style5"><a href="衛教單.doc">列印衛教單</a></span></div></td>
    </tr>
</table>
<div align="right"></div>
<p>&nbsp;</p>
<h3>&nbsp;</h3>
<p>&nbsp;</p>


<p>&nbsp;</p>

</div><!-- InstanceEndEditable -->

<div id="spacer"></div>

</div>

<div id="page_footer">

<p>&copy; 2009 網頁最佳解析度1024*768<br />
更新時間 07/14/2009</p>

</div>

</div>

</body>

<!-- InstanceEnd --></html>