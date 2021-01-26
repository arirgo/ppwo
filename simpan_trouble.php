<?php
require_once('config.php');
session_start();
$user               =$_SESSION['nama'];
$pls               =$_SESSION['pls'];
$tgl        =$_POST['tgl'];
$apl        =$_POST['apl'];
$bagian     =$_POST['bagian'];
$solusi     =$_POST['solusi'];
$ket        =$_POST['ket'];
$komplain   =$_POST['komplain'];


$perintah	=  	"
                         tanggal	='".$tgl."',
                         bagian		='".$bagian."',
                         aplikasi   ='".$apl."',
                         komplain   ='".$komplain."',
                         keterangan ='".$ket."',
                         solusi     ='".$solusi."',
                         pls     ='".$pls."',
                         user_input='".$user."'";
				
 $simpan = mysqli_query($koneksi,"insert into troubleshooting set".$perintah);


       
?>