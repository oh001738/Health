<?PHP
include_once 'config.php';

header_print(true);   //載入header檔
?>

<style type="text/css">
<!--
.style2 {font-size: 11pt}
-->
</style>

<body>

<table border = '1' cellpadding = '0' cellspacing = '0' width = '760' class = 'header_table'>
<tr>
	<td><?PHP include_once ROOT_PATH . '/menubar.php';?></td>
</tr>
<tr>
	<td valign = 'top'>
	<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
	<tr>
		<td>
		<div class = 'fast_link'>
		<?PHP
		$nowL = array('首頁' => 'index.php', '健康知識' => 'index.php', '認識低蛋白飲食' => '');
		echo show_path_url($nowL);
		?>
		</td>
	</tr>
	<tr>
		<td>
		<table border = '0' cellpadding = '0' cellspacing = '0' width = '100%'>
		<tr>
			<td width = '18%' valign = 'top'>
			<?PHP include_once ROOT_PATH . "/leftmenu2.php";?>
			</td>
			<td valign = 'top' align = 'center'>
			<table border = '0' cellpadding = '4' cellspacing = '1' width = '95%'>
			<tr>
				<td><div class = 'title3'>低蛋白飲食</div></td>
			</tr>
			<tr>
				<td class = 'text15px'><p>飲食中富含蛋白質食物包括：魚、肉、蛋、奶、豆類，腎臟病患者若攝取過多蛋白質，將加速腎臟破壞，由於個人病程不同，所以建議每人每天約攝取2～4兩的肉類（1兩=37.5公克，約３手指大小），及遵照營養師建議的飲食計畫。
限制蛋白質，容易使熱量的攝取不夠，而加重病情。足夠的熱量，需由下列蛋白質含量極低的食物提供：
</p>
                  </td>
			</tr>
			<tr>
				<td class = 'text15px'><p>1.低氮澱粉類：粉圓、西谷米、冬粉、粉皮、藕粉、太白粉、玉米粉、樹薯粉、洋菜凍。</p>
            <p></p>     </td>
			</tr>
			<tr>
				<td class = 'text15px'><p>2.精緻糖：砂糖、果糖、冰糖、蜂蜜、糖果等。</p>
            <p></p>     </td>
			</tr>
			<tr>
				<td class = 'text15px'><p>3.葡萄糖聚合物：糖飴。</p>
            <p></p>     </td>
			</tr>
			<tr>
				<td class = 'text15px'><p>4.油脂類：沙拉油、橄欖油等植物性油脂。</p>
            <p></p>     </td>
			</tr>
			</table>
			</td>
		</tr>
		
		</table>
		</td>
	</tr>
	<tr>
		<td><?PHP include_once ROOT_PATH . "/footer.php";?></td>
	</tr>
	</table>
	</td>
</tr>
<table>
</body>
</html>