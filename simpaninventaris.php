<?php
require_once('config.php');
session_start();
date_default_timezone_set("Asia/Jakarta");
//$user       =$_SESSION['nama'];
$tgl_update=date("Y-m-d H:s:i");
$user_update       =$_SESSION['nama'];
$nama_barang    =$_POST['nama_barang'];
$kode           =$_POST['kode'];
$spesifikasi    =$_POST['spesifikasi'];
$lokasi         =$_POST['lokasi'];
$kode_it        =$_POST['kode_it'];
$keterangan     =$_POST['keterangan'];
$ip             =$_POST['ip'];
$os             =$_POST['os'];
$group_brg      =$_POST['group_brg'];
$status         =$_POST['status'];
$katago         =$_POST['katago'];
$pls            =$_POST['pls'];
$user            =$_POST['user'];
$lisensi         =$_POST['lisensi'];
$productid            =$_POST['productid'];
$thproleh            =$_POST['thproleh'];


$perintah	=  	"
                         kode	='".$kode."',
                         nama_barang		='".$nama_barang."',
                         spesifikasi   ='".$spesifikasi."',
                         lokasi   ='".$lokasi."',
                         kode_it ='".$kode_it."',
                         keterangan     ='".$keterangan."',
                         ip     ='".$ip."',
                         os     ='".$os."',
                         group_brg     ='".$group_brg."',
                         jenis_group     ='".$katago."',
                         pls     ='".$pls."',
                         status='".$status."',
                         lisensi='".$lisensi."',
                         thproleh='".$thproleh."',
                         productid='".$productid."',
						 user='".$user."'";
			
 $simpan = mysqli_query($koneksi,"insert into inventarisi set".$perintah);


 $dthistory	           ="
                         kode_asset	='".$kode."',
                         nama_brg	    ='".$nama_barang."',
                         spesifikasi  ='".$spesifikasi."',
                         lokasi       ='".$lokasi."',
                         kode_it      ='".$kode_it."',
                         ket          ='".$keterangan."',
                         ip           ='".$ip."',
                         os           ='".$os."',
                         group_brg    ='".$group_brg."',
                         jenis_group  ='".$katago."',
                         status       ='".$status."',
                          lisensi     ='".$lisensi."',
                         th_proleh    ='".$thproleh."',
                         productid    ='".$productid."',
                         user_update  ='".$user_update."',
                         tgl_update   ='".$tgl_update."',
                         st           ='input',
						             user         ='".$user."'";
 $simpanhistory	= mysqli_query($koneksi,"INSERT into history_inventaris set ".$dthistory);
       
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
						title: "Success!",
						text: "DATA BERHASIL DI PERBARUAI ",
						type: "success" 
					},
					function(){
								window.location.href = 'view_inventaris.php';
							});
			</script>
            </body>