<?php
include('config2.php');
 
$term = $_GET['term'];
 
//$sql= "SELECT a.Nik as Nik, substr(a.Nik,6,4) as Niks, a.Nama as Nama, a.jabatan as jabatan, a.Bagian as Bagian, b.jumlah as jumlah FROM datakaryawan a left outer join mscuti b on b.Nik = a.Nik where  a.Nama like '".$term."%'";

$sql= "SELECT * from ms_barang where nama_barang like '".$term."%'";


$query =mysqli_query($koneksi,$sql);
$json = array();
while($produk = mysqli_fetch_array($query)){
	$json[] = array(
		/*'label' => $produk['Nik'].' - '.$produk['Nama'], 
		'value' => $produk['Nik'],
		'nama' => $produk['Nama'],
		'jabatan' => $produk['jabatan'],
		'jumlah' => $produk['jumlah'],
		'Bagian' => $produk['Bagian']*/
		
		
		'label' => $produk['nama_barang'],
		'value' => $produk['nama_barang'],
		//'nama' => $produk['Nama'],
		'nama' => $produk['nama_barang'],
		'kode' => $produk['kode_barang']
		
	);
}


header("Content-Type: text/json");
echo json_encode($json);

?>

