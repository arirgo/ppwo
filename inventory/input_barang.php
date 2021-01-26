<head>
<!-- This is what you need -->
  <script src="../dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../dist/sweetalert.css">
  <!--.......................-->
</head>
<body>
<?php
$kd_grup		=	$_POST['combo_kode'];
$kd_barang		=	$_POST['txtkode'].$_POST['txtnomor'];
$nama_barang	=	$_POST['txtnamabarang'];
$satuan			=	$_POST['txtsatuan'];
$stock			=	$_POST['txtstock'];

//~ echo $kd_barang;


require_once("../config2.php");
$sql	=	mysqli_query($koneksi,"select * from ms_barang where kode_barang='".$kd_barang."'");
$data	=	mysqli_fetch_array($sql);
if ($data['kode_barang']==$kd_barang){
	?>
		<script>
			
				//var url = document.getElementById('url').value;
				
				//swal("Deleted!", "Your imaginary file has been deleted!", "success");
				//alert("TA DA");
				//window.location = url;
				swal({ 
						title: "Error",
						text: "Kode barang sudah ada",
						type: "error" 
					},
					function(){
								window.location.href = 'barang.php';
							});
			
		</script>
	
	<?php
	
}else {

$perintah	=	"	kode_barang	=	'".$kd_barang."',
					nama_barang	=	'".$nama_barang."',
					kode_grup	=	'".$kd_grup."',
					satuan		=	'".$satuan."',
					stock		=	'".$stock."'";
$sytax	=	mysqli_query($koneksi,"insert into ms_barang set ".$perintah);
?>
		<script>
				swal({ 
						title: "Succes!",
						text: "Data berhasil disimpan!",
						type: "success" 
					},
					function(){
								window.location.href = 'barang.php';
							});
			
		</script>
	
	<?php

}
?>
</body>
