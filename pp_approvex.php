<?php
session_start();
$user = $_SESSION['username'];
$nopp			= $_GET['nopp'];
$tanggal		= date('Y-m-d');
$jam			= date('H:i:s');
$status_pp		= "waiting";
$url			= "form-pp.php";
 //~ echo $user;
require_once('config.php');
$sqlw = mysqli_query($koneksi,"select * from user where username='".$user."'");
$isi  = mysqli_fetch_array($sqlw);
$nama  = $isi['nama'];
$perintah 		= 		"tgl_s_kerja  				='".$tanggal."',
						 jam_s_kerja  				='".$jam."',
						 status_pp  				='finish',
						 diperiksa					='".$nama."'";
						 
$syarat 	= " where no_pp='".$nopp."'";
$update 	= mysqli_query($koneksi,"update tbl_pp set ".$perintah." ".$syarat);
echo "<input type=hidden value='$url' id=url>";
				?>

					<script type=text/javascript>
						var url = document.getElementById('url').value;
						alert("PP dengan nomor <?php echo"".$nopp.""; ?> telah selesai");
						window.location = url;
						
					</script>
		<?php 
		
		?>			
		
