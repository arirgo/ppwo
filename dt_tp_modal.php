<?php 
session_start();
$cat = $_POST['id'];
$pls = $_SESSION['pls'];
//~ echo $cat;
require_once("config.php");
$sqll	=	mysqli_query($koneksi,"select DISTINCT subcategory from dt_pp where category='Telepon' and pls='$pls' and tgl_tambah like '".$cat."%'");
?>
<div id="piechart-placeholder2"></div>
	<div class="hr hr8 hr-double"></div>
	<div class="clearfix">
		<?php
		while ($datal = mysqli_fetch_array($sqll))
		{
			
		?>
		<div class="grid3">
		<span class="purple"><b><?php echo $datal['subcategory'];?></b></span>
		<span class="bigger pull-right">
		<?php $sqlk = mysqli_query($koneksi,"select count(subcategory) as jm from dt_pp where pls='$pls' and  subcategory='".$datal['subcategory']."' and tgl_tambah like '".$cat."%'"); 
				$datak = mysqli_fetch_array($sqlk);
				echo "".$datak['jm'];
		?>
		</span>
		</div>
		<?php
		}
		?>
	</div>
</div><!-- /.widget-main -->

