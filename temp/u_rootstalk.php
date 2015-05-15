<?PHP 
include_once 'config.php';
header_print(true);   //載入header檔
?>

<style type="text/css">
<!--
.style2 {font-size: 11pt}
.style3 {color: #000000}
.style5 {
	color: #FFCC33;
	font-size: 10pt;
}
.style6 {color: #CC3399}
.style8 {font-size: 10pt}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_popupMsg(msg) { //v1.0
  alert(msg);
}

function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
<!-- InstanceEndEditable -->

<body>

<div id="page_wrapper">

<?PHP include_once ROOT_PATH . '/menubar.php';?>   

<div id="content_wrapper">
  <div id="right_side">
    <h3>配餐</h3>
    <p class="style2"><span class="style3">配餐-早餐</span></p>
    <blockquote>
      <p class="style2"><a href="u_rootstalk.php?class=food1">      全榖根莖類</a></p>
      <p class="style2"><a href="u_rootstalk.php?class=food2">豆魚肉蛋類</a></p>
      <p class="style2"><a href="u_rootstalk.php?class=food3">蔬菜類</a></p>
      <p class="style2"><a href="u_rootstalk.php?class=food4">水果類</a></p>
      <p class="style2"><a href="u_rootstalk.php?class=food5">油脂類</a></p>
      <p class="style2"><a href="u_rootstalk.php?class=food6">奶類</a></p>
      <p class="style2"><a href="u_rootstalk.php?class=food7">其它</a></p>
      </blockquote>
    <p class="style2"><span class="style3">配餐-午餐</span></p>
    <p class="style2"><span class="style3">配餐-晚餐</span></p>
    <p class="style2"><span class="style3">配餐-點心</span></p>
    <h3 class="style2">飲食日誌</h3>
    <p> 維護飲食日誌</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div><!-- InstanceBeginEditable name="EditRegion2" --><br />
  <div id="left_side">

<h3>配餐-早餐</h3>

<table width="100%" border="0">
  <tr>
    <td width="87%"><div align="right">
      <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">
      <?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
        上一頁
  <?php } // Show if not first page ?>
      </a></div></td>
    <td width="2%"><div align="right"></div></td>
    <td width="11%"><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">下一頁</a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
    <table width="100" >
      <tr>
        <?php
$Recordset1_endRow = 0;
$Recordset1_columns = 3; // number of columns
$Recordset1_hloopRow1 = 0; // first row flag
do {
    if($Recordset1_endRow == 0  && $Recordset1_hloopRow1++ != 0) echo "<tr>";
   ?>
        <td><table width="200" border="0">
            <tr>
              <td height="81"><img src="<?php echo $row_Recordset1['ch_image']; ?>" alt="" name="ph" width="60" height="60" id="ph" /></td>
              <td><span class="style5">名字：<?php echo $row_Recordset1['ch_name']; ?>一份</span><span class="style8"><br />
                  <span class="style6">熱量：<?php echo $row_Recordset1['ch_k']; ?>Kcal<br />
                脂肪：<?php echo $row_Recordset1['ch_fat']; ?>mg<br />
                蛋白質：<?php echo $row_Recordset1['ch_e']; ?>mg</span></span></td>
            </tr>
            <tr>
              <td bordercolor="#000000"><input name="submit" type="submit" id="選取" onclick="MM_popupMsg('您的理想熱量是:1500Kcal\r選取的食物總含量：\r熱量：438Kcal\r脂肪：21.82mg\r\r			  ')" value="選取" /></td>
              <td>&nbsp;</td>
            </tr>
        </table></td>
        <?php  $Recordset1_endRow++;
if($Recordset1_endRow >= $Recordset1_columns) {
  ?>
      </tr>
<?php
 $Recordset1_endRow = 0;
  }
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
if($Recordset1_endRow != 0) {
while ($Recordset1_endRow < $Recordset1_columns) {
    echo("<td>&nbsp;</td>");
    $Recordset1_endRow++;
}
echo("</tr>");
}?>
    </table>
	
       <div align="right"></div>
       <?php } // Show if recordset not empty ?>



       <form id="form1" name="form1" method="post" action="index.php">
         <label>
           <div align="right">
             <input name="確定" type="submit" id="確定" onclick="MM_goToURL('parent','u_cho_food.php');return document.MM_returnValue" value="確定" />
           </div>
         </label>
         <div align="right"></div>
         <div align="right"></div>
       </form>
      <h3>&nbsp;</h3>
</div>
  <!-- InstanceEndEditable -->

<div id="spacer"></div>

</div>

<div id="page_footer">

<p>&copy; 2009 網頁最佳解析度1024*768<br />
更新時間 07/14/2009</p>

</div>

</div>

</body>

<!-- InstanceEnd --></html>
<?php
mysql_free_result($Recordset1);
?>