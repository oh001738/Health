//�R���r��e��ťզr��
function trim(str)
{
	return str.replace(/^\s+|\s+$/g, "");
}

//�P�_�O�_���Ʀr
function cknum(value)
{
	var NumChr = "0123456789";
	for (var i = 0; i < value.length; i++) 
	{
		if (NumChr.indexOf(value.charAt(i)) == -1) 
		{
			return true;
		}
	}
	return false;
}


//�P�_�O�_���Ʀr�Τp���I
function ckfloat(value)
{
	var NumChr = "0123456789.";
	for (var i = 0; i < value.length; i++) 
	{
		if (NumChr.indexOf(value.charAt(i)) == -1) 
		{
			return true;
		}
	}
	return false;
}

//�P�_�O�_ �����X�k�r��
function chk_fldV(p_id)
{
	var score_i=0,score_c=0;
	var l_str=unescape('%27')+unescape('%22')+unescape('%2A');
	if ((p_id.charAt(0)=='') && (p_id.length > 0))
	{
		return false;
	}
	for (var i = 0;  i < p_id.length;  i++)
	{
		if (l_str.indexOf(p_id.charAt(i),0) >= 0 )
		{
			score_c += 1;
		}
	}
	if (score_c == 0)
	{
		return true;
	}else{
		return false;
	}
}

//�P�_�O�_ ���ƭ�
function chk_numV( p_str , p_value )
{
	var checkOK = p_value;
	var checkStr = p_str;
	var allValid = true;
	var decPoints = 0;
	for( i = 0 ; i < checkStr.length; i++ )
	{
		ch = checkStr.charAt(i);
		for (j = 0;  j < checkOK.length;  j++)
		{
			if (ch == checkOK.charAt(j)){ break; }
		}
		if (j == checkOK.length)
		{
			allValid = false;
			break;
		}
	}

	if (!allValid)
	{
		return false;
	}else{
		return true;
	}
}

//�P�_�O�_������榡
function dateV(p_year, p_month, p_day)
{
	var l_LegalDay = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
	var Current_Date = new Date();
	var l_Month = Current_Date.getMonth();
	var l_Year = Current_Date.getYear();
	var l_Day = Current_Date.getDate();

	if (!chk_numV(p_year,"0123456789")) return false;
	if (!chk_numV(p_month,"0123456789")) return false;
	if (!chk_numV(p_day,"0123456789")) return false;

	if ((p_year % 400 == 0) || ((p_year % 4 == 0) && (p_year % 100 != 0))) l_LegalDay[1] = 29;
	if (p_month > 12 || p_month < 1 )  return false;
	if (p_day > l_LegalDay[p_month-1]  || p_day < 1 )  return false;
	return true;
}

/*�P�_����j�p�O�_���ŦX*/
function cktime(year1 , month1 , day1 , year2 , month2 , day2)
{	
	var year1	= parseInt(year1);
	var month1	= parseInt(month1);
	var day1	= parseInt(day1);
	var year2	= parseInt(year2);
	var month2	= parseInt(month2);
	var day2	= parseInt(day2);
	if ( year1 < year2)
	{
		return true;
	
	}else if (year1 == year2)
	{
		if ( month1 < month2)
		{
			return true;
		
		}else if ( month1 == month2)
		{
			if ( day1 <= day2)
			{
				return true;
			}
		}else{
			return false;
		}
	}else{
		
		return false;
	}
}

//�P�_E-Mail�榡
function chk_mailV(p_str){
	var checkStr = p_str;
	for (i = 0;  i < checkStr.length;  i++)        
	{
		if (checkStr.charAt(i)=="@") return true;
	}
	return false;
}

//�P�_�r�ƬO�_���W�L
function chk_Total(p_str , p_value)
{
	var count = 0;
	for(i = 0; i < p_str.length; i++)
	{
		if (p_str.charCodeAt(i) > 128)
		{
			count += 2;

		}else if (p_str.charCodeAt(i) < 128 )
		{
			count ++;
		}
	}
	if ( count > p_value )
	{
		return false;
	}else{
		return true;
	}
}

/*�P�_����O�_���T*/
function checkDate(year , month , day)
{
	year = parseInt(year);
	month = parseInt(month);
	day = parseInt(day);
	if ( year % 4 == 0 && month == 2 && day > 29)
	{
		return false;

	}else if ( year % 4 != 0 && month == 2 && day > 28)
	{
		return false;

	}else if ( ( month == 4 || month == 6 || month == 9 || month == 11 ) && day > 30 )
	{
		return false;
	
	}else{
		return true;
	}
}

function chkdata_OK(vi)
{
	vdate = new Date();
	vsdate=vdate.getYear()+'/'+ (vdate.getMonth() + 1) + '/' + vdate.getDate() +' '+ vdate.getHours() + ':' + vdate.getMinutes();
	opener.document.getElementById('setD' + vi).value =vsdate;
	self.opener.document.getElementById('ok' + vi).style.display = 'block';
	window.close();
}

