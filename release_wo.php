<?php 
$nowo 		= $_POST['txtrelease'];
$admin		= $_POST['txtadmin'];
$tanggal	= date('Y-m-d');
$jam		= date('H:i:s');
$url		= "menu_process_wo.php";

//~ echo $nopp." ".$admin;

require_once('config.php');
$perintah	=			"tgl_release	  				='".$tanggal."',
						 jam_release	  				='".$jam."',
						 status_wo						='on process'";

$syarat 	= " where no_wo='".$nowo."'";
$update 	= mysqli_query($koneksi,"update tbl_wo set ".$perintah." ".$syarat);
	

//requess hold
$cekreq=mysqli_query($koneksi,"select*from detail_hold_wo where no_wo='$nowo' and tgl_release='0000-00-00' and jam_release='00:00:00'");
$dt=mysqli_fetch_array($cekreq);

$level=$dt['level'];
$perintah2=				"tgl_release	  				='".$tanggal."',
						 jam_release	  				='".$jam."'";
 $update2 	= mysqli_query($koneksi,"update detail_hold_wo set ".$perintah2." where no_wo='$nowo' and level='$level'");

echo "<input type=hidden value='$url' id=url>";
		?>

			<script type=text/javascript>
				var url = document.getElementById('url').value;
				// alert("WO Nomor <?php echo"".$nowo.""; ?> status kembali ON PROCESS");
				window.location = url;
			</script>
				<?php

?>
