var weekend = [0,6];
var gNow = new Date();
var ggWinCal;
var gDay;
var gHour;
var gMinute;
Calendar.Months = ["一", "二", "三", "四", "五", "六","七", "八", "九", "十", "十一", "十二"];
Calendar.DOMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
Calendar.lDOMonth = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
Calendar.get_month = Calendar_get_month;
Calendar.get_daysofmonth = Calendar_get_daysofmonth;
Calendar.calc_month_year = Calendar_calc_month_year;

new Calendar();
function Calendar(p_item, p_WinCal, p_month, p_year) {
  if ((p_month == null) && (p_year == null)) return;
  if (p_WinCal == null) this.gWinCal = ggWinCal;
  else this.gWinCal = p_WinCal;
  if (p_month == null) {
    this.gMonthName = null;
    this.gMonth = null;
    this.gYearly = true;
  } else {
    this.gMonthName = Calendar.get_month(p_month);
    this.gMonth = new Number(p_month);
    this.gYearly = false;
  }
  this.gYear = p_year;
  this.gReturnItem = p_item;
}
function Calendar_print() {        ggWinCal.print(); }
function Calendar_get_month(monthNo) { return Calendar.Months[monthNo]; }
function Calendar_get_daysofmonth(monthNo, p_year) {
  if ((p_year % 4) == 0) {
    if ((p_year % 100) == 0 && (p_year % 400) != 0) return Calendar.DOMonth[monthNo];
        else return Calendar.lDOMonth[monthNo];
  } else { return Calendar.DOMonth[monthNo]; }
}
function Calendar_calc_month_year(p_Month, p_Year, incr) {
  var ret_arr = new Array();
  if (incr == -1) {
    if (p_Month == 0) {
      ret_arr[0] = 11;
      ret_arr[1] = parseInt(p_Year) - 1;
    }  else {
      ret_arr[0] = parseInt(p_Month) - 1;
      ret_arr[1] = parseInt(p_Year);
    }
  } else if (incr == 1) {
    if (p_Month == 11) {
      ret_arr[0] = 0;
      ret_arr[1] = parseInt(p_Year) + 1;
    } else {
      ret_arr[0] = parseInt(p_Month) + 1;
      ret_arr[1] = parseInt(p_Year);
    }
  }
  return ret_arr;
}
Calendar.prototype.getMonthlyCalendarCode = function() {
  var vCode = "";
  var vHeader_Code = "";
  var vData_Code = "";
  vHeader_Code = this.cal_header();
  vData_Code = this.cal_data();
  vCode = vCode + vHeader_Code + vData_Code;
  vCode = vCode + "</TABLE>";
  return vCode;
}
Calendar.prototype.show = function() {
  var vCode = "";
  this.gWinCal.document.open();
  this.wwrite("<HTML><HEAD><TITLE>日曆</TITLE></HEAD><BODY><form name = 'SelectDate'>\r");
  this.wwrite("<CENTER><TABLE BORDER = '0' WIDTH='100%'>\r");
  this.wwrite("<TR><TD>\r");
  this.wwrite("<TABLE CELLSPACING=0 CELLPADDING=1 BORDER=1 WIDTH='100%'>\r");
  //this.wwriteA("<CAPTION>西元 " + this.gYear + " 年 " + this.gMonthName + " 月</CAPTION>");

  var prevMMYYYY = Calendar.calc_month_year(this.gMonth, this.gYear, -1);
  var prevMM = prevMMYYYY[0];
  var prevYYYY = prevMMYYYY[1];
  var nextMMYYYY = Calendar.calc_month_year(this.gMonth, this.gYear, 1);
  var nextMM = nextMMYYYY[0];
  var nextYYYY = nextMMYYYY[1];
  var yearSelStr = "<span id = 'DateYear'><SELECT id = 'selYear' name='selYear' onchange=window.opener.reBuild('"+this.gReturnItem+"','"+this.gFormat+"')><OPTION value='"+(parseInt(this.gYear)-1)+"'>"+(parseInt(this.gYear)-1)+"</OPTION>\r";
  yearSelStr += "<OPTION value='"+this.gYear+"' selected>"+(parseInt(this.gYear))+"</OPTION>\r";
  yearSelStr += "<OPTION value='"+(parseInt(this.gYear)+1)+"'>"+(parseInt(this.gYear)+1)+"</OPTION>\r";
  yearSelStr += "</SELECT></span>\r";
  var monthSelStr = "<SELECT name='selMonth' onchange=window.opener.reBuild('"+this.gReturnItem+"','"+this.gFormat+"')>\r";
  for(i=0;i<=11;i++){
          if(i == this.gMonth)
                  monthSelStr += "<OPTION value='"+i+"' selected>"+(i+1)+"</OPTION>\r";
          else
                  monthSelStr += "<OPTION value='"+i+"'>"+(i+1)+"</OPTION>\r";
  }
  monthSelStr += "</SELECT>\r";
  this.wwriteA("<CAPTION>西元" + yearSelStr + " 年 " + monthSelStr + " 月</CAPTION>\r");

  vCode = this.getMonthlyCalendarCode();
  this.wwrite(vCode);
  this.wwrite("</TD></TR>");

  this.wwrite("<tr><td align = 'center' valign = 'top'>");
  this.wwrite("<font style = 'font-size:15px'>時間：</font>");
  this.wwrite("<select name = 'selectHour' id = 'selectHour'>");
  this.wwrite("<option value = ''></option>");
  for (hour = 0; hour < 24; hour++)
  {
	  var showHour = (hour < 10)? "0" + hour : hour; 
	  var selected = (hour == gHour)? 'selected' : '';
      this.wwrite("<option value = '" + showHour + "' " + selected + ">" + showHour + "</option>");
  }
  this.wwrite("</select>");
  this.wwrite("時");
  this.wwrite("<select name = 'selectMinute' id = 'selectMinute'>");
  this.wwrite("<option value = ''></option>");
  for (minute = 0; minute < 60; minute++)
  {
	  var showMinute = (minute < 10)? "0" + minute : minute; 
	  var selected = (minute == gMinute)? 'selected' : '';
      this.wwrite("<option value = '" + showMinute + "' " + selected + ">" + showMinute + "</option>");
  }
  this.wwrite("</select>");
  this.wwrite("分");
  this.wwrite("</select>");
  this.wwrite("<span style = 'padding-left:5px'><input type = 'button' name = 'send' value = '確定' onClick = 'passValue()'></span>");
  this.wwrite("<span style = 'padding-left:5px'><input type = 'button' name = 'send' value = '清除' onClick = 'clearValue()'></span>");
  this.wwrite("</td></tr>");

  this.wwrite("<TR><TD align = 'center'>");
  this.wwrite("<TABLE WIDTH='60%' BORDER=0 CELLSPACING=0 CELLPADDING=0><TH>");

  this.wwrite("<SMALL>[<A HREF=\"javascript:window.opener.Build('" + this.gReturnItem + "', '" + this.gMonth + "', '" + (parseInt(this.gYear)-1) + "', '" + this.gFormat + "');\">－<\/A>]</SMALL></TH><TH>\n");
  this.wwrite("<SMALL>[<A HREF=\"javascript:window.opener.Build('" + this.gReturnItem + "', '" + prevMM + "', '" + prevYYYY + "', '" + this.gFormat + "');\">＜<\/A>]</SMALL></TH><TH>\n");
  this.wwrite("<SMALL>[<A HREF=\"javascript:window.opener.Build('" + this.gReturnItem + "', '" + nextMM + "', '" + nextYYYY + "', '" + this.gFormat + "');\">＞<\/A>]</SMALL></TH><TH>\n");
  this.wwrite("<SMALL>[<A HREF=\"javascript:window.opener.Build('" + this.gReturnItem + "', '" + this.gMonth + "', '" + (parseInt(this.gYear)+1) + "', '" + this.gFormat + "');\">＋<\/A>]</SMALL></TH></TABLE>\n");

  this.wwrite("</TD></TR></TABLE></CENTER>");
  this.wwrite("<input type = 'hidden' id = 'rememberDay' name = 'rememberDay' value = ''>\r");		//紀錄回傳的DATE，以便秀出BUTTON顏色以及傳回前頁
  this.wwrite("<input type = 'hidden' id = 'witchDayId' name = 'witchDayId' value = ''>\r");		//暫存所選擇的DATE。
  var writeCode = "<script>\r";
  writeCode += "function passValue()\r";
  writeCode += "{\r";
  writeCode += "   DateValue = document.SelectDate.rememberDay.value;\r";
  writeCode += "   var hour = document.getElementById('selectHour').options[document.getElementById('selectHour').selectedIndex].value;\r";
  writeCode += "   var minute = document.getElementById('selectMinute').options[document.getElementById('selectMinute').selectedIndex].value;\r";
  writeCode += "   if (hour != '' && minute != '')\r";
  writeCode += "   {\r";
  writeCode += "      DateValue += \" \" + hour + \":\" + minute;\r";
  writeCode += "   }\r";
  writeCode += "   self.opener.document." + this.gReturnItem + ".value = DateValue;\r";
  writeCode += "   window.close();\r";
  writeCode += "}\r";
  writeCode += "function memberDay(DateDay , DayId)\r";
  writeCode += "{\r";
  writeCode += "   var witchDayId = document.SelectDate.witchDayId.value;\r";
  writeCode += "   if (witchDayId != '')\r";
  writeCode += "   {\r";
  writeCode += "      document.getElementById(witchDayId).style.backgroundColor = \"#FFFFFF\";\r";
  writeCode += "      document.getElementById(witchDayId).style.color = \"#323232\";\r";
  writeCode += "   }\r";
  writeCode += "   document.getElementById(DayId).style.backgroundColor = \"#0000CC\";\r";
  writeCode += "   document.getElementById(DayId).style.color = \"#FFFFFF\";\r";
  writeCode += "   document.getElementById('witchDayId').value = DayId;\r";
  writeCode += "   document.getElementById('rememberDay').value = DateDay;\r";
  writeCode += "}\r";
  writeCode += "function clearValue()\r";
  writeCode += "{\r";
  writeCode += "   var DayId = document.SelectDate.witchDayId.value;\r";
  writeCode += "   if ( DayId != '' )\r";
  writeCode += "   {\r";
  writeCode += "      document.getElementById(DayId).style.backgroundColor = \"#FFFFFF\";\r";
  writeCode += "      document.getElementById(DayId).style.color = \"#323232\";\r";
  writeCode += "      document.SelectDate.rememberDay.value = '';\r";
  writeCode += "      document.SelectDate.witchDayId.value = '';\r";
  writeCode += "      document.SelectDate.selectHour.selectedIndex = 0;\r";
  writeCode += "      document.SelectDate.selectMinute.selectedIndex = 0;\r";
  writeCode += "      self.opener.document." + this.gReturnItem + ".value = '';\r";
  writeCode += "   }\r";
  writeCode += "}\r";
  writeCode += "document.getElementById('day" + gDay + "').style.backgroundColor = \"#0000CC\";\r";
  writeCode += "document.getElementById('day" + gDay + "').style.color = \"#FFFFFF\";\r";
  writeCode += "document.getElementById('witchDayId').value = \"day" + gDay + "\";\r";
  writeCode += "document.getElementById('rememberDay').value = \"" + rememberDate[0] + "\";\r";
  writeCode += "</script>\r";
  writeCode += "</form>\r";

  this.wwrite(writeCode);
  this.gWinCal.document.close();
}
Calendar.prototype.wwrite = function(wtext) { this.gWinCal.document.writeln(wtext); }
Calendar.prototype.wwriteA = function(wtext) { this.gWinCal.document.write(wtext); }
Calendar.prototype.cal_header = function() {
  var vCode = "";
  vCode = vCode + "<TR BGCOLOR=\"Silver\">";
  vCode = vCode + "<TH WIDTH='14%'>日</TH>";
  vCode = vCode + "<TH WIDTH='14%'>一</TH>";
  vCode = vCode + "<TH WIDTH='14%'>二</TH>";
  vCode = vCode + "<TH WIDTH='14%'>三</TH>";
  vCode = vCode + "<TH WIDTH='14%'>四</TH>";
  vCode = vCode + "<TH WIDTH='14%'>五</TH>";
  vCode = vCode + "<TH WIDTH='16%'>六</TH>";
  vCode = vCode + "</TR>";
  return vCode;
}
Calendar.prototype.cal_data = function() {
  var vDate = new Date();
  vDate.setDate(1);
  vDate.setMonth(this.gMonth);
  vDate.setFullYear(this.gYear);
  var vFirstDay=vDate.getDay();
  var vDay=1;
  var vLastDay=Calendar.get_daysofmonth(this.gMonth, this.gYear);
  var vOnLastDay=0;
  var vCode = "";
  vCode = vCode + "<TR ALIGN=\"CENTER\">\n";
  for (i=0; i<vFirstDay; i++) {
    vCode = vCode + "<TD WIDTH='14%'" + this.write_weekend_string(i) + ">&nbsp;</TD>\n";
  }
  for (j=vFirstDay; j<7; j++) {
	cDay = (vDay < 10)? '0' + vDay : vDay;
    vCode = vCode + "<TD WIDTH='14%'" + this.write_weekend_string(j) + ">" +
		"<input type = 'button' id = 'day" + cDay + "' name = 'day" + cDay + "' onClick = 'memberDay(\"" + this.format_data(cDay) + "\" , \"day" + cDay + "\")' value = '" + vDay + "'\" style='border-style:none;background-color:#FFFFFF;color:#323232;width:25;cursor:hand;'></td>\n";
        //"<A HREF='#' onClick=\"self.opener.document." + this.gReturnItem + ".value='" +
        //this.format_data(vDay) + "'; window.close();\">" + this.format_day(vDay) + "</A></TD>\n";
    vDay=vDay + 1;
  }
  vCode = vCode + "</TR>\n";
  for (k=2; k<7; k++) {
    vCode = vCode + "<TR ALIGN=\"CENTER\">";
    for (j=0; j<7; j++) {
	  cDay = (vDay < 10)? '0' + vDay : vDay;
      vCode = vCode + "<TD WIDTH='14%'" + this.write_weekend_string(j) + ">" +
	  "<input type = 'button' id = 'day" + cDay + "' name = 'day" + cDay + "' onClick = 'memberDay(\"" + this.format_data(cDay) + "\" , \"day" + cDay + "\")' value = '" + vDay + "'\" style='border-style:none;background-color:#FFFFFF;color:#323232;width:25;cursor:hand;'></td>\n";
      //"<A HREF='#' onClick=\"self.opener.document." + this.gReturnItem + ".value='" +
      //this.format_data(vDay) + "'; window.close();\">" + this.format_day(vDay) + "</A></TD>\n";
      vDay=vDay + 1;
      if (vDay > vLastDay) {
        vOnLastDay = 1;
        break;
      }
    }
    if (j == 6)        vCode = vCode + "</TR>";
    if (vOnLastDay == 1) break;
  }
  for (m=1; m<(7-j); m++) {
    if (this.gYearly) vCode = vCode + "<TD WIDTH='14%'" + this.write_weekend_string(j+m) + ">&nbsp;</TD>\n";
        else vCode = vCode + "<TD WIDTH='14%'" + this.write_weekend_string(j+m) + "><FONT COLOR='gray'>" + m + "</FONT></TD>\n";
  }
  return vCode;
}

