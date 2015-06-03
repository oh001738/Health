<?PHP
include "config.php";
$value   = get_value('choose_food', "WHERE ch_id = '" . $_GET['food_id'] . "'", '*');
$percent = $_GET['percent'];   //取得每餐份量
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?PHP echo $value['ch_name'];?> - DRS Nutrient Database</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">
	<link href="<?PHP echo ROOT_URL;?>/include/kurt.css" rel = "stylesheet" type = "text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <!-- Page Content -->
    <div class="container">	  
        <!-- Page Features -->
        <div class="row text-center">
            <div class="col-md-12">
                <div class="thumbnail">
					<h1><span class="label label-primary">DRS飲食資料庫</span></h1>
                    <img src="<?PHP echo IMG_URL;?>/<?PHP echo $value['ch_image'];?>" class="img-rounded" alt="">
                    <div class="caption">
                        <h3><b><?PHP echo $value['ch_name'];?></b></h3>
                        <p><b>內含食材:
						<?PHP
						$sql = "SELECT element_id FROM element_food_conn WHERE food_id = '" . $_GET['food_id'] . "' ORDER BY id ASC";
						$result = mysql_query($sql);
						while ( $row = mysql_fetch_array($result) )
						{
							echo get_col_value('food_element', 'name', "WHERE id = '" . $row['element_id'] . "'") . '&nbsp;&nbsp;';
							$food_element_id[] = $row['element_id'];
						}
						if ( count($food_element_id) == 0 ){ echo '無'; }
						?>
						</b>
						</p>
						<p>
						<div class="alert alert-success" role="alert"><b>本系統已將食物標準化為100g</b></div>
						<table class="table table-condensed">
							<thead>
								<tr>
									<td><b>名稱</b></td>
									<td><b>重量</b></td>
									<td><b>熱量</b></td>
									<td><b>膽固醇</b></td>
									<td><b>脂肪</b></td>
									<td class="hidden-xs hidden-sm"><b>蛋白質</b></td>
									<td><b>醣類</b></td>
									<td class="hidden-xs hidden-sm"><b>鉀</b></td>
									<td class="hidden-xs hidden-sm"><b>鈉</b></td>
									<td class="hidden-xs hidden-sm"><b>鈣</b></td>
									<td class="hidden-xs hidden-sm"><b>磷</b></td>
									<td class="hidden-xs hidden-sm"><b>鎂</b></td>
									<td class="hidden-xs hidden-sm"><b>鐵</b></td>
									<td class="hidden-xs hidden-sm"><b>鋅</b></td>				
								</tr>
							</thead>
							<tbody>
							<?PHP
							if ( count($food_element_id) > 0 )
							{
								foreach ( $food_element_id as $f_e_value )
								{
									$foodValue = get_value('food_element', "WHERE id = '" . $f_e_value . "'");
									echo "<tr>\n";
									echo "   <td>" . $foodValue['name'] . "</td>\n";
									echo "   <td>\n";
									if ($value['kg'] == ''){ echo ''; }else{ echo $foodValue['kg'] . 'g'; }
									echo "   </td>\n";
									$f_element_k            = ($foodValue['k'] == 0)? '-' : $foodValue['k'];
									$f_element_cholesterol  = ($foodValue['cholesterol'] == 0)? '-' : $foodValue['cholesterol'];
									$f_element_fat          = ($foodValue['fat'] == 0)? '-' : $foodValue['fat'];
									$f_element_e            = ($foodValue['e'] == 0)? '-' : $foodValue['e'];
									$f_element_carbohydrate = ($foodValue['carbohydrate'] == 0)? '-' : $foodValue['carbohydrate'];
									$f_element_potassium    = ($foodValue['potassium'] == 0)? '-' : $foodValue['potassium'];
									$f_element_sodium       = ($foodValue['sodium'] == 0)? '-' : $foodValue['sodium'];
									$f_element_calcium      = ($foodValue['calcium'] == 0)? '-' : $foodValue['calcium'];
									$f_element_phosphorous  = ($foodValue['phosphorous'] == 0)? '-' : $foodValue['phosphorous'];
									$f_element_mg           = ($foodValue['mg'] == 0)? '-' : $foodValue['mg'];
									$f_element_iron         = ($foodValue['iron'] == 0)? '-' : $foodValue['iron'];
									$f_element_zinc         = ($foodValue['zinc'] == 0)? '-' : $foodValue['zinc'];
									echo "   <td>" . $f_element_k . "</td>\n";
									echo "   <td>" . $f_element_cholesterol . "</td>\n";
									echo "   <td>" . $f_element_fat . "</td>\n";
									echo "   <td class=\"hidden-xs hidden-sm\">" . $f_element_e . "</td>\n";
									echo "   <td>" . $f_element_carbohydrate . "</td>\n";
									echo "   <td class=\"hidden-xs hidden-sm\">" . $f_element_potassium . "</td>\n";
									echo "   <td class=\"hidden-xs hidden-sm\">" . $f_element_sodium . "</td>\n";
									echo "   <td class=\"hidden-xs hidden-sm\">" . $f_element_calcium . "</td>\n";
									echo "   <td class=\"hidden-xs hidden-sm\">" . $f_element_phosphorous . "</td>\n";
									echo "   <td class=\"hidden-xs hidden-sm\">" . $f_element_mg . "</td>\n";
									echo "   <td class=\"hidden-xs hidden-sm\">" . $f_element_iron . "</td>\n";
									echo "   <td class=\"hidden-xs hidden-sm\">" . $f_element_zinc . "</td>\n";
									echo "</tr>\n";
								}
							}
							?>
							<tr class="info">
								<td>每份</td>
								<td><?PHP if ($value['kg'] == ''){ echo ''; }else{ echo $value['kg'] . 'g'; }?></td>
								<td><?PHP if ( $value['ch_k'] == 0){ echo '-'; }else{echo $value['ch_k']; }?></td>
								<td><?PHP if ( $value['ch_cholesterol'] == 0){ echo '-'; }else{echo $value['ch_cholesterol']; }?></td>
								<td><?PHP if ( $value['ch_fat'] == 0){ echo '-'; }else{echo $value['ch_fat']; }?></td>
								<td class="hidden-xs hidden-sm"><?PHP if ( $value['ch_e'] == 0){ echo '-'; }else{echo $value['ch_e']; }?></td>
								<td><?PHP if ( $value['ch_carbohydrate'] == 0){ echo '-'; }else{echo $value['ch_carbohydrate']; }?></td>
								<td class="hidden-xs hidden-sm"><?PHP if ( $value['ch_potassium'] == 0){ echo '-'; }else{echo $value['ch_potassium']; }?></td>
								<td class="hidden-xs hidden-sm"><?PHP if ( $value['ch_sodium'] == 0){ echo '-'; }else{echo $value['ch_sodium']; }?></td>
								<td class="hidden-xs hidden-sm"><?PHP if ( $value['ch_calcium'] == 0){ echo '-'; }else{echo $value['ch_calcium']; }?></td>
								<td class="hidden-xs hidden-sm"><?PHP if ( $value['ch_phosphorous'] == 0){ echo '-'; }else{echo $value['ch_phosphorous']; }?></td>
								<td class="hidden-xs hidden-sm"><?PHP if ( $value['ch_mg'] == 0){ echo '-'; }else{echo $value['ch_mg']; }?></td>
								<td class="hidden-xs hidden-sm"><?PHP if ( $value['ch_iron'] == 0){ echo '-'; }else{echo $value['ch_iron']; }?></td>
								<td class="hidden-xs hidden-sm"><?PHP if ( $value['ch_zinc'] == 0){ echo '-'; }else{echo $value['ch_zinc']; }?></td>
							</tr>
							<tr class="danger">
								<td><font style = 'font-weight:700;color:#FF0000'><?PHP if ($value['kg'] == ''){ echo '每100g'; }else{ echo '每100g'; } ?></font></td>
								<td></td>
								<td><?PHP echo get_one_g($value['ch_k'], $value['kg'], 100);?></td>
								<td><?PHP echo get_one_g($value['ch_cholesterol'], $value['kg'], 100);?></td>
								<td><?PHP echo get_one_g($value['ch_fat'], $value['kg'], 100);?></td>
								<td class="hidden-xs hidden-sm"><?PHP echo get_one_g($value['ch_e'], $value['kg'], 100);?></td>
								<td><?PHP echo get_one_g($value['ch_carbohydrate'], $value['kg'], 100);?></td>
								<td class="hidden-xs hidden-sm"><?PHP echo get_one_g($value['ch_potassium'], $value['kg'], 100);?></td>
								<td class="hidden-xs hidden-sm"><?PHP echo get_one_g($value['ch_sodium'], $value['kg'], 100);?></td>
								<td class="hidden-xs hidden-sm"><?PHP echo get_one_g($value['ch_calcium'], $value['kg'], 100);?></td>
								<td class="hidden-xs hidden-sm"><?PHP echo get_one_g($value['ch_phosphorous'], $value['kg'], 100);?></td>
								<td class="hidden-xs hidden-sm"><?PHP echo get_one_g($value['ch_mg'], $value['kg'], 100);?></td>
								<td class="hidden-xs hidden-sm"><?PHP echo get_one_g($value['ch_iron'], $value['kg'], 100);?></td>
								<td class="hidden-xs hidden-sm"><?PHP echo get_one_g($value['ch_zinc'], $value['kg'], 100);?></td>
							</tr>
							<tr>
								<td><font style = 'font-weight:700;color:#FF0000'>每100g</font></td>
								<td></td>
								<td><?PHP echo check_type_1($value['ch_k'], 651, 650, 501, 500, $percent, $value['kg']); ?></td>
								<td></td>
								<td><?PHP echo check_type_1($value['ch_fat'], 15, 14.9, 12, 11.9, $percent, $value['kg']); ?></td>
								<td class="hidden-xs hidden-sm"><?PHP echo check_type_1($value['ch_e'], 15, 14.9, 11, 10.9, $percent, $value['kg']); ?></td>
								<td><?PHP echo check_type_1($value['ch_carbohydrate'], 76, 75, 46, 45, $percent, $value['kg']); ?></td>
								<td class="hidden-xs hidden-sm"><?PHP echo check_type_1($value['ch_potassium'], 731, 730, 461, 460, $percent, $value['kg']); ?></td>
								<td class="hidden-xs hidden-sm"><?PHP echo check_type_1($value['ch_sodium'], 1066, 1065, 800, 799, $percent, $value['kg']); ?></td>
								<td class="hidden-xs hidden-sm"><?PHP echo check_type_1($value['ch_calcium'], 834, 833, 401, 400, $percent, $value['kg']); ?></td>
								<td class="hidden-xs hidden-sm"><?PHP echo check_type_1($value['ch_phosphorous'], 1334, 1333, 267, 266, $percent, $value['kg']); ?></td>
								<td class="hidden-xs hidden-sm"><?PHP echo check_type_1($value['ch_mg'], 234, 233, 121, 120, $percent, $value['kg']); ?></td>
								<td></td>
								<td></td>
							</tr>							
							</tbody>
						</table>
						</p>
                        <p>	
                            <input type = "button" id = "close" name = "close" class = "btn btn-primary" value = "關閉視窗" onclick = "window.close()">
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; THUIM 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	<script type = "text/javascript" src = "http://10.110.24.168:8080/Health/include/kurt.js"></script>

</body>

</html>
