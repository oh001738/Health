<?php
//這隻php用途：檢查及說明
if(!defined('BOARD_CHECK')){
	exit('Not Allowed');
}

//安全模式檢查
if(get_cfg_var('safe_mode')){
    $safecheck01 = '<font color="#FF0000">是</font><font size="2"> ,可能造成文件寫入失敗,此留言板無法正常運作.</font>';
}else{
    $safecheck01 = '否';
}

//函數檢查
$zfunck001 = array('ob_start', 'unlink', 'session_start', 'session_id', 'fopen', 'flock', 'fwrite',
 'filesize' , 'fread', 'str_replace', 'preg_replace', 'sleep', 'header', 'time', 'gmdate', 'count',
 'ceil', 'nl2br', 'file_exists', 'mt_srand', 'microtime', 'mt_rand', 'imagecreate',
 'imagecolorallocate','imagefill', 'imagestring', 'imagegif', 'imagedestroy', 'gzencode' , 'file_exists');

$zfunck002 = @get_defined_functions();

$zcheck002 = ''; //變數初始化

$zfunck003 = 0;
if(empty($zfunck002)){
     $zcheck002 = '此空間已禁掉 get_defined_functions 函數，無法檢查，但如果使用正常，那就沒關係。';
}else{

     foreach ($zfunck001 as $key => $zval001){
         
		 foreach ($zfunck002['internal'] as $key => $zval002){ 
			 if($zval001 == $zval002){
                 $zfunck003 = 1;
			 }
		 }
         
		 if($zfunck003 == 1){
		     $zcheck002 .= $zval001 . ' ok<br>';
		     $zfunck003 = 0;
		 }else{
		     $zcheck002 .= $zval001 . ' <font color="#FF0000">not ok</font><br>';
		 }
	 }

}

$rep019 = array('{_safemode012_}', '{_funcheck012_}');
$rep020 = array($safecheck01, $zcheck002);

$zfun->out_tplreplace($rep019, $rep020, 'zaboutme.htm'); //替換zaboutme.htm模板內容

?>