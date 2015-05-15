<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>**~GFR~**</title>
</head>

<body>
<p>GFR Compute</p>


Scr<input type="text" name="creatinine" id="creatinine" /><br>
<input type="radio" name="m" id="sex" value="radio" checked="checked" />M
<input type="radio" name="f" id="sex" value="radio" />F<br>
Age<input type="text" name="age" id="age" /><br>
Stage<input type="text" name="stage" id="stage" /><br>
<p>男:</p>
<p>	</p>


<p>
	<?php
		//$gfr=pow($age,-0.203)*pow($scr,-1.154)*186*1;
		
		//$age1=pow($age,-0.203);
		//$scr1=pow(90/(186*$age1),-1.154);
		
		
		for($age=15;$age<80;$age++)
		{
			//for($gfr=90;$gfr<91;$gfr++)
			for($gfr=0;$gfr<15;$gfr++)
			{				
				echo $gfr."　Age:".$age."  scr:". pow((90/(186*pow($age,(-0.203)))),(-1.154)) . "<br>";
			}
					
		}

	?>
</p>


<p>
<?php
	
	
	
    	if ( trim($_POST['creatinine']) != '' )
	{	//計算年紀
		$user_age = date("Y") - $_POST['year'] + 1;
		if ( $_POST['user_sex'] == '男' )
		{
			$GFR = 186 * pow($_POST['creatinine'], -1.154) * pow($user_age, -0.203) * 1;
		}else{
			$GFR = 186 * pow($_POST['creatinine'], -1.154) * pow($user_age, -0.203) * 0.742;
		}
	}
    ?>
</p>
</body>
</html>