function change_lottery_no(year,selectName)
{
	year = year - 1911;
	ae = document.getElementById(selectName);
	ae.length = 151;
	ae.options[0].text = 'NA';
	ae.options[0].value = 'NA';
	for (i = 1; i < ae.length; i++)
	{
		if ( i < 10)
		{
			var prefix = '00000';
		}else if ( i < 100 )
		{
			var prefix = '0000';
		}else{
			var prefix = '000';
		}
		var years = year;
		var no = i;
		var pre = years + prefix + no;
		ae.options[i].text = pre;
		ae.options[i].value = pre;
	}
	return true;
}

function show_div(divName, buttonName, changeValue, backValue)
{
	if ( document.getElementById(divName).style.display == 'none' )
	{
		document.getElementById(divName).style.display = 'block';
		change_value(buttonName, changeValue);
	}else{
		document.getElementById(divName).style.display = 'none';
		change_value(buttonName, backValue);
	}
}

function change_value(sid, newValue)
{
	document.getElementById(sid).value = newValue;
}

//�P�_�p���I����ĴX��num �p��, pos����ĴX��
function formatFloat(num, pos)   
{   
	var size = Math.pow(10, pos);   
	return Math.round(num * size) / size;   
}  

function round1(value, rank)
{
	if( value >= 0 )
	{
		return parseInt(value * Math.pow(10,rank) + 0.5) / Math.pow(10,rank);
	}else{
		return parseInt(value * Math.pow(10,rank) - 0.4) / Math.pow(10,rank);
	}
}


//�[�J�ڪ��̷R
function addBookmarkForBrowser(url, title)   
{
	if (document.all){
		window.external.AddFavorite(url, title);
	}else{
		window.sidebar.addPanel(title, url, "");
	}
}

//�e�X���
function form_submit(form_name)
{
	document.getElementById(form_name).submit();
}

//���Ͷü�Min�̤p�� Max�̤j��
function get_random(Min, Max)
{
	return (Math.floor(Math.random() * (Max - Min + 1)) + Min);  
}

function check_login()
{
	var obj = document.loginform;
	if ( trim(obj.username.value) == '' )
	{
		alert('�п�J�b��!!');
		obj.username.focus();
	
	}else if ( trim(obj.password.value) == '' )
	{
		alert('�п�J�K�X!!');
		obj.password.focus();
	
	}else{
		obj.submit();
	}
}

function ckhealth(inputId, min, max)
{
	var inputV = document.getElementById(inputId).value;
	if ( trim(inputV) == '' )
	{
		document.getElementById(inputId).style.border  = '1px solid #7F9DB9';
		document.getElementById(inputId).style.height  = '22px';
		return false;
	}else if (ckfloat(inputV))
	{
		alert('�п�J�b�μƦr�Τp���I!!');
		document.getElementById(inputId).focus();
		document.getElementById(inputId).style.border  = '1px solid #7F9DB9';
		document.getElementById(inputId).style.height  = '22px';
	}else{
		if ( inputV < min || inputV > max)
		{
			//alert('�W�L�зǭȤF�A�зǭȬ�' + min + '~' + max + '!!');
			document.getElementById(inputId).style.border  = '2px solid #FA0300';
			document.getElementById(inputId).style.height  = '22px';
		}else{
			document.getElementById(inputId).style.border  = '1px solid #7F9DB9';
			document.getElementById(inputId).style.height  = '22px';
		}
	}
}


function ckhealth2(inputId, sex, Mmin, Mmax, Fmin, Fmax)
{
	var inputV = document.getElementById(inputId).value;
	if ( trim(inputV) == '' )
	{
		document.getElementById(inputId).style.border  = '1px solid #7F9DB9';
		document.getElementById(inputId).style.height  = '22px';
		return false;
	}else if (ckfloat(inputV))
	{
		alert('�п�J�b�μƦr�Τp���I!!');
		document.getElementById(inputId).focus();
		document.getElementById(inputId).style.border  = '1px solid #7F9DB9';
		document.getElementById(inputId).style.height  = '22px';
	}else{
		if ( sex == 1)
		{
			if ( inputV < Mmin || inputV > Mmax)
			{
			alert('�W�L�зǭȤF�A�зǭȬ�' + Mmin + '~' + Mmax + '!!');
			document.getElementById(inputId).style.border  = '2px solid #FA0300';
			document.getElementById(inputId).style.height  = '22px';
			}else{
				document.getElementById(inputId).style.border  = '1px solid #7F9DB9';
				document.getElementById(inputId).style.height  = '22px';
			}
		}else{
			if ( inputV < Fmin || inputV > Fmax)
			{
			alert('�W�L�зǭȤF�A�зǭȬ�' + Fmin + '~' + Fmax + '!!');
			document.getElementById(inputId).style.border  = '2px solid #FA0300';
			document.getElementById(inputId).style.height  = '22px';
			}else{
				document.getElementById(inputId).style.border  = '1px solid #7F9DB9';
				document.getElementById(inputId).style.height  = '22px';
			}
		}		
	}
}

