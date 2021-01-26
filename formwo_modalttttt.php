<?php 
$nowo = $_POST['id'];
//~ echo $nowo;

require_once("config.php");
session_start();
 $nm=$_SESSION['nama'];
$cekdev = mysqli_query($koneksi,"select * from user where nama ='".$nm."'");
$dtus = mysqli_fetch_array($cekdev);
$dev=$dtus['dev'];

$sqla = mysqli_query($koneksi,"select * from tbl_wo where no_wo ='".$nowo."'");
$data = mysqli_fetch_array($sqla);
$diterima=$data['diterima'];

$sqla_nl = mysqli_query($koneksi,"select * from nilai_wo where no_wo ='".$nowo."' AND username ='".$diterima."' ");
$data_nl = mysqli_fetch_array($sqla_nl);
$tp_anal=$data_nl['analisis'];
$tp_prog=$data_nl['programing'];
$tp_dok=$data_nl['dokumentasi'];
$tp_point=$data_nl['point'];

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
		<td colspan="2" style="width: 15%;"><?php echo $data['no_wo'];?></td>
		<td style="width: 1%;border:0;border-top:0;">&nbsp;</td>
		<?php if (($data['status_hold']=='')&&($data['status_wo']=='waiting')){
			?>
			
		<th>Status</th><td colspan="2"><?php echo $data['status_wo']; ?></td>
		<?php 
		}else if (($data['status_hold']=='')&&($data['status_wo']=='on process')or($data['status_wo']=='finish')or($data['status_wo']=='approved by SH')or($data['status_wo']=='accepted by IT')or($data['status_wo']=='approved by IT')or($data['status_wo']=='reject by SH')or($data['status_wo']=='reject by IT')){
			?>
			
		<th>Status</th><td colspan="2"><?php echo $data['status_wo']; ?></td>
		<?php 
		}else if (($data['status_hold']!='')&&($data['status_wo']=='on process')or($data['status_wo']=='finish')or($data['status_wo']=='approved by SH')or($data['status_wo']=='accepted by IT')or($data['status_wo']=='approved by IT')){
			?>
			
		<th>Status</th><td colspan="2"><?php echo $data['status_wo']; ?></td>
		<?php 
		}else { ?>
		<th>Status/Status Hold</th><td colspan="2"><?php echo $data['status_wo']."/".$data['status_hold']; ?></td>
		<?php 
		} ?>
		
		
	</td>
	</tr>
	<tr>
		<th style="width: 5%;">Pemohon</th>
		<td colspan="2"><?php echo $data['pemohon'];?></td>
		<td style="width: 1%;border:0;border-top:0;">&nbsp;</td>
		<th style="width: 5%;">Section</th>
		<td colspan="2"><?php echo $data['section'];?></td>
	</tr>
	<tr>
		<th style="width: 5%;">Tanggal</th>
		<td colspan="2" style="width: 15%;"><?php echo $data['tgl_permohonan'];?></td>
		<td style="width: 1%;border:0;border-top:0;">&nbsp;</td>
		<th style="width: 5%;">Jam</th>
		<td style="width: 15%;" colspan="2"><?php echo $data['jam_permohonan'];?></td>
	</tr>
	<tr>
		<th colspan="7">Uraian Pekerjaan</th>
	</tr>
	<tr>
		<td colspan="7">
			<textarea readonly rows="3" cols="104" style="resize: none;"><?php echo $data['uraian_pekerjaan'];?></textarea>
		</td>
	</tr>
	<tr>
	<th colspan="7" > <h6 align="center" style="color:green;"> INFRASTRUKTUR  </h6></th>
	</tr>
	<tr>
		
		<td colspan='5'>
			<table  class="table table-striped table-bordered table-hover">
			<tr><th>TAHAPAN / DETAIL PEKERJAAN</th><th>Hari</th><th>user</th><th>status</th><th>Action</th></tr>
				<?php $sqlanal	= mysqli_query($koneksi,"select * from detail_project where no_project ='".$nowo."' and group_project='INFRA'");
				if($sqlanal==''){}else{
				while($datanal	= mysqli_fetch_array($sqlanal))
					{?>						
					<tr><td><?php echo $datanal['detail_pekerjaan']; ?></td><td><?php echo $datanal['waktu'] ?></td>
					<td><?php echo $datanal['username']; ?></td>
					<td><?php echo $datanal['status']; ?></td>
					<td>
					<?php 
					if($dev=="inf" OR $dev=="pro"){	
						if($datanal['status']==''){?>
										
									<form name="f_anal" action="simpan_modulku.php" method="POST"><input type="hidden" name="id_modul" value="<?php echo $datanal['objectid'];?>">
									<input type="hidden" name="txtwo" value="<?php echo $datanal['no_project'];?>">
									<input type="hidden" name="sttgroup" id="sttgroup" value="start">
									<input type="hidden" name="url" id="url" value="<?php echo $_SERVER['HTTP_REFERER'];?>">
									<button type="submit" class="btn btn-purple btn-xs">Start</button></form>
							<?php }else if($datanal['status']=='on procces'){?>
								<form name="f_anal" action="simpan_modulku.php" method="POST"><input type="hidden" name="id_modul" value="<?php echo $datanal['objectid'];?>">
									<input type="hidden" name="txtwo" value="<?php echo $datanal['no_project'];?>">
									<input type="hidden" name="sttgroup" id="sttgroup" value="finish">
									<input type="hidden" name="url" id="url" value="<?php echo $_SERVER['HTTP_REFERER'];?>">
									<button type="submit" class="btn btn-primary btn-xs">finish</button></form>
							<?php }else{echo"-";} 
						}else{}?></td>
					</tr>
					<?php } 
				}?>
			</table>
		</td>
		<td colspan='2'>
		<?php if($_SESSION['section']=="IT"){?>
		<table  class="table table-striped table-bordered table-hover">
			<tr><th>TOTAL PLAN WAKTU</th> 
				<th>AKTUAL</th>
			</tr>
			<?php $sqltotal	= mysqli_query($koneksi,"select sum(waktu)as hari from detail_project where no_project ='".$nowo."' and group_project in('INFRA') ");
				if($sqltotal==''){}else{
				while($dattotal	= mysqli_fetch_array($sqltotal))
					{?>						
					<tr><td><?php echo $dattotal['hari']; ?> - Hari</td> 
						<td><?php  if($data['tgl_s_kerja'] !="0000-00-00" AND $data['tgl_m_kerja'] !="0000-00-00" AND $data['it']=="infra") {	
								echo	$total=((abs(strtotime ($data['tgl_m_kerja'] ) - strtotime ($data['tgl_s_kerja'])))/(60*60*24)); 
								}else{ }	?>
					-HARI	</td>
					</tr>
					<?php } 
					}?>
			</table>
		<?php }?>
			<br>
		
		<?php if(($_SESSION['username']=='ssh-it' OR $_SESSION['username']=='it01') AND $_SESSION['section']=='IT' AND $data['status_wo']=='finish'){?>
			<?php if($data['it']=="infra"){?>
		
				<form action="#" id="nilaiwo_infra" name="nilaiwo_infra" method="post">
				<table class="table table-striped table-bordered table-hover">
				 <tr><th colspan=6>  NILAI POINT</th></tr>
			
				

				<tr><td <?php if($tp_point=='1') echo 'style="background:red;color:white;"'?>>1</td>
				 	 <td>
					  	
					  	<input type="radio" id="nilai_point" name="nilai_point" value="1" <?php if($tp_point=='1') echo 'checked'?> >
					</td>
					 <td <?php if($tp_point=='2') echo ' style="background:yellow;color:black;"'?>>2</td>
				 	 <td>
					  	<input type="radio" id="nilai_point" name="nilai_point" value="2" <?php if($tp_point=='2') echo 'checked'?> >
					</td>
					 <td <?php if($tp_point=='3') echo ' style="background:green;color:white;"'?>>3</td>
				 	 <td>
					  	<input type="radio" id="nilai_point" name="nilai_point" value="3" <?php if($tp_point=='3') echo 'checked'?> >
					</td>
				 </tr>

				 <input type="hidden" id="id" name="id" value="<?php echo $nowo;?>">
					<input type="hidden" id="txtnama" name="txtnama" value="<?php  echo $data['diterima'];?>">
					<input type="hidden" id="group" name="group" value="WO">
			
				</table> 
				</form>
				</BR>
			<button class="_nilaiwoinfra btn btn-sm btn-success" name="txttombol" type="button"><i class="ace-icon fa fa-check"></i>NILAI</button>
	
		<?php 
		} }?>

		
		</td>
	</tr>
	<tr>
		
		<th colspan="7" > <h6 align="center" style="color:green;"> MODUL PROGRAMER  </h6></th>
	</tr>
	
	<tr>
		<td colspan='5'>
			<table  class="table table-striped table-bordered table-hover">
			<tr><th>ANALISIS</th><th>Hari</th><th>user</th><th>status</th><th>Action</th></tr>
				<?php $sqlanal	= mysqli_query($koneksi,"select * from detail_project where no_project ='".$nowo."' and group_project='ANALISIS'");
			if($sqlanal==''){}else{
			while($datanal	= mysqli_fetch_array($sqlanal))
					{?>						
					<tr><td><?php echo $datanal['detail_pekerjaan']; ?></td>
						<td><?php echo $datanal['waktu']; ?></td>
						<td><?php echo $datanal['username']; ?></td>
						<td><?php echo $datanal['status']; ?></td>
						<td><?php 
						if($dev=="inf" OR $dev=="pro"){	
							if($datanal['status']==''){?>
										
									<form name="f_anal" action="simpan_modulku.php" method="POST"><input type="hidden" name="id_modul" value="<?php echo $datanal['objectid'];?>">
									<input type="hidden" name="txtwo" value="<?php echo $datanal['no_project'];?>">
									<input type="hidden" name="sttgroup" id="sttgroup" value="start">
									<input type="hidden" name="url" id="url" value="<?php echo $_SERVER['HTTP_REFERER'];?>">
									<button type="submit" class="btn btn-purple btn-xs">Start</button></form>
							<?php }else if($datanal['status']=='on procces'){?>
								<?php if($nm==$datanal['username']){?>
								<form name="f_anal" action="simpan_modulku.php" method="POST"><input type="hidden" name="id_modul" value="<?php echo $datanal['objectid'];?>">
									<input type="hidden" name="txtwo" value="<?php echo $datanal['no_project'];?>">
									<input type="hidden" name="sttgroup" id="sttgroup" value="finish">
									<input type="hidden" name="url" id="url" value="<?php echo $_SERVER['HTTP_REFERER'];?>">
									<button type="submit" class="btn btn-primary btn-xs">finish</button></form>
								<?php } else{ echo "-";}?>
							<?php }else{echo"-";} 
						}else{}
							?></td>
						</tr>
					<?php }
					} ?>
			</table>
		</td><td colspan="2">
		<?php if($_SESSION['section']=="IT"){?>
		<table  class="table table-striped table-bordered table-hover">
			<tr><th>TOTAL PLAN WAKTU</th> <th>AKTUAL</th></tr>
			<?php $sqltotal	= mysqli_query($koneksi,"select sum(waktu)as hari from detail_project where no_project ='".$nowo."' and group_project not in('INFRA') ");
				if($sqltotal==''){}else{
				while($dattotal	= mysqli_fetch_array($sqltotal))
					{?>						
					<tr><td><?php echo $dattotal['hari']; ?> - Hari</td>
						<td><?php  if($data['tgl_s_kerja'] !="0000-00-00" AND $data['tgl_m_kerja'] !="0000-00-00" AND $data['it']=="prog") {	
								echo	$total=((abs(strtotime ($data['tgl_m_kerja'] ) - strtotime ($data['tgl_s_kerja'])))/(60*60*24)); 
								}else{ }	?>
						-Hari</td>
					</tr>
					<?php } 
				}?>
			</table>
			<?php } ?>
		</td>
	</tr>

	
	
	<tr>	
		<td colspan='5'><table  class="table table-striped table-bordered table-hover">
			<tr><th>PROGRAMING</th><th>Hari</th><th>user</th><th>status</th><th>action</th></tr>
			<?php $sqlprog	= mysqli_query($koneksi,"select * from detail_project where no_project ='".$nowo."' and group_project='PROGRAMING'");
				if($sqlprog==''){}else{
				while($datprog	= mysqli_fetch_array($sqlprog))
					{?>						
					<tr><td><?php echo $datprog['detail_pekerjaan']; ?></td>
					<td><?php echo $datprog['waktu'] ?></td>
					<td><?php echo $datprog['username']; ?></td>
					<td><?php echo $datprog['status']; ?></td>
					<td>
						<?php 
						if($dev=="inf" OR $dev=="pro"){							
							if($datprog['status']==''){?>
										<form name="f_prog" action="simpan_modulku.php" method="POST"><input type="hidden" name="id_modul" value="<?php echo $datprog['objectid'];?>">
										<input type="hidden" name="txtwo" value="<?php echo $datprog['no_project'];?>">
										<input type="hidden" name="sttgroup" id="sttgroup" value="start">
										<input type="hidden" name="url" id="url" value="<?php echo $_SERVER['HTTP_REFERER'];?>">
										<button type="submit" class="btn btn-purple btn-xs">Start</button></form>
							<?php }else if($datprog['status']=='on procces'){?>
									<form name="f_prog" action="simpan_modulku.php" method="POST"><input type="hidden" name="id_modul" value="<?php echo $datprog['objectid'];?>">
										<input type="hidden" name="txtwo" value="<?php echo $datprog['no_project'];?>">
										<input type="hidden" name="sttgroup" id="sttgroup" value="finish">
											<input type="hidden" name="url" id="url" value="<?php echo $_SERVER['HTTP_REFERER'];?>">
										<button type="submit" class="btn btn-primary btn-xs">finish</button></form>
						<?php	}else{echo"-";} 
						}else{}?>
					</td>
					</tr>
					<?php }
					} ?>
			</table>
		</td>
		<?php if(($_SESSION['username']=='ssh-it' OR $_SESSION['username']=='it01') AND $_SESSION['section']=='IT' AND $data['status_wo']=='finish'){?>
		<?php if($data['it']=="prog"){?>
		<td rowspan="2">
			<form action="#" id="nilaiwo_prog" name="nilaiwo_prog">
				<table class="table table-striped table-bordered table-hover">
					<tr><th style="color:red">Nilai Analisis</th>
					<td><input type="text"  name="nilai_analisis" id="nilai_analisis" size="15" value="<?php echo $tp_anal;?>" onkeypress="return hanyaAngka(event)" required/></td></tr>
					<tr><th style="color:black">Nilai Programing</th>
					<td><input type="text"  name="nilai_programing" id="nilai_programing" size="15" value="<?php echo $tp_prog;?>" onkeypress="return hanyaAngka(event)" required/></td></tr>
					<tr><th style="color:green">Nilai Dokumentasi</th>
					<td><input type="text"  name="nilai_dokumentasi" id="nilai_dokumentasi"  size="15" value="<?php echo $tp_dok;?>" onkeypress="return hanyaAngka(event)" required/></td></tr>	

					<input type="hidden" id="id" name="id" value="<?php echo $nowo;?>">
					<input type="hidden" id="txtnama" name="txtnama" value="<?php  echo $data['diterima'];?>">
					<input type="hidden" id="group" name="group" value="WO">
			
				</table> 
				</form></BR>
			<button class="_nilaiwoprog btn btn-sm btn-success" name="txttombol" type="button"><i class="ace-icon fa fa-check"></i>NILAI</button>
	
		</td>
		<?php }}?>
		</tr>
		<tr>
		<td colspan='5'>
		<table  class="table table-striped table-bordered table-hover">
			<tr><th>DOKUMENTASI</th><th>Hari</th><th>user</th><th>status</th><th>Action</th></tr>
			<?php $sqldok	= mysqli_query($koneksi,"select * from detail_project where no_project ='".$nowo."' and group_project='DOKUMENTASI'");
				if($sqldok==''){}else{
				while($datdok	= mysqli_fetch_array($sqldok))
					{?>						
					<tr><td><?php echo $datdok['detail_pekerjaan']; ?></td>
					<td><?php echo $datdok['waktu'] ?></td>
					<td><?php echo $datdok['username']; ?></td>
					<td><?php echo $datdok['status']; ?></td>
					<td><?php
						if($dev=="inf" OR $dev=="pro"){	
						if($datdok['status']==''){?>
								<form name="f_dok" action="simpan_modulku.php" method="POST"><input type="hidden" name="id_modul" value="<?php echo $datdok['objectid'];?>">
								<input type="hidden" name="txtwo" value="<?php echo $datdok['no_project'];?>">
								<input type="hidden" name="sttgroup" id="sttgroup" value="start">
									<input type="hidden" name="url" id="url" value="<?php echo $_SERVER['HTTP_REFERER'];?>">
								<button type="submit" class="btn btn-purple btn-xs">Start</button></form>
							<?php }else if($datdok['status']=='on procces'){?>
								<form name="f_dok" action="simpan_modulku.php" method="POST"><input type="hidden" name="id_modul" value="<?php echo $datdok['objectid'];?>">
								<input type="hidden" name="txtwo" value="<?php echo $datdok['no_project'];?>">
								<input type="hidden" name="sttgroup" id="sttgroup" value="finish">
								<input type="hidden" name="url" id="url" value="<?php echo $_SERVER['HTTP_REFERER'];?>">
								<button type="submit" class="btn btn-primary btn-xs">finish</button></form>
								
						<?php	}else{echo"-";} 
						}else{}
						?></td>
					</tr>
					<?php }
					} ?>
			</table>
		</td>
		
	  </tr>
	  
		
	
	
	
	
								
					
	<tr>
	</tr>

	<tr>
		<th>Dikerjakan/Diperiksa</td>
		<td colspan="2"><?php echo $data['diterima'];?></td>
		<th>Tanggal</th>
		<td><?php if($data['tgl_diterima']=='0000-00-00'){
									echo "-";
								}else{
									echo $data['tgl_diterima'];
								}
									?></td>
		<th>Jam</th>
		<td><?php if($data['jam_diterima']=='00:00:00'){
									echo "-";
								}else{
									echo $data['jam_diterima'];
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
<br>
</table>
<?php if($data['status_wo']=='waiting' AND $_SESSION['username']=='ssh-it'){?>

<table>
<tr>
<td><a href="app_wo.php?nowo=<?php echo $data['no_wo'];?>" class="btn  btn-minier btn-primary">
			<i class="ace-icon fa fa-pencil-square-o"></i>
				APPROVE
	</a>
</td>
<td>			<button type="submit" class="btn btn-danger btn-minier" onclick="window.open('reject_window.php?kode=<?php echo $data['no_wo'];?>','winpopup', 'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=500,height=580');"><i class="ace-icon fa fa-trash-o"></i> REJECT</button></td>
</tr>
</table>
			
			
			
			
			&nbsp;

<?php }?>

<?php if($data['status_wo']=='accepted by IT' AND $_SESSION['username']=='ssh-it'){?>
				<table>
				<tr>
				<td>
				<a href="app_wo_it.php?nowo=<?php echo $data['no_wo'];?>" class="btn  btn-minier btn-primary">
				<i class="ace-icon fa fa-pencil-square-o"></i>
					APPROVE
				</a>
				</td>
			<td>
				&nbsp;
				<button type="submit" class="btn btn-danger btn-xs" onclick="window.open('reject_window_it.php?kode=<?php echo $data['no_wo'];?>','winpopup', 'toolbar=no,statusbar=no,menubar=no,resizable=yes,scrollbars=yes,width=500,height=580');"><i class="ace-icon fa fa-trash-o"></i> REJECT</button>
				
				</td>
				</tr>
				</table>
			<?php	}?>
</center>



<script>
function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>


<script type="text/javascript">
	$(document).ready(function(){
		$("._nilaiwoprog").click(function(){
		
	
          var data1  =$('#nilaiwo_prog').serialize();
          var dok	=$('#nilai_dokumentasi').val();
		  var anal	=$('#nilai_analisis').val();
		  var prog	=$('#nilai_programing').val();
		
		//alert(data1);
		 	 if (dok>100 || anal>100 ||prog>100 ){
			 sweetAlert("NILAI MELEBIHI 100", "", "error");
			}
			 else if (dok<1 || anal<1 ||prog<1){
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



	
<script>
function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>


<script type="text/javascript">
	$(document).ready(function(){
		$("._nilaiwoinfra").click(function(){
		
		
       
          var data1  =$('#nilaiwo_infra').serialize();
          var point	=$('#nilai_point').val();
		  
		
	//	alert(data1);
		 	
			 if (point=''){
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