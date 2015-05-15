<?php
//這隻php用途：管理留言資料
if(!defined('BOARD_CHECK')){
	 exit('Not Allowed');
}
//登入部份
if(isset($_POST['zloginpw001']) && isset($_POST['zlogin001']) && isset($zcheckimg) && isset($_POST['check005']) && !isset($sionadmin) && ($_POST['check005'] == $zcheckimg) && ($_POST['zlogin001'] == $zloginna) && ($_POST['zloginpw001'] == $zloginpw)){

     $sionadmin01 = '<?php $sionadmin=\'YES\'; ?>';

     $zfun->w_fwrite($userid02, $sionadmin01); //寫入已登入 YES

	 $zfun->page_jumps($pagejump, '1'); //頁面轉跳方式
	 
}elseif(isset($_GET['zadminedit']) && !empty($_GET['zadminedit']) && ($sionadmin == 'YES')){ //顯示,編輯,回覆,刪除 頁面
 
	 $editfile02 = $zfun->dbdir01 . $_GET['zadminedit'] . '.php';
	 
	 if(file_exists($editfile02)){ //檢查檔案是否存在,以避免按上一頁

         include_once($editfile02); 
		 if(!isset($zporetext)){
		     $zporetext = '';
		 }
		 
		 if($showswitch == 1){
             $showopen01 = '
<div class="zadmin005">
<p><b>打開或關閉留言：</b></p>';

             if(isset($showallow) && $showallow == 1){
                 $showopen01 .= '
  <p><input name="showradio003" type="radio" value="open" checked> 打開 ( 允許所有人，都可查看此則留言。 )</p>
  <p><input name="showradio003" type="radio" value="close"> 關閉 ( 只限管理員，才能查看此則留言。 )</p>';
             }else{
			     $showopen01 .= '
  <p><input name="showradio003" type="radio" value="open"> 打開 ( 允許所有人，都可查看此則留言。 )</p>
  <p><input name="showradio003" type="radio" value="close" checked> 關閉 ( 只限管理員，才能查看此則留言。 )</p>';
			 }
			 
			 $showopen01 .= '
  <p align="center"><input type="submit" name="Submit" value="提交"></p>
</div>
';
         }else{
		     $showopen01 = '';		
		 }
		 
         $zpoedit01 = array('{_showopen011_}', '{_zpoip011_}', '{_popage011_}', '{_name011_}', '{_email011_}', '{_website011_}', '{_text011_}', '{_retext011_}', '{_poeditnum011_}', '{_potime011_}');
         $zpoedit02 = array($showopen01, $zpoip, $_GET['pnow'], $zponame, $zpoemail, $zpowebsite, $zpotext, $zporetext, $_GET['zadminedit'], $zpotime);
         $zfun->out_tplreplace($zpoedit01, $zpoedit02, 'zadmin02.htm'); //替換zadmin02模板內容
	 
	 }else{
	     $zfun->outhtm .= '<br><div><font color=#FF0000><b>警告：此留言資料不存在或已被刪除</b></font></div>';
	 }
	
}elseif(isset($_GET['poupdate']) && ($_GET['poupdate'] == 1) && ($sionadmin == 'YES')){ //執行更新,回覆,刪除

     if(get_magic_quotes_gpc()){ //系統有無開啟轉換符，如開啟則去掉轉換符
         $name004 = stripslashes(trim($_POST['name003'])); //trim去除首尾空白
         $email004 = stripslashes(trim($_POST['email003']));
         $website004 = stripslashes(trim($_POST['website003']));
	     $text004 = stripslashes(trim($_POST['text003']));
	     $retext004 = stripslashes(trim($_POST['retext003']));
     }else{
         $name004 = trim($_POST['name003']); //trim去除首尾空白
         $email004 = trim($_POST['email003']);
         $website004 = trim($_POST['website003']);
	     $text004 = trim($_POST['text003']);
	     $retext004 = trim($_POST['retext003']);
     }
	 
	 $zdelbox005 = ''; $showradio005 = ''; //變數初始化
	 
     if(isset($_POST['showradio003'])){ $showradio005 = trim($_POST['showradio003']); }
	 if(isset($_POST['zdelbox003'])){ $zdelbox005 = trim($_POST['zdelbox003']); } 
	 $poeditnum005 = trim($_POST['poeditnum003']);
	 
	 //寫入php檔的部份,都要將htm特殊符號轉16進位方式	 
     $name005 = $zfun->str_sphtmto16($name004);
     $email005 = $zfun->str_sphtmto16($email004);
     $website005 = $zfun->str_sphtmto16($website004);
     $text005 = $zfun->str_sphtmto16($text004);
     $retext005 = $zfun->str_sphtmto16($retext004);
     
	 $alarmfile02 = $zfun->dbdir01 . $poeditnum005 . '.php';
	 include_once($alarmfile02); //載入要更新的檔案,讀取 time 及 ip
	 
	 if($zdelbox005 == 'suredel'){ //刪貼
	     
		 include($zfun->dbnum01);
         $dbnum02 = count($dbnum); //計算dbnum多少陣列
	     
		 $dbnum06 = '<?php ';
		 $j=0;
	     for($i=0; $i<$dbnum02; $i++){ //刪除索引
			 
			 if($poeditnum005 != $dbnum[$i]){
	             $dbnum06 .= '$dbnum['.$j.']='.$dbnum[$i].';'."\r\n";
		         $j++;
			 }
			 
		 }
		 $dbnum06 .= '?>';

         $zfun->w_fwrite($zfun->dbnum01, $dbnum06); //更新索引
		 
		 $zdelfile03 = $zfun->dbdir01 . $poeditnum005 . '.php'; //刪除留言檔案
         @unlink($zdelfile03);
	     
		 $zfun->page_jumps($pagejump, $_GET['pnow']); //頁面轉跳方式 
	 
	 }else{ //更新資料
	     $zalarm = '';
	     if(empty($name005) || (strlen($name005) > 46)){
         $zalarm = '警告：暱稱不可為空或超過45字元（15中文字）';
         }elseif(strlen($email005) > 151){
         $zalarm = '警告：信箱不可超過150字元';
         }elseif(strlen($website005) > 251){
         $zalarm = '警告：網站不可超過250字元';
         }elseif(empty($text005) || (strlen($text005) > 3001)){
         $zalarm = '警告：留言內容不可為空或超過3000字元（1000中文字）';
         }elseif(strlen($retext005) > 3001){
		 $zalarm = '警告：回覆不可超過3000字元（1000中文字）';
		 }else{ //上述判斷ok才寫入資料
		 
		     $text006 = $zfun->str_zbbcode($text005); //內容網址轉url或img bbcode 
		 
		     if(empty($retext005)){ //有無管理員回覆
	             $zupdate001 = '<?php $zponame=\''.$name005.'\'; $zpoemail=\''.$email005.'\'; $zpowebsite=\''.$website005.'\'; $zpotext=\''.$text006.'\'; $zpotime=\''.$zpotime.'\'; $zpoip=\''.$zpoip.'\';';
				 if($showradio005 == 'open'){ //審核是否公開
				     $zupdate001 .= ' $showallow=\'1\'; ?>';
		         }else{
				     $zupdate001 .= ' ?>';
				 }
			 }else{
			     $retext006 = $zfun->str_zbbcode($retext005); //內容網址轉url或img bbcode
			     $zupdate001 = '<?php $zponame=\''.$name005.'\'; $zpoemail=\''.$email005.'\'; $zpowebsite=\''.$website005.'\'; $zpotext=\''.$text006.'\'; $zporetext=\''.$retext006.'\'; $zpotime=\''.$zpotime.'\'; $zpoip=\''.$zpoip.'\';';
		         if($showradio005 == 'open'){ //審核是否公開
				     $zupdate001 .= ' $showallow=\'1\'; ?>';
		         }else{
				     $zupdate001 .= ' ?>';
				 }
			 }
	 	 
		     $wrupfile01 = $zfun->dbdir01 . $poeditnum005 . '.php'; //寫入更新資料
             $zfun->w_fwrite($wrupfile01, $zupdate001);
		 
             $zfun->page_jumps($pagejump, $_GET['pnow']); //頁面轉跳方式
		 
	     }
		 
		 if(!empty($zalarm)){ //顯示錯誤訊息

			 $zfun->outhtm .= '<br><div><font color=#FF0000><b>'.$zalarm.'</b></font></div>';
		 
			 if($showswitch == 1){
             $showopen01 = '
<div class="zadmin005">
<p><b>打開或關閉留言：</b></p>';

             if(isset($showallow) && $showallow == 1){
                 $showopen01 .= '
  <p><input name="showradio003" type="radio" value="open" checked> 打開 ( 允許所有人，都可查看此則留言。 )</p>
  <p><input name="showradio003" type="radio" value="close"> 關閉 ( 只限管理員，才能查看此則留言。 )</p>';
             }else{
			     $showopen01 .= '
  <p><input name="showradio003" type="radio" value="open"> 打開 ( 允許所有人，都可查看此則留言。 )</p>
  <p><input name="showradio003" type="radio" value="close" checked> 關閉 ( 只限管理員，才能查看此則留言。 )</p>';
			 }
			 
			 $showopen01 .= '
  <p align="center"><input type="submit" name="Submit" value="提交"></p>
</div>
';
             }else{
		     $showopen01 = '';		
		     }
		
             $zpoedit06 = array('{_showopen011_}', '{_zpoip011_}', '{_popage011_}', '{_name011_}', '{_email011_}', '{_website011_}', '{_text011_}', '{_retext011_}', '{_poeditnum011_}');
             $zpoedit07 = array($showopen01, $zpoip, $_GET['pnow'], $name005, $email005, $website005, $text005, $retext005, $poeditnum005);
             $zfun->out_tplreplace($zpoedit06, $zpoedit07, 'zadmin02.htm'); //替換zadmin02模板內容
	 
         }	 
	 }
	
	
}elseif(isset($_GET['zout']) && ($_GET['zout'] == 1) && ($sionadmin == 'YES')){ //登出
	
	 @unlink($userid02); //刪除session檔
		 
     $zfun->page_jumps($pagejump, '1'); //頁面轉跳方式
	
}else{ //登入頁面

     $zfun->out_tplnoplace('zadmin01.htm');

}

?>