<?php
require_once('config.php');
session_start();
date_default_timezone_set("Asia/Jakarta");
$bagianpenilai=$_SESSION['username'];
if($bagianpenilai=='it01')
{
  $tgl1      =date('Y-m-d H:i:s');
echo  $penilai1  =$_SESSION['nama'];
  
}else
{
  $tgl2      =date('Y-m-d H:i:s');
echo  $penilai2  =$_SESSION['nama'];
}



 $jumlah=$_POST['jmlpersol'];
 $nop=$_POST['nop'];
 
 for($i=1;$i<=$jumlah;$i++)
 {
     
     $cek_=mysqli_query($koneksi,"select COUNT(*) as jmlpp from nilai_modul_pp where no_pp='$nop' and user ");
    $cek1_=mysqli_fetch_array($cek_);
    if($cek1_['jmlpp'] > 0){

       if($bagianpenilai=="it01")
		  {

        $update 	= mysqli_query($koneksi,"update nilai_modul_pp set nilai_modul='$nilai',tgl_spvit='$tgl1',spv='$penilai1' where no_pp='$nop'");
      }else{
               $update 	= mysqli_query($koneksi,"update nilai_modul_pp set nilai_modul='$nilai',tgl_sshit='$tgl2',sshit='$penilai2' where no_pp='$nop'");
      }


    }else{
    $perintah	=  	"
                         username	  ='".$id_user."',
                         no_pp		  ='".$no_project."',
                         nilai_pp     ='".$nilai."',
                         tgl_spvit   ='".$tgl1."',
                         spv          ='".$penilai1."',
                         tgl_sshit    ='".$tgl2."',
                         sshit        ='".$penilai2."'
                         
                         ";

    $simpan = mysqli_query($koneksi,"insert into nilai_modul_pp set".$perintah);  
    }
}
    

?>
    