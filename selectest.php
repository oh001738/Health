<html>

<!--
<script language=javascript>
changelist();
function changelist()
{
	switch(document.data.food.value)
	{
		case "0":document.all.searchlist.innerHTML=""
		break;
		
		case "1":
		document.all.searchlist.innerHTML=
					"<select name=kindname style = 'width:155px'><option value=food1>全榖根莖類及加工製品<option value=food2>豆魚肉蛋類<option value=food3>蔬菜類<option value=food4>水果類<option value=food5>油脂類<option value=food6>奶類<option value=food71>調味料<option value=food72>中式早餐<option value=food73>西式早餐<option value=food74>家常菜<option value=food75>小吃<option value=food76>套餐<option value=food77>零食點心<option value=food78>飲料<option value=food79>酒類</select>"
		break;
		
		case "2":
		document.all.searchlist.innerHTML="<input type = 'text' id = 'keyword' name = 'keyword' style = 'width:155px'>"
		break;
	}
}
</script>

<form name=data>                                                                           
<select name=food onChange=Javascript:changelist(); >
<option selected value=0>option</option>
<option value=1 >A</option>
<option value=2>B</option>
</select>
<span id=searchlist></span>
</form>

-->
<!------------------------------------------------------------------------------------------------------------------------------>
<!--
<script language=javascript>
changelist();
function changelist()
{
	switch(document.data.food.value)
	{
		case "1":
		document.all.namelist.innerHTML="<select name=actname style = 'width:100px'><option value=1>A1<option value=2>A2</select>"
		break;
		
		case "2":
		document.all.namelist.innerHTML="<input type = 'text' id = 'keyword' name = 'keyword' style = 'width:100px'>"
		break;
	}
}        


                                                                        
</script>      
                                                                          
<form name=data>                                                                           
<select name=food onChange=Javascript:changelist(); >
<option selected>option</option>
<option value=1 >A</option>
<option value=2>B</option>
</select>
<div id=namelist></div>
</form>
-->


<!------------------------------------------------------------------------------------------------------------------------------>

  <script>
 
    // 通常，當資料選項的變動性不大時，都會直接寫成 .js 檔含入即可。
 
    var country = new Array();          // 看幾個國家
    country[0] = '台灣';
    country[1] = '中國';
    country[2] = '日本';
 
    var city = new Array();
    city[0] = new Array();    // 台灣的城市
    city[0][0] = '台北';
    city[0][1] = '台中';
    city[0][2] = '台南';
    city[0][3] = '台高';
 
    city[1] = new Array();    // 中國的城市
    city[1][0] = '北京';
    city[1][1] = '上海';
    city[1][2] = '南京';
 
    city[2] = new Array();    // 日本的城市
    city[2][0] = '東京';
    city[2][1] = '名古屋';
 
  
    // 載入 master 選單，同時初始化 detail 選單內容
    function loadMaster( master, detail ) {
 
      master.options.length = country.length;
      for( i = 0; i < country.length; i++ ) {
        master.options[ i ] = new Option( country[i], country[i] );  // Option( text , value );
      }
 
      master.selectedIndex = 0;
      doNewMaster( master, detail );
    }
 
    // 當 master 選單異動時，變更 detail 選單內容
    function doNewMaster( master, detail ) {
    
      detail.options.length = city[ master.selectedIndex ].length;
      for( i = 0; i < city[ master.selectedIndex ].length; i++ ) {
        detail.options[ i ] = new Option( city[ master.selectedIndex ][ i ],
                                          city[ master.selectedIndex ][ i ] );
      }
    }
 
  </script>
 
  <body onload="loadMaster( document.getElementById( 'country' ), 
                            document.getElementById( 'city' ) );">
    <select name="country" id="country" 
        onChange="doNewMaster( document.getElementById( 'country' ), 
                               document.getElementById( 'city' ) );">
   </select>
   <select name="city" id="city">
   </select>
<!------------------------------------------------------------------------------------------------------------------------------>
<!--
<script language=javascript>
changelista();
function changelista()
{
switch(document.data.oo.value)
{
case "1":
document.all.conlist.innerHTML="<select name=placename><option value=1>台灣<option value=2>中國</select>"
break;
case "2":
document.all.namlist.innerHTML="<select name=acname><option value=1>田麗<option value=2>葉祖媚</select>"
break;
}
}                                                                                
</script>      
                                                                          
<form name=data>                                                                           
<select name=oo onChange=Javascript:changelista();>
<option value=0 selected>option
<option value=1>國別
<option value=2>女演員
</select>
<div id=conlist></div>                                                                            
<div id=namlist></div>
                                                                                
</form> 
-->

<!------------------------------------------------------------------------------------------------------------------------------>

<script language=javascript>
	changelist();
	function changelist()
	{
		switch(document.searchform.type.value)
		{
			case "0":document.all.searchlist.innerHTML=""
			break;
		
			case "kind":
				document.all.searchlist.innerHTML=
					"<select name=kindname style = 'width:155px'><option value=food1>全榖根莖類及加工製品<option value=food2>豆魚肉蛋類<option value=food3>蔬菜類<option value=food4>水果類<option value=food5>油脂類<option value=food6>奶類<option value=food71>調味料<option value=food72>中式早餐<option value=food73>西式早餐<option value=food74>家常菜<option value=food75>小吃<option value=food76>套餐<option value=food77>零食點心<option value=food78>飲料<option value=food79>酒類</select>"
			break;
		
			case "ch_name":
				document.all.searchlist.innerHTML="<input type = 'text' id = 'keyword' name = 'keyword' style = 'width:155px'>"
			break;		
			
			case "kg":
				document.all.searchlist.innerHTML="<input type = 'text' id = 'keyword' name = 'keyword' style = 'width:155px'>"
			break;
		
			case "ch_k":
				document.all.searchlist.innerHTML="<input type = 'text' id = 'keyword' name = 'keyword' style = 'width:155px'>"
			break;
		}
	}
</script>

<br>

<?php
  	 	echo "<form id = 'searchform' name = 'searchform'>\n";
		echo "<select id = 'type' name = 'type' onChange=Javascript:changelist();>\n";
		echo "<option selected value=0>請選擇</option>\n";
		echo "<option value = 'kind'>類別</option>\n";
		echo "<option value = 'ch_name'>名稱</option>\n";
		echo "<option value = 'kg'> 重量</option>\n";
		echo "<option value = 'ch_k'>熱量</option>\n";
		echo "  </select>\n";
		echo "<span id=searchlist></span>";
	    //echo "  <input type = 'text' id = 'keyword' name = 'keyword' style = 'width:100px'>\n";
    	echo "</form>\n";
?>


</html>
 

 


