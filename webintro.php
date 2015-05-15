<?PHP
include_once 'config.php';

header_print(true);   //載入header檔
?>

<style type="text/css">
@import url(menuTab/menuTab.css);
<!--
.style2 {font-size: 11pt}
-->
</style>
<script type="text/javascript">
function clearLinkDot() {
	var i, a, main;
	for(i=0; (a = document.getElementsByTagName("a")[i]); i++) {
		if(a.getAttribute("onFocus")==null) {
			a.setAttribute("onFocus","this.blur();");
		}else{
			a.setAttribute("onFocus",a.getAttribute("onFocus")+";this.blur();");
		}
		a.setAttribute("hideFocus","hidefocus");
	}
}

function loadTab(obj,n){
	var layer;
	eval('layer=\'S'+n+'\'');

	//將 Tab 標籤樣式設成 Blur 型態
	var tabsF=document.getElementById('tabsF').getElementsByTagName('li');
	for (var i=0;i<tabsF.length;i++){
		tabsF[i].setAttribute('id',null);
		eval('document.getElementById(\'S'+(i+1)+'\').style.display=\'none\'')
	}

	//變更分頁標題樣式
	obj.parentNode.setAttribute('id','current');
	document.getElementById(layer).style.display='inline';
}
</script>
<body onLoad="clearLinkDot();">

<table border = '1' cellpadding = '0' cellspacing = '0' width = '100%' class = 'header_table'>
<tr>
	<td><?PHP include_once ROOT_PATH . '/menubar.php';?></td>
</tr>
<tr>
	<td valign = 'top'>
	<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
	  <!--DWLayoutTable-->
	<tr>
		<td width="1006">
		<div class = 'fast_link'>
		<?PHP
		$nowL = array('首頁' => 'index.php', '使用手冊' => 'webintro.php');
		echo show_path_url($nowL);
		?>		</td>
	</tr>
	<tr>
		<td valign="top">
		  <table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
		    <!--DWLayoutTable-->
		    <tr>
		      <td width = '180' height="594" valign = 'top'>
                		</td>
                
			  <td width = '18'>&nbsp;</td>
			  <td width = '755' align = 'center' valign = 'top'>
                <!------------------------------------------------------------------------------------------------------------------->
                <td valign = 'top' align = 'left' >
                  <p><strong><font color="#ff7f00">新手上路</font></strong><br>    
                  </p>
                  <div id="tabsF">
                    <ul>
        <li id="current"><a href="javascript://" onClick="loadTab(this,1);"><span>頁面導覽</span></a></li>
        <li ><a href="javascript://" onClick="loadTab(this,2);"><span>成為會員</span></a></li>
		<li><a href="javascript://" onClick="loadTab(this,3);"><span>修改個人資料</span></a></li>
		<li><a href="javascript://" onClick="loadTab(this,4);"><span>配餐</span></a></li>
		<li><a href="javascript://" onClick="loadTab(this,5);"><span>飲食日誌</span></a></li>
	</ul>
</div>
<!------------------------------------------------------------------------------------------------------------->
<div id="tabsC">
<!------------------------------------------------------------------------------------------------------------->
	<div id="S1" style="display:inline;">
    	<blockquote>          
    	  <br><p><b>衛教系統首頁</b></p>
    	  <blockquote>
    	    <p><img src="img/imgintro/mainpage.JPG" width="550" border="1"></p>
  	    </blockquote>
      </blockquote>
    </div>
<!------------------------------------------------------------------------------------------------------------->

