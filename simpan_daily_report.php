<?php
require_once('config.php');
session_start();



 $kategori 	    =$_POST['cek_pilih'];
    $tgl 	    =$_POST['tgl'];
 $project       =$_POST['project'];
// echo $tgl          	=$_POST['tgl'];
 $user_project  =$_SESSION['username'];



 $modul         =$_POST['modul'];
 $peminta       =$_POST['peminta'];
 $section       =$_POST['section'];
 $ket           =$_POST['ket'];
 $submodul      =$_POST['submodul'];




	$perintah	=  	"
                         kategori		  ='".$kategori."',
                         project		  ='".$project."',
                         tgl              ='".$tgl."',
                         modul            ='".$modul."',
                         sub_modul        ='".$submodul."',
                         user             ='".$user_project."',
                         pemohon          ='".$peminta."',
                         section          ='".$section."',
                         keterangan       ='".$ket."'
                         ";

echo $perintah;
				
                 $simpan = mysqli_query($koneksi,"insert into daily_report set".$perintah);  
if($ket=='finish')
{
    $update = mysqli_query($koneksi,"update detail_project set status='finish',username='$user_project',tgl_kerja='$tgl' where no_project='$project' and objectid='$modul'"); 

}else if($ket=='pending')
{
       $update = mysqli_query($koneksi,"update detail_project set status='pending',username='$user_project',tgl_kerja='$tgl' where no_project='$project' and objectid='$modul'"); 

}else{
   $update = mysqli_query($koneksi,"update detail_project set status='on progress',username='$user_project',tgl_kerja='$tgl' where no_project='$project' and objectid='$modul'"); 

}
              
?>