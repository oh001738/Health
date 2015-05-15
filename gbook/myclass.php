<?php
class zmyclass{
    var $dbnum01; //留言索引檔路徑
	var $dbdir01; //留言資料目錄路徑
	var $usernum01; //session索引檔路徑
	var $userdir01; //session資料目錄路徑
	var $tpldir01; //模板路徑
	var $tplnums01; //存放輪流顯示模板資料檔路徑
	var $tplnums02 = array(); //存放所有模板路徑陣列
    
	var $zfile; //要處理的檔案
    var $zfhandle; //要處理的文件指針
	var $zftexts; //要處理的文件內容
	
	var $outhtm; //輸出網頁內容
	
	function page_jumps($pagejump01, $pagejump02){ //頁面轉跳方式
		 $this->outhtm = '';
		 if(empty($pagejump02)){
		     $pagejump02 = 1;
		 }

		 if($pagejump01 == 2){
	         echo '<meta http-equiv="pragma" content="no-cache">
			 <script language="JavaScript"> function sleeptime(){ location.href=("index.php?pnow=' . $pagejump02 . '"); } setTimeout("sleeptime()",1500); </script>';
	     }elseif($pagejump01 == 1){
	         echo '<meta http-equiv="pragma" content="no-cache">
			 <meta http-equiv="refresh" content="1; url=index.php?pnow=' . $pagejump02 . '">';
	     }else{
	         @sleep(1);
		     $zurl07 = 'Location: index.php?pnow=' . $pagejump02;
			 header('Pragma: no-cache');
             header($zurl07);
         }
	     exit();
	}

	function tpl_turn($tplovertime01){ //模板輪流,tplnums09為所有模板路徑陣列,tplovertime01超時
	     include_once($this->tplnums01);
         $tplnums03 = count($this->tplnums02);
         $tplnowtime01 = time();
         $tplnowtime02 = $tplnowtime01 - $tplovertime01;
         if($tploldtime01 < $tplnowtime02){ //超時顯示下個模板
             $tplnums06 = $tplnums05 + 1;
             
			 if($tplnums06 >= $tplnums03){ //超過最大陣列時,則回第0陣列
	             $tplnums06 = 0;
	         }	 
         $tplnums07 = '<?php $tplnums05=\''.$tplnums06.'\'; $tploldtime01=\''.$tplnowtime01.'\'; ?>';
         $this->w_fwrite($this->tplnums01, $tplnums07); 
         $this->tpldir01 = $this->tplnums02[$tplnums06];
		 }else{
         $this->tpldir01 = $this->tplnums02[$tplnums05];
         }
	}
	
	function out_tplreplace($tplrep001, $tplrep002, $tplfile001){ //輸出模板檔,有替換
	 $this->tpl_load($tplfile001);
	 $this->outhtm .= str_replace($tplrep001, $tplrep002, $this->zftexts);
	}
	
	function out_tplnoplace($tplnorep001){ //輸出模板檔,不替換 
	 $this->tpl_load($tplnorep001);
	 $this->outhtm .= $this->zftexts;
	}
	
	function input_tpl($tplinput01){ //讀入模板,不輸出,不替換
	 $this->tpl_load($tplinput01);
	 return $this->zftexts;
	}
	
    function z_fopen($open_mode, $lock_mode){ //指定什麼摸式打開文件		    
	 $this->zfhandle = fopen($this->zfile, $open_mode);
        @chmod($this->zfile, 0777); //權限轉成777
		if($lock_mode){
         flock($this->zfhandle, $lock_mode);
        }
	}
	
    function z_fclose(){ //關閉文件指針
        if($this->zfhandle){
		 flock($this->zfhandle,LOCK_UN);
	     fclose($this->zfhandle);
        }
    }
    
	//wfile05要寫入的檔案, wstr05要寫入的內容
	function w_fwrite($wfile05, $wstr05){ //以w方式寫入資料,如果文件不存在則創造之
	 $this->zfile = $wfile05;
	 $this->z_fopen('w',LOCK_EX);
     fwrite($this->zfhandle,$wstr05);
     $this->z_fclose();
	}
	
	function r_fread(){ //以r方式,並用fread打開文件成字串
     $this->z_fopen('r',LOCK_SH);
	 $zfsize1 = filesize($this->zfile);
	 $this->zftexts = fread($this->zfhandle, $zfsize1);
	 $this->z_fclose();
	}
	
	function tpl_load($tplfile002){ //讀入模版
	 $this->zfile = $this->tpldir01 . $tplfile002;
     $this->r_fread();
	}
	
	function str_sphtmto16($str101){ //將特殊符號轉16進位以免衝到
	 $str102 = array('<', '>', '\'', '"', '\\');
     $str103 = array('&#x3C;', '&#x3E;', '&#x27;', '&#x22;', '&#x5C;');
     $str105 = str_replace($str102, $str103, $str101);
	 return $str105;
	}

	function str_zbbcode($strbb001){
	 //將http 轉成url bbcode
     $strbb002 = array('[url]', '[/url]', '[img]', '[/img]'); //清空這4個字串
     $strbb003 = str_replace($strbb002, '', $strbb001);
     $strbb004 = preg_replace('((f|ht){1}tps?://[^[:space:]]+)', '[url]\0[/url]', $strbb003);

     //將gif jpeg jpg ico png bmp 轉成img bbcode
     $strbb005 = preg_replace('(\[url\]((f|ht){1}tps?://[-A-Za-z0-9_/.?=#,%&]+\.(gif|jpg|jpeg|png))\[\/url\])', '[img]\1[/img]', $strbb004);
     return $strbb005;
	}
	
	//共多少分頁,現在顯示第幾頁,分頁css的style,分頁前後數量
    function ztypepage($pageall, $pageb, $zpiececss, $pagenumber){
     $pagelastb = $pageb - $pagenumber;  //for迴圈起始值$pagelastb
        if($pagelastb < 1){
             $pagelastb = 1;
        }

     $pagelastc = $pageb + $pagenumber; //for迴圈結束值$pagelastc
        if($pagelastc > $pageall){
             $pagelastc = $pageall;
        }
     $zpiecepages = '';
     $zpiecepages = '<div class="'.$zpiececss.'"><a href="index.php"><span>返回留言板　｜</span></a>';
        for($pagelasta = $pagelastb; $pagelasta <= $pagelastc; $pagelasta++){
             $zpiecepages .= '<a href="index.php?pnow=' . $pagelasta . '"><span>' . $pagelasta . '</span></a>';
        }
     $zpiecepages .= '<a href="index.php?pnow=' . $pageall . '"><span>｜　最後一頁</span></a></div>';
    
	 $this->outhtm .= $zpiecepages;
	}

}

?>