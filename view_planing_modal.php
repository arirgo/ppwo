<?php 
$nowo = $_POST['id'];
 $no_project = $_POST['id'];
//~ echo $nowo;
session_start();
require_once("config.php");
$sqla = mysqli_query($koneksi,"select * from tbl_wo where no_wo ='".$nowo."'");
$data = mysqli_fetch_array($sqla);
$diterima=$data['diterima'];
// $usernm=$_SESSION['username'];
// $cekuser = mysqli_query($koneksi,"select * from user where username ='".$usernm."'");
// $datuser = mysqli_fetch_array($cekuser);

$sqla_nl = mysqli_query($koneksi,"select * from nilai_wo where no_wo ='".$nowo."' AND username ='".$diterima."' ");
$data_nl = mysqli_fetch_array($sqla_nl);
$tp_anal=$data_nl['analisis'];
$tp_prog=$data_nl['programing'];
$tp_dok=$data_nl['dokumentasi'];
$tp_point=$data_nl['point'];

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
		
		<td colspan='6'>
			<table  class="table table-striped table-bordered table-hover">
			<tr><th>TAHAPAN / DETAIL PEKERJAAN</th><th>Hari</th><th>IT</th></tr>
				<?php $sqlinf	= mysqli_query($koneksi,"select * from detail_project where no_project ='".$nowo."' and group_project='INFRA'");
				while($datainf	= mysqli_fetch_array($sqlinf))
					{  $obj=$datainf['objectid']?>						
					<tr><th><i><?php echo $datainf['detail_pekerjaan']; ?></i></th><i><th><?php echo $datainf['waktu']; ?></i></th><th><?php echo $datainf['username'];?></th></tr>
					<?php $no=1;
                             $sql_sub	= mysqli_query($koneksi,"select * from daily_report where modul ='".$obj."' and project='$no_project'");
							while($row_sub	= mysqli_fetch_array($sql_sub)){?>
			            	<tr><td><?php echo $no++.'--'.$row_sub['sub_modul'];?></td><td><?php echo $row_sub['keterangan'];?></td>
							<td>
							<?php  $usr =$row_sub['user'];
							$sqlauser = mysqli_query($koneksi,"select * from user where username ='".$usr."'");
							$datauser = mysqli_fetch_array($sqlauser);
							echo $datauser['nama'];
							?>
							
							</td></tr>
                							
				        	<?php } ?>
					
					<?php } ?>
			</table>
			
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
	
		<?php }
		} ?>
		</td>
		<td colspan='2'>
		<table  class="table table-striped table-bordered table-hover">
			<tr><th>TOTAL WAKTU</th> <th>AKTUAL</th></tr>
			<?php $sqltotalinf	= mysqli_query($koneksi,"select sum(waktu)as hari from detail_project where no_project ='".$nowo."' and group_project in('INFRA') ");
				while($dattotalinf	= mysqli_fetch_array($sqltotalinf))
					{?>						
					<tr><td><?php echo $dattotalinf['hari']; ?> - Hari</td>
					<td><?php  if($data['tgl_s_kerja'] !="0000-00-00" AND $data['tgl_m_kerja'] !="0000-00-00" AND $data['it']=="infra") {	
								echo	$total=((abs(strtotime ($data['tgl_m_kerja'] ) - strtotime ($data['tgl_s_kerja'])))/(60*60*24)); 
								}else{ }	?>
						-Hari</td>
					</tr>
					<?php } ?>
			</table>
		</td>
	</tr>
	<tr>
	<th colspan="7" > <h6 align="center" style="color:green;"> MODUL/PEKERJAAN </h6></th>
	</tr>
    <tr>
        <td colspan='2'>
            <table  class="table table-striped table-bordered table-hover">
			<tr style=" background-color:#7EB7FD;"><th>ANALISIS</th><th>Hari</th><th>IT</th></tr>
				<?php $sqlanal	= mysqli_query($koneksi,"select * from detail_project where no_project ='".$nowo."' and group_project='ANALISIS'");
				while($datanal	= mysqli_fetch_array($sqlanal))
					{ $obj=$datanal['objectid'];?>						
					<tr  ><th><i><?php echo $datanal['detail_pekerjaan']; ?></i></th><th><i><?php echo $datanal['waktu'] ?></i></th><th><?php echo $datanal['username'];?></th></tr>
                         <?php $no=1;
                            //  $sql_sub	= mysqli_query($koneksi,"select * from daily_report where modul ='".$obj."' and project='$no_project'");
							// while($row_sub	= mysqli_fetch_array($sql_sub)){?>
			            	<tr><td></td>
                                <td></td>
								<td>
							
							</td>
                            </tr>
                							
				        	
                
                	<?php } ?>
			</table>
        </td> 

        <td colspan='2'>
            <table  class="table table-striped table-bordered table-hover">
			<tr style=" background-color:#7EB7FD;"><th>PROGRAMING</th><th>Hari</th><th>IT</th></tr>
				<?php $sqlprog	= mysqli_query($koneksi,"select * from detail_project where no_project ='".$nowo."' and group_project='PROGRAMING'");
				while($dataprog	= mysqli_fetch_array($sqlprog))
					{$obj=$dataprog['objectid'];?>						
					<tr  ><th><i><?php echo $dataprog['detail_pekerjaan']; ?></i></th><th><i><?php echo $dataprog['waktu'] ?></i></th><th><?php echo $dataprog['username'];?></th></tr>
                     <?php $no=1;
                            //  $sql_sub	= mysqli_query($koneksi,"select * from daily_report where modul ='".$obj."' and project='$no_project'");
							// while($row_sub	= mysqli_fetch_array($sql_sub)){?>
			            	<tr><td></td>
							<td>
							</td>
							</tr>
                							
				       
                	<?php } ?>
			</table>
        </td>    

        <td colspan='2'>
            <table  class="table table-striped table-bordered table-hover">
			<tr style=" background-color:#7EB7FD;"><th>DOKUMENTASI</th><th>Hari</th><th>IT</th></tr>
				<?php $sqldok	= mysqli_query($koneksi,"select * from detail_project where no_project ='".$nowo."' and group_project='DOKUMENTASI'");
				while($datadok	= mysqli_fetch_array($sqldok))
					{ $obj=$datadok['objectid'];?>						
					<tr  ><th><i><?php echo $datadok['detail_pekerjaan']; ?></i></th><th><i><?php echo $datadok['waktu'] ?></i></th><th><?php echo $datadok['username'];?></th></tr>
                        <?php $no=1;
                            //  $sql_sub	= mysqli_query($koneksi,"select * from daily_report where modul ='".$obj."' and project='$no_project'");
							// while($row_sub	= mysqli_fetch_array($sql_sub)){?>
			            	<tr><td</td>
                                <td></td>
								<td>
							</td>
                            </tr>
                							
				        	
                	<?php } ?>
			</table>
        </td>     
        <td>
		<table  class="table table-striped table-bordered table-hover">
			<tr style=" background-color:#7EB7FD;"><th>TOTAL WAKTU</th><th>AKTUAL</th></tr>
			<?php $sqltotal	= mysqli_query($koneksi,"select sum(waktu)as hari from detail_project where no_project ='".$nowo."' and group_project not in('INFRA') ");
				while($dattotal	= mysqli_fetch_array($sqltotal))
					{?>						
					<tr><td><?php echo $dattotal['hari']; ?> - Hari</td>
					<td><?php  if($data['tgl_s_kerja'] !="0000-00-00" AND $data['tgl_m_kerja'] !="0000-00-00" AND $data['it']=="prog") {	
								echo	$total=((abs(strtotime ($data['tgl_m_kerja'] ) - strtotime ($data['tgl_s_kerja'])))/(60*60*24)); 
								}else{ }	?>
						-Hari</td>
					</tr>
					<?php } ?>
			</table>
		</td>  
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

	
	
