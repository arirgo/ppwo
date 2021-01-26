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
		<th>Status PP</th><td> <?php echo $data['status_pp']; ?></td>
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Jam Diterima</th><td><?php 
							if($data['jam_terima']==''){
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
							if($data['jam_m_kerja']==''){
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
							if($data['jam_s_kerja']==''){
									echo "-";
								}else{
									echo $data['jam_s_kerja'];
									}
					?></td>
	</tr>
	<tr>
		<th rowspan="4">Penyelesaian</th>
		<td rowspan="4"><textarea readonly rows="5" cols="29"><?php if ($data['pekerjaan']==""){
																		echo "Report teknisi belum tersedia";
																		}else{
																			echo "".$data['pekerjaan']."";
																			} ?></textarea></td>
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
	<tr>
		<td style="width: 2%;border:0;border-top:0;"></td>
		<th>Approve IT</th>
		<td><?php 
							if($data['diketahui_it']==''){
									echo "-";
								}else{
									echo $data['diketahui_it'];
									}
					?></td>
	</tr>
	<tr></tr>
	
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
