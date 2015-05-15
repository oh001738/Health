          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">食物圖片 - <?php echo "$row[name]";?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				
				<?php if($row[img]!='')
				{
					echo "<div class='row'>";
					echo "<div class='col-md-12 col-centered text-center'><img src = '" . IMG_URL . "/" . $row['img'] . "' width = '300'></div>";
					echo "</div>";
				}
				else
				{
					echo "<div><table border=1 width=300 height=300><tr><td align=center>N/A</td></tr></table></div>";
				} ?>
				
              </div><!-- /.box -->
			  

            </div><!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
              <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header">
                  <h3 class="box-title">營養素分布</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
				<div id="donut-example"></div>
<h1></hy				
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
		  
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
