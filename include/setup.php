<?PHP

$DB['ID']   = mysql_connect(DB_HOST , DB_USER , DB_PASS)or die("資料庫連線失敗");
$DB['CONN'] = mysql_select_db(DB_NAME , $DB['ID']);
@mysql_query('SET character_set_client = utf8;');
@mysql_query('SET character_set_results = utf8;');
@mysql_query('SET character_set_connection = utf8;');


//判斷會員是否有登入
$ckUSER = ck_login($USER['session_id']);
if ( trim($ckUSER['userid']) != '' )
{
    $USER = $ckUSER;
    $USER = get_value('user_health h, user u', "WHERE h.userid = '" . $USER['userid'] . "' AND u.id = '" . $USER['userid'] . "'"); //取得會員的資料
}else{
    $USER = get_value('guest_health', "WHERE session_id = '" . session_id() . "'");  //取得訪客的資料
}
//紀錄瀏覽人數
input_counter(session_id());

//系統變數
$CFG['bmi_s_protein']  = '';     //蛋白質BMI偏低限定值
$CFG['bmi_c_protein']  = '';     //蛋白質BMI正常限定值
$CFG['bmi_b_protein']  = '';     //蛋白質BMI過重限定值
$CFG['stage1_protein'] = '0.8';  //蛋白質腎臟病限定值1
$CFG['stage2_protein'] = '0.8';  //蛋白質腎臟病限定值2
$CFG['stage3_protein'] = '0.8';  //蛋白質腎臟病限定值3
$CFG['stage4_protein'] = '0.6';  //蛋白質腎臟病限定值4
$CFG['stage5_protein'] = '0.6';  //蛋白質腎臟病限定值5
$CFG['hd_protein_1']   = '1.2';  //蛋白質腎臟病限定值HD
$CFG['hd_protein_2']   = '1.5';  //蛋白質腎臟病限定值HD
$CFG['capd_protein_1'] = '1.2';  //蛋白質腎臟病限定值CAPD
$CFG['capd_protein_2'] = '1.5';  //蛋白質腎臟病限定值CAPD

$CFG['bmi_s_car']  = '';         //醣類BMI偏低限定值
$CFG['bmi_c_car']  = '';         //醣類BMI正常限定值
$CFG['bmi_b_car']  = '';         //醣類BMI過重限定值
$CFG['stage1_car'] = '';         //醣類腎臟病限定值1
$CFG['stage2_car'] = '';         //醣類腎臟病限定值2
$CFG['stage3_car'] = '';         //醣類腎臟病限定值3
$CFG['stage4_car'] = '';         //醣類腎臟病限定值4
$CFG['stage5_car'] = '';         //醣類腎臟病限定值5
$CFG['hd_car']     = '';         //醣類腎臟病限定值HD
$CFG['capd_car']   = '';         //醣類腎臟病限定值CAPD

$CFG['bmi_s_cho']  = '';         //膽固醇BMI偏低限定值
$CFG['bmi_c_cho']  = '';         //膽固醇BMI正常限定值
$CFG['bmi_b_cho']  = '';         //膽固醇BMI過重限定值
$CFG['stage1_cho'] = '';         //膽固醇腎臟病限定值1
$CFG['stage2_cho'] = '';         //膽固醇腎臟病限定值2
$CFG['stage3_cho'] = '';         //膽固醇腎臟病限定值3
$CFG['stage4_cho'] = '';         //膽固醇腎臟病限定值4
$CFG['stage5_cho'] = '';         //膽固醇腎臟病限定值5
$CFG['hd_cho']     = '';         //膽固醇腎臟病限定值HD
$CFG['capd_cho']   = '';         //膽固醇腎臟病限定值CAPD

$CFG['fat_1']  = '9';             //脂肪卡數
$CFG['fat_2']  = '40';            //脂肪熱量數%

$CFG['bmi_s_pot']  = '';         //鉀BMI偏低限定值
$CFG['bmi_c_pot']  = '';         //鉀BMI正常限定值
$CFG['bmi_b_pot']  = '';         //鉀BMI過重限定值
$CFG['stage1_pot'] = '';         //鉀腎臟病限定值1
$CFG['stage2_pot'] = '';         //鉀腎臟病限定值2
$CFG['stage3_pot'] = '';         //鉀腎臟病限定值3
$CFG['stage4_pot'] = '';         //鉀腎臟病限定值4
$CFG['stage5_pot'] = '';         //鉀腎臟病限定值5
$CFG['hd_pot']     = '';         //鉀腎臟病限定值HD
$CFG['capd_pot']   = '';         //鉀腎臟病限定值CAPD

