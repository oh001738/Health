<?php
//這隻php用途：顯示留言資料
if(!defined('BOARD_CHECK')){
	exit('Not Allowed');
}

include($zfun->dbnum01);
$dbnum02 = count($dbnum); //計算dbnum多少陣列
$dbnum03 = $dbnum02 - 1;
if($shownum1 > $dbnum02){ //當顯示數大於資料陣列數,則顯示陣列數
     $shownum1 = $dbnum02;
}

if(!isset($_GET['pnow']) || empty($_GET['pnow'])){ //有無分頁值
     $pagenow = 1;
}else{
     $pagenow = $_GET['pnow'];
}

if($shownum1!=0)
{
	$zpageall = ceil($dbnum02 / $shownum1); //最大分頁數
}
else
{
	$zpageall = 0;
}

if($pagenow > $zpageall){ //超過分頁數,則顯示最大
     $pagenow = $zpageall;
}

if($pagenow < 1){ //從第幾筆陣列開始顯示
     $ztypesw = $dbnum03;
}else{
     $ztypesw = $dbnum03 - (($pagenow - 1) * $shownum1);
}

//url,img 的bbcode替換值
$bbcode_sea = array('/\[url\=(.*?)\](.*?)\[\/url\]/is', '/\[url\](.*?)\[\/url\]/is', '/\[img\](.*?)\[\/img\]/is');
$bbcode_rep = array('<a href="$1" target="_blank">$2</a>', '<a href="$1" target="_blank">$1</a>', '<img src="$1" border=0 onload="if(this.width>417) this.width=416">');

$ztypetpl01 = $zfun->input_tpl('ztype.htm'); //讀入ztype模板,只讀一次,才不會重覆調用

//被替換的字串放到迴圈外,才不會重覆讀取
$tplrep03 = array('{_zponame01_}', '{_zpoemail01_}', '{_zpowebsite01_}', '{_zpocontents01_}', '{_zporetext01_}', '{_zpotime01_}', '{_zpoadmin01_}');

$ztypestr01 = ''; //變數初始化

$j=1;
for($i=$ztypesw; $i>=0; $i--){
     
	 $zporetext = '';
	 
	 if($j > $shownum1){
	     break;
	 }
	
	 $dblink01 = $zfun->dbdir01 . $dbnum[$i] . '.php';
     @include_once($dblink01);
     
	 if(($showswitch == 0) || (isset($sionadmin) && $sionadmin == 'YES') || (isset($showallow) && $showallow == 1)){ //是否需審核
	 
         $zpotext01 = preg_replace($bbcode_sea, $bbcode_rep, $zpotext); //解析img及url之bbcode

         $zpotext = nl2br($zpotext01); //自動換行
	
	     if(!empty($zporetext)){
	         $zporetext01 = preg_replace($bbcode_sea, $bbcode_rep, $zporetext); //解析img及url之bbcode
	         $zporetext = nl2br($zporetext01); //自動換行
	         $zporetext02 = '<div class="ztype005">管理員回覆：<br>'.$zporetext.'</div>';
	         
	     }else{
             $zporetext02 = '';
	     }
	 
	     if(isset($sionadmin) && $sionadmin == 'YES'){ //判斷是否為管理員
             $zpoadminedit = '| <a href="index.php?mod=zadmin&zadminedit='.$dbnum[$i].'&pnow='.$pagenow.'">管理此則留言</a>';
         }else{
             $zpoadminedit = '';
         }
		 
	     $showallow = 0;
	 
	 }else{
		 $zpoemail = 'Pending review';
	     $zpowebsite = 'Pending review';
		 $zpotext = '謝謝您的留言，待管理員審核後，才會公開內容。';
		 $zporetext02 = '';
		 $zpoadminedit = '';
	 }
	 
     $tplrep04 = array($zponame, $zpoemail, $zpowebsite, $zpotext, $zporetext02, $zpotime, $zpoadminedit);

     $ztypestr01 .= str_replace($tplrep03, $tplrep04, $ztypetpl01); //替換ztype模板內容

     $j++;
}

$zfun->outhtm .= $ztypestr01;

$zfun->ztypepage($zpageall,$pagenow,'zpiecepage',$zpagese); //分頁輸出

?>