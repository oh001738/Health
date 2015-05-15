<?php
//這隻php用途：調用GD產生圖片數字認証碼
//避免有些空間,系統session無作用,自建session檔案
$zusernum02 = './zdata/usernums.php'; //存放session索引檔路徑
$zuserdir02 = './zdata/b/';           //存放session資料目錄路徑

ob_start(); //啟用緩衝輸出,避免有的免空,開頭強制廣告,造成不明錯誤

session_start();

include_once('./myclass.php');

$zckimg = new zmyclass;

$userid03 = session_id();
$userid04 = $zuserdir02 . $userid03 . '.php';
@include_once($userid04); //載入瀏覽人的session

include_once($zusernum02);
$asionnum2 = count($asionnum1); //計算asionnum1多少陣列
$asionnum4 = time();
$asionnum5 = $asionnum4 - 10800; //設置刪除多久以前的session檔案，預設3小時
$asionnum3 = '<?php ';

$j=0;
for($i=0;$i<$asionnum2;$i++){ //刪除與session id相同及超過3小時的session檔案
     if(($asionnum1[$i][0] == $userid03) || ($asionnum1[$i][1] < $asionnum5)){
	     $asionnum6 = $zuserdir02 . $asionnum1[$i][0] . '.php';
	     @unlink($asionnum6);
	 }else{
	     $asionnum3 .= '$asionnum1['.$j.']=array(\''.$asionnum1[$i][0].'\',\''.$asionnum1[$i][1].'\');'."\r\n";
         $j++;
	 }
}

$asionnum3 .= '$asionnum1['.$j.']=array(\''.$userid03.'\',\''.$asionnum4.'\'); ?>';

$zckimg->w_fwrite($zusernum02, $asionnum3); //寫入session索引

header('Content-type: image/gif');

mt_srand((double)microtime() * 1000000); //這一個是加入干擾象素用的取亂數參考值用的
$zcheckpic = mt_rand(1111,9999);

$im = imagecreate(56,26);

$zred1 = imagecolorallocate($im,255,0,0);

//$white = imagecolorallocate($im,255,255,255);

$gray = imagecolorallocate($im,200,200,200);

imagefill($im, 55, 25, $gray);

imagestring($im,5,10,4,$zcheckpic,$zred1); //將四位整數驗證碼繪入圖片
//暫時取消，下述干擾象素
//for($i=0;$i<150;$i++){
//$randcolor=ImageColorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
//imagesetpixel($im,mt_rand() % 70 ,mt_rand() % 30 ,$randcolor);
//}
imagegif($im);
imagedestroy($im); //輸出驗證碼圖片

if(isset($sionadmin) && ($sionadmin == 'YES')){ //檢查是否是管理員
     $wrsion9 = '<?php $sionadmin=\'YES\'; $zcheckimg=\''.$zcheckpic.'\'; ?>';
}else{
     $wrsion9 = '<?php $zcheckimg=\''.$zcheckpic.'\'; ?>';
}

$zckimg->w_fwrite($userid04, $wrsion9); //將check資料寫入session檔案

exit();
?>