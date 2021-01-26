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
					<?php
							if($data['status_pp']=='waiting'){
									echo "<td>Status PP&nbsp;</td>
					<td>:&nbsp;</td><td>".$data['status_pp']."</td>";
								}else if($data['status_pp']=='hold'){
										echo "
													<td>Status Hold&nbsp</td>
													<td>:&nbsp</td>
													<td>".$data['status_hold']."</td>
											";
									
									}
					?>
				</tr>
				<tr>
					<td>Pelapor&nbsp;</td><td>:&nbsp;</td><td><?php echo $data['pelapor'] ?></td>
				</tr>
				<tr>
					<td>Permasalahan&nbsp;</td>
					<td>:&nbsp;</td>
					<td><textarea readonly rows="5" cols="26"><?php echo $data['kerusakan'];?></textarea></td>
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
