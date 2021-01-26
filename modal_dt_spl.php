
<html>
<head> 
<?php 
//echo $_POST['id'];
require_once("config.php");
//include "templates/head.php";
						
?>
</head>
<body>
					
						<?php 
						
	
						$query = mysqli_query($koneksi,"select * from tbl_pp where uname = '".$_SESSION['user']."'",$koneksi) or die ("Gagal ambil section!".mysqli_error());
						while($data=mysqli_fetch_array($query)){
						$n = $_POST['id'];
						?>
						<h2><i class="halflings-icon tags"></i><span class="break"></span>No. SPL:  <?php echo $n;   ?> </h2>
						<?php
						$query1 = mysqli_query($koneksi,"select * from msspl_no where nomorspl = '$n'",$koneksi) or die ("Gagal ambil section!".mysqli_error());
						while($data1=mysqli_fetch_array($query1)){
						$tanggal = $data1['prop_time'];
						$tgl = substr($tanggal,0,10);
						?>
						<h2><i class="halflings-icon calendar"></i><span class="break"></span>Tanggal SPL:  <?php echo $tgl;   ?> </h2>
						<form action='act/act_apprv_spl_sh_det.php' method='post'>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							<tr>
								<th>No</th>
								<th>NIK</th>
								<th>Nama</th>
								<th>Jabatan</th>
								<th>Shift</th>
								<th>Jam Awal</th>
								<th>Jam Akhir</th>
								<th>Keterangan</th>
								<th colspan="3">Status</th>
							</tr>
						  </thead>   
						  <?php
						  
								$n = $_POST['id'];
								$user = $_SESSION['user'];
								$no=1;
								$nospl = $data1['nomorspl'];
								$tampil1=mysqli_query($koneksi,"select * from dt_lembur where  nospl = '$n'") or die ("Gagal ambil section!".mysqli_error());
								
								while ($data=mysqli_fetch_array($tampil1)){
											 
							?>
						  <tbody>
							
							<tr>
								<td><?php echo $no ?></td>
								<td><?php echo $data['nik']; ?></td>
								<td nowrap><?php echo $data['nama']; ?></td>
								<td><?php echo $data['jabatan']; ?></td>
								<td><?php echo $data['shift']; ?></td>
								<?php 
								if ($data['status'] == 1){ 
								?>
								<td><input type = "time" name = "jam_mulai[]" value = "<?php echo $data['jam_mulai']; ?>"></td>
								<td><input type = "time" name = "jam_sampai[]" value = "<?php echo $data['jam_sampai']; ?>"></td>
								<?php
								} else {
								?>
								<td><?php echo $data['jam_mulai']; ?></td>
								<td><?php echo $data['jam_sampai']; ?></td>
								<?php } ?>
								<td><?php echo $data['komen']; ?></td>
								<?php 
								if ($data['status'] == 1 ){
								?>
								<td colspan="2" align="center"><input type="checkbox" name="item[]" value="<?php echo $data['id']; ?>" > Approve</td>
								<td><a class = "btn btn-danger" href="act/act_rej_spl_sh_det.php?i=<?php echo $data['id']; ?>&n=<?php echo $n; ?>">Reject</a></td> <!-- Edit ganti statusnya ke 20 -->	
								<?php } else if ($data['status'] == 2 ){ ?>
								<td colspan = "2">Approved SH</td>
								<td><a href="act/act_edit_spl_sh_det.php?i=<?php echo $data['id']; ?>&n=<?php echo $n; ?>">Edit</a></td> <!-- Edit balikin statusnya ke 1 -->	
								<?php } else if ($data['status'] == 20 ){ ?>
								<td colspan = "2">Rejected SH</td>	
								<td><a href="act/act_edit_spl_sh_det.php?i=<?php echo $data['id']; ?>&n=<?php echo $n; ?>">Edit</a></td> <!-- Edit balikin statusnya ke 1 -->	
								<?php  } else if ($data['status'] == 3 ){ ?>
								<td colspan = "3">Approved Kadiv</td>
								
								<?php } else if ($data['status'] == 30 ){ ?>
								<td colspan = "3">Rejected Kadiv</td>
								
								<?php }?>
								<input type = "hidden" name = "nospl" value = "<?php echo $data['nospl'];?>">
							</tr>
							<?php 	
							$jumlah =  $no++; }  
							
							$qr = mysqli_query($koneksi,"select count(status) as status from dt_lembur where nospl = '$nospl' and status = '1'") or die ("gagal hitung status spl!" .mysqli_error());
							$c = mysqli_fetch_array($qr);
								if ($c['status']==0){
							
								} else {
							?>
									<tr>
									<td colspan = "8"></td>
									<td><input type="submit" class="btn btn-primary" name = "submit" value = "Approve" onclick = "return confirm ('Anda yakin approve SPL ini?')"></td>
									</tr>
							<?php
								}		
							}			
						}
							?>	
							
				
				<script src="sweetalert/sweetalert-dev.js"></script>
				<link rel="stylesheet" href="sweetalert/sweetalert.css">	
				<script type="text/javascript">
				
						$(document).ready(function(){

						$("#approve").click(function(){

						 swal({
							title: "Apakah Anda Yakin akan keluar?",
							text: "",
							type: "warning",
							showCancelButton: true,
							confirmButtonColor: '#DD6B55',
							confirmButtonText: 'YA!',
							cancelButtonText: "TIDAK!",
							closeOnConfirm: false,
							closeOnCancel: false
						 },
						 function(isConfirm){

						   if (isConfirm){
							  swal("ANDA KELUAR APLIKASI!", "", "success");
							window.location.href="logout.php";
							} else {
							  swal("BATAL", ":)", "error");
							}
						 });
						});
						});
             </script> 
							
							
						  </tbody>
					  </table>          
					  
					 </form>
					
			
</body>
</html>

				
