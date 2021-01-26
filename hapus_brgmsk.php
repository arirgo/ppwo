
<?php

  //  $kd_msk =$_POST['kd_msdk'];
  echo  $obj    =$_POST['obj'];

    require_once("config.php");
    $cekbrg=mysqli_query($koneksi,"select*from barang masuk where objectid='$obj' ");
    $lihatbrg=mysqli_fetch_array($cekbrg);

    $nama   =$lihatbrg['nama'];
    $id_brg =$lihatbrg['id_brg'];
    $jml    =$lihatbrg['jumlah'];

    $hapusbrg=mysqli_query($koneksi,"delete from barang_masuk where objectid='$obj' and kd_masuk='$kd_msk'");
    
    $cekstok=mysqli_query($koneksi,"update stok set jumlah_stok=jumlah_stok-'$jml' where kd_jenis='$id_brg' and nama_barang='$nama'");



?>

<head>
<!-- This is what you need -->
  <script src="dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="dist/sweetalert.css">
  <!--.......................-->

</head>
<body>
			<script type=text/javascript>
				swal({ 
						title: "Succes!",
						text: "DATA BERHASIL DI HAPUS",
						type: "success" 
					},
					function(){
								window.location.href = 'form_barang_masuk.php';
							});
			</script>
</body>

