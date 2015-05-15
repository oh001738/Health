<?php
require_once "../config.php";
//會員總數
$user=mysql_query("select * from user ");
$usertotal=mysql_num_rows($user);
$foodelement=mysql_query("select * from food_element ");
$fetatal=mysql_num_rows($foodelement);
$choosefood=mysql_query("select * from choose_food ");
$cftotal=mysql_num_rows($choosefood);
if ( !ckadmin() )
{
	showMsg("非管理者無法進入");
	reDirect(ROOT_URL);
	exit;
}
?>
		  <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $cftotal;?></h3>
                  <p>食物種類筆數</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pizza"></i>
                </div>
                <a href="#" class="small-box-footer">瞭解更多 <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>
                  <p>Bounce Rate</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">瞭解更多 <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo $usertotal;?></h3>
                  <p>使用人數</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">瞭解更多 <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $fetatal;?></h3>
                  <p>食物元素筆數</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">瞭解更多 <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
 