$CFG['bmi_s_na']  = '3000';      //鈉BMI偏低限定值
$CFG['bmi_c_na']  = '3000';      //鈉BMI正常限定值
$CFG['bmi_b_na']  = '3000';      //鈉BMI過重限定值
$CFG['stage1_na'] = '3000';      //鈉腎臟病限定值1
$CFG['stage2_na'] = '3000';      //鈉腎臟病限定值2
$CFG['stage3_na'] = '3000';      //鈉腎臟病限定值3
$CFG['stage4_na'] = '3000';      //鈉腎臟病限定值4
$CFG['stage5_na'] = '3000';      //鈉腎臟病限定值5
$CFG['hd_na']     = '3000';      //鈉腎臟病限定值HD
$CFG['capd_na']   = '3000';      //鈉腎臟病限定值CAPD

$CFG['bmi_s_cal']  = '';         //鈣BMI偏低限定值
$CFG['bmi_c_cal']  = '';         //鈣BMI正常限定值
$CFG['bmi_b_cal']  = '';         //鈣BMI過重限定值
$CFG['stage1_cal'] = '2000';     //鈣腎臟病限定值1
$CFG['stage2_cal'] = '2000';     //鈣腎臟病限定值2
$CFG['stage3_cal'] = '2000';     //鈣腎臟病限定值3
$CFG['stage4_cal'] = '2000';     //鈣腎臟病限定值4
$CFG['stage5_cal'] = '2000';     //鈣腎臟病限定值5
$CFG['hd_cal']     = '2000';     //鈣腎臟病限定值HD
$CFG['capd_cal']   = '2000';     //鈣腎臟病限定值CAPD

$CFG['bmi_s_pho']  = '';         //磷BMI偏低限定值
$CFG['bmi_c_pho']  = '';         //磷BMI正常限定值
$CFG['bmi_b_pho']  = '';         //磷BMI過重限定值
$CFG['stage1_pho'] = '';         //磷腎臟病限定值1
$CFG['stage2_pho'] = '';         //磷腎臟病限定值2
$CFG['stage3_pho'] = '800';      //磷腎臟病限定值3
$CFG['stage4_pho'] = '800';      //磷腎臟病限定值4
$CFG['stage5_pho'] = '800';      //磷腎臟病限定值5
$CFG['hd_pho']     = '800';      //磷腎臟病限定值HD
$CFG['capd_pho']   = '800';      //磷腎臟病限定值CAPD

$CFG['bmi_s_mg']  = '';         //鎂BMI偏低限定值
$CFG['bmi_c_mg']  = '';         //鎂BMI正常限定值
$CFG['bmi_b_mg']  = '';         //鎂BMI過重限定值
$CFG['stage1_mg'] = '';         //鎂腎臟病限定值1
$CFG['stage2_mg'] = '';         //鎂腎臟病限定值2
$CFG['stage3_mg'] = '';         //鎂腎臟病限定值3
$CFG['stage4_mg'] = '';         //鎂腎臟病限定值4
$CFG['stage5_mg'] = '';         //鎂腎臟病限定值5
$CFG['hd_mg']     = '';         //鎂腎臟病限定值HD
$CFG['capd_mg']   = '';         //鎂腎臟病限定值CAPD

$CFG['bmi_s_iron']  = '';       //鐵BMI偏低限定值
$CFG['bmi_c_iron']  = '';       //鐵BMI正常限定值
$CFG['bmi_b_iron']  = '';       //鐵BMI過重限定值
$CFG['stage1_iron'] = '';       //鐵腎臟病限定值1
$CFG['stage2_iron'] = '';       //鐵腎臟病限定值2
$CFG['stage3_iron'] = '';       //鐵腎臟病限定值3
$CFG['stage4_iron'] = '';       //鐵腎臟病限定值4
$CFG['stage5_iron'] = '';       //鐵腎臟病限定值5
$CFG['hd_iron']     = '';       //鐵腎臟病限定值HD
$CFG['capd_iron']   = '';       //鐵腎臟病限定值CAPD

$CFG['bmi_s_zinc']  = '';       //鋅BMI偏低限定值
$CFG['bmi_c_zinc']  = '';       //鋅BMI正常限定值
$CFG['bmi_b_zinc']  = '';       //鋅BMI過重限定值
$CFG['stage1_zinc'] = '';       //鋅腎臟病限定值1
$CFG['stage2_zinc'] = '';       //鋅腎臟病限定值2
$CFG['stage3_zinc'] = '';       //鋅腎臟病限定值3
$CFG['stage4_zinc'] = '';       //鋅腎臟病限定值4
$CFG['stage5_zinc'] = '';       //鋅腎臟病限定值5
$CFG['hd_zinc']     = '';       //鋅腎臟病限定值HD
$CFG['capd_zinc']   = '';       //鋅腎臟病限定值CAPD
?>