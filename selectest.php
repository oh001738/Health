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
					"<select name=kindname style = 'width:155px'><option value=food1>���B�ڲ����Υ[�u�s�~<option value=food2>�����׳J��<option value=food3>������<option value=food4>���G��<option value=food5>�o����<option value=food6>����<option value=food71>�ը���<option value=food72>�������\<option value=food73>�覡���\<option value=food74>�a�`��<option value=food75>�p�Y<option value=food76>�M�\<option value=food77>�s���I��<option value=food78>����<option value=food79>�s��</select>"
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
 
    // �q�`�A���ƿﶵ���ܰʩʤ��j�ɡA���|�����g�� .js �ɧt�J�Y�i�C
 
    var country = new Array();          // �ݴX�Ӱ�a
    country[0] = '�x�W';
    country[1] = '����';
    country[2] = '�饻';
 
    var city = new Array();
    city[0] = new Array();    // �x�W������
    city[0][0] = '�x�_';
    city[0][1] = '�x��';
    city[0][2] = '�x�n';
    city[0][3] = '�x��';
 
    city[1] = new Array();    // ���ꪺ����
    city[1][0] = '�_��';
    city[1][1] = '�W��';
    city[1][2] = '�n��';
 
    city[2] = new Array();    // �饻������
    city[2][0] = '�F��';
    city[2][1] = '�W�j��';
 
  
    // ���J master ���A�P�ɪ�l�� detail ��椺�e
    function loadMaster( master, detail ) {
 
      master.options.length = country.length;
      for( i = 0; i < country.length; i++ ) {
        master.options[ i ] = new Option( country[i], country[i] );  // Option( text , value );
      }
 
      master.selectedIndex = 0;
      doNewMaster( master, detail );
    }
 
    // �� master ��沧�ʮɡA�ܧ� detail ��椺�e
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
document.all.conlist.innerHTML="<select name=placename><option value=1>�x�W<option value=2>����</select>"
break;
case "2":
document.all.namlist.innerHTML="<select name=acname><option value=1>���R<option value=2>�����A</select>"
break;
}
}                                                                                
</script>      
                                                                          
<form name=data>                                                                           
<select name=oo onChange=Javascript:changelista();>
<option value=0 selected>option
<option value=1>��O
<option value=2>�k�t��
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
					"<select name=kindname style = 'width:155px'><option value=food1>���B�ڲ����Υ[�u�s�~<option value=food2>�����׳J��<option value=food3>������<option value=food4>���G��<option value=food5>�o����<option value=food6>����<option value=food71>�ը���<option value=food72>�������\<option value=food73>�覡���\<option value=food74>�a�`��<option value=food75>�p�Y<option value=food76>�M�\<option value=food77>�s���I��<option value=food78>����<option value=food79>�s��</select>"
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
		echo "<option selected value=0>�п��</option>\n";
		echo "<option value = 'kind'>���O</option>\n";
		echo "<option value = 'ch_name'>�W��</option>\n";
		echo "<option value = 'kg'> ���q</option>\n";
		echo "<option value = 'ch_k'>���q</option>\n";
		echo "  </select>\n";
		echo "<span id=searchlist></span>";
	    //echo "  <input type = 'text' id = 'keyword' name = 'keyword' style = 'width:100px'>\n";
    	echo "</form>\n";
?>


</html>
 

 


