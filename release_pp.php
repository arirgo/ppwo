<?php 
date_default_timezone_set("Asia/Jakarta");
$nopp 		= $_POST['txtrelease'];
$admin		= $_POST['txtadmin'];
$tanggal	= date('Y-m-d');
$jam		= date('H:i:s');
$url		= "menu_process_pp.php";

//~ echo $nopp." ".$admin;

require_once('config.php');
$perintah	=			"tgl_release	  				='".$tanggal."',
						 jam_release	  				='".$jam."',
						 status_pp						='on process'";

$syarat 	= " where no_pp='".$nopp."'";
$update 	= mysqli_query($koneksi,"update tbl_pp set ".$perintah." ".$syarat);


//requess hold
$cekreq=mysqli_query($koneksi,"select*from detail_hold_pp where no_pp='$nopp' and tgl_release='0000-00-00' and jam_release='00:00:00'");
$dt=mysqli_fetch_array($cekreq);

$level=$dt['level'];
$perintah2=				"tgl_release	  				='".$tanggal."',
						 jam_release	  				='".$jam."'";
 $update2 	= mysqli_query($koneksi,"update detail_hold_pp set ".$perintah2." where no_pp='$nopp' and level='$level'");



echo "<input type=hidden value='$url' id=url>";
		?>

			<script type=text/javascript>
				var url = document.getElementById('url').value;
				// alert("PP Nomor <?php echo"".$nopp.""; ?> status kembali ON PROCESS");
				window.location = url;
			</script>
				<?php

?>