Calendar.prototype.format_day = function(vday) {
  var vNowDay = gNow.getDate();
  var vNowMonth = gNow.getMonth();
  var vNowYear = gNow.getFullYear();
  if(gDay == null || gDay.length == 0)
          gDay = vNowDay;
  if (vday == gDay) {
    return ("<FONT COLOR=\"RED\"><B>" + vday + "</B></FONT>");
  } else { return (vday); }
}
Calendar.prototype.write_weekend_string = function(vday) {
  var i;
  for (i=0; i<weekend.length; i++) {
    //if (vday == weekend[i]) return (" BGCOLOR=\"#FFB997\"");
  }
  return "";
}
Calendar.prototype.format_data = function(p_day) {
  var vData;
  var vMonth = 1 + this.gMonth;
  vMonth = (vMonth.toString().length < 2) ? "0" + vMonth : vMonth;
  var vY4 = new String(parseInt(this.gYear));
  if(vY4.length == 2)
  vY4 = '0'+vY4;
  var vDD = (p_day.toString().length < 2) ? "0" + p_day : p_day;
  vData = vY4 + "\/" + vMonth + "\/" + vDD;
  return vData;
}
function Build(p_item, p_month, p_year) {
  var p_WinCal = ggWinCal;
  rememberDate = new Array(3);
  rememberDate[0] = p_year + "/" + (parseInt(p_month) + 1) + "/" + gDay;
  gCal = new Calendar(p_item, p_WinCal, p_month, p_year);
  gCal.show();
}
function show_calendar() {
  p_item = arguments[0];
  p_date = arguments[1];

  if(p_date == null || p_date.length == 0 || p_date.length < 7) {
          p_month = new String(gNow.getMonth());
          p_year = new String(gNow.getFullYear().toString());
		  gDay = new String(gNow.getDate());
		  rememberDate = new Array(3);
		  rememberDate[0] = gNow.getFullYear().toString() + "/" + (gNow.getMonth() + 1) + "/" + gDay;
		  gHour = '70';
		  gMinute = '70';
  }else{
          rememberDate = p_date.split(' ');
		  p_date_array = p_date.split('/');
          if(p_date_array[0].length < 4){
                  p_year = p_date_array[0];
                  if(p_year.indexOf('0') == 0)
                          p_year = new String(parseInt(p_year.substring(1,3)));
                  else
                          p_year = new String(parseInt(p_year));
          }else
                  p_year = p_date_array[0];
          p_month = p_date_array[1];
          if(p_month.indexOf('0') == 0)
                  p_month = new String(parseInt(p_month.substring(1,2)) - 1);
          else
                  p_month = new String(parseInt(p_month) -1);
          getDay = p_date_array[2];
		  gDayArr = getDay.split(' ');
		  gDay = gDayArr[0];
		  if ( !gDayArr[1] )
		  {
			 gHour = '70';
			 gMinute = '70';
		  }else{
			 gTime = gDayArr[1].split(':');
			 gHour = gTime[0];
			 gMinute = gTime[1];
		  }
  }
  vWinCal = window.open("", "Calendar", "width=350,height=300,status=yes,resizable=yes,top=200,left=200");
  vWinCal.opener = self;
  ggWinCal = vWinCal;
  Build(p_item, p_month, p_year);
}

function reBuild(rtnItem, fmat){
        var yr = vWinCal.document.getElementById("selYear").value;
        var mn = vWinCal.document.getElementById("selMonth").value;
        Build(rtnItem,mn,yr,fmat);
}