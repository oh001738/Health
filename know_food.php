<?php require_once('Connections/food.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 6;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "-1";
if (isset($_GET['class'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_GET['class'] : addslashes($_GET['class']);
}
mysql_select_db($database_food, $food);
$query_Recordset1 = sprintf("SELECT * FROM choose_food WHERE ch_kind = '%s'", $colname_Recordset1);
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $food) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/know_food.dwt" codeOutsideHTMLIsLocked="false" -->

<!--
Copyright: Darren Hester 2006, http://www.designsbydarren.com
License: Released Under the "Creative Commons License", 
http://creativecommons.org/licenses/by-nc/2.5/
-->

<head>

<!-- Meta Data -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Free 2-Column CSS Web Design Template" />
<meta name="keywords" content="Free, 2-Column, CSS, Web, Design, Template" />

<!-- Site Title -->
<!-- InstanceBeginEditable name="doctitle" -->
<title>衛教中心</title>
<!-- InstanceEndEditable -->
<!-- Link to Style External Sheet -->
<link href="css/style.css" type="text/css" rel="stylesheet" />

<style type="text/css">
<!--
.style2 {font-size: 11pt}
.style3 {color: #000000}
.style5 {font-size: 10pt}
.style6 {font-size: 10pt; color: #000000; }
-->
</style>
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
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
//-->
</script>
<!-- InstanceEndEditable -->
</head>

<body>

<div id="page_wrapper">

<div id="page_header">

<h1>&#34907;&#25945;&#20013;&#24515;</h1>
<h2>www.vghtc.gov.tw</h2>

</div>

<div id="menu_bar">
<ul>
<li><a href="index.php">&#39318;&#38913;</a></li>
<li><a href="health.html">認識食物</a></li>
<li><a href="health.html">健康知識</a></li>
<li><a href="kfoodroot.html">配餐</a></li>
<li><a href="health.html">我的最愛</a></li>
<li><a href="health.html">飲食日誌</a></li>
</ul>
<div align="right"><a href="userlogin.html"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div>
</div>

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
              <td bordercolor="#000000"><input name="submit" type="submit" id="選取" onclick="MM_popupMsg('您選擇的是<?php echo  "大亨堡"; ?>')" value="選取" />
             
                </td>
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
             <input type="submit" name="Submit" value="確認" />
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