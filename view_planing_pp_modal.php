<?php 
$nowo = $_POST['id'];
 $no_project = $_POST['id'];
//~ echo $nowo;
session_start();
require_once("config.php");
$sqla = mysqli_query($koneksi,"select * from tbl_pp where no_pp ='".$nowo."'");
$data = mysqli_fetch_array($sqla);
// $usernm=$_SESSION['username'];
// $cekuser = mysqli_query($koneksi,"select * from user where username ='".$usernm."'");
// $datuser = mysqli_fetch_array($cekuser);
?>

<center>
<table width="80%" class="table table-striped table-bordered table-hover">
	<tr>
		<td colspan="7" style=" background-color:#7EB7FD;">&nbsp;</td>
	</tr>
	<tr>
		<th style="width: 5%;">Nomor WO</th>
		<td colspan="2" style="width: 15%;"><?php echo $data['no_pp'];?></td>
		<td style="width: 1%;border:0;border-top:0;">&nbsp;</td>
		<?php if (($data['status_hold']=='')&&($data['status_pp']=='waiting')){
			?>
			
		<th>Status</th><td colspan="2"><?php echo $data['status_pp']; ?></td>
		<?php 
		}else if (($data['status_hold']=='')&&($data['status_pp']=='on process')or($data['status_pp']=='finish')or($data['status_pp']=='approved by SH')or($data['status_pp']=='accepted by IT')or($data['status_pp']=='approved by IT')or($data['status_pp']=='reject by SH')or($data['status_pp']=='reject by IT')){
			?>
			
		<th>Status</th><td colspan="2"><?php echo $data['status_pp']; ?></td>
		<?php 
		}else if (($data['status_hold']!='')&&($data['status_pp']=='on process')or($data['status_pp']=='finish')or($data['status_pp']=='approved by SH')or($data['status_pp']=='accepted by IT')or($data['status_pp']=='approved by IT')){
			?>
			
		<th>Status</th><td colspan="2"><?php echo $data['status_pp']; ?></td>
		<?php 
		}else { ?>
		<th>Status/Status Hold</th><td colspan="2"><?php echo $data['status_pp']."/".$data['status_hold']; ?></td>
		<?php 
		} ?>
		
		
	</td>
	</tr>
	<tr>
		<th style="width: 5%;">Pemohon</th>
		<td colspan="2"><?php echo $data['pelapor'];?></td>
		<td style="width: 1%;border:0;border-top:0;">&nbsp;</td>
		<th style="width: 5%;">Section</th>
		<td colspan="2"><?php echo $data['section'];?></td>
	</tr>
	<tr>
		<th style="width: 5%;">Tanggal</th>
		<td colspan="2" style="width: 15%;"><?php echo $data['tgl_lapor'];?></td>
		<td style="width: 1%;border:0;border-top:0;">&nbsp;</td>
		<th style="width: 5%;">Jam</th>
		<td style="width: 15%;" colspan="2"><?php echo $data['jam_lapor'];?></td>
	</tr>
	<tr>
		<th colspan="7"> Pekerjaan</th>
	</tr>
	<tr>
		<td colspan="7">
			<textarea readonly rows="3" cols="104" style="resize: none;"><?php echo $data['kerusakan'];?>
			
			</textarea>
		</td>
	</tr>
	<tr>
	<th  colspan="5"> PEKERJAAN YANG DI LAKUKAN</th><th >TOTAL WAKTU</th><th>NILAI</th>
	</tr>
	<tr>
	<td colspan=5 ><?php
		require_once("config.php");
												$sqlt	=	mysqli_query($koneksi,"select * from dt_pp where no_pp='".$nowo."'");
												while ($datav = mysqli_fetch_array($sqlt)){
													echo $datav['subcategory']." - ".$datav['deskripsi_kerusakan']."\n";
													echo"<br>";
												}
												//~ echo $nopp;
												
											?></textarea>
	</td>			
	<td ><?php echo $data['downtime']; ?> -Menit</td>
	<td>
	<?php
	 if(($data['status_pp']=="finish" OR $data['status_pp']=="complete") AND ($_SESSION['username']=="ssh-it" OR $_SESSION['username']=="it01")  ){?>
	<?php 	$sqla_nilai = mysqli_query($koneksi,"select * from nilai_pp where no_pp ='".$nowo."'");
					$data_nilai = mysqli_fetch_array($sqla_nilai);
					
					if($data_nilai['nilai_pp']=='')
					{
						$nilaipp='';
					}else
					{
						$nilaipp=$data_nilai['nilai_pp'];
					}
					?>

					<form action="#" id="n_pp" action="post" name="n_pp" class="n_pp">
				<input type="text" name="nilai"  id="nilai"  onkeypress="return hanyaAngka(event)" value="<?php echo $nilaipp; ;?>" style="width:50px;" > 
				<button class="_nilaipp btn btn-sm btn-success" name="txttombol" type="button"><i class="ace-icon fa fa-check"></i>SIMPAN</button>
	
				<input type="hidden" id="id" name="id" value="<?php echo $nowo;?>">
				<input type="hidden" id="txtnama" name="txtnama" value="<?php  echo $data['diterima'];?>">
				<input type="hidden" id="group" name="group" value="PP">
				</form>
	<?php } ?>
	</td>		
			
		

	<tr>
		
       
    </tr>
         
         

	<tr>
		<th>Dikerjakan/Diperiksa</td>
		<td colspan="2"><?php echo $data['diterima'];?></td>
		<th>Tanggal</th>
		<td><?php if($data['tgl_terima']=='0000-00-00'){
									echo "-";
								}else{
									echo $data['tgl_terima'];
								}
									?></td>
		<th>Jam</th>
		<td><?php if($data['jam_terima']=='00:00:00'){
									echo "-";
								}else{
									echo $data['jam_terima'];
									}
									
									?></td>
	</tr>
	<?php 
		if ($data['keterangan']==''){
			echo "";
		}else if (($data['keterangan']!='')and($data['tgl_reject']!='0000-00-00')){
			echo '<tr>
				<th colspan="7">Keterangan</th>
			</tr>
			<tr>
				<td colspan="7">
					<textarea readonly rows="3" cols="104" style="resize: none;">'.$data['keterangan'].'</textarea>
				</td>
			</tr>
			<tr>
				<th colspan="2">Tanggal Reject</th>
				<td colspan="2">'.$data['tgl_reject'].'</td>
				<th colspan="2">Jam</th>
				<td>'.$data['jam_reject'].'</td>
			</tr>
			';
		
		}else{
			echo '
			<tr>
				<th>Status Hold</th>
				<td colspan="2">'.$data['status_hold'].'</td>
				<th>Tanggal Pengerjaan</th>
				<td>'.$data['tgl_m_kerja'].'</td>
				<th>Jam</th>
				<td>'.$data['jam_m_kerja'].'</td>
			</tr>
			<tr>
				<th colspan="7">Keterangan</th>
			</tr>
			<tr>
				<td colspan="7">
					<textarea readonly rows="3" cols="104" style="resize: none;">'.$data['keterangan'].'</textarea>
				</td>
			</tr>
			<tr>
				<th colspan="2">Tanggal Selesai</th>
				<td colspan="2">'.$data['tgl_s_kerja'].'</td>
				<th colspan="2">Jam</th>
				<td>'.$data['jam_s_kerja'].'</td>
			</tr>
			';
			}
	?>

	
	
</table>
</center>

<script type="text/javascript">
	$(document).ready(function(){
		$("._nilaipp").click(function(){
		
		
       
          var data1  =$('#n_pp').serialize();
          var nilai	=$('#nilai').val();
		
		 	 if (nilai>100){
			 sweetAlert("NILAI MELEBIHI 100", "", "error");
			}
			 else if (nilai<1){
			 sweetAlert("NILAI HARUS DI ISI", "", "error");
			}else{

		$.ajax({
		type: 'POST',
		url: "simpan_nilai.php",
		data: data1,														
		
		success: function(stok) {
               	swal({ 
					title: "Succes!",
						text: "Nilai Succes",
						type: "success" 
					},
					function(){
							  location.reload();
							}
							);
			}
		  })//CEK JML
		}

		});

	});
	</script>