<!------------------------------------------------------------------------------------------------------------->
	<div id="S2" style="display:none;">
	<blockquote>
	  <br><p><b>成為會員</b></p>
	  <blockquote>
      	<p>1.註冊會員</p>
    	<p>註冊成為會員可使用更多功能：<br>
              <blockquote>a.飲食日誌功能<br>
              b.使用配餐功能時能看到更多資料<br></p></blockquote>
        <p>2.註冊會員步驟</p>
              <blockquote>Step1.點選首頁左方的<img src="img/imgintro/regi01.JPG" width="96" height="38" border="1">來使用更多功能<br>
	      <div align="center"><img src="img/imgintro/regi0101.JPG" width="550" height="500" border="1"></div></p>
    	<p>Step2.輸入基本資料<br>
        	<blockquote>1)輸入帳號資料－包含帳號資料、基本資料、活動分級與健檢值<br>
							　　記住，這邊有打 " <font color="#ff0000">* </font>" 為必填欄位<br>
                            <div align="center"><img src="img/imgintro/regi02.JPG" width="550" height="350" border="1"></div><br>
						2)輸入基本資料－個人基本資料<br>
							　　輸入＜身高＞、＜體重＞後，系統會自動計算BMI值與理想體重<br>
							　　" <font color="#ff0000">* </font>" 部分仍為必填欄位，完成後點<img src="img/imgintro/next.JPG">
                            繼續完成資料<br><div align="center"><img src="img/imgintro/regi03.JPG" width="550" height="350" border="1"></div><br>
						3)輸入基本資料－活動量分級<br>
							　　依照平日生活習慣選擇活動量分級<br>
							　　點選完畢按<img src="img/imgintro/next.JPG">繼續完成資料<br>
                            <div align="center"><img src="img/imgintro/regi04.JPG" width="550" height="300" border="1"></div><br>
 						4)輸入基本資料－檢驗值<br>
 							　　依據醫院檢查的各項健康檢驗資料填入<br>
 							　　請盡量填寫，不知道的部份可以空下來不必填寫，各醫院正常值可能會有輕微差異<br>
 							　　右方數值為該健檢值的標準範圍<br>
 							　　若輸入數值超過標準範圍時，外框會變為紅色來警訊該檢測值超過標準<br>
 							　　如果不知道健檢資料可直接按<img src="img/imgintro/next.JPG">略過<br>
                            <div align="center"><img src="img/imgintro/regi05.JPG" width="550" height="400" border="1"></div><br>
						5)系統會計算腎絲球過濾率(GFR)<br>
							　　當顯示<font color="#FF6600">"血中肌肝酸"尚未輸入，無法計算腎絲球過濾率(GFR)</font>時，表示"血中肌肝酸"欄位未輸入資料<br>
 							　　畫面顯示註冊成功點擊<img src="img/imgintro/finish.JPG">便會進入到登入畫面，登入後開始使用會員功能<br>
                            <div align="center"><img src="img/imgintro/regi06.JPG" width="550" height="300" border="1"></div><br>
        	</blockquote>
         <p>3.會員登入</p>
				<blockquote>
                <p>a.註冊完成後會直接導向會員登入的頁面<br>　　或是點選左方欄位的<u>會員登入</u>的圖示<br>
                <div align="center"><img src="img/imgintro/login01.JPG" width="550" height="300" border="1"></div><br>
                b.輸入帳號密碼後按<img src="img/imgintro/submit.JPG">鍵<br>　　登入後的畫面<br>
                <div align="center"><img src="img/imgintro/login02.JPG" width="550" border="1"></div><br>
                </blockquote>
                
                </blockquote></blockquote>
  </div>
<!------------------------------------------------------------------------------------------------------------->

<!------------------------------------------------------------------------------------------------------------->
  <div id="S3" style="display:none;">		
	<blockquote>
		  <br><p><b>修改個人資料</b></p>
		  <blockquote>
      		<p>Step1.登入會員後，點選網頁右方的<u>修改資料</u>即可修改帳號資料、基本資料、活動量分級與檢驗值等<br>
            	<div align="center"><img src="img/imgintro/useredit01.JPG" width="550" height="300" border="1"></div><br>
                於各個欄位上填入欲修改的資料後按<img src="img/imgintro/submit.JPG">鍵<br>
               	<p>Step2.修改帳號資料<br>
                <div align="center"><img src="img/imgintro/useredit02.JPG" width="550" height="300" border="1"></div><br>
                <p>Step3.修改個人基本資料<br>
                <div align="center"><img src="img/imgintro/useredit03.JPG" width="550" height="300" border="1"></div><br>
                <p>Step4.下面步驟如<u>註冊會員</u>的3)~5)<br></p>
      </blockquote>            
    </blockquote>
  </div>
<!------------------------------------------------------------------------------------------------------------->

