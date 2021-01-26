<?php
session_start();

require_once('config.php');

$nama_barang=$_POST['nmbrg'];



        
  
						
            	$sql_stok	= mysqli_query($koneksi,"select * from stok where nama_barang='$nama_barang' ");
							$row_stok	= mysqli_fetch_array($sql_stok);
              $jmlstok=$row_stok['jumlah_stok'];

 echo $jmlstok;



?>