
<?php
$nama_komputer=$_POST['nama_komputer'];
require_once('config.php');
$cekp=mysqli_fetch_array(mysqli_query($koneksi,"select * from master_komputer where nama_komputer='$nama_komputer'"));
echo $nm=$cekp['nama_pengguna'];
?>