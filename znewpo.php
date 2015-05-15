<?php
//這隻php用途：發表留言

//echo $USER[username];

if(!defined('BOARD_CHECK')){
	exit('Not Allowed');
}

if(isset($_GET['newpost']) && ($_GET['newpost'] == 1) && isset($_POST['check001'])){

if(get_magic_quotes_gpc()){ //系統有無開啟轉換符，如開啟則去掉轉換符
     $name002 = stripslashes($USER[username]); //trim去除首尾空白
     $check002 = stripslashes(trim($_POST['check001']));
	 $text002 = stripslashes(trim($_POST['text001']));
}else{
     $name002 = trim($USER[username]); //trim去除首尾空白
     $check002 = trim($_POST['check001']);
   	 $text002 = trim($_POST['text001']);
}

$name002 = $zfun->str_sphtmto16($name002); //5個特殊htm符號轉16進位
$email002 = $zfun->str_sphtmto16($email002);
$website002 = $zfun->str_sphtmto16($website002);
$check002 = $zfun->str_sphtmto16($check002);
$text003 = $zfun->str_sphtmto16($text002);

$text002 = $zfun->str_zbbcode($text003); //內容網址轉url或img bbcode

$zalarm = '';
if(!isset($zcheckimg) || empty($check002) || (strlen($check002) > 5) || ($check002 != $zcheckimg)){
$zalarm = '警告：驗証碼不可為空或驗証碼不匹配或超過4字元';
}/*elseif(empty($name002) || (strlen($name002) > 46)){
$zalarm = '警告：暱稱不可為空或超過45字元（15中文字）';
}elseif(strlen($email002) > 151){
$zalarm = '警告：信箱不可超過150字元';
}elseif(strlen($website002) > 251){
$zalarm = '警告：網站不可超過250字元';
}*/elseif(empty($text002) || (strlen($text002) > 3001)){
$zalarm = '警告：留言內容不可為空或超過3000字元（1000中文字）';
}else{ //將留言的資料,寫入至文件

include($zfun->dbnum01); //留言索引
$dbnum02 = count($dbnum); //計算dbnum多少陣列
$dbnum03 = $dbnum02 - 1;
$dbnum05 = $dbnum[$dbnum03] + 1;

$dbnum06 = '<?php ';

if($dbnum02 > $savetextz){ //超出預設500筆留言則刪除最舊第1筆
     $j=0;
    for($i=0; $i<$dbnum03; $i++){
	     $j = $i + 1;
	     $dbnum06 .= '$dbnum['.$i.']='.$dbnum[$j].';'."\r\n";
	}	
	 $dbnum06 .= '$dbnum['.$dbnum03.']='.$dbnum05.'; ?>';	
	 $zdelfile1 = $zfun->dbdir01 . $dbnum[0] . '.php'; //刪除第1筆資料
	 @unlink($zdelfile1);	
}else{   
	for($i=0; $i<$dbnum02; $i++){
         $dbnum06 .= '$dbnum['.$i.']='.$dbnum[$i].';'."\r\n";
    }
	 $dbnum06 .= '$dbnum['.$dbnum02.']='.$dbnum05.'; ?>';
}
 
$zfun->w_fwrite($zfun->dbnum01, $dbnum06); //寫入留言索引

$wrtime01 = time() + 28800; //台北時間為 GMT+8 小時
$wrtime02 = gmdate('Y-n-j H:i:s', $wrtime01);
$zpoip01 = $_SERVER['REMOTE_ADDR'];

$wrpost03 = '<?php $zponame=\''.$name002.'\'; $zpoemail=\''.$email002.'\'; $zpowebsite=\''.$website002.'\'; $zpotext=\''.$text002.'\'; $zpotime=\''.$wrtime02.'\'; $zpoip=\''.$zpoip01.'\' ?>';

$wrfile04 = $zfun->dbdir01 . $dbnum05 . '.php';
$zfun->w_fwrite($wrfile04, $wrpost03); //寫入留言資料

    if(isset($sionadmin) && ($sionadmin == 'YES')){ //檢查是否是管理員
         $wrsion01 = '<?php $sionadmin=\'YES\'; ?>';
         $zfun->w_fwrite($userid02, $wrsion01);
    }else{
         @unlink($userid02); //刪除存放驗証碼檔
    }

@sleep(1);
include_once('./ztype.php');

}
	
    if(!empty($zalarm)){

	 $zfun->outhtm .= '<br><div><font color=#FF0000><b>'.$zalarm.'</b></font></div>';
	
	 $tplrep05 = array('{_name010_}', '{_email010_}', '{_website010_}', '{_text010_}');
     $tplrep06 = array($name002, $email002, $website002, $text003);
	 
	 $zfun->out_tplreplace($tplrep05, $tplrep06, 'znewpo.php'); //替換znewpo模板內容
	 
    }

}else{

     $tplrep08 = array('{_name010_}', '{_email010_}', '{_website010_}', '{_text010_}');

     $zfun->out_tplreplace($tplrep08, '', 'znewpo.php'); //替換znewpo模板內容

}

?>