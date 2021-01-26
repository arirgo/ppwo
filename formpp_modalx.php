<?php 
$nopp = $_POST['id'];
//~ echo $nopp;

require_once("config.php");
$sqla = mysqli_query($koneksi,"select * from tbl_pp where no_pp ='".$nopp."'");
$data = mysqli_fetch_array($sqla);
//~ if (($data['status_pp']=='waiting')or($data['status_pp']=='hold')
?>
<table>
	<tr>
		<td>
			<table>
				<tr>
					<td>Nomor PP&nbsp;</td>
					<td>:&nbsp;</td>
					<td><?php echo $nopp;?></td>
				</tr>
				<tr>
					<td>Nomor Tiket&nbsp;</td>
					<td>:&nbsp;</td>
					<td><?php echo $data['no_antri']?></td>
				</tr>
				<tr>
					<td>Diterima&nbsp;</td>
					<td>:&nbsp;</td>
					<td><?php echo $data['diterima'];?></td>
				</tr>
				<tr>
					<td>Dikerjakan&nbsp;</td>
					<td>:&nbsp;</td>
					<td><?php echo $data['dikerjakan'];?></td>
				</tr>
				<tr>
					<td>Status PP&nbsp;</td>
					<td>:&nbsp;</td>
					<td><? echo $data['status_pp'];?></td>
				</tr>
				<tr>
					<td>Pelapor&nbsp;</td><td>:&nbsp;</td><td><?php echo $data['pelapor'] ?></td>
				</tr>
				<tr>
					<td>Permasalahan&nbsp;</td>
					<td>:&nbsp;</td>
					<td><textarea readonly rows="5" cols="26"><?php echo $data['kerusakan'];?></textarea></td>
				</tr>
				<tr>
					<?php
						require_once("config.php");
						$sqlh = mysqli_query($koneksi,"select count('no_pp') as a, deskripsi_kerusakan from dt_pp where no_pp ='".$nopp."'");
						$pkjn = mysqli_fetch_array($sqlh);
						if($pkjn['a']==0){
							echo '<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>';
							}else {
								?>
									<td>Pekerjaan yang dilakukan</td>
									<td>:&nbsp;</td>
									<td>
										<textarea readonly rows="5" cols="26">
											<?php
												//~ require_once("config.php");
												//~ $sqlt	=	mysqli_query($koneksi,"select * from dt_pp where no_pp='".$nopp."'");
												//~ while ($datav = mysqli_fetch_array($sqlt)){
													//~ echo $datav['deskripsi_kerusakan']."<br>";
												//~ }
												echo $nopp;
												
											?>
										</textarea>
									</td>
								<?php
								}
					?>
				</tr>
			</table>
		</td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>
			<table>
				
				<tr>
					<td>Tgl Lapor&nbsp;</td>
					<td>:&nbsp;</td>
					<td><?php echo $data['tgl_lapor'];?></td>
				</tr>
				<tr>
					<td>Jam Lapor&nbsp;</td>
					<td>:&nbsp;</td>
					<td><?php echo $data['jam_lapor'];?></td>
				</tr>
				
				<tr>
					<td>Tgl Diterima&nbsp;</td>
					<td>:&nbsp;</td>
					<td><?php 
							if($data['tgl_terima']=='0000-00-00'){
									echo "-";
								}else{
									echo $data['tgl_terima'];
									}
					?></td>
				</tr>
				<tr>
					<td>Jam Diterima&nbsp;</td>
					<td>:&nbsp;</td>
					<td><?php 
							if($data['jam_terima']==''){
									echo "-";
								}else{
									echo $data['jam_terima'];
									}
					?></td>
				</tr>
				<tr>
					<td>Tgl Pengerjaan&nbsp;</td>
					<td>:&nbsp;</td>
					<td><?php 
							if($data['tgl_m_kerja']=='0000-00-00'){
									echo "-";
								}else{
									echo $data['tgl_m_kerja'];
									}
					?></td>
				</tr>
				<tr>
					<td>Jam Pengerjaan&nbsp;</td>
					<td>:&nbsp;</td>
					<td><?php 
							if($data['jam_m_kerja']==''){
									echo "-";
								}else{
									echo $data['jam_m_kerja'];
									}
					?></td>
				</tr>
				<tr>
					<td>Tgl Finish&nbsp;</td>
					<td>:&nbsp;</td>
					<td><?php 
							if($data['tgl_s_kerja']=='0000-00-00'){
									echo "-";
								}else{
									echo $data['tgl_s_kerja'];
									}
					?></td>
				</tr>
				<tr>
					<td>Jam Finish&nbsp;</td>
					<td>:&nbsp;</td>
					<td><?php 
							if($data['jam_s_kerja']==''){
									echo "-";
								}else{
									echo $data['jam_s_kerja'];
									}
					?></td>
				</tr>
				
			</table>
		</td>
	</tr>
</table>
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
