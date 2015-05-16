<?PHP

ob_start();

@session_start();

define('USER_SESSIONS',	session_id());				  //設定使用者SESSION
define("DB_HOST" , "127.0.0.1:3306");					  //定義資料庫連線位置
define("DB_NAME" , "food");							  //定義資料庫名稱
define("DB_USER" , "root");						  //定義資料庫使用者
define("DB_PASS" , "");					  //定義資料庫使用者密碼
define("ROOT_URL" ,	"http://10.110.24.168:8080/Health");	  //網站網址最後請勿加斜線
define("ROOT_PATH" , "D:/xampp/htdocs/Health");//網站根目錄最後請勿加斜線
define("IMG_URL" , ROOT_URL	. "/img");				  //網站圖片目錄最後請勿加斜線
define("IMG_PATH" ,	ROOT_PATH .	"/img");			  //網站圖片根目錄最後請勿加斜線
define("WEB_CHARSET" , "UTF-8");					  //網站編碼
define("WEB_TITLE" , "Diet Record System");					  //網站標題
define("PAGE_NUM" ,	"10");							  //每頁顯示數量
define("COOKIE_TIME" , "21600");					  //設定網站COOKIE存活時間，單位秒

include_once ROOT_PATH . "/include/functions.php";	  //載入函式庫
include_once ROOT_PATH . "/include/setup.php";		  //載入WEB設定檔

//食物種類陣列
$FOODTYPE['food1'] = '全穀根莖類及加工製品';
$FOODTYPE['food2'] = '豆魚肉蛋類';
$FOODTYPE['food3'] = '蔬菜類';
$FOODTYPE['food4'] = '水果類';
$FOODTYPE['food5'] = '油脂類';
$FOODTYPE['food6'] = '奶類';
$FOODTYPE['food7'] = '其它';

//食物種類陣列2
$FOODTYPE2['food1']	= '中式早餐';
$FOODTYPE2['food2']	= '西式早餐';
$FOODTYPE2['food3']	= '家常菜';
$FOODTYPE2['food4']	= '小吃';
$FOODTYPE2['food5']	= '套餐';
$FOODTYPE2['food6']	= '零食點心';
$FOODTYPE2['food7']	= '飲料';
$FOODTYPE2['food8']	= '酒類';
$FOODTYPE2['food9']	= '調味料';


$MEALTYPE['breakfast'] = '早餐';
$MEALTYPE['lunch']	   = '午餐';
$MEALTYPE['dinner']	   = '晚餐';

//院區陣列
$LOCALTYOE['1'] = '台北';
$LOCALTYPE['2'] = '台中';
$LOCALTYPE['3'] = '高雄';

//行為陣列
$ACTTYPE['1'] = '登入';
$ACTTYPE['2'] = '登出';
$ACTTYPE['3'] = '配餐';
$ACTTYPE['4'] = '瀏覽飲食日誌';
$ACTTYPE['5'] = '刪除飲食日誌';
$ACTTYPE['6'] = '檢視食材';
$ACTTYPE['7'] = '新增食材';
$ACTTYPE['8'] = '刪除食材';
$ACTTYPE['9'] = '修改食材';
$ACTTYPE['10'] = '檢視食物';
$ACTTYPE['11'] = '新增食物';
$ACTTYPE['12'] = '刪除食物';
$ACTTYPE['13'] = '修改食物';
$ACTTYPE['14'] = '檢視套餐';
$ACTTYPE['15'] = '新增套餐';
$ACTTYPE['16'] = '刪除套餐';
$ACTTYPE['17'] = '修改套餐';
$ACTTYPE['18'] = '檢視使用者';
$ACTTYPE['19'] = '新增使用者';
$ACTTYPE['20'] = '刪除使用者';
$ACTTYPE['21'] = '修改使用者';
$ACTTYPE['22'] = '檢視個案紀錄';
$ACTTYPE['23'] = '新增個案紀錄';
$ACTTYPE['24'] = '刪除個案紀錄';
$ACTTYPE['25'] = '修改個案紀錄';



//限定檔案上傳種類
$OnlyFileType =	array('jpg','bmp','png', 'gif',	'jpeg',	'jpe', 'tif');

?>

