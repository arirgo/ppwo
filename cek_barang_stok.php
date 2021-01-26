<?php
session_start();

require_once('config.php');

$kd_jenis=$_POST['pilih_id'];

$cek  = is_numeric($kd_jenis);
 if ($cek == true) 
 { 
	$input ="and kd_jenis='$kd_jenis'"; 
	}
 else { 
	 $cekid=mysqli_query($koneksi,"select *from ms_category where subcategory ='$kd_jenis'");
	 $id=mysqli_fetch_array($cekid);
	$idbrg=$id['id'];
	$input ="and kd_jenis='$idbrg'";
	}

        
   $stok="";
								$stok.=	'<option value="">-PILIH NAMA BARANG-</option>';
            	$sql_stok	= mysqli_query($koneksi,"select * from stok where objectid !=0 $input  ");
							while($row_stok	= mysqli_fetch_array($sql_stok))
							{
                                
								  $stok.= '<option value="'.$row_stok['nama_barang'].'">'.$row_stok['nama_barang'].'('.$row_stok['jumlah_stok'].')</option>';
								 
							}

 echo $stok;



?>