<!------------------------------------------------------------------------------------------------------------->
	<div id="S4" style="display:none;">
	  <blockquote>
      	<br><p><b>配餐系統</b></p>
        <blockquote>
       	  <p>若未登入會員，則須輸入基本健檢值
        	<p>1.至首頁點選<img src="img/imgintro/order00.JPG"><br>
            	<div align="center"><img src="img/imgintro/order01.JPG" width="550" border="1"></div><br>
            <p>2.配餐首頁<br>
            	<div align="center"><img src="img/imgintro/order02.JPG" width="550"  border="1"></div><br>
                 <blockquote>a.選擇<u>餐別</u>與<u>份量</u>開始配餐<br>
         	        		 b.點選<font color="#FF6600">修改健檢資料</font>可修改基本資料來調整熱量的計算<br>
             	     		 c.<font color="#FF6600">今日配餐紀錄</font>可瀏覽該日各餐別的所有配餐<br>
                 			 d.<font color="#FF6600">我的配餐紀錄</font>提供最近五筆配餐結果<br>
                 			 e.<u>個人餐盤</u>會顯示最近一次配餐所選的食物與熱量總計<br></p>                            
                             </blockquote> 
             <p>3.進行配餐<br>
             	<p>Step1. 選擇<u>餐別</u>與<u>份量</u>出現各大類食物分類<br>
            	<div align="center"><img src="img/imgintro/order03.JPG" width="550"  border="1"></div><br>
             	<p>Step2.點選做邊選單的各大類食物，中間頁面會顯示此類別下所有食物提供挑選<br>
            	<div align="center"><img src="img/imgintro/order04.JPG" width="550"  border="1"></div><br>
                <p>Step3.直接點食物圖片會顯示該食物的營養素<br>
                <div align="center"><img src="img/imgintro/order05.JPG" width="300" border="1"></div><br>
                <p>Step4.尋找食物按<img src="img/imgintro/choose.JPG">開始配餐<br>　　右邊頁面顯示該餐所需之熱量<br>
                <div align="center"><img src="img/imgintro/order06.JPG" width="550" border="1"></div><br>
                <p>Step5.選取食物後＜個人餐盤＞的地方會顯示該餐所選食物的總熱量<br>　
                <div align="center"><img src="img/imgintro/order07.JPG" width="550" border="1"></div><br>
                <p>Step6.點選完畢可點<font color="#FF6600">查詢餐盤</font>或是直接點左邊<font color="#FF6600">今日配餐紀錄</font>的餐別檢視該天所食用的餐點<br>
                <div align="center"><img src="img/imgintro/order08.JPG" width="550" border="1"></div><br>
                <p>Step7.目前配餐的情形<br>　　點選<u>查詢餐盤</u>來檢視該餐的配餐情形<br>　　顯示各食物元素的份量，若有元素攝取超出標準，便會顯示紅燈<br>　　欲加選其他食物，點選左邊的食物分類或是點選<img src="img/imgintro/keeporder.JPG">來加選其他食物<br>　　如果在其他頁面可直接點上面的<u>配餐</u>後直接點<u>今日配餐紀錄</u>的餐別來新增食物<br>　　假使不想要某項食物想將食物從配餐清單中刪除，直接在食物欄位的最右邊點選<u>移除</u><br>　　點選完畢按確認將餐點記錄到＜飲食日誌＞內，餐點確認後不可再新增食物<br>
                <div align="center"><img src="img/imgintro/order09.JPG" width="550" border="1"></div><br>　　
                若在系統中搜尋不到食物，可上傳食物圖片<br>　　點選<img src="img/imgintro/search.JPG">選擇圖片路徑後按<img src="img/imgintro/upload.JPG"><br>
                <div align="center"><img src="img/imgintro/order10.JPG" width="550" border="1"></div><br>
             
             
        </blockquote>
      </blockquote>
	</div>
<!------------------------------------------------------------------------------------------------------------->

<!------------------------------------------------------------------------------------------------------------->
	<div id="S5" style="display:none;">
		<blockquote>
			<br><p><b>飲食日誌</b></p>
            <blockquote>
                <p>1.登入會員後，右邊一日所需會依據個人資料內的數據來計算該會員的理想體重與一日所需的熱量，餐盤部分紀錄一天當中所食用食物的熱量，並顯示該日還剩多少熱量可攝取</p></br>
                <img src="img/imgintro/day01.JPG" border="1" width="550"><br>　　
                <p>2.點選上方<img src="img/imgintro/day.JPG">來查詢以往的配餐紀錄</p><br>　　
                <img src="img/imgintro/day02.JPG" border="1" width="550"><br>　　
                <p>3.點選瀏覽可察看所有餐點記錄情形</p><br>
            	<img src="img/imgintro/day03.JPG" border="1" width="550"><br>　　
                <img src="img/imgintro/day04.JPG" border="1" width="550"><br>　
            </blockquote>
         </div>
<!------------------------------------------------------------------------------------------------------------->
</div>
                </td>
<!------------------------------------------------------------------------------------------------------------------->       
	</td>
		  <td width = '53'></td>
		    </tr>
		                                                                                  
		</table>
		</td>
	</tr>
	<tr>
		<td><?PHP include_once ROOT_PATH . "/footer.php";?></td>
	</tr>
	</table>
	</td>
</tr>
</table>

</body>
</html>