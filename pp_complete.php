<?php
session_start();
$user = $_SESSION['username'];
$nopp			= $_GET['nopp'];
// $nilai			= $_POST['nilai'];
// $txtname		= $_POST['txtname'];
// $group			= $_POST['group'];
$tanggal		= date('Y-m-d');
$jam			= date('H:i:s');
$status_pp		= "complete";
$url			= "app_pp.php";
 //~ echo $nopp;
 //~ echo $nopp;


//nilai

//nilai
 

require_once('config.php');
$sqlw = mysqli_query($koneksi,"select nama from user where username='".$user."'");
$isi  = mysqli_fetch_array($sqlw);
$nama  = $isi['nama'];
$perintah 		= 		"status_pp  					='".$status_pp."',
						 diketahui_sh					='".$nama."'";
						 
$syarat 	= " where no_pp='".$nopp."'";
$update 	= mysqli_query($koneksi,"update tbl_pp set ".$perintah." ".$syarat);
echo "<input type=hidden value='$url' id=url>";
				?>

					<script type=text/javascript>
						var url = document.getElementById('url').value;
						//alert("PP dengan nomor <?php echo"".$nopp.""; ?> Complete!!");
						window.location = url;
						
					</script>
				<?php

?>

 
