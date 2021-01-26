<?php
$angka	=	$_POST['angka'];
$tgl_tambah		= date('Y-m-d');
$jam_tambah		= date('H:i:s');
$nopp	= $_POST['txtnopp'];
	$a	= $_POST['angka'];
	for ($i = 1; $i <= $a; $i++){
	require_once("config.php");
	$kb	=	$_POST['cb_brg'][$i];
	$dk =	$_POST['txtdes'][$i];	
	$sqlp	= mysqli_query($koneksi,"insert into dt_pp set 	no_pp				='".$nopp."',
													tgl_tambah			='".$tgl_tambah."',
													jam_tambah  		='".$jam_tambah."',
													kategori_kerusakan	='".$kb."',
													deskripsi_kerusakan ='".$dk."'");
	 
	}
	?>	
	<script type=text/javascript>
	alert("data di simpan")
	window.close();
	opener.location.reload(true);
	</script>
<?php
?>
