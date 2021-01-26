<?php
$nowo	=	$_POST['txtnowo'];
$reason	=	$_POST['txtalasan'];
$tanggal		= date('Y-m-d');
$jam			= date('H:i:s');
require_once("config.php");
$perintah	=	"	tgl_reject 		='".$tanggal."',
					jam_reject	 	='".$jam."',
					keterangan 		='".$reason."',
					status_wo		='reject by SH'";
					
$syarat 	= " where no_wo='".$nowo."'";
$update 	= mysqli_query($koneksi,"update tbl_wo set ".$perintah." ".$syarat);

	?>	
	<script type=text/javascript>
	
	window.close();
	opener.location.reload(true);
	</script>
<?php
?>
