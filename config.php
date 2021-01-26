<?php
$hostdb 		= "localhost";
$userdb 		= "root";
$passdb 		= "";
$db 		= "ppwo_it";

$koneksi 	= mysqli_connect($hostdb,$userdb,$passdb);

if(!$koneksi){
	echo"Gagal Connect:".mysqli_connect_error();
	exit();
}

$pilihdb 	= mysqli_select_db($koneksi,$db);

if(!$pilihdb) {
 	echo("gagal memilih Database:".mysqli_connect_error());
}


mysqli_query($koneksi,"SET SESSION sql_mode = ''");




?>