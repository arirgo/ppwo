<?php

include('config.php');
$term = $_GET['term'];
$query =mysqli_query($koneksi,"select * from tmp_ac where nama like '%".$term."%'");
$json = array();
while($produk = mysqli_fetch_array($query)){
	$json[] = array(
		/*'label' => $produk['Nik'].' - '.$produk['Nama'], 
		'value' => $produk['Nik'],
		'nama' => $produk['Nama'],
		'jabatan' => $produk['jabatan'],
		'jumlah' => $produk['jumlah'],
		'Bagian' => $produk['Bagian']*/
		
		'label' => $produk['nama'],
		'value' => $produk['nama']

	);
}


header("Content-Type: text/json");
echo json_encode($json);


?>