</table>
<?php if(($_SESSION['username']=='ssh-it' OR $_SESSION['username']=='it01') AND $_SESSION['section']=='IT' AND $data['status_wo']=='finish'){?>
		<?php if($data['it']=="prog"){?>
		
			<form action="#" id="nilaiwo_prog2" name="nilaiwo_prog2">
				<table class="table table-striped table-bordered table-hover">
					<tr><th style="color:red">Nilai Analisis</th>
					<td><input type="text"  name="nilai_analisis" id="nilai_analisis" size="15" value="<?php echo $tp_anal;?>" onkeypress="return hanyaAngka(event)" required/></td>
					<th style="color:black">Nilai Programing</th>
					<td><input type="text"  name="nilai_programing" id="nilai_programing" size="15" value="<?php echo $tp_prog;?>" onkeypress="return hanyaAngka(event)" required/></td>
					<th style="color:green">Nilai Dokumentasi</th>
					<td><input type="text"  name="nilai_dokumentasi" id="nilai_dokumentasi"  size="15" value="<?php echo $tp_dok;?>" onkeypress="return hanyaAngka(event)" required/></td></tr>	

					<input type="hidden" id="id" name="id" value="<?php echo $nowo;?>">
					<input type="hidden" id="txtnama" name="txtnama" value="<?php  echo $data['diterima'];?>">
					<input type="hidden" id="group" name="group" value="WO">
			
				</table> 
				</form></BR>
			<button class="_nilaiwoprog2 btn btn-sm btn-success" name="txttombol" type="button"><i class="ace-icon fa fa-check"></i>NILAI</button>
	
		
		<?php }}?>
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
		$("._nilaiwoprog2").click(function(){
		
		
       
          var data1  =$('#nilaiwo_prog2').serialize();
          var dok	=$('#nilai_dokumentasi').val();
		  var anal	=$('#nilai_analisis').val();
		  var prog	=$('#nilai_programing').val();
		
		alert(data1);
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