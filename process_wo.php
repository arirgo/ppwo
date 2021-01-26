<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
$user = $_SESSION['username'];
$nowo	=$_POST['txttake'];
$nama 	=$_POST['txtadmin'];

$soft_hard   =$_POST['soft_hard'];

//~ echo $nopp;

//~ echo $nama;

$tanggal		= date('Y-m-d');
$jam			= date('H:i:s');
$url			= "menu_process_wo.php";

require_once('config.php');


$sqlx 		= mysqli_query($koneksi,"select * from tbl_wo where no_wo ='".$nowo."'");
$data1		= mysqli_fetch_array($sqlx);

$perintah	=  			"	tgl_m_kerja					='".$tanggal."',
							jam_m_kerja					='".$jam."',
							diterima  					='".$nama."',
							nama_project  				='".$soft_hard ."',
							status_wo					='on process'";

$syarat 	= " where no_wo='".$nowo."'";
$update 	= mysqli_query($koneksi,"update tbl_wo set ".$perintah." ".$syarat);
$update_project	= mysqli_query($koneksi,"update detail_project set soft_hard='$soft_hard' where no_project='$nowo'");
echo "<input type=hidden value='$url' id=url>";
				?>

					<script type=text/javascript>
						var url = document.getElementById('url').value;
						//alert("WO Nomor <?php echo"".$nowo.""; ?> Dimulai");
						window.location = url;
						
					</script>
				<?php

?>
