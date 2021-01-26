<?php 
$nopp = $_POST['id'];
//~ echo $nopp;

require_once("config.php");
$sqla = mysqli_query($koneksi,"select * from tbl_pp where no_pp ='".$nopp."'");
$data = mysqli_fetch_array($sqla);
//~ if (($data['status_pp']=='waiting')or($data['status_pp']=='hold')
?>
<table width="80%">
<tr>
	<td><h4>Nomor PP</h4></td>
	<td><h4>&nbsp;:&nbsp;</h4></td>
	<td><h4><?php echo $nopp;?></h4></td>
	<td style="width: 30%">&nbsp;</td>
	<td><h4>Nomor Antri</h4></td>
	<td><h4>&nbsp;:&nbsp;</h4></td>
	<td><h4><?php echo $data['no_antri'];?></h4></td>
</tr>
</table>
<center>
<table width="80%" border="1" class="table table-striped table-bordered table-hover">
	<tr>
		<th colspan="5" style=" background-color:#7EB7FD;">&nbsp;</th>
	</tr>
	<tr>
		<th style="width: 15%;">Pelapor</th><td style="width: 30%;"> <?php echo $data['pelapor']; ?></td>
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th style="width: 18%;">Tanggal Lapor</th><td> <?php echo $data['tgl_lapor']; ?></td>
	</tr>
	<tr>
		<th>Diterima</th><td style="width: 25%;"> <?php echo $data['diterima'];?></td>
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Jam Lapor</th><td> <?php echo $data['jam_lapor']; ?></td>
		
	</tr>
	<tr>
		<th>Dikerjakan</th><td><?php echo $data['dikerjakan'];?></td>
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Tanggal Diterima</th><td><?php 
							if($data['tgl_terima']=='0000-00-00'){
									echo "-";
								}else{
									echo $data['tgl_terima'];
									}
					?></td>
	</tr>
	<tr>
		<?php if (($data['status_hold']=='')&&($data['status_pp']=='waiting')){
			?>
			
		<th>Status PP</th><td> <?php echo $data['status_pp']; ?></td>
		<?php 
		}else if (($data['status_hold']=='')&&($data['status_pp']=='on process')or($data['status_pp']=='finish')or($data['status_pp']=='complete')){
			?>
			
		<th>Status PP</th><td> <?php echo $data['status_pp']; ?></td>
		<?php 
		}else if (($data['status_hold']!='')&&($data['status_pp']=='on process')or($data['status_pp']=='finish')or($data['status_pp']=='complete')){
			?>
			
		<th>Status PP</th><td> <?php echo $data['status_pp']; ?></td>
		<?php 
		}else { ?>
		<th>Status PP/Status Hold</th><td> <?php echo $data['status_pp']."/".$data['status_hold']; ?></td>
		<?php 
		} ?>
		
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Jam Diterima</th><td><?php 
							if($data['jam_terima']=='00:00:00'){
									echo "-";
								}else{
									echo $data['jam_terima'];
									}
					?></td>
	</tr>
	<tr>
		<th rowspan="4">Permasalahan Komputer</th>
		<td rowspan="4"><textarea readonly rows="5" cols="29"><?php echo $data['kerusakan']; ?></textarea></td>
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Tanggal Pengerjaan</th><td> <?php 
							if($data['tgl_m_kerja']=='0000-00-00'){
									echo "-";
								}else{
									echo $data['tgl_m_kerja'];
									}
					?></td>
	</tr>
	<tr>
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Jam Pengerjaan</th>
		<td><?php 
							if($data['jam_m_kerja']=='00:00:00'){
									echo "-";
								}else{
									echo $data['jam_m_kerja'];
									}
					?></td>
	</tr>
	<tr>
		
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Tanggal Finish</th>
		<td><?php 
							if($data['tgl_s_kerja']=='0000-00-00'){
									echo "-";
								}else{
									echo $data['tgl_s_kerja'];
									}
					?></td>
	</tr>
	<tr>
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Jam Finish</th>
		<td><?php 
							if($data['jam_s_kerja']=='00:00:00'){
									echo "-";
								}else{
									echo $data['jam_s_kerja'];
									}
					?></td>
	</tr>
	<?php
		require_once("config.php");
						$sqlh = mysqli_query($koneksi,"select count('no_pp') as a, deskripsi_kerusakan from dt_pp where no_pp ='".$nopp."'");
						$pkjn = mysqli_fetch_array($sqlh);
						if($pkjn['a']==0){
			echo '
				<td rowspan="4">&nbsp;</td>
				<td rowspan="4">&nbsp;</td>
			';
			}else {
	?>
	<tr>
		<th rowspan="4">Pekerjaan Yang Dilakukan</th>
		<td rowspan="4"><textarea readonly rows="5" cols="29"><?php
												require_once("config.php");
												$sqlt	=	mysqli_query($koneksi,"select * from dt_pp where no_pp='".$nopp."'");
												while ($datav = mysqli_fetch_array($sqlt)){
													echo $datav['subcategory']." - ".$datav['deskripsi_kerusakan']."\n";
												}
												//~ echo $nopp;
												
											?></textarea>
		</td><?php }
		
		?>
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Approve Pelapor</th><td> <?php 
							if($data['diperiksa']==''){
									echo "-";
								}else{
									echo $data['diperiksa'];
									}
					?></td>
	</tr>
	<tr>
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Approve Section Head</th>
		<td><?php 
							if($data['diketahui_sh']==''){
									echo "-";
								}else{
									echo $data['diketahui_sh'];
									}
					?></td>
	</tr>
	</table>
</center>
<!--
-->
<!--
<center>
<table>
<tr>
	<td>Diketahui</td><td>&nbsp;</td><td>Diperiksa</td><td>&nbsp;</td><td>Diketahui</td><td>&nbsp;</td><td>Dikerjakan</td>
</tr>
<tr>
	<td><textarea cols="6" rows="2"></textarea></td>
	<td>&nbsp;</td>
	<td><textarea cols="6" rows="2"></textarea></td>
	<td>&nbsp;</td>
	<td><textarea cols="6" rows="2"></textarea></td>
	<td>&nbsp;</td>
	<td><textarea cols="6" rows="2"></textarea></td>
</tr>
</table>
</center>
-->