function show_display(sid)
{
	if ( document.getElementById(sid).style.display == 'none')
	{
		document.getElementById(sid).style.display = 'block';
	}else{
		document.getElementById(sid).style.display = 'none';
	}
}

function view_food(food, percent)
{
	window.open('contact_food.php?food_id=' + food + '&percent=' + percent,'','height=550,width=650,toolbar=no,scrollbars=yes,resizable=no,top=100,left=100');
}

function cksearch()
{
	var obj = document.searchform;
	if ( trim(obj.keyword.value) == '' || trim(obj.keyword.value) == '�п�J�����W��' )
	{
		obj.keyword.value = '';
		alertify.alert("�п�J�d������r!!");
		obj.keyword.focus();
	}else{
		obj.submit();
	}
}

function cksearchplate()
{
	var obj = document.searchplateform;
	if ( !dateV(obj.year.value,obj.month.value,obj.day.value) )
	{
		alert('�п�ܥ��T���ɶ�!!');
		obj.day.focus();
	}else{
		obj.submit();
	}
}

function clear_value(inpnut_id)
{
	document.getElementById(inpnut_id).value = '';
}

//�q�X��G�z�R(HD)�B�����z�R(CAPD)
function show_kidney(no)
{
	if ( no == true)
	{
		document.getElementById('showkidney').style.display = 'block';
	}else{
		document.getElementById('showkidney').style.display = 'none';
	}
}

function check_int()
{
	var obj = document.form1;
	if ( trim(obj.creatinine.value) != '' && ckfloat(obj.creatinine.value) )
	{
		alert('�п�J�b�μƦr�Τp���I!!');
		obj.creatinine.focus();
	
	}else if ( trim(obj.na.value) != '' && ckfloat(obj.na.value) )
	{
		alert('�п�J�b�μƦr�Τp���I!!');
		obj.na.focus();
	
	}else if ( trim(obj.fasting_sugar.value) != '' && ckfloat(obj.fasting_sugar.value) )
	{
		alert('�п�J�b�μƦr�Τp���I!!');
		obj.fasting_sugar.focus();
	
	}else if ( trim(obj.kk.value) != '' && ckfloat(obj.kk.value) )
	{
		alert('�п�J�b�μƦr�Τp���I!!');
		obj.kk.focus();
	
	}else if ( trim(obj.hba1c.value) != '' && ckfloat(obj.hba1c.value) )
	{
		alert('�п�J�b�μƦr�Τp���I!!');
		obj.hba1c.focus();
	
	}else if ( trim(obj.pp.value) != '' && ckfloat(obj.pp.value) )
	{
		alert('�п�J�b�μƦr�Τp���I!!');
		obj.pp.focus();
	
	}else if ( trim(obj.hgb.value) != '' && ckfloat(obj.hgb.value) )
	{
		alert('�п�J�b�μƦr�Τp���I!!');
		obj.hgb.focus();
	
	}else if ( trim(obj.ca.value) != '' && ckfloat(obj.ca.value) )
	{
		alert('�п�J�b�μƦr�Τp���I!!');
		obj.ca.focus();
	
	}else if ( trim(obj.hct.value) != '' && ckfloat(obj.hct.value) )
	{
		alert('�п�J�b�μƦr�Τp���I!!');
		obj.hct.focus();
	
	}else if ( trim(obj.fe.value) != '' && ckfloat(obj.fe.value) )
	{
		alert('�п�J�b�μƦr�Τp���I!!');
		obj.fe.focus();
	
	}else if ( trim(obj.tibc.value) != '' && ckfloat(obj.tibc.value) )
	{
		alert('�п�J�b�μƦr�Τp���I!!');
		obj.tibc.focus();
	
	}else if ( trim(obj.ua.value) != '' && ckfloat(obj.ua.value) )
	{
		alert('�п�J�b�μƦr�Τp���I!!');
		obj.ua.focus();
	
	}else if ( trim(obj.ferritin.value) != '' && ckfloat(obj.ferritin.value) )
	{
		alert('�п�J�b�μƦr�Τp���I!!');
		obj.ferritin.focus();
	
	}else if ( trim(obj.cholesterol.value) != '' && ckfloat(obj.cholesterol.value) )
	{
		alert('�п�J�b�μƦr�Τp���I!!');
		obj.cholesterol.focus();
	
	}else if ( trim(obj.triglyceride.value) != '' && ckfloat(obj.triglyceride.value) )
	{
		alert('�п�J�b�μƦr�Τp���I!!');
		obj.triglyceride.focus();
	
	}else{
		obj.submit();
	}
}

//�P�_E-Mail�榡
function ckEmail(email)
{	
	var pattern = /^([a-zA-Z0-9\._-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;
	return pattern.test(email);
}
