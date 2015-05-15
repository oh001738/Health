<?PHP
include_once 'config.php';

header_print(true);   //載入header檔
?>

<style type="text/css">
<!--
.style2 {font-size: 11pt}
.style3 {color: #FFFFFF}
.style4 {font-size: 12px}
.style5 {font-size: 12pt}
.style11 {color: #CC9933}
.style9 {color: #000000}
.style10 {color: #ff0000}
-->
</style>

<body>

<div id="page_wrapper">

<?PHP include_once ROOT_PATH . '/menubar.php';?>   

<div id="content_wrapper"><!-- InstanceBeginEditable name="EditRegion2" --><br />
  <div id="left_side">

<div class = 'title3'>你的慢性腎臟病是</div>
<form id="form1" name="form1" method="post" action="health5.php">

  <table width="100%" border="0">
    <tr>
      <td><?php

require_once('Connections/food.php');


$user_age=$_POST["user_age"];
$user_h=$_POST["user_h"];
$user_sex=$_POST["user_sex"];

$user_w=$_POST["user_w"];
$diabetes=$_POST["diabetes"];
$hypertension=$_POST["hypertension"];
$bmi=$_POST["bmi"];
$good_w=$_POST["good_w"];
$good_w2=$_POST["good_w2"];
$waistline=$_POST["waistline"];
$heart=$_POST["heart"];
$kidney=$_POST["kidney"];
$pronunciation=$_POST["pronunciation"];
$actions=$_POST["actions"];
$Creatinine=$_POST["Creatinine"];
$Fasting_sugar=$_POST["Fasting_sugar"];
$HbA1c=$_POST["HbA1c"];
$Hgb=$_POST["Hgb"];
$Hct=$_POST["Hct"];
$ferritin=$_POST["ferritin"];
$ua=$_POST["ua"];
$Cholesterol=$_POST["Cholesterol"];
$na=$_POST["na"];
$kk=$_POST["kk"];
$pp=$_POST["pp"];
$ca=$_POST["ca"];
$fe=$_POST["fe"];
$TIBC=$_POST["TIBC"];
$ferritinn=$_POST["ferritinn"];
$Triglyceride=$_POST["Triglyceride"];

?>
        <table width="90%" border="0" align="center">
          <tr>
            <td width="33%"><?php if($Creatinine>=90 && $Creatinine<=150 && $Creatinine != null) 
			           { 
					    echo "<span class=style9>血清 Creatinine";
						echo "</span></td>
            <td><input name=Creatinine type=text id=Creatinine class=style9 value=$Creatinine  size=5 />
					   ";} 
			if(($Creatinine<90 || $Creatinine>150) && $Creatinine != null)  {
			echo "<span class=style10>血清 Creatinine"; 
			echo "</span></td>
            <td><input name=Creatinine type=text id=Creatinine class=style10 value=$Creatinine  size=5 />"; }
			if($Creatinine==null)  {
			echo "<span class=style9>血清 Creatinine"; 
			echo "</span></td>
            <td><input name=Creatinine type=text id=Creatinine class=style9 size=5  value=$Creatinine >"; }?>              mg/dL</td>
            <td width="21%"><span class="style11">(130～250mg/dl)</span></td>
            <td width="26%"><?php if($na>=130 && $na<=250 && $na != null) 
			           { 
					    echo "<span class=style9>血鈉  Na";
						echo "</span></td>
            <td><input name=na type=text id=na class=style9 value=$na  size=5 />
					   ";} 
			if(($na<130 || $na>250) && $na != null)  {
			echo "<span class=style10>血鈉  Na"; 
			echo "</span></td>
            <td><input name=na type=text id=na class=style10 value=$na size=5 />"; }
			if($na==null)  {
			echo "<span class=style9>血鈉  Na"; 
			echo "</span></td>
            <td><input name=na type=text id=na class=style9 size=5  value=$na >"; }?> 
              mEq/L</td>
            <td width="20%"><span class="style11">(130～250mg/dl)</span></td>
          </tr>
          <tr>
            <td><?php if($Fasting_sugar>=90 && $Fasting_sugar<=150 && $Fasting_sugar != null) 
			           { 
					    echo "<span class=style9>空腹血糖 Fasting sugar";
						echo "</span></td>
            <td><input name=Fasting_sugar type=text id=Fasting_sugar class=style9 value=$Fasting_sugar  size=5 />
					   ";} 
			if(($Fasting_sugar<90 || $Fasting_sugar>150)&& $Fasting_sugar != null)  {
			echo "<span class=style10>空腹血糖 Fasting sugar"; 
			echo "</span></td>
            <td><input name=Fasting_sugar type=text id=Fasting_sugar class=style10 value=$Fasting_sugar  size=5 />"; }
			if($Fasting_sugar==null)  {
			echo "<span class=style9>空腹血糖 Fasting sugar"; 
			echo "</span></td>
            <td><input name=Fasting_sugar type=text id=Fasting_sugar class=style9 size=5  value=$Fasting_sugar >"; }?>
              mg/dL</td>
            <td><span class="style11">(90～150mg/dl)</span></td>
            <td><?php if($kk>=90 && $kk<=150 && $kk != null) 
			           { 
					    echo "<span class=style9>血鉀 K";
						echo "</span></td>
            <td><input name=kk type=text id=kk class=style9 value=$kk  size=5 />
					   ";} 
			if(($kk<90 || $kk>150) && $kk != null)  {
			echo "<span class=style10>血鉀 K"; 
			echo "</span></td>
            <td><input name=kk type=text id=kk class=style10 value=$kk  size=5 />"; }
			if($kk==null)  {
			echo "<span class=style9>血鉀 K"; 
			echo "</span></td>
            <td><input name=kk type=text id=kk class=style9 size=5  value=$kk >"; }?>              
              mEq/L</td><td><span class="style11">(130～250mg/dl)</span></td>
          </tr>
          <tr>
            <td><?php if($HbA1c>=90 && $HbA1c<=150 && $HbA1c != null) 
			           { 
					    echo "<span class=style9>糖化血色素 HbA1c";
						echo "</span></td>
            <td><input name=HbA1c type=text id=HbA1c class=style9 value=$HbA1c  size=5 />
					   ";} 
			if(($HbA1c<90 || $HbA1c>150)&& $HbA1c != null)  {
			echo "<span class=style10>糖化血色素 HbA1c"; 
			echo "</span></td>
            <td><input name=HbA1c type=text id=HbA1c class=style10 value=$HbA1c  size=5 />"; }
			if($HbA1c==null)  {
			echo "<span class=style9>糖化血色素 HbA1c"; 
			echo "</span></td>
            <td><input name=HbA1c type=text id=HbA1c class=style9 size=5  value=$HbA1c >"; }?>
                 %</td><td><span class="style11">(130～250mg/dl)</span></td>
            <td><?php if($pp>=130 && $pp<=250 && $pp != null) 
			           { 
					    echo "<span class=style9>血磷  P";
						echo "</span></td>
            <td><input name=pp type=text id=pp class=style9 value=$pp  size=5 />
					   ";} 
			if(($pp<130 || $pp>250)&& $pp != null)  {
			echo "<span class=style10>血磷  P"; 
			echo "</span></td>
            <td><input name=pp type=text id=pp class=style10 value=$pp  size=5 />"; }
			if($pp==null)  {
			echo "<span class=style9>血磷  P"; 
			echo "</span></td>
            <td><input name=pp type=text id=pp class=style9 size=5  value=$pp >"; }?>
              mg/dL</td><td><span class="style11">(130～250mg/dl)</span></td>
          </tr>
          <tr>
            <td><?php if($Hgb>=130 && $Hgb<=250 && $Hgb != null) 
			           { 
					    echo "<span class=style9>血色素  Hgb";
						echo "</span></td>
            <td><input name=Hgb type=text id=Hgb class=style9 value=$Hgb  size=5 />
					   ";} 
			if(($Hgb<130 || $Hgb>250)&& $Hgb != null)  {
			echo "<span class=style10>血色素  Hgb"; 
			echo "</span></td>
            <td><input name=Hgb type=text id=Hgb class=style10 value=$Hgb  size=5 />"; }
			if($Hgb==null)  {
			echo "<span class=style9>血色素  Hgb"; 
			echo "</span></td>
            <td><input name=Hgb type=text id=Hgb class=style9 size=5  value=$Hgb >"; }?>
             
              g/dL</td><td><span class="style11">(130～250mg/dl)</span></td>
            <td><?php if($ca>=130 && $ca<=250 && $ca != null) 
			           { 
					    echo "<span class=style9>血鈣 Ca";
						echo "</span></td>
            <td><input name=ca type=text id=ca class=style9 value=$ca  size=5 />
					   ";} 
			if(($ca<130 || $ca>250)&& $ca != null)  {
			echo "<span class=style10>血鈣 Ca"; 
			echo "</span></td>
            <td><input name=ca type=text id=ca class=style10 value=$ca  size=5 />"; }
			if($ca==null)  {
			echo "<span class=style9>血鈣 Ca"; 
			echo "</span></td>
            <td><input name=ca type=text id=ca class=style9 size=5  value=$ca >"; }?>
                mg/dL</td><td><span class="style11">(130～250mg/dl)</span></td>
          </tr>
          <tr>
            <td><?php if($Hct>=90 && $Hct<=150 && $Hct != null) 
			           { 
					    echo "<span class=style9>血容比  Hct";
						echo "</span></td>
            <td><input name=Hct type=text id=Hct class=style9 value=$Hct  size=5 />
					   ";} 
			if(($Hct<90 || $Hct>150)&& $Hct != null)  {
			echo "<span class=style10>血容比  Hct"; 
			echo "</span></td>
            <td><input name=Hct type=text id=Hct class=style10 value=$Hct  size=5 />"; }
			if($Hct==null)  {
			echo "<span class=style9>血容比  Hct"; 
			echo "</span></td>
            <td><input name=Hct type=text id=Hct class=style9 size=5  value=$Hct >"; }?>
                           %</td><td><span class="style11">(130～250mg/dl)</span></td>
            <td><?php if($fe>=130 && $fe<=250 && $fe != null) 
			           { 
					    echo "<span class=style9>血鐵  Fe";
						echo "</span></td>
            <td><input name=fe type=text id=fe class=style9 value=$fe  size=5 />
					   ";} 
			if(($fe<130 || $fe>250)&& $fe != null)  {
			echo "<span class=style10>血鐵  Fe"; 
			echo "</span></td>
            <td><input name=fe type=text id=fe class=style10 value=$fe  size=5 />"; }
			if($fe==null)  {
			echo "<span class=style9>血鐵  Fe"; 
			echo "</span></td>
            <td><input name=fe type=text id=fe class=style9 size=5  value=$fe >"; }?>
                           μg/dL</td><td><span class="style11">(130～250mg/dl)</span></td>
          </tr>
          <tr>
            <td><?php if($ferritin>=90 && $ferritin<=150 && $ferritin != null) 
			           { 
					    echo "<span class=style9>血清 ferritin";
						echo "</span></td>
            <td><input name=ferritin type=text id=ferritin class=style9 value=$ferritin  size=5 />
					   ";} 
			if(($ferritin<90 || $ferritin>150)&& $ferritin != null)  {
			echo "<span class=style10>血清 ferritin"; 
			echo "</span></td>
            <td><input name=ferritin type=text id=ferritin class=style10 value=$ferritin  size=5 />"; }
			if($ferritin==null)  {
			echo "<span class=style9>血清 ferritin"; 
			echo "</span></td>
            <td><input name=ferritin type=text id=ferritin class=style9 size=5  value=$ferritin >"; }?>
              
              mg/mL</td><td><span class="style11">(130～250mg/dl)</span></td>
            <td><?php if($TIBC>=130 && $TIBC<=250 && $TIBC != null) 
			           { 
					    echo "<span class=style9>鐵總結合能力 TIBC";
						echo "</span></td>
            <td><input name=TIBC type=text id=TIBC class=style9 value=$TIBC  size=5 />
					   ";} 
			if(($TIBC<130 || $TIBC>250)&& $TIBC != null)  {
			echo "<span class=style10>鐵總結合能力 TIBC"; 
			echo "</span></td>
            <td><input name=TIBC type=text id=TIBC class=style10 value=$TIBC  size=5 />"; }
			if($TIBC==null)  {
			echo "<span class=style9>鐵總結合能力 TIBC"; 
			echo "</span></td>
            <td><input name=TIBC type=text id=TIBC class=style9 size=5  value=$TIBC >"; }?>
              
              μg/dL</td><td><span class="style11">(130～250mg/dl)</span></td>
          </tr>
          <tr>
            <td><?php if($ua>=90 && $ua<=150 && $ua != null) 
			           { 
					    echo "<span class=style9>尿酸  UA";
						echo "</span></td>
            <td><input name=ua type=text id=ua class=style9 value=$ua  size=5 />
					   ";} 
			if(($ua<90 || $ua>150)&& $ua != null)  {
			echo "<span class=style10>尿酸  UA"; 
			echo "</span></td>
            <td><input name=ua type=text id=ua class=style10 value=$ua  size=5 />"; }
			if($ua==null)  {
			echo "<span class=style9>尿酸  UA"; 
			echo "</span></td>
            <td><input name=ua type=text id=ua class=style9 size=5  value=$ua >"; }?>
              
              mg/dL </td><td><span class="style11">(130～250mg/dl)</span></td>
            <td><?php if($ferritinn>=130 && $ferritinn<=250 && $ferritinn != null) 
			           { 
					    echo "<span class=style9>血清轉鐵蛋白 ferritin";
						echo "</span></td>
            <td><input name=ferritinn type=text id=ferritinn class=style9 value=$ferritinn  size=5 />
					   ";} 
			if(($ferritinn<130 || $ferritinn>250)&& $ferritinn != null)  {
			echo "<span class=style10>血清轉鐵蛋白 ferritin"; 
			echo "</span></td>
            <td><input name=ferritinn type=text id=ferritinn class=style10 value=$ferritinn  size=5 />"; }
			if($ferritinn==null)  {
			echo "<span class=style9>血清轉鐵蛋白 ferritin"; 
			echo "</span></td>
            <td><input name=ferritinn type=text id=ferritinn class=style9 size=5  value=$ferritinn >"; }?>
              
              mg/mL</td><td><span class="style11">(130～250mg/dl)</span></td>
          </tr>
          <tr>
            <td><?php if($Cholesterol>=90 && $Cholesterol<=150 && $Cholesterol != null) 
			           { 
					    echo "<span class=style9>膽固醇 Cholesterol";
						echo "</span></td>
            <td><input name=Cholesterol type=text id=Cholesterol class=style9 value=$Cholesterol  size=5 />
					   ";} 
			if(($Cholesterol<90 || $Cholesterol>150)&& $Cholesterol != null)  {
			echo "<span class=style10>膽固醇 Cholesterol"; 
			echo "</span></td>
            <td><input name=Cholesterol type=text id=Cholesterol class=style10 value=$Cholesterol  size=5 />"; }
			if($Cholesterol==null)  {
			echo "<span class=style9>膽固醇 Cholesterol"; 
			echo "</span></td>
            <td><input name=Cholesterol type=text id=Cholesterol class=style9 size=5  value=$Cholesterol >"; }?>
             
              mg/dL </td><td><span class="style11">(130～250mg/dl)</span></td>
            <td><?php if($Triglyceride>=130 && $Triglyceride<=250 && $Triglyceride != null) 
			           { 
					    echo "<span class=style9>中性脂肪 (三酸甘油) Triglyceride";
						echo "</span></td>
            <td><input name=Triglyceride type=text id=Triglyceride class=style9 value=$Triglyceride  size=5 />
					   ";} 
			if(($Triglyceride<130 || $Triglyceride>250)&& $Triglyceride != null)  {
			echo "<span class=style10>中性脂肪 (三酸甘油) Triglyceride"; 
			echo "</span></td>
            <td><input name=Triglyceride type=text id=Triglyceride class=style10 value=$Triglyceride  size=5 />"; }
			if($Triglyceride==null)  {
			echo "<span class=style9>中性脂肪 (三酸甘油) Triglyceride"; 
			echo "</span></td>
            <td><input name=Triglyceride type=text id=Triglyceride class=style9 size=5  value=$Triglyceride >"; }?>
              
              mg/dL </td><td><span class="style11">(130～250mg/dl)</span></td>
          </tr>
        </table>
        <div align="right">
		 <input name="user_age" type="hidden" id="user_age" value='<?php echo $user_age; ?>' size="5" />
  <input name="user_h" type="hidden" id="user_h" value='<?php echo $user_h; ?>' size="5" />
  <input name="user_sex" type="hidden" id="user_sex" value=<?php echo $user_sex; ?> size="5" />
  <input name="user_w" type="hidden" id="user_w" value='<?php echo $user_w; ?>' size="5" />
  <input name="diabetes" type="hidden" id="diabetes" value='<?php echo $diabetes; ?>' size="5" />
  <input name="hypertension" type="hidden" id="hypertension" value='<?php echo $hypertension; ?>' size="5" />
  <input name="bmi" type="hidden" id="bmi" value='<?php echo $bmi; ?>' size="5" />
  <input name="good_w" type="hidden" id="good_w" value='<?php echo $good_w; ?>' size="5" />
  <input name="good_w2" type="hidden" id="good_w2" value='<?php echo $good_w2; ?>' size="5" />
  <input name="waistline" type="hidden" id="waistline" value='<?php echo $waistline; ?>' size="5" />
  <input name="heart" type="hidden" id="heart" value='<?php echo $heart; ?>' size="5" />
  <input name="kidney" type="hidden" id="kidney" value='<?php echo $kidney; ?>' size="5" />
  <input name="pronunciation" type="hidden" id="pronunciation" value='<?php echo $pronunciation; ?>' size="5" />
  <input name="actions" type="hidden" id="actions" value='<?php echo $actions; ?>' size="5" />
          <input name="button"  type="button" onclick="history.go( -1 );return true;" value="上一頁" />
        <input type="submit" name="下一頁" id="下一頁" value="下一頁" />
    </div></td></tr>
  </table>
</form>
<p class="style4 style5">&nbsp;</p>
<h3> <a href="#"></a></h3>


<h3>&nbsp;</h3>

<p>&nbsp;</p>
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