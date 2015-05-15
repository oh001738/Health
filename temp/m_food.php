<?PHP
include "config.php";

header_print(true);   //載入header檔

?>

<style type="text/css">
<!--
.style2 {font-size: 11pt}
.style5 {font-size: 10pt}
.style6 {font-size: 10pt; color: #000000; }
.style8 {color: #FF0000}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<body>

<div id="page_wrapper">

<?PHP include_once ROOT_PATH . '/menubar.php';?>   

<div id="content_wrapper">
  <div id="right_side">     
    <table width="96%" border="0">
      <tr>
        <td><div align="left"><span class="style5">大明，您好</span>!</div></td>
      </tr>
      <tr>
        <td><span class="style5"><a href="http://140.128.99.43/health/logout.php">登出</a></span></td>
      </tr>
    </table>
    <p>&nbsp; </p>
    <h3>維護食物</h3> 
    <blockquote>
      <p class="style2">維護食物</p>
      <p class="style2"><a href="m_package.html">維護套餐</a></p>
      <p class="style2">維護營養標準</p>
    </blockquote>
  </div>
  <br />
  <div id="left_side">
    
  <h3>維護食物-查詢</h3>
  
  <table width="95%" border="0">
    <tr>
      <td>查詢條件</td>
    </tr>
    <tr>
      <td><span class="style8">﹡</span>食物代號：
        <input type="text" name="textfield3" /></td>
    </tr>
    <tr>
      <td><span class="style8">﹡</span>食物名稱：
        <input type="text" name="textfield33" /></td>
    </tr>
    <tr>
      <td>類別：
        
        <select name="menu5" onchange="MM_jumpMenu('parent',this,0)">
          <option selected="selected">全榖根莖類</option>
          <option>豆魚肉蛋類</option>
          <option>蔬菜類</option>
          <option>水果類</option>
          <option>油脂類(堅果)</option>
          <option>奶類</option>
          <option>其它</option>
                                </select></td>
    </tr>
    <tr>
      <td height="25">熱量：
          <input name="textfield3322" type="text" size="6" />
      </a></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table cellpadding="0" cellspacing="0" bgcolor="#FFFFCC">
        <tr>
          <td height="24" width="83"><div align="center"><a href="m_food_s.html">查詢</a></div></td>
          <td width="86"><div align="center"><a href="m_food_add.html">新增</a></div></td>
          <td width="72"><div align="center">修改</div></td>
          <td width="72"><div align="center">離開</div></td>
        </tr>
      </table></td>
    </tr>
  </table>
  <h3>&nbsp;</h3>
  </div>

<div id="spacer"></div>
</div>

<div id="page_footer">

<p>&copy; 2009 網頁最佳解析度1024*768<br />
更新時間 07/14/2009</p>
</div>
</div>
</body>

</html>