<?php
/*
ob_start();

@session_start();

define('USER_SESSIONS',	session_id());				  //設定使用者SESSION
define("DB_HOST" , "localhost");					  //定義資料庫連線位置
define("DB_NAME" , "food");							  //定義資料庫名稱
define("DB_USER" , "root");						  //定義資料庫使用者
define("DB_PASS" , "admin123");					  //定義資料庫使用者密碼
define("ROOT_URL" ,	"http://140.128.99.12/health");	  //網站網址最後請勿加斜線
define("ROOT_PATH" , "C:/AppServ/www/health");		  //網站根目錄最後請勿加斜線
define("IMG_URL" , ROOT_URL	. "/img");				  //網站圖片目錄最後請勿加斜線
define("IMG_PATH" ,	ROOT_PATH .	"/img");			  //網站圖片根目錄最後請勿加斜線
define("WEB_CHARSET" , "UTF-8");					  //網站編碼
define("WEB_TITLE" , "衛教中心");					  //網站標題
define("PAGE_NUM" ,	"20");							  //每頁顯示數量
define("COOKIE_TIME" , "21600");					  //設定網站COOKIE存活時間，單位秒

$DB['ID']   = mysql_connect(DB_HOST , DB_USER , DB_PASS)or die("資料庫連線失敗");
$DB['CONN'] = mysql_select_db(DB_NAME , $DB['ID']);
@mysql_query('SET character_set_client = utf8;');
@mysql_query('SET character_set_results = utf8;');
@mysql_query('SET character_set_connection = utf8;');
*/
?>

<?PHP
include_once 'config.php';

if ( !ck_login(session_id()) )
{	
	showMsg('此功能限會員使用!!');
	reDirect(ROOT_URL);
}
if (ckadmin())
{
	//echo "###########".$USER['power']."############";
	$admin = $USER[username];
	$adminpw = $USER[password];
}

?>

<?php
$zloginna = $admin;  //管理員登入帳號
$zloginpw = $adminpw;  //管理員登入密碼

$showswitch = 0;      //留言是否需審核,才會顯示內容,設 0 不用審核,設 1 需審核
$pagejump = 0;        //管理頁面轉跳不可常時,可改其它方式, 0 為php方式, 1 為htm方式, 2 為javascript方式
$gzipswitch = 0;      //網頁GZIP壓縮,設 0 不使用,設 1 使用
$tplovertime = 86400; //多久時間更換下個模板,預設24小時
$shownum1 = 15;       //每頁顯示多少筆資料
$savetextz = 500;     //最多存放幾筆留言
$zpagese = 3;         //分頁顯示前後多少頁數,預設3,如果是第5頁,則顯示2 3 4 5 6 7 8這些頁數

define('BOARD_CHECK','VERY_GOOD');

ob_start(); //啟用緩衝輸出,避免有的免空,開頭強制廣告,造成不明錯誤

include_once('./myclass.php');
$zfun = new zmyclass;

//模板總數,如有新模板,可自行加入添加
//$zfun->tplnums02 = array('./tpl/f01/', './tpl/f02/', './tpl/f03/', './tpl/f04/', './tpl/f05/', './tpl/f06/'); 
$zfun->tplnums02 = array( './tpl/f03/'); 
$zfun->dbnum01 = './zdata/dbnums.php';     //存放留言索引檔路徑
$zfun->dbdir01 = './zdata/a/';             //存放留言資料目錄路徑
$zfun->usernum01 = './zdata/usernums.php'; //存放session索引檔路徑,如有更動ckimg.php內也需修改
$zfun->userdir01 = './zdata/b/';           //存放session資料目錄路徑,如有更動ckimg.php內也需修改
$zfun->tplnums01 = './zdata/tplnums.php';  //存放輪流顯示模板資料檔路徑
$zfun->outhtm = '';                        //清空網頁輸出值

$zfun->tpl_turn($tplovertime); //模板輪流,變數tplovertime為超時設置

session_start();
$userid01 = session_id();
$userid02 = $zfun->userdir01 . $userid01 . '.php';
@include_once($userid02); //載入瀏覽人的session

//--------頭部--------     
	 if(isset($sionadmin) && ($sionadmin == 'YES')){ //判斷是否為管理員
         $zenterout002 = '<a href="gbook00.php?mod=zadmin&zout=1">登出</a>';
     }else{
         $zenterout002 = '<a href="gbook00.php?mod=zadmin">管理</a>';
     }
     $tplrep01 = array('{_TplDir_}', '{_zenterout001_}');
     $tplrep02 = array($zfun->tpldir01, $zenterout002);
     $zfun->out_tplreplace($tplrep01, $tplrep02, 'header.htm'); //替換header模板內容

//--------中間--------
     if(isset($_GET['mod']) && ($_GET['mod'] == 'znewpo')){
         include_once('./znewpo.php');
     }elseif(isset($_GET['mod']) && ($_GET['mod'] == 'zadmin')){
         include_once('./zadmin.php');
     }/*elseif(isset($_GET['mod']) && ($_GET['mod'] == 'zaboutme')){
         include_once('./zaboutme.php');
     }*/else{
         include_once('./ztype.php');
     }

//--------尾部--------
     $zfun->out_tplnoplace('footer.htm'); //載入footer模板

     
//--------輸出--------
     if($gzipswitch == 1){ //是否啟用GZIP
         header('Content-Encoding: gzip');
         echo gzencode($zfun->outhtm, 1, FORCE_GZIP);
     }else{
	     echo $zfun->outhtm;
     }
	 
exit();
?>