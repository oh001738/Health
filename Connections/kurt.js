//刪除字串前後空白字元
function trim(str)
{
	return str.replace(/^\s+|\s+$/g, "");
}

//判斷是否為數字
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

//判斷是否 有不合法字元
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

//判斷是否 為數值
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

//判斷是否為日期格式
function dateV(p_year,p_month,p_day)
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

/*判斷日期大小是否有符合*/
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

//判斷E-Mail格式
function chk_mailV(p_str){
	var checkStr = p_str;
	for (i = 0;  i < checkStr.length;  i++)        
	{
		if (checkStr.charAt(i)=="@") return true;
	}
	return false;
}

//判斷字數是否有超過
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

/*判斷日期是否正確*/
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