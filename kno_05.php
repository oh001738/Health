<?PHP
include_once 'config.php';

header_print(true);   //載入header檔
?>
<link href="css/style.css" rel="stylesheet" type="text/css">
<body>

<table border = '1' cellpadding = '0' cellspacing = '0' width = '760' class = 'header_table'>
<tr>
	<td><?PHP include_once ROOT_PATH . '/menubar.php';?></td>
</tr>
<tr>
	<td valign = 'top'>
	<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
	  <!--DWLayoutTable-->
	<tr>
		<td width="1006">
		<div class = 'fast_link'>
		<?PHP
		$nowL = array('首頁' => 'index.php', '健康知識' => 'knowledge.php', '我國成人之理想體重範圍' => '');
		echo show_path_url($nowL);
		?>		</td>
	</tr>
	<tr>
		<td valign="top">
		  <table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
		    <!--DWLayoutTable-->
		    <tr>
		      <td width = '180' height="785" valign = 'top'>
                <?PHP include_once ROOT_PATH . "/leftmenu.php";?>			</td>
			  <td width = '16'>&nbsp;</td>
			  <td width = '757' align = 'center' valign = 'top'>
                <table id="___01" width="755" height="594" border="0" cellpadding="0" cellspacing="0">
                  <!--DWLayoutTable-->
                  <tr>
                    <td height="16" colspan="3" valign="top">
                    <img src="img/kno_f01.jpg" width="755" height="16" alt=""></td>
                    <td width="1"></td>
                  </tr>
                  <tr>
                    <td width="21" rowspan="2" valign="top">
                    <img src="img/kno_f02.jpg" width="21" height="554" alt=""><img src="img/kno_f02.jpg" width="21" height="554" alt=""><img src="img/kno_f02.jpg" width="21" height="257" alt=""></td>
                    <td width="713" height="31" valign="top"><img src="img/kno_a07.jpg" width="713" height="31" alt=""></td>
                    <td width="21" rowspan="2" valign="top">
                    <img src="img/kno_f05.jpg" width="21" height="554" alt=""><img src="img/kno_f05.jpg" width="21" height="554" alt=""><img src="img/kno_f05.jpg" width="21" height="257" alt=""></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td height="714" align="left" valign="top"><p class="kno_01">&nbsp;</p>
                      <table border="1" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="111" rowspan="2"><p align="center" class="kno_01">身高<br>
                            (公分)</p></td>
                          <td width="111"><p align="center" class="kno_01">體重過輕</p></td>
                          <td width="111"><p align="center" class="kno_01">正常範圍</p></td>
                          <td width="112"><p align="center" class="kno_01">體重過重</p></td>
                          <td width="112"><p align="center" class="kno_01">肥胖</p></td>
                        </tr>
                        <tr>
                          <td width="111"><p align="center" class="kno_01">BMI&lt;18.5</p></td>
                          <td width="111"><p align="center" class="kno_01">18.5≦BMI&lt;24</p></td>
                          <td width="112"><p align="center" class="kno_01">24≦BMI&lt;27</p></td>
                          <td width="112"><p align="center" class="kno_01">BMI≧27</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">145</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">38.5以下</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">38.9~50.4</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">50.5~56.7</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">56.8以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top"><p class="kno_01">146</p></td>
                          <td width="111" valign="top"><p class="kno_01">39.3以下</p></td>
                          <td width="111" valign="top"><p class="kno_01">39.4~51.1</p></td>
                          <td width="112" valign="top"><p class="kno_01">51.2~57.5</p></td>
                          <td width="112" valign="top"><p class="kno_01">57.6以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">147</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">39.9以下</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">40.0~51.8</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">51.9~58.2</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">58.3以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top"><p class="kno_01">148</p></td>
                          <td width="111" valign="top"><p class="kno_01">40.4以下</p></td>
                          <td width="111" valign="top"><p class="kno_01">40.5~52.5</p></td>
                          <td width="112" valign="top"><p class="kno_01">52.6~59.0</p></td>
                          <td width="112" valign="top"><p class="kno_01">59.1以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">149</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">41.0以下</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">41.1~53.2</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">53.3~59.8</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">59.9以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top"><p class="kno_01">150</p></td>
                          <td width="111" valign="top"><p class="kno_01">41.5以下</p></td>
                          <td width="111" valign="top"><p class="kno_01">41.6~53.9</p></td>
                          <td width="112" valign="top"><p class="kno_01">54.0~60.7</p></td>
                          <td width="112" valign="top"><p class="kno_01">60.8以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">151</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">42.1以下</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">42.2~54.6</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">54.7~61.5</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">61.6以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top"><p class="kno_01">152</p></td>
                          <td width="111" valign="top"><p class="kno_01">42.6以下</p></td>
                          <td width="111" valign="top"><p class="kno_01">42.7~55.3</p></td>
                          <td width="112" valign="top"><p class="kno_01">55.4~62.3</p></td>
                          <td width="112" valign="top"><p class="kno_01">62.4以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">153</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">43.2以下</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">43.3~56.1</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">56.2~63.1</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">63.2以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top"><p class="kno_01">154</p></td>
                          <td width="111" valign="top"><p class="kno_01">43.8以下</p></td>
                          <td width="111" valign="top"><p class="kno_01">43.9~56.8</p></td>
                          <td width="112" valign="top"><p class="kno_01">56.9~63.9</p></td>
                          <td width="112" valign="top"><p class="kno_01">64.0以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">155</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">44.3以下</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">44.4~57.6</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">57.7~64.8</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">64.9以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top"><p class="kno_01">156</p></td>
                          <td width="111" valign="top"><p class="kno_01">49.9以下</p></td>
                          <td width="111" valign="top"><p class="kno_01">45.0~58.3</p></td>
                          <td width="112" valign="top"><p class="kno_01">58.4~65.1</p></td>
                          <td width="112" valign="top"><p class="kno_01">65.7以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">157</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">45.5以下</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">45.6~59.1</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">59.2~66.5</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">66.6以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top"><p class="kno_01">158</p></td>
                          <td width="111" valign="top"><p class="kno_01">46.1以下</p></td>
                          <td width="111" valign="top"><p class="kno_01">46.2~59.8</p></td>
                          <td width="112" valign="top"><p class="kno_01">59.9~67.3</p></td>
                          <td width="112" valign="top"><p class="kno_01">67.4以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">159</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">46.7以下</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">46.8~60.6</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">60.7~68.2</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">68.3以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top"><p class="kno_01">160</p></td>
                          <td width="111" valign="top"><p class="kno_01">47.3以下</p></td>
                          <td width="111" valign="top"><p class="kno_01">47.4~61.3</p></td>
                          <td width="112" valign="top"><p class="kno_01">61.4~69.0</p></td>
                          <td width="112" valign="top"><p class="kno_01">69.1以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">161</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">47.9以下</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">48.0~62.1</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">62.2~69.9</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">70.0以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top"><p class="kno_01">162</p></td>
                          <td width="111" valign="top"><p class="kno_01">48.5以下</p></td>
                          <td width="111" valign="top"><p class="kno_01">48.6~62.9</p></td>
                          <td width="112" valign="top"><p class="kno_01">63.0~70.8</p></td>
                          <td width="112" valign="top"><p class="kno_01">70.9以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">163</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">49.1以下</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">49.2~63.7</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">63.8~71.6</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">71.7以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top"><p class="kno_01">164</p></td>
                          <td width="111" valign="top"><p class="kno_01">49.7以下</p></td>
                          <td width="111" valign="top"><p class="kno_01">49.8~64.5</p></td>
                          <td width="112" valign="top"><p class="kno_01">64.6~72.5</p></td>
                          <td width="112" valign="top"><p class="kno_01">72.6以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">165</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">50.3以下</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">50.4~65.2</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">65.3~73.4</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">73.5以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top"><p class="kno_01">166</p></td>
                          <td width="111" valign="top"><p class="kno_01">50.9以下</p></td>
                          <td width="111" valign="top"><p class="kno_01">51.0~66.0</p></td>
                          <td width="112" valign="top"><p class="kno_01">66.1~74.3</p></td>
                          <td width="112" valign="top"><p class="kno_01">74.4以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">167</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">51.5以下</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">51.6~66.8</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">66.9~75.2</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">75.3以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top"><p class="kno_01">168</p></td>
                          <td width="111" valign="top"><p class="kno_01">52.1以下</p></td>
                          <td width="111" valign="top"><p class="kno_01">52.2~67.6</p></td>
                          <td width="112" valign="top"><p class="kno_01">67.7~76.1</p></td>
                          <td width="112" valign="top"><p class="kno_01">76.2以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">169</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">52.7以下</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">52.8~68.4</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">68.5~77.0</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">77.1以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top"><p class="kno_01">170</p></td>
                          <td width="111" valign="top"><p class="kno_01">53.4以下</p></td>
                          <td width="111" valign="top"><p class="kno_01">53.5~69.3</p></td>
                          <td width="112" valign="top"><p class="kno_01">69.4~77.9</p></td>
                          <td width="112" valign="top"><p class="kno_01">78.0以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">171</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">54.0以下</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">54.1~70.1</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">70.2~78.9</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">79.0以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top"><p class="kno_01">172</p></td>
                          <td width="111" valign="top"><p class="kno_01">54.6以下</p></td>
                          <td width="111" valign="top"><p class="kno_01">54.7~70.9</p></td>
                          <td width="112" valign="top"><p class="kno_01">71.0~79.8</p></td>
                          <td width="112" valign="top"><p class="kno_01">79.9以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">173</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">55.3以下</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">55.4~71.7</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">71.8~80.7</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">80.8以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top"><p class="kno_01">174</p></td>
                          <td width="111" valign="top"><p class="kno_01">55.9以下</p></td>
                          <td width="111" valign="top"><p class="kno_01">56.0~72.6</p></td>
                          <td width="112" valign="top"><p class="kno_01">72.7~81.6</p></td>
                          <td width="112" valign="top"><p class="kno_01">81.7以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">175</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">56.6以下</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">56.7~73.4</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">73.5~82.6</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">82.7以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top"><p class="kno_01">176</p></td>
                          <td width="111" valign="top"><p class="kno_01">57.2以下</p></td>
                          <td width="111" valign="top"><p class="kno_01">57.3~74.2</p></td>
                          <td width="112" valign="top"><p class="kno_01">74.3~83.5</p></td>
                          <td width="112" valign="top"><p class="kno_01">83.6以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">177</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">57.9以下</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">58.0~75.1</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">75.2~84.5</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">84.6以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top"><p class="kno_01">178</p></td>
                          <td width="111" valign="top"><p class="kno_01">58.5以下</p></td>
                          <td width="111" valign="top"><p class="kno_01">58.6~75.9</p></td>
                          <td width="112" valign="top"><p class="kno_01">76.0~85.4</p></td>
                          <td width="112" valign="top"><p class="kno_01">85.5以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">179</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">59.2以下</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">59.3~76.8</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">76.9~86.4</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">86.5以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top"><p class="kno_01">180</p></td>
                          <td width="111" valign="top"><p class="kno_01">59.8以下</p></td>
                          <td width="111" valign="top"><p class="kno_01">59.9~77.7</p></td>
                          <td width="112" valign="top"><p class="kno_01">77.8~87.4</p></td>
                          <td width="112" valign="top"><p class="kno_01">87.5以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">181</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">60.5以下</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">60.6~78.5</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">78.6~88.4</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">88.5以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top"><p class="kno_01">182</p></td>
                          <td width="111" valign="top"><p class="kno_01">61.2以下</p></td>
                          <td width="111" valign="top"><p class="kno_01">61.3~79.4</p></td>
                          <td width="112" valign="top"><p class="kno_01">79.5~89.3</p></td>
                          <td width="112" valign="top"><p class="kno_01">89.4以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">183</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">61.9以下</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">62.0~80.3</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">80.4~90.3</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">90.4以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top"><p class="kno_01">184</p></td>
                          <td width="111" valign="top"><p class="kno_01">62.5以下</p></td>
                          <td width="111" valign="top"><p class="kno_01">62.6~81.2</p></td>
                          <td width="112" valign="top"><p class="kno_01">81.3~91.3</p></td>
                          <td width="112" valign="top"><p class="kno_01">91.4以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">185</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">63.2以下</p></td>
                          <td width="111" valign="top" bgcolor="#D5EAEE"><p class="kno_01">63.3~82.0</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">82.1~92.3</p></td>
                          <td width="112" valign="top" bgcolor="#D5EAEE"><p class="kno_01">92.4以上</p></td>
                        </tr>
                        <tr>
                          <td width="111" valign="top"><p class="kno_01">186</p></td>
                          <td width="111" valign="top"><p class="kno_01">63.9以下</p></td>
                          <td width="111" valign="top"><p class="kno_01">64.0~82.9</p></td>
                          <td width="112" valign="top"><p class="kno_01">83.0~93.3</p></td>
                          <td width="112" valign="top"><p class="kno_01">93.4以上</p></td>
                        </tr>
                      </table>
                      <p class="kno_01">*依據公式BMI(Body Mass Index，身體質量指數)=體重(公斤)/身高2 (公尺2)計算</p>
                      <p class="kno_01">資料來源:臨床營養工作手冊</p></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td height="23" colspan="3" valign="top"><img src="img/kno_f25.jpg" width="755" height="23" alt=""></td>
                    <td></td>
                  </tr>
                </table></td>
		  <td width = '53'></td>
		    </tr>
		                                                              </table></td>
	</tr>
	<tr>
		<td><?PHP include_once ROOT_PATH . "/footer.php";?></td>
	</tr>
	</table>
	</td>
</tr>
</table>
</body>
